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
$tab=$_GET['tab'];

					

$num=1;
$crt=$us.'_cart';

 $qq=mysql_query("select * from `".$crt."` where item_id='$prod_id'");
 $ww=mysql_fetch_array($qq);
 if(mysql_num_rows($qq)==0)
    $result= mysql_query("insert into `".$crt."` values ('$prod_id', '$num')");
 
 echo '<script>alert("Added to Cart"); history.back();</script>';



?>