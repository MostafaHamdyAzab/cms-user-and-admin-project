<table class="table table-bordered table-hover">
                            <thead>
                             <tr>
                                    <th> Id </th>
                                    <th>UserName </th>
                                    <th> First_Name </th>
                                    <th>Last_Name </th>
                                    <th>Email </th>
                                    <th>Role </th>
                                    
                                </tr>    
                            </thead>
                
                        <tbody>
<?php
////////////////////Take data from database in variable/////////////////////////////////////
$query="SELECT * FROM  users";
$select_users= mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_users)) {
  $user_id= $row['user_id'];
  $user_name=$row['user_name'];  
  $user_first_name=$row['user_firstname'];
  $user_last_name=$row['user_lastname']; 
  $user_email=$row['user_email']; 
  $user_role=$row['user_role'];
  $user_image=$row['user_image'];
   echo "<tr>";
   ///////////////Print data from database in table ///////////////////////////////
   echo "<td>  $user_id</td>";
   echo "<td> $user_name</td>";
   echo "<td>$user_first_name</td>";
   echo "<td>$user_last_name</td>";
   echo "<td> $user_email</td>";
   echo "<td> $user_role</td>";
   echo "<td><a href='users.php?change_to_admin=$user_id' >Admin</a></td>";
   echo "<td><a href='users.php?change_to_sub=$user_id' >Subscriber</a></td>";
  // echo "<td><a href='posts.php?source=edite_post&p_id=$comment_id' >Edite</a></td>";
     echo "<td><a  href='users.php?source=edite_user&U_id=$user_id' >Edite</a></td>";
   echo "<td><a href='users.php?delete=$user_id' >Delete</a></td>";
   echo "</tr>";
}
?>

                        </tbody>
                                </table>

<?php
/////////////////// Acessing the Deleting post///////////////////////////////////////
if(isset($_GET['delete'])){
    $the_user_id=$_GET['delete'];
    $query="delete from `users` where `user_id`=$the_user_id";
    $delete_user= mysqli_query($connection,$query);
    confirmQuery($delete_user);
    header("Location: users.php");
}
//    $query1="select * from `comments` where `comment_id`='$the_comment_id'";
//    $get_post_id= mysqli_query($connection,$query1);
//     confirmQuery($get_post_id);
//     while ($row1 = mysqli_fetch_assoc( $get_post_id)) {
//        $the_post_id=$row['comment_post_id'];
//    
//    $query="update `posts` set `post_comment_count` = post_comment_count-1  where `post_id` ='$the_post_id'";
//    $decreas_comment_post_count=mysqli_query($connection,$query);
//    }
//    header("Location: comments.php");
//}

if(isset($_GET['change_to_admin'])){
    $the_user_id=$_GET['change_to_admin'];
    $query="update `users` set `user_role`='admin' where `user_id`='$the_user_id'";
    $change_to_admin_query= mysqli_query($connection,$query);
    confirmQuery( $change_to_admin_query); 
    header("Location: users.php");
}         
        

if(isset($_GET['change_to_sub'])){
    $the_user_id=$_GET['change_to_sub'];
    $query="update `users` set `user_role`='subscriber' where `user_id`='$the_user_id'";
    $change_to_subscriber_query= mysqli_query($connection,$query);
    confirmQuery($change_to_subscriber_query); 
    header("Location: users.php");
}         
         ?>               
