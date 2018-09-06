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
								        <div class="clear"></div>
  		        </div>     

				
				<div class="header_bottom">
					
					<div class="header_bottom_left">				
						<div class="categories">
						   <ul>
						  	   <h3>Pending Requests</h3>
							     <?php
								  $q1 = "SELECT * from admin_approval where status='na'";
								  $r1 = mysql_query($q1) or die(mysql_error());
								  while($row1=mysql_fetch_array($r1))
								  {
								   $c1=$row1['user_id'];
								   ?>
								   <li><a href='approve_requests_form.php?val=<?php echo $c1; ?>'><?php echo $c1;?></a></li>
							       <?php 
								  } 
						  	     ?>
							 </ul>
						</div>					
		  	         </div>
   		        </div>
   </div>
   </div>
   <!------------End Header ------------>
	</body>
</html>