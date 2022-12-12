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
    
    if(document.getElementById("dropplace").value=="")
    {    
        alert("Please enter Drop Place");
        return false;
    }    
    else if(!regexp.test(document.getElementById("dropplace").value))
   {
    alert("Special characters and numbers are not allowed for Drop Place");
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
<form action="adddrops.php" method="post">
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
        <td>Enter Drop Place : </td>
        <td>
        <input type="text" name="dropplace" id="dropplace">
        </td>
    </tr>  
    <tr>
        <td>Enter Drop Time : </td>
        <td>
        <select name="droptime" id="droptime">
            <option value="06:00">06:00</option>
            <option value="07:00">07:00</option>
            <option value="08:00">08:00</option>
            <option value="09:00">09:00</option>
            <option value="10:00">10:00</option>
        </select>
        </td>
    </tr> 
    
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Add Drop Location" name="adddrop" onclick="return validaterequiredfields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php

if(isset($_POST["adddrop"]))
{
    
    $obj=new controllerlayer();
    $result=$obj->checkpickupplace1();
    $ispresent=0;
    while($row=$result->fetch_assoc())
    {
       $ispresent=1;
    }
    $result=$obj->checkdropplace();
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
        $result=$obj->adddropplace();
        echo '<script>alert("Drop Place have been added Successfull!!")</script>';
        echo '<script>window.location.href = "busticketinghomepage.php";</script>';
    }
}

?>
</div>
</body>
</html>