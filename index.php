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
$per_page=2;
   if(isset($_GET['page'])){
       $page=$_GET['page'];
       }else{
           $page="";
       }
       
       if($page==1 ||$page==""){
           $page_1=0;
       }else{
           $page_1=($page* $per_page)- $per_page;
       }

?>



   <?php
 $query="SELECT * FROM  posts where `post_status` ='published' ";
$select_posts_for_count= mysqli_query($connection, $query);
$count= mysqli_num_rows($select_posts_for_count);
$count= ceil($count/2);

$query="SELECT * FROM  posts limit $page_1 ,$per_page";
$select_posts= mysqli_query($connection, $query);

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
  if($post_status=='published'){
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
          <ul class="pager">
              <?php
              for($i=1;$i<=$count;$i++){
                 
                  if($i==$page){
                  echo"<li><a class='active_link' href='index.php?page=$i'>$i</a></li>";
              }else{
                     echo"<li><a href='index.php?page=$i'>$i</a></li>";
              }
              }

              ?>
               
         
                
            </ul>
                </div>
  <?php include 'includes/search.php'; ?>            
        <hr>
 <!-- Footer -->   
  <?php include 'includes/footer.php'; ?>
