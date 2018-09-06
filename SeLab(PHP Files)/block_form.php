<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$id=$_GET['val'];
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<style type="text/css" media="screen">
		@import url(http://fonts.googleapis.com/css?family=Ubuntu);
		
		* {margin: 0; padding: 0; }
		
		body {
			font-family: Ubuntu, arial, verdana;
			background: #FFFFFF;
		}
		
		
		.pricing_table {
			line-height: 150%; 
			font-size: 12px; 
			margin: 0 auto; 
			width: 75%; 
			max-width: 800px; 
			padding-top: 10px;
			margin-top: 100px;
		}
		
		.price_block {
			text-align: center; 
			width: 100%; 
			color: #fff; 
			float: left; 
			list-style-type: none; 
			transition: all 0.25s; 
			position: relative; 
			box-sizing: border-box;
			
			margin-bottom: 10px; 
			border-bottom: 1px solid transparent; 
		}
		
		
		.pricing_table h3 {
			text-transform: uppercase; 
			padding: 5px 0; 
			background: #333; 
			margin: -10px 0 1px 0;
		}
		
		.price {
			display: table; 
			background: #444; 
			width: 100%; 
			height: 140px; 
		}
		.price_figure {
			font-size: 24px; 
			text-transform: uppercase; 
			vertical-align: middle; 
			display: table-cell;
		}
		.price_number {
			font-weight: bold; 
			display: block;
		}
		.price_tenure {
			font-size: 11px; 
		}
		
		
		.features {
			background: #E0E0E0 ; 
			color: #000;
		}
		.features li {
			padding: 8px 15px;
			border-bottom: 1px solid #ccc; 
			font-size: 11px; 
			list-style-type: none;
		}
		
		.footer {
			padding: 15px; 
			background: #E0E0E0 ;
		}
		.action_button {
			text-decoration: none; 
			color: #fff; 
			font-weight: bold; 
			border-radius: 5px; 
			background: linear-gradient(#666, #333); 
			padding: 5px 20px; 
			font-size: 11px; 
			text-transform: uppercase;
		}
		
		.price_block:hover {
			box-shadow: 0 0 0px 5px rgba(0, 0, 0, 0.5); 
			transform: scale(1.04) translateY(-5px); 
			z-index: 1; 
			border-bottom: 0 none;
		}
		.price_block:hover .price {
			background:linear-gradient(#DB7224, #F9B84A); 
			box-shadow: inset 0 0 45px 1px #DB7224;
		}
		.price_block:hover h3 {
			background: #222;
		}
		.price_block:hover .action_button {
			background: linear-gradient(#F9B84A, #DB7224); 
		}
		
		
		@media only screen and (min-width : 480px) and (max-width : 768px) {
			.price_block {width: 50%;}
			.price_block:nth-child(odd) {border-right: 1px solid transparent;}
			.price_block:nth-child(3) {clear: both;}
			
			.price_block:nth-child(odd):hover {border: 0 none;}
		}
		@media only screen and (min-width : 768px){
			.price_block {width: 25%;}
			.price_block {border-right: 1px solid transparent; border-bottom: 0 none;}
			.price_block:last-child {border-right: 0 none;}
			
			.price_block:hover {border: 0 none;}
		}
		
		
		.skeleton, .skeleton ul, .skeleton li, .skeleton div, .skeleton h3, .skeleton span, .skeleton p {
			border: 5px solid rgba(255, 255, 255, 0.9);
			border-radius: 5px;
			margin: 7px !important;
			background: rgba(0, 0, 0, 0.05) !important;
			padding: 0 !important;
			text-align: left !important;
			display: block !important;
			
			width: auto !important;
			height: auto !important;
			
			font-size: 10px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: black !important;
		}
		.skeleton .label {
			font-size: 11px !important;
			font-style: italic !important;
			text-transform: none !important;
			font-weight: normal !important;
			color: white !important;
			border: 0 none !important;
			padding: 5px !important; 
			margin: 0 !important;
			float: none !important;
			text-align: left !important;
			text-shadow: 0 0 1px white;
			background: none !important;
		}
		.skeleton {
			display: none !important;
			margin: 100px !important;
			clear: both;
		}
	</style>
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
						<li><a href="admin_homepage.php">Home</a></li>
						<li><a href="contact.php">Contact</a></li>
					    <li><a href="../logout.php">Logout</a></li>
					</ul>
				</div>
					<div class="account_desc">
						<ul>
							<li><a href="approve_requests.php">Approve Requests</a></li>
							<li><a href="block_shop.php">Block Shop</a></li>							
							<li><a href="remove_shop.php">Remove Shop</a></li>
						    <li><a href="statistics.php">Statistics</a></li>
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
			        			        
    
				
				<div class="header_bottom">
					
					<div class="header_bottom_left">				
						<div class="categories">
						   <ul>
						  	   <h3>Pending Requests</h3>
							     <?php
								  $q1 = "SELECT * from admin_approval where status='a'";
								  $r1 = mysql_query($q1) or die(mysql_error());
								  while($row1=mysql_fetch_array($r1))
								  {
								   $c1=$row1['user_id'];
								   ?>
								   <li><a href='block_form.php?val=<?php echo $c1; ?>'><?php echo $c1;?></a></li>
							       <?php 
								  } 
						  	     ?>
							 </ul>
						</div>					
		  	         </div>
						    
							
							
							<div>					 
						 	    <!------ Slider ------------>
								  <div>
							      	<div>
							            <div>
										   <center>
											 <ul class="pricing_table">
											 <?php
											 $qq1="select * from login_details where user_id='$id'";
											 $rr1 = mysql_query($qq1) or die(mysql_error());	
											 while($row12=mysql_fetch_array($rr1))
											 {
												$c1=$row12['full_name'];
												$cc1=$row12['shop_name'];
												$cc2=$row12['user_id'];
												$cc3=$row12['phno'];
												$cc4=$row12['email'];
												$cc5=$row12['pic_path'];
												?>
												<li class="price_block">
												
												</li>
												<?php
											 }  ?>
											</ul>
										   </center>
							            </div>
							        </div>
						   		  </div>
						      <!------End Slider ------------>
			                </div>
   		        </div>
   </div>
   </div>
   <!------------End Header ------------>
	
	<script src="prefixfree.min.js" type="text/javascript"></script>

	
 <div class="main">
   	 <div class="wrap">
   	 	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
				 	<div class="grid images_3_of_2">
						<img src="<?php echo '../'.$cc5;?>" alt="" />
				  </div>  
				<div class="desc span_3_of_2">
				   
					<div class="price" style='background-color:FFFFFF;'>
						<p>Shop Owner Name: <span><?php echo $c1; ?></span></p>
						<p>Shop Name: <span><?php echo $cc1; ?></span></p>
						<p>User ID: <span><?php echo $cc2; ?></span></p>
						<p>Ph. No.: <span><?php echo $cc3; ?></span></p>				
						<p>Email ID: <span><?php echo $cc4; ?></span></p>			
					</div>
					
				<div class="share-desc">
				    
				   <form method="post" id="myform" name="myform" action="block_shop_db.php?id=<?php echo $id; ?>">
					<div class="button">
					  <span><input type="submit" name="block" id="block" value="Block Temporarily"/></span>
					</div>					
					</form>
					<div class="clear"></div>
				</div>
			</div>
		
   </div>
				
 		 		 </div>
   	 		</div>
        </div>

   <script type="text/javascript">
		$(document).ready(function() {			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>