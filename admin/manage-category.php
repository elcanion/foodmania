<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <title>Food Order Website - Admin MGMT</title>
    </head>
    <body>
        <!-- Navbar !-->
        <?php include('partials/navbar.php'); ?>
        <!-- /Navbar !-->
        
        <!-- Main !-->
        <main>
            <div class="wrapper">
                <h1>Category MGMT</h1>

                <?php
                    if(isset($_SESSION['create'])) {
                        echo $_SESSION['create'];
                        unset($_SESSION['create']);
                    }

                ?>


                <button class="button-new-admin">
                    <a href="<?php echo SITEURL; ?>admin/create-category.php">New Category</a>
                </button>

                <div class="container">
                <table class="table-admin">
                    <tr>
                        <th>id</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM tbl_category";
                        $res = mysqli_query($conn, $sql);
                        $count = mysqli_num_rows($res);
                        if($count>0) {
                            while($row=mysqli_fetch_assoc($res)){
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $title; ?></td>

                                    <td>
                                        <?php 
                                            if($image_name!="") {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                                                <?php
                                            } else {
                                                echo "<div class='error>No image. ;)</div>";
                                            }
                                        ?>
                                    </td>
                                    
                                    <td><?php echo $featured; ?></td>
                                    <td><?php echo $active; ?></td>
                                    <td>
                                        <button class="button-update-admin">
                                            <a href="#">Update category</a>
                                        </button>
                                        <button class="button-delete-admin">
                                            <a href="#">Delete category</a>
                                        </button>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            
                            <tr>
                                <td>
                                    <div class="error">No category found yet. :I</div>
                                </td>
                            </tr>

                            <?php
                        }
                    ?>
                   
                </table>
                </div>
            </div>
        </main>
        <!-- /Main !-->

        <!-- Footer !-->
        <?php include('partials/footer.php'); ?>
        <!-- /Footer !-->
    </body>
</html>