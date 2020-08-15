<?php// include 'includes/nav.php'; ?>

<div class="col-md-4">
    <form action="search.php" method="POST">
                <div class="well">
                    <h4> Blog Search</h4>
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>  
                                 
                    </div>  
                 </div>
                  
               </form>

         
       
      <div class="well">
                 
                    <?php  if(isset($_SESSION['user_role'])):?>
                      <h4>Logged In As: <?php echo $_SESSION['username'];?> </h4>
                      <a href="includes/logout.php" class="btn btn-primary">Logout</a>
                   <?php else:?>
                           <h4> login </h4>
                         <form action="includes/login.php" method="POST">
                    <div class="form-group">
                        <input name="username" type="text" class="form-control" placeholder="EnterUserName" autocomplete="on">
                        
                    </div>
                        <div class="input-group">
                            <input name="password" type="password" class="form-control" placeholder="password">
                            <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit  </button>
                            </span>
                        
                    </div>
              <div class="form-group">
              <a href="forget_password.php?forget<?php echo uniqid(true);?>">ForgetPassword</a>
                    </div>  
                    </form>
                   
               <?php  endif; ?>
                   
                </div>  
        
        
           
           
           
<div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <?php
                              $query="Select * from `categories`";
              $select_all_catergories_query= mysqli_query($connection, $query);
               ?>   
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php
                  while ($row=mysqli_fetch_assoc($select_all_catergories_query)){
                 $cat_title=$row['cat_title'];
                 $cat_id=$row['cat_id'];
                  echo "<li><a href='category.php?category=$cat_id'> $cat_title </a> </li>";
              }
              ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                               
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

               <?php include 'widgit.php'; ?>

            </div>
           

            
                    

    