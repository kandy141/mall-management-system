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
$qq="select * from `".$crt."`";
$r1 = mysql_query($qq) or die(mysql_error());		
						   
?>
<html>
<head>

<title>View Cart</title>
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
  		        </div>     
		 </div>
   </div>
   <!------------End Header ------------>
   <?php
   $cnt=mysql_num_rows($r1);
   if($cnt==0)
		     echo '<script>alert("No Items in your Cart"); history.back();</script>';
   else
   {
   ?>
   <div>
	<ul class="pricing_table">
	    <p style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none; font-size:130%; font-weight:bold">Your Cart..</p>	
		<?php
		while($row1=mysql_fetch_array($r1))
         {
		    $c1=$row1['item_id'];
			$c2=$row1['quantity'];
			$split=explode('_',$c1,-1);
			$tab=$split[0].'_'.$split[1];
			$qq2="select * from `".$tab."` where item_id='$c1'";
			$r2 = mysql_query($qq2) or die(mysql_error());
			$row2=mysql_fetch_array($r2);
			$cc1=$row2['pic_path'];
			$cc2=$row2['item_name'];
			$cc3=$row2['brand'];
			$cc4=$row2['cost'] * $c2;
			$cc5=$row2['shipping_cost'] * $c2;
			?>
			
			<li class="price_block">
			<div class="price">
				<div class="price_figure">
					<span class="price_number"><img src="../shopowner/<?php echo $cc1;?>" alt="" /></span>
				</div>
			</div>
			<ul class="features">
				<li><?php echo $cc2;?></b></li>
				<li><?php echo 'Brand: '.$cc3;?></li>
				<li><?php echo 'Quantity: '.$c2;?></li>
				<li><?php echo 'Total Cost: Rs. '.$cc4;?></li>
				<li><?php echo 'Total Shipping Cost: Rs. '.$cc5;?></li>
			</ul>
			<div class="footer">
				<a href="remove_from_cart.php?id=<?php echo $c1; ?>&avail=<?php echo $c2; ?>" class="action_button">Remove</a>
			</div>
			</li>
			<?php
		  }   ?>
	</ul>	
	</div>
		&nbsp &nbsp &nbsp <br> &nbsp &nbsp <a href="checkout.php" style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">Checkout</a>

	
  <?php
   }
      ?>   
	<script src="prefixfree.min.js" type="text/javascript"></script>
	
</body>
</html>