<?php
session_start();
include("connection.php");

$yourName = '';

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = mysqli_query($conn, "SELECT register.YourName FROM `register` WHERE register.email='$email'");
    if ($row = mysqli_fetch_array($query)) {
        $yourName = $row['YourName'];
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>
        SNV AGRO FARM</title>
    <link rel="stylesheet" href="style.css">
    
    
</head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Open+Sans:ital,wght@1,800&display=swap" rel="stylesheet">
<body>
    <nav>
       
        <div class="left">SNV AGRO FARM
        </div>
        <div class="right">
            <a href="#home">Home</a>
            <a href="#products"> Products</a>
            <a href="#xyz">Crop Care</a>
            <a href="#reviews">Reviews</a>
            <a href="#about">About Us</a>
            

            <?php if (!isset($_SESSION['email'])) { ?> <!-- Check if user is not logged in -->
                <a class="special" href="regiterandlogin.php">Log In</a>
            <?php } ?>
            <?php if (isset($_SESSION['email'])) { ?> <!-- Check if user is logged in -->
                <a class="" href="cart.php">Cart</a>
                <a class="special" href="logout.php">Log Out</a>
            <?php } ?>
           
            
            
        </div>
    </nav>


    

    <div id="home" class="section">
    <p id="username-display">Hello, <?php echo htmlspecialchars($yourName); ?></p>
        <h2 class="up1" >WELCOME TO SNV AGRO FARM</h2>
        
        <p class="up2" >We provide high-quality agricultural products to meet all your farming needs.</p>
    </div>

    <div id="products" class="">
        <?php
        // Example array of products. In a real scenario, you would fetch this from a database.
        $products = [
            ['name' => 'ULALA', 'price' => '₹99.99', 'image' => 'ULALA_img-removebg-preview.png'],
            ['name' => 'Urea', 'price' => '₹199.99', 'image' => 'image3.png'],
            ['name' => 'Organic Fertilizer', 'price' => '₹349.99', 'image' => 'image1.png'],
            ['name' => 'Coragen', 'price' => '₹199.99', 'image' => 'FMCCoragenInsecticide-removebg-preview.png'],
            ['name' => 'PNG-9', 'price' => '₹700', 'image' => 'image2.png'],
            ['name' => 'ULALA', 'price' => '₹99.99', 'image' => 'ULALA_img-removebg-preview.png'],
            ['name' => 'PNG-9', 'price' => '₹700', 'image' => 'image2.png'],
            ['name' => 'Coragen', 'price' => '₹199.99', 'image' => 'FMCCoragenInsecticide-removebg-preview.png'],
            ['name' => 'ULALA', 'price' => '₹99.99', 'image' => 'ULALA_img-removebg-preview.png'],
            ['name' => 'Coragen', 'price' => '₹199.99', 'image' => 'FMCCoragenInsecticide-removebg-preview.png'],
            ['name' => 'Coragen', 'price' => '₹199.99', 'image' => 'image3.png'],
            ['name' => 'Coragen', 'price' => '₹199.99', 'image' => 'FMCCoragenInsecticide-removebg-preview.png'],
            
        ];
        
        foreach ($products as $product) {
            echo '<div class="box">';
            echo '<a href="product_info.php"><img src="'.$product['image'].'" alt=""></a>';
            echo '<div class="product-info">';
            echo '<p class="product-name">'.$product['name'].'</p>';
            echo '<p class="product-price">'.$product['price'].'</p>';
            echo '<div class="button-container">';  // Container for buttons
            echo '<button class="action-button">Buy Now</button>';
            if (isset($_SESSION['email'])) { // Check if user is logged in
                echo '<form method="POST" action="add_to_cart.php" style="display:inline;">';
                echo '<input type="hidden" name="product_name" value="'.$product['name'].'">';
                echo '<input type="hidden" name="product_price" value="'.$product['price'].'">';
                echo '<button type="submit" class="action-button">Add to Cart</button>';
                echo '</form>';
            } else {
                echo '<button class="action-button" disabled>(Login Required)</button>';
                
            }
            echo '</div>';  // End of button container
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>

    </div>
                 
    <div id="xyz" class="section">
        <h2>Crop Care Recommendations</h2>
        <table class="crop-care-table">
            <thead>
                <tr>
                    <th>Crop</th>
                    <th>Stage</th>
                    <th>Recommended Nutrients</th>
                    <th>Pesticides/Fungicides</th>
                    <th>Additional Tips</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Wheat</td>
                    <td>Growth Stage</td>
                    <td>Nitrogen, Phosphorus, Potassium</td>
                    <td>Herbicides, Fungicides</td>
                    <td>Ensure proper irrigation and monitor for signs of nutrient deficiencies.</td>
                </tr>
                <tr>
                    <td>Wheat</td>
                    <td>Flowering Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides, Fungicides</td>
                    <td>Protect from pests like aphids and maintain soil moisture levels.</td>
                </tr>
                <tr>
                    <td>Rice</td>
                    <td>Vegetative Stage</td>
                    <td>Nitrogen, Phosphorus, Potassium</td>
                    <td>Herbicides, Insecticides (for specific pests)</td>
                    <td>Keep fields flooded to control weeds and apply fertilizers in split doses.</td>
                </tr>
                <tr>
                    <td>Rice</td>
                    <td>Reproductive Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides, Fungicides (for disease control)</td>
                    <td>Maintain proper water levels and watch for fungal diseases.</td>
                </tr>
                <tr>
                    <td>Maize</td>
                    <td>Emergence Stage</td>
                    <td>Nitrogen</td>
                    <td>Herbicides</td>
                    <td>Ensure good seed-to-soil contact and control early weeds.</td>
                </tr>
                <tr>
                    <td>Maize</td>
                    <td>Silking Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides</td>
                    <td>Protect silks from pests and ensure adequate water supply.</td>
                </tr>
                <tr>
                    <td>Potato</td>
                    <td>Vegetative Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Fungicides</td>
                    <td>Monitor for early blight and apply mulches to conserve moisture.</td>
                </tr>
                <tr>
                    <td>Potato</td>
                    <td>Tuber Formation Stage</td>
                    <td>Potassium</td>
                    <td>Insecticides, Fungicides</td>
                    <td>Ensure consistent watering and protect against late blight.</td>
                </tr>
                <tr>
                    <td>Soybean</td>
                    <td>Vegetative Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Herbicides</td>
                    <td>Maintain weed-free fields and monitor for signs of nutrient stress.</td>
                </tr>
                <tr>
                    <td>Soybean</td>
                    <td>Reproductive Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides</td>
                    <td>Protect from pod-boring insects and ensure adequate moisture.</td>
                </tr>
                <tr>
                    <td>Cotton</td>
                    <td>Seedling Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Herbicides</td>
                    <td>Ensure proper seedling spacing and early weed control.</td>
                </tr>
                <tr>
                    <td>Cotton</td>
                    <td>Flowering Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides, Fungicides</td>
                    <td>Monitor for bollworms and apply fertilizers in split doses.</td>
                </tr>
                <tr>
                    <td>Tomato</td>
                    <td>Vegetative Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Fungicides</td>
                    <td>Ensure proper staking and monitor for early blight.</td>
                </tr>
                <tr>
                    <td>Tomato</td>
                    <td>Fruit Setting Stage</td>
                    <td>Potassium</td>
                    <td>Insecticides, Fungicides</td>
                    <td>Protect fruits from pests and diseases and ensure even watering.</td>
                </tr>
                <tr>
                    <td>Carrot</td>
                    <td>Seedling Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Herbicides</td>
                    <td>Ensure proper thinning of seedlings and control early weeds.</td>
                </tr>
                <tr>
                    <td>Carrot</td>
                    <td>Root Development Stage</td>
                    <td>Phosphorus, Potassium</td>
                    <td>Insecticides</td>
                    <td>Maintain even moisture and avoid soil compaction.</td>
                </tr>
                <tr>
                    <td>Onion</td>
                    <td>Vegetative Stage</td>
                    <td>Nitrogen, Phosphorus</td>
                    <td>Herbicides</td>
                    <td>Ensure good soil drainage and monitor for nutrient deficiencies.</td>
                </tr>
                <tr>
                    <td>Onion</td>
                    <td>Bulb Formation Stage</td>
                    <td>Potassium</td>
                    <td>Insecticides, Fungicides</td>
                    <td>Ensure consistent watering and protect against fungal diseases.</td>
                </tr>
                <!-- Add more rows for other crops and their respective stages -->
            </tbody>
        </table>
    </div>



    <div id="reviews" class="">
    <h2>Customer Reviews</h2>
    <div class="review">
        <div class="review-header">
            <img src="user2.png" alt="User 1">
            <div class="review-info">
                <h3>Atmaram patil</h3>
                <p>Verified Buyer</p>
            </div>
        </div>
        <div class="review-body">
            <p>"I've been purchasing from SNV AGRO FARM for years now, and I'm always impressed with the quality of their products. Highly recommended!"</p>
        </div>
    </div>
    <div class="review">
        <div class="review-header">
            <img src="user1.png" alt="User 2">
            <div class="review-info">
                <h3>Jane Smith</h3>
                <p>Happy Customer</p>
            </div>
        </div>
        <div class="review-body">
            <p>"The customer service at SNV AGRO FARM is exceptional. They are always responsive and helpful. Keep up the great work!"</p>
        </div>
    </div>
    <div class="review">
        <div class="review-header">
            <img src="user2.png" alt="User 1">
            <div class="review-info">
                <h3>Atmaram patil</h3>
                <p>Verified Buyer</p>
            </div>
        </div>
        <div class="review-body">
            <p>"I've been purchasing from SNV AGRO FARM for years now, and I'm always impressed with the quality of their products. Highly recommended!"</p>
        </div>
    </div>
    <!-- Add more reviews here -->
</div>



    <div id="about" class="section">
    <h2>About Us</h2>
    <div class="about-content">
        <p>Welcome to SNV AGRO FARM, your trusted partner in agriculture.</p>
        <p>At SNV AGRO FARM, we are committed to providing farmers with top-quality products and services to help them achieve success in their agricultural endeavors.</p>
        <p>Our farm is located at:</p>
        <address>
            Adgoan, Phulambri <br>
            Samhajinagar, Maharashtra, India
        </address>
        <p>Contact us:</p>
        <ul>
            <li><strong>Email:</strong> <a href="">snvagrofarm@info.com</a></li>
            <li><strong>Phone:</strong> <a href="">+91 8766055949</a></li>
        </ul>
        <p>Connect with us on social media:</p>
        <ul class="social-media">
            <li><a href="https://www.facebook.com/snvagrofarm" target="_blank" rel="noopener noreferrer"><i class="fab fa-facebook-f"></i> SNV Agro Farm</a></li>
            <li><a href="https://twitter.com/snvagrofarm" target="_blank" rel="noopener noreferrer"><i class="fab fa-twitter"></i> @snvagrofarm</a></li>
        </ul>
    </div>
</div>

    <footer class="copyright">
        <p>Copyright &copy 2024 SNV.com</p>
    </footer>

    
<script src="animation.js"></script>
<script src="addToCart.js"></script>

</body>
</html>
