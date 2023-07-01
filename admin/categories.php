<?php include("includes/admin_header.php");?>

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

                        <div class="col-xs-6">
                           <?php insert_categories(); ?>

                             <?php 
                                //UPDATE QUERY
                                if(isset($_POST['update_category'])){
                                    $cat_title = $_POST['cat_title'];
                                    $cat_id = $_GET['edit'];
                                    $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = $cat_id";
                                    $update_query = mysqli_query($connection, $query);
                                    header("Location: categories.php");
                                }

                            ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>

                             <form action="" method="post">
                                <div class="form-group">
                                    <label for="cat_title">Edit Category</label>

                                    <?php 

                                        if(isset($_GET['edit'])){
                                            $cat_id = $_GET['edit'];
                                             $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                                            $select_categories_query = mysqli_query($connection, $query);
                                        

                                            while($row = mysqli_fetch_assoc($select_categories_query)){
                                                $cat_id = $row['cat_id'];
                                                $cat_title = $row['cat_title'];

                                    ?>

                                        <input class="form-control" type="text" name="cat_title" value="<?php if(isset($cat_title)){echo $cat_title;} ?>">
                                      <?php  } } ?>

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update">
                                </div>
                            </form>
                        </div>

                         <div class="col-xs-6">
                             <table class="table table-bordered table-hover">
                                 <thead>
                                     <tr>
                                         <th>ID</th>
                                         <th>Category Title</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                    
                                         <?php findAllCategories(); ?>
                                       

                                 
                                    <?php  deleteCategories() ?>
                                     
                                 </tbody>
                             </table>
                         </div>
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
