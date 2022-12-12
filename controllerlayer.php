<?php
include ("modellayer.php");
class controllerlayer
{
    public function checkuserlogin()
    {
        $obj=new modellayer();   
        $username=$obj->quote($_POST["username"]);
		$password=$obj->quote($_POST["password"]);
        
        $selectsql="select * from users where userid=".$username." and password=".$password.";";        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getticketdetails()
    {
        $obj=new modellayer();   
        $selectsql="select * from tickets order by bookingid desc limit 1";       
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getalltickets($userid)
    {
        $obj=new modellayer();  
        $userid=$obj->quote($userid); 
        $selectsql="select * from tickets where userid=".$userid." and status='booked'";
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }
    
    public function checkadminlogin()
    {
        $obj=new modellayer();   
        $username=$obj->quote($_POST["username"]);
		$password=$obj->quote($_POST["password"]);
        
        $selectsql="select * from administrators where userid=".$username." and password=".$password.";";        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function checkduplicateuserid()
    {
        $obj=new modellayer();   
        $username=$obj->quote($_POST["userid"]);
        
        $selectsql="select * from users where userid=".$username;        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getallcities()
    {
        $obj=new modellayer();  
        $selectsql="select * from cities";     
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getallserviceids()
    {
        $obj=new modellayer();  
        $selectsql="select serviceid from buses";     
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }


    public function checkcityname()
    {        
        $obj=new modellayer();   
        $city=$obj->quote($_POST["cityname"]);
        
        $selectsql="select * from cities where name=".$city;        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getallpickups($serviceid)
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($serviceid);
        $query="select concat(pickuplocation,' ',pickuptime) as spots from buspickups where serviceid=".$serviceid;
        try
        {
            $result=$obj->query($query);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }
    public function getalldrops($serviceid)
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($serviceid);
        $query="select concat(droplocation,' ',droptime) as spots from busdroppings where serviceid=".$serviceid;
        try
        {
            $result=$obj->query($query);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        } 
    }

    public function checkpickupplace()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $pickupplace=$obj->quote($_POST["pickupplace"]);        
        $selectsql="select * from buspickups where serviceid=".$serviceid." and pickuplocation=".$pickupplace;        
        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function checkbusesonthisroute()
    {
        $obj=new modellayer();           
        $pickupcity=$obj->quote($_POST["pickupcity"]);        
        $dropcity=$obj->quote($_POST["dropcity"]);        
        $selectsql="select * from buses where pickupplace=".$pickupcity." and dropplace=".$dropcity;                
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function getallbuses($pickupcity,$dropcity)
    {
        $obj=new modellayer();           
        $pickupcity=$obj->quote($pickupcity);        
        $dropcity=$obj->quote($dropcity);        
        $selectsql="select * from buses where pickupplace=".$pickupcity." and dropplace=".$dropcity;                
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }
    
    public function checkpickupplace1()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $pickupplace=$obj->quote($_POST["dropplace"]);        
        $selectsql="select * from buspickups where serviceid=".$serviceid." and pickuplocation=".$pickupplace;        
        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function checkdropplace()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $dropplace=$obj->quote($_POST["dropplace"]);        
        $selectsql="select * from busdroppings where serviceid=".$serviceid." and droplocation=".$dropplace;        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function checkdropplace1()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $dropplace=$obj->quote($_POST["pickupplace"]);        
        $selectsql="select * from busdroppings where serviceid=".$serviceid." and droplocation=".$dropplace;        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function checkserviceid()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["serviceid"]);
        
        $selectsql="select * from buses where serviceid=".$serviceid;        
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }
    
    public function removecity($cityname)
    {        
        $obj=new modellayer();  
        $cityname=$obj->quote($cityname);
        $selectsql="delete from cities where name=".$cityname;     
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        }
    }

    public function cancelticket($bookingid)
    {
        $obj=new modellayer();  
        $selectsql="update tickets set status='cancelled' where bookingid=".$bookingid;
        try
        {
            $result=$obj->query($selectsql);
            if($result)
            {
                return $result;
            }
        }
        catch(Exception $e)
        {
            echo "<script>window.alert(".$e->getMessage().")</script>";
        } 
    }

    public function addcity()
    {
        $obj=new modellayer();
        $city=$obj->quote($_POST["cityname"]);
        $insertquery="insert into cities(name) values($city)";
		try
        {
            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function submitfeedback()
    {
        $obj=new modellayer();
        $feedback=$obj->quote($_POST["feedback"]);
        $userid=$obj->quote($_SESSION["user"]);
        $insertquery="insert into feedbacks(userid,description) values($userid,$feedback)";
		try
        {
            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function addpickupplace()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $pickupplace=$obj->quote($_POST["pickupplace"]);
        $pickuptime=$obj->quote($_POST["pickuptime"]);
        $insertquery="insert into buspickups values($serviceid,$pickupplace,$pickuptime)";
		try
        {            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function bookticket($serviceid,$pickupspot,$dropspot,$ticketscount,$totalfare,$journeydate)
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($serviceid);
        $pickupspot=$obj->quote($pickupspot);
        $dropspot=$obj->quote($dropspot); 
        $journeydate=$obj->quote($journeydate);
        $userid=$obj->quote($_SESSION["user"]);       
        $insertquery="insert into tickets(serviceid,userid,pickupdetails,dropdetails,status,fare,totaltickets,journeydate) values($serviceid,$userid,$pickupspot,$dropspot,'booked',$totalfare,$ticketscount,$journeydate)";
        
		try
        {            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function adddropplace()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["srvcid"]);
        $droplocation=$obj->quote($_POST["dropplace"]);
        $droptime=$obj->quote($_POST["droptime"]);
        $insertquery="insert into busdroppings values($serviceid,$droplocation,$droptime)";
		try
        {            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function userregister()
    {
        $obj=new modellayer();   
        $userid=$obj->quote($_POST["userid"]);
		$password=$obj->quote($_POST["password"]);
		$firstname=$obj->quote($_POST["firstname"]);
		$lastname=$obj->quote($_POST["lastname"]);		
		$gender=$obj->quote($_POST["gender"]);
        $email=$obj->quote($_POST["email"]);
        $mobile=$obj->quote($_POST["mobile"]);        
		$insertquery="insert into users values($userid,$password,$firstname,$lastname,$gender,$email,$mobile)";
		try
        {
            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }

    public function addbus()
    {
        $obj=new modellayer();   
        $serviceid=$obj->quote($_POST["serviceid"]);
        $pickupcity=$obj->quote($_POST["pickupcity"]);
		$dropcity=$obj->quote($_POST["dropcity"]);
        $vendor=$obj->quote($_POST["vendor"]);        
        $journeyhrs=$_POST["journeyhrs"];
        $fare=$_POST["fare"];        
		$insertquery="insert into buses(serviceid,pickupplace,dropplace,journeyhours,fare,vendor) values($serviceid,$pickupcity,$dropcity,$journeyhrs,$fare,$vendor)";
		try
        {
            
            $result=$obj->query($insertquery);
            if($result)
            {
                $returnval= "Operation successfull!!";
            }
        }
        catch(Exception $e)
        {
            $returnval= "Operation Failed ".$e->message;
        }
		return $returnval;
    }
}
?>