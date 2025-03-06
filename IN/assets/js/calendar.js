
// Function to create calendar
function createCalendar(year, month) {
  const calendarDiv = document.getElementById("calendar");
  calendarDiv.innerHTML = '';
  const currentDate = new Date();
  const currentYear = currentDate.getFullYear();
  const currentMonth = currentDate.getMonth();
  const currentDay = currentDate.getDate();  // Added
  const monthNames = ["जनवरी", "फरवरी", "मार्च", "अप्रैल", "मई", "जून",
      "जुलाई", "अगस्त", "सितंबर", "अक्टूबर", "नवंबर", "दिसंबर"];
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const firstDayOfMonth = new Date(year, month, 1).getDay();
  const monthElement = document.createElement("div");
  monthElement.textContent = monthNames[month] + " " + year;
  monthElement.classList.add("month-header");
  calendarDiv.appendChild(monthElement);
  const dayNames = ["रवि", "सोम", "मंगल", "बुध", "गुरु", "शुक्र", "शनि"];
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

// Function to show event form
// function showEventForm(event) {
//   const clickedDay = event.target.getAttribute("data-date");
//   document.getElementById("date-selected").textContent = formatDate(clickedDay);
// }

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
