<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trader Interface</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="trader.css">
</head>
<body>
    <header class="admin-header">
        <div class="header-container">
            <div class="logo">
                <img src="../Image/WebsiteLogo.png" alt="Website Logo">
            </div>
            <div class="user-info">
                <i class="fas fa-user"></i>
                <span class="user-name">Username</span>
                <div class="logout">
                    <a href="../Login_Signup/login.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <div class="main-container">
        <aside class="sidebar">
            <h1>TRADER PANEL</h1>
            <button id="dashboard-button">Dashboard</button>
            <ul>
                <li><a href="#" onclick="showContent('shops')">Shops</a></li>
                <li><a href="#" onclick="showContent('orders')">Orders</a></li>
                <li><a href="#" onclick="showContent('products')">Products</a></li>
                </li>
            </ul>
        </aside>
        <section class="admin-interface" id="admin-interface">
            <div class="container" id="content-container">
                <!-- Default Content showing all boxes -->
                <div class="boxx" style="background-image: url('../Image/customer.jpg');" onclick="showContent('shops')">
                    <h3>Shops</h3>
                </div>
                <div class="boxx" style="background-image: url('../Image/trader.jpg');" onclick="showContent('orders')">
                    <h3>Orders</h3>
                </div>
                <div class="boxx" style="background-image: url('../Image/products.jpeg');" onclick="showContent('products')">
                    <h3>Products</h3>
                </div>
                <div class="boxx" style="background-image: url('../Image/report.jpg');" onclick="showContent('reports')">
                    <h3>Reports</h3>
                </div>
                <div class="boxx" style="background-image: url('../Image/Dashboard.jpeg');" onclick="showContent('dashboard')">
                    <h3>Oracle<br>Dashboard</h3>
                </div>
            </div>
            <section class="shop-details" id="shop-details">
            <h2 class="details-heading">Shop Details</h2>
                <table class="shop-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Shop Image</th>
                            <th>Shop Name</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="../Image/apple.jpeg" alt=""></a></td>
                            <td>John</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                            <td>Active</td>
                            <td>
                                <button class="update-btn" onclick="">Update</button>
                                <button class="delete-btn" onclick="">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="order-details" id="order-details">
            <h2 class="details-heading">Order Details</h2>
                <table class="order-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Customer Name</th>
                            <th>ORDER_DATE</th>
                            <th>ORDER_STATUS</th>
                            <th>Slot Day</th>
                            <th>Slot Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>customer1</td>
                            <td>2024-05-24</td>
                            <td>panding</td>
                            <td>monday</td>
                            <td>11 am</td>
                        </tr>
                    </tbody>
                </table>
            </section>
            <section class="product-details" id="product-details">
            <h2 class="details-heading">Product Details</h2>
            <div class="btun">
                <button id="add-product-btn">Add Product</button>
            </div>
                <table class="product-table">
                    <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Shop Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img src="../Image/apple.jpeg" alt=""></td>
                            <td>Product 1</td>
                            <td>Lorem ipsum dolor sit amet, consectetur</td>
                            <td>$99.99</td>
                            <td>50</td>
                            <td>Shop A</td>
                            <td>
                                <button class="upd-btn" onclick="">Update</button>
                                <button class="del-btn" onclick="">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </section>
    </div>
    <div id="updateShopModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h1>Update Shop</h1>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="formh-group">
                    <label for="shop-name">Shop Name:</label>
                    <input type="text" id="shop-name" name="shop-name" required>
                </div>
                <div class="formh-group">
                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" id="phone-number" name="phone-number" required>
                </div>
                <div class="formh-group">
                    <label for="shop-email">Shop Email:</label>
                    <input type="email" id="shop-email" name="shop-email" required>
                </div>
                <div class="formh-group">
                    <label for="shop-image">Shop Image:</label>
                    <input type="file" id="shop-image" name="shop-image" accept="image/*" required>
                </div>
                <div class="formh-group">
                    <label for="description">Description:</label>
                    <br />
                    <textarea id="description" name="description" rows="11" cols="50" required></textarea>
                    <br />
                </div>
                <button type="submit" class="next">Update</button>
            </form>
        </div>
    </div>
    <!-- Update Product Modal -->
    <div id="updateProductModal" class="modal1">
        <div class="modal-content1">
            <span class="close-update">&times;</span>
            <h1>Update Product</h1>
            <form action="#" method="post">
                <div class="formh-group1">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product-name" required>
                </div>
                <div class="formh-group1 inline">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="formh-group1 inline">
                    <label for="quantity">Quantity:</label>
                    <input type="number" id="quantity" name="quantity" required>
                </div>
                <div class="formh-group1 inline">
                    <label for="min-order">Min Order:</label>
                    <input type="number" id="min-order" name="min-order" required>
                </div>
                <div class="formh-group1 inline">
                    <label for="max-order">Max Order:</label>
                    <input type="number" id="max-order" name="max-order" required>
                </div>
                <div class="form-group1">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product-image" required>
                </div>
                <div class="formh-group1">
                    <label for="category">Product Category</label>
                    <select type="category" id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="Butchers">Butchers</option>
                        <option value="Greengrocer">Greengrocer</option>
                        <option value="Fishmonger">Fishmonger</option>
                        <option value="Bakery">Bakery</option>
                        <option value="Deliccatessen">Deliccatessen</option>
                    </select>
                </div>
                <div class="formh-group1">
                    <label for="description">Description:</label>
                    <br>
                    <textarea id="description" name="description" rows="11" cols="50" required></textarea>
                    <br>
                </div>
                <button type="submit" class="next1">Update</button>
            </form>
        </div>
    </div>
    <!-- Add Product Modal -->
    <div id="addProductModal" class="modal2">
        <div class="modal-content2">
            <span class="close-add">&times;</span>
            <h1>Add Product</h1>
            <form action="#" method="post">
                <div class="formh-group2">
                    <label for="product-name">Product Name:</label>
                    <input type="text" id="product-name" name="product-name" required>
                </div>
                <div class="formh-group2 inline">
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" required>
                </div>
                <div class="formh-group2 inline">
                    <label for="stock">Stock:</label>
                    <input type="number" id="stock" name="stock" required>
                </div>
                <div class="formh-group2 inline">
                    <label for="min-order">Min Order:</label>
                    <input type="number" id="min-order" name="min-order" required>
                </div>
                <div class="formh-group2 inline">
                    <label for="max-order">Max Order:</label>
                    <input type="number" id="max-order" name="max-order" required>
                </div>
                <div class="form-group2">
                    <label for="product-image">Product Image:</label>
                    <input type="file" id="product-image" name="product-image" required>
                </div>
                <div class="formh-group2">
                    <label for="category">Product Category</label>
                    <select type="category" id="category" name="category" required>
                        <option value="">Select a category</option>
                        <option value="Butchers">Butchers</option>
                        <option value="Greengrocer">Greengrocer</option>
                        <option value="Fishmonger">Fishmonger</option>
                        <option value="Bakery">Bakery</option>
                        <option value="Deliccatessen">Deliccatessen</option>
                    </select>
                </div>
                <div class="formh-group2">
                    <label for="description">Description:</label>
                    <br>
                    <textarea id="description" name="description" rows="11" cols="50" required></textarea>
                    <br>
                </div>
                <button type="submit" class="next2">Add</button>
            </form>
        </div>
    </div>

    <script src="traderInterface.js"></script>
</body>
</html>
