<?php


$serverName = "110.227.185.209";
$connectionOptions = array(
    "Database" => "Race",
    "Uid" => "sa",
    "PWD" => "Heshavi@123"
);

// Establish connection
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// Check connection
// if ($conn === false) {
    // echo json_encode(array('error' => 'Connection failed.'));
    // exit(); // Terminate script execution
// }

// Check if race date is set
// if (isset($_POST['date-selected'])) { // Kept as 'date-selected' to match with JavaScript
//     $selectedDate = $_POST['date-selected'];
//     echo $selectedDate;
// }
    // $timestamp = time();

// Convert timestamp to desired date format with time
// $dateWithTime = date('Y-m-d H:i:s', $timestamp);

// echo $dateWithTime;


    // $selectedDate =  CONVERT(DATE, RaceDateandTime);
    // May 26, 2024 at 4:53:00 PM
    // $timestamp = time();

    // // Convert timestamp to desired date format with time
    // $dateWithTime = date('Y-m-d H:i:s', $timestamp);
    
    // echo $dateWithTime;
    // Prepare query to fetch race names for the selected date
    // $query = "SELECT RaceName FROM GetParticipantsDetails() WHERE CONVERT(DATE, RaceDateandTime) = ?";
    // $params = array($selectedDate);
    
    // Execute query
    // $result = sqlsrv_query($conn, $query, $params);

    // if ($result === false) {
    //     echo json_encode(array('error' => 'Error executing query: ' . sqlsrv_errors()));
    //     sqlsrv_close($conn);
    //     exit(); // Terminate script execution
    // }

    // // Check if there are rows returned
    // if (sqlsrv_has_rows($result)) {
    //     $raceNames = array();

    //     // Fetch race names
    //     while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    //         $raceNames[] = $row['RaceName'];
    //     }

    //     // Output race names as JSON
    //     echo json_encode(array('raceNames' => $raceNames));
    // } else {
    //     echo json_encode(array('error' => 'No races found for the selected date.'));
    // }
    
    // Free result and close connection
    // sqlsrv_free_stmt($result);
    // sqlsrv_close($conn);
// } else {
//     echo json_encode(array('error' => 'No date selected.'));
// }
?>
