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
                            <small>Subheading</small>
                        </h1>
                        <div class="col-xs-6">
                               <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Categorie</label>
                                <input type="text" class='form-control' name="cat_title">
                            </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type='submit' name="submit" value="Add_categorie">
                            </div>
                        </form>
                          
                            <?php 
                            ///////////////////Add New Category/////////////////////////////////////////
                            insert_categories();
                            ?>
                     
<!--                         <?php
                            ///////////////////////Update and include Query//////////////////////////////
                      
                         
                         ?> -->
                         
                    </div>
  
                        <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <thead>
                                <?php 
                                ///////////////////////Show all categories in table//////////////////////////
                                findAllCategories();
                                ?>
                                <?php
                             delete_Categories();
                                ?>
                            
                            </thead>
                            
                        </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->
            
<?php //include 'includes/edite_categories.php';
                        if(isset($_GET['edite'])){
                             $cat_id=$_GET['edite'];
                             include("includes/edite_categories.php");  
                         }

?> 
        </div>
        <!-- /#page-wrapper -->
<?php include 'includes/admin_footer.php' ?>

