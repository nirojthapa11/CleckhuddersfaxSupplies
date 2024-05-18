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
    
    if (!oci_execute($statement)) {
        $m = oci_error($statement);
        throw new Exception("Error executing query: " . $m['message']);
    }
    
    $row = oci_fetch_array($statement, OCI_ASSOC + OCI_RETURN_LOBS);

    if ($row && isset($row['PRODUCT_IMAGE'])) {
        $imageData = $row['PRODUCT_IMAGE'];
        $imageBase64 = base64_encode($imageData);
        return $imageBase64;
    } else {
        return ''; 
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
            $query = "SELECT product_id, quantity, special_instruction FROM cart_product WHERE cart_id = :cart_id";

            // Get the database connection
            $conn = $this->getConnection();

            // Prepare the statement
            $statement = oci_parse($conn, $query);

            // Bind parameters
            oci_bind_by_name($statement, ":cart_id", $cartId);

            // Execute the statement
            oci_execute($statement);

            // Fetch rows one by one
            while ($row = oci_fetch_assoc($statement)) {
                // Ensure that the fetched row has the required keys
                if (isset($row['PRODUCT_ID'], $row['QUANTITY'], $row['SPECIAL_INSTRUCTION'])) {
                    // Store the cart item with product_id as key in the cartItems array
                    $cartItems[$row['PRODUCT_ID']] = array(
                        'quantity' => $row['QUANTITY'],
                        'special_instruction' => $row['SPECIAL_INSTRUCTION']
                    );

                    // Log debug information for each row
                    var_dump($row['PRODUCT_ID']);
                    var_dump($row['QUANTITY']);
                    var_dump($row['SPECIAL_INSTRUCTION']);
                } else {
                    // Log or handle the missing keys in the fetched row
                    // You can choose to skip or handle this case based on your requirements
                    // For now, we'll skip adding the item to the cartItems array
                }
            }

            // Close the connection
            oci_close($conn);

        } catch (Exception $e) {
            // Handle exceptions
            throw new Exception("Error fetching cart items: " . $e->getMessage());
        }

        // Log debug information
        echo '<br>inside db getcartitems ';
        var_dump($cartItems);
        echo '<br>';

        return $cartItems;
    }


    public function updateCartItem($user_id, $product_id, $quantity, $special_instruction)
    {
        try {
            // Get the database connection
            $conn = $this->getConnection();
            $cartId = $this->getCartIdUsingCustomerId($user_id);
            // echo '<br>cartid: ';
            // var_dump($cartId);
            // echo '<br>';

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

    public function insertCartItem($user_id, $product_id, $quantity, $special_instruction)
    {
        try {
            // Get the database connection
            $conn = $this->getConnection();
            $cartId = $this->getCartIdUsingCustomerId($user_id);

            // echo '<br>cartid: ';
            // var_dump($cartId);
            // echo '<br>';

            // Prepare the SQL query
            $query = "INSERT INTO cart_product (cart_id, product_id, quantity, special_instruction) 
                  VALUES (:cart_id, :product_id, :quantity, :special_instruction)";

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
            throw new Exception("Error inserting cart item: " . $e->getMessage());
        }
    }

    public function getProductFromWishlist($customerId)
    {
        $wishlistProducts = array();
        try {
            $query = "SELECT p.*, c.category_name, s.shop_name
                  FROM product p 
                  JOIN favourite f ON p.product_id = f.product_id
                  JOIN category c ON p.category_id = c.category_id
                  JOIN shop s ON s.shop_id = p.shop_id
                  WHERE f.customer_id = :customer_id";
            $statement = $this->executeQuery($query, array("customer_id" => $customerId));
            while ($row = $this->fetchRow($statement)) {
                $wishlistProducts[] = $row;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $wishlistProducts;
    }


    // From wishlist to cart in database when clicked addto cart.
    public function updateOrInsertCartItem($userId, $productId, $quantity, $specialInstruction)
    {
        $cartId = $this->getCartIdUsingCustomerId($userId);
        $conn = $this->getConnection();

        $query = "SELECT quantity, special_instruction FROM cart_product WHERE cart_id = :cart_id AND product_id = :product_id";
        $statement = oci_parse($conn, $query);

        oci_bind_by_name($statement, ":cart_id", $cartId);
        oci_bind_by_name($statement, ":product_id", $productId);

        oci_execute($statement);

        $existingCartItem = oci_fetch_assoc($statement);

        if ($existingCartItem) {
            $existingQuantity = $existingCartItem['QUANTITY'];
            $existingSpecialInstruction = $existingCartItem['SPECIAL_INSTRUCTION'];
            $newQuantity = $existingQuantity + $quantity;
            $this->updateCartItem($userId, $productId, $newQuantity, $specialInstruction);
            return; 
        } else {
            $this->insertCartItem($userId, $productId, 1, '');
            return;
        }
    }

    // Remove the product from wishlist after the product is added into the cart.
    public function removeFromWishlist($customerId, $productId)
    {
        $conn = $this->getConnection();
        $query = "DELETE FROM favourite WHERE customer_id = :customer_id AND product_id = :product_id";

        $statement = oci_parse($conn, $query);

        oci_bind_by_name($statement, ":customer_id", $customerId);
        oci_bind_by_name($statement, ":product_id", $productId);

        if (oci_execute($statement)) {
            return; 
        } else {
            return;
        }
    }

    // Update favourtite table when clicked add to wishlist on a product.
    public function addToWishlist($productId, $customerId)
    {
        $conn = $this->getConnection();
        
        // Check if the product already exists in the wishlist
        $query = "SELECT * FROM Favourite WHERE product_id = :product_id AND customer_id = :customer_id";
        $statement = oci_parse($conn, $query);
        oci_bind_by_name($statement, ":product_id", $productId);
        oci_bind_by_name($statement, ":customer_id", $customerId);
        oci_execute($statement);
    
        $existingProduct = oci_fetch_assoc($statement);
        if ($existingProduct) {
            // Product already exists in the wishlist
            return;
        }
    
        // Insert the product into the wishlist
        $query = "INSERT INTO Favourite (product_id, customer_id) VALUES (:product_id, :customer_id)";
        $statement = oci_parse($conn, $query);
        oci_bind_by_name($statement, ":product_id", $productId);
        oci_bind_by_name($statement, ":customer_id", $customerId);
        oci_execute($statement);
    }
    






}

?>