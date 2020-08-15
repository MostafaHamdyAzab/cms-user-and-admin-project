 <?php  include "../delete_model.php"; ?>
<?php
if(isset($_POST['checkBoxArray'])){
    foreach ($_POST['checkBoxArray'] as $postid_value){
    $option=$_POST['post_status'];
    switch($option){
        case 'clone':
            $query="select * from `posts` where `post_id`='$postid_value'";
            $select_all_posts_query_for_clone= mysqli_query($connection, $query);
            if(!$select_all_posts_query_for_clone){
                die(' copy_posts_query Failed'.mysqli_error($connection));
            }
            while ($row = mysqli_fetch_assoc($select_all_posts_query_for_clone)) {
            $post_id= $row['post_id'];
            $post_author=$row['post_author'];  
            $post_title=$row['post_title'];
            $post_category_id=$row['post_category_id']; 
            $post_status=$row['post_status']; 
            $post_tag=$row['post_tag'];
            $post_comment_count=$row['post_comment_count'];
            $post_image=$row['post_image'];
            $post_date=$row['post_date'];
       $query="INSERT INTO `posts`(`post_category_id`, `post_title`,`post_author`, `post_date`, `post_image`, `post_tag`, `post_comment_count`, `post_status`)";
       $query.="values($post_category_id,'$post_title','$post_author',now(),'$post_image','$post_tag','$post_comment_count','$post_status')";
      $copy_post_query= mysqli_query($connection, $query);
            }
            break;
        case 'draft' :
        case 'published':    
  $query="update `posts` set `post_status`= '$option' where `post_id`= '$postid_value' ";
  $update_post_status= mysqli_query($connection, $query);
    }
    break;
    } 
}

?>    



<form action="" method="POST">
<table class="table table-bordered table-hover">
    <div id="bluckOptionContainer" calss="col-xs-4">
        <select class="form-control" name="post_status" id="">
                            <option>Select_Option</option>
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                            <option value="clone">clone</option>
                       </select>
                        </div>
    <div class="col_xs-4">
        <input type="submit" name="submit" class="btn btn-success" value="Apply">
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New Post</a>    
    </div>
  <thead>
                             <tr>
                                 <th><input id="selectAllBoxes" type="checkbox"> </th>
                                    <th> Id </th>
                                    <th> User </th>
                                    <th>Title </th>
                                    <th>Category </th>
                                    <th>Status </th>
                                    <th>Tag </th>
                                    <th>Comments </th>
                                    <th>Image </th>
                                    <th>Date </th>
                                    <th>Edite </th>
                                   <th>Delete </th>
                                   <th>View Post </th>
                                   <th>Views Count </th>
                                </tr>    
                            </thead>
                
                        <tbody>
<?php
////////////////////Take data from database in variable/////////////////////////////////////
$query="SELECT * FROM  posts  ORDER BY `post_id` Desc ";
$select_posts= mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_posts)) {
  $post_id= $row['post_id'];
  
  $post_author=$row['post_author'];  
  $post_user=$row['post_user'];  
  
  
  
  
  $post_title=$row['post_title'];
  $post_category_id=$row['post_category_id']; 
  $post_status=$row['post_status']; 
  $post_tag=$row['post_tag'];
  $post_comment_count=$row['post_comment_count'];
  $post_image=$row['post_image'];
  $post_date=$row['post_date'];
  $post_views_count=$row['post_views_count'];
   echo "<tr>";
   ?>
 
 <td> <input class='checkBoxes' type='checkbox' name='checkBoxArray[]' value='<?php echo $post_id ;?>'> </td>
 <?php
        echo "<td>$post_id</td>";
        
        if(!empty($post_author)){
          echo "<td>$post_author</td>";
          
        }elseif(!empty($post_user)){
           echo "<td>$post_user</td>";
        }
   ///////////////Print data from database in table ///////////////////////////////
  
   
   echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
     
      $query="select * from categories where`cat_id`= ' $post_category_id' ";
                              $select_all_catergories_id_query= mysqli_query($connection, $query);
                              while($row=mysqli_fetch_assoc( $select_all_catergories_id_query)){
                              $cat_id=$row['cat_id'];
                              $cat_title=$row['cat_title'];  
                              echo "<td> $cat_title</td>";
                              }             
   echo "<td>$post_status</td>";
   echo "<td>$post_tag</td>";
   
   $query="select * from `comments` where `comment_post_id`=$post_id";
   $select_comment_count= mysqli_query($connection, $query);
   $count= mysqli_num_rows($select_comment_count);
   
   
   
   echo "<td><a href='comments_for_one_post.php?p_id=$post_id'>$count</a></td>";
   
   
   
   
   
   
   
   
   echo "<td> <img width='100'  src='../images/$post_image' alt='images'</td>";
   echo "<td>$post_date</td>";
   echo "<td><a class='btn btn_info'  href='posts.php?source=edite_post&p_id=$post_id' >Edite</a></td>";
   echo "<td><a href='posts.php?delete=$post_id' >Delete</a></td>";
   echo "<td><a  href='../post.php?p_id=$post_id'>View Post</a></td>";
   echo "<td><a href='posts.php?reset=$post_id' > $post_views_count</a></td>";
   echo "</tr>";

}
?>

                        </tbody>
                                </table>

<?php
/////////////////// Acessing the Deleting post///////////////////////////////////////
if(isset($_GET['delete'])){
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role']==admin){
    $the_post_id=$_GET['delete'];
    $query="delete from `posts` where `post_id`=$the_post_id";
    $delete_post= mysqli_query($connection,$query);
    header("Location: posts.php?source=view_all_posts");
    confirmQuery($delete_post); 
        }//end ineer if
    }//End check session
}//End get
if(isset($_GET['reset'])){
    $the_post_id=$_GET['reset'];
    $query="update `posts` set `post_views_count`=0 where `post_id`=$the_post_id";
    $reset_post_count= mysqli_query($connection,$query);
    header("Location: posts.php?source=view_all_posts");
    confirmQuery($delete_post); 
    
    
}
?>
