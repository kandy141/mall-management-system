<?php
session_start();
if(!isset($_SESSION['user_id']))
 {
     header("Location: /SeLab/login.php");
 }
if($con=mysql_connect('localhost','root',''));
mysql_select_db('se_lab');
$user=$_SESSION['user_id'];

$cat=$_GET['val'];
$n=$_POST[name];
$s=$_POST[brand];
$p=$_POST[cost];
$a=$_POST[scost];
$m=$_POST[spfc];
$pd=$_POST[num];
$pic=$_POST[image];

$tab=$user.'_'.$cat;
$prod_id=$tab.'_'.md5($n);

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
	   $qrr=mysql_query("insert into $tab values ('$prod_id', '$n', '$s', '$p','$a', '$m', '$pd', '$newname')");
	   if($qrr)
	    {
		  $ttl=$user.'_statistics';
		  $qqqq=mysql_query("insert into $ttl values('$prod_id' , '$pd')");
	      ?>
	       <script type="text/javascript">
             alert("Product Added..");
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
