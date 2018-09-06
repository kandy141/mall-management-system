<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$us=$_SESSION['user_id'];
$cat=$_GET['cat'];
$prod_id=$_GET['id'];
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
	
	   <script>
     function myFunction()
      {
	    var p=document.getElementById('name');
        var q=document.getElementById('brand');
		var r=document.getElementById('cost');
		var s=document.getElementById('scost');
		var t=document.getElementById('spfc');
		var u=document.getElementById('num');
			 
		if(r.value!='' && r.value!=null && s.value!='' && s.value!=null && u.value!='' && u.value!=null)
		  { 
		    if(num(r) && num(s) && num(u))
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
			  return true;
		else  
         {  
			alert('Numeric fields must contain numbers only !!');  
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
				
				<div class="header_bottom">
					
					
						    
							
							
							<div class="header_bottom_right">					 
						 	    <!------ Slider ------------>
								  <div class="slider">
							      	<div class="slider-wrapper theme-default">
							            <div class="add-cart">
										   <center>
											
  
  <?php
     $tabbb=$us.'_'.$cat;
				   $q5 = "SELECT * from `".$tabbb."` where item_id='$prod_id'";
				   $r5 = mysql_query($q5) or die(mysql_error());
				   $row5=mysql_fetch_array($r5);
				     $c1=$row5['pic_path'];
					 $c2=$row5['item_name'];
					 $c3=$row5['brand'];
					 $c4=$row5['cost'];
					 $c5=$row5['shipping_cost'];
					 $c6=$row5['quantity_available'];
					 $c7=$row5['specification'];
					 $cc1='C:/xampp/htdocs/SeLab/shopowner'.$c1;
  ?>
  
  <form method='post' action='edit_item_db_1.php?id=<?php echo $prod_id; ?>&val=<?php echo $cat; ?>' enctype='multipart/form-data' onsubmit='return myFunction()'>
   	  <dl>
	  <dt><label for='file'><h3><i>Choose Cover Image</i></h3></label></dt>
	  <dd><input type='file' name='image' value='<?php echo $cc1;?>' id='image'></dd>				
      <dt><label for='name' ><h3>Product Name</h3></label></dt>
	  <dd><input type='text' name='name' value='<?php echo $c2;?>' id='name' maxlength="30" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></dd>
	  <dt><label for='name' ><h3>Brand</h3> </label></dt>
	  <dd><input type='text' name='brand' value='<?php echo $c3;?>' id='brand' maxlength="20" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></dd>
	  <dt><label for='name' ><h3>Cost (INR)</h3></label></dt>
	  <dd><input type='text' name='cost' value='<?php echo $c4;?>' id='cost' maxlength="10" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></dd>
	  <dt><label for='name' ><h3>Shipping Cost(INR)</h3></label></dt>
	  <dd><input type="text" name="scost" value='<?php echo $c5;?>' id='scost' style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></dd>	  
	  <dt><label for='name' ><h3>Specifications</h3> </label></dt>
	  <dd><input type='text' name='spfc' value='<?php echo $c7;?>' id='spfc' maxlength="100" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></dd>
	  <dt><label for='name' ><h3>Available number</h3></label></dt>
      <dd><input type='text' name='num' value='<?php echo $c6;?>' id='num' maxlength="5"style="box-shadow:3px 3px 3px 3px #000;border-radius:7px" /></dd><br><br>
	  <input type="SUBMIT" value="Edit Item" id="AddItem" name= "AddItem" style="margin-left:90px;" />
	  </dl>
   </form>
											
											
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
    <a href="#" id="toTop"><span id="toTopHover"> </span></a>
</body>
</html>
