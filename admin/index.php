<?php include 'includes/admin_header.php' ?>
    <div id="wrapper">
        <!-- Navigation -->
  <?php include 'includes/admin_nav.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Wellcome to Admin
                            <small><?php echo $_SESSION['username'];?></small>
                        </h1>
                        <h1><?php  ?></h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            
                
                <!-- /.row -->
                
                
                
                
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                       $query="select * from `posts`";
                       $select_post_for_count= mysqli_query($connection,$query);
                       $posts_count= mysqli_num_rows($select_post_for_count);
                        echo "<div class='huge'>$posts_count</div>";
 
                        ?>
                  
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            
            
            <a href="posts.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                       $query="select * from `comments`";
                       $select_comments_for_count= mysqli_query($connection,$query);
                       $comments_count= mysqli_num_rows($select_comments_for_count);
                        echo "<div class='huge'>$comments_count</div>";
                        ?>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            
            
            
            <a href="comments.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                       $query="select * from `posts`";
                       $select_users_for_count= mysqli_query($connection,$query);
                       $users_count= mysqli_num_rows($select_users_for_count);
                        echo "<div class='huge'>$users_count</div>";
 
                        ?>
                
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <?php
                       $query="select * from `categories`";
                       $select_categories_for_count= mysqli_query($connection,$query);
                       $categories_count= mysqli_num_rows( $select_categories_for_count);
                        echo "<div class='huge'>$categories_count</div>";
 
                        ?>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->   
                <div class="row">
                    
                   <?php
                    $query="select * from `posts` where `post_status`='published'";
                      $select_published_posts_for_count= mysqli_query($connection,$query);
                      $published_posts_count= mysqli_num_rows($select_published_posts_for_count);
                      
                      $query="select * from `posts` where `post_status`='draft'";
                      $select_draft_posts_for_count= mysqli_query($connection,$query);
                      $draft_posts_count= mysqli_num_rows($select_draft_posts_for_count);
                     
   
                      $query="select * from `comments` where `comment_status`='unapproved'";
                      $select_unapproved_count_for_count= mysqli_query($connection,$query);
                      $unapproved_comment_count= mysqli_num_rows($select_unapproved_count_for_count);
                   
                      $query="select * from `users` where `user_role`='subscriber'";
                      $select_subscriber_users_for_count= mysqli_query($connection,$query);
                      $subscriber_users_count= mysqli_num_rows( $select_categories_for_count);
                   
                   
                   
                   
                   
                   
                   
                   
                   ?>       
                   
                       <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
          
          <?php
          
          $elements_text=['All_posts','Active Posts','draft_posts','comments','pending_comments','users','subcriber_users','Categories'];
          $elements_count=[$posts_count,$published_posts_count,$draft_posts_count,$comments_count,$unapproved_comment_count,$users_count,  $subscriber_users_count,$categories_count];
          
          for($i=0;$i<7;$i++){
              echo "['$elements_text[$i]'" . "," . "'$elements_count[$i]'],";
          }
   
          ?>
          
          
          
          
          
          
          
  
//          ['Posts', 1000]
        
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
      <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
            
            
            
            
            
            

        
        
        
        
        
        
        
        
        </div>
    </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php' ?>

