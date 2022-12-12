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
    
    var regexp = new RegExp(/^[a-zA-Z0-9&_]*$/);
    if(document.getElementById("serviceid").value=="")
    {    
        alert("Please enter Service ID");
        return false;
    }
    else if(!regexp.test(document.getElementById("serviceid").value))
   {
    alert("Special characters are not allowed for serviceid");
    return false;
   }
    else if(document.getElementById("serviceid").value<0)
    {
        alert("serviceid cannot be negative number");
        return false;
    }
    
    else if(document.getElementById("vendor").value=="")
    {
        alert("Please enter Vendor name");
        return false;
    }

    else if(!regexp.test(document.getElementById("vendor").value))
   {
    alert("Special characters and numbers are not allowed for vendor");
    return false;
   }

    else if(document.getElementById("pickupcity").value==document.getElementById("dropcity").value)
    {
       alert("Pickup and Drop City cannot be same");
        return false;
    }
    else if(document.getElementById("journeyhrs").value=="")
    {
        alert("Please enter Journey Hours");
        return false;
    }
    else if(isNaN(document.getElementById("journeyhrs").value))
    {
        alert("Please enter Journey Hours in numerical format");
        return false;
    }
    else if(document.getElementById("journeyhrs").value<0)
    {
        alert("Journey Hours can be a positive number");
        return false;
    }
    else if(document.getElementById("fare").value=="")
    {
        alert("Please enter Fare");
        return false;
    }
    else if(isNaN(document.getElementById("fare").value))
    {
        alert("Please enter Fare can be a positive number");
        return false;
    } 
    else if(document.getElementById("fare").value<0)
    {
        alert("Fare cannot be negative number");
        return false;
    }
    return true;
}
</script>
<style>
      td
    {
        padding-top:15px !important;
        padding-left:10px !important;
    }
    </style>
</head>
<body style="font-weight:bold;font-size:15px;padding-left:20px;background-color:aliceblue">
<?php
include "layout.php";
include "controllerlayer.php";
?>
<form action="addbus.php" method="post">
<div id="id1" style="padding-top:30px">
<table>
    <tr>
        <td>Service ID : </td>
        <td><input type="text" name="serviceid" id="serviceid"></td>
    </tr>
    <tr>
        <td>Vendor : </td>
        <td><input type="text" name="vendor" id="vendor"></td>
    </tr>
    <tr>
        <td>Pickup City : </td>
        <td>
        <select name="pickupcity" id="pickupcity">
        <?php
        
        $obj=new controllerlayer();
        $cities=$obj->getallcities();

        while($city=$cities->fetch_assoc())
    {
		$cityname=$city["name"];
        echo("<option value='$cityname'>$cityname</option>");
    }
        ?>
</select>
        </td>
    </tr>  
    
    <tr>
        <td>Drop City : </td>
        <td>
        <select name="dropcity" id="dropcity">
        <?php
        
        $obj=new controllerlayer();
        $cities=$obj->getallcities();

        while($city=$cities->fetch_assoc())
    {
		$cityname=$city["name"];
        echo("<option value='$cityname'>$cityname</option>");
    }
        ?>
</select>
        </td>
    </tr>  
   
    <tr>
        <td>Journey Hours : </td>
        <td><input type="text" id="journeyhrs" name="journeyhrs"></td>
    </tr> 
    <tr>
        <td>Fare($) per person: </td>
        <td><input type="text" id="fare" name="fare"></td>
    </tr> 
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Add Bus" name="addbus" onclick="return validaterequiredfields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php

if(isset($_POST["addbus"]))
{
    
    $obj=new controllerlayer();
    $result=$obj->checkserviceid();
    $ispresent=0;
    
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    if($ispresent==1)
    {
        echo("<b><font color='red'>There is already one bus with same service ID</font></b>");
    }
    else
    {
        $result=$obj->addbus();        
        echo '<script>alert("Bus have been added Successfull!!")</script>';
        echo '<script>window.location.href = "busticketinghomepage.php";</script>';
    }
}

?>
</div>
</body>
</html>