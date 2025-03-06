
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar Date Picker</title>
</head>
<body>
    <label for="calendar">Select Date:</label>
    <input type="date" id="calendar" >
    <button onclick="fetchEventData()">Fetch Event Data</button>

    <div id="eventData"></div>

    <script>
        function fetchEventData() {
            // Get the selected date from the calendar input
            var selectedDate = document.getElementById('calendar').value;

            // Make sure a date is selected
            if (selectedDate === '') {
                alert('Please select a date.');
                return;
            }

            // Make an AJAX request to your PHP script passing the selected date
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Handle the response, assuming it contains HTML data
                        document.getElementById('eventData').innerHTML = xhr.responseText;
                    } else {
                        // Handle errors
                        console.error('Error:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.open('GET', 'Event Details.php?date-selected=' + selectedDate, true);
            xhr.send();
        }
    </script>
</body>
</html>
