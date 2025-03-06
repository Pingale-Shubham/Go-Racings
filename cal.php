
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Calendar</title>
    <link rel="stylesheet" href="assets/css/calender.css">
</head>
<body>
<div class="calendar-contain">
    <div class="calendar-titlebar">
        <div class="calendar-Heading">
            Race Calendar
        </div>
        <div class="calendar-controls">
            <label for="select-year">Year:</label>
            <select id="select-year" onchange="changeCalendar()"></select>
            <label for="select-month">Month:</label>
            <select id="select-month" onchange="changeCalendar()">
                <option value="0">January</option>
                <option value="1">February</option>
                <option value="2">March</option>
                <option value="3">April</option>
                <option value="4">May</option>
                <option value="5">June</option>
                <option value="6">July</option>
                <option value="7">August</option>
                <option value="8">September</option>
                <option value="9">October</option>
                <option value="10">November</option>
                <option value="11">December</option>
            </select>
            <div class="calendar-navigation">
                <span><img class="icon icons8-Up" onclick="prevMonth()" width="16px" height="16px"
                           src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAAxklEQVRYR+3VwQ2DMAyF4Z8NOkI36AodpZ2sjMAoHaWdoJWlIEXI4RHnwMWROAH2ZxuSiZPXdHJ+EjDagUcZ4Rwd5QjAkr9K4icQQkQBdfK1+BAiAvCShxG9gG3b6xGExtED8Gb+K6VbnNA3cRTQCl4DzNKNOALYC7oFdCMUQFXkAboQCvAGbkDrF2sBasQXuAIfb7NSgAtwB5bGTrcHWBFWhF3uUgC1wyqAen/4NExAdiA7kB3IDmQH5GGjHhg9DVV8eT8Bf2HqNiEP+isaAAAAAElFTkSuQmCC"></span>
                <span><img class="icon icons8-Down" onclick="nextMonth()" width="16px" height="16px"
                           src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAA4UlEQVRYR+2WgQnCMBBFXzdwBSdwBUfRyXQER3EUN1AOEgnxLrkkhYCkUFpI7/+Xf1fajcnHNtmfBTCawDu0sFunuzAYL4CVwEpgJbAS+P8EDsAZeBj/DbUELsAznKpE7WMkxSfgCtwVhRKAmN+AF3AM1x+JGkAUkUINwgKo1X1BagDyYElMA3Cbi7gHoASRAzSZtwBYEClAs3krgAYhQxbnI73XBrbrLdCK0p3m69bbYv79e2cgF9Agms17WpCCdPU830lvAlFHIORw93xvALO33oXRBLw+uw/hsHEUmJ7ABzErNiGyzfJcAAAAAElFTkSuQmCC"></span>
            </div>
        </div>
    </div>
    <div class="calendar-event-dates">
        <div id="sidebar">
            <div class="calendar-date">
                <span id="date-selected"></span>
            </div>
            <h6>Events</h6>
            <div id="event-list"></div>
        </div>
        <div id="main">
            <div id="calendar"></div>
        </div>

    </div>
</div>
<!-- ***** Calendar Area End ***** -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function createCalendar(year, month) {
  const calendarDiv = document.getElementById("calendar");
  calendarDiv.innerHTML = '';
  const currentDate = new Date();
  const currentYear = currentDate.getFullYear();
  const currentMonth = currentDate.getMonth();
  const currentDay = currentDate.getDate();  // Added
  const monthNames = ["January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"];
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDayOfMonth = new Date(year, month, 1).getDay();
  const monthElement = document.createElement("div");
  monthElement.textContent = monthNames[month] + " " + year;
  monthElement.classList.add("month-header");
  calendarDiv.appendChild(monthElement);
  const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
  for (let i = 0; i < 7; i++) {
      const dayElement = document.createElement("div");
      dayElement.textContent = dayNames[i];
      calendarDiv.appendChild(dayElement);
  }
  for (let i = 0; i < firstDayOfMonth; i++) {
      const emptyDayElement = document.createElement("div");
      calendarDiv.appendChild(emptyDayElement);
  }
  for (let day = 1; day <= daysInMonth; day++) {
      const dayElement = document.createElement("div");
      dayElement.textContent = day;
      dayElement.classList.add("calendar-day");
      dayElement.setAttribute("data-date", `${year}-${month + 1}-${day}`);
      if (year === currentYear && month === currentMonth && day === currentDay) { // Added
          dayElement.classList.add("current-day"); // Added
          document.getElementById("date-selected").textContent = formatDate(`${year}-${month + 1}-${day}`); // Added
      } // Added
      dayElement.addEventListener("click", showEventForm);
      calendarDiv.appendChild(dayElement);
  }
}

