<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	//echo 'Payment start. Payment ID: ' . $paymentId;
    // Include Razorpay PHP Library
    require('razorpay-php/Razorpay.php');

    // Replace with your Razorpay API Key and Secret
    $apiKey = 'rzp_test_L1hpOI6glBy9Yg';
    $apiSecret = 'yUIVtyVEFtHUaaQKiHOzBC7Y';
	
	//$apiKey = 'rzp_live_BenzxXZGIlc8SZ';
    //$apiSecret = 'r3GB57inBUD2w8f64nmhjc7u';

    // Initialize Razorpay
    $razorpay = new Razorpay\Api\Api($apiKey, $apiSecret);

    // Get payment details from the request
    $paymentIdPaid = $_POST['razorpay_payment_id'];

    try {
        // Fetch payment details from Razorpay
        $payment = $razorpay->payment->fetch($paymentIdPaid);
         //echo $payment->status;
        // Check if payment is successful
        if ($payment->status === 'authorized') {
            // Payment is successful, process further (e.g., update database)
            // You can also send a confirmation email, etc.
            //echo 'Payment successful123456789. Payment ID: ' . $paymentIdPaid;
			
			///////////////////	
			/*
			$serverName = "your_server_name"; // Your server name
			$connectionOptions = array(
				"Database" => "your_database_name", // Your database name
				"Uid" => "your_username", // Your database username
				"PWD" => "your_password" // Your database password
			);

			// Establishes the connection
			$conn = sqlsrv_connect($serverName, $connectionOptions);

			if ($conn === false) {
				die(print_r(sqlsrv_errors(), true));
			}
			*/
			
			include 'gRconn.php';

			// Parameters for the stored procedure
			$paymentId = $paymentIdPaid;
			$LoginByUser = $_SESSION["loginCredential"];
			$PaymentAmount = $_POST['race_payment'];
			$Status = (string)$payment->status; // Can be NULL
			$RacingAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
			$RecordDateTime = date("Y-m-d H:i:s");
			$SetDateTime = date("Y-m-d H:i:s");

			// Prepare the SQL statement
			$sql = "{CALL SaveOrganizerPaymentDetails(?, ?, ?, ?, ?, ?, ?)}";

			// Prepare the statement
			$params = array(
				array($paymentId, SQLSRV_PARAM_IN),
				array($LoginByUser, SQLSRV_PARAM_IN),
				array($PaymentAmount, SQLSRV_PARAM_IN),
				array($Status, SQLSRV_PARAM_IN),
				array($RacingAllotedTokenNumber, SQLSRV_PARAM_IN),
				array($RecordDateTime, SQLSRV_PARAM_IN),
				array($SetDateTime, SQLSRV_PARAM_IN)
			);

			$stmt = sqlsrv_prepare($conn, $sql, $params);

			if (!$stmt) {
				die(print_r(sqlsrv_errors(), true));
			}

			// Execute the statement
			if (sqlsrv_execute($stmt)) {
				//echo "Record inserted successfully.";
			} else {
				die(print_r(sqlsrv_errors(), true));
			}

			// Close the connection
			sqlsrv_close($conn);
			/////////////////////////
//echo 'Payment Done  ===>>> ' . $paymentId;
            echo 'success';
			
        } else {
            //echo 'Payment failed' . $paymentId;
			echo 'failed';
        }
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}
?>
