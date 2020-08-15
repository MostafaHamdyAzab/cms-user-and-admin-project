<?php
///////////////Take value User Enter////////////////////////////
if(isset($_POST['create_user'])){
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
//    $post_image=$_FILES['image']['name'];
//    $post_image_temp=$_FILES['image']['tmp_name'];
    $user_email=$_POST['user_email'];
    $user_role=$_POST['user_role'];
    $post_date=date('d-m-y');
    $post_comment_count=0;
    
  
    
//       move_uploaded_file($post_image_temp , "../images/$post_image" );
//       $query="INSERT INTO `posts`(`post_category_id`, `post_title`,"
//   . " `post_author`, `post_date`, `post_image`, `post_content`, `post_tag`, `post_comment_count`, `post_status`) ";
//       $query .="values($post_category_id,'$post_title','$post_author',now(),'$post_image','$post_content','$post_tags',
//            '$post_comment_count','$post_status')";
    $user_password= password_hash($user_password, PASSWORD_BCRYPT, array('cost'=>12));
       $query="INSERT INTO `users`(`user_name`, `user_password`, `user_firstname`,"
      ."`user_lastname`,`user_email`, `user_role`)"; 
       $query.="values ('$user_name','$user_password','$user_firstname',' $user_lastname','$user_email','$user_role')";
       $insert_new_user= mysqli_query($connection, $query);
    confirmQuery($insert_new_user);
        echo "userCreated"." ","<a href='users.php'>View All Users</a>";
    
       
       
}

?>




<form action="" method="POST" enctype="multipart/form-data" >
    
     <div class="form_group">
        <label for="Firstname">Firstname </label>
        <input type ="text" class="form-control"
               name="user_firstname">
    </div>
    
     <div class="form_group">
        <label for="Lasttname">Lastname </label>
        <input type ="text" class="form-control"
               name="user_lastname">
    </div>
    
    <div class="form_group">
           <label for="user_role">UserRole </label>
     <select  name="user_role" id=" ">
         
<!--                              $query="select * from `users` ";
                              $select_all_users= mysqli_query($connection, $query);
                              confirmQuery( $select_all_users);
                              while($row=mysqli_fetch_assoc( $select_all_users)){
                              $user_id=$row['user_id'];
                              $user_role=$row['user_role'];    -->
                              <option value='subscriber'>SelectOption</option>;
                              <option value='admin'>Admin</option>;
                              <option value='subscriber'>subscriber</option>;
                              
                             /// }
           
         
            
        </select>
    </div>
    
    <div class="form_group">
        <label for="user_name">Username </label>
        <input type ="text" class="form-control" name="user_name">
    </div>
    
       
    
<!--     <div class="form_group">
        <label for="post_image">post Image </label>
        <input type ="file"  name="image">
    </div>-->
    
           <div class="form_group">
        <label for="user_email">Email </label>
        <input type ="email" class="form-control"
               name="user_email">
    </div>
 <div class="form_group">
        <label for="user_password">Password </label>
        <input type ="password" class="form-control"
               name="user_password">
    </div>

    
    <div class="form_group">
        <input class="btn btn-primary" type="submit" name="create_user" 
               value="Add_user"
    </div>
    
    
</form>