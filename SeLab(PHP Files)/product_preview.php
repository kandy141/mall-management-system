<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
$tab=$_GET['tab'];
$prod_id=$_GET['id'];
?>

<head>
<title>Product Preview</title>
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
	    var p=document.getElementById('box');
			 
		if(p.value!='' && p.value!=null)
		  { 
		    if(num(p))
			  {
			     return true;
			  }
			else
				 return false;
		  }
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
	  
	  function num(r)
	  {
	    var letters = /^[0-9]+$/;  
		if(r.value.match(letters))
		 {
         	  return true;
         }
		else  
         {  
			alert('Must be Numeric !!');  
		    r.focus();  
			return false;  
		 }  
	  }
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
   	 	<div class="section group">
				<div class="cont-desc span_1_of_2">
				  <div class="product-details">				
					<div class="grid images_3_of_2">
						<img src="../shopowner/images/1.jpg" alt="" />
				  </div>
				<div class="desc span_3_of_2">
				  
				  <?php
				   
				   $q5 = "SELECT * from `".$tab."` where item_id='$prod_id'";
				   $r5 = mysql_query($q5) or die(mysql_error());
				   $row5=mysql_fetch_array($r5);
				   
					 $c2=$row5['item_name'];
					 $c3=$row5['brand'];
					 $c4=$row5['cost'];
					 $c5=$row5['shipping_cost'];
					 $c6=$row5['quantity_available'];
					 $c7=$row5['specification'];
					 ?>
					 
					<h2><?php echo $c2; ?></h2>
					<div class="price">
						<p>Price: <span>Rs. <?php echo $c4; ?></span></p>
						<p>Shipping Cost: <span>Rs. <?php echo $c5; ?></span></p> 
					</div>
					<div class="available">
						<ul>
						  <li><span>Units in Stock:</span>&nbsp; <?php echo $c6;?></li>
					    </ul>
					</div>
				<div class="share-desc">
				    <form method="post" id="myform" name="myform" action="add_to_cart.php?id=<?php echo $prod_id; ?>&avail=<?php echo $c6; ?>" onSubmit="return myFunction()">
					<div class="share">
						<p>Number of units :</p><input class="text_box" type="text" id="box" name="box" />				
					</div>
					<div class="button">
					  <span><input type="submit" name="addcart" id="addcart" value="Add to Cart"/></span>
					</div>					
					</form>
					<div class="clear"></div>
				</div>
				 
			</div>
			<div class="clear"></div>
		  </div>
		<div class="product_desc">	
			 <h2>Specification</h2>
			   <p><?php echo $c7; ?></p>	           
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

