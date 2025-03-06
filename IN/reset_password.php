<?php

session_start();

$inputString = $_POST["UserEmailID"];;
//echo $inputString;
// Command to execute the C# DLL and pass the input string
$command = "C:\\xampp\\htdocs\\HTML\\goracings\\ConsoleApp1.exe \"$inputString\"";



$output = shell_exec($command);

// Debug: Echo the output to see what it contains
echo "Output: $output<br>";

// Check if output is "YES" and set session variable accordingly
if (isset($output) && trim($output) == "YES") {
    $_SESSION['RePassword'] = true;
    //echo "Password reset successful";
} else {
    $_SESSION['RePassword'] = false;
    //echo "Password reset failed";
}



//shell_exec($command);

// Output the result from the C# DLL
//echo $output;
//echo "Done.";

$error_message = "Reset email send to your emailID.";

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
		
        echo "<script>window.location.href = 'login.php';</script>";
        // header("Location: lUser.php");
        exit();

?>
