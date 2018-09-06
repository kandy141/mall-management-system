<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
$prod_id=$_GET['id'];
$avail=$_GET['avail'];

$crt=$us.'_cart';
$qq=mysql_query("delete from `".$crt."` where item_id='$prod_id'");
echo '<script>history.back();</script>';
?>