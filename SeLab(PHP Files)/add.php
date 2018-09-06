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
	<style>

	</style>
	
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
						    
							
							
							    <!------ Slider ------------>
								<br><br>
							    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp		
										   <a href='add_category.php' style="
    border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;" >Add Category</a> 
							    &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp		
										   <a href='add_item.php' style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">Add Products</a> 
							      
							  <!------End Slider ------------>
			                
   		        </div>
   </div>
   </div>
   <!------------End Header ------------>
   
  
    <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>