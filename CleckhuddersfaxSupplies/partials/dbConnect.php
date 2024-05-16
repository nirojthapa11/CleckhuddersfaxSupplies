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
    public function executeQuery($query, $params = [])
    {
        $statement = oci_parse($this->conn, $query);
        if (!$statement) {
            $m = oci_error($this->conn);
            throw new Exception("Error preparing query: " . $m['message']);
        }
        foreach ($params as $key => $value) {
            oci_bind_by_name($statement, ":" . $key, $value);
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
}

?>
