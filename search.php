<?php include 'includes/db.php';?>
<?php include 'includes/header.php';?>

<?php include 'includes/nav.php';?>
<div class="container">
<div class="row">
    <div class="col-md-8">
<?php 
           if(isset($_POST['submit']))
           {
            $result=  $_POST['search'];
            $query="select * from posts where `post_tag` like '%$result%'";
            $search_query=mysqli_query($connection,$query);
            $count= mysqli_num_rows($search_query);            
            if($count==0){
                  echo("Not found");
                   }
            else {
                  
            while ($row=mysqli_fetch_assoc($search_query)){
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
                <img width="200" height="200" src="images/<?php echo $post_image  ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <!-- Second Blog Post -->
            

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
           <?php   }}} ?>
    </div>
                 <?php include 'includes/side_bar.php';?>      
</div>
         
</div>
       <?php include 'includes/footer.php'; ?>

