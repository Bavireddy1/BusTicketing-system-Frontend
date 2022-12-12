<!DOCTYPE html> 
<html> 
	<head> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">   
        <style>
        .navbar-inverse
        {
            background-color:darkslateblue;
        }      
        a
        {
            color:blanchedalmond !important;

        }
        img
        {
            width:500px !important;
            height:400px !important;
        }
        </style>
    </head>
    <body>        	
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
     <div class="navbar-header">      
     </div>
    <ul class="nav navbar-nav">
      <li><a href="busticketinghomepage.php">Home</a></li>
	  <?php
	  if(!isset($_SESSION["user"]) && !isset($_SESSION["admin"])) 
	  {		
		echo('<li><a href="login.php">Login</a></li>');
    echo('<li><a href="signup.php">Signup</a></li>');
	  }
	  else if(isset($_SESSION["user"])) 
	  {
    echo('<li><a href="bookticket.php">Book Ticket</a></li>');
	  echo('<li><a href="viewtickets.php">View Booked tickets</a></li>');
    echo('<li><a href="feedback.php">Submit Feedback</a></li>');
    echo('<li><a href="logout.php">Logout</a></li>');
	  }
	  else if(isset($_SESSION["admin"])) 
	  {
		echo('<li><a href="addcity.php">Add a City</a></li>');
    echo('<li><a href="removecity.php">Remove City</a></li>');
    echo('<li><a href="addbus.php">Add Bus</a></li>');
    echo('<li><a href="addpickups.php">Add Pickups</a></li>');
    echo('<li><a href="adddrops.php">Add Drops</a></li>');    
		echo('<li><a href="logout.php">Logout</a></li>');
	  }
	  	 ?> 
    </ul>
  </div>
</nav>
    </body> 
 </html>
