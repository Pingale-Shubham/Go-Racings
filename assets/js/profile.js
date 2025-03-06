document.addEventListener('DOMContentLoaded', function() {
  const tabs = document.querySelectorAll('.tab-link');
  tabs.forEach(tab => {
    tab.addEventListener('click', function (e) {
      e.preventDefault();
      const target = this.getAttribute('href');

      // Remove active class from all tab links
      tabs.forEach(tab => {
        tab.classList.remove('active');
      });

      // Add active class to clicked tab
      this.classList.add('active');

      // Remove active class from all tab contents
      document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('tab-content-active');
      });

      // Add active class to target tab content
      document.querySelector(target).classList.add('tab-content-active');
    });
  });

  // Details functionality
  const details = document.getElementById("editDetails");
  const closeBtn = document.querySelector(".close");
  const saveBtn = document.getElementById("saveChanges");

  document.querySelectorAll('.edit-btn').forEach(button => {
    button.addEventListener('click', function () {
      // Open the Details
      details.style.display = "block";

      // Pre-fill the form with current data
      const row = this.closest('tr');
      document.getElementById('raceName').value = row.cells[1].innerText;
      document.getElementById('raceLatitude').value = row.cells[2].innerText;
      document.getElementById('raceLongitude').value = row.cells[3].innerText;
      document.getElementById('raceDateTime').value = row.cells[4].innerText;
      document.getElementById('raceToken').value = row.cells[5].innerText;

      // Store the row index in a data attribute on the save button
      saveBtn.dataset.rowIndex = row.rowIndex;
    });
  });

  closeBtn.addEventListener('click', () => {
    details.style.display = "none";
  });

  window.addEventListener('click', (event) => {
    if (event.target === details) {
      details.style.display = "none";
    }
  });

  saveBtn.addEventListener('click', () => {
    // Save the changes
    const rowIndex = saveBtn.dataset.rowIndex;
    const row = document.querySelector(`table tr:nth-child(${rowIndex})`);
    row.cells[1].innerText = document.getElementById('raceName').value;
    row.cells[2].innerText = document.getElementById('raceLatitude').value;
    row.cells[3].innerText = document.getElementById('raceLongitude').value;
    row.cells[4].innerText = document.getElementById('raceDateTime').value;
    row.cells[5].innerText = document.getElementById('raceToken').value;
    details.style.display = "none";
  });
});
