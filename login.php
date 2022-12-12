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
    if(document.getElementById("username").value=="")
    {
        alert("Please enter username");
        return false;
    }
    if(document.getElementById("password").value=="")
    {
        alert("Please enter password");
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
<form action="login.php" method="post">
<div id="loginform" style="padding-top:30px">
<table>
    <tr>
        <td>UserName : </td>
        <td><input type="text" name="username" id="username"></td>
    </tr>
    <tr>
        <td>Password : </td>
        <td><input type="password" name="password" id="password"></td>
    </tr>    
    <tr>
        <td colspan="2" style="text-align:center;padding-top:20px">
 <input type="submit" value="Login" name="loginbutton"onclick="return validaterequirefields()"></p>
</td>
</tr>
 </table>
</div>
</form>

<div id="details">
<?php
if(isset($_POST["loginbutton"]))
{
    $callingobject=new controllerlayer();
    $result=$callingobject->checkuserlogin();
    $validuser=0;
    while($row=$result->fetch_assoc())
    {
        $_SESSION["user"]=$row["userid"];
        $validuser++;
    }
    if($validuser==0)
    {
        $result=$callingobject->checkadminlogin();  
        while($row=$result->fetch_assoc())
    {
        $_SESSION["admin"]=$row["userid"];
        $validuser++;
    }
    }
    if($validuser==0)
    {
       echo("<b><font color='red'>Invalid Credentials</font></b>");
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