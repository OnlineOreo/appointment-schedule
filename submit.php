<?php
$conn=mysqli_connect("localhost","root","","meetalkin_ehrapace");
if(!$conn){
    echo "error";
}

 extract($_POST);
if(isset($_POST["selectDay"]) && isset($_POST["selectDate"])){
    $sql = "SELECT * FROM appointments WHERE date = '$selectDate'";
    $active = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($active);
    
    $startTimeInput = "08:00";
    $gapTimeInput = "15";
    $breakStartTimeInput = "";
    $breakEndTimeInput = "";
    $endTimeInput = "17:00";
    
    $startTime = strtotime('2000-01-01 ' . $startTimeInput);
    $gapTime = (int)$gapTimeInput;
    $breakStartTime = strtotime('2000-01-01 ' . $breakStartTimeInput);
    $breakEndTime = strtotime('2000-01-01 ' . $breakEndTimeInput);
    $endTime = strtotime('2000-01-01 ' . $endTimeInput);
    $availableTime = "";
    
    $appointments = [];
    
    if ($numrows > 0) {
        while ($row = mysqli_fetch_array($active)) {
            $appointment_start = strtotime('2000-01-01 ' . $row['time_start']);
            $appointment_end = strtotime('2000-01-01 ' . $row['time_end']);
            $appointments[] = [
                'start' => $appointment_start,
                'end' => $appointment_end
            ];
        }
    }
    
    while ($startTime < $endTime) {
        $time = date('h:i A', $startTime);
        $slot_available = true;
    
        // Check if the current time falls within the break
        if (!empty($breakStartTimeInput) && $startTime >= $breakStartTime && $startTime < $breakEndTime) {
            $slot_available = false;
        }
    
        foreach ($appointments as $appointment) {
            if ($startTime >= $appointment['start'] && $startTime < $appointment['end']) {
                $slot_available = false;
                break; // No need to continue checking other appointments
            }
        }
    
        if ($slot_available) {
            $availableTime = '<div class="selectTime">' . $time . '</div>';
            echo $availableTime;
        }
    
        $startTime += $gapTime * 60;
    }
}

if(isset($_POST["verificationPhone"]) && isset($_POST['phoneNumber'])){
    $vsql="select * from varification where phone='$phoneNumber' and is_varified='YES'";
    $vactive=mysqli_query($conn,$vsql);
    $numrows=mysqli_num_rows($vactive);
    if($numrows>0){
        echo "user_exit";
    }else{
        $otp=rand(111111,999999);
        $sql="insert into varification(phone,otp) values('$phoneNumber','$otp')";
        if($active = mysqli_query($conn,$sql)){
            $username="apace";
            $password ="999086402";
            $number= "$phoneNumber";
            $sender="ApaceM";
            $message='OTP for Login on ApaceM is '.$otp.'. Please do not share it with anybody.';
            $template_id='1507166312581026575';
    
            $url="http://api.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($number)."&sender=".urlencode($sender)."&message=".urlencode($message)."&type=".urlencode('3')."&template_id=".urlencode($template_id);
    
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $curl_scraped_page = curl_exec($ch);
            curl_close($ch);
            echo "new_user";
        }
    }
}

if(isset($_POST['hospitalname']) && isset($_POST['doctorname']) && isset($_POST['date']) && isset($_POST['settime']) && isset($_POST['name']) &&isset($_POST['email']) && isset($_POST['number']) && isset($_POST['address'])
    && isset($_POST['gender']) && isset($_POST['reason'])){

    // check if user exits     
    $sql="select * from patients where phone = '$number'";
    $active=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($active);
    if($numrows > 0){
            // get user id 
            $useridsql = "select * from users where email='$email'";
            $useridactive = mysqli_query($conn,$useridsql);
            $useridresult = mysqli_fetch_assoc($useridactive);
            $userid = $useridresult['id'];

             // Create time in 24 hour format
             $resultTime = date("H:i", strtotime($settime));
            // Create 15 minute after time 
             $afterTime = (new DateTime($resultTime))->modify("+15 minutes")->format('H:i');
    
            $appointmentsql="insert into appointments(user_id,date,time_start,time_end,visited,reason) values('$userid','$date','$resultTime','$afterTime','0','$reason')";
            $appointmentactive=mysqli_query($conn,$appointmentsql);
            if($appointmentactive){
                echo "user_details_added";
            }
    }else{
    // Random 8 digit Password genrate 
    $alphabet = "abcdefghijklmnopqrstuvwxyz0123456789";
    $password = ''; // Initialize as an empty string
    $alphabetLength = strlen($alphabet); // Get the length of the alphabet
    for ($i = 0; $i < 9; $i++) {
        $n = rand(0, $alphabetLength - 1);
        $password .= $alphabet[$n]; // Append the character to the password
    }    
    $usersql="insert into users(name,email,password) values('$name','$email','$password')";
    $useractive=mysqli_query($conn,$usersql);
    if($useractive){
        // get user id 
        $useridsql = "select * from users where email='$email'";
        $useridactive = mysqli_query($conn,$useridsql);
        $useridresult = mysqli_fetch_assoc($useridactive);
        $userid = $useridresult['id'];

        // get random date of birth 
        $dayOfBirth = rand(1, cal_days_in_month(CAL_GREGORIAN, rand(1, 12), date("Y") - rand(18, 70)));
        $dob = sprintf("%04d-%02d-%02d", date("Y") - rand(18, 70), rand(1, 12), $dayOfBirth);

        $patientsql="insert into patients(user_id,birthday,phone,gender,adress) values('$userid','$dob','$number','$gender','$address')";
        $patientactive=mysqli_query($conn,$patientsql);
        if($patientactive){
             // Create time in 24 hour format
            $resultTime = date("H:i", strtotime($settime));

            // Create 15 minute after time 
            $afterTime = (new DateTime($resultTime))->modify("+15 minutes")->format('H:i');

            $appointmentsql="insert into appointments(user_id,date,time_start,time_end,visited,reason) values('$userid','$date','$resultTime','$afterTime','1','$reason')";
            $appointmentactive=mysqli_query($conn,$appointmentsql);
            if($appointmentactive){
                echo "user_details_added";
            }
        }
    }
    }  


}

if(isset($_POST["otp"]) && isset($_POST['number'])){
    $sql="select * from varification where phone = '$number' and otp = '$otp'";
    $active=mysqli_query($conn,$sql);
    $numrows=mysqli_num_rows($active);
    if($numrows>0){
        $sqlupdate="update varification set is_varified='YES' where phone='$number'";
        if($activeupdate=mysqli_query($conn,$sqlupdate)){
            echo "valid_otp";
        }
    }else{
        echo "invalid_otp";
    }
}