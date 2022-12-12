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
    border:1px solid black;
    padding-left:10px !important;
    padding-right:10px !important;  
    padding-top:10px !important;
    text-align:center !important;
   }
    </style>
    </head>
    <body style="font-weight:bold;font-size:15px;padding-left:20px;background-color:aliceblue;"> 
    
        <table style="margin-left:20px;margin-right:10px;font-weight:bold" id="table1">
            <th>City</th>
            <th></th>
<?php

include "layout.php";
$allcities=$obj->getallcities();
echo("<br><br><br>");
 while($row=$allcities->fetch_assoc())
 {
   echo("<tr>");
echo("<td>".$row["name"]."</td>");
$removecityurl="removecity1.php?cityname=".$row["name"];
echo("<td><a href='$removecityurl'>Remove City</td>");
echo("</tr>");
}
?>
</table>
</body>
    </html>