<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
$val=$_GET['val'];
?>

<head>
<title>Shops List</title>
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
</head>
<body>

   <div class="header">
		 <div class="headertop_desc">
			<div class="wrap">
				<div class="nav_list">
					<ul>
						<li><a href="customer_homepage.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
						    <li><a href="logout.php">Logout</a></li>
							<li><a href="view_cart.php">Checkout</a></li>
							<li><a href="view_cart.php">View Cart</a></li>
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
						  	   <h3>Categories</h3>
							     <?php
								  $q1 = "SELECT * from `".$val."`";
								  $r1 = mysql_query($q1) or die(mysql_error());
								  while($row1=mysql_fetch_array($r1))
								  {
								   $c1=$row1['category'];
								   ?>
								   <li><a href="inside_shop_category.php?cat=<?php echo $c1;?>&shop=<?php echo $val;?>"><?php echo $c1;?></a></li>
							       <?php 
								  } 
						  	     ?>
							 </ul>
						</div>					
		  	         </div>
						    
							
							
							<div class="header_bottom_right">					 
						 	    <!------ Slider ------------>
								  <div class="slider">
							      	<div class="slider-wrapper theme-default">
							            <div id="slider" class="nivoSlider">
							                <img src="../images/1.jpg" data-thumb="../images/1.jpg" alt="" />
							                <img src="../images/2.jpg" data-thumb="../images/2.jpg" alt="" />
							                <img src="../images/3.jpg" data-thumb="../images/3.jpg" alt="" />
							                <img src="../images/4.jpg" data-thumb="../images/4.jpg" alt="" />
							                <img src="../images/5.jpg" data-thumb="../images/5.jpg" alt="" />
							            </div>
							        </div>
						   		  </div>
						      <!------End Slider ------------>
			                </div>
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
