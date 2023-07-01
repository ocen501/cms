<?php 
    if(isset($_POST['checkBoxArray'])){ 
        foreach ($_POST['checkBoxArray'] as $postValueId) {

           
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case 'published':
                   $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                   $update_status_to_published = mysqli_query($connection, $query);
                break;

                case 'draft':
                   $query = "UPDATE posts SET post_status = '{$bulk_options}' WHERE post_id = {$postValueId} ";
                   $update_status_to_draft = mysqli_query($connection, $query);
                break;

                case 'delete':
                   $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
                   $delete_query = mysqli_query($connection, $query);
                break;


                case 'clone':
                   $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
                   $select_post_query = mysqli_query($connection, $query);
                   while ($row = mysqli_fetch_assoc($select_post_query)) {
                       $post_title = $row['post_title'];
                       $post_category_id = $row['post_category_id'];
                       $post_date = $row['post_date'];
                       $post_author = $row['post_author'];
                       $post_status = $row['post_status'];
                       $post_image = $row['post_image'];
                       $post_tags = $row['post_tags'];
                       $post_content = $row['post_content'];
                   }


                    $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image,";
                    $query .="post_content, post_tags, post_status) ";
                    $query.="VALUES({$post_category_id}, '{$post_title}', '{$post_author}', now(), '{$post_image}',";
                    $query .=" '{$post_content}', '{$post_tags}', '{$post_status}')";

                    $copy_query = mysqli_query($connection, $query);
                    if(!$copy_query){
                        die("Query Failed.". mysqli_error($connection));
                    }
                break;
                
                default:
                    # code...
                    break;
            }
        }
    }


?>

<form action="" method="post">
    
    <table class="table table-bordered table-hover table-responsive">

        <div id="bulkOptionContainer" class="col-xs-4">
            <select name="bulk_options" id="" class="form-control">
                <option value="">Select Option</option>
                <option value="published">Publish</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>
        </div>
        <div class="col-xs-4">
            <input type="submit" name="" class="btn btn-success" value="Apply">
            <a href="add_post.php" class="btn btn-primary">Add New</a>
        </div>
        <thead>
            <tr>
                <th><input type="checkbox" name="" id="selectAllBoxes"></th>
                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>Category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tags</th>
                <th>Comment</th>
                <th>Date</th>
                <th>Action</th>
                <th>Views</th>
            </tr>
        </thead>
        <tbody>

             <?php 

                $query = "SELECT * FROM posts ORDER BY post_id DESC";

                $select_posts = mysqli_query($connection, $query);

                while($row = mysqli_fetch_assoc( $select_posts)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status= $row['post_status'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_views_count = $row['post_views_count'];

                    echo "<tr>";
                    ?>
                    <td> <input type="checkbox" name="checkBoxArray[]" class="checkBoxes" value="<?php echo $post_id; ?>"></td>
                    <?php
                    echo "<td>{$post_id}</td>";
                    echo "<td>{$post_author}</td>";
                    echo "<td>{$post_title}</td>";

                    $query = "SELECT * FROM categories WHERE cat_id =   $post_category_id";
                    $select_categories_query = mysqli_query($connection, $query);
                    

                    while($row = mysqli_fetch_assoc($select_categories_query)){
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                    }





                    echo "<td>{$cat_title}</td>";
                    echo "<td>{$post_status}</td>";
                    echo "<td><img width='100' src='../images/{$post_image}'></td>";
                    echo "<td>{$post_tags}</td>";
                    echo "<td>{$post_comment_count}</td>";
                    echo "<td>{$post_date}</td>";
                    echo "<td>
                            <a class='btn btn-info' href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a>
                            <a class='btn btn-danger' onClick=\" jvascript:return confirm('Are you sure you want to delete?')\" href='posts.php?delete={$post_id}'>Delete</a>
                            
                    </td>";
                    echo "<td><a href='posts.php?reset={$post_id}'>{$post_views_count}</a></td>";
                    echo "</tr>";
                }
            
            ?>
        </tbody>
    </table>



    <?php 
        if(isset($_GET['delete'])){
            $the_post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = $the_post_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location:posts.php");
        }


        if(isset($_GET['reset'])){
            $the_post_id = $_GET['reset'];

            $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = $the_post_id";
            $reset_query = mysqli_query($connection, $query);
            header("Location:posts.php");
        }



    ?>