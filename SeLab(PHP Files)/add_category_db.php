<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$user=$_SESSION['user_id'];

$n=$_POST[category];
$que = "SELECT * FROM `".$user."`";
$r1 = mysql_query($que) or die(mysql_error());
$chk=0;
while($row=mysql_fetch_array($r1)) 
{
  $c1=$row['category']; 
  if($c1==$n)
  {
    echo '<script>alert("Category already exists..");  history.back();</script>';
	$chk=1;
	break;
  }
}

if($chk==0)
{
  $query1 ="insert into $user values ('$n')";
  $rp=mysql_query($query1) or die(mysql_error());
  if($rp)
  {
     $tab=$user.'_'.$n;
	 if(mysql_query("CREATE TABLE $tab ( item_id VARCHAR(150), item_name VARCHAR(30), brand VARCHAR(30), cost int(8), shipping_cost int(8), specification text, quantity_available int(5), pic_path VARCHAR(200))"))
     {
	 ?>
     <script type="text/javascript">
       alert("Category Added");
       history.back();
     </script>
	 <?php	
	 }
	 else
	 {
	 ?>
	 <script type="text/javascript">
       history.back();
     </script>
	 <?php
	 }
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
}

?>