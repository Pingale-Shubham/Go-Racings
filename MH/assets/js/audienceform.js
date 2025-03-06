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
    { inputId: 'a_photo_id', displayId: 'a_photo_id_path' },
    // { inputId: 'gram_panchayat_agreement', displayId: 'gram_panchayat_agreement_path' },
    // { inputId: 'race_permission_letter', displayId: 'race_permission_letter_path' },
    // { inputId: 'race_permit_application', displayId: 'race_permit_application_path' },
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
  

  