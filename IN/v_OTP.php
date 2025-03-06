<?php
session_start();
header('Content-Type: application/json'); // Set content type to JSON

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredOTP = $_POST['UserMobileNumberOTP'];

    // Retrieve the OTP stored in session
    $storedOTP = isset($_SESSION['grotp']) ? $_SESSION['grotp'] : '';

    if ($enteredOTP == $storedOTP) {
        // Include database connection parameters
        include 'gRconn.php';

        // Check if the user's mobile number is stored in the session
        if (!isset($_SESSION['phone'])) {
            echo json_encode(['status' => 'error', 'message' => 'User mobile number not found in session.']);
            exit();
        }

        $userMobileNumber = $_SESSION['phone']; // Assuming the user's mobile number is stored in the session

        // Update the user's record to mark OTP as verified
        $sql = "UPDATE RaceUserRegistration SET UserMobileNumberOTP = ? WHERE UserMobileNumber = ?";

        $params = array($_SESSION['grotp'], $userMobileNumber);

        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            // Handle errors
            if (($errors = sqlsrv_errors()) != null) {
                foreach ($errors as $error) {
                    $errorMessages[] = "SQLSTATE: " . $error['SQLSTATE'] . " - " . $error['message'];
                }
                echo json_encode(['status' => 'error', 'message' => 'Database query failed: ' . implode("; ", $errorMessages)]);
                exit();
            }
        } else {
			$_SESSION['loggedIn'] = true;
			$_SESSION["loginCredential"] = $userMobileNumber;
			$_SESSION['GROTPFLG'] = true;
            // Unset the OTP session variable after successful verification
            unset($_SESSION['grotp']);
            echo json_encode(['status' => 'success', 'message' => 'OTP verified successfully!']);

            sqlsrv_free_stmt($stmt);
        }

        sqlsrv_close($conn);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Incorrect OTP. Please try again.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>
