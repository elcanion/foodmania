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
                <h1>Food MGMT</h1>

                <button class="button-new-admin">
                    <a href="#">New Food</a>
                </button>

                <div class="container">
                <table class="table-admin">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>johndoe</td>
                        <td>
                            <button class="button-update-admin">
                                <a href="#">Update Admin</a>
                            </button>
                            <button class="button-delete-admin">
                                <a href="#">Delete Admin</a>
                            </button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>John Doe</td>
                        <td>johndoe</td>
                        <td>
                            <button class="button-update-admin">
                                <a href="#">Update Admin</a>
                            </button>
                            <button class="button-delete-admin">
                                <a href="#">Delete Admin</a>
                            </button>
                        </td>
                    </tr><tr>
                        <td>3</td>
                        <td>John Doe</td>
                        <td>johndoe</td>
                        <td>
                            <button class="button-update-admin">
                                <a href="#">Update Admin</a>
                            </button>
                            <button class="button-delete-admin">
                                <a href="#">Delete Admin</a>
                            </button>
                        </td>
                    </tr>
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