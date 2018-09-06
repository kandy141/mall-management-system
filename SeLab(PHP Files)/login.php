<?php
session_start();
if(isset($_SESSION['user_id']) && isset($_SESSION['pswd']) &&isset($_SESSION['user_account']))
  header("Location: /temp6/login.php");
?>
<head> 
   <script>
     function myFunction()
      {
		var y=document.myform.user_account.selectedIndex;
		if(y>=1)
	          return true; 			 
		else
		  {
			alert("No empty fields please !!");
			return false;
		  }    
		var texts=document.getElementsByTagName('input')
		for (var item=0; item<texts.length; item++)
		if (texts[item].type=='text')
			texts[item].value=''
      } 
   </script>
   <style>

.select-style {
    border: 1px solid #ccc;
    width: 170px;
    border-radius: 3px;
    overflow: hidden;
    background: #fafafa url("img/icon-select.png") no-repeat 90% 50%;
}

.select-style select {
    padding: 5px 8px;
    width: 130%;
	font-weight:bold;
    border: none;
    box-shadow: none;
    background: transparent;
    background-image: none;
    -webkit-appearance: none;
}

.select-style select:focus {
    outline: none;
}
   </style>
   
    <title>GSM Mall</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
</head>
<body>
	<div class="header">
		 <div class="headertop_desc">
			<div class="wrap">
				<div class="nav_list">
					<ul>
						<li><a href="index.html">Home</a></li>
						<li><a href="contact.html">Contact</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
						    <li><a href="login.php">Login</a></li>
							<li><a href="login.php">Register</a></li>
						</ul>
					</div>
				<div class="clear"></div>
			</div>
	  	 </div>
		 
  	  	 <div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="index.html"><img src="images/logo.png" alt="" /></a>
					</div>
  		        </div>     
				
   		</div>
   </div>
   <!------------End Header ------------>
 
 <center>
     <form method="post" id="myform" name="myform" action="logincheck.php" onSubmit="return myFunction()">
       <br><br><br><br><br><br>
       <table>
         <tr><td><span id="user" style="font-family:'Times New Roman',Georgia,Serif; font-weight:bold">Username</span></td><td><input type="text"  id="user_id"  name="user_id" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
         <tr><td>&nbsp</td></tr>
		 <tr><td><span id="pd" style="font-family:'Times New Roman',Georgia,Serif; font-weight:bold">Password</span></td><td><input type="password"  id="pswd" name="pswd" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
         <tr><td>&nbsp</td></tr>
		 <tr><td><span id="pd" style="font-family:'Times New Roman',Georgia,Serif; font-weight:bold">User Account</span></td><td>	
		 <div class="select-style">
		 <select id="user_account" name='user_account' style="margin-left:20%">
			<option name="none" value=0>----SELECT----</option>
			<option selected value=1 name="admin">Administrator</option>
			<option value=2 name="shopowner">Shop Owner</option>
			<option value=3 name="customer">Customer</option>
		 </select>
		 </div>
		 </td></tr>
		<tr><td>&nbsp</td></tr>
		 <tr><td>&nbsp</td><td> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <input type="submit" name="login" id="login" value="Login" style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;"/></td></tr>
		 
         <tr><td><a href="shopowner_registration.php" ><p style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">Shop Owner Registration</p></a></td>
		 <td></td>
		 <td><a href="customer_registration.php" ><p style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">Customer Registration</p> </a></td></tr>
           
	   </table>
     </form>
   </center>
 </body>