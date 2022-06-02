<?php include('partials/navbar.php'); ?>

<main>
    <div class="wrapper">
        <h1>Change password</h1>

        <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        ?>

        <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Current password:</td>
                            <td>
                                <input type="password" name="current_password">
                            </td>
                        </tr>
                        <tr>
                            <td>New password:</td>
                            <td>
                                <input type="password" name="new_password">
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm new password:</td>
                            <td>
                                <input type="password" name="confirm_password">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit"
                                value="Change password" class="button-update-admin">
                            </td>
                        </tr>
                    </table>
                </form>
    </div>
</main>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        $sql = "SELECT * FROM tbl_admin WHERE id=$id AND password='$current_password'";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE) {
            $count=mysqli_num_rows($res);

            if($count==1) {
                if($new_password==$confirm_password) {

                    $sql2 = "UPDATE tbl_admin SET
                    password='$new_password'
                    WHERE id='$id'
                    ";
            
                    $res2 = mysqli_query($conn, $sql2);
            
                    if($res2==TRUE) {
                        $_SESSION['update-password'] = "Password updated! :D";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    } else {
                        $_SESSION['update-password'] = "Failed to change password! :(";
                        header('location:'.SITEURL.'admin/manage-admin.php');
                    }

                } else {
                    $_SESSION['password-not-match'] = "Password not match. :(";
                    header('location:'.SITEURL.'admin/manage-admin.php');
                }
            } else {
                $_SESSION['user-not-found'] = "Wrong password/User not found. :(";
                header('location:'.SITEURL.'admin/manage-admin.php');
            }
        }
    }
?>

<?php include('partials/footer.php'); ?>