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
				
				<div class="header_bottom"></div>
		 </div>
   </div>
   <!------------End Header ------------>
   
   <div class="main">
  	<div class="wrap">
      <div class="content">
    		<p style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">Shops List</p>
    	  <div class="section group">
				<br>
				
				<?php
				$q1 = "SELECT * FROM admin_approval where status='a'";
				$r1 = mysql_query($q1) or die(mysql_error());
				$i=1;
				while($row1=mysql_fetch_array($r1))
				{
					$c1=$row1['user_id'];
					$q2=mysql_query("select * from login_details where user_id='$c1'");
					$row2=mysql_fetch_array($q2);
					$c2=$row2['shop_name'];
					$c3=$row2['pic_path'];
					?>
				<div class="grid_1_of_5 images_1_of_5">
				<a href="inside_shop.php?val=<?php echo $c1; ?>"><img src="../<?php echo $c3;?>" alt="" /></a>
				<h2><a href="inside_shop.php?val=<?php echo $c1; ?>"><?php echo $c2; ?></a></h2>
			    </div>
				<?php
				}	 		   
				?>
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
