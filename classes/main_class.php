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

   // Function for adding
    public function save_form_data($table,$data){
        $key_values = implode(',',array_keys($data));
        $ins_values = implode("','",array_values($data));
        $insert_query =  "INSERT INTO $table ($key_values) values ('$ins_values')";
        $run = mysqli_query($this->con,$insert_query);
        if($run){
            return true;
            
        }else{
            return false;
        }
    }
// public function whether exist or not
public function checkdate($table,$data,$operator,$certificatekey){
    $new_values = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    if($certificatekey == "training_cer_no"){
        $mesg = "Training Certificate";
    }else{
        $mesg = "Calibration Certificate";
    }
    $check_value = implode(" $operator ",$new_values);
    
    $query = "SELECT * FROM $table where $check_value";
    $run_que = mysqli_query($this->con,$query);
    if(mysqli_num_rows($run_que) > 0){
        if($res = mysqli_fetch_array($run_que)){
            if($certificatekey == "training_cer_no"){
                return json_encode([
                    "status"=>"exist",
                    "message"=> "already exist",
                    "url"=>  "../pdfs/training_cer.php?cer_date=".$res['certificate_issue_date']."&&training_cer_no=".$res['training_cer_no']."&&traineename=".$res['traineename']."&&centername=".$res['centername']."&&address1=".$res['address1']."&&address2=".$res['address2']."&&profimg=".$res['profimg'].""
                ]);
            }elseif($certificatekey == "amc_cer_no"){
                return json_encode([
                    "status"=>"exist",
                    "message"=> "already exist",
                    "url"=>  "../pdfs/amc.php?cer_date=".$res['certificate_issue_date']."&&certificate_valid_date=".$res['certificate_valid_date']."&&ownername=".$res['ownername']."&&centername=".$res['centername']."&&address1=".$res['address1']."&&address2=".$res['address2']."&&mobile=".$res['mobile']."&&fueltype=".$res['fueltype']."&&amc_cer_no=".$res['amc_cer_no']."&&slno=".$res['slno']."&&certificate_valid_date=".$_POST['certificate_valid_date'].""
                ]);
            }
            else{
                return json_encode([
                    "status"=>"exist",
                    "message"=> "already exist",
                    "url"=>"output.php?date=".$res['present_date']."&&cal_srno=".$res['calibration_serial']."&&machine_type=".$res['machine_type']."&&centername=".$res['centername']."&&centerregistration=".$res['centerregistration']."&&centeraddress1=".$res['centeraddress1']."&&centeraddress2=".$res['centeraddress2']."&&calibration_gas_validity=".$res['gas_valid_date']."&&cal_validity=".$res['calibration_validity_date']."&&srno=".$res['srno'].""
                ]);
            }
            
        }
    }else{
        return "false";
    }
}

