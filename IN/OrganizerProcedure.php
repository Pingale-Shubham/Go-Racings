<?php
// Database connection settings
$serverName = "110.227.185.209";//"localhost";
//$serverName = "SWYOM\GORACINGS";
$databaseName = "Race";
$username = "sa";
$password = "Heshavi@123";//"gosusat@123";


try {

// Establish a database connection
$conn = sqlsrv_connect($serverName, array(
    "Database" => $databaseName,
    "UID" => $username,
    "PWD" => $password
));

if ($conn === false) {
    echo "Failed to connect to SQL Server: " . sqlsrv_errors();
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){


    $RaceName= $_POST['race_name'];;
	$RaceAddress=$_POST['race_address'];
	$RaceCountry=$_POST['UserCountry'];
	$RaceState=$_POST['UserState'];
	$RaceDistirct=$_POST['UserDistirct'];
	$RaceTaluka=$_POST['UserTaluka'];
	$RaceLocationLatitude=$_POST['latitude'];
	$RaceLocationLongitude=$_POST['longitude'];
	$RaceDateandTime=$_POST['race_dt_time'];
	$RaceLastAdmissionDateandTime=$_POST['last_race_dt_time'];
	
	// $filePath = $_FILES['file']['tmp_name'];
	// $filePath = '../goracings/images/goracingslogo.png';
    // Read the file content
    $fileContent = file_get_contents($filePath);
	
	$fileName = basename($filePath);
	
	//echo $fileContent;
	
	$GramPanchyatAgreement = $fileContent;
	$RacePermissionLetter = $fileContent;
	$RacePermitApplication = $fileContent;
	$RouteMapandCourseCertification = $fileContent;
	$SafetyandEmergencyPlan = $fileContent;
	$InsuranceDocuments = $fileContent;
	$PerformerentertainmentAgreementza = $fileContent;
	$ParticipantRegistrationForms = $fileContent;
	$SponsorshipAgreement = $fileContent;
	$VendorContacts = $fileContent;
	$VolunteerAgreements = $fileContent;
	$MarketingandPromotionalMaterials = $fileContent;
	$EventScheduleandTimelines = $fileContent;
	$BudgetandFinancialReports = $fileContent;
	$EnvironmentalImpactAssessment = $fileContent;
	$PostEventEvalutionReport = $fileContent;
	$LegalPermitsandLicenses = $fileContent;
	$OtherDocuments = $fileContent;
	
	$GramPanchyatAgreementFN = $fileName;
	$RacePermissionLetterFN = $fileName;
	$RacePermitApplicationFN = $fileName;
	$RouteMapandCourseCertificationFN = $fileName;
	$SafetyandEmergencyPlanFN = $fileName;
	$InsuranceDocumentsFN = $fileName;
	$PerformerentertainmentAgreementzaFN = $fileName;
	$ParticipantRegistrationFormsFN = $fileName;
	$SponsorshipAgreementFN = $fileName;
	$VendorContactsFN = $fileName;
	$VolunteerAgreementsFN = $fileName;
	$MarketingandPromotionalMaterialsFN = $fileName;
	$EventScheduleandTimelinesFN = $fileName;
	$BudgetandFinancialReportsFN = $fileName;
	$EnvironmentalImpactAssessmentFN = $fileName;
	$PostEventEvalutionReportFN = $fileName;
	$LegalPermitsandLicensesFN = $fileName;
	$OtherDocumentsFN = $fileName;
	
	$PrizeNominationsOne = $_POST['prize_nomination_1'];
	$PrizeNominationsTwo = $_POST['prize_nomination_2'];
	$PrizeNominationsThree = $_POST['prize_nomination_3'];
	$PrizeNominationsFour = $_POST['prize_nomination_4'];
	$PrizeNominationsFive = $_POST['prize_nomination_5'];
	$PrizeNominationsSix = $_POST['prize_nomination_6'];
	$PrizeNominationsSeven = $_POST['prize_nomination_7'];
	$PrizeAmountOne = $_POST['prize_amount-1'];
	$PrizeAmountTwo = $_POST['prize_amount-2'];
	$PrizeAmountThree = $_POST['prize_amount-3'];
	$PrizeAmountFour = $_POST['prize_amount-4'];
	$PrizeAmountFive = $_POST['prize_amount-5'];
	$PrizeAmountSix = $_POST['prize_amount-6'];
	$PrizeAmountSeven = $_POST['prize_amount-7'];
	$RacePayment = 550000.55;
	$BankDetails = $_POST['bank_details'];
	$RaceApprovalforOrganizer = $_POST['race_approval'];
	$SignatureName = $_POST['Signatures_name'];
    $SignatureImage = $fileContent;
	$BookRaceOrganizersAllotedTokenNumber = '123Shiv';
	$RecordDateTime = date('Y-m-d H:i:s');
	$SetDateTime = date('Y-m-d H:i:s');
    
	echo "<p>Values inserted start!</p>";

$sql = "EXEC SaveBookRaceOrganizer @RaceName = ?,
	@RaceAddress = ?,
	@RaceCountry = ?,
	@RaceState = ?,
	@RaceDistirct = ?,
	@RaceTaluka = ?,	
	@RaceLocationLatitude = ?,
	@RaceLocationLongitude = ?,
	@RaceDateandTime = ?,
	@RaceLastAdmissionDateandTime = ?,
	@GramPanchyatAgreement = ?,
	@RacePermissionLetter = ?,
	@RacePermitApplication = ?,
	@RouteMapandCourseCertification = ?,
	@SafetyandEmergencyPlan = ?,
	@InsuranceDocuments = ?,
	@PerformerentertainmentAgreementza = ?,
	@ParticipantRegistrationForms = ?,
	@SponsorshipAgreement = ?,
	@VendorContacts = ?,
	@VolunteerAgreements = ?,
	@MarketingandPromotionalMaterials = ?,
	@EventScheduleandTimelines = ?,
	@BudgetandFinancialReports = ?,
	@EnvironmentalImpactAssessment = ?,
	@PostEventEvalutionReport = ?,
	@LegalPermitsandLicenses = ?,
	@OtherDocuments = ?,
	
	@GramPanchyatAgreementFN = ?,
	@RacePermissionLetterFN = ?,
	@RacePermitApplicationFN = ?,
	@RouteMapandCourseCertificationFN = ?,
	@SafetyandEmergencyPlanFN = ?,
	@InsuranceDocumentsFN = ?,
	@PerformerentertainmentAgreementzaFN = ?,
	@ParticipantRegistrationFormsFN = ?,
	@SponsorshipAgreementFN = ?,
	@VendorContactsFN = ?,
	@VolunteerAgreementsFN = ?,
	@MarketingandPromotionalMaterialsFN = ?,
	@EventScheduleandTimelinesFN = ?,
	@BudgetandFinancialReportsFN = ?,
	@EnvironmentalImpactAssessmentFN = ?,
	@PostEventEvalutionReportFN = ?,
	@LegalPermitsandLicensesFN = ?,
	@OtherDocumentsFN = ?,
	
	@PrizeNominationsOne = ?,
	@PrizeNominationsTwo = ?,
	@PrizeNominationsThree = ?,
	@PrizeNominationsFour = ?,
	@PrizeNominationsFive = ?,
	@PrizeNominationsSix = ?,
	@PrizeNominationsSeven = ?,
	@PrizeAmountOne = ?,
	@PrizeAmountTwo = ?,
	@PrizeAmountThree = ?,
	@PrizeAmountFour = ?,
	@PrizeAmountFive = ?,
	@PrizeAmountSix = ?,
	@PrizeAmountSeven = ?,
	@RacePayment = ?,
	@BankDetails = ?,
	@RaceApprovalforOrganizer = ?,
	@SignatureName = ?,
    @SignatureImage = ?,
	@BookRaceOrganizersAllotedTokenNumber = ?,
	@RecordDateTime = ?,
	@SetDateTime = ? ";


$params = array(array($RaceName, SQLSRV_PARAM_IN),
	array($RaceAddress, SQLSRV_PARAM_IN),
	array($RaceCountry, SQLSRV_PARAM_IN),
	array($RaceState, SQLSRV_PARAM_IN),
	array($RaceDistirct, SQLSRV_PARAM_IN),
	array($RaceTaluka, SQLSRV_PARAM_IN),
	array($RaceLocationLatitude, SQLSRV_PARAM_IN),
	array($RaceLocationLongitude, SQLSRV_PARAM_IN),
	array($RaceDateandTime, SQLSRV_PARAM_IN),
	array($RaceLastAdmissionDateandTime, SQLSRV_PARAM_IN),	
	array($GramPanchyatAgreement, SQLSRV_PARAM_IN),
	array($RacePermissionLetter, SQLSRV_PARAM_IN),
	array($RacePermitApplication, SQLSRV_PARAM_IN),
	array($RouteMapandCourseCertification, SQLSRV_PARAM_IN),
	array($SafetyandEmergencyPlan, SQLSRV_PARAM_IN),
	array($InsuranceDocuments, SQLSRV_PARAM_IN),
	array($PerformerentertainmentAgreementza, SQLSRV_PARAM_IN),
	array($ParticipantRegistrationForms, SQLSRV_PARAM_IN),
	array($SponsorshipAgreement, SQLSRV_PARAM_IN),
	array($VendorContacts, SQLSRV_PARAM_IN),
	array($VolunteerAgreements, SQLSRV_PARAM_IN),
	array($MarketingandPromotionalMaterials, SQLSRV_PARAM_IN),
	array($EventScheduleandTimelines, SQLSRV_PARAM_IN),
	array($BudgetandFinancialReports, SQLSRV_PARAM_IN),
	array($EnvironmentalImpactAssessment, SQLSRV_PARAM_IN),
	array($PostEventEvalutionReport, SQLSRV_PARAM_IN),
	array($LegalPermitsandLicenses, SQLSRV_PARAM_IN),
	array($OtherDocuments, SQLSRV_PARAM_IN),
	
	array($GramPanchyatAgreementFN, SQLSRV_PARAM_IN),
	array($RacePermissionLetterFN, SQLSRV_PARAM_IN),
	array($RacePermitApplicationFN, SQLSRV_PARAM_IN),
	array($RouteMapandCourseCertificationFN, SQLSRV_PARAM_IN),
	array($SafetyandEmergencyPlanFN, SQLSRV_PARAM_IN),
	array($InsuranceDocumentsFN, SQLSRV_PARAM_IN),
	array($PerformerentertainmentAgreementzaFN, SQLSRV_PARAM_IN),
	array($ParticipantRegistrationFormsFN, SQLSRV_PARAM_IN),
	array($SponsorshipAgreementFN, SQLSRV_PARAM_IN),
	array($VendorContactsFN, SQLSRV_PARAM_IN),
	array($VolunteerAgreementsFN, SQLSRV_PARAM_IN),
	array($MarketingandPromotionalMaterialsFN, SQLSRV_PARAM_IN),
	array($EventScheduleandTimelinesFN, SQLSRV_PARAM_IN),
	array($BudgetandFinancialReportsFN, SQLSRV_PARAM_IN),
	array($EnvironmentalImpactAssessmentFN, SQLSRV_PARAM_IN),
	array($PostEventEvalutionReportFN, SQLSRV_PARAM_IN),
	array($LegalPermitsandLicensesFN, SQLSRV_PARAM_IN),
	array($OtherDocumentsFN, SQLSRV_PARAM_IN),
	
	array($PrizeNominationsOne, SQLSRV_PARAM_IN),
	array($PrizeNominationsTwo, SQLSRV_PARAM_IN),
	array($PrizeNominationsThree, SQLSRV_PARAM_IN),
	array($PrizeNominationsFour, SQLSRV_PARAM_IN),
	array($PrizeNominationsFive, SQLSRV_PARAM_IN),
	array($PrizeNominationsSix, SQLSRV_PARAM_IN),
	array($PrizeNominationsSeven, SQLSRV_PARAM_IN),
	array($PrizeAmountOne, SQLSRV_PARAM_IN),
	array($PrizeAmountTwo, SQLSRV_PARAM_IN),
	array($PrizeAmountThree, SQLSRV_PARAM_IN),
	array($PrizeAmountFour, SQLSRV_PARAM_IN),
	array($PrizeAmountFive, SQLSRV_PARAM_IN),
	array($PrizeAmountSix, SQLSRV_PARAM_IN),
	array($PrizeAmountSeven, SQLSRV_PARAM_IN),
	array($RacePayment, SQLSRV_PARAM_IN),
	array($BankDetails, SQLSRV_PARAM_IN),
	array($RaceApprovalforOrganizer, SQLSRV_PARAM_IN),
	array($SignatureName, SQLSRV_PARAM_IN),
    array($SignatureImage, SQLSRV_PARAM_IN),
	array($BookRaceOrganizersAllotedTokenNumber, SQLSRV_PARAM_IN),
	array($RecordDateTime, SQLSRV_PARAM_IN),
	array($SetDateTime, SQLSRV_PARAM_IN));


// Increase the query timeout
$sqlTimeout = 30; // Set the timeout value in seconds
$sqlTimeoutOption = array("QueryTimeout" => $sqlTimeout);
sqlsrv_configure("WarningsReturnAsErrors", 0);
sqlsrv_configure("QueryTimeout", $sqlTimeout);
sqlsrv_configure("StatementPooling", 0);


// Execute the stored procedure
$stmt = sqlsrv_query($conn, $sql, $params, $sqlTimeoutOption);

if ($stmt === false) {
    echo "Error executing the stored procedure: " . sqlsrv_errors();
    exit();
}

echo "File inserted successfully!";

// Close the database connection
sqlsrv_close($conn);

} 
} catch (PDOException $e) {
	sqlsrv_close($conn);
    // Handle the exception
    echo "Error executing the stored procedure: " . $e->getMessage();
}
?>
