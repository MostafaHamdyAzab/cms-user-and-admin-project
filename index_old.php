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
             
$query="SELECT * FROM  posts where `post_status`='published' ";
$select_posts= mysqli_query($connection, $query);
$count= mysqli_num_rows($select_posts);
if($count==0){
     echo "<h1 class='text_center'>No Posts Founded</h1>";
}else{
   
while ($row = mysqli_fetch_assoc($select_posts)) {
  $post_id= $row['post_id'];
  $post_author=$row['post_author'];  
  $post_title=$row['post_title'];
  $post_category_id=$row['post_category_id']; 
  $post_status=$row['post_status']; 
  $post_tag=$row['post_tag'];
  $post_comment_count=$row['post_comment_count'];
  $post_image=$row['post_image'];
  $post_date=$row['post_date'];
  $post_content= substr($row['post_content'],0,50);  
  $post_status=$row['post_status'];
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
                    by <a href="user_posts.php?u_name=<?php echo $post_author?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>"> 
                <img class="img-responsive" src="images/<?php echo $post_image  ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
<?php } }?>
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
        <hr>
 <!-- Footer -->   
  <?php include 'includes/footer.php'; ?>
