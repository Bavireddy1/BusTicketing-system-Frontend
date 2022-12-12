<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<script type="text/javascript">

function validaterequiredfields()
{    
    
    if(document.getElementById("userid").value=="")
    {    
        alert("Please enter userid");
        return false;
    }
    else if(document.getElementById("password").value=="")
    {
       alert("Please enter password");
        return false;
    }
    else if(document.getElementById("firstname").value=="")
    {
        alert("Please enter First Name");
        return false;
    }
    var firstname=document.getElementById("firstname").value;
    var lastname=document.getElementById("lastname").value;

    var regexp = new RegExp(/^[a-zA-Z]*$/);
   if(!regexp.test(firstname) || !regexp.test(lastname))
   {
    alert("Special characters and numbers are not allowed for firstname and lastname fields");
    return false;
   }
    else if(document.getElementById("lastname").value=="")
    {
        alert("Please enter Last Name");
        return false;
    }
    else if(document.getElementById("email").value=="")
    {
        alert("Please enter Email");
        return false;
    }
    else if(document.getElementById("mobile").value=="")    
    {
        alert("Please enter Mobile");
        return false;
    }
    var userid=document.getElementById("userid").value;
    
    
   var regexp = new RegExp(/^[a-zA-Z]*$/);
   if(!regexp.test(userid))
   {
    alert("Special characters and numbers are not allowed for userid");
    return false;
   }

   regexp = new RegExp(/^[0-9]*$/);
   var mobilenumber=document.getElementById("mobile").value;
   if(!regexp.test(mobilenumber))
   {
    alert("Only numbers are allowed in the mobile field");
    return false;
   }
   else if(mobilenumber.length!=10)
   {
    alert("Mobile number should be of length 10 characters");
    return false;
   }

   var emailid=document.getElementById("email").value;
   if(emailid.indexOf("@")<0)
   {
    alert("Please enter valid Email ID");
    return false;
   }
   
       
    return true;
}
</script>
<style>
    td
    {
        padding-top:20px !important;
    }
    </style>
</head>
<body style="font-weight:bold;font-size:15px;padding-left:20px;background-color:aliceblue">
<?php
include "layout.php";
include "controllerlayer.php";
?>
<form action="signup.php" method="post">
<div id="id1" style="padding-top:30px">
<table>
    <tr>
        <td>User ID : </td>
        <td><input type="text" name="userid" id="userid"></td>
    </tr>
    <tr>
        <td>Password : </td>
        <td><input type="password" id="password" name="password"></td>
    </tr>    
    <tr>
        <td>First Name : </td>
        <td><input type="text" id="firstname" name="firstname"></td>
    </tr> 
    <tr>
        <td>Last Name : </td>
        <td><input type="text" id="lastname" name="lastname"></td>
    </tr> 
    <tr>
        <td>Gender : </td>
        <td>
            <select name="gender" id="gender">
                <option name="male">male</option>
                <option name="female">female</option>
            </select>
        </td>
    </tr>
<tr>
    <td>Email : </td>
    <td><input type="text" name="email" id="email"></td>
</tr>
<tr>
    <td>Mobile : </td>
    <td><input type="text" name="mobile" id="mobile"></td>
</tr>
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Register" name="register" onclick="return validaterequiredfields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php

if(isset($_POST["register"]))
{
    
    $obj=new controllerlayer();
    $result=$obj->checkduplicateuserid();
    $ispresent=0;
    
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    if($ispresent==1)
    {
        echo("<b><font color='red'>This ID already present. Please use another one</font></b>");
    }
    else
    {
        $result=$obj->userregister();        
        echo '<script>alert("Registration have been done Successfull!!")</script>';
        echo '<script>window.location.href = "busticketinghomepage.php";</script>';
    }
}

?>
</div>
</body>
</html>