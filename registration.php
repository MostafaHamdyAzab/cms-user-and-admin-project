<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 <?php include "admin/includes/functions.php"; ?>
    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 <?php  
  $message='';  
  $error=[
                'user_name'=>'',
                'user_email'=>'',
                'user_password'=>''
            ];
 if(isset($_POST['submit'])){
         
          $user_name=trim($_POST['username']);
          $password=trim($_POST['password']);
          $email=trim($_POST['email']);
          $flag=true;
          
     if(strlen($user_name)>0&&strlen($user_name)<4){
        $error['user_name']='User Name Need To Be Longer';
         $flag=false;
     }//end check strinhg length
     if(useremail_Exists($email)){
       $error['user_email']='This email is Already Exists';
        $flag=false;
     }//end check exists email
     if(username_Exists($user_name)){
       $error['user_name']="Invalid User Name!!!";
       }//end if of check username
       else{
    if(!empty($user_name)&&!empty($password)&&!empty($email)){
        if($flag){
          insert_Newuser($user_name, $email, $password);
        $message="Your Data is submitted";  
        }//end check for flag
        }//end if check that data is empty and insert new user
//        else {
//            $error['user_name']="User Name Can't Be Empty";
//            $error['user_email']="Email Can't Be Empty";
//        }
     }// end else  of check user name
     }//end if of isset(submit)
   

 ?>
    
    
    
    
    
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h5 class="text-center"><?php echo $message?></h5>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control"
                                   placeholder="Enter Desired Username" 
                                   value="<?php echo isset($user_name)? $user_name :'' ?>">
                            <p> <?php echo isset($error['user_name']) ? $error['user_name'] :''  ?> </p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control"
                                   placeholder="somebody@example.com"
                                    value="<?php echo isset($email)? $email :'' ?>">
                             <p> <?php echo isset($error['user_email']) ? $error['user_email'] :''  ?> </p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
