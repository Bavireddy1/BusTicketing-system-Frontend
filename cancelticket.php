<?php
session_start();
include "controllerlayer.php";
$bookingid=  $_GET['bookingid'];
$obj=new controllerlayer();
$obj->cancelticket($bookingid);
echo '<script>window.location.href = "viewtickets.php";</script>';

?>