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
						   <ul>
						  	   <h3></h3>
							     <?php
								  $vv="select * from `".$val."`";
								  $r1 = mysql_query($vv) or die(mysql_error());
								  $cnt=1;
								  include "libchart/classes/libchart.php";
								     $chart = new VerticalBarChart(1000, 400);
								     $dataSet = new XYDataSet();
								  while($row1=mysql_fetch_array($r1))
								  {
								   
								   $ccc=$row1['category'];
								   $table=$val.'_checkout';
								   $q1 = mysql_query("SELECT * from `".$table."` where item_id like '%$ccc%'");
								   $s1[$cnt]=0;
								   while($ro1=mysql_fetch_array($q1))
								   {
								     $s1[$cnt]=$s1[$cnt]+$ro1['units_purchased'];
								   }  
								   $s2[$cnt]=0;
								   $v1=$val.'_statistics';
								   $tt1=mysql_query("select * from `".$v1."` where item_id like '%$ccc%'");
								   while($ro2=mysql_fetch_array($tt1))
								   {
									 $s2[$cnt]=$s2[$cnt]+$ro2['units_for_sale'];
								   }
								       
									   $ss2= $s2[$cnt];
									   $ss1= $s1[$cnt];
									   
								     
								     
									   $dataSet->addPoint(new Point("$ccc{for sale}", "$ss2"));
								       $dataSet->addPoint(new Point("$ccc{purchased}", "$ss1"));
									   $dataSet->addPoint(new Point("",''));
									   
								     
									 $cnt=$cnt+1;
								   }
								     
									$chart->setDataSet($dataSet);
								     $chart->setTitle("My Shop Statistics");
									$chart->render("libchart/generated/$val.png");
								   ?>
								   <li><img src="libchart/generated/<?php echo $val; ?>.png" alt="" /></li>
							       <?php  
						  	     ?>
							 </ul>
   		        </div>
   </div>
   </div>
   <!------------End Header ------------>