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

function validate()
{    
    
    if(document.getElementById("dropcity").value==document.getElementById("pickupcity").value)
    {    
        alert("Drop City cannot be same as Pick Up City");
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
<form action="bookticket.php" method="post">
<div id="id1" style="padding-top:30px">
<table>
    
    <tr>
        <td>Select Pickup City : </td>
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
        <td>Select Drop City : </td>
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
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Search Buses" name="searchbus" onclick="return validate()"></p>
</td>
</tr>
 </table>
</div>
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