// Function to format date
function formatDate(date) {
  const options = { year: 'numeric', month: 'long', day: 'numeric' };
  return new Date(date).toLocaleDateString('en-US', options);
}

function showEventForm(event) {
  const clickedDay = event.target.getAttribute("data-date");
  document.getElementById("date-selected").textContent = formatDate(clickedDay);
    
  const selectedDayElement = document.querySelector(".calendar-day.selected-day");
    if (selectedDayElement) {
        selectedDayElement.classList.remove("selected-day");
    }

    // Add the "selected-day" class to the clicked day
    event.target.classList.add("selected-day");
    
  fetchEventData(clickedDay);
}

function fetchEventData(selectedDate) {
    // Make an AJAX request to your PHP script passing the selected date
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Handle the response, assuming it contains HTML data
                document.getElementById("event-list").innerHTML = xhr.responseText;
            } else {
                // Handle errors
                console.error('Error:', xhr.status, xhr.statusText);
            }
        }
    };
    xhr.open('GET', 'Event Details.php?date-selected=' + selectedDate, true);
    xhr.send();
}
 
// Function to navigate to the previous month
function prevMonth() {
  const selectedYear = parseInt(document.getElementById("select-year").value);
  const selectedMonth = parseInt(document.getElementById("select-month").value);
  let prevYear = selectedYear;
  let prevMonth = selectedMonth - 1;
  if (prevMonth < 0) {
      prevYear--;
      prevMonth = 11; // December
  }
  document.getElementById("select-year").value = prevYear;
  document.getElementById("select-month").value = prevMonth;
  createCalendar(prevYear, prevMonth);
}

// Function to navigate to the next month
function nextMonth() {
  const selectedYear = parseInt(document.getElementById("select-year").value);
  const selectedMonth = parseInt(document.getElementById("select-month").value);
  let nextYear = selectedYear;
  let nextMonth = selectedMonth + 1;
  if (nextMonth > 11) {
      nextYear++;
      nextMonth = 0; // January
  }
  document.getElementById("select-year").value = nextYear;
  document.getElementById("select-month").value = nextMonth;
  createCalendar(nextYear, nextMonth);
}

// Function to populate year dropdown
function populateYearDropdown() {
  const selectYear = document.getElementById("select-year");
  const currentYear = new Date().getFullYear();
  const startYear = currentYear - 15;
  const endYear = currentYear + 15;
  for (let year = startYear; year <= endYear; year++) {
      const option = document.createElement("option");
      option.value = year;
      option.textContent = year;
      selectYear.appendChild(option);
  }
  selectYear.value = currentYear;
  const selectMonth = document.getElementById("select-month");
  const currentMonth = new Date().getMonth();
  selectMonth.value = currentMonth;
}

// Function to change calendar
function changeCalendar() {
  const selectedYear = parseInt(document.getElementById("select-year").value);
  const selectedMonth = parseInt(document.getElementById("select-month").value);
  createCalendar(selectedYear, selectedMonth);
}

// Initialization
const currentDate = new Date();
populateYearDropdown();
createCalendar(currentDate.getFullYear(), currentDate.getMonth());

</script>

</body>
</html>
