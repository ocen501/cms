
	<?php 
		if(isset($_POST['create_user'])){

			$user_firstname = $_POST['user_firstname'];
			$user_role = $_POST['user_role'];
			$user_lastname = $_POST['user_lastname'];
			$username = $_POST['username'];
			// $post_image = $_FILES['image']['name'];
			// $post_image_temp = $_FILES['image']['tmp_name'];
			$user_email = $_POST['user_email'];
			$user_password = $_POST['user_password'];
			// $post_date = date('d-m-y');
			
			// move_uploaded_file($post_image_temp, "../images/". $post_image);

			$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email,";
			$query .="user_role) ";
			$query.="VALUES('{$username}', '{$user_password}', '{$user_firstname}', '{$user_lastname}',";
			$query .=" '{$user_email}', '{$user_role}')";

			$create_user = mysqli_query($connection, $query);


			confirmQuery($create_user);

			echo "User Created:" . "<a href='users.php'>View user</a>";
		}
	?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Firstname</label>
		<input type="text" name="user_firstname" class="form-control">
	</div>

	<div class="form-group">
		<select name="user_role"  class="form-control">
			
			<option value="subscriber">Select Option</option>
			<option value="admin">Admin</option>
			<option value="subscriber">Subscriber</option>
		
		</select>
	</div>

	<div class="form-group">
		<label for="author">Lastname</label>
		<input type="text" name="user_lastname" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-status">Username</label>
		<input type="text" name="username" class="form-control">
	</div>

	<!-- <div class="form-group">
		<label for="post-image">Post Image</label>
		<input type="file" name="image" class="form-control">
	</div> -->

	<div class="form-group">
		<label for="email">Email</label>
		<input type="email" name="user_email" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-tags">Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>

	

	 <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add user">
     </div>
</form>