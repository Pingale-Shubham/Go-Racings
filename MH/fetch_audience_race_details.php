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
    $query = "SELECT * FROM GetAudienceDetails () WHERE RaceName = ? AND BookRaceOrganizersAllotedTokenNumber = ?";
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

        $original_race_dt_time_1 = $row['RaceDateandTime'];        
        // Convert datetime format
        $date1 = new DateTime( $original_race_dt_time_1);
        $formatted_race_dt_time_1 = $date1->format('F j, Y \a\t g:i:s A');

        $latitude = $row['RaceLocationLatitude'];
        $longitude = $row['RaceLocationLongitude'];
        $UserAllotedTokenNumber = $row['BookRaceOrganizersAllotedTokenNumber'];
        $AudienceTicket = $row['AudienceTicket'];
		
        // Output HTML with fetched values
        echo "
           <label for='race_dt_time'>उपलब्ध रेसची तारीख आणि वेळ:</label>
            <input type='text' id='a_race_dt_time' name='a_race_dt_time' value='$original_race_dt_time_1' style='display:none' readonly>
            <input type='text' name='formatted_race_dt_time_1' id='formatted_race_dt_time_1' value='$formatted_race_dt_time_1' style='background-color: lightgray;' readonly>
            
            <label for='race_location'>रेस लोकेशन:</label>
            <label for='race_location'>अक्षांश:</label>
            <input type='text' name='latitude' id='latitude' value='$latitude' style='background-color: lightgray;' readonly>
            <label for='race_location'>रेखांश:</label>
            <input type='text' name='longitude' id='longitude' value='$longitude' style='background-color: lightgray;' readonly>
            <div id=map></div>

            <label for='UserAllotedTokenNumber'>युनिक कोड:</label>
            <input type='text' id='UserAllotedTokenNumber' name='UserAllotedTokenNumber' value='$UserAllotedTokenNumber' style='background-color: lightgray;' readonly>
            <label for='AudienceTicket'>ऑडियन्स तिकिटाची रक्कम: (कर आणि सेवा शुल्क)</label>
            <input type='text' id='AudienceTicketGST' style='background-color: lightgray;' value='$AudienceTicket' name ='AudienceTicketGST' readonly>
        ";
    } else {
        echo json_encode(array('error' => 'No results found for the selected race.'));
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