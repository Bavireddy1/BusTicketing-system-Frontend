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
    var regexp = new RegExp(/^[a-zA-Z]*$/);
    
    if(document.getElementById("pickupplace").value=="")
    {    
        alert("Please enter Pick Up Place");
        return false;
    }     
    
    
    else if(!regexp.test(document.getElementById("pickupplace").value))
   {
    alert("Special characters and numbers are not allowed for Pick Up Place");
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
<form action="addpickups.php" method="post">
<div id="id1" style="padding-top:30px">
<table>
    <tr>
        <td>Select Service ID : </td>
        <td>
        <select name="srvcid" id="srvcid">
            <?php
            $obj=new controllerlayer();
            $allserviceids=$obj->getallserviceids();
     
        while($serviceid=$allserviceids->fetch_assoc())
    {
		$sid=$serviceid["serviceid"];
        echo("<option value='$sid'>$sid</option>");
    }
    ?>
    </select>
        </td>
    </tr>
    <tr>
        <td>Enter Pick Up Place : </td>
        <td>
        <input type="text" name="pickupplace" id="pickupplace">
        </td>
    </tr>  
    <tr>
        <td>Enter Pick Up Time : </td>
        <td>
        <select name="pickuptime" id="pickuptime">
            <option value="17:00">17:00</option>
            <option value="18:00">18:00</option>
            <option value="19:00">19:00</option>
            <option value="20:00">20:00</option>
            <option value="21:00">21:00</option>
        </select>
        </td>
    </tr> 
    
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Add Pickup" name="addpickup" onclick="return validaterequiredfields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php

if(isset($_POST["addpickup"]))
{
    
    $obj=new controllerlayer();
    $result=$obj->checkpickupplace();
    $ispresent=0;
    
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    $result=$obj->checkdropplace1();
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    if($ispresent==1)
    {
        echo("<b><font color='red'>This Place already added to this bus</font></b>");
    }
    else
    {
        $result=$obj->addpickupplace();
        echo '<script>alert("Pickup have been added Successfull!!")</script>';
        echo '<script>window.location.href = "busticketinghomepage.php";</script>';
    }
}

?>
</div>
</body>
</html>