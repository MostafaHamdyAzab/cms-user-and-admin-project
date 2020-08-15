 <?php include 'admin/includes/functions.php'?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   
        <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
               <?php  
              $query="Select * from `categories`";
              $select_all_catergories_query_nav= mysqli_query($connection, $query);
              while ($row=mysqli_fetch_assoc($select_all_catergories_query_nav)){
                 $cat_title=$row['cat_title'];
                 $cat_id=$row['cat_id'];
                 $cat_class="";
                 $login_class="";
                 $registration_class="";
                 $contact_class="";
                 $page_name= basename($_SERVER['PHP_SELF']);
                 $registerpage='registration.php';
                 if($page_name==$registerpage){
                      $registration_class='active';
                 }else if(isset($_GET['category'])){
                       $cat_class='active';
                 }else if($page_name=='contact.php'){
                     $contact_class='active';
                 }else if($page_name=='login.php'){
                      $login_class="active";
                 }
                 
                 echo "<li class='<?php echo $cat_class?>' ><a href='category.php?category=$cat_id'> $cat_title </a> </li>";
              }
               
               ?>     
                    <?php if(isLoggenIn()):  ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <li>
                        <a href="includes/logout.php">Logout</a>
                    </li>
                    <?php else:?>
                    <li class="<?php echo$registration_class ?>">
                          <a  href="registration.php">SignUp</a>
                    </li>
                    <li class="<?php echo $contact_class;?>">
                        <a href="contact.php">ContactUs</a>
                    </li>
                    <li class="<?php echo $login_class;?>">
                        <a href="login.php">Login</a>
                    </li>
                      <?php endif; ?>
                   
                    <?php
                 if(isset($_SESSION['user_role'])) {
                     $dd=$_SESSION['user_role'];
                     if($dd=='admin'){
                   if(isset($_GET['p_id'])){
                    $the_post_id=$_GET['p_id'];
              echo"<li><a href='admin/posts.php?source=edite_post&p_id=$the_post_id'>Edite Post</a></li>";
                   }
                    }
                 }
                    ?>
                    
                </ul>
                
             
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>