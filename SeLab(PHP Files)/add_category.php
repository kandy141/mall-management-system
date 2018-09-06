<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
?>


<head>
<title>Add Products</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="../css/slider.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="../js/jquery-1.9.0.min.js"></script> 
<script type="text/javascript" src="../js/move-top.js"></script>
<script type="text/javascript" src="../js/easing.js"></script>
<script type="text/javascript" src="../js/jquery.nivo.slider.js"></script>
<script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
	
	   <script>
     function myFunction()
      {
		var p=document.getElementById('category');
		if(p.value!='' && p.value!=null)
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
	
</head>
<body>

   <div class="header">
		 <div class="headertop_desc">
			<div class="wrap">
				<div class="nav_list">
					<ul>
						<li><a href="shopowner_homepage.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
					    <li><a href="../logout.php">Logout</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
							<li><a href="add.php">Add</a></li>
							<li><a href="remove_category.php">Remove Category</a></li>
							<li><a href="edit_remove_item.php">Edit/Remove Item</a></li>							
							<li><a href="statistics.php">My Statistics</a></li>
						</ul>
					</div>
				<div class="clear"></div>
			</div>
	  	 </div>
		 
  	  	 <div class="wrap">
				<div class="header_top">
					<div class="logo">
						<a href="index.html"><img src="../images/logo.png" alt="" /></a>
					</div>	  
			        <div class="clear"></div>
  		        </div>     
				
				<div class="header_bottom">
					
					<div class="header_bottom_left">				
						<div class="categories">
						   <ul>
						  	   <h3>My Categories</h3>
							     <?php
								  $q1 = "SELECT * from `".$us."`";
								  $r1 = mysql_query($q1) or die(mysql_error());
								  while($row1=mysql_fetch_array($r1))
								  {
								   $c1=$row1['category'];
								   ?>
								   <li><a href='#'><?php echo $c1;?></a></li>
							       <?php 
								  } 
						  	     ?>
							 </ul>
						</div>					
		  	         </div>
						    
					<br><br>		
						 	    <!------ Slider ------------>
								  	   <center>
											<form method="post" id="myform" name="myform" action="add_category_db.php" onSubmit="return myFunction()">
											 <table>
											  <tr><td><span id="user"><i>Category Name</i> &nbsp &nbsp</span></td><td><input type="text"  id="category"  name="category" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
											  <tr><td>&nbsp</td><tr> 
											  <tr><td>&nbsp</td><td><input type="submit" name="add" id="add" value="Add Category" style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;"></td>  
											 </table>
											</form>
										   </center>
							    <!------End Slider ------------>
			        
   		        </div>
   </div>
   </div>
   <!------------End Header ------------>