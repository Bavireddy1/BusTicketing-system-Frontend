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
    if(document.getElementById("feedback").value=="")
    {
        alert("Please enter feedback");
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
<form action="feedback.php" method="post">
<div id="feedbackform" style="padding-top:30px">
<table>
    <tr>
        <td>Enter Feedback : </td>
        <td><textarea id="feedback" name="feedback" style="height:100px;width:300px"></textarea></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Submit Feedback" name="feedbackbutton" onclick="return validaterequirefields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php
if(isset($_POST["feedbackbutton"]))
{
    $callingobject=new controllerlayer();
    $result=$callingobject->submitfeedback();
    echo '<script>alert("Feedback Submitted Successfully!!")</script>';
    echo '<script>window.location.href = "busticketinghomepage.php";</script>';

}
?>
</div>

</body>
</html>