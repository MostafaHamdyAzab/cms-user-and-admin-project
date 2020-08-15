<?php
function  online_Users(){
    global $connection;
    
        $session= session_id();
        $time=time();
        $time_out_in_second=30;
        $time_out=$time - $time_out_in_second;
        $query="select * from users_online where`session`='$session'";
        $select_online_users= mysqli_query($connection, $query);
        $count= mysqli_num_rows( $select_online_users);
        
        if($count=='null'){
            mysqli_query($connection,"insert into `users_online`(`session`,`time`) values('$session','$time')");
        }else{
               mysqli_query($connection,"update `users_online `set `time`='$time' where `session`='$session'"); 
        }
        $user_online_query= mysqli_query($connection,"select * from `users_online` where `time` > '$time_out'");
        if(!$user_online_query){
            die('Error in user online query'. mysqli_error($connection). mysqli_errno($connection));
        }
        return $count= mysqli_num_rows($user_online_query);
        
}









function confirmQuery ($result){
    GLOBAL $connection;
    if(!$result){
        echo 'Query Failed.'. mysqli_error($connection);
    }
    
}

function insert_categories(){
    
   global $connection;
    
               if(isset($_POST['submit'])){
                                  $cat_title=$_POST['cat_title'];
                                 if($cat_title==""||empty($cat_title)){
                                   echo 'This Field Must Have a Value';   
                               }
                               else{
                             
                               $stm=mysqli_prepare($connection,"INSERT INTO `categories`(`cat_title`)values(?)");
                               mysqli_stmt_bind_param($stm,'s', $cat_title);
                               mysqli_stmt_execute($stm);
                               if(!$stm){
                                   die("Failed to insert new categories");
                        }
                               }
                            }
}
function findAllCategories(){
    global $connection;
     $query="select * from categories";
                              $select_all_catergories_query_categories= mysqli_query($connection, $query);
                              while($row=mysqli_fetch_assoc( $select_all_catergories_query_categories)){
                              $cat_id=$row['cat_id'];
                              $cat_title=$row['cat_title']; 
                              echo"<tr>";
                             echo " <td>$cat_id </td>";
                             echo " <td>$cat_title </td>";
                             echo " <td><a href='categories.php?delete=$cat_id '>Delete</a></td>";
                             echo " <td><a href='categories.php?edite=$cat_id '>Edite</a></td>";
                                    echo"</tr>";
                              }
}
function delete_Categories(){
    global $connection;
      if(isset($_GET['delete'])){
                                  $the_cat_id=$_GET['delete'];
                                  $query=" Delete from `categories` where `cat_id` = $the_cat_id ";
                                  $delete_query=mysqli_query($connection,$query);
                                    header("Location: categories.php");
                                }
    
}
function is_Admin($user_name){
    global $connection;
    $query="select `user_role` from `users` where `user_name`= '$user_name' ";
    $result= mysqli_query($connection , $query);
    confirmQuery($result);
    $row= mysqli_fetch_array($result);
    if($row['user_role'] == 'admin'){
        return true;
    }else{
        return false;
    }
    
}
function username_Exists($user_name){
       global $connection;
     $query="select `user_name` from `users` where `user_name` = '$user_name'";
     $result= mysqli_query($connection, $query);
     $select_all_similiar_users= mysqli_num_rows($result);
     if(  $select_all_similiar_users > 0){
         return true;
     }else{
         return false;
     }
}
function useremail_Exists($user_email){
       global $connection;
     $query="select `user_email` from `users` where `user_email` = '$user_email'";
     $result= mysqli_query($connection, $query);
     $select_all_similiar_users= mysqli_num_rows($result);
     if(  $select_all_similiar_users > 0){
         return true;
     }else{
         return false;
     }
}
function insert_Newuser($user_name,$email,$password){
       global $connection;
   $user_name= mysqli_real_escape_string($connection,$user_name);
   $password= mysqli_real_escape_string($connection,$password);
   $email= mysqli_real_escape_string($connection,$email);
   $password= password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
   $query="insert into `users`(`user_name`,`user_password`,`user_email`,`user_role`)";
   $query.="values ('$user_name','$password','$email','subscriber')";
   $register_user_query= mysqli_query($connection,$query);
   if(!$register_user_query){
       die("Query Failed".mysqli_error($connection));
   }else{
       return true;
   }
}

function isLoggenIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }else{
        return false;
    }
}


function redirect($location){
    header("Location: $location");
}

function checkIfUserIsLoggedInAndRedirect($location){
    if(isLoggenIn()){
        redirect($location);
    }
}

function ifItisMethod($method){
    if($_SERVER['REQUEST_METHOD']== strtoupper($method)){
        return TRUE;
    }else{
        return FALSE;
    }
}








?>

