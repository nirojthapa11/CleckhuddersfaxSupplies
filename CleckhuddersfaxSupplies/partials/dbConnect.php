<?php

class Database
{
    private $conn;

    public function __construct($username = 'GOVIND', $password = 'root', $host = '//localhost', $dbname = 'xe')
    {
        $this->conn = oci_connect($username, $password, $host . '/' . $dbname);
        if (!$this->conn) {
            $m = oci_error();
            throw new Exception("Database connection failed: " . $m['message']);
        }
    }

    // Function to execute SELECT query

    /**
     * @throws Exception
     */
    public function executeQuery($query)
    {
        $statement = oci_parse($this->conn, $query);
        if (!$statement) {
            $m = oci_error($this->conn);
            throw new Exception("Error preparing query: " . $m['message']);
        }
        if (!oci_execute($statement)) {
            $m = oci_error($statement);
            throw new Exception("Error executing query: " . $m['message']);
        }
        return $statement;
    }
    

    // Function to fetch a single row
    public function fetchRow($statement)
    {
        return oci_fetch_assoc($statement);
    }

    // Function to close database connection
    public function closeConnection()
    {
        oci_close($this->conn);
    }


    function getProducts() {
        $products = array();

        try {
            $db = new Database();

            $query = "SELECT p.*, ROUND(r.average_rating, 2) AS rating
            FROM product p
            LEFT JOIN (
                SELECT product_id, AVG(rating) AS average_rating
                FROM review
                GROUP BY product_id
            ) r ON p.product_id = r.product_id";

            $statement = $db->executeQuery($query);

            while ($row = $db->fetchRow($statement)) {
                $products[] = $row;
            }

            $db->closeConnection();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $products;
    }

}

?>
