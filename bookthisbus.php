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

$(document).ready(function()
{
var currentDate = new Date();
    currentDate.setDate(currentDate.getDate() + 1);
    var stringconverteddate = currentDate.toISOString().slice(0, 10);
    document.getElementById("journeydate").min = stringconverteddate;
});

function validaterequiredfields()
{    
    
    if(document.getElementById("ticketscount").value=="")
    {    
        alert("Please mention the tickets count");
        return false;        
    }
    else if(isNaN(document.getElementById("ticketscount").value))
    {
        alert("Please mention the tickets count in numerical format");
        return false;   
    }

    else if(document.getElementById("journeydate").value=="")
    {
        alert("Please mention the Journey Date");
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
    select
    {
        width:200px;
    }
    </style>
</head>
<body style="font-weight:bold;font-size:15px;padding-left:20px;background-color:aliceblue">
<?php
include "layout.php";
include "controllerlayer.php";
$serviceid=  $_GET['serviceid'];
$fare=$_GET['fare'];

?>
<form action="bookingconfirmation.php" method="post">
<div id="id1" style="padding-top:30px">
<table>
    
    <tr>
        <td>Select Pickup Spot : </td>
        <td>
        <select name="pickupspot" id="pickupspot">
        <?php
        
        $obj=new controllerlayer();
        $pickups=$obj->getallpickups($serviceid);

        while($pikup=$pickups->fetch_assoc())
    {
		$spott=$pikup["spots"];
        echo("<option value='$spott'>$spott</option>");
    }
        ?>
</select>
        </td>
    </tr>  

    <tr>
        <td>Select Drop Spot : </td>
        <td>
        <select name="dropspot" id="dropspot">
        <?php
        
        $obj=new controllerlayer();
        $dropups=$obj->getalldrops($serviceid);

        while($drop=$dropups->fetch_assoc())
    {
		$dropp=$drop["spots"];
        echo("<option value='$dropp'>$dropp</option>");
    }
        ?>
</select>
        </td>
    </tr> 
    <tr>
    <td>Journey Date : </td>
        <td><input type="date" name="journeydate" id="journeydate"></td>
</tr>
    <tr>
    <td>Total Tickets : </td>
        <td><input type="text" name="ticketscount" id="ticketscount"></td>
</tr>

    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Book Bus" name="bookbus" onclick="return validaterequiredfields()"></p>
</td>
</tr>
 </table>
</div>
<input type="hidden" name="hiddenserviceid" value="<?php echo $serviceid ?>">
<input type="hidden" name="hiddenfare" value="<?php echo $fare ?>">
</form>

<div id="details">
<?php

if(isset($_POST["searchbus"]))
{
    
    $obj=new controllerlayer();
    $result=$obj->checkbusesonthisroute();
    $ispresent=0;
    
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    if($ispresent==1)
    {
        $_SESSION["pickupcity"]=$_POST["pickupcity"];
        $_SESSION["dropcity"]=$_POST["dropcity"];
        echo '<script>window.location.href = "chosebus.php";</script>';
    }
    else
    {        
        echo '<script>alert("No buses available in this route. Sorry for the inconvenience")</script>';
        echo '<script>window.location.href = "bookticket.php";</script>';
    }
}

?>
</div>
</body>
</html>