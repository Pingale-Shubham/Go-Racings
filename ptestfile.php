<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $serverName = "110.227.185.209";
// 	// $serverName = "SWYOM\GORACINGS";
//     $connectionOptions = array(
//         "Database" => "Race",
//         "Uid" => "sa",
//         "PWD" => "Heshavi@123"
//     );
//     $conn = sqlsrv_connect($serverName, $connectionOptions);
//     if ($conn === false) {
//         die(print_r(sqlsrv_errors(), true));
//     }
//     $SelectedRace = $_POST['raceName'];
//     $RaceDateandTime = $_POST['formatted_race_dt_time_1'];
//     $RaceLastAdmissionDateandTime = $_POST['formatted_race_dt_time_2'];
//     $ParticipentsAllotedTokenNumber = $_POST['UserAllotedTokenNumber'];
//     $RaceParticipentsFee = $_POST['ParticipantFeeGST'];

//     $uploadDir = 'DocUploads/'; // Directory to store uploaded files

// 	//0
// 	$uploadFile = $uploadDir . basename($_FILES['p_photo_id']['name']);	
//     if (move_uploaded_file($_FILES['p_photo_id']['tmp_name'], $uploadFile)) {        
//          $govtIDProof_FilePath = $uploadFile;				
// 	 }
// 	 if (!empty($govtIDProof_FilePath)){
// 	 	$govtIDProof_fileName = basename($govtIDProof_FilePath);
// 	 	$govtIDProof_fileContent = file_get_contents($govtIDProof_FilePath);
// 	 }else
// 	 {
// 	 	$govtIDProof_fileName = "";
// 	 	$govtIDProof_fileContent = "";
// 	 }    
// 	//1
// 	$uploadFile = $uploadDir . basename($_FILES['waiver_liability']['name']);	
//     if (move_uploaded_file($_FILES['waiver_liability']['tmp_name'], $uploadFile)) {        
//         $WaiverofLiability_FilePath = $uploadFile;				
// 	}
// 	if (!empty($WaiverofLiability_FilePath)){
// 		$WaiverofLiability_fileName = basename($WaiverofLiability_FilePath);
// 		$WaiverofLiability_fileContent = file_get_contents($WaiverofLiability_FilePath);
// 	}else
// 	{
//         $WaiverofLiability_fileName = "";
// 		$WaiverofLiability_fileContent = "";
// 	}
// 	//2
// 	$uploadFile = $uploadDir . basename($_FILES['p_medical_clearence_consent']['name']);	
//     if (move_uploaded_file($_FILES['p_medical_clearence_consent']['tmp_name'], $uploadFile)) {        
//         $MedicalClearenceorConsent_FilePath = $uploadFile;				
// 	}
// 	if (!empty($MedicalClearenceorConsent_FilePath)){
// 		$MedicalClearenceorConsent_fileName = basename($MedicalClearenceorConsent_FilePath);
// 		$MedicalClearenceorConsent_fileContent = file_get_contents($MedicalClearenceorConsent_FilePath);
// 	}else
// 	{
// 		$MedicalClearenceorConsent_fileName = "";
// 		$MedicalClearenceorConsent_fileContent = "";

// 	}
// 	//3
// 	$uploadFile = $uploadDir . basename($_FILES['p_proof_entry_fee']['name']);	
//     if (move_uploaded_file($_FILES['p_proof_entry_fee']['tmp_name'], $uploadFile)) {        
//         $LegalProofofEntryFeePayment_FilePath = $uploadFile;				
// 	}
// 	if (!empty($LegalProofofEntryFeePayment_FilePath)){
// 		$LegalProofofEntryFeePayment_fileName = basename($LegalProofofEntryFeePayment_FilePath);
// 		$LegalProofofEntryFeePayment_fileContent = file_get_contents($LegalProofofEntryFeePayment_FilePath);
// 	}else
// 	{
// 		$LegalProofofEntryFeePayment_fileName = "";
// 		$LegalProofofEntryFeePayment_fileContent = "";

