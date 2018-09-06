<?php
session_start();
if(!isset($_SESSION['user_id']))
    header("location:/SeLab/login.php");
if($con=mysql_connect('localhost','root',''));

else
{
	header("Location: /SeLab/login.php");
}

mysql_select_db('se_lab');
$pwd=$_POST['pswd'];
$user=$_POST['user_id'];

$result= mysql_query("select * from login_details where pswd='$pwd' and user_id='$user'");
$row=mysql_fetch_array($result);
if(mysql_num_rows($result)==1)
{
  $_SESSION['user_id']=$_POST['user_id'];
  
  if($_POST['user_account']==1)
   {
     $_SESSION['user_account']=$_POST['user_account'];
     if($row['type']=="admin")     header("location:/SeLab/admin/admin_homepage.php");
     else
	 {  
	    echo '<script>alert("Please login via correct user account")</script>';
	    header("Location: /SeLab/login.php");	 
	 }
   }
   
  if($_POST['user_account']==2)
   {
      $_SESSION['user_account']=$_POST['user_account'];
      if($row['type']=="shopowner")    
	    {
		  $que= mysql_query("select * from admin_approval where user_id='$user'");
          $row = mysql_fetch_array($que); 
          if($row['status']=='a')
           {
		     header("location:/SeLab/shopowner/shopowner_homepage.php");
		   }
		  else
		  {
             echo '<script>alert("Please wait for admin approval")</script>';
             
          }
		}			 
	  else    
	  {
         echo '<script>alert("Please login via correct user account")</script>';
		 header("Location: /SeLab/login.php"); 
	  }
   } 
   
  if($_POST['user_account']==3)
   {
     $_SESSION['user_account']=$_POST['user_account'];
     if($row['type']=="customer")     header("location:/SeLab/customer/customer_homepage.php");
     else    
	 {
	   echo '<script>alert("Please login via correct user account")</script>';
	   
	   header("Location: /SeLab/login.php"); 	
	 }
   } 
   
}
else
{

  echo '<script>alert("Incorrect Data")</script>';
  header("Location: /SeLab/login.php");
}

?>