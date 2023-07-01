<?php include("includes/admin_header.php");?>

<?php 

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        $query = "SELECT * FROM users WHERE username = '{$username}'";

        $select_user_profile_query = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc( $select_user_profile_query)) {
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
        }
    }



?>



<?php 

    if(isset($_POST['edit_user'])){

        $user_firstname = $_POST['user_firstname'];
        $user_role = $_POST['user_role'];
        $user_lastname = $_POST['user_lastname'];
        $username = $_POST['username'];
        // $post_image = $_FILES['image']['name'];
        // $post_image_temp = $_FILES['image']['tmp_name'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        
        // move_uploaded_file($post_image_temp, "../images/". $post_image);

        $query ="UPDATE users SET";
        $query .=" username = '$username',";
        $query .= "user_password = '$user_password', ";
        $query .="user_firstname = '$user_firstname', ";
        $query .="user_lastname = '$user_lastname', ";
        $query .="user_email = '$user_email',";
        // $query .="user_image = $user_image";
        $query .="user_role = '$user_role' ";

        $update_user = mysqli_query($connection, $query);


        confirmQuery($update_user);
    }
?>





?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include("includes/admin_navigation.php") ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">
                           Welcome Admin
                            <small>Author</small>
                        </h1>



                        <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" name="user_firstname" class="form-control" value="<?php echo $user_firstname;?>">
    </div>

    <div class="form-group">
        <select name="user_role"  class="form-control">
            
            <option  value="<?php echo $user_role;?>"> <?php echo $user_role;?></option>
            <?php 
                if($user_role =='admin'){
                    echo "<option value='subscriber'>Subscriber</option>";
                }else{
                    echo "<option value='admin'>Admin</option>";
                }

            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="author">Lastname</label>
        <input type="text" name="user_lastname" class="form-control"  value="<?php echo $user_lastname;?>">
    </div>

    <div class="form-group">
        <label for="post-status">Username</label>
        <input type="text" name="username" class="form-control"  value="<?php echo $username;?>">
    </div>

    <!-- <div class="form-group">
        <label for="post-image">Post Image</label>
        <input type="file" name="image" class="form-control">
    </div> -->

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="user_email" class="form-control"  value="<?php echo $user_email;?>">
    </div>

    <div class="form-group">
        <label for="post-tags">Password</label>
        <input type="password" name="user_password" class="form-control" value="<?php echo $user_password;?>">
    </div>

    

     <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">
     </div>
</form>

                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  <?php include("includes/admin_footer.php");?>
