     
                             <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Update Categorie</label>
                                <?php
                              if(isset($_GET['edite'])){
                              $cat_id= mysqli_real_escape_string($connection,$_GET['edite']);
                              $query="select * from categories where`cat_id`= '$cat_id' ";
                              $select_all_catergories_id_query= mysqli_query($connection, $query);
                              while($row=mysqli_fetch_assoc( $select_all_catergories_id_query)){
                              $cat_id=$row['cat_id'];
                              $cat_title=$row['cat_title'];                       
                             ?>
                             <input value="<?php if(isset($cat_title))
                                       {  echo $cat_title;}?>" 
                                 type="text" class='form-control' name="cat_title"  >
                                           <?php } } ?>
                            </div>
                                  <div class="form-group">
                                <input class="btn btn-primary" type='submit' name="update_category" value="update_categorie">
                            </div>
                            
                        </form>
                            
                            
                            <?php
                            if(isset($_POST['update_category'])){
                                  
                             $the_cat_title=$_POST['cat_title'];
                             if($the_cat_title==""|| empty($the_cat_title)){
                                 echo 'This must have a value';
                             }
                         else{
                             $query="update `categories` set `cat_title`= '$the_cat_title' where `cat_id`=$cat_id";
                             $update_query= mysqli_query($connection, $query);  
                             header("Location: categories.php");
                             if(!$update_query){
                                 die('Failed to Update'. mysqli_error($connection));
                             }
                             }
                           
                               
                             } 
                             
                            
               
                            ?>
                             
                    </div>