// 	}
// 	//4
// 	$uploadFile = $uploadDir . basename($_FILES['p_T_G_Registration']['name']);	
//     if (move_uploaded_file($_FILES['p_T_G_Registration']['tmp_name'], $uploadFile)) {        
//         $TeamorGroupRegistrationDetailsUniqueCode_FilePath = $uploadFile;				
// 	}
// 	if (!empty($TeamorGroupRegistrationDetailsUniqueCode_FilePath)){
// 		$TeamorGroupRegistrationDetailsUniqueCode_fileName = basename($TeamorGroupRegistrationDetailsUniqueCode_FilePath);
// 		$TeamorGroupRegistrationDetailsUniqueCode_fileContent = file_get_contents($TeamorGroupRegistrationDetailsUniqueCode_FilePath);
// 	}else
// 	{
// 		$TeamorGroupRegistrationDetailsUniqueCode_fileName = "";
// 		$TeamorGroupRegistrationDetailsUniqueCode_fileContent = "";
// 	}
// 	//5
// 	$uploadFile = $uploadDir . basename($_FILES['p_C_D_Approval']['name']);	
//     if (move_uploaded_file($_FILES['p_C_D_Approval']['tmp_name'], $uploadFile)) {        
//         $CostumeorDressCodeApproval_FilePath = $uploadFile;				
// 	}
// 	if (!empty($CostumeorDressCodeApproval_FilePath)){
// 		$CostumeorDressCodeApproval_fileName = basename($CostumeorDressCodeApproval_FilePath);
// 		$CostumeorDressCodeApproval_fileContent = file_get_contents($CostumeorDressCodeApproval_FilePath);
// 	}else
// 	{
// 		$CostumeorDressCodeApproval_fileName = "";
// 		$CostumeorDressCodeApproval_fileContent = "";
// 	}
// 	//6
// 	$uploadFile = $uploadDir . basename($_FILES['p_Other_Documents']['name']);	
//     if (move_uploaded_file($_FILES['p_Other_Documents']['tmp_name'], $uploadFile)) {        
//         $OtherDocuments_FilePath = $uploadFile;				
// 	}
// 	if (!empty($OtherDocuments_FilePath)){
// 		$OtherDocuments_fileName = basename($OtherDocuments_FilePath);
// 		$OtherDocuments_fileContent = file_get_contents($OtherDocuments_FilePath);
// 	}else
// 	{
// 		$OtherDocuments_fileName = "";
// 		$OtherDocuments_fileContent = "";		
// 	}

//     $GovtIDProof = $govtIDProof_fileContent;
//     $WaiverofLiability = $WaiverofLiability_fileContent;
//     $MedicalClearenceorConsent = $MedicalClearenceorConsent_fileContent;
//     $LegalProofofEntryFeePayment = $LegalProofofEntryFeePayment_fileContent;
//     $TeamorGroupRegistrationDetailsUniqueCode = $TeamorGroupRegistrationDetailsUniqueCode_fileContent;
//     $CostumeorDressCodeApproval = $CostumeorDressCodeApproval_fileContent;
//     $OtherDocuments = $OtherDocuments_fileName;
    
//     $GovtIDProofFN = $govtIDProof_fileName;
//     $WaiverofLiabilityFN = $WaiverofLiability_fileName;
//     $MedicalClearenceorConsentFN = $MedicalClearenceorConsent_fileName;
//     $LegalProofofEntryFeePaymentFN = $LegalProofofEntryFeePayment_fileName;
//     $TeamorGroupRegistrationDetailsUniqueCodeFN = $TeamorGroupRegistrationDetailsUniqueCode_fileName;
//     $CostumeorDressCodeApprovalFN = $CostumeorDressCodeApproval_fileName;
//     $OtherDocumentsFN = $OtherDocuments_fileName;

