<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>admin panel</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>

</head>
<body>
<nav class="nav top-bar">
<h2 class="float-left">Admin Panel</h2>
</nav>
   
   <div class="container-fluid">
        <div class="row admin-panel">
            <div class="col-2">
                <div class="list-item">
                    <a href="../index.php">Shop</a>
                    <a href="index.php?new=done">New product</a>
                    <a href="index.php?order=done">Order</a>
                    <a href="index.php?product_list">Product list</a>
                    <a href="index.php?comment=done">Comments</a>
                    <a href="#">Signout</a>
                </div>
            </div>
            <div class="col-10">

            <?php
                if(isset($_GET['new'])){
                    include ('add_product.php');
                }elseif(isset($_GET['order'])){
                    include ('order.php'); 
                }elseif(isset($_GET['product_list'])){
                    include ('product_list.php'); 
                }elseif(isset($_GET['edit_product'])){
                    include ('edit_product.php'); 
                }
            ?>

                

            </div>
        </div>
   </div>


    
</body>
</html>