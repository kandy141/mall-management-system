<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
$id=$_GET['id'];
$qq=mysql_query("update admin_approval set status='na' where user_id='$id'");
if($qq)
   echo '<script>alert("Shop Blocked Temporarily.."); history.back();</script>';
else
   echo '<script>alert("Status: Failed.."); history.back();</script>';   
?>