// Search certificate
public function search_cer($table,$certificateno,$operator,$search_type){
    $new_values = [];
    foreach($certificateno as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    
    $query = "SELECT * FROM $table where $check_value";
    $run_que = mysqli_query($this->con,$query);
    if(mysqli_num_rows($run_que) > 0){
        if($res = mysqli_fetch_array($run_que)){
           if($search_type == "CAL"){

            $expiry = null;
            $expiry1 = null;
            $date_now = new DateTime();
            $calibratin_date = new DateTime($res['calibration_validity_date']);
            if ($date_now > $calibratin_date) {
               $expiry =  'Yes';
            }else{
                $expiry = 'No';
            }

            // checking gas validity
            $calibratin_gas_date = new DateTime($res['gas_valid_date']);
            if ($date_now > $calibratin_gas_date) {
               $expiry1 =  'Yes';
            }else{
                $expiry1 = 'No';
            }
            return json_encode([
                    "status"=>"exist",
                    "certificat_type"=>"CAL",
                    "calib_date"=>$res['present_date'],
                    "message"=>$res['calibration_serial'],
                    "Cal_validity"=>$res['calibration_validity_date'],
                    "gas_validity_date"=>$res['gas_valid_date'],
                    "GasExpiry"=> $expiry1 == 'Yes' ? "<b class='text-danger'>Expired </b> <a href='?gas_validity_renew=".explode('-',$res['calibration_serial'])[2]."'>Renew</a>":$expiry1,
                    "Calibration_Expiry"=> $expiry =='Yes' ? "<b class='text-danger'>Expired </b> <a href='?calibration_renew=".explode('-',$res['calibration_serial'])[2]."'>Renew </a>":$expiry,
                    "url"=>"output.php?date=".$res['present_date']."&&cal_srno=".$res['calibration_serial']."&&machine_type=".$res['machine_type']."&&centername=".$res['centername']."&&centeraddress1=".$res['centeraddress1']."&&centerregistration=".$res['centerregistration']."&&centeraddress2=".$res['centeraddress2']."&&calibration_gas_validity=".$res['gas_valid_date']."&&cal_validity=".$res['calibration_validity_date']."&&srno=".$res['srno'].""

                ]);

           }elseif($search_type == "TRAN"){
            return json_encode([
                "status"=>"exist",
                "certificat_type"=>"TRAN",
                "certificate_issue_date"=>$res['certificate_issue_date'],
                "training_cer_no"=>$res['training_cer_no'],
                "traineename"=>$res['traineename'],
                "centername"=>$res['centername'],
                "profimg"=>$res['profimg'],
                "url"=>  "../pdfs/training_cer.php?cer_date=".$res['certificate_issue_date']."&&training_cer_no=".$res['training_cer_no']."&&traineename=".$res['traineename']."&&centername=".$res['centername']."&&address1=".$res['address1']."&&address2=".$res['address2']."&&profimg=".$res['profimg'].""

            ]);

           }elseif($search_type == "AMC"){
                return json_encode([
                    "status"=>"exist",
                    "certificat_type"=>"AMC",
                    "certificate_issue_date"=>$res['certificate_issue_date'],
                    "amc_cer_no"=>$res['amc_cer_no'],
                    "ownername"=>$res['ownername'],
                    "centername"=>$res['centername'],
                    "certificate_valid_date"=>$res['certificate_valid_date'],
                    "fueltype"=>$res['fueltype'],
                    "slno"=>$res['slno'],
                    "url"=>  "../pdfs/amc.php?cer_date=".$res['certificate_issue_date']."&&amc_cer_no=".$res['amc_cer_no']."&&ownername=".$res['ownername']."&&centername=".$res['centername']."&&address1=".$res['address1']."&&address2=".$res['address2']."&&slno=".$res['slno']."&&fueltype=".$res['fueltype']."&&certificate_valid_date=".$res['certificate_valid_date'].""
                ]);
           } 
            
        }
    }else{
        return json_encode(['status'=>"false","message"=>"No records found.."]);
    }
}
//  function to generate QR code
   public function generateQR($tempDir=null,$file_name=null,$data=null){
        
        if(!empty($file_name) || $file_name != null){
            $codeContents =  $data;
        }else{
            $codeContents = '';
        } 
        // we need to generate filename somehow, 
        // with md5 or with database ID used to obtains $codeContents...
        $fileName = $file_name.".png";
        
        $pngAbsoluteFilePath = $tempDir.$fileName;
        
        // generating
        if (!file_exists($pngAbsoluteFilePath)) {
            QRcode::png($codeContents, $pngAbsoluteFilePath);
            return true;
        } else {
            return false;
            
        }
    
   }

//    Qrcode url search details
public function getDetails($table,$data,$operator){
    $new_values = [];
    $output = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    $query = "SELECT * FROM $table where $check_value";
    $run_que = mysqli_query($this->con,$query);
    $output = [];
    if(mysqli_num_rows($run_que) > 0){
        while($fet = mysqli_fetch_array($run_que)){
            $output[] = $fet;
        }
        return $output;
    }else{
       
        $output = "false";
    }
    return $output;
}
// update calibration
   public function update($table,$data,$operator,$filepath){
    $calibration_renew_date  = date("F d Y");
    $new_values = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    $sel = "SELECT * FROM $table where $check_value";
    $que = mysqli_query($this->con,$sel);
    if(mysqli_num_rows($que) > 0){
        if($fet_Data = mysqli_fetch_array($que)){
            $expiry = null;
            $expiry1 = null;
            $date_now = new DateTime();
            $calibratin_date = new DateTime($fet_Data['calibration_validity_date']);
            if ($date_now > $calibratin_date) {
            $expiry =  'Yes';
            }else{
                $expiry = 'No';
            }
            // checking gas validity
            $calibratin_gas_date = new DateTime($fet_Data['gas_valid_date']);
            if ($date_now > $calibratin_gas_date) {
            $expiry1 =  'Yes';
            }else{
                $expiry1 = 'No';
            }
             // calibration certificate No.
             $calibration_serial = 'MARS-CAL-'.date("dmYhis");
             // formating date 
             $date = strtotime($fet_Data['present_date']);
             $present_date = date('F d Y',$date);
             $formated_present_date = date('Y-m-d',$date);
             $calibration_valid_date = date_create($formated_present_date);
             date_add($calibration_valid_date,date_interval_create_from_date_string('4 months'));
             date_sub($calibration_valid_date,date_interval_create_from_date_string('1 day'));
             $calibration_valid_date =  date_format($calibration_valid_date,'d-m-Y');

             // adding date for calibration gas validity
                 $date1 = strtotime(date('Y')."-03-14");
                 $date1 = date('Y-m-d',$date1);
                 $gas_date = date_create($date1);
                 date_add($gas_date,date_interval_create_from_date_string("1 year"));
                 date_sub($gas_date,date_interval_create_from_date_string("1 day"));

                 $gas_validity_date =  date_format($gas_date,"d-m-Y");

            if($expiry == "Yes" ||  $expiry =="Yes" && $expiry1 == "Yes"){
               
                // calibration academic year
                $calibration_year = date("Y")."-".(string)(((int)date("Y")) + 1) ;
                $qr_image = $calibration_serial.".png";
                if($expiry1 == "Yes"){
                    unlink($filepath.$fet_Data['qr_img']);

                    $update = "UPDATE $table SET calibration_serial='$calibration_serial',present_date='$calibration_renew_date',gas_valid_date='$gas_validity_date',calibration_validity_date='$calibration_valid_date',qr_img='$qr_image',cal_year='$calibration_year' where id='".$fet_Data['id']."'";
                    $run_update = mysqli_query($this->con,$update);
                    
                    if($run_update){
                        $this->generateQR($filepath,$calibration_serial,"".SITE_URL."calibration_details.php?calibration_serial=".$calibration_serial."");
                        return json_encode(['status'=>'success',"url"=>"output.php?centerregistration=".$fet_Data['centerregistration']."&&date=".$calibration_renew_date."&&cal_srno=".$calibration_serial."&&machine_type=".$fet_Data['machine_type']."&&centername=".$fet_Data['centername']."&&centeraddress1=".$fet_Data['centeraddress1']."&&centeraddress2=".$fet_Data['centeraddress2']."&&calibration_gas_validity=".$gas_validity_date."&&cal_validity=".$calibration_valid_date."&&srno=".$fet_Data['srno'].""]);
                    }
                 
                }
                else{
                    unlink($filepath.$fet_Data['qr_img']);
                    $update = "UPDATE $table SET calibration_serial='$calibration_serial', present_date='$calibration_renew_date',calibration_validity_date='$calibration_valid_date',qr_img='$qr_image',cal_year='$calibration_year' where id='".$fet_Data['id']."'";
                    $run_update = mysqli_query($this->con,$update);
                    if($run_update){
                        $this->generateQR($filepath,$calibration_serial,"".SITE_URL."calibration_details.php?calibration_serial=".$calibration_serial."");
                        return json_encode(['status'=>'success',"url"=>"output.php?centerregistration=".$fet_Data['centerregistration']."&&date=".$present_date."&&cal_srno=".$calibration_serial."&&machine_type=".$fet_Data['machine_type']."&&centername=".$fet_Data['centername']."&&centeraddress1=".$fet_Data['centeraddress1']."&&centeraddress2=".$fet_Data['centeraddress2']."&&calibration_gas_validity=".$fet_Data['gas_valid_date']."&&cal_validity=".$calibration_valid_date."&&srno=".$fet_Data['srno'].""]);
                    }
                }
                
                
            }elseif($expiry1 == "Yes"){
                $update = "UPDATE $table SET gas_valid_date='$gas_validity_date'  where id='".$fet_Data['id']."'";
           
                $run_update = mysqli_query($this->con,$update);
                if($run_update){
                    return json_encode(['status'=>'success',"url"=>"output.php?centerregistration=".$fet_Data['centerregistration']."&&date=".$present_date."&&cal_srno=".$fet_Data['calibration_serial']."&&machine_type=".$fet_Data['machine_type']."&&centername=".$fet_Data['centername']."&&centeraddress1=".$fet_Data['centeraddress1']."&&centeraddress2=".$fet_Data['centeraddress2']."&&calibration_gas_validity=".$gas_validity_date."&&cal_validity=".$fet_Data['calibration_validity_date']."&&srno=".$fet_Data['srno'].""]); 
                }
            }elseif($expiry=="No" || $expiry1 == "No"){
                return json_encode(["status"=>"fail","message"=>"Calibration is not Expired.It Expires on Date: ".$fet_Data['calibration_validity_date']." "]);
            }
        
        }
    }else{
        return json_encode(["message"=>"No records found..."]);
    }

    

   }

   

   // Compress and resize image
public function compress_img($file,$max_resolution,$image_type=null){
    if(file_exists($file)){
         if($image_type=="image/jpeg" || $image_type == "image/jpg"){
                $original_image = imagecreatefromjpeg($file);
            //  resolution 
                $original_width = imagesx($original_image);
                $original_height = imagesy($original_image);
                //  decrease width first
                $ratio = $max_resolution/$original_width ;
                $new_width = $max_resolution;
                $new_height = $original_height*$ratio ;

                if($new_height > $max_resolution){
                    $ratio = $max_resolution/$original_height;
                    $new_height = $max_resolution;
                    $new_width =  $original_width*$ratio; 
                }

                if($original_image){
                    $new_image = imagecreatetruecolor($new_width,$new_height);
                    imagecopyresampled($new_image,$original_image,0,0,0,0,$new_width,$new_height,$original_width,$original_height);
                    imagejpeg($new_image,$file,50);
                
                }
                return "success";
        }elseif($image_type=="image/png"){
            
            $original_image = imagecreatefrompng($file);
            imagealphablending($original_image, false);
            imagesavealpha($original_image, true);
            imagepng($original_image, $file,4);
            return "success";
        }
   
  } 
}

// function for Login
public function Login($table,$data,$operator,$redirect_to){
    session_start();
    $new_values = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    $query = "SELECT * FROM $table where $check_value";
    $run_que = mysqli_query($this->con,$query);
    $output = [];
    if(mysqli_num_rows($run_que) > 0){
        while($fet_res = mysqli_fetch_array($run_que)){
            $output[] = $fet_res;
        }
        $_SESSION['admin_session_data'] = $output;

        return json_encode([
            "status" => "success",
            "redirect_url" => $redirect_to
        ]);
    }else{
        return json_encode([
            "status" => "fail",
            "redirect_url" => "You are not Authorized"
        ]);
    }

}
//function for loading products into user interface
public function load_products($table){
    $select = "SELECT * FROM $table  ORDER BY id DESC";
    $que = mysqli_query($this->con,$select);
    $output = [];
    while($res = mysqli_fetch_array($que)){
        $output[] = $res;
    }
    return $output;
}

// count table rows
public function count_rows($table){
    $select = "SELECT * FROM $table";
    $que = mysqli_query($this->con,$select);
    $count = mysqli_num_rows($que);
    // while($count = mysqli_fetch_assoc($que)){
    //     $count = $count['NumberOfProducts'];
    // }
    return $count;
}


// function for Editing the Calibration
public function edit_calibration($table,$data,$operator,$id,$calibration_serial,$type){
    
    $new_values = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    $query = "UPDATE $table SET $check_value where id='".$id."'";
    $run_que = mysqli_query($this->con,$query);
    if($run_que){
        if($type == "CAL"){
            $url = "calibration_details.php?calibration_serial=".$calibration_serial."";
        }elseif($type == "TRIN"){
            $url = "calibration_details.php?training_cer_no=".$calibration_serial."";
        }elseif($type == "AMC"){
            $url = "calibration_details.php?amc_cer_no=".$calibration_serial."";
        }else{
            $url ="";
        }
        return json_encode([
            "status"=>"success",
            "message"=>"Successfully Modified...",
            "redirect_url" => $url

        ]);
    }else{
        return json_encode([
            "status"=>"fail",
            "message"=>"Fail to Modify"
        ]);
    }
}
// change password
public function update_value($table,$data,$operator,$id){
    
    $new_values = [];
    foreach($data as $key=>$val){
        array_push($new_values,"$key='$val'");
    }
    $check_value = implode(" $operator ",$new_values);
    $query = "UPDATE $table SET $check_value where id='".$id."'";
    $run_que = mysqli_query($this->con,$query);
	if($run_que){
        return json_encode([
            "status"=>"success",
            "message"=>"Successfully Changed...",
			"redirect_url" =>"logout.php?logout"
        ]);
    }else{
        return json_encode([
            "status"=>"fail",
            "message"=>"Fail to change"
        ]);
    }
}	
	



   public function __destruct()
   {
       mysqli_close($this->con);
   }

} 
  ?>