//     $BankDetails = $_POST['bank_details'];
//     $BankAccountNumber = $_POST['p_accountno'];
//     $BankIFSCCode = $_POST['p_IFSC_code'];
//     $RaceApprovalforParticipent = isset($_POST['p_race_approval']) ? $_POST['p_race_approval'] : "Not specified";
 
    
//     // Determine race approval text
//     $praceApprovalText = ($RaceApprovalforParticipent == 1) ? "Yes" : "No";
//     echo "Race Name: $SelectedRace<br>";
//     echo "Race Date and Time: $RaceDateandTime<br>";
//     echo "Race Last Admission Date and Time: $RaceLastAdmissionDateandTime<br>";
//     echo "Participents Alloted Token Number: $ParticipentsAllotedTokenNumber<br>";
//     echo "Participents Fee: $RaceParticipentsFee<br>";

//     echo "Govt ID Proof File Name: $govtIDProof_fileName<br>";
// // echo "Govt ID Proof File Content: $govtIDProof_fileContent<br>";

// echo "Waiver of Liability File Name: $WaiverofLiability_fileName<br>";
// // echo "Waiver of Liability File Content: $WaiverofLiability_fileContent<br>";

// echo "Medical Clearence or Consent File Name: $MedicalClearenceorConsent_fileName<br>";
// // echo "Medical Clearence or Consent File Content: $MedicalClearenceorConsent_fileContent<br>";

// echo "Legal Proof of Entry Fee Payment File Name: $LegalProofofEntryFeePayment_fileName<br>";
// // echo "Legal Proof of Entry Fee Payment File Content: $LegalProofofEntryFeePayment_fileContent<br>";

// echo "Team or Group Registration Details Unique Code File Name: $TeamorGroupRegistrationDetailsUniqueCode_fileName<br>";
// // echo "Team or Group Registration Details Unique Code File Content: $TeamorGroupRegistrationDetailsUniqueCode_fileContent<br>";

// echo "Costume or Dress Code Approval File Name: $CostumeorDressCodeApproval_fileName<br>";
// // echo "Costume or Dress Code Approval File Content: $CostumeorDressCodeApproval_fileContent<br>";

// echo "Other Documents File Name: $OtherDocuments_fileName<br>";
// // echo "Other Documents File Content: $OtherDocuments_fileContent<br>";

//     echo "Bank Details: $BankDetails<br>";
//     echo "Bank Account Number: $BankAccountNumber<br>";
//     echo "Bank IFSC Code: $BankIFSCCode<br>";
//     echo "Race Approval for Organizer: $praceApprovalText<br>";

//     // Close connection
//     sqlsrv_close($conn);
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>GoRacings - Speed to win</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="assets/css/participantform.css">

</head>
<body>
    <!-- participant form start -->
    <div class="participant-container">
        <h5>Race Participants Application Form</h5>
        <form action="bookparticipant.php" method="post" enctype="multipart/form-data">

        <label for="race_name" id="race_name">Choose Available Race to Take Participate:</label>
    <select id="raceName" name="raceName" placeholder="Choose Available Race">
        <?php
		$serverName = "110.227.185.209";//"your_server_name";
		// $serverName = "SWYOM\GORACINGS";//"your_server_name";
		$connectionOptions = array(
		"Database" => "Race",
		"Uid" => "sa",
		"PWD" => "Heshavi@123"
		);

