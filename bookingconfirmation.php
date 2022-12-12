<?php
session_start();

include "controllerlayer.php";
$obj=new controllerlayer();
?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   #table1 a
   {    
   color:red !important;
   }
   th,td
   {
    font-weight:bold;    
    padding-left:10px !important;
    padding-right:10px !important;  
    padding-top:20px !important;
    text-align:center !important;
   }
    </style>
    </head>
    <body style="font-weight:bold;font-size:15px;padding-left:20px;background-color:aliceblue;"> 
    <br>
    
<?php

include "layout.php";
echo("<u><h2>Booking Summary :</h2></u><br>");
$serviceid=  $_POST['hiddenserviceid'];
$fare=  $_POST['hiddenfare'];
$pickupspot=  $_POST['pickupspot'];
$dropspot=  $_POST['dropspot'];
$ticketscount=  $_POST['ticketscount'];
$journeydate=$_POST['journeydate'];
$totalfare=$fare*$ticketscount;
$obj->bookticket($serviceid,$pickupspot,$dropspot,$ticketscount,$totalfare,$journeydate);
$result=$obj->getticketdetails();
echo("<br><table>");
while($ticketdetails=$result->fetch_assoc())
    {
        $journeydate=$ticketdetails["journeydate"];
		$bookingid=$ticketdetails["bookingid"];
        $serviceid=$ticketdetails["serviceid"];
        $pickup=$ticketdetails["pickupdetails"];
        $dropdetails=$ticketdetails["dropdetails"];
        $fare=$ticketdetails["fare"];
        $totaltickets=$ticketdetails["totaltickets"];

        echo("<tr><td>Booking ID : </td><td>$bookingid</td><tr>");
        echo("<tr><td>Bus Service ID : </td><td>$serviceid</td><tr>");
        echo("<tr><td>Journey Date : </td><td>$journeydate</td><tr>");
        echo("<tr><td>Pick Up Spot : </td><td>$pickup</td><tr>");
        echo("<tr><td>Drop Spot : </td><td>$dropdetails</td><tr>");
        echo("<tr><td>Total Fare($) : </td><td>$fare</td><tr>");
        echo("<tr><td>Tickets Count : </td><td>$totaltickets</td><tr>");        
    }
?>
</table>
<br><br><h3>Please pay the amount when you are boarding the bus</h3>
</body>
    </html>