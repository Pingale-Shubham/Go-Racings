document.addEventListener("DOMContentLoaded", function () {
  const form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // Perform form validation
    if (validateForm()) {
      // If form is valid, submit the form
      form.submit();
      // alert("Your registration has been submitted successfully!");
    }
  });

  // Function to validate the form
  function validateForm() {
    // Get form elements
    const name = document.getElementById("UserName").value;
    const address = document.getElementById("UserAddress").value;
    const pincode = document.getElementById("UserPostalCode").value;
    const country = document.getElementById("UserCountry").value;
    const state = document.getElementById("UserState").value;
    const district = document.getElementById("UserDistirct").value;
    const taluka = document.getElementById("UserTaluka");
    const email = document.getElementById("UserEmailID");
    const password = document.getElementById("UserEmailPasscode");
    const confirmPassword = document.getElementById("UserEmailcPasscode");
    const mobileNumber = document.getElementById("UserMobileNumber").value;
    const otp = document.getElementById("UserMobileNumberOTP").value;
    var agreementCheckbox = document.getElementById('UserAgreement');

    // Validate each form field
    if (name.trim() === "" || address.trim() === "" || pincode.trim() === "" || country === "" || state === "" || district === "" || taluka === "" || mobileNumber.trim() === "" || otp.trim() === "") {
      alert("All fields must be filled out");
      return false;
    }

    var pincodeRegex = /^\d{6}$/;
    if (!pincodeRegex.test(pincode)) {
      alert("Pincode must consist of exactly 6 digits");
      return false;
    }

    // Check if mobile number follows a valid format
    var mobileNumberRegex = /^\d{10}$/;
    if (!mobileNumberRegex.test(mobileNumber)) {
      alert("Mobile number must be a 10-digit number");
      return false;
    }

    if (!agreementCheckbox.checked) {
      alert('Please agree to the terms and conditions.');
      return false; // Prevent form submission
    }
  

  // If all validations pass, return true
  return true;
}
});

