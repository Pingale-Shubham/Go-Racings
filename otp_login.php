<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ajax'])) {
    include 'gRconn.php';

    if ($conn === false) {
        echo json_encode(array("status" => "error", "message" => sqlsrv_errors()));
        exit;
    }

    function checkMobileNumberExists($conn, $mobileNumber) {
        $sql = "SELECT COUNT(*) as count FROM RaceUserRegistration WHERE UserMobileNumber = ?";
        $params = array($mobileNumber);

        $stmt = sqlsrv_query($conn, $sql, $params);
        
        if ($stmt === false) {
            echo json_encode(array("status" => "error", "message" => sqlsrv_errors()));
            exit;
        }

        $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
        return $row['count'] > 0;
    }

    session_start();
    $mobileNumberToCheck = $_POST['UserMobileNumber'];
    
    if (checkMobileNumberExists($conn, $mobileNumberToCheck)) {
        // Generate OTP
        $otp = rand(1111, 9999);
        $_SESSION['grotp'] = $otp;
        $_SESSION["phone"] = $mobileNumberToCheck;

        // Send OTP via Fast2SMS API
        $fields = array(
            "sender_id" => "FSTSMS",
            "message" => "Your GoRacings OTP is this :- " . $otp,
            "language" => "english",
            "route" => "p",
            "numbers" => $mobileNumberToCheck,
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
            echo json_encode(array("status" => "error", "message" => "cURL Error #: " . $err));
        } else {
            echo json_encode(array("status" => "success", "message" => "OTP sent successfully."));
        }
    } else {
        echo json_encode(array("status" => "error", "message" => "Mobile number does not exist."));
    }

    sqlsrv_close($conn);
    exit;
} else {
    // Optionally, log the request method for debugging
    error_log("Invalid request method: ".$_SERVER['REQUEST_METHOD']);
    echo json_encode(array("status" => "error", "message" => "Invalid request method."));
}
?>
