<?php
include 'gRconn.php';
// Database connection settings
//$serverName = "110.227.185.209";//"localhost";
//$serverName = "SWYOMSOFT\GORACINGS";
//$databaseName = "Race"; $username = "sa"; $password = "Heshavi@123";
// $databaseName = "Race"; $username = "sa"; $password = "gosusat@123";
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
	
	

    if ($_POST['race_name'] === "newone") {
        $RaceName = $_POST['other_race'];
    } else {
        $RaceName = $_POST['race_name'];
    }
	$RaceAddress = $_POST['race_address'];
    $RaceCountry = $_POST['UserCountry']; 
    $RaceState = $_POST['UserState'];
    $RaceDistirct = $_POST['UserDistirct'];
    $RaceTaluka = $_POST['UserTaluka'];
    $RaceLocationLatitude = $_POST['latitude'];
    $RaceLocationLongitude = $_POST['longitude'];
    $RaceDateandTime = $_POST['race_dt_time'];
    $RaceLastAdmissionDateandTime = $_POST['last_race_dt_time'];
	

	$uploadDir = 'DocUploads/'; // Directory to store uploaded files

	//0
	$uploadFile = $uploadDir . basename($_FILES['o_photo_id']['name']);	
    if (move_uploaded_file($_FILES['o_photo_id']['tmp_name'], $uploadFile)) {        
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
	//1
	$uploadFile = $uploadDir . basename($_FILES['gram_panchayat_agreement']['name']);	
    if (move_uploaded_file($_FILES['gram_panchayat_agreement']['tmp_name'], $uploadFile)) {        
        $gramPanchayatAgreement_FilePath = $uploadFile;				
	}
	if (!empty($gramPanchayatAgreement_FilePath)){
		$gramPanchayatAgreement_fileName = basename($gramPanchayatAgreement_FilePath);
		$gramPanchayatAgreement_fileContent = file_get_contents($gramPanchayatAgreement_FilePath);
	}else
	{
		$gramPanchayatAgreement_fileName = "";
		$gramPanchayatAgreement_fileContent = "";
	}
	//2
	$uploadFile = $uploadDir . basename($_FILES['race_permission_letter']['name']);	
    if (move_uploaded_file($_FILES['race_permission_letter']['tmp_name'], $uploadFile)) {        
        $race_permission_letter_FilePath = $uploadFile;				
	}
	if (!empty($race_permission_letter_FilePath)){
		$race_permission_letter_fileName = basename($race_permission_letter_FilePath);
		$race_permission_letter_fileContent = file_get_contents($race_permission_letter_FilePath);
	}else
	{
		$race_permission_letter_fileName = "";
		$race_permission_letter_fileContent = "";

	}
	//3
	$uploadFile = $uploadDir . basename($_FILES['race_permit_application']['name']);	
    if (move_uploaded_file($_FILES['race_permit_application']['tmp_name'], $uploadFile)) {        
        $race_permit_application_FilePath = $uploadFile;				
	}
	if (!empty($race_permit_application_FilePath)){
		$race_permit_application_fileName = basename($race_permit_application_FilePath);
		$race_permit_application_fileContent = file_get_contents($race_permit_application_FilePath);
	}else
	{
		$race_permit_application_fileName = "";
		$race_permit_application_fileContent = "";

	}
	//4
	$uploadFile = $uploadDir . basename($_FILES['route_map_course_certification']['name']);	
    if (move_uploaded_file($_FILES['route_map_course_certification']['tmp_name'], $uploadFile)) {        
        $route_map_course_certification_FilePath = $uploadFile;				
	}
	if (!empty($route_map_course_certification_FilePath)){
		$route_map_course_certification_fileName = basename($route_map_course_certification_FilePath);
		$route_map_course_certification_fileContent = file_get_contents($route_map_course_certification_FilePath);
	}else
	{
		$route_map_course_certification_fileName = "";
		$route_map_course_certification_fileContent = "";
	}
	//5
	$uploadFile = $uploadDir . basename($_FILES['safety_emergency_plan']['name']);	
    if (move_uploaded_file($_FILES['safety_emergency_plan']['tmp_name'], $uploadFile)) {        
        $safety_emergency_plan_FilePath = $uploadFile;				
	}
	if (!empty($safety_emergency_plan_FilePath)){
		$safety_emergency_plan_fileName = basename($safety_emergency_plan_FilePath);
		$safety_emergency_plan_fileContent = file_get_contents($safety_emergency_plan_FilePath);
	}else
	{
		$safety_emergency_plan_fileName = "";
		$safety_emergency_plan_fileContent = "";
	}
	//6
	$uploadFile = $uploadDir . basename($_FILES['insurance_documents']['name']);	
    if (move_uploaded_file($_FILES['insurance_documents']['tmp_name'], $uploadFile)) {        
        $insurance_documents_FilePath = $uploadFile;				
	}
	if (!empty($insurance_documents_FilePath)){
		$insurance_documents_fileName = basename($insurance_documents_FilePath);
		$insurance_documents_fileContent = file_get_contents($insurance_documents_FilePath);
	}else
	{
		$insurance_documents_fileName = "";
		$insurance_documents_fileContent = "";		
	}

	//7
	$uploadFile = $uploadDir . basename($_FILES['PE_Agreements']['name']);	
    if (move_uploaded_file($_FILES['PE_Agreements']['tmp_name'], $uploadFile)) {        
        $PE_Agreements_FilePath = $uploadFile;				
	}
	if (!empty($PE_Agreements_FilePath)){
		$PE_Agreements_fileName = basename($PE_Agreements_FilePath);
		$PE_Agreements_fileContent = file_get_contents($PE_Agreements_FilePath);
	}else
	{
		$PE_Agreements_fileName = "";
		$PE_Agreements_fileContent = "";
	}


	//8
	$uploadFile = $uploadDir . basename($_FILES['Participant_Registration_Forms']['name']);	
    if (move_uploaded_file($_FILES['Participant_Registration_Forms']['tmp_name'], $uploadFile)) {        
        $Participant_Registration_Forms_FilePath = $uploadFile;				
	}
	if (!empty($Participant_Registration_Forms_FilePath)){
		$Participant_Registration_Forms_fileName = basename($Participant_Registration_Forms_FilePath);
		$Participant_Registration_Forms_fileContent = file_get_contents($Participant_Registration_Forms_FilePath);
	}else
	{
		$Participant_Registration_Forms_fileName = "";
		$Participant_Registration_Forms_fileContent = "";
	}


	//9
	$uploadFile = $uploadDir . basename($_FILES['Sponsorship_Agreement']['name']);	
    if (move_uploaded_file($_FILES['Sponsorship_Agreement']['tmp_name'], $uploadFile)) {        
        $Sponsorship_Agreement_FilePath = $uploadFile;				
	}
	if (!empty($Sponsorship_Agreement_FilePath)){
		$Sponsorship_Agreement_fileName = basename($Sponsorship_Agreement_FilePath);
		$Sponsorship_Agreement_fileContent = file_get_contents($Sponsorship_Agreement_FilePath);
	}else
	{
		$Sponsorship_Agreement_fileName = "";
		$Sponsorship_Agreement_fileContent = "";
	}


	//10
	$uploadFile = $uploadDir . basename($_FILES['Vendor_contracts']['name']);	
    if (move_uploaded_file($_FILES['Vendor_contracts']['tmp_name'], $uploadFile)) {        
        $Vendor_contracts_FilePath = $uploadFile;				
	}
	if (!empty($Vendor_contracts_FilePath)){
		$Vendor_contracts_fileName = basename($Vendor_contracts_FilePath);
		$Vendor_contracts_fileContent = file_get_contents($Vendor_contracts_FilePath);
	}
	else
	{
		$Vendor_contracts_fileName = "";
		$Vendor_contracts_fileContent = "";
	}
	//11
	$uploadFile = $uploadDir . basename($_FILES['Volunteer_Agreements']['name']);	
    if (move_uploaded_file($_FILES['Volunteer_Agreements']['tmp_name'], $uploadFile)) {        
        $Volunteer_Agreements_FilePath = $uploadFile;				
	}
	if (!empty($Volunteer_Agreements_FilePath)){
		$Volunteer_Agreements_fileName = basename($Volunteer_Agreements_FilePath);
		$Volunteer_Agreements_fileContent = file_get_contents($Volunteer_Agreements_FilePath);
	}else
	{
		$Volunteer_Agreements_fileName = "";
		$Volunteer_Agreements_fileContent = "";
	}
	
	//12
	$uploadFile = $uploadDir . basename($_FILES['M_P_Materials']['name']);	
    if (move_uploaded_file($_FILES['M_P_Materials']['tmp_name'], $uploadFile)) {        
        $M_P_Materials_FilePath = $uploadFile;				
	}
	if (!empty($M_P_Materials_FilePath)){
		$M_P_Materials_fileName = basename($M_P_Materials_FilePath);
		$M_P_Materials_fileContent = file_get_contents($M_P_Materials_FilePath);
	}else
	{
		$M_P_Materials_fileName = "";
		$M_P_Materials_fileContent = "";
	}
	//13
	$uploadFile = $uploadDir . basename($_FILES['Event_Schedule_Timelines']['name']);	
    if (move_uploaded_file($_FILES['Event_Schedule_Timelines']['tmp_name'], $uploadFile)) {        
        $Event_Schedule_Timelines_FilePath = $uploadFile;				
	}
	if (!empty($Event_Schedule_Timelines_FilePath)){
		$Event_Schedule_Timelines_fileName = basename($Event_Schedule_Timelines_FilePath);
		$Event_Schedule_Timelines_fileContent = file_get_contents($Event_Schedule_Timelines_FilePath);
	}else
	{
		$Event_Schedule_Timelines_fileName = "";
		$Event_Schedule_Timelines_fileContent = "";
	}
	
	//14
	$uploadFile = $uploadDir . basename($_FILES['Budget_Financial_Reports']['name']);	
    if (move_uploaded_file($_FILES['Budget_Financial_Reports']['tmp_name'], $uploadFile)) {        
        $Budget_Financial_Reports_FilePath = $uploadFile;				
	}
	if (!empty($Budget_Financial_Reports_FilePath)){
		$Budget_Financial_Reports_fileName = basename($Budget_Financial_Reports_FilePath);
		$Budget_Financial_Reports_fileContent = file_get_contents($Budget_Financial_Reports_FilePath);
	}else
	{
		$Budget_Financial_Reports_fileName = "";
		$Budget_Financial_Reports_fileContent = "";
	}
	//15
	$uploadFile = $uploadDir . basename($_FILES['Environmental_Impact_Assessment']['name']);	
    if (move_uploaded_file($_FILES['Environmental_Impact_Assessment']['tmp_name'], $uploadFile)) {        
        $Environmental_Impact_Assessment_FilePath = $uploadFile;				
	}
	if (!empty($Environmental_Impact_Assessment_FilePath)){
		$Environmental_Impact_Assessment_fileName = basename($Environmental_Impact_Assessment_FilePath);
		$Environmental_Impact_Assessment_fileContent = file_get_contents($Environmental_Impact_Assessment_FilePath);
	}else
	{
		$Environmental_Impact_Assessment_fileName = "";
		$Environmental_Impact_Assessment_fileContent = "";
	}
	//16
	$uploadFile = $uploadDir . basename($_FILES['PE_Evalution_Report']['name']);	
    if (move_uploaded_file($_FILES['PE_Evalution_Report']['tmp_name'], $uploadFile)) {        
        $PE_Evalution_Report_FilePath = $uploadFile;				
	}
	if (!empty($PE_Evalution_Report_FilePath)){
		$PE_Evalution_Report_fileName = basename($PE_Evalution_Report_FilePath);
		$PE_Evalution_Report_fileContent = file_get_contents($PE_Evalution_Report_FilePath);
	}else
	{
		$PE_Evalution_Report_fileName = "";
		$PE_Evalution_Report_fileContent = "";
	}
	//17
	$uploadFile = $uploadDir . basename($_FILES['Legal_Permits_Licenses']['name']);	
    if (move_uploaded_file($_FILES['Legal_Permits_Licenses']['tmp_name'], $uploadFile)) {        
        $Legal_Permits_Licenses_FilePath = $uploadFile;				
	}
	if (!empty($Legal_Permits_Licenses_FilePath)){
		$Legal_Permits_Licenses_fileName = basename($Legal_Permits_Licenses_FilePath);
		$Legal_Permits_Licenses_fileContent = file_get_contents($Legal_Permits_Licenses_FilePath);
	}else
	{
		$Legal_Permits_Licenses_fileName = "";
		$Legal_Permits_Licenses_fileContent = "";
	}

	//18
	$uploadFile = $uploadDir . basename($_FILES['Other_Documents']['name']);	
    if (move_uploaded_file($_FILES['Other_Documents']['tmp_name'], $uploadFile)) {        
        $Other_Documents_FilePath = $uploadFile;				
	}
	if (!empty($Other_Documents_FilePath)){
		$Other_Documents_fileName = basename($Other_Documents_FilePath);
		$Other_Documents_fileContent = file_get_contents($Other_Documents_FilePath);
	}else
	{
		$Other_Documents_fileName = "";
		$Other_Documents_fileContent = "";
	}
	//$fileContent = $gramPanchayatAgreement_fileContent;
	//$fileName = $gramPanchayatAgreement_fileName;

	
	$GovtIDProof = $govtIDProof_fileContent;
	$GramPanchyatAgreement = $gramPanchayatAgreement_fileContent;
	$RacePermissionLetter = $race_permission_letter_fileContent;
	$RacePermitApplication = $race_permit_application_fileContent;
	$RouteMapandCourseCertification = $route_map_course_certification_fileContent;
	$SafetyandEmergencyPlan = $safety_emergency_plan_fileContent;
	$InsuranceDocuments = $insurance_documents_fileContent;
	$PerformerEntertainmentAgreements = $PE_Agreements_fileContent;
	$ParticipantRegistrationForms = $Participant_Registration_Forms_fileContent;
	$SponsorshipAgreement = $Sponsorship_Agreement_fileContent;
	$VendorContracts = $Vendor_contracts_fileContent;
	$VolunteerAgreements = $Volunteer_Agreements_fileContent;
	$MarketingandPromotionalMaterials = $M_P_Materials_fileContent;
	$EventScheduleandTimelines = $Event_Schedule_Timelines_fileContent;
	$BudgetandFinancialReports = $Budget_Financial_Reports_fileContent;
	$EnvironmentalImpactAssessment = $Environmental_Impact_Assessment_fileContent;
	$PostEventEvalutionReport = $PE_Evalution_Report_fileContent;
	$LegalPermitsandLicenses = $Legal_Permits_Licenses_fileContent;
	$OtherDocuments = $Other_Documents_fileContent;
	
	$GovtIDProofFN = $govtIDProof_fileName;
	$GramPanchyatAgreementFN = $gramPanchayatAgreement_fileName;
	$RacePermissionLetterFN = $race_permission_letter_fileName;
	$RacePermitApplicationFN = $race_permit_application_fileName;
	$RouteMapandCourseCertificationFN = $route_map_course_certification_fileName;
	$SafetyandEmergencyPlanFN = $safety_emergency_plan_fileName;
	$InsuranceDocumentsFN = $insurance_documents_fileName;
	$PerformerEntertainmentAgreementsFN = $PE_Agreements_fileName;
	$ParticipantRegistrationFormsFN = $Participant_Registration_Forms_fileName;
	$SponsorshipAgreementFN = $Sponsorship_Agreement_fileName;
	$VendorContractsFN = $Vendor_contracts_fileName;
	$VolunteerAgreementsFN = $Volunteer_Agreements_fileName;
	$MarketingandPromotionalMaterialsFN = $M_P_Materials_fileName;
	$EventScheduleandTimelinesFN = $Event_Schedule_Timelines_fileName;
	$BudgetandFinancialReportsFN = $Budget_Financial_Reports_fileName;
	$EnvironmentalImpactAssessmentFN = $Environmental_Impact_Assessment_fileName;
	$PostEventEvalutionReportFN = $PE_Evalution_Report_fileName;
	$LegalPermitsandLicensesFN = $Legal_Permits_Licenses_fileName;
	$OtherDocumentsFN = $Other_Documents_fileName;
	
	
	$RacePayment = $_POST['race_payment'];
	$BankDetails = $_POST['bank_details'];	
	$BankAccountNumber = $_POST['accountno'];
	$BankIFSCCode = $_POST['IFSC_code'];
	//echo $_POST['race_approval'];
	//$RaceApprovalforOrganizer = isset($_POST['race_approval']) ? $_POST['race_approval'] : "Not specified";
	$AudienceTicket = isset($_POST['AudienceTicketGST']) ? $_POST['AudienceTicketGST'] : "Not specified";
    $ParticipantFee = isset($_POST['ParticipantFeeGST']) ? $_POST['ParticipantFeeGST'] : "Not specified";    
    $BookRaceOrganizersAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
	$SignatureName = $_POST['Signatures_name'];
	$SignatureImageData = $_POST['signature_image_data'];
	$SignatureImage = file_get_contents($SignatureImageData);
	$BookRaceOrganizersAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
    //$raceApprovalText = ($RaceApprovalforOrganizer == 1) ? "Yes" : "No";
	$RaceApprovalforOrganizer = ($_POST['race_approval'] == 1) ? "Yes" : "No";
    $SignatureImage = file_get_contents($SignatureImageData);

	
   /*
    for ($i = 1; $i <= 7; $i++) {
        if (isset($_POST["prize_nomination_$i"]) && $_POST["prize_nomination_$i"] == 'on') {
            echo "Nomination $i: Checked";
            $prize_amount = $_POST["prize_amount-$i"];
            if (!empty($prize_amount)) {
                echo ", Prize Amount: $prize_amount<br>";
            } else {
                echo "<br>";
            }
        }
    }
	*/
	//1
	if (isset($_POST["prize_nomination_1"]) && $_POST["prize_nomination_1"] == 'on') {
            $PrizeNominationsOne = $_POST['prize_nomination_1'];
            if (!empty($_POST['prize_amount-1'])) {
                $PrizeAmountOne = $_POST['prize_amount-1'];
            }else
			{
				$PrizeAmountOne = "0";
			}
	}else
	{
		$PrizeAmountOne = "0";
		$PrizeNominationsOne = "";
	}
	
	//2
	if (isset($_POST["prize_nomination_2"]) && $_POST["prize_nomination_2"] == 'on') {
            $PrizeNominationsTwo = $_POST['prize_nomination_2'];
            if (!empty($_POST['prize_amount-2'])) {
                $PrizeAmountTwo = $_POST['prize_amount-2'];
            }else
			{
				$PrizeAmountTwo = "0";
			}
	}else
	{
		$PrizeAmountTwo = "0";
		$PrizeNominationsTwo = "";
	}
	
	//3
	if (isset($_POST["prize_nomination_3"]) && $_POST["prize_nomination_3"] == 'on') {
            $PrizeNominationsThree = $_POST['prize_nomination_3'];
            if (!empty($_POST['prize_amount-3'])) {
                $PrizeAmountThree = $_POST['prize_amount-3'];
            }else
			{
				$PrizeAmountThree = "0";
			}
	}else
	{
		$PrizeAmountThree = "0";
		$PrizeNominationsThree = "";
	}
	
	//4
	if (isset($_POST["prize_nomination_4"]) && $_POST["prize_nomination_4"] == 'on') {
            $PrizeNominationsFour = $_POST['prize_nomination_4'];
            if (!empty($_POST['prize_amount-4'])) {
                $PrizeAmountFour = $_POST['prize_amount-4'];
            }else
			{
				$PrizeAmountFour = "0";
			}
	}else
	{
		$PrizeAmountFour = "0";
		$PrizeNominationsFour = "";
	}
	
	//5
	if (isset($_POST["prize_nomination_5"]) && $_POST["prize_nomination_5"] == 'on') {
            $PrizeNominationsFive = $_POST['prize_nomination_5'];
            if (!empty($_POST['prize_amount-5'])) {
                $PrizeAmountFive = $_POST['prize_amount-5'];
            }else
			{
				$PrizeAmountFive = "0";
			}
	}else
	{
		$PrizeAmountFive = "0";
		$PrizeNominationsFive = "";
	}
	
	//6
	if (isset($_POST["prize_nomination_6"]) && $_POST["prize_nomination_6"] == 'on') {
            $PrizeNominationsSix = $_POST['prize_nomination_6'];
            if (!empty($_POST['prize_amount-6'])) {
                $PrizeAmountSix = $_POST['prize_amount-6'];
            }else
			{
				$PrizeAmountSix = "0";
			}
	}else
	{
		$PrizeAmountSix = "0";
		$PrizeNominationsSix = "";
	}
	
	//7
	if (isset($_POST["prize_nomination_7"]) && $_POST["prize_nomination_7"] == 'on') {
            $PrizeNominationsSeven = $_POST['prize_nomination_7'];
            if (!empty($_POST['prize_amount-7'])) {
                $PrizeAmountSeven = $_POST['prize_amount-7'];
            }else
			{
				$PrizeAmountSeven = "0";
			}
	}else
	{
		$PrizeAmountSeven = "0";
		$PrizeNominationsSeven = "";
	}
   

	$RecordDateTime = date('Y-m-d H:i:s');
	$SetDateTime = date('Y-m-d H:i:s');
    
    $RacePermission = "Not Allowed";

	//echo "<p>Values inserted start!</p>";

$sql = "EXEC SaveBookRaceOrganizer 
	@UserEmailID = ?,
	@UserMobileNumber = ?,
    @RaceName = ?,
	@RaceAddress = ?,
	@RaceCountry = ?,
	@RaceState = ?,
	@RaceDistirct = ?,
	@RaceTaluka = ?,	
	@RaceLocationLatitude = ?,
	@RaceLocationLongitude = ?,
	@RaceDateandTime = ?,
	@RaceLastAdmissionDateandTime = ?,
	
	@GovtIDProof = ?,
	@GramPanchyatAgreement = ?,
	@RacePermissionLetter = ?,
	@RacePermitApplication = ?,
	@RouteMapandCourseCertification = ?,
	@SafetyandEmergencyPlan = ?,
	@InsuranceDocuments = ?,
	@PerformerEntertainmentAgreements = ?,
	@ParticipantRegistrationForms = ?,
	@SponsorshipAgreement = ?,
	@VendorContracts = ?,
	@VolunteerAgreements = ?,
	@MarketingandPromotionalMaterials = ?,
	@EventScheduleandTimelines = ?,
	@BudgetandFinancialReports = ?,
	@EnvironmentalImpactAssessment = ?,
	@PostEventEvalutionReport = ?,
	@LegalPermitsandLicenses = ?,
	@OtherDocuments = ?,
	
	@GovtIDProofFN = ?,
	@GramPanchyatAgreementFN = ?,
	@RacePermissionLetterFN = ?,
	@RacePermitApplicationFN = ?,
	@RouteMapandCourseCertificationFN = ?,
	@SafetyandEmergencyPlanFN = ?,
	@InsuranceDocumentsFN = ?,
	@PerformerEntertainmentAgreementsFN = ?,
	@ParticipantRegistrationFormsFN = ?,
	@SponsorshipAgreementFN = ?,
	@VendorContractsFN = ?,
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
	@BankAccountNumber = ?,
	@BankIFSCCode = ?,
	@AudienceTicket = ?,
	@ParticipantFee = ?,
	@RaceApprovalforOrganizer = ?,
	@SignatureName = ?,
    @SignatureImage = ?,
	@BookRaceOrganizersAllotedTokenNumber = ?,
	@RecordDateTime = ?,
	@SetDateTime = ? ,
	@RacePermission = ?";


	$params = array(
	array($UserEmailID, SQLSRV_PARAM_IN),
	array($UserMobileNumber, SQLSRV_PARAM_IN),
	array($RaceName, SQLSRV_PARAM_IN),
	array($RaceAddress, SQLSRV_PARAM_IN),
	array($RaceCountry, SQLSRV_PARAM_IN),
	array($RaceState, SQLSRV_PARAM_IN),
	array($RaceDistirct, SQLSRV_PARAM_IN),
	array($RaceTaluka, SQLSRV_PARAM_IN),
	array($RaceLocationLatitude, SQLSRV_PARAM_IN),
	array($RaceLocationLongitude, SQLSRV_PARAM_IN),
	array($RaceDateandTime, SQLSRV_PARAM_IN),
	array($RaceLastAdmissionDateandTime, SQLSRV_PARAM_IN),
	array($GovtIDProof, SQLSRV_PARAM_IN),	
	array($GramPanchyatAgreement, SQLSRV_PARAM_IN),
	array($RacePermissionLetter, SQLSRV_PARAM_IN),
	array($RacePermitApplication, SQLSRV_PARAM_IN),
	array($RouteMapandCourseCertification, SQLSRV_PARAM_IN),
	array($SafetyandEmergencyPlan, SQLSRV_PARAM_IN),
	array($InsuranceDocuments, SQLSRV_PARAM_IN),
	array($PerformerEntertainmentAgreements, SQLSRV_PARAM_IN),
	array($ParticipantRegistrationForms, SQLSRV_PARAM_IN),
	array($SponsorshipAgreement, SQLSRV_PARAM_IN),
	array($VendorContracts, SQLSRV_PARAM_IN),
	array($VolunteerAgreements, SQLSRV_PARAM_IN),
	array($MarketingandPromotionalMaterials, SQLSRV_PARAM_IN),
	array($EventScheduleandTimelines, SQLSRV_PARAM_IN),
	array($BudgetandFinancialReports, SQLSRV_PARAM_IN),
	array($EnvironmentalImpactAssessment, SQLSRV_PARAM_IN),
	array($PostEventEvalutionReport, SQLSRV_PARAM_IN),
	array($LegalPermitsandLicenses, SQLSRV_PARAM_IN),
	array($OtherDocuments, SQLSRV_PARAM_IN),
	
	array($GovtIDProofFN, SQLSRV_PARAM_IN),
	array($GramPanchyatAgreementFN, SQLSRV_PARAM_IN),
	array($RacePermissionLetterFN, SQLSRV_PARAM_IN),
	array($RacePermitApplicationFN, SQLSRV_PARAM_IN),
	array($RouteMapandCourseCertificationFN, SQLSRV_PARAM_IN),
	array($SafetyandEmergencyPlanFN, SQLSRV_PARAM_IN),
	array($InsuranceDocumentsFN, SQLSRV_PARAM_IN),
	array($PerformerEntertainmentAgreementsFN, SQLSRV_PARAM_IN),
	array($ParticipantRegistrationFormsFN, SQLSRV_PARAM_IN),
	array($SponsorshipAgreementFN, SQLSRV_PARAM_IN),
	array($VendorContractsFN, SQLSRV_PARAM_IN),
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
	array($BankAccountNumber, SQLSRV_PARAM_IN),
	array($BankIFSCCode, SQLSRV_PARAM_IN),
	
	array($AudienceTicket, SQLSRV_PARAM_IN),
	array($ParticipantFee, SQLSRV_PARAM_IN),
	
	array($RaceApprovalforOrganizer, SQLSRV_PARAM_IN),
	array($SignatureName, SQLSRV_PARAM_IN),
    array($SignatureImage, SQLSRV_PARAM_IN),
	array($BookRaceOrganizersAllotedTokenNumber, SQLSRV_PARAM_IN),
	array($RecordDateTime, SQLSRV_PARAM_IN),
	array($SetDateTime, SQLSRV_PARAM_IN),
	array($RacePermission, SQLSRV_PARAM_IN));


// Increase the query timeout
$sqlTimeout = 30; // Set the timeout value in seconds
$sqlTimeoutOption = array("QueryTimeout" => $sqlTimeout);
sqlsrv_configure("WarningsReturnAsErrors", 0);
sqlsrv_configure("QueryTimeout", $sqlTimeout);
sqlsrv_configure("StatementPooling", 0);


// Execute the stored procedure
$stmt = sqlsrv_query($conn, $sql, $params, $sqlTimeoutOption);

if ($stmt === false) {
	
	$errors = sqlsrv_errors(SQLSRV_ERR_ERRORS);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "SQLSTATE: " . $error['SQLSTATE'] . "<br />";
            echo "Code: " . $error['code'] . "<br />";
            echo "Message: " . $error['message'] . "<br />";
        }
    } else {
        echo "An unknown error occurred.<br />";
    }
    echo $stmt."Error executing the stored procedure: " . sqlsrv_errors();
    exit();
}

echo "Data inserted successfully!";

header("Location: profile.php");
        exit();

// Close the database connection
sqlsrv_close($conn);

} 
} catch (PDOException $e) {
	sqlsrv_close($conn);
    // Handle the exception
    echo "Error executing the stored procedure: " . $e->getMessage();
}
?>