// Establishes the connection
		$conn = sqlsrv_connect($serverName, $connectionOptions);
        // Assuming $conn is your SQL Server connection
        // echo "<option value="">Choose available race</option>";
        echo "<option value='' disabled selected>Choose Available Race</option>";
        $query = "SELECT RaceName, BookRaceOrganizersAllotedTokenNumber FROM GetParticipantsDetails()";
        $result = sqlsrv_query($conn, $query);
        while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
            // echo "<option value='Choose Available Race'>Choose Available Race</option>";
            
            //echo "<option value='" . $row['RaceName'] . "'>" . $row['RaceName'] . "</option>";
			echo "<option value='" . $row['RaceName'] . "' data-token='" . $row['BookRaceOrganizersAllotedTokenNumber'] . "'>" . $row['RaceName'] . "</option>";
        }
        ?>
    </select>

    <div id="raceDetails">
        <!-- Display fetched details here -->
    </div>
            <label for="documents">Documents:</label>

            <label for="p_photo_id">1. Photo Id Proof - "Aadhar Card, Driving License, Pan Card"</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_photo_id')">
            <span id="p_photo_id_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_photo_id" name="p_photo_id">

            <label for="waiver_liability">2. Waiver of Liability</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('waiver_liability')">
            <span id="waiver_liability_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="waiver_liability" name="waiver_liability">

            <label for="p_medical_clearence_consent">3. Medical Clearence or Consent</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_medical_clearence_consent')">
            <span id="p_medical_clearence_consent_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_medical_clearence_consent" name="p_medical_clearence_consent">

            <label for="p_proof_entry_fee">4. Legal Proof of Entry Fee Payment</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_proof_entry_fee')">
            <span id="p_proof_entry_fee_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_proof_entry_fee" name="p_proof_entry_fee">

            <label for="p_T_G_Registration">5. Team or Group Registration Details- "Combine or Add Token Details (Unique Code)"</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_T_G_Registration')">
            <span id="p_T_G_Registration_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_T_G_Registration" name="p_T_G_Registration">

            <label for="p_C_D_Approval">6. Costume or Dress Code Approval (if applicable)</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_C_D_Approval')">
            <span id="p_C_D_Approval_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_C_D_Approval" name="p_C_D_Approval">

            <label for="p_Other_Documents">7. Other Documents</label>
            <input type="button" class="purple-button" value="Select File" onclick="triggerFileInput('p_Other_Documents')">
            <span id="p_Other_Documents_path"></span>
            <input type="file" class="fileInput" style="display: none;" id="p_Other_Documents" name="p_Other_Documents">

            <label for="bank_details">Bank Details - For Prize Payment:</label>
			
			<label for="bank_details">Bank Details:</label>
            <input type="text" id="bank_details" name="bank_details" placeholder="Enter your Bank Name">

            <label for="p_accountno">Bank Account Number:</label>
            <input type="text" id="p_accountno" name="p_accountno">

            <label for="p_IFSC_code">Bank IFSC Code:</label>
            <input type="text" id="p_IFSC_code" name="p_IFSC_code">

            <label for="p_race_approval">Participant Approval from site and Organizer:</label>
            <div>
        <input type="range" min="0" max="1" value="0" step="1" class="slider" id="myRange" name="p_race_approval">
        <div id="result">Selected option: Not sending for approval</div>
    </div>

            <button type="submit">Participate In The Race</button>
        </form>
    </div>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        const slider = document.getElementById('myRange');
        const result = document.getElementById('result');
        slider.addEventListener('input', function () {
            const value = parseInt(this.value);
            const text = value === 1 ? 'Sending for approval' : 'Not sending for approval';
            result.textContent = `Selected option: ${text}`;
        });

        $(document).ready(function(){
            $('#raceName').change(function(){
                var raceName = $(this).val();
				var tokenNumber = $('#raceName option:selected').data('token');
                $.ajax({
                    url: 'fetch_race_details.php',
                    method: 'POST',
                    data: { raceName: raceName, tokenNumber: tokenNumber },
                    success: function(response){
                        $('#raceDetails').html(response);
                    }
                });
            });
        });

        var map = L.map('map').setView([17.6608, 74.0214], 2); // Default view at (0, 0) with zoom level 2
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
        }).addTo(map);

        var marker = L.marker([17.6608, 74.0214]).addTo(map);

        map.on('click', function (e) {
            marker.setLatLng(e.latlng);
            document.getElementById('latitude').value = e.latlng.lat;
            document.getElementById('longitude').value = e.latlng.lng;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="assets/js/participantform.js"></script>
    <!-- participant form end -->
</body>
</html>
