<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
    <!-- Navigation -->
  <?php include 'includes/nav.php'; ?>
  
  
    
    <!-- Page Content -->
    <div class="container">

            <div class="row">
 
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
               <?php
               //////////Acess p_id in the link///////////////////////////////
               if(isset($_GET['u_name'])){
                 $the_post_author=$_GET['u_name'];
                 $the_post_id=$_GET['p_id'];
               }
       
            $query="SELECT * FROM  posts where `post_author`='$the_post_author'";
            $select_posts= mysqli_query($connection, $query);    
            while ($row=mysqli_fetch_assoc($select_posts)){
                $post_id=$row['post_id'];
                 $post_title=$row['post_title'];
                 $post_author=$row['post_author'];
                 $post_date=$row['post_date'];
                 $post_image=$row['post_image'];
                 $post_content=$row['post_content'];
                
               ?>    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"> <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All Posts By <?php echo $post_author;?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
              
            <?php }?>
            
       
                
            
                <hr>
                <!-- Posted Comments -->
           
            
               
                
                
                

               
           
            </div>
           <?php include 'includes/side_bar.php'; ?> 
            </div>
    </div>



                    
                   


        
                   <!-- Footer -->   
       <?php include 'includes/footer.php'; ?>
