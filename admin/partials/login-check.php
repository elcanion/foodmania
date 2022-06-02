<?php
    if(!isset($_SESSION['user'])){
        $_SESSION['not-logged-message'] = "<div class='error'>Please log in to access the admin panel. :D</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>