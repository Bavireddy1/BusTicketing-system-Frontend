<?php
session_start();
include "controllerlayer.php";
$cityname=  $_GET['cityname'];
$obj=new controllerlayer();
$obj->removecity($cityname);
echo '<script>window.location.href = "busticketinghomepage.php";</script>';

?>