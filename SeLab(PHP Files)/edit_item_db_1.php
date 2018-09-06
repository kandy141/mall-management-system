<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$user=$_SESSION['user_id'];
$prod_id=$_GET['id'];
$cat=$_GET['val'];

$n=$_POST[name];
$s=$_POST[brand];
$p=$_POST[cost];
$a=$_POST[scost];
$m=$_POST[spfc];
$pd=$_POST[num];
$pic=$_POST[image];
$prod_id=$tab.'_'.md5($n);

$tab=$user.'_'.$cat;

define ("MAX_SIZE","1000"); 
function getExtension($str) 
{ 
$i = strrpos($str,"."); 
if (!$i) { return ""; } 
$l = strlen($str) - $i; 
$ext = substr($str,$i+1,$l); 
return $ext; 
}   

$errors=0; 
$image=$_FILES['image']['name']; 
if ($image) 
{ 
 $filename = stripslashes($_FILES['image']['name']); 
 $extension = getExtension($filename); $extension = strtolower($extension); 
 if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")&& ($extension != "JPG") && ($extension != "JPEG") && ($extension != "PNG") && ($extension != "GIF"))
  { 
     ?>
	 <script type="text/javascript">
       alert("Invalid Image Extension..");
	   history.back();
     </script>    	
     <?php
	 $errors=1; 
  } 
 else 
  { 
    $size=filesize($_FILES['image']['tmp_name']);   
	if ($size > MAX_SIZE*1024) 
	{ 
	    ?>
		<script type="text/javascript">
		  alert("Image too large..");
		  history.back();
		</script>    	
		<?php
		$errors=1; 
	}  
	
	$image_name=time().'.'.$extension;
	$newname="images/".$image_name;   
    $copied = copy($_FILES['image']['tmp_name'], $newname); 
	
	if (!$copied) 
	{ 
	    ?>
		<script type="text/javascript">
		  alert("Status: Failed..");
		  history.back();
		</script>    		
		<?php 
		$errors=1;
	} 
	else 
	{
	   if($_POST['image'] == '')
	      $qrr=mysql_query("update $tab set item_name='$n', brand='$s', cost='$p',shipping_cost='$a', specification='$m', quantity_available='$pd'");
	   else
	      $qrr=mysql_query("update $tab set item_name='$n', brand='$s', cost='$p',shipping_cost='$a', specification='$m', quantity_available='$pd', pic_path='$newname'");
	   if($qrr)
	    {
	      ?>
	       <script type="text/javascript">
             alert("Product Edited..");
	         history.back();
           </script>    	
          <?php
        }
       else
	    {
	      ?>
	       <script type="text/javascript">
             alert("Process Failed..");
	         history.back();
           </script>    	
          <?php
        }
 	}
	//mysql_query("insert into file_tbl (path) values('".$newname."')"); 
	  
   }   
    
  
}
?> 
