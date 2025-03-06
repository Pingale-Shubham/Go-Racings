<?php
include 'gRconn.php';
// Database connection settings
//$serverName = "110.227.185.209";//"localhost";
//$serverName = "SWYOMSOFT\GORACINGS";
/*
$connectionOptions = array(
    "Database" => "Race",
    "Uid" => "sa",
    "PWD" => "Heshavi@123"
);
*/
// Database connection settings
//$serverName = "110.227.185.209";//"localhost";
//$serverName = "SWYOMSOFT\GORACINGS";
//$databaseName = "Race"; $username = "sa"; $password = "Heshavi@123";
// $databaseName = "Race"; $username = "sa"; $password = "gosusat@123";
try {

// Establish a database connection
/*$conn = sqlsrv_connect($serverName, array(
    "Database" => $databaseName,
    "UID" => $username,
    "PWD" => $password
));

if ($conn === false) {
    echo "Failed to connect to SQL Server: " . sqlsrv_errors();
    exit();
}
*/

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
$RaceDateandTime = $_POST['p_race_dt_time'];
$RaceLastAdmissionDateandTime = $_POST['p_last_race_dt_time'];
$ParticipentsAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
$RaceParticipentsFee = $_POST['ParticipantFeeGST'];

$uploadDir = 'DocUploads/'; // Directory to store uploaded files

//0
$uploadFile = $uploadDir . basename($_FILES['P_photo_id']['name']);	
if (move_uploaded_file($_FILES['P_photo_id']['tmp_name'], $uploadFile)) {        
	 $GovtIDProof_FilePath = $uploadFile;				
 }
 if (!empty($GovtIDProof_FilePath)){
	 $GovtIDProof_fileName = basename($GovtIDProof_FilePath);
	 $GovtIDProof_fileContent = file_get_contents($GovtIDProof_FilePath);
 }else
 {
	 $GovtIDProof_fileName = "";
	 $GovtIDProof_fileContent = "";
 }    
//1
$uploadFile = $uploadDir . basename($_FILES['P_waiver_liability']['name']);	
if (move_uploaded_file($_FILES['P_waiver_liability']['tmp_name'], $uploadFile)) {        
	$WaiverofLiability_FilePath = $uploadFile;				
}
if (!empty($WaiverofLiability_FilePath)){
	$WaiverofLiability_fileName = basename($WaiverofLiability_FilePath);
	$WaiverofLiability_fileContent = file_get_contents($WaiverofLiability_FilePath);
}else
{
	$WaiverofLiability_fileName = "";
	$WaiverofLiability_fileContent = "";
}
//2
$uploadFile = $uploadDir . basename($_FILES['P_medical_clearence_consent']['name']);	
if (move_uploaded_file($_FILES['P_medical_clearence_consent']['tmp_name'], $uploadFile)) {        
	$MedicalClearenceorConsent_FilePath = $uploadFile;				
}
if (!empty($MedicalClearenceorConsent_FilePath)){
	$MedicalClearenceorConsent_fileName = basename($MedicalClearenceorConsent_FilePath);
	$MedicalClearenceorConsent_fileContent = file_get_contents($MedicalClearenceorConsent_FilePath);
}else
{
	$MedicalClearenceorConsent_fileName = "";
	$MedicalClearenceorConsent_fileContent = "";

}
//3
$uploadFile = $uploadDir . basename($_FILES['P_proof_entry_fee']['name']);	
if (move_uploaded_file($_FILES['P_proof_entry_fee']['tmp_name'], $uploadFile)) {        
	$LegalProofofEntryFeePayment_FilePath = $uploadFile;				
}
if (!empty($LegalProofofEntryFeePayment_FilePath)){
	$LegalProofofEntryFeePayment_fileName = basename($LegalProofofEntryFeePayment_FilePath);
	$LegalProofofEntryFeePayment_fileContent = file_get_contents($LegalProofofEntryFeePayment_FilePath);
}else
{
	$LegalProofofEntryFeePayment_fileName = "";
	$LegalProofofEntryFeePayment_fileContent = "";

}
//4
$uploadFile = $uploadDir . basename($_FILES['P_T_G_Registration']['name']);	
if (move_uploaded_file($_FILES['P_T_G_Registration']['tmp_name'], $uploadFile)) {        
	$TeamorGroupRegistrationDetailsUniqueCode_FilePath = $uploadFile;				
}
if (!empty($TeamorGroupRegistrationDetailsUniqueCode_FilePath)){
	$TeamorGroupRegistrationDetailsUniqueCode_fileName = basename($TeamorGroupRegistrationDetailsUniqueCode_FilePath);
	$TeamorGroupRegistrationDetailsUniqueCode_fileContent = file_get_contents($TeamorGroupRegistrationDetailsUniqueCode_FilePath);
}else
{
	$TeamorGroupRegistrationDetailsUniqueCode_fileName = "";
	$TeamorGroupRegistrationDetailsUniqueCode_fileContent = "";
}
//5
$uploadFile = $uploadDir . basename($_FILES['P_C_D_Approval']['name']);	
if (move_uploaded_file($_FILES['P_C_D_Approval']['tmp_name'], $uploadFile)) {        
	$CostumeorDressCodeApproval_FilePath = $uploadFile;				
}
if (!empty($CostumeorDressCodeApproval_FilePath)){
	$CostumeorDressCodeApproval_fileName = basename($CostumeorDressCodeApproval_FilePath);
	$CostumeorDressCodeApproval_fileContent = file_get_contents($CostumeorDressCodeApproval_FilePath);
}else
{
	$CostumeorDressCodeApproval_fileName = "";
	$CostumeorDressCodeApproval_fileContent = "";
}
//6
$uploadFile = $uploadDir . basename($_FILES['P_Other_Documents']['name']);	
if (move_uploaded_file($_FILES['P_Other_Documents']['tmp_name'], $uploadFile)) {        
	$OtherDocuments_FilePath = $uploadFile;				
}
if (!empty($OtherDocuments_FilePath)){
	$OtherDocuments_fileName = basename($OtherDocuments_FilePath);
	$OtherDocuments_fileContent = file_get_contents($OtherDocuments_FilePath);
}else
{
	$OtherDocuments_fileName = "";
	$OtherDocuments_fileContent = "";		
}
	//$fileContent = $gramPanchayatAgreement_fileContent;
	//$fileName = $gramPanchayatAgreement_fileName;

    $GovtIDProof = $GovtIDProof_fileContent;
    $WaiverofLiability = $WaiverofLiability_fileContent;
    $MedicalClearenceorConsent = $MedicalClearenceorConsent_fileContent;
    $LegalProofofEntryFeePayment = $LegalProofofEntryFeePayment_fileContent;
    $TeamorGroupRegistrationDetailsUniqueCode = $TeamorGroupRegistrationDetailsUniqueCode_fileContent;
    $CostumeorDressCodeApproval = $CostumeorDressCodeApproval_fileContent;
    $OtherDocuments = $OtherDocuments_fileName;
    
    $GovtIDProofFN = $GovtIDProof_fileName;
    $WaiverofLiabilityFN = $WaiverofLiability_fileName;
    $MedicalClearenceorConsentFN = $MedicalClearenceorConsent_fileName;
    $LegalProofofEntryFeePaymentFN = $LegalProofofEntryFeePayment_fileName;
    $TeamorGroupRegistrationDetailsUniqueCodeFN = $TeamorGroupRegistrationDetailsUniqueCode_fileName;
    $CostumeorDressCodeApprovalFN = $CostumeorDressCodeApproval_fileName;
    $OtherDocumentsFN = $OtherDocuments_fileName;

	$BankDetails = $_POST['bank_details'];
    $BankAccountNumber = $_POST['p_accountno'];
    $BankIFSCCode = $_POST['p_IFSC_code'];
    $RaceApprovalforParticipent = isset($_POST['p_race_approval']) ? $_POST['p_race_approval'] : "Not specified";
 
    
    // Determine race approval text
    $praceApprovalText = ($RaceApprovalforParticipent == 1) ? "Yes" : "No";
	/*
    echo "Race Name: $SelectedRace<br>";
    echo "Race Date and Time: $RaceDateandTime<br>";
    echo "Race Last Admission Date and Time: $RaceLastAdmissionDateandTime<br>";
    echo "Participents Alloted Token Number: $ParticipentsAllotedTokenNumber<br>";
    echo "Participents Fee: $RaceParticipentsFee<br>";

    echo "Govt ID Proof File Name: $GovtIDProof_fileName<br>";
// echo "Govt ID Proof File Content: $GovtIDProof_fileContent<br>";

echo "Waiver of Liability File Name: $WaiverofLiability_fileName<br>";
// echo "Waiver of Liability File Content: $WaiverofLiability_fileContent<br>";

echo "Medical Clearence or Consent File Name: $MedicalClearenceorConsent_fileName<br>";
// echo "Medical Clearence or Consent File Content: $MedicalClearenceorConsent_fileContent<br>";

echo "Legal Proof of Entry Fee Payment File Name: $LegalProofofEntryFeePayment_fileName<br>";
// echo "Legal Proof of Entry Fee Payment File Content: $LegalProofofEntryFeePayment_fileContent<br>";

echo "Team or Group Registration Details Unique Code File Name: $TeamorGroupRegistrationDetailsUniqueCode_fileName<br>";
// echo "Team or Group Registration Details Unique Code File Content: $TeamorGroupRegistrationDetailsUniqueCode_fileContent<br>";

echo "Costume or Dress Code Approval File Name: $CostumeorDressCodeApproval_fileName<br>";
// echo "Costume or Dress Code Approval File Content: $CostumeorDressCodeApproval_fileContent<br>";

echo "Other Documents File Name: $OtherDocuments_fileName<br>";
// echo "Other Documents File Content: $OtherDocuments_fileContent<br>";

    echo "Bank Details: $BankDetails<br>";
    echo "Bank Account Number: $BankAccountNumber<br>";
    echo "Bank IFSC Code: $BankIFSCCode<br>";
    echo "Race Approval for Organizer: $praceApprovalText<br>";
*/
    // Close connection   

	$RecordDateTime = date('Y-m-d H:i:s');
	$SetDateTime = date('Y-m-d H:i:s');
    
    $ParticipentsPermission = "Not Allowed";

	//echo "<p>Values inserted start!</p>";
	

// Establishes the connection
//$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Stored procedure parameters
$params = array(
    array($SelectedRace, SQLSRV_PARAM_IN),
	array($UserEmailID, SQLSRV_PARAM_IN),
	array($UserMobileNumber, SQLSRV_PARAM_IN),
    array($RaceDateandTime, SQLSRV_PARAM_IN),
    array($RaceLastAdmissionDateandTime, SQLSRV_PARAM_IN),
    array($RaceParticipentsFee, SQLSRV_PARAM_IN),
    array($GovtIDProof_fileContent, SQLSRV_PARAM_IN),
    array($WaiverofLiability_fileContent, SQLSRV_PARAM_IN),
    array($MedicalClearenceorConsent_fileContent, SQLSRV_PARAM_IN),
    array($LegalProofofEntryFeePayment_fileContent, SQLSRV_PARAM_IN),
    array($TeamorGroupRegistrationDetailsUniqueCode_fileContent, SQLSRV_PARAM_IN),
    array($CostumeorDressCodeApproval_fileContent, SQLSRV_PARAM_IN),
    array($OtherDocuments_fileContent, SQLSRV_PARAM_IN),
    array($GovtIDProof_fileName, SQLSRV_PARAM_IN),
    array($WaiverofLiability_fileName, SQLSRV_PARAM_IN),
    array($MedicalClearenceorConsent_fileName, SQLSRV_PARAM_IN),
    array($LegalProofofEntryFeePayment_fileName, SQLSRV_PARAM_IN),
    array($TeamorGroupRegistrationDetailsUniqueCode_fileName, SQLSRV_PARAM_IN),
    array($CostumeorDressCodeApproval_fileName, SQLSRV_PARAM_IN),
    array($OtherDocuments_fileName, SQLSRV_PARAM_IN),
    array($BankDetails, SQLSRV_PARAM_IN),
    array($BankAccountNumber, SQLSRV_PARAM_IN),
    array($BankIFSCCode, SQLSRV_PARAM_IN),
    array($ParticipentsAllotedTokenNumber, SQLSRV_PARAM_IN),
	array($ParticipentsPermission, SQLSRV_PARAM_IN),
    array($praceApprovalText, SQLSRV_PARAM_IN),
    array($RecordDateTime, SQLSRV_PARAM_IN),
    array($SetDateTime, SQLSRV_PARAM_IN)
);

// Prepare the SQL query
$sql = "{CALL SaveRaceParticipents(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}";

// Execute the query
$stmt = sqlsrv_query($conn, $sql, $params);

if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
} else {
    echo "Record inserted successfully.";
}

// Free statement and connection resources
sqlsrv_free_stmt($stmt);
sqlsrv_close($conn);

// echo "Data inserted successfully!";

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