<?php
include 'gRconn.php';
// Establish connection to SQL Server
//$serverName = "localhost";//"110.227.185.209";
//$connectionOptions = array(
//    "Database" => "Race",
//    "Uid" => "sa",
//    "PWD" => "gosusat@123"
//);
//$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}
try {
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();
/*
	if (!empty($_POST["user_captcha"]) ||!empty($_SESSION["secure"] )) {
		if($_SESSION['secure'] == $_POST['user_captcha']){
			$_SESSION["CaptchaValue"] = true;
		  } 
		  else{
			$_SESSION["CaptchaValue"] = false;
		  }
	}
	*/
	if (!empty($_POST["UserEmailID"]) ||!empty($_POST["UserEmailPasscode"])) {
        $loginCredential = $_POST["UserEmailID"];
		$password = $_POST["UserEmailPasscode"];
		$_SESSION["UserEmailID"] = $_POST["UserEmailID"];
    } else if (!empty($_POST["UserMobileNumber"]) ||!empty($_POST["UserMobileNumberOTP"])) {
        $loginCredential = $_POST["UserMobileNumber"];
		$password = $_POST["UserMobileNumberOTP"];
        $_SESSION["UserMobileNumber"] = $_POST["UserMobileNumber"];		
    }
    //$UserEmailID = $_POST["UserEmailID"];
    //$password = $_POST["UserEmailPasscode"];

    //$UserMobileNumber = $_POST["UserMobileNumber"];
    //$UserMobileNumberOTP = $_POST["UserMobileNumberOTP"];

    //if (!empty($UserEmailID) ||!empty($password)) {
    //    $loginCredential = $UserEmailID;
    //    $password = $password;
    //} else {
    //    $loginCredential = $UserMobileNumber;
    //    $password = $UserMobileNumberOTP;
    //}
   
    // Execute the UserLogin stored procedure
    $tsql = "{CALL UserLogin (?, ?)}";
    $params = array($loginCredential, $password);
    $stmt = sqlsrv_query($conn, $tsql, $params);

    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    if (sqlsrv_has_rows($stmt)) {
        // Login successful
        //session_start();
        $_SESSION["loggedIn"] = true;
        $_SESSION["loginCredential"] = $loginCredential;
		
		
        //echo "<script>alert('Login successful! Welcome to GoRacings.');</script>";
		
		$error_message = "Login successful! Welcome to GoRacings.";

// JavaScript code to create a popup alert with yellow color
		echo '<script>';
	echo 'setTimeout(function() {';
	echo '    var alertMessage = document.createElement("div");';
	echo '    alertMessage.innerHTML = "' . $error_message . '";';
	echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
	echo '    alertMessage.style.color = "black";'; // Set text color to black
	echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
	echo '    alertMessage.style.position = "fixed";'; // Position the alert message
	echo '    alertMessage.style.top = "50%";'; // Position vertically in the middle
	echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
	echo '    alertMessage.style.transform = "translate(-50%, -50%)";'; // Center the alert message
	echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
	echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
	echo '    setTimeout(function() {';
	echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
	echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
	echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
	echo '</script>';
		
        echo "<script>window.location.href = 'lUser.php';</script>";
        // header("Location: lUser.php");
        exit();
    } else {
        
		$error_message = "Login failed.";

// JavaScript code to create a popup alert with yellow color
		echo '<script>';
	echo 'setTimeout(function() {';
	echo '    var alertMessage = document.createElement("div");';
	echo '    alertMessage.innerHTML = "' . $error_message . '";';
	echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
	echo '    alertMessage.style.color = "black";'; // Set text color to black
	echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
	echo '    alertMessage.style.position = "fixed";'; // Position the alert message
	echo '    alertMessage.style.top = "50%";'; // Position vertically in the middle
	echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
	echo '    alertMessage.style.transform = "translate(-50%, -50%)";'; // Center the alert message
	echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
	echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
	echo '    setTimeout(function() {';
	echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
	echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
	echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
	echo '</script>';
		
	// Login failed
	$_SESSION["loggedIn"] = false;
		
        header("Location: login.php");
        exit();
    }

    sqlsrv_free_stmt($stmt);
}

sqlsrv_close($conn);
} catch(PDOException $e) {
	
	
	//echo "Could not connect.\n";
    //echo "Error: " . $e->getMessage();
	$error_message = "Error: " . $e->getMessage();

	// JavaScript code to create a popup alert with yellow color
	echo '<script>';
	echo 'setTimeout(function() {';
	echo '    var alertMessage = document.createElement("div");';
	echo '    alertMessage.innerHTML = "' . $error_message . '";';
	echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
	echo '    alertMessage.style.color = "black";'; // Set text color to black
	echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
	echo '    alertMessage.style.position = "fixed";'; // Position the alert message
	echo '    alertMessage.style.top = "50%";'; // Position vertically in the middle
	echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
	echo '    alertMessage.style.transform = "translate(-50%, -50%)";'; // Center the alert message
	echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
	echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
	echo '    setTimeout(function() {';
	echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
	echo '    }, 25 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
	echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
	echo '</script>';
    // $output_message = "Error: " . $e->getMessage();
}
$conn = null;
?>