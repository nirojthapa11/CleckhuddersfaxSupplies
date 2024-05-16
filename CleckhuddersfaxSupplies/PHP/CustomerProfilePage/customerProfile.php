<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Side Navigation Bar</title>
	<link rel="stylesheet" href="customerProfile.css">
    <link rel="stylesheet" href="../HeaderPage/head.css">
    <link rel="stylesheet" href="../FooterPage/footer.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div><?php include('../HeaderPage/head.php');?></div>
    <div class="wrapper">
        <div class="sidebar">
            <ul>
                <li><a href="customerProfile.php"><i class="fas fa-user"></i>My Profile</a></li>
                <li><a href="#"><i class="fas fa-cart-shopping"></i>My Orders</a></li>
                <li><a href="myWishlist.php"><i class="fas fa-heart"></i>My Whislist</a></li>
                <li><a href="#"><i class="fas fa-money-bill"></i></i>Payment</a></li>
                <li><a href="#"><i class="fas fa-cart-shopping"></i>My Cart</a></li>
            </ul> 
        </div>
        <div class="main_content">
            <div class="he">My Profile</div>  
            <div class="profile-content">
                <div>
                <img src="../Image/usericon.png" alt="User Image">
                <button type="submit" class="but">Upload Picture</button>
                </div>
                <div class="profile-container">
                    <form id="registration-form">
                        <h2>Personal Information</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first-name">First Name:</label>
                                <input type="text" id="first-name" name="first-name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name:</label>
                                <input type="text" id="last-name" name="last-name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label for="phone-number">Phone Number:</label>
                                <input type="tel" id="phone-number" name="phone-number" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="age">Age:</label>
                                <input type="number" id="age" name="age" required>
                            </div>
                            <div class="form-group">
                                <label for="gender">Gender:</label>
                                <select name="gender" id="gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group full-width">
                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <button type="button" class="button-group">Edit</button>
                            <button type="submit" class="button-group">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include('../FooterPage/footer.php');?>
    <script src="../HeaderPage/head.js"></script>
</body>
</html>