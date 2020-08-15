<?php
////////////////////////////Print the Related data to selected user////////////////////////////////////
if(isset($_GET['U_id'])){
 $the_user_id=$_GET['U_id'];
 $query="SELECT * FROM  `users` where `user_id`='$the_user_id' ";
$select_user_by_id= mysqli_query($connection, $query);
while ($row = mysqli_fetch_assoc($select_user_by_id)) {
    $user_name=$row['user_name'];
    $db_user_password=$row['user_password'];
    $user_firstname=$row['user_firstname'];
    $user_lastname=$row['user_lastname'];
    $user_email=$row['user_email'];
    $user_role=$row['user_role'];
/////////////////Take value User Enter////////////////////////////
if(isset($_POST['edite_user'])){
    $user_name=$_POST['user_name'];
    $user_password=$_POST['user_password'];
    $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_email=$_POST['user_email'];
    $user_role=$_POST['user_role'];
      

    /////////////////// this for if user not need to change his password////////////////////////////////
     if(!empty($user_password)){
//         $query="select `user_password` from `users` where `user_id`='$the_user_id' ";
//         $get_user_password= mysqli_query($connection, $query);
//         confirmQuery($get_user_password);
//         $row= mysqli_fetch_array($get_user_password);
//         $db_user_password=$row['user_password'];
         if($db_user_password != $user_password){
         $hashed_password= password_hash($user_password, PASSWORD_BCRYPT,array('cost=>12'));
     }//end inner if
     } //end if that check password is empty or not
     else{
         $hashed_password= password_hash($db_user_password, PASSWORD_BCRYPT,array('cost=>12'));

     }
    $query="update `users` set";
    $query.="`user_name`='$user_name' , "  ;      
    $query.="`user_password`='$hashed_password' ,"; 
    $query.="`user_firstname`='$user_firstname' , "  ;   
    $query.="`user_lastname`='$user_lastname' , "  ;
    $query.="`user_email`='$user_email' , "  ;
    $query.="`user_role`='$user_role'  "  ;
    $query.="where `user_id`=' $the_user_id' ";
    $update_query= mysqli_query($connection , $query);
    confirmQuery($update_query);
    echo 'User Updated ';
    echo "<a href='users.php'>View All Users</a>";

}//end if post['edite user']

?>
<form action="" method="POST" enctype="multipart/form-data" >
    
     <div class="form_group">
        <label for="Firstname">Firstname </label>
        <input type ="text" class="form-control"
        value="<?php echo  $user_firstname?>" name="user_firstname">
    </div>
    
     <div class="form_group">
        <label for="Lasttname">Lastname </label>
        <input type ="text" class="form-control"
         value="<?php echo  $user_lastname?>" name="user_lastname">
    </div>
    
    <div class="form_group">
           <label for="user_role">UserRole </label>
     <select  name="user_role" id=" ">
                   <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>;
                     <?php
                       if($user_role=='admin'){
                        echo"<option value='subscriber'>subscriber</option>";    
                           }
                           else{
                           echo"<option value='admin'>Admin</option>";       
                              }
                              ?>
                            
     </select>
    </div>
    
    <div class="form_group">
        <label for="user_name">Username </label>
        <input type ="text" class="form-control" name="user_name"
               value="<?php echo $user_name?>">
    </div>
    
       
    
<!--     <div class="form_group">
        <label for="post_image">post Image </label>
        <input type ="file"  name="image">
    </div>-->
    
           <div class="form_group">
        <label for="user_email">Email </label>
        <input type ="email" class="form-control"
        value="<?php echo  $user_email?>" name="user_email">
    </div>
 <div class="form_group">
        <label for="user_password">Password </label>
        <input type ="password" class="form-control"
               autocomplete="off"  name="user_password">
    </div>

    
    <div class="form_group">
        <input class="btn btn-primary" type="submit" name="edite_user" 
               value="Update_user">
    </div>

<?php }}?>
</form>
