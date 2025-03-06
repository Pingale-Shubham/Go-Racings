<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Form Data</title>
    <link rel="stylesheet" href="assets/css/participantform.css">
</head>
<body>
    <div class="participant-container">
        <h5>Submitted Race Participants Information</h5>
        <p>Race Name: <?php echo isset($_POST['race_name']) ? $_POST['race_name'] : ''; ?></p>
        <p>Available Race Date and Time: <?php echo isset($_POST['formatted_race_dt_time_1']) ? $_POST['formatted_race_dt_time_1'] : ''; ?></p>
        <p>Race Last Admission Date and Time: <?php echo isset($_POST['formatted_race_dt_time_2']) ? $_POST['formatted_race_dt_time_2'] : ''; ?></p>
        <p>Race Location (Latitude): <?php echo isset($_POST['latitude']) ? $_POST['latitude'] : ''; ?></p>
        <p>Race Location (Longitude): <?php echo isset($_POST['longitude']) ? $_POST['longitude'] : ''; ?></p>
        <p>Unique Code: <?php echo isset($_POST['UserAllotedTokenNumber']) ? $_POST['UserAllotedTokenNumber'] : ''; ?></p>
        <p>Race Participation Payment: <?php echo isset($_POST['ParticipantFeeGST']) ? $_POST['ParticipantFeeGST'] : ''; ?></p>
        <!-- Add more fields as needed -->
    </div>
</body>
</html>
