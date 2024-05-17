<?php

// Database class definition
class Database
{
    private $conn;

    public function __construct($username = 'GOVIND', $password = 'root', $host = 'localhost', $dbname = 'xe')
    {
        $this->conn = oci_connect($username, $password, "//" . $host . "/" . $dbname);
        if (!$this->conn) {
            $m = oci_error();
            throw new Exception("Database connection failed: " . $m['message']);
        }
    }

    public function executeQuery($query, $params = [])
    {
        $statement = oci_parse($this->conn, $query);
        if (!$statement) {
            $m = oci_error($this->conn);
            throw new Exception("Error preparing query: " . $m['message']);
        }

        // Bind parameters if provided
        foreach ($params as $key => $value) {
            oci_bind_by_name($statement, ":" . $key, $params[$key]);
        }

        if (!oci_execute($statement)) {
            $m = oci_error($statement);
            throw new Exception("Error executing query: " . $m['message']);
        }
        return $statement;
    }

    public function fetchRow($statement)
    {
        return oci_fetch_assoc($statement);
    }

    public function closeConnection()
    {
        oci_close($this->conn);
    }

    public function getProducts()
    {
        $products = array();

        try {
            $query = "SELECT p.*, ROUND(r.average_rating, 2) AS rating
                      FROM product p
                      LEFT JOIN (
                          SELECT product_id, AVG(rating) AS average_rating
                          FROM review
                          GROUP BY product_id
                      ) r ON p.product_id = r.product_id";

            $statement = $this->executeQuery($query);

            while ($row = $this->fetchRow($statement)) {
                $products[] = $row;
            }

            $this->closeConnection();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $products;
    }

    public function getProductImage($id)
    {
        $query = 'SELECT PRODUCT_IMAGE FROM Product WHERE PRODUCT_ID = :id';
        $statement = oci_parse($this->conn, $query);
        oci_bind_by_name($statement, ":id", $id);
        oci_execute($statement);
        if (!$statement) {
            $m = oci_error($this->conn);
            throw new Exception("Error preparing query: " . $m['message']);
        }
        if (!oci_execute($statement)) {
            $m = oci_error($statement);
            throw new Exception("Error executing query: " . $m['message']);
        }
        $row = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_LOBS);

        if ($row) {
            $imageData = $row['PRODUCT_IMAGE'];
            $imageBase64 = base64_encode($imageData);
            return $imageBase64;
        } else {
            $imageBase64 = '';
        }
    }


    public function getCartIdUsingCustomerId($id)
    {
        try {
            // Prepare the SQL query
            $query = 'SELECT cart_id FROM cart WHERE customer_id = :customer_id';
            $statement = oci_parse($this->conn, $query);

            oci_bind_by_name($statement, ':customer_id', $id);

            if (!oci_execute($statement)) {
                $m = oci_error($statement);
                throw new Exception("Error executing query: " . $m['message']);
            }

            $row = oci_fetch_array($statement, OCI_ASSOC);
            oci_free_statement($statement);

            if ($row && isset($row['CART_ID'])) {
                return $row['CART_ID'];
            } else {
                return null;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public function addCartItem($user_id, $product_id, $quantity, $special_instruction)
    {
        $cart_id = $this->getCartIdUsingCustomerId($user_id);

        try {
            $query = "INSERT INTO cart_product (cart_id, product_id, quantity, special_instruction) 
                      VALUES (:cart_id, :product_id, :quantity, :special_instruction)
                      ON DUPLICATE KEY UPDATE quantity = quantity + VALUES(quantity)";

            $params = array(
                'cart_id' => $cart_id,
                'product_id' => $product_id,
                'quantity' => $quantity,
                'special_instruction' => $special_instruction
            );

            $this->executeQuery($query, $params);
            return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

}

?>