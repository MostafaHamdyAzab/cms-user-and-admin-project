<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
    <!-- Navigation -->
    
    <?php  include "includes/nav.php"; ?>
    
 <?php  
 
 if(isset($_POST['submit'])){
          $to="mostafahamdy9988@gmail.com";
          $subject=body($_POST['subject'],70);
          $body=$_POST['body'];
          $header=$_POST['email'];
          mail($to,$subject,$body,header);
         
          
 }
 
 
 
 ?>
    
    
    
    
    
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>ContactUs</h1>
                <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                     
                        
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your E-mail">
                        </div>
                         <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="subject" name="subject" id="subject" class="form-control" placeholder="Enter Your subject">
                        </div>
                        <textarea class="form-control" name="body" cols="50" rows="10" id="body"></textarea>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>

