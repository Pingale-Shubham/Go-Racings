<?php
// Event Details.php

// Simulated event data
$events = array(
    array("RaceName" => "Race 1", "RaceDateandTime" => "2024-05-08 09:00:00"),
    array("RaceName" => "Race 2", "RaceDateandTime" => "2024-05-08 12:00:00"),
    array("RaceName" => "Race 3", "RaceDateandTime" => "2024-05-09 10:00:00"),
);

// Check if the date-selected parameter is set
if (isset($_POST['date-selected'])) {
    $selectedDate = $_POST['date-selected'];
    
    // Filter events for the selected date
    $filteredEvents = array_filter($events, function($event) use ($selectedDate) {
        return strpos($event['RaceDateandTime'], $selectedDate) === 0;
    });

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode($filteredEvents);
} else {
    // If date-selected parameter is not set, return an empty array
    echo json_encode(array());
}
?>
