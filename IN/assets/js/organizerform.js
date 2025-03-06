function triggerFileInput(inputId) {
  const fileInput = document.getElementById(inputId);
  fileInput.click();
}

function handleFileInput(inputId, displayId) {
  const fileInput = document.getElementById(inputId);
  fileInput.addEventListener('change', function(event) {
      const filePath = fileInput.value;
      const fileName = filePath.split('\\').pop();
      const allowedExtensions = ['docx', 'doc', 'pdf', 'txt', 'rtf', 'csv', 'xls', 'xlsx', 'ppt', 'pptx', 'xml', 'zip', 'jpg', 'png', 'jpeg', 'bmp'];
      const fileExtension = fileName.split('.').pop().toLowerCase();

      if (allowedExtensions.indexOf(fileExtension) === -1) {
          alert('Invalid file type. Please select files with extensions: ' + allowedExtensions.join(', '));
          fileInput.value = ''; // Clear the file input field
          return; // Prevent further execution
      }

      const filePathDisplay = document.getElementById(displayId);
      filePathDisplay.innerText = 'File: ' + fileName;
  });
}


// Define an array of document IDs and corresponding display IDs
const documentIds = [
  { inputId: 'o_photo_id', displayId: 'o_photo_id_path' },
  { inputId: 'gram_panchayat_agreement', displayId: 'gram_panchayat_agreement_path' },
  { inputId: 'race_permission_letter', displayId: 'race_permission_letter_path' },
  { inputId: 'race_permit_application', displayId: 'race_permit_application_path' },
  { inputId: 'route_map_course_certification', displayId: 'route_map_course_certification_path' },
  { inputId: 'safety_emergency_plan', displayId: 'safety_emergency_plan_path' },
  { inputId: 'insurance_documents', displayId: 'insurance_documents_path' },
  { inputId: 'PE_Agreements', displayId: 'PE_Agreements_path' },
  { inputId: 'Participant_Registration_Forms', displayId: 'Participant_Registration_Forms_path' },
  { inputId: 'Sponsorship_Agreement', displayId: 'Sponsorship_Agreement_path' },
  { inputId: 'Vendor_contracts', displayId: 'Vendor_contracts_path' },
  { inputId: 'Volunteer_Agreements', displayId: 'Volunteer_Agreements_path' },
  { inputId: 'M_P_Materials', displayId: 'M_P_Materials_path' },
  { inputId: 'Event_Schedule_Timelines', displayId: 'Event_Schedule_Timelines_path' },
  { inputId: 'Budget_Financial_Reports', displayId: 'Budget_Financial_Reports_path' },
  { inputId: 'Environmental_Impact_Assessment', displayId: 'Environmental_Impact_Assessment_path' },
  { inputId: 'PE_Evalution_Report', displayId: 'PE_Evalution_Report_path' },
  { inputId: 'Legal_Permits_Licenses', displayId: 'Legal_Permits_Licenses_path' },
  { inputId: 'Other_Documents', displayId: 'Other_Documents_path' }
];

// Attach event listeners using the array
documentIds.forEach(doc => {
  triggerFileInput(doc.inputId); // Trigger file input dialog
  handleFileInput(doc.inputId, doc.displayId); // Handle file input change
});

// function uploadFile(inputId) {
//   const fileInput = document.getElementById(inputId);
//   const filePath = fileInput.value;
//   // Perform file upload action here
//   alert('File uploaded: ' + filePath);
// }
