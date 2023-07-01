<?php 

	if(isset($_GET['p_id'])){
		$the_post_id = $_GET['p_id'];

		$query = "SELECT * FROM posts WHERE post_id = $the_post_id";

	    $select_post_by_id = mysqli_query($connection, $query);

	    while($row = mysqli_fetch_assoc($select_post_by_id)){
	        $post_id = $row['post_id'];
	        $post_author = $row['post_author'];
	        $post_title = $row['post_title'];
	        $post_category_id = $row['post_category_id'];
	        $post_status= $row['post_status'];
	        $post_tags = $row['post_tags'];
	       
	        $post_date = $row['post_date'];
	        $post_image = $row['post_image'];
	        $post_content = $row['post_content'];
	    }
	}

	if(isset($_POST['update_post'])){
		$post_title = $_POST['title'];
		$post_author = $_POST['author'];
		$post_category_id = $_POST['post_category'];
		$post_status = $_POST['post_status'];

		$post_image = $_FILES['image'] ['name'];
		$post_image_temp = $_FILES['image'] ['tmp_name'];

		$post_tags = $_POST['post_tags'];
		$post_content = $_POST['post_content'];
		$post_date = date('d-m-y');
		


		move_uploaded_file($post_image_temp, "../images/$post_image");


		if(empty($post_image)){
			$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
			$select_image = mysqli_query($connection, $query);

			while ($row = mysqli_fetch_assoc($select_image)) {
				$post_image = $row['post_image'];
			}
		}

		$query = "UPDATE posts SET ";
		$query .= "post_category_id = '$post_category_id', ";
		$query .= "post_title = '$post_title', "; 
		$query .= "post_author = '$post_author', "; 
		$query .= "post_date = now(), "; 
		$query .= "post_image = '$post_image', ";
		$query .= "post_content = '$post_content', "; 
		$query .= "post_tags = 	'$post_tags', ";
		$query .= "post_comment_count = 4, ";
		$query .= "post_status = '$post_status' ";
		$query .= "WHERE post_id = '$the_post_id'";

		$update_post = mysqli_query($connection, $query);
		confirmQuery($update_post);
		echo "<p class='bg-success'>Post Updated <a href='../post.php?p_id=$the_post_id'>View Post </a>
		 		or <a href='posts.php'>Edit More Posts </a>
		</p>";
	}
	

?>


<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control" value="<?php echo $post_title; ?>">
	</div>

	<div class="form-group">
		<select name="post_category" id="post_category" class="form-control">
			<?php 

			 	$query = "SELECT * FROM users";
		       $select_user_query = mysqli_query($connection, $query);

		        confirmQuery($select_user_query);

		        while($row = mysqli_fetch_assoc($select_user_query)){
		            $user_id = $row['user_id'];
		            $user_role = $row['user_role'];
		            echo "<option value='$user_id'>{$user_role}</option>";
		        }

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="post category">Post Category Id</label>
		<input type="text" name="post_category_id" class="form-control"  value="<?php echo $post_category_id; ?>">
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" name="author" class="form-control"  value="<?php echo $post_author; ?>">
	</div>



	<div class="form-group">
		<select name="post_status">
			<option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>

			<?php 
				if($post_status =='published'){
					echo "<option value='draft'>Draft</option>";
				}else{
					echo "<option value='published'>Publish</option>";
				}

			?>
		</select>
	</div>




	<div class="form-group">
		<img width="100" src="../images/<?php echo $post_image; ?>">
		<label for="post-image">Post Image</label>
		<input type="file" name="image" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control"  value="<?php echo $post_tags; ?>">
	</div>

	<div class="form-group">
		<label for="post-content">Post Contents</label>
		<textarea name="post_content" class="form-control" cols="30" rows="10"><?php echo $post_content; ?>
		</textarea>
	</div>

	 <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
     </div>
</form>