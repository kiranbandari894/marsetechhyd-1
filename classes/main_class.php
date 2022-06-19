<?php
date_default_timezone_set("Asia/kolkata"); 
class marsetech{
   private $hostname;
   private $username;
   private $password;
   private $database;
   private $con;

   public function __construct($host,$user,$pass,$database){
      $this->hostname = $host;
      $this->username = $user;
      $this->password = $pass;
      $this->database = $database; 

      $this->con = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
   }

   // Function for adding concept to topic
    public function save_form_data($table,$data){
        $key_values = implode(',',array_keys($data));
        $ins_values = implode("','",array_values($data));
        $insert_query =  "INSERT INTO $table ($key_values) values ('$ins_values')";
        $run = mysqli_query($this->con,$insert_query);
        if($run){
            return "success";
            
        }else{
            return "fail";
        }
    }


   public function __destruct()
   {
       mysqli_close($this->con);
   }

} 
  ?>