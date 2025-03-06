<?php
include 'gRconn.php';
// Database connection settings
//$serverName = "110.227.185.209";//"localhost";
//$serverName = "SWYOMSOFT\GORACINGS";
//$databaseName = "Race";
//$username = "sa";
// // $password = "gosusat@123";
//$password = "Heshavi@123";
try {

// Establish a database connection
/*
$conn = sqlsrv_connect($serverName, array(
    "Database" => $databaseName,
    "UID" => $username,
    "PWD" => $password
));
*/
if ($conn === false) {
    echo "Failed to connect to SQL Server: " . sqlsrv_errors();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

session_start();

if (!empty($_SESSION["UserEmailID"])){
	$UserEmailID = $_SESSION["UserEmailID"];
}else
{
	$UserEmailID = "";
}

if (!empty($_SESSION["UserMobileNumber"])){
	$UserMobileNumber = $_SESSION["UserMobileNumber"];
}else
{
	$UserMobileNumber = "";
}

$SelectedRace = $_POST['raceName'];
$RaceDateandTime = $_POST['a_race_dt_time'];
$AudienceAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
$RaceTicketPayment = $_POST['AudienceTicketGST'];

$AudienceDateofBirth = $_POST['a_birthdt'];

    $uploadDir = 'DocUploads/'; // Directory to store uploaded files

	//0
	$uploadFile = $uploadDir . basename($_FILES['a_photo_id']['name']);	
    if (move_uploaded_file($_FILES['a_photo_id']['tmp_name'], $uploadFile)) {        
         $govtIDProof_FilePath = $uploadFile;				
	 }
	 if (!empty($govtIDProof_FilePath)){
	 	$govtIDProof_fileName = basename($govtIDProof_FilePath);
	 	$govtIDProof_fileContent = file_get_contents($govtIDProof_FilePath);
	 }else
	 {
	 	$govtIDProof_fileName = "";
	 	$govtIDProof_fileContent = "";
	 }
	// //1
	// $uploadFile = $uploadDir . basename($_FILES['waiver_liability']['name']);	
    // if (move_uploaded_file($_FILES['waiver_liability']['tmp_name'], $uploadFile)) {        
    //     $WaiverofLiability_FilePath = $uploadFile;				
	// }
	// if (!empty($WaiverofLiability_FilePath)){
	// 	$WaiverofLiability_fileName = basename($WaiverofLiability_FilePath);
	// 	$WaiverofLiability_fileContent = file_get_contents($WaiverofLiability_FilePath);
	// }else
	// {
    //     $WaiverofLiability_fileName = "";
	// 	$WaiverofLiability_fileContent = "";
	// }
	// //2
	// $uploadFile = $uploadDir . basename($_FILES['p_medical_clearence_consent']['name']);	
    // if (move_uploaded_file($_FILES['p_medical_clearence_consent']['tmp_name'], $uploadFile)) {        
    //     $MedicalClearenceorConsent_FilePath = $uploadFile;				
	// }
	// if (!empty($MedicalClearenceorConsent_FilePath)){
	// 	$MedicalClearenceorConsent_fileName = basename($MedicalClearenceorConsent_FilePath);
	// 	$MedicalClearenceorConsent_fileContent = file_get_contents($MedicalClearenceorConsent_FilePath);
	// }else
	// {
	// 	$MedicalClearenceorConsent_fileName = "";
	// 	$MedicalClearenceorConsent_fileContent = "";

	//$fileContent = $gramPanchayatAgreement_fileContent;
	//$fileName = $gramPanchayatAgreement_fileName;

	
	$GovtIDProof = $govtIDProof_fileContent;
	// $GramPanchyatAgreement = $gramPanchayatAgreement_fileContent;
	// $RacePermissionLetter = $race_permission_letter_fileContent;
	// $RacePermitApplication = $race_permit_application_fileContent;
	
	$GovtIDProofFN = $govtIDProof_fileName;
	
    $EventScheduleProgramConfirmationfromAudience = isset($_POST['a_race_approval']) ? $_POST['a_race_approval'] : "Not specified";
 
    $FeedbackFromAudienceandContactInformation = $_POST['a_FC_info'];
	
	$RecordDateTime = date('Y-m-d H:i:s');
	$SetDateTime = date('Y-m-d H:i:s');
    
    $RacePermission = "Not Allowed";
/*
	//echo "<p>Values inserted start!</p>";
    $a_raceApprovalText = ($EventScheduleProgramConfirmationfromAudience == 1) ? "Yes" : "No";
    echo "Race Name: $SelectedRace<br>";
    echo "Race Date and Time: $RaceDateandTime<br>";
    echo "Audience Alloted Token Number: $AudienceAllotedTokenNumber<br>";
    echo "Audience Ticket Amount: $RaceTicketPayment<br>";
    echo "Audience Date of Birth: $AudienceDateofBirth<br>";

    echo "Govt ID Proof File Name: $govtIDProof_fileName<br>";
    // echo "Govt ID Proof File Content: $govtIDProof_fileContent<br>";

    echo "Race Approval for Organizer: $a_raceApprovalText<br>";

    echo "Feedback From Audience and Contact Information: $FeedbackFromAudienceandContactInformation<br>";

	echo "Recorded Date and Time: $RecordDateTime<br>";
    echo "Set Date and Time: $SetDateTime<br>";

echo "Data inserted successfully!";
*/

$params = array(
    array($SelectedRace, SQLSRV_PARAM_IN),
	array($UserEmailID, SQLSRV_PARAM_IN),
	array($UserMobileNumber, SQLSRV_PARAM_IN),
    array($RaceDateandTime, SQLSRV_PARAM_IN),
    array($AudienceDateofBirth, SQLSRV_PARAM_IN),
	array($RaceTicketPayment, SQLSRV_PARAM_IN),
    array($govtIDProof_fileContent, SQLSRV_PARAM_IN),
    array($govtIDProof_fileName, SQLSRV_PARAM_IN),
    array($FeedbackFromAudienceandContactInformation, SQLSRV_PARAM_IN),
    array($AudienceAllotedTokenNumber, SQLSRV_PARAM_IN),
    array($RecordDateTime, SQLSRV_PARAM_IN),
    array($SetDateTime, SQLSRV_PARAM_IN)
);

// The SQL statement to execute the stored procedure
$sql = "{CALL SaveRaceAudience(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}";

// Executes the stored procedure
$stmt = sqlsrv_query($conn, $sql, $params);

if($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Record inserted successfully.";
}

// Free the statement and close the connection
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

header("Location: profile.php");
        exit();

// Close the database connection

} 
} catch (PDOException $e) {
	sqlsrv_close($conn);
    // Handle the exception
    echo "Error executing the stored procedure: " . $e->getMessage();
}
?>