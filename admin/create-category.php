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
                <h1>Create category</h1>

                <?php

                    if(isset($_SESSION['create'])) {
                        echo $_SESSION['create'];
                        unset($_SESSION['create']);
                    }

                    if(isset($_SESSION['upload'])) {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                ?>

                <form action="" method="POST" enctype="multipart/form-data">
                <table>
                        <tr>
                            <td>Title:</td>
                            <td>
                                <input type="text" name="title" placeholder="Category title">
                            </td>
                        </tr>
                        <tr>
                            <td>Select Image:</td>
                            <td>
                                <input type="file" name="image">
                            </td>
                        </tr>
                        <tr>
                            <td>Featured:</td>
                            <td>
                                <input type="radio" name="featured" value="Yes"> Yes
                                <input type="radio" name="featured" value="No"> No
                            </td>
                        </tr>
                        <tr>
                            <td>Active:</td>
                            <td>
                            <input type="radio" name="active" value="Yes"> Yes
                                <input type="radio" name="active" value="No"> No
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit"
                                value="Create category" class="button-new-admin">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </main>
        <!-- /Main !-->

        <!-- Footer !-->
        <?php include('partials/footer.php'); ?>
        <!-- /Footer !-->

        <!-- Form to Database !-->
        <?php 
                if(isset($_POST['submit'])){
                    $title = $_POST['title'];

                    if(isset($_FILES['image']['name'])){
                        $image_name = $_FILES['image']['name'];

                        $ext = end(explode(".", $image_name));
                        $image_name = $title."-food_category".rand(000, 999).".".$ext;

                        $source_path = $_FILES['image']['tmp_name'];
                        $destination_path = "../images/category/".$image_name;

                        $upload = move_uploaded_file($source_path, $destination_path);

                        if($upload==false) {
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image. :(</div>";
                            header('location:'.SITEURL.'admin/create-category.php');
                            die();
                        }
                    } else {
                        $image_name = "";
                    }

                    if(isset($_POST['featured'])){
                        $featured = $_POST['featured'];
                    } else {
                        $featured = "No";
                    }

                    if(isset($_POST['active'])){
                        $active = $_POST['active'];
                    } else {
                        $active = "No";
                    }
                    
                    $sql = "INSERT INTO tbl_category SET
                    title='$title',
                    image_name='$image_name',
                    featured='$featured',
                    active='$active'
                    ";

                    $res = mysqli_query($conn, $sql);
                    if (mysqli_connect_errno()) {
                        echo "Error description: " . mysqli_connect_error();
                        exit();
                    }

                    if ($res==TRUE) {
                        //echo "Data inserted!";
                        $_SESSION['create'] = "Category created successfully! :D";
                        header("location:".SITEURL."admin/create-category.php");
                    } else {
                        //echo "Failed to insert data";
                        $_SESSION['create'] = "Failed to create category :(";
                        header("location:".SITEURL."admin/create-category.php");
                    }


                }
        ?>
        <!-- /Form to Database !-->
    </body>
</html>