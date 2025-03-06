<?php
session_start();

// Function to generate OTP
function generateOTP() {
    return rand(1111, 9999);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch mobile number from the registration form
    $mobile = $_POST['UserMobileNumber'];

    // Generate OTP
    $otp = generateOTP();

    // Store OTP in session
    $_SESSION['grotp'] = $otp;
    $_SESSION["phone"] = $mobile;

    // Prepare SMS data
    $fields = array(
        "sender_id" => "FSTSMS",
        "message" => "Your GoRacings OTP is this :- " . $otp,
        "language" => "english",
        "route" => "p",
        "numbers" => $mobile,
    );
    
    $curl = curl_init();
    
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($fields),
        CURLOPT_HTTPHEADER => array(
            "authorization:$D8jIEYeGjK7duYbZr83AiUu68O1qUqt0G7OEHFEZDI22ccqzwWz1HM8dfXc",
            "accept: */*",
            "cache-control: no-cache",
            "content-type: application/json"
        ),
    ));
   

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        echo 'success'; // Successful response indication
    }
}
?>
