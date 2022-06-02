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
                <h1>Admin MGMT</h1>
                <?php
                    if(isset($_SESSION['create'])) {
                        echo $_SESSION['create'];
                        unset($_SESSION['create']);
                    }
                    if(isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    if(isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                    if(isset($_SESSION['user-not-found'])) {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }
                    if(isset($_SESSION['password-not-match'])) {
                        echo $_SESSION['password-not-match'];
                        unset($_SESSION['password-not-match']);
                    }
                    if(isset($_SESSION['update-password'])) {
                        echo $_SESSION['update-password'];
                        unset($_SESSION['update-password']);
                    }
                ?>
                
                <button class="button-new-admin">
                    <a href="new-admin.php">New Admin</a>
                </button>

                <div class="container">
                <table class="table-admin">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Actions</th>
                    </tr>

                    <?php
                        $sql = "SELECT * FROM tbl_admin";
                        $res = mysqli_query($conn, $sql);

                        if ($res==TRUE){
                            $row_count = mysqli_num_rows($res);

                            if ($row_count > 0) {
                                while($rows=mysqli_fetch_assoc($res)) {
                                    $id=$rows['id'];
                                    $full_name=$rows['full_name'];
                                    $username=$rows['username'];

                                    ?>

                                <tr>
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $full_name ?></td>
                                    <td><?php echo $username ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id?>">
                                        <button class="button-update-admin">
                                            Update Password
                                        </button>
                                        </a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id?>">
                                        <button class="button-update-admin">
                                            Update Admin
                                        </button>
                                        </a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id?>">
                                        <button class="button-delete-admin">
                                            Delete Admin
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                                    <?php
                                }
                            } else {

                            }
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