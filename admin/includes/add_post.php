<?php
///////////////Take value User Enter////////////////////////////
if(isset($_POST['create_post'])){
    $post_title=$_POST['title'];
    $post_user=$_POST['post_user'];
    $post_category_id=$_POST['post_category'];
    $post_status=$_POST['post_status'];
    $post_image=$_FILES['image']['name'];
    $post_image_temp=$_FILES['image']['tmp_name'];
    $post_tags=$_POST['post_tags'];
    $post_content=$_POST['post_content'];
    $post_date=date('d-m-y');
    $post_comment_count=0;
    move_uploaded_file($post_image_temp , "../images/$post_image" );
    
       $query="INSERT INTO `posts`(`post_category_id`, `post_title`,`post_user`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`)";
       $query.="values($post_category_id,'$post_title','$post_user',now(),'$post_image','$post_content','$post_tags','$post_comment_count','$post_status')";
       $insert_new_post= mysqli_query($connection, $query);
       confirmQuery($insert_new_post);
       echo 'Post uploaded: ',"<a href='../index.php'>View All Posts</a>";
}
?>
<form action="" method="POST" enctype="multipart/form-data" >
    <div class="form_group">
        <label for="title">post Title </label>
        <input type ="text" class="form-control" name="title">
    </div>
    
       <div class="form_group">
           <label for="post_category">post Category </label>
     <select  name="post_category" id=" ">
            <?php
                              $query="select * from categories ";
                              $select_all_catergories= mysqli_query($connection, $query);
                              confirmQuery( $select_all_catergories);
                              while($row=mysqli_fetch_assoc( $select_all_catergories)){
                              $cat_id=$row['cat_id'];
                              $cat_title=$row['cat_title'];    
                              echo "<option value='$cat_id'>$cat_title </option>";
                              
                              }
            ?>
         
            
        </select>
    </div>
    
        
       <div class="form_group">
           <label for="users">Users </label>
     <select  name="post_user" id=" ">
            <?php
                              $query="select * from users ";
                              $select_all_users= mysqli_query($connection, $query);
                              confirmQuery( $select_all_users);
                              while($row=mysqli_fetch_assoc( $select_all_users)){
                              $user_id=$row['user_id'];
                            $user_name=$row['user_name'];    
                              echo "<option value='$user_name'>$user_name </option>";
                              
                              }
            ?>
         
            
        </select>
    </div>
    
    
    
    
    
<!--     <div class="form_group">
        <label for="post_author">post Author </label>
        <input type ="text" class="form-control"
               name="author">
    </div>-->
     <div class="form_group">
       <label for="post_status">post Status </label>
        <select name="post_status">
            <option>Post Status</option>
            <option value="draft">Draft</option>
            <option value="published">Published</option>
        </select>
    </div>
     <div class="form_group">
        <label for="post_image">post Image </label>
        <input type ="file"  name="image">
    </div>
    
     <div class="form_group">
        <label for="post_tags">post Tags </label>
        <input type ="text" class="form-control"
               name="post_tags">
    </div>
    <div class="form_group">
        <label for="post_content">post Content </label>
        <textarea class="form-control" name="post_content" id="body" cols="30" rows="30">  </textarea>
    </div>
    
    <div class="form_group">
        <input class="btn btn-primary" type="submit" name="create_post" 
               value="Publish Post"
    </div>
    
    
</form>