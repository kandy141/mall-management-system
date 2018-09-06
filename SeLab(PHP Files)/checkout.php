<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];

$crt=$us.'_cart';
$error=0;
$qq="select * from `".$crt."`";
$r1 = mysql_query($qq) or die(mysql_error());	
while($row1=mysql_fetch_array($r1))    
    {
		    $c1=$row1['item_id'];
			$c2=$row1['quantity'];
			$split=explode('_',$c1,-1);
			$tab=$split[0].'_'.$split[1];
			$qq2="select * from `".$tab."` where item_id='$c1'";
			$r2 = mysql_query($qq2) or die(mysql_error());
			$row2=mysql_fetch_array($r2);
			$cc4=$row2['cost'] * $c2;
			$cc5=$row2['shipping_cost'] * $c2;
			$cc6=$row2['quantity_available'];
			if($c2>$cc6)
			{
				$error=1;
			}
    }			
if($error!=1)
{
  
  $qq="select * from `".$crt."`";
  $r1 = mysql_query($qq) or die(mysql_error());	
  while($row1=mysql_fetch_array($r1))
    {
		    $c1=$row1['item_id'];
			$c2=$row1['quantity'];
			$split=explode('_',$c1,-1);
			$tab=$split[0].'_'.$split[1];
			$qq2="select * from `".$tab."` where item_id='$c1'";
			$r2 = mysql_query($qq2) or die(mysql_error());
			$row2=mysql_fetch_array($r2);
			$cc4=$row2['cost'] * $c2;
			$cc5=$row2['shipping_cost'] * $c2;
			$cc6=$row2['quantity_available'];
			if($c2<=$cc6)
			{
			   if($c2<$cc6)
			    {
				  $left=$cc6-$c2;
				  $qq3="update `".$tab."` set quantity_available=$left where item_id='$c1'";
				  if(mysql_query($qq3))
				    {
					  $qq4=mysql_query("delete from `".$crt."` where item_id='$c1'");
					}
			    }
			   if($c2==$cc6)
			    {
				  $qq3="delete from `".$tab."` where item_id='$c1'";
				  if(mysql_query($qq3))
				    {
					  $qq4=mysql_query("delete from `".$crt."` where item_id='$c1'");
					}
			    }
			   
               $vvv=$split[0].'_checkout'; 		
			   $totalcost=$cc4 + $cc5; 
			   $date=date("y/m");
			   $qq6=mysql_query("insert into `".$vvv."` values('$c1', '$c2', '$totalcost')");	
			}
    }
	echo '<script>alert("Checkout Success..."); </script>';
}
else
{
  echo '<script>alert("Quantity exceeds stock limit. Plz check again..."); histoy.back();</script>';
}	
?>
<br>
<a href="customer_homepage.php"><h2 style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">BACK</h2></a>	