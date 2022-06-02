<?php include('partials/navbar.php'); ?>

<main>
    <div class="wrapper">
        <h1>Update admin</h1>

        <?php
            $id=$_GET['id'];
            $sql="SELECT * FROM tbl_admin WHERE id=$id";
            $res=mysqli_query($conn, $sql);
            
            if($res==TRUE) {
                $count = mysqli_num_rows($res);
                if($count==1) {
                    $row=mysqli_fetch_assoc($res);

                    $full_name = $row['full_name'];
                    $username = $row['username'];

                } else {
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }
        ?>

        <form action="" method="POST">
                    <table>
                        <tr>
                            <td>Full name:</td>
                            <td>
                                <input type="text" name="full_name" 
                                value="<?php echo $full_name; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Username:</td>
                            <td>
                                <input type="text" name="username" 
                                value="<?php echo $username; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                <input type="submit" name="submit"
                                value="Update admin" class="button-update-admin">
                            </td>
                        </tr>
                    </table>
                </form>
    </div>
</main>

<?php
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];

        $sql = "UPDATE tbl_admin SET
                full_name = '$full_name',
                full_name = '$username'
                WHERE id='$id'
        ";

        $res = mysqli_query($conn, $sql);

        if($res==TRUE) {
            $_SESSION['update'] = "Admin updated! :D";
            header('location:'.SITEURL.'admin/manage-admin.php');
        } else {
            $_SESSION['update'] = "Failed to update admin! :(";
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
    }
?>

<?php include('partials/footer.php'); ?>