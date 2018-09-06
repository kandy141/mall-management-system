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
$cat=$_GET['cat'];

$tab=$us.'_'.$cat;
$qq=mysql_query("delete from `".$tab."` where item_id='$prod_id'");

$ttl=$us.'_statistics';
$qq=mysql_query("delete from `".$ttl."` where item_id='$prod_id'");


echo '<script>history.back();</script>';
?>