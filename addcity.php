<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<script type="text/javascript">
function validaterequirefields()
{
    var citygiven=document.getElementById("cityname").value;
    if(document.getElementById("cityname").value=="")
    {
        alert("Please enter City name");
        return false;
    }  
    
    var regexp = new RegExp(/^[a-zA-Z]*$/);
   if(!regexp.test(citygiven))
   {
    alert("Special characters and numbers are not allowed for city");
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
<form action="addcity.php" method="post">
<div id="cityform" style="padding-top:30px">
<table>
    <tr>
        <td>Please Enter City : </td>
        <td><input type="text" name="cityname" id="cityname"></td>
    </tr>
    <tr>
        <td colspan="2">
 <input type="submit" value="Add City" name="addcitybutton"onclick="return validaterequirefields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php
if(isset($_POST["addcitybutton"]))
{
    $callingobject=new controllerlayer();
    $result=$callingobject->checkcityname();
    $iscitypresent=0;
    while($row=$result->fetch_assoc())
    {
        $iscitypresent++;
    }
    if($iscitypresent==0)
    {
        $result=$callingobject->addcity();  
   }
    if($iscitypresent==1)
    {
       echo("<b><font color='red'>City already exists!!</font></b>");
    }
    else
    {       
        echo '<script>window.location.href = "busticketinghomepage.php";</script>';
    }
}
?>
</div>

</body>
</html>