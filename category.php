<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>
    <!-- Navigation -->
  <?php include 'includes/nav.php'; ?>
  <?php include 'includes/nav.php'; ?>
    <?php include 'admin/includes/functions.php'; ?>
    <!-- Page Content -->
    <div class="container">

            <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                 
               <?php
               if(isset($_SESSION['username'])){
               if(isset($_GET['category'])){
                   $the_post_category_id=$_GET['category'];
               }
               if(is_Admin($_SESSION['username'])){
             
            $stmt1=mysqli_prepare($connection,"SELECT `post_id`,`post_author`,`post_title`,`post_category_id`,`post_image`,`post_date`,`post_status`,`post_content` FROM  posts where `post_category_id`=?");
            mysqli_stmt_bind_param($stmt1, 'i', $the_post_category_id);
            mysqli_stmt_execute($stmt1);
            mysqli_stmt_bind_result($stmt1,$post_id,$post_author,$post_title,$post_category_id,$post_image,$post_date,$post_status,$post_content);
    while(mysqli_stmt_fetch($stmt1)) {
//  $post_id= $row['post_id'];
//  $post_author=$row['post_author'];  
//  $post_title=$row['post_title'];
//  $post_category_id=$row['post_category_id']; 
//  $post_status=$row['post_status']; 
//  $post_tag=$row['post_tag'];
//  $post_comment_count=$row['post_comment_count'];
//  $post_image=$row['post_image'];
//  $post_date=$row['post_date'];
//  $post_content= substr($row['post_content'],0,50);   

   ?>
                  <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>
               
                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>"> <?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
      <?php } }
               }else{
                   echo "<h1 class='text-center'>No Posts Are Available</h1>";
               }?>  
                <hr>

                <!-- Third Blog Post -->
               
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>
          

            </div>

            <!-- Blog Sidebar Widgets Column -->
       <?php include 'includes/side_bar.php'; ?> 
            
              </div> 
                </div>
  <?php include 'includes/search.php'; ?> 

                <!-- Blog Categories Well -->
       
        <!-- /.row -->
        <hr>
 <!-- Footer -->   
       <?php include 'includes/footer.php'; ?>

