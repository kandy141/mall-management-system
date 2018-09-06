<?php
$con=mysql_connect("localhost","root","");
if(!$con)
{
	die("connection".mysql_error());
}
mysql_select_db("se_lab");
?>

<html>
<head>
<script>
     function myFunction()
      {
	    var p=document.getElementById('name');
        var q=document.getElementById('shopname');
		var r=document.getElementById('phno');
		var s=document.getElementById('shopID');
		var t=document.getElementById('mail_id');
		var u=document.getElementById('pswd');
			 
		if(p.value!='' && p.value!=null && q.value!='' && q.value!=null && r.value!='' && r.value!=null && s.value!='' && s.value!=null && t.value!='' && t.value!=null && u.value!='' && u.value!=null)
		  { 
		    if(alphabet(p) && alphabet(q) && num(r) && IDcheck(s) && mailcheck(t))
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
         	if(r.value.length==10)  
			  return true;
            else
			 {
               alert('Phone Number must be 10 characters !!'); 			
			   r.focus();
			   return false;
			 }  
         }
		else  
         {  
			alert('Phone Number must be Numeric !!');  
		    r.focus();  
			return false;  
		 }  
	  }
	  
	  function alphabet(p)
	  {
	    var letters = /^[a-zA-Z]+$/;  
		if(p.value.match(letters))  
			return true;  
        else  
         {  
			alert('Name must be Alphabetic !!');  
		    p.focus();  
			return false;  
		 }  
	  }
	  
	  
	  
	  function IDcheck(s)
	  {
	     var numbers = /^[a-zA-Z0-9]+$/; 
	     if(s.value.match(numbers))
		   {
			     return true;				
           }
		 else			
		   {  
  		      alert('Only numbers or alphabets allowed !');
	          s.focus();
			  return false;
		   }
	  } 
	  
	  function mailcheck(t)
	  {
	    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
		if(t.value.match(mailformat))  
		    return true;   
		else  
		 { 		 
		   alert("Valid Email-ID please !!");  
		   t.focus();  
		   return false;  
		 } 
	  }
    </script>
 </head>
 
 <body style="width:100%">
 <form method="post" action="customer_register.php" onsubmit="return myFunction()">
	 	
		<br><br>
		<i> <p style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;">  <b><i>Please register here ! </i></b></p></i><br>
	  
	  <table>
      <tr><td>&nbsp</td><td>&nbsp</td><td><label for='name' ><h3>Full Name</h3> </label></td>
	  <td><input type='text' name='name' id='name' maxlength="50" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
	  
	  <tr><td>&nbsp</td><td>&nbsp</td><td><label for='name' ><h3>Account Name</h3> </label></td>
	  <td><input type='text' name='shopname' id='shopname' maxlength="50" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
	  
	  <tr><td>&nbsp</td><td>&nbsp</td><td><label for='name' ><h3>User ID</h3></label></td>
	  <td><input type='text' name='shopID' id='shopID' maxlength="10" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
	  <tr><td>&nbsp</td><td>&nbsp</td><td><label for='name' ><h3>Password</h3></label></td>
	  <td><input type="password" name="pswd" id='pswd' style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
	  <tr><td>&nbsp</td><td>&nbsp</td><td><label for='name' ><h3>Ph. No.</h3> </label></td>
	  <td><input type='text' name='phno' id='phno' maxlength="10" style="box-shadow:3px 3px 3px 3px #000;border-radius:7px"/></td></tr>
	  <tr><td>&nbsp</td><td>&nbsp</td><td><label for='mail' ><h3>Email ID</h3></label></td>
      <td><input type='text' name='mail_id' id='mail_id' maxlength="30"style="box-shadow:3px 3px 3px 3px #000;border-radius:7px" /></td></tr>
	  <tr><td>&nbsp</td></tr>
	  <tr><td>&nbsp</td><td><input type="SUBMIT" value="Update" id="update"  style="border-radius: 4px;
    -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.4), 0 1px 1px rgba(0, 0, 0, 0.2);
    background: #FC7D01;
    color: #FFF;
    padding: 8px 12px;
    text-decoration: none;"/></td></tr>
	  
	  </table>
	   
	    
  
   </form>
 </body>
</html> 