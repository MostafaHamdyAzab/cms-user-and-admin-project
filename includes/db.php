  <?php 
  ob_start();
$connection=new mysqli("localhost","root","","cms");
if(!$connection){
    die('Failed to Connect');
   }
 
?>