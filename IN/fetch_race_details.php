<?php

include 'gRconn.php';
// //$serverName = "110.227.185.209";
// $serverName = "SWYOM\GORACINGS";
// $connectionOptions = array(
//     "Database" => "Race",
//     "Uid" => "sa",
//     "PWD" => "Heshavi@123"
// );

// // Establishes the connection
// $conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    echo json_encode(array('error' => 'Connection failed.'));
    exit(); // Terminate script execution
}

if (isset($_POST['raceName']) AND isset($_POST['tokenNumber'])) {
    $raceName = $_POST['raceName'];
	$uniqueCode = $_POST['tokenNumber'];
    $query = "SELECT * FROM GetParticipantsDetails() WHERE RaceName = ? AND BookRaceOrganizersAllotedTokenNumber = ?";
    $params = array($raceName, $uniqueCode);
    $result = sqlsrv_query($conn, $query, $params);

    if ($result === false) {
        echo json_encode(array('error' => 'Error executing query.'));
        sqlsrv_close($conn);
        exit(); // Terminate script execution
    }

    // Fetch the first row
    $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

    // Check if row is fetched successfully
    if ($row !== false) {
        // $formatted_race_dt_time_1 = $row['RaceDateandTime'];
        // $formatted_race_dt_time_2 = $row['RaceLastAdmissionDateandTime'];

        $original_race_dt_time_1 = $row['RaceDateandTime'];
        $original_race_dt_time_2 = $row['RaceLastAdmissionDateandTime'];
        
        // Convert datetime format
        $date1 = new DateTime( $original_race_dt_time_1);
        $formatted_race_dt_time_1 = $date1->format('F j, Y \a\t g:i:s A');
 
        $date2 = new DateTime( $original_race_dt_time_2);
        $formatted_race_dt_time_2 = $date2->format('F j, Y \a\t g:i:s A');

        $latitude = $row['RaceLocationLatitude'];
        $longitude = $row['RaceLocationLongitude'];
        $UserAllotedTokenNumber = $row['BookRaceOrganizersAllotedTokenNumber'];
        $ParticipantFeeGST = $row['ParticipantFee'];
        
		$PrizeAmountOne = $row['PrizeAmountOne'];
		$PrizeAmountTwo = $row['PrizeAmountTwo'];
		$PrizeAmountThree = $row['PrizeAmountThree'];
		$PrizeAmountFour = $row['PrizeAmountFour'];
		$PrizeAmountFive = $row['PrizeAmountFive'];
		$PrizeAmountSix = $row['PrizeAmountSix'];
		$PrizeAmountSeven = $row['PrizeAmountSeven'];
		
        // Output HTML with fetched values
        echo "
            <label for='race_dt_time'>उपलब्ध रेस तिथि और समय:</label>
            <input type='text' id='p_race_dt_time' name='p_race_dt_time' value='$original_race_dt_time_1' style='display:none' readonly>
            <input type='text' name='formatted_race_dt_time_1' id='formatted_race_dt_time_1' value='$formatted_race_dt_time_1' style='background-color: lightgray;' readonly>
            
            <label for='last_race_dt_time'>रेस अंतिम प्रवेश तिथि और समय:</label>
            <input type='text' id='p_last_race_dt_time' name='p_last_race_dt_time' value='$original_race_dt_time_2' style='display:none' readonly>
            <input type='text' id='formatted_race_dt_time_2' name='formatted_race_dt_time_2' value='$formatted_race_dt_time_2' style='background-color: lightgray;' readonly>
    
            <label for='race_location'>रेस स्थान:</label>
            <label for='race_location'>अक्षांश:</label>
            <input type='text' name='latitude' id='latitude' value='$latitude' style='background-color: lightgray;' readonly>
            <label for='race_location'>देशांतर:</label>
            <input type='text' name='longitude' id='longitude' value='$longitude' style='background-color: lightgray;' readonly>
            <div id=map></div>
            <label for='UserAllotedTokenNumber'>युनिक कोड:</label>
            <input type='text' id='UserAllotedTokenNumber' name='UserAllotedTokenNumber' value='$UserAllotedTokenNumber' style='background-color: lightgray;' readonly>
            <label for='race_prizes'>रेस पुरस्कार:</label>
			";
			
			if ($PrizeAmountOne != 0) {
                echo "					
                    पहला पुरस्कार: <input type='text' name='PrizeOne' id='PrizeOne' value='$PrizeAmountOne' style='background-color: lightgray;' readonly>
                ";
            }
            
            if ($PrizeAmountTwo != 0) {
                echo "
                    दूसरा पुरस्कार: <input type='text' name='PrizeTwo' id='PrizeTwo' value='$PrizeAmountTwo' style='background-color: lightgray;' readonly>
                ";
            }
            
            if ($PrizeAmountThree != 0) {
                echo "
                    तीसरा पुरस्कार: <input type='text' name='PrizeThree' id='PrizeThree' value='$PrizeAmountThree' style='background-color: lightgray;' readonly>
                ";
            }
            
            if ($PrizeAmountFour != 0) {
                echo "
                    चौथा पुरस्कार: <input type='text' name='PrizeFour' id='PrizeFour' value='$PrizeAmountFour' style='background-color: lightgray;' readonly>
                ";
            }
            
            if ($PrizeAmountFive != 0) {
                echo "
                    पांचवा पुरस्कार: <input type='text' name='PrizeFive' id='PrizeFive' value='$PrizeAmountFive' style='background-color: lightgray;' readonly>
                ";
            }
            
            if ($PrizeAmountSix != 0) {
                echo "
                    छठा पुरस्कार: <input type='text' name='PrizeSix' id='PrizeSix' value='$PrizeAmountSix' style='background-color: lightgray;' readonly>			
                ";
            }
            
            if ($PrizeAmountSeven != 0) {
                echo "
                    सातवां पुरस्कार: <input type='text' name='PrizeSeven' id='PrizeSeven' value='$PrizeAmountSeven' style='background-color: lightgray;' readonly>
                ";
            }
			echo "
            <label for='p_racepayment'>रेस सहभागिता भुगतान: (TAX & सेवा शुल्क)</label>
            <input type='text' value='$ParticipantFeeGST' id='ParticipantFeeGST' style='background-color: lightgray;' name='ParticipantFeeGST' readonly>
            ";
        } else {
            echo json_encode(array('error' => 'चयनित रेस के लिए कोई परिणाम नहीं मिला।'));
        }

    // Free result and close connection
    sqlsrv_free_stmt($result);
    sqlsrv_close($conn);
} else {
    echo json_encode(array('error' => 'No race selected.'));
}
?>

<script>
    var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 15); // Set view based on PHP values
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    var marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map);
</script>