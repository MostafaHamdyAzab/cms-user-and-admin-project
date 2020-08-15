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
               //////////Increase The post View count ////////////////////////
               if(isset($_GET['p_id'])){
               $the_post_id=$_GET['p_id'];
               $query="update `posts` set `post_views_count`=`post_views_count`+1 where `post_id`='$the_post_id'";
               $increase_views_count=mysqli_query($connection,$query);
               if(!$increase_views_count){
                 die('Failed Query For Count Views'. mysqli_error($connection ));
               }
       
            $query="SELECT * FROM  posts where `post_id`='$the_post_id'";
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
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
              
               <?php }}?>
            
       
                
                
                
                     <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">
                          <div class="form-group">
                              <label for="author">Author</label>
                              <input type="text" class="form-control" name="comment_author">
                        </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" name="comment_email">
                        </div>
                        <div class="form-group">
                               <label for="comment">Your Comment</label>
                               <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>
                <!-- Posted Comments -->
           
                <?php
                //////////////////////////Getting comment and user information//////////////////////////////
               
                if(isset($_POST['create_comment'])){
                   $comment_author=$_POST['comment_author'];
                   $comment_email=$_POST['comment_email'];
                   $comment_content=$_POST['comment_content'];
                   $comment_date = date('Y-m-d ');
                   $the_post_id=$_GET['p_id'];
                   $comment_status="unapproved";
                   $comment_content= mysqli_real_escape_string($connection,$comment_content);
                   if(!empty($comment_author)&&!empty($comment_email)&&!empty($comment_content)){
                   $query="INSERT INTO `comments`(`comment_post_id`, `comment_author`, `comment_email`,`comment_content`,`comment_status`,`comment_data`)"; 
                   $query .="values('$the_post_id','$comment_author','$comment_email','$comment_content','unapproved',now())";
                   $query_add_comment=mysqli_query($connection,$query);
                   if(!$query_add_comment){
                       echo 'not inserted'. mysqli_error($connection); 
                  }//End chek query
                  }//End check if empty
                  }//End isset
                $query="update `posts` set `post_comment_count`=post_comment_count+1  where `post_id` = '$the_post_id'"  ;
                $update_post_comment_count=mysqli_query($connection,$query);
                  if( !$update_post_comment_count){
                       echo 'not update'. mysqli_error($connection);
                      } //End update_post
                                  
                ?>
               
                
                
                

                <!-- Comment -->
                     <?php
                  $query="Select * from comments where `comment_post_id`='$the_post_id'";
                  $query.="and `comment_status`='approve'";
                  $query.="order by `comment_id` DESC";
                  $select_comment_query=mysqli_query($connection,$query);
                  if(!$select_comment_query){
                  echo 'Failed'. mysqli_error($connection);
                  }
                  while ($row= mysqli_fetch_assoc($select_comment_query)){
                      $comment_date=$row['comment_data'];
                      $comment_author=$row['comment_author'];
                      $comment_content=$row['comment_content'];
                    
                    ?>
                
                
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author;?>
                            <small><?php echo $comment_date;?></small>                          
                        </h4>
                       <?php echo $comment_content;?>
                    </div>
                </div>
                  <?php }?>
           
            </div>
           <?php include 'includes/side_bar.php'; ?> 
            </div>
    </div>   
                   <!-- Footer -->   
       <?php include 'includes/footer.php'; ?>
