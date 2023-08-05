<?php
session_start();

if (!isset($_SESSION['itemCounter'])) {
    $_SESSION['itemCounter'] = 1;
}

if(isset($_POST['addItem'])) {
    $itemName = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc = $_POST['itemDesc'];

    if(empty($itemName) || empty($itemPrice) || empty($itemDesc)) {
        $message = 'Please Add Item Information Before';
    } else {
        $itemCounter = $_SESSION['itemCounter'];
        $_SESSION['products'][] = array(
            'itemName' => $itemName,
            'itemPrice' => $itemPrice,
            'itemDesc' => $itemDesc,
            'itemImage' => "./images/item$itemCounter.webp",
        );
        $message = 'Item Added Successfully';
        $_SESSION['itemCounter']++; 
    }
}


if(isset($_GET['clear']) && $_GET['clear'] === 'true') {
    unset($_SESSION['products']);
    $_SESSION['itemCounter'] = 1; 
}

?>

<!---------------------------------------------------------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="add.css">
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

    <!--header ----------------------------------------------->

    <div class="slide-container">

        <div class="mySlides">
            <img src="./images/background.png">
        </div>

    </div>

    <br>




    <!--Body ----------------------------------------------->



    <div class="container">
        <div class="message-block">
            <p class="message">Display Message</p>
        </div>
        <div class="message-block <?php if(isset($message)) echo 'active'; ?>">
            <?php
                echo '<span class="message">'.$message.'</span>';
            ?>
        </div>

        <div class="itemForm">
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <h3>Add New Item</h3>

                <input type="text" placeholder="Enter Item Name" name="itemName" class="box">
                <input type="number" placeholder="Enter Item Price" name="itemPrice" class="box">
                <input type="text" placeholder="Enter Item Description" name="itemDesc" class="box">
                <input type="submit" class="btn" name="addItem" value="Add Products">

            </form>
        </div>
    </div>



    <div class="itemDetails">
        <table class="itemDetails">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php
            if(isset($_SESSION['products'])) {
                foreach ($_SESSION['products'] as $product) {
                    echo '<tr>';
                    echo '<td><img src="' . $product['itemImage']  . '" alt="Item Image" class="itemImage"></td>';
                    echo '<td>' . $product['itemName'] . '</td>';
                    echo '<td>' . $product['itemPrice'] . '</td>';
                    echo '<td>' . $product['itemDesc'] . '</td>';
                    echo '</tr>';
                    
                }
            } else {
                echo '<tr><td colspan="3">No Items Available</td></tr>';
            }
            ?>
            </tbody>
        </table>
    </div>


   


    <div class="detail">

    <div class="clear-session">
        <a href="?clear=true" class="btn">Clear</a>
    </div>

        <a href="./view_products.php" class="btn">View Products</a>
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
                    <h4>Contact Us</h4>
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