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
$que= mysql_query("select * from admin_approval where user_id='$a'");
$row = mysql_fetch_array($que); 
if($row['status']=='a' || $row['status']=='na') 
{
    echo "<br><br><h2><i>Sorry, You have already registered !!</i></h2>";
    echo "<a href=/Mall_Management_System/login.php><br><h1>HOME<h1></a>";
}
else
{
  $query1 ="insert into admin_approval values ('$a','na')";
  $query2 ="insert into login_details values ('$n', '$s', '$a','$pd', '$p', '$m', '', 'shopowner')";
  if(mysql_query($query1) && mysql_query($query2))
  {
     mysql_query("CREATE TABLE $a ( category VARCHAR(30))");
				$vvv=$a.'_checkout';
				mysql_query("Create table $vvv ( item_id varchar(100), units_purchased int(5), total_cost int(10) )");
				$vvvv=$a.'_statistics';
				mysql_query("Create table $vvvv ( item_id varchar(100), units_for_sale int(5) )");
				echo "<br><br><h2><i>Wait for Mall Administrator's approval</i></h2>";
				echo "<a href=/SeLab/login.php><br><h1>BACK<h1></a>";	 
  } 
  else
  {
   echo "<br><br><h2><i>Status: Failed</i></h2>";
   echo "<a href=/Mall_Management_System/shopowner_registration.php><br><h1>BACK<h1></a>";
  }
}
?> 

