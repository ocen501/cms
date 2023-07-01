
	<?php 
		if(isset($_POST['create_post'])){

			$post_title = $_POST['title'];
			$post_author = $_POST['author'];
			$post_category_id = $_POST['post_category'];
			$post_status = $_POST['post_status'];
			$post_image = $_FILES['image']['name'];
			$post_image_temp = $_FILES['image']['tmp_name'];
			$post_tags = $_POST['post_tags'];
			$post_content = $_POST['post_content'];
			$post_date = date('d-m-y');
			
			move_uploaded_file($post_image_temp, "../images/". $post_image);

			$query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,";
			$query .="post_content, post_tags, post_status) ";
			$query.="VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}',";
			$query .=" '{$post_content}', '{$post_tags}', '{$post_status}')";

			$create_post_query = mysqli_query($connection, $query);


			confirmQuery($create_post_query);
		}
	?>
<form action="" method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label for="title">Title</label>
		<input type="text" name="title" class="form-control">
	</div>

	<div class="form-group">
		<select name="post_category" id="post_category" class="form-control">
			<?php 

			 	$query = "SELECT * FROM categories";
		        $select_categories_query = mysqli_query($connection, $query);

		        confirmQuery($select_categories_query);

		        while($row = mysqli_fetch_assoc( $select_categories_query)){
		            $cat_id = $row['cat_id'];
		            $cat_title = $row['cat_title'];

		            echo "<option value='$cat_id'>{$cat_title}</option>";
		        }

			?>
		</select>
	</div>

	<div class="form-group">
		<label for="author">Post Author</label>
		<input type="text" name="author" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-status">Post Status</label>
		<input type="text" name="post_status" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-image">Post Image</label>
		<input type="file" name="image" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-tags">Post Tags</label>
		<input type="text" name="post_tags" class="form-control">
	</div>

	<div class="form-group">
		<label for="post-content">Post Contents</label>
		<textarea name="post_content"class="form-control" cols="30" rows="10" id="body"></textarea>
	</div>

	 <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Add Post">
     </div>
</form>