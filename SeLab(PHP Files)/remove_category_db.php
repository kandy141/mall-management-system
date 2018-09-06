<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$user=$_SESSION['user_id'];

$cat=$_GET['val'];
$tabb=$user.'_'.$cat;

$que1 ="DROP TABLE IF EXISTS $tabb";
$que2 ="DELETE FROM $user WHERE category='$cat'"; 
  
  if(mysql_query($que1) && mysql_query($que2))
  {
	?>
	 <script type="text/javascript">
       alert("Category Deleted");
       history.back();
     </script>    	
     <?php	 
  } 
  else
  {
   ?>
    <script type="text/javascript">
       alert("Status: Failed");
       history.back();
    </script>
    <?php
  }
