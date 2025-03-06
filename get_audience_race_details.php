<?php

include 'gRconnection.php';
// // Database connection parameters
// $serverName = "110.227.185.209";
// // $serverName = "SWYOM\GORACINGS";
// $connectionOptions = array(
//     "Database" => "Race",
//     "Uid" => "sa",
//     "PWD" => "Heshavi@123"
// );

// // Attempt to establish a connection to the database
// $conn = sqlsrv_connect($serverName, $connectionOptions);

// Check if the connection was successful
if ($conn === false) {
    // If connection fails, return an error message
    echo json_encode(array("error" => "Database connection failed."));
    exit;
}

// SQL query to fetch race details using the GetParticipantsDetails() function
$query = "SELECT * FROM GetAudienceDetails()";

// Execute the query
$result = sqlsrv_query($conn, $query);

// Check if the query execution was successful
if ($result === false) {
    // If query execution fails, return an error message
    echo json_encode(array("error" => "Failed to fetch race details."));
    exit;
}

// Initialize an array to store the fetched race details
$raceDetails = array();

// Fetch each row of the result set
while ($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
    // Append each row to the $raceDetails array
    $raceDetails[] = $row;
}

// Close the database connection
sqlsrv_close($conn);

// Return the fetched race details as JSON
echo json_encode($raceDetails);
