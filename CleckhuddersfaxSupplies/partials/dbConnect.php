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

    public function getConnection()
    {
        return $this->conn;
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



    public function getCartItems($user_id)
    {
        $cartItems = array();
    
        try {
            // Prepare the SQL query to fetch cart items for the user
            $cartId = $this->getCartIdUsingCustomerId($user_id); // Ensure this function is secure
            $query = "SELECT * FROM cart_product WHERE cart_id = :cart_id";
            $statement = $this->executeQuery($query, array('cart_id' => $cartId));
    
            // Fetch cart items and store them in an array
            while ($row = $this->fetchRow($statement)) {
                $cartItems[$row['product_id']] = array(
                    'quantity' => $row['quantity'],
                    'special_instruction' => $row['special_instruction']
                );
            }
    
            $this->closeConnection();
        } catch (Exception $e) {
            throw new Exception("Error fetching cart items: " . $e->getMessage());
        }
    
        return $cartItems;
    }
    

    public function updateCartItem($user_id, $product_id, $quantity, $special_instruction)
    {
        try {
            // Get the database connection
            $conn = $this->getConnection();
            $cartId = $this->getCartIdUsingCustomerId($user_id);
            var_dump($cartId);
    
            // Prepare the SQL query
            $query = "UPDATE cart_product 
                      SET quantity = :quantity, special_instruction = :special_instruction 
                      WHERE cart_id = :cart_id AND product_id = :product_id";
    
            // Prepare the statement
            $statement = oci_parse($conn, $query);
    
            // Bind parameters
            oci_bind_by_name($statement, ":cart_id", $cartId);
            oci_bind_by_name($statement, ":product_id", $product_id);
            oci_bind_by_name($statement, ":quantity", $quantity);
            oci_bind_by_name($statement, ":special_instruction", $special_instruction);
    
            // Execute the statement
            if (!oci_execute($statement)) {
                $m = oci_error($statement);
                throw new Exception("Error executing query: " . $m['message']);
            }
    
            // Commit the transaction
            oci_commit($conn);
    
            // Free the statement
            oci_free_statement($statement);
    
            return true; // Return true on successful update
        } catch (Exception $e) {
            throw new Exception("Error updating cart item: " . $e->getMessage());
        }
    }
    
    



}

?>