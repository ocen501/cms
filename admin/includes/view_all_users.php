 <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>


                                 <?php 

                                    $query = "SELECT * FROM users";

                                    $select_users = mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc( $select_users)){
                                        $user_id = $row['user_id'];
                                        $username = $row['username'];
                                        $user_password = $row['user_password'];
                                        $user_firstname = $row['user_firstname'];
                                        $user_lastname = $row['user_lastname'];
                                        $user_email = $row['user_email'];
                                        $user_image = $row['user_image'];
                                        $user_role = $row['user_role'];
                                      
                                    
                                        echo "<tr>";
                                        echo "<td>{$user_id}</td>";
                                        echo "<td>{$username}</td>";
                                        echo "<td>{$user_firstname}</td>";
                                        echo "<td>{$user_lastname}</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td>{$user_role}</td>";

                                        // $query = "SELECT * FROM posts WHERE post_id =  $comment_post_id";
                                        // $select_post_query = mysqli_query($connection, $query);
                                        

                                        // while($row = mysqli_fetch_assoc($select_post_query)){
                                        //     $post_id = $row['post_id'];
                                        //     $post_title = $row['post_title'];
                                        // }





                                        // echo "<td>{$comment_email}</td>";
                                        // echo "<td>{$comment_status}</td>";
                                        
                                        echo "<td><a href='../post.php?p_id='></a></td>";
                                        echo "<td></td>";


                                        echo "<td>
                                            <a class='btn btn-info' href='users.php?change_to_admin=$user_id'>Admin</a>
                                        </td>";
                                        
                                        echo "<td>
                                            <a class='btn btn-info' href='users.php?change_to_sub=$user_id' >Subscriber</a>  
                                        </td>";

                                        echo "<td>
                                            <a href='users.php?source=edit_user&user_id=$user_id'class='btn btn-info'>Edit</a>  
                                        </td>";

                                         echo "<td>
                                            <a href='users.php?delete=$user_id' class='btn btn-danger'>Delete</a>  
                                        </td>";
                                      
                                       
                                        echo "</tr>";
                                    }

                                ?>
                            </tbody>
                        </table>



    <?php 

        if(isset($_GET['change_to_admin'])){
            $user_id = $_GET['change_to_admin'];

            $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $user_id";
            $change_to_admin_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }


         if(isset($_GET['change_to_sub'])){
            $user_id = $_GET['change_to_sub'];

            $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $user_id";
            $change_to_sub_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }







        if(isset($_GET['delete'])){
            $user_id = $_GET['delete'];

            $query = "DELETE FROM users WHERE user_id = $user_id";
            $delete_query = mysqli_query($connection, $query);
            header("Location:users.php");
        }
    ?>