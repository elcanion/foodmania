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
                <h1>New Admin</h1>

                <?php
                    if(isset($_SESSION['create'])) {
                        echo $_SESSION['create'];
                        unset($_SESSION['create']);
                    }
                ?>

                <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Full name:</td>
                            <td>
                                <input type="text" name="full_name" placeholder="Enter your name">
                            </td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td>
                                <input type="text" name="username" placeholder="Your username">
                            </td>
                        </tr>
                        <tr>
                            <td>Password:</td>
                            <td>
                                <input type="password" name="password" placeholder="Your passwords">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="submit" name="submit"
                                value="Create admin" class="button-new-admin">
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
                $full_name = $_POST['full_name'];
                $username = $_POST['username'];
                $password = md5($_POST['password']);

                
            $sql = "INSERT INTO tbl_admin SET
            full_name='$full_name',
            username='$username',
            password='$password'
            ";

            $res = mysqli_query($conn, $sql);
            if (mysqli_connect_errno()) {
                echo "Error description: " . mysqli_connect_error();
                exit();
            }

            if ($res==TRUE) {
                //echo "Data inserted!";
                $_SESSION['create'] = "Admin created successfully! :D";
                header("location:".SITEURL."admin/manage-admin.php");
            } else {
                //echo "Failed to insert data";
                $_SESSION['create'] = "Failed to create admin :(";
                header("location:".SITEURL."admin/add-admin.php");
            }

            }
        ?>
        <!-- /Form to Database !-->
    </body>
</html>