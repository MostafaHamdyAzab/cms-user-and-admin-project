<?php session_start();?>
<?php include 'db.php'; ?>

<?php  
if(isset($_POST['login'])){
 $username=  $_POST['username'];
 $password= $_POST['password'];

 
 $username= mysqli_real_escape_string($connection,$username);
 $password=mysqli_real_escape_string($connection,$password);
 
 $query="Select * from `users` where `user_name` = '$username' " ;
 $select_user_query= mysqli_query($connection, $query);
 
 if(!$select_user_query){
     
     die('Query Failed'. mysqli_error($connection));
 }else{
 while($row= mysqli_fetch_array($select_user_query)){
   $db_user_id=$row['user_id'];
   $db_user_name=$row['user_name'];
   $db_user_password=$row['user_password'];
   $db_user_firstname=$row['user_firstname'];
   $db_user_lastname=$row['user_lastname'];
   $db_user_email=$row['user_email'];
   $db_user_role=$row['user_role'];
 }}
  //echo $password= crypt($password, $db_user_password );
   
//if ($username === $db_user_name && $password === $db_user_password) 
if(password_verify($password, $db_user_password)){
   $_SESSION['id']=$db_user_id;
   $_SESSION['username']=  $db_user_name;
   $_SESSION['user_firstname']=  $db_user_firstname;
   $_SESSION['user_lastname']=  $db_user_lastname;
   $_SESSION['user_role']=  $db_user_role;
   $_SESSION['password']=$db_user_password;
   $_SESSION['email']=$db_user_email;
   header("Location: ../admin");
 }
else{
     header("Location: ../index.php");
}
}

?>