<?php 
    include('../config/constants.php');
    include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    <body>
        <!-- Navbar !-->
        <nav>
            <div class="wrapper">
                <ul>
                    <li><a href="/food-order/admin/index.php">Home</a></li>
                    <li><a href="/food-order/admin/manage-admin.php">Admin</a></li>
                    <li><a href="/food-order/admin/manage-category.php">Category</a></li>
                    <li><a href="/food-order/admin/manage-food.php">Food</a></li>
                    <li><a href="/food-order/admin/manage-order.php">Order</a></li>
                    <?php
                        if(isset($_SESSION['user'])){
                            echo '<li><a href="/food-order/admin/logout.php">Logout</a></li>';
                        } else {
                            echo '<li><a href="/food-order/admin/login.php">Login</a></li>';
                        }
                    ?>
                </ul>
            </div>
        </nav>
        <!-- /Navbar !-->
    </body>
</html>