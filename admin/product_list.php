<div class="card mb-3">
    <div class="card-header">
        لیست نمایش
    </div>
<div class="card-body">
    <div class="table-responsive">
        <table class="table float-right" style="direction: rtl">
            <thead>
                <tr>
                    <th>Row</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>View</th>
                    <th>Delete</th>
                    <th>Edit</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    include("../conn.php");
                    $sql_product="SELECT * FROM  products";
                    $result=mysqli_query($conn, $sql_product);
                    $products = mysqli_fetch_assoc($result);

                    while($row = mysqli_fetch_assoc($result)):                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><img src="../images/<?php echo $row['picture']; ?>" width="100px" height="70px"></td>
                    <td><?php echo $row['title']; ?></td>
                    <td>
                        
                        <?php
                            $cat = $row['cat_id'];
                            $find_category = "SELECT * FROM category WHERE id ='$cat'";
                            $result_category = mysqli_query($conn, $find_category);
                            $row_category = mysqli_fetch_assoc($result_category);
                            if($row_category){
                                echo $row_category['name'];
                            }else{
                                echo "<p class='alert alert-danger'> No category selected yet</?>";
                            }
                        ?>

                    </td>
                    <td>$<?php echo $row['price']; ?></td>
                    <td><a href="../single.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a></td>
                    <td>
                        <a href="delete_product.php?id=<?php echo $row['id'];?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                        <a href="index.php?edit_product&id=<?php echo $row['id'];?>" class="btn btn-warning">Edit</a>
                    </td>
                </tr>
                <?php
                    endwhile;
                ?>
            </tbody>
        </table>
    </div>
</div>
                    </div>
