<?php
include("../conn.php");
$id = $_GET['id'];
$sql_current = "SELECT * FROM products WHERE id = '$id'";
$result_currect = mysqli_query($conn, $sql_current);
$row = mysqli_fetch_assoc($result_currect);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="update_product.php" method="post" enctype='multipart/form-data' mean?>
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <input type="text" value="<?php echo $row['title'] ?>" name="title" id="" class="form-control" placeholder="product name">
                </div>
                <div class="form-group">
                    <textarea value="" name="description" id="" class="form-control" placeholder="description"><?php echo $row['description'] ?></textarea>
                </div>
                <div class="form-group row">
                    <div class="col-xs-3">
                        <input type="number" value="<?php echo $row['price'] ?>" name="price" id="" class="form-control" style="margin-left: 14px;" size="60" placeholder="price">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-xs-3">
                        <input type="file" name="picture" class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    
                    <div class="form-group">
                        <input type="submit" value="submit" cols="30" rows="10" class="form-control" placeholder="discription">
                    </div>
                </div>
            </div>
        </div>
    </form>
</html>