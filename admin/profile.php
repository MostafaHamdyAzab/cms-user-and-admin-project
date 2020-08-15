<?php include 'includes/admin_header.php' ?>

    <div id="wrapper">
        <!-- Navigation -->
        <?php include 'includes/admin_nav.php' ?>
          <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            
                           Wellcome to Admin 
                           
                            <small><?php echo $_SESSION['username']?></small>
                    
                        </h1>
        <?php
        if(isset($_SESSION['username'])){
        $user_name=$_SESSION['username'];
        $query="select * from `users` where `user_name` = '$user_name' ";
        $select_user_profile_query= mysqli_query($connection , $query);
        if(! $select_user_profile_query){
            echo 'query not confirmed', mysqli_error($connection);
        }
        while ($row = mysqli_fetch_assoc($select_user_profile_query)) {
        $user_id= $row['user_id'];
        $user_password=$row['user_password'];  
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname']; 
        $user_email=$row['user_email']; 
        $user_role=$row['user_role'];   
        ?>
                        <?php
                        if(isset($_POST['edite_user'])){
        $username=$_POST['user_name'];                   
        $user_password=$_POST['user_password'];  
        $user_firstname=$_POST['user_firstname'];
        $user_lastname=$_POST['user_lastname']; 
        $user_email=$_POST['user_email']; 
        $user_role=$_POST['user_role'];   
        
          $query="update `users` set";
          $query.="`user_name` = '$username',";
          $query.="`user_password` = '$user_password',";
          $query.="`user_firstname` = '$user_firstname',";
          $query.="`user_lastname` = '$user_lastname',";
          $query.="`user_email` = '$user_email',";
          $query.="`user_role` = '$user_role'";
          $query.=" where `user_name` = '$user_name' ";
          
          $update_user_profile_query= mysqli_query($connection,$query);
          if(! $update_user_profile_query){
              echo 'Query not confirmed', mysqli_error($connection);
          }
                            
                        }
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
               autocomplete="false" name="user_password">
    </div>

    
    <div class="form_group">
        <input class="btn btn-primary" type="submit" name="edite_user" 
               value="Update_Profile">
    </div>


</form>                   
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
        <?php }}?>
<?php include 'includes/admin_footer.php' ?>

