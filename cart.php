<?php
session_start();

$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - SNV AGRO FARM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="left">SNV AGRO FARM</div>
        <div class="right">
            <a href="index.php ">Home</a>
            <a href="index.php #products">Products</a>
            <a href="index.php #xyz">Crop Care</a>
            <a href="index.php #reviews">Reviews</a>
            <a href="index.php #about">About Us</a>
            <?php if (!isset($_SESSION['email'])) { ?>
                <a class="special" href="regiterandlogin.php">Log In</a>
            <?php } else { ?>
                <a class="" href="cart.php">Cart</a>
                <a class="special" href="logout.php">Log Out</a>
            <?php } ?>
        </div>
    </nav>

    <div class="section">
        <h2>Your Cart</h2>
        <?php if (empty($cart)) { ?>
            <p>Your cart is empty.</p>
        <?php } else { ?>
            <table>
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cart as $item) { ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['name']); ?></td>
                            <td><?php echo htmlspecialchars($item['price']); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <form method="POST" action="clear_cart.php">
                <button type="submit">Clear Cart</button>
            </form>
        <?php } ?>
    </div>

    <script src="animation.js"></script>
    <script src="addToCart.js"></script>
</body>
</html>
