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
$qq=mysql_query("delete from admin_approval where user_id='$id'");
$qqq=mysql_query("delete from login_details where user_id='$id'");
if($qq && $qqq)
   echo '<script>alert("Shop Removed.."); history.back();</script>';
else
   echo '<script>alert("Status: Failed.."); history.back();</script>';   
?>