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
if (isset($_POST["box"])) 
{
    $num=$_POST['box'];    
}

$crt=$us.'_cart';
if($num<=$avail)
{
 $qq=mysql_query("select * from `".$crt."` where item_id='$prod_id'");
 $ww=mysql_fetch_array($qq);
 if(mysql_num_rows($qq)==0)
    $result= mysql_query("insert into `".$crt."` values ('$prod_id', '$num')");
 else
 {
   $vv=$ww['quantity']+$num;
   $asa=mysql_query("UPDATE `".$crt."` SET quantity=$vv WHERE item_id='$prod_id'");
 }
 echo '<script>alert("Added to Cart"); history.back();</script>';
}
else
{
   echo '<script>alert("Requirement exceeds stock limit"); history.back();</script>';
} 

?>