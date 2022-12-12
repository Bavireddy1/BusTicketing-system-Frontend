<?php
class modellayer
{
    protected static $busticketingdatabaseconnection;
    public function connect()
    {
        if(!isset(self::$busticketingdatabaseconnection))
        {
            self::$busticketingdatabaseconnection=new mysqli("localhost","root","","busticketing");
        }
        if(self::$busticketingdatabaseconnection==false)
        {
            return false;
        }
        return self::$busticketingdatabaseconnection;
    }

    public function query($query)
    {
        $busticketingdatabaseconnection=$this->connect();
        $output=$busticketingdatabaseconnection->query($query);
        return $output;
    }

    
    public function quote($value)
    {
        $busticketingdatabaseconnection=$this->connect();
        return "'".$busticketingdatabaseconnection->real_escape_string($value)."'";
    }
}
?>