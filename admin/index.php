<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/admin.css">
        <title>Food Order Website - Home</title>
    </head>
    <body>
        <!-- Navbar !-->
        <?php include('partials/navbar.php'); ?>
        <!-- /Navbar !-->
        
        <!-- Main !-->
        <main>
            <div class="wrapper">
                <h1>Dashboard</h1>

                <?php 
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                ?>

                <div class="container">
                    <div class="col-4">
                        <h1>5</h1>
                        Categories
                    </div>
                    <div class="col-4">
                        <h1>5</h1>
                        Categories
                    </div>
                    <div class="col-4">
                        <h1>5</h1>
                        Categories
                    </div>
                    <div class="col-4">
                        <h1>5</h1>
                        Categories
                    </div>
                </div>
            </div>
        </main>
        <!-- /Main !-->

        <!-- Footer !-->
        <?php include('partials/footer.php'); ?>
        <!-- /Footer !-->
    </body>
</html>