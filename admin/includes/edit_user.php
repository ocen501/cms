
	<?php 

	if(isset($_GET['user_id'])){
		$the_user_id = $_GET['user_id'];
		$query = "SELECT * FROM users WHERE user_id = $the_user_id";
		$select_user_by_id = mysqli_query($connection, $query);

		 while($row = mysqli_fetch_assoc($select_user_by_id)){
	        $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname = $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];
	    }
	}

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

			$query = "SELECT randSalt FROM users";
       		$select_randsalt_query = mysqli_query($connection, $query);

       		if(!$select_randsalt_query){
       			die("Query Failed.". mysqli_error($connection));
       		}

       		$row = mysqli_fetch_array($select_randsalt_query);
            $salt = $row['randSalt'];
            $hashed_password = crypt($user_password, $salt);
    


			$query ="UPDATE users SET";
			$query .=" username = '$username',";
			$query .= "user_password = '$hashed_password', ";
			$query .="user_firstname = '$user_firstname', ";
			$query .="user_lastname = '$user_lastname', ";
			$query .="user_email = '$user_email',";
			// $query .="user_image = $user_image";
			$query .="user_role = '$user_role' ";
			$query .= "WHERE user_id = '$the_user_id' ";

			$update_user = mysqli_query($connection, $query);


			confirmQuery($update_user);
		}
	?>
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
        <input class="btn btn-primary" type="submit" name="edit_user" value="Edit user">
     </div>
</form>