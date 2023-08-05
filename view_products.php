<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products</title>
    <link rel="stylesheet" href="./view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css%22/%3E">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

</head>

<body>
    <!--navbar ----------------------------------------------->


    <nav style="position: relative">
        <input type="checkbox" id="check">
        <div style="display: flex">
            <label class="logo">ComAcc</label>
            <label for="check" class="checkbtn">
                <i style="font-size:20px" class="fa fa-bars"></i>
            </label>
        </div>
        <ul style="position: absolute; right: 5px; top: 5px">
            <li><a class="active" href="./add_products.php">Home</a></li>
            <li><a href="./view_products.php">View Products</a></li>
        </ul>
    </nav>

    <!--cards----------------------------------------------->

    <div class="container">
        <div class="card-container">
            <?php
            if (isset($_SESSION['products'])) {
                $count = 1;
                foreach ($_SESSION['products'] as $product) {
                    echo '<div class="card">';
                    echo '<img src="' . $product['itemImage']  . '" alt="Item Image"" class="card-image">';
                    echo '<div class="card-content">';
                    echo '<h3>' . $product['itemName'] . '</h3>';
                    echo '<p>Price: ' . $product['itemPrice'] . '</p>';
                    echo '<p>' . $product['itemDesc'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    $count++;
                }
            } else {
                echo '<p>No Items Available</p>';
            }
            ?>
        </div>
    </div>


    <!--footer ----------------------------------------------->

    <footer class="footer" id="footer">
        <div class="containerf">
            <div class="row">
                <div class="footer-col">
                    <h4>Our Location</h4>
                    <ul>
                        <li><a href="#">Jordan</a></li>
                        <li><a href="#">Irbid</a></li>
                        <li><a href="#">Computer Accessories Shop</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Contact us</h4>
                    <ul>
                        <li><a href="#">ComAcc@gmail.com</a></li>
                        <li><a href="#">+96277777777</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href="#"> <i class='bx bxl-instagram'></i></a>
                        <a href="#"><i class='bx bxl-facebook'></i></i></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</body>

</html>