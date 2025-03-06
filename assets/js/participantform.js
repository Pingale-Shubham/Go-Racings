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

      if (!allowedExtensions.includes(fileExtension)) {
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
  { inputId: 'P_photo_id', displayId: 'P_photo_id_path' },
  { inputId: 'P_waiver_liability', displayId: 'P_waiver_liability_path' },
  { inputId: 'P_medical_clearence_consent', displayId: 'P_medical_clearence_consent_path' },
  { inputId: 'P_proof_entry_fee', displayId: 'P_proof_entry_fee_path' },
  { inputId: 'P_T_G_Registration', displayId: 'P_T_G_Registration_path' }, 
  { inputId: 'P_C_D_Approval', displayId: 'P_C_D_Approval_path' },
  { inputId: 'P_Other_Documents', displayId: 'P_Other_Documents_path' }
];

// Attach event listeners using the array
documentIds.forEach(doc => {
  triggerFileInput(doc.inputId); // Trigger file input dialog
  handleFileInput(doc.inputId, doc.displayId); // Handle file input change
});