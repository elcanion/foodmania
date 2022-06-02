<?php 
    include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <title>Food Order Website - Home</title>
    </head>
    <body>
        
        <!-- Main !-->
        <main>
            <div class="wrapper">
                <h1>Login</h1>

                <?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['not-logged-message'])){
                        echo $_SESSION['not-logged-message'];
                        unset($_SESSION['not-logged-message']);
                    }
                ?>

                <div class="login">
                    <form action="" method="POST">
                        Username:
                        <input type="text" name="username" placeholder="Enter your username" class="login-input">
                        Password:
                        <input type="password" name="password" placeholder="Enter your password" class="login-input">
                        <input type="submit" name="submit" value="Login">
                    </form>
                </div>
            </div>
        </main>
        <!-- /Main !-->

        <!-- Footer !-->
        <?php include('partials/footer.php'); ?>
        <!-- /Footer !-->
    </body>
</html>

<?php
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";

    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count==1) {
        $_SESSION['login'] = 'Login successful! :D';
        $_SESSION['user'] = $username;

        header('location:'.SITEURL.'admin/');
    } else {
        $_SESSION['login'] = 'Login failed! Username or password did not match :(';
        header('location:'.SITEURL.'admin/login.php');
    }
}
?>