<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
   die("connection".mysql_error());
}
mysql_select_db("se_lab");
$n=$_POST[name];
$s=$_POST[shopname];
$p=$_POST[phno];
$a=$_POST[shopID];
$m=$_POST[mail_id];
$pd=$_POST[pswd];
$que= mysql_query("select * from login_details where user_id='$a'");
$row = mysql_fetch_array($que); 
$nn= mysql_num_rows($row);
if($nn==1)
{
    echo "<br><br><h2><i>Sorry, You have already registered !!</i></h2>";
    echo "<a href=/Mall_Management_System/login.php><br><h1>HOME<h1></a>";
}
else
{
  $query2 ="insert into login_details values ('$n', '$s', '$a','$pd', '$p', '$m', '', 'customer')";
  if(mysql_query($query2))
  {
  $rrt=$a.'_cart';
     mysql_query("CREATE TABLE $rrt ( item_id VARCHAR(150), quantity int (5))");
	 echo "<br><br><h2><i>Account Successfully Created...</i></h2>";
	 echo "<a href=/SeLab/login.php><br><h1>BACK<h1></a>";	 
  } 
  else
  {
   echo "<br><br><h2><i>Status: Failed</i></h2>";
   echo "<a href=/Mall_Management_System/customer_registration.php><br><h1>BACK<h1></a>";
  }
}
?> 

