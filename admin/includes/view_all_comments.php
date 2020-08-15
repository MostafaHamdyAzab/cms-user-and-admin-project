
<table class="table table-bordered table-hover">
                            <thead>
                             <tr>
                                    <th> Id </th>
                                    <th> Author </th>
                                    <th> Comment </th>
                                    <th>E-mail </th>
                                    <th>Status </th> 
                                    <th>InResponseTo </th>
                                    <th>Date </th>
                                    <th>approve </th>
                                    <th>Unapprove </th>
                                    <th>Delete </th>
                                </tr>    
                            </thead>
                
                        <tbody>
<?php
////////////////////Take data from database in variable/////////////////////////////////////
$query="SELECT * FROM  comments";
$select_comments= mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_comments)) {
  $comment_id= $row['comment_id'];
  $comment_author=$row['comment_author'];  
  $comment_email=$row['comment_email'];
  $comment_post_id=$row['comment_post_id']; 
  $comment_status=$row['comment_status']; 
  $comment_content=$row['comment_content'];
  $comment_date=$row['comment_data'];
   echo "<tr>";
   ///////////////Print data from database in table ///////////////////////////////
   echo "<td>$comment_id</td>";
   echo "<td>$comment_author</td>";
   echo "<td>$comment_content</td>";
   echo "<td>$comment_email</td>";
   echo "<td>$comment_status</td>";
   
    $query="select * from posts where`post_id`= '$comment_post_id' ";
                              $select_post_id_query= mysqli_query($connection, $query);
                              while($row=mysqli_fetch_assoc( $select_post_id_query)){
                              $post_id=$row['post_id'];
                              $post_title=$row['post_title']; 
   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</td>";
                              }
   echo "<td>$comment_date</td>";
   echo "<td><a href='comments.php?approve=$comment_id' >Approve</a></td>";
   echo "<td><a href='comments.php?unapprove=$comment_id' >Unapprove</a></td>";
  // echo "<td><a href='posts.php?source=edite_post&p_id=$comment_id' >Edite</a></td>";
   echo "<td><a href='comments.php?delete=$comment_id' >Delete</a></td>";
   echo "</tr>";
}
?>

                        </tbody>
                                </table>

<?php
/////////////////// Acessing the Deleting post///////////////////////////////////////
if(isset($_GET['delete'])){
    $the_comment_id=$_GET['delete'];
    $query="delete from `comments` where `comment_id`=$the_comment_id";
    $delete_comment= mysqli_query($connection,$query);
    confirmQuery($delete_comment); 
    $query1="select * from `comments` where `comment_id`='$the_comment_id'";
    $get_post_id= mysqli_query($connection,$query1);
     confirmQuery($get_post_id);
     while ($row1 = mysqli_fetch_assoc( $get_post_id)) {
        $the_post_id=$row['comment_post_id'];
    
    $query="update `posts` set `post_comment_count` = post_comment_count-1  where `post_id` ='$the_post_id'";
    $decreas_comment_post_count=mysqli_query($connection,$query);
    }
    header("Location: comments.php");
}

if(isset($_GET['unapprove'])){
    $the_comment_id=$_GET['unapprove'];
    $query="update comments set `comment_status`='unapprove' where `comment_id`='$the_comment_id'";
    $unapprove_query= mysqli_query($connection,$query);
    confirmQuery( $unapprove_query); 
    header("Location: comments.php");
}         
        

if(isset($_GET['approve'])){
    $the_comment_id=$_GET['approve'];
    $query="update comments set `comment_status`='approve'";
    $approve_query= mysqli_query($connection,$query);
    confirmQuery( $approve_query); 
     header("Location: comments.php");
}   

