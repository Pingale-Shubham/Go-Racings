<?php
// Start the session
session_start();

if (isset($_SESSION['LECaptcha']) && $_SESSION['LECaptcha'] === "yes") {
    $emailCaptcha = true;
} else {
    $error_message = "User need to fill correct captcha.";
    $emailCaptcha = false;
}

$color = "brown";

// Check if the session variable is set
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true && $emailCaptcha === true) {
    $LogInshowButton = true;
    $LogInWith = $_SESSION["loginCredential"];
    $error_message = "Welcome to GoRacings.";

    // JavaScript code to create a popup alert with yellow color
    echo '<script>';
    echo 'setTimeout(function() {';
    echo '    var alertMessage = document.createElement("div");';
    echo '    alertMessage.innerHTML = "' . $error_message . '";';
    echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
    echo '    alertMessage.style.color = "black";'; // Set text color to black
    echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
    echo '    alertMessage.style.position = "fixed";'; // Position the alert message
    echo '    alertMessage.style.top = "0";'; // Position at the top of the page
    echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
    echo '    alertMessage.style.transform = "translateX(-50%)";'; // Center horizontally
    echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
    echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
    echo '    setTimeout(function() {';
    echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
    echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
    echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
    echo '</script>';
} else {
    $LogInshowButton = false;

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === false) {
        $error_message = "Use correct credentials.";
    } else {
        $error_message = "User must be logged in.";
    }

    // JavaScript code to display styled popup alert
    echo '<script>';
    echo 'setTimeout(function() {';
    echo '    var alertMessage = document.createElement("div");';
    echo '    alertMessage.innerHTML = "' . $error_message . '";';
    echo '    alertMessage.style.backgroundColor = "yellow";'; // Set background color to yellow
    echo '    alertMessage.style.color = "black";'; // Set text color to black
    echo '    alertMessage.style.padding = "10px";'; // Add padding for better visibility
    echo '    alertMessage.style.position = "fixed";'; // Position the alert message
    echo '    alertMessage.style.fontSize = "15px";';
    echo '    alertMessage.style.top = "0";'; // Position at the top of the page
    echo '    alertMessage.style.left = "50%";'; // Position horizontally in the middle
    echo '    alertMessage.style.transform = "translateX(-50%)";'; // Center horizontally
    echo '    alertMessage.style.zIndex = "9999";'; // Set z-index to ensure it's on top of other elements
    echo '    document.body.appendChild(alertMessage);'; // Append the alert message to the body
    echo '    setTimeout(function() {';
    echo '        alertMessage.remove();'; // Remove the alert message after 15 seconds
    echo '    }, 15 * 1000);'; // Display alert for 15 seconds (15 * 1000 milliseconds)
    echo '}, 100);'; // Delay alert display by 100 milliseconds to ensure it's shown after page load
    echo '</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        async function checkStatus() {
            try {
                const response = await fetch('gRconnection.php');
                const data = await response.json();
                const statusDot = document.getElementById('status-dot');
                if (data.connected) {
                    statusDot.classList.add('connected');
                    statusDot.classList.remove('disconnected');
                } else {
                    statusDot.classList.add('disconnected');
                    statusDot.classList.remove('connected');
                }
            } catch (error) {
                console.error('Error fetching status:', error);
                const statusDot = document.getElementById('status-dot');
                statusDot.classList.add('disconnected');
                statusDot.classList.remove('connected');
            }
        }

        // Check status on page load
        checkStatus();

        // Optionally, check status periodically
        setInterval(checkStatus, 5000); // every 5 seconds
    </script>

    <title>GoRacings - Speed to win</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/racingnorm.css">
</head>

<body>

    <div class="sub-header-1">
        <div class="logo">
            <a href="index.php">
                <img src="images/goracingslogo.png" alt="Go Race"></a>
            <h4><span id="go">Go</span><span id="race">Racings</span></h4>
        </div>
        <div class="help-num">
            <p>Help Number: +91 02040008444</p>
        </div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <nav class="main-nav">
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown-service">
                        <button>Services</button>
                        <div class="dropdown-menu">
                            <a href="services.php?section=Race-Audience-Ticket-Cancel">Race Audience Ticket Cancellation</a>
                            <a href="services.php?section=Race-Participant-Cancel">Race Participation Cancellation</a>
                            <a href="services.php?section=Organizer-Race-Cancel">Race Organizer Cancel Race</a>
                            <a href="services.php?section=Race-Advertise">Race Advertising</a>
                        </div>
                    </li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li class="dropdown-norms">
                        <button>Racing Norms</button>
                        <div class="dropdown-menu">
                            <a href="racingnorms.php?section=terms-condition" class="dropdown-item">Terms & Conditions</a>
                            <a href="racingnorms.php?section=privacy-policy" class="dropdown-item">Privacy Policy</a>
                            <a href="racingnorms.php?section=refund-cancelation" class="dropdown-item">Refund & Cancellation</a>
                            <a href="racingnorms.php?section=responsible-Gaming" class="dropdown-item">Responsible Gaming</a>
                        </div>
                    </li>
                    <li><a href="login.php"><i class="fa fa-user"></i> Login/Register</a></li>
                </ul>
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
            </nav>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** second sub Header Area start ***** -->
    <div class="sub-header-2">
        <div></div>
        <div class="header-column-end">
            <?php if ($LogInshowButton): ?>
                <div class="dropdownIO">
        <button style="padding: 5px;"><img src="./images/user-login.png" alt="login" style="height:35px; width: 35px; padding:5px; border-radius:50%; background-color: #90e1f8;"> Welcome,</button>
          <div class="dropdownIO-options">
            <a href="lUser.php"><i class="fa fa-user"></i> Login With <span><?php echo $LogInWith; ?></span></a>
            <a href="logout.php"><img src="./images/user-logout.png" alt="logout" style="height:35px; width: 35px; padding:5px;">Logout</a>
          </div>
      </div>
            <?php endif; ?>
        </div>
    </div>
    <!-- ***** second sub Header Area End ***** -->

    <!-- Racing Norms Start -->
    <div class="racing-norms">
        <div id="content-container" class="racenorms-content-section">
            <?php
            if (isset($_GET['section'])) {
                $section = $_GET['section'];
                if ($section == 'terms-condition') {
                    echo '<h2>Terms & Conditions</h2>
                    <div class="policy-container">
                        <p>
                            Please read the below terms carefully before proceeding to THE PORTAL Swyom, Swyomsoft, Swyom Enterprises Racings platform of Race Organization and Audience Ticket Sales and Race Participants Platform Terms and Conditions.<br><br>
                            These terms and conditions ("Terms") govern your use of the Swyom, Swyomsoft, Swyom Enterprises Race Organization and Ticket Sales Platform (the "Platform"), provided by Swyom, Swyomsoft, Swyom Enterprises ("Company"). By accessing or using the Platform, you agree to be bound by these Terms. If you do not agree with any part of these Terms, you must not use the Platform.<br><br>
                            
                            <b>1. Eligibility:</b><br>
                            1.1 You must be of legal age to participate in races according to the laws of your jurisdiction.<br>
                            1.2 By using the Platform, you confirm that you meet these eligibility requirements.<br><br>
                            
                            <b>2. Registration and Account:</b><br>
                            2.1 To participate in races or purchase tickets through the Platform, you may need to register and create an account.<br>
                            2.2 You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.<br>
                            2.3 You are solely responsible for maintaining the confidentiality of your account credentials and for all activities that occur under your account.<br><br>
                            
                            <b>3. Race Organization:</b><br>
                            3.1 The Platform allows users to organize races and events.<br>
                            3.2 By organizing a race through the Platform, you agree to comply with all applicable laws and regulations, including obtaining any necessary permits or licenses.<br>
                            3.3 The Company is not responsible for the organization or conduct of races, and organizers are solely responsible for ensuring the safety and legality of their events.<br><br>
                            
                            <b>4. Participation in Races:</b><br>
                            4.1 Participants in races organized through the Platform do so at their own risk.<br>
                            4.2 By participating in a race, you agree to comply with all rules and regulations set forth by the race organizer.<br>
                            4.3 The Company is not responsible for any injuries, damages, or losses incurred during races organized through the Platform.<br><br>
                            
                            <b>5. Ticket Sales:</b><br>
                            5.1 The Platform allows users to purchase tickets to races and events.<br>
                            5.2 By purchasing a ticket through the Platform, you agree to pay the specified ticket price and any applicable fees or taxes.<br>
                            5.3 All ticket sales are final, and no refunds will be issued except as required by law or as specified by the race organizer.<br><br>
                            
                            <b>6. Payment and Transactions:</b><br>
                            6.1 All payments and transactions conducted through the Platform are subject to applicable fees and charges.<br>
                            6.2 By participating in ticket sales or other transactions, you agree to pay any fees and charges associated with your transactions.<br>
                            6.3 Payment processing services are provided by third-party payment processors, and the Company shall not be liable for any errors or delays in processing payments.<br><br>
                            
                            <b>7. Privacy Policy:</b><br>
                            7.1 Your privacy is important to us. Please review our Privacy Policy to understand how we collect, use, and disclose your information in connection with the Platform.<br>
                            7.2 By using the Platform, you consent to the collection, use, and disclosure of your personal information as described in our Privacy Policy.<br><br>
                            
                            <b>8. Prohibited Activities:</b><br>
                            8.1 You agree not to engage in any prohibited activities while using the Platform, including but not limited to fraud, unauthorized access, or any other unlawful conduct.<br>
                            8.2 The Company reserves the right to suspend or terminate your account and access to the Platform if you violate these Terms or engage in prohibited activities.<br><br>
                            
                            <b>9. Intellectual Property:</b><br>
                            9.1 All content and materials available on the Platform, including but not limited to trademarks, logos, and designs, are owned or licensed by the Company and are protected by intellectual property laws.<br>
                            9.2 You may not use, reproduce, modify, or distribute any content from the Platform without the Company\'s prior written consent.<br><br>
                            
                            <b>10. Disclaimer of Warranties:</b><br>
                            10.1 The Platform is provided on an "as is" and "as available" basis, without any warranties of any kind, express or implied.<br>
                            10.2 The Company does not guarantee the accuracy, completeness, or reliability of any information or content provided through the Platform.<br>
                            10.3 You use the Platform at your own risk, and the Company shall not be liable for any damages or losses arising out of or in connection with your use of the Platform.<br><br>
                            
                            <b>11. Limitation of Liability:</b><br>
                            11.1 In no event shall the Company be liable for any indirect, incidental, special, consequential, or punitive damages arising out of or in connection with your use of the Platform.<br>
                            11.2 The Company\'s total liability to you for any claim arising out of or in connection with these Terms or the Platform shall not exceed the amount paid by you, if any, to the Company in the twelve (12) months preceding the claim.<br><br>
                            
                            <b>12. Governing Law and Jurisdiction:</b><br>
                            12.1 These Terms shall be governed by and construed in accordance with the laws of the jurisdiction where the Company is registered, without regard to its conflict of law principles.<br>
                            12.2 Any dispute arising out of or in connection with these Terms shall be subject to the exclusive jurisdiction of the courts in the jurisdiction where the Company is registered.<br><br>
                            
                            <b>13. Changes to Terms:</b><br>
                            13.1 The Company reserves the right to modify or update these Terms at any time without prior notice.<br>
                            13.2 Your continued use of the Platform after any such changes constitutes your acceptance of the modified Terms.<br><br>
                            
                            <b>14. Severability:</b><br>
                            14.1 If any provision of these Terms is held to be invalid or unenforceable, the remaining provisions shall remain in full force and effect.<br><br>
                            
                            <b>15. Entire Agreement:</b><br>
                            15.1 These Terms constitute the entire agreement between you and the Company regarding your use of the Platform and supersede all prior or contemporaneous agreements and understandings, whether oral or written.<br><br>
                            
                            <b>16. Contact Us:</b><br>
                            16.1 If you have any questions or concerns about these Terms, please contact us at help@goracings.com.<br><br>
                            
                            Swyom, Swyomsoft and Swyom Enterprises<br><br>
                
                            Under India, Race club, Swyom, Swyomsoft and Swyom Enterprises provides online platform <span style="font-weight:bold; color: blue;">www.goracings.com</span> for operating various flexible racings peculiar.<br><br>
                
                            <b>ABOUT THE PORTAL & ITS USAGE</b><br>
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> is a brand and “Online PORTAL” powered by Swyom, Swyomsoft and Swyom Enterprises ("THE ORGANISATION") under India and other countries. Through <span style="font-weight:bold; color: blue;">www.goracings.com</span>, its website, web online application, and its sub-pages, the complete back-end Tote Processing application, THE ORGANISATION offers the opportunity for a User to participate as an audience and bet online, as well as participate and organize all types of racing being conducted across authorized Turf Clubs in India and foreign races conducted in the UK, France, Mauritius, Singapore, Hong Kong, Australia, etc. <span style="font-weight:bold; color: blue;">www.goracings.com</span>, as used herein, shall be construed as a collective reference to the “Comprehensive Back-end Tote Processing Application,” “<span style="font-weight:bold; color: blue;">www.goracings.com</span> Web PORTAL,” and the “<span style="font-weight:bold; color: blue;">www.goracings.com</span> Mobile App” and referred to herein as “THE PORTAL” in context.<br><br>

                            Any person ("User") accessing THE PORTAL offered by THE ORGANISATION for participating in the various flexible racings peculiar online all types of racing organizing, participating and part of audience for betting process shall be bound by these Terms and Conditions, and all other rules, regulations and terms of use referred to herein by THE ORGANISATION along with the terms and conditions that are made applicable by the Swyom, Swyomsoft and Swyom Enterprises. <br><br>
                            
                            As you are aware, the right to access and/or use the Website (including any or all of the products offered via the Website) may be illegal in certain jurisdictions/ places. You are responsible for deciding whether your access to and/or use of the Website complies with applicable laws in your jurisdiction and you warrant to us that in the territory where you racing organizing, participating and part of audience to live, betting is not illegal. <br><br>
                            
                            THE ORGANISATION shall be entitled to modify these Terms and Conditions, rules, regulations and terms of use referred to herein or services provided by THE PORTAL at any time, by posting the same on THE PORTAL website. <br><br>

                            By using, Visiting and/or accessing THE PORTAL constitutes the User acceptance of such Terms and Conditions, privacy policy, cookie policy, rules, regulations and terms of use referred to herein or services provided by THE ORGANISATION, as may be amended from time to time. THE ORGANISATION may, at its sole discretion, also notify the User of any change or modification in these Terms and Conditions, privacy policy, cookie policy, rules, regulations and terms of use referred to herein or services provided by THE PORTAL, by way of sending an email to the User registered email address, calling help number or posting notifications in the User accounts or by indicating the same on the THE PORTAL. The User may then exercise the options provided in such an email or notification to indicate non-acceptance of the modified Terms and Conditions, privacy policy, cookie policy, rules, regulations and terms of use referred to herein or services provided by THE PORTAL, in which case the User will not be allowed to access THE PORTAL thereafter.<br><br>
                            
                            If such options are not exercised by the User within the time frame prescribed in the email or notification, the User will be deemed to have accepted the modified Terms and Conditions, rules, regulations and terms of use referred to herein or services provided by THE ORGANISATION. <br><br>
                            THE ORGANISATION may, at its sole and absolute discretion: -<br>
                            suspend, change, or discontinue all or any part of THE PORTAL Services; <br>
                            Restrict, suspend, or terminate any User access to all or any part of THE PORTAL; <br>
                            remove or move any content that is available on THE PORTAL; <br>
                            Reject, move, or remove any material that may be submitted by a User; <br>
                            Deactivate or delete a User account and all related information and files on the account; <br>
                            Establish general practices and limits concerning use of THE PORTAL; <br>
                            Assign its rights and liabilities of all User accounts hereunder to any entity (post such assignment intimation of such assignment shall be sent to all Users to their registered emails Ids) <br><br>
                            
                            If THE ORGANISATION charges its Users a PORTAL fee in respect of use of THE PORTAL, THE ORGANISATION shall, without delay, repay such PORTAL fee in the event of suspension or removal of the User account on account of any negligence or deficiency on the part of THE ORGANISATION , but not if such suspension or removal is affected due to: <br>
                            any breach or inadequate performance by the User of any of these Terms and Conditions; or<br> 
                            Any circumstances beyond the reasonable control of THE ORGANISATION. <br><br>
                            
                            In the event any User breaches, or THE ORGANISATION reasonably believes that such User has breached these Terms and Conditions, or has illegally or improperly used THE PORTAL, THE ORGANISATION may, at its sole and absolute discretion, and without any notice to the User, restrict, suspend or terminate such User access to all or any part of THE PORTAL, deactivate or delete the User account and all related information on the account, delete any content posted by the User on THE PORTAL and further, take technical and legal steps as it deems necessary.<br><br>

                            Users consent to receiving communications such as announcements, administrative messages and advertisements from THE ORGANISATION or any of its partners, licensors or ‘Associates.<br><br>
                            
                            Live Race streaming will be provided on THE PORTAL. However, it may be noted that this will be provided on an as-Is basis and may not be guaranteed. <br><br>
                            
                            Live Race streaming may be limited to Users based on certain criteria as decided by THE ORGANISATION/PORTAL and would be binding on the User. <br><br>
                            
                            The criteria can be changed at any time by THE ORGANISATION and without giving any reason and notice. <br><br>
                            
                            Live Race streaming of an Event/Race may be limited to Users based on their Category and/or who have subscribed and paid a minimum amount as may be decided by THE ORGANISATION for the Race/Event. <br><br>
                            
                            If it is based on the minimum subscription amount, then the same will be decided by THE ORGANISATION/PORTAL and can be changed without any notice and would be binding on the User. <br><br>
                            
                            Certain Services being provided on THE PORTAL may be subject to additional rules and regulations framed in that respect. To the extent that the present Terms and Conditions are inconsistent with the additional conditions set-in, the additional conditions shall prevail. <br><br>
                            
                            <b>Eligibility criteria</b><br>
                            The registration on THE PORTAL is open only to persons above the age of 21 years. <br><br>
                            
                            THE ORGANISATION may on receipt of information, bar a User from participation and/or withdrawing monies from their accounts if there exist reasonable grounds to suspect that such person has insider knowledge. <br><br>
                            
                            Only those Users who have successfully registered on THE PORTAL in accordance with the procedure outlined below shall be eligible to participate. <br><br>
                            
                            As you are aware, the right to access and/or use the Website (including any or all of the products offered via the Website) may be illegal in certain jurisdictions/ places. You are responsible for deciding whether your access to and/or use of the Website complies with applicable laws in your jurisdiction and you warrant to us that in the territory where a User to part as audience and bet online also participate and organize on all types-racing being conducted live and betting is not illegal. <br><br>
                            
                            Registration on <span style="font-weight:bold; color: blue;">http://www.goracings.com</span> or <span style="font-weight:bold; color: blue;">https://www.goracings.com</span><br><br>
                            
                            In order to register for audience, participant and organizer has different criteria on THE PORTAL, Users are required to accurately provide the following information: <br>
                            First Name<br>
                            Last Name<br>
                            E-mail address<br>
                            Mobile Number<br>
                            Date of birth Password<br>
                            State of Residence<br>
                            Users are also required to confirm that they have read, and shall abide by, these Terms and Conditions. <br><br>
                            
                            As you are aware, the right to access and/or use the Website (including any or all of the products offered via the Website) may be illegal in certain jurisdictions/ places. You are responsible for deciding whether your access to and/or use of the Website complies with applicable laws in your jurisdiction and you warrant to us that in the territory where a User to part as audience and bet online also participate and organize on all types-racing being conducted live and betting is not illegal. <br><br>
                            
                            Once the User has entered the above information, and clicked on the "Register" tab, and such User is above the age of 21 years, they are sent an email confirming their registration and containing their login information. <br><br>
                            
                            User need to complete his KYC and follow the rules of the bank for withdrawal and deposits. <br><br>
                            
                            <b>Terms and Conditions of Participation:</b><br>
                            By registering on THE PORTAL, the user agrees to be bound by these Terms and Conditions and the decisions of THE ORGANISATION and SWYOM, SWYOMSOFT AND SWYOM ENTERPRISES Subject to the terms and conditions stipulated herein below, THE ORGANISATION, at its sole discretion, may suspend/de-activate/terminate a User account. <br><br>
                            
                            If the User engages in unfair conduct, which THE ORGANISATION deems to be improper, unfair or otherwise adverse to the operation of THE PORTAL or is in any way detrimental to other Users which includes, but is not limited to: <br>
                            Falsifying ones own personal information (including, but not limited to, name, email address, location of residence, bank account details and/or any other information or documentation as may be requested by THE ORGANISATION; <br><br>
                            
                            Engaging in any type of financial fraud or misrepresentation including unauthorized use of credit/debit instruments, payment wallet accounts etc. It is expressly clarified that the onus to prove otherwise shall solely lie on the user. <br><br>
                            
                            Colluding with any other user(s) or engaging in any type of syndicate play; <br>
                            Any violation of this Terms & Conditions or the Terms of Use; <br>
                            Use of any unauthorized methods such as automated bots, or other automated means; <br>
                            Abusing THE PORTAL in any way (‘un-parliamentary language, slangs or disrespectful words’ are some of the examples of Abuse) <br>
                            Using automated means which includes but not limited to harvesting<br> bots, <br>
                            robots <br>
                            parser<br>
                            spiders or screen scrapers<br>
                            To obtain, collect or access any information on THE PORTAL or of any User for any purpose Obtaining other Users’ information without their express consent and/or knowledge and/or spamming other Users which may include but shall not be limited to <br>
                            send unsolicited emails to Users<br>
                            sending bulk emails to THE PORTAL’s Users<br>
                            sending bulk SMS, messages on mobile to THE PORTAL’s Users<br>
                            sending unwarranted email content either to selected Users or in bulk<br>
                            Tampering with the administration of THE PORTAL or trying to in any way tamper with the computer programs or any security measure associated with THE PORTAL/software; <br>
                            Any type of Bonus misuse, misuse of the referral program, or misuse of any other offers or promotions, if any; <br>
                            It is clarified that in case a User is found to be in violation of this policy, THE ORGANISATION reserves its right to initiate appropriate Civil/Criminal remedies as it may be advised and including but not limited to deleting, suspending, deactivating the alleged account and forfeiture and/or recovery of prize money if any. <br><br>
                            
                            Only confirmed race and bets are valid and race and bets in accepted state or in pending state is not a confirmed race and bet. The amount if deducted from the wallet and the race and bet is in either accepted state or in pending state, then the race and bet amount will be refunded back irrespective of the results. <br><br>
                            
                            <b>Payment Terms</b><br>
                            In respect of any transactions entered into on THE PORTAL, including placing a race and bet, Users agree to be bound by the following payment terms: <br>
                            User Cash Wallet: Any user availing THE PORTAL’s services is provided with one account for the processing and reconciliation of payments after successful registration. <br><br>
                            
                            Placing a Race and Bet: The User can place a race and bet wherein the User has sufficient balance in their User Cash Wallet or doe the correct payment to the PORTAL. <br><br>
                            
                            Winnings: User winnings, in any nominated race will be credited into the User Cash Wallet as soon as the Pay-out has been released, less the TDS If applicable as per the rules of Income Tax Act. If winnings are credited to the user accidently in case of a change in the results due to an objection or any other reasons, <span style="font-weight:bold; color: blue;">www.goracings.com</span> has all the rights to debit the same from the user at any point of time. Any bets placed using the invalid winnings will stand cancelled. <br><br>
                            
                            Deposits: Users may add Cash to their User Cash Wallet at any time through the Payment Gateway option provided. The Payment Gateway supports : <br>
                            Credit/Debit Cards<br>
                            Internet Bank Transfers<br>
                            UPI modes of payment amongst others. <br>
                            Betting Finances: Each time a User places a race and bet on THE PORTAL, the designated amount of Cash shall be debited from the User Cash Wallet. <br>
                            It is the User responsibility to ensure that the User has sufficient Cash Balance in their User Cash Wallet before proceeding to place a race and bet. <br>
                            A User shall be permitted to withdraw from User Cash Wallet ONLY such amounts that have been credited as their Winning Dividends through the Withdraw option provided in the application (either web or Mobile App) and after having complied with the KYC requirements. <br><br>
                            
                            THE ORGANISATION may charge a processing fee for the online transfer of such amount to the bank account of the User that is on record with THE ORGANISATION. <br><br>
                            
                            Users are requested to note that they will be required to provide valid photo identification, PAN Card, Address Proof and Bank Account which would be validated through THE ORGANISATION’S Third-Party Verification Partners and only after validation and approval would THE ORGANISATION process the withdrawal request. <br>
                            The name mentioned on the User photo identification document, PAN Account should correspond with the name provided by the User at the time of registration on THE PORTAL, as well as the name and address existing in the records of the User bank account as provided to THE ORGANISATION.<br><br>
                            
                            Failure to provide THE ORGANISATION with a valid bank account or valid identification documents (to THE ORGANISATION‘s satisfaction) may result in the forfeiture of any amounts subject to transfer in accordance with this clause. <br><br>
                            
                            Bonus/Credits, if any, issued by THE ORGANISATION, would be credited into the User Wallet and may be valid for a period of time as solely determined by THE ORGANISATION and may be withheld after the expiry of such time period Race organizer, participants and audience is fully responsible for their document’s submission to <span style="font-weight:bold; color: blue;">www.goracings.com</span> and if any legal action from their state or place authority. <br><br>
                            
                            <b>Bonus:</b><br>
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> reserves the right to cancel, change or substitute the Bonus offer at any time without prior notice and the same is at the sole discretion of the company.<br><br>
                            
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> reserves the right to change the Bonus amount under this Offer at any point of time with or without prior notice to the customers. <br>
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> reserves the right to withdraw Bonus from customers’ wallet account if any fraudulent activity is identified for the sake of availing the benefits under the Bonus offer<br><br>
                            
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> is not responsible for any failed transactions as part of this offer NOR liable for any failures relating to technical, hardware, software, server, website, or other issues of any kind to the extent that these may prevent the Customer from participating in this Bonus offer. <br><br>
                            
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> decision shall be final and binding in all respects with respect to the matters relating to the bonus and race results.<br><br>
                            
                            By availing this Bonus and Race Results offer, it is deemed that the customer has agreed to all the terms & conditions mentioned herein. <br><br>
                            
                            Users agree that once they confirm a transaction on THE PORTAL, they shall be bound by and make the necessary Cash payments for that transaction. <br><br>
                            
                            A transaction once confirmed, is final.<br><br>
                            
                            <b>Taxes Payable:</b><br>
                            Tax Deduction at Source (TDS) for Online Betting as per the Income Tax Act 1961, TDS is to be deducted on all the winnings above the cumulative net winnings of Rs.10,000 in a fiscal year. <br><br>
                            
                            As per the Govt rule (Section 194BB of the Income-tax Act, 1961), all the winnings above the cumulative net winnings of Rs.10,000 in a fiscal year, will attract 30% TDS. <br><br>
                            
                            <span style="font-weight:bold; color: blue;">www.goracings.com</span> deducts the income-tax (TDS) on the winnings in accordance with the guidelines specified under the section 194BB of the Income-tax Act, 1961. <br><br>
                            
                            TDS deductions are filed with the Income Tax Department under the Patrons PAN with the monthly tax payment and quarterly reporting. Tax Deductions at Source (TDS) under Section 194 BB will reflect in the Patrons Form 26 AS at the Income Tax Portal. <br><br>
                            
                            Goods and Service Taxes (GST) @28% is applicable for every race and bet. Which will be paid to the Government in the form of CGST/SGST/IGST whatever is applicable. <br><br>
                            
                            Add to Wallet: Users, are requested to note that when they add money to their Wallet, it can only be used for placing bets on THE PORTAL and NOT for any other purpose. They will not be allowed to withdraw this amount. <br><br>
                            
                            (However, in case of an emergency, Users may email THE ORGANISATION with a request and the Admin would do the needful.) <br><br>
                            
                            <b>Withdrawal: The following may be noted:</b><br>
                            Withdrawal will be allowed only after the KYC with respect to the Identity, Address Proof, PAN and Bank Account validations have been completed and approved. <br><br>
                            
                            Withdrawal amounts would be transferred only through a direct bank transfer to the approved Bank Account only<br>
                            A User can have up to two (2) Bank Account(s) associated with him/her. <br>
                            The amount that can be Withdrawn will be limited to the amount requested less the Users TDS Liability as of that moment of time, where and if applicable. <br><br>
                            
                            A User will be permitted to Withdraw up to a maximum of Rs.25, 000 per day and/or up to a maximum of three (3) times per day provided the total amount Withdrawn does not exceed Rs.25,000. <br><br>
                            
                            Customers are requested to note that ONLY money gained through winning Dividends can be withdrawn and NOT the money added to their Wallet. If they want to withdraw money from their Wallet in excess to the above condition due to emergencies, they are requested to email us with a request and the Admin will do the needful. <br><br>
                            
                            Dividend Pay-out: Dividend pay-out against any winning tickets, less the TDS liability, if any, shall be credited to the Users Cash Wallet ONLY and shall be credited only after the results of the race have been declared and the White Cone has been hoisted as per the rules of Racing and as prescribed in the Racing Handbook by each of the Race Clubs. <br><br>
                            
                            If it comes to the notice of THE ORGANISATION that any governmental, statutory or regulatory compliances or approvals are required for conducting any Event or if it comes to the notice of THE ORGANISATION that conduct of any such Events is prohibited, then THE ORGANISATION shall withdraw and / or cancel such Events without prior notice to any Users. Users agree not to make any claim in respect of such cancellation of the Event in any manner. Refunds to Users due to such cancellations may be done and would be governed by the Rules decided by THE ORGANISATION and would be final. <br><br>
                            
                            Intellectual Property<br><br>
                            
                            THE PORTAL includes a combination of content created by THE ORGANISATION, its partners, affiliates, licensors, associates and/or Users. The intellectual property rights ("Intellectual Property Rights") in all software underlying THE PORTAL and material published on THE PORTAL, including (but not limited to) online platform of organizing participating and audience can see the races physically or virtually like, software, advertisements, written content, photographs, graphics, images, illustrations, marks, logos, audio or video clippings and Flash animation, is owned by THE ORGANISATION, its partners, licensors and/or associates. Users are advised not to modify, publish, transmit, participate in the transfer or sale of, reproduce, create derivative works of, distribute, publicly perform, publicly display, or in any way exploit any of the materials or content on THE PORTAL either in whole or in part without express written license from THE ORGANISATION. <br><br>
                            
                            Users may request permission to use any content on THE PORTAL by writing in to THE ORGANISATION’s Helpdesk at “Contact US” <br><br>
                            
                            Users are solely responsible for all materials (whether publicly posted or privately transmitted) that they upload, post, e-mail, phone call, transmit, or otherwise make available on THE PORTAL ("Users Content"). Each User represents and warrants that he/she owns all Intellectual Property Rights of the User Content and that no part of the User Content infringes any third-party rights. Users further confirm and undertake not to display or use the names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights of any third party on THE PORTAL. Users agree to indemnify and hold harmless THE ORGANISATION , its partners, directors, employees, affiliates and assigns against all costs, damages, loss and harm including towards litigation costs and counsel fees, in respect of any third party claims that may be initiated including for any infringement of Intellectual Property Rights arising out of such display or use of the names, logos, marks, labels, trademarks, copyrights or intellectual proprietary rights on THE PORTAL, by such User or through the User commissions or omissions. <br><br>
                            
                            Users hereby grant THE ORGANISATION and its affiliates, partners, licensors and associates a worldwide, irrevocable, royalty-free, non-exclusive, sub-licensable license to use, reproduce, create derivative works of, distribute, publicly perform, publicly display, transfer, transmit, and/or publish Users Content for any of the following purposes: <br><br>
                            
                            Displaying Users Content on THE PORTAL<br><br>
                            
                            Distributing Users Content, either electronically or via other media, to other Users seeking to download or otherwise acquire it, and/or Storing Users Content in a remote database accessible by end users, for a charge. <br><br>
                            
                            This license shall apply to the distribution and the storage of Users Content in any form, medium, or technology. <br><br>
                            
                            All names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights on THE PORTAL belonging to any person (including User), entity or third party are recognized as proprietary to the respective owners and any claims, controversy or issues against these names, logos, marks, labels, trademarks, copyrights or intellectual and proprietary rights must be directly addressed to the respective parties under notice to THE ORGANISATION. <br><br>
                            
                            Third Party Sites, Services and Products<br><br>
                            
                            THE PORTAL may contain links to other Internet sites owned and operated by third parties. Users use of each of those sites is subject to the conditions, if any, posted by those sites. THE ORGANISATION does not exercise control over any Internet sites apart from THE PORTAL content and cannot be held responsible for any content residing in any third-party Internet site. THE PORTAL’s inclusion of third-party content or links to third-party Internet sites is not an endorsement by THE ORGANISATION of such third-party Internet sites. <br><br>
                            
                            User agrees that THE ORGANISATION will not be responsible or liable for any loss or damage of any sort incurred as a result of any such transactions/offers with third parties. Any questions, complaints, or claims related to any third-party product or service should be directed to the appropriate vendor. <br><br>
                            
                            THE PORTAL contains content that is created by THE ORGANISATION as well as content provided by third-parties. THE ORGANISATION does not guarantee the accuracy, integrity, quality of the content provided by third parties and such content may not be relied upon by the Users in utilizing the services provided on THE PORTAL including while placing their race and bets. <br><br>
                            
                            Users correspondence, transactions/offers or related activities with third parties, including payment providers and verification service providers, are solely between the User and that third party. Users correspondence, transactions and usage of the services/offers of such third party shall be subject to the terms and conditions, policies and other service terms adopted/implemented by such third party, and the User shall be solely responsible for reviewing the same prior to transacting or availing of the services/offers of such third party. <br><br>
                            
                            Your Representations and Warranties<br><br>
                            
                            Prior to your use of THE PORTAL and on an ongoing basis you represent, warrant, covenant and agree that:<br><br>There is a risk of losing money when using THE PORTAL and that THE ORGANISATION has no responsibility to you for any such loss;<br>
                            Your use of THE PORTAL is at your sole option, discretion and risk; <br>
                            You will need to provide THE ORGANISATION with certain personal details about yourself (including details regarding your ID, Address, PAN and Bank Account details) as well as (for the purposes of using THE PORTAL via a Mobile Device) consenting to our use of location-based services (LBS) to detect your geographic location. THE ORGANISATION will process your personal details in compliance with the data protection laws and regulations of India all in accordance with and as set out in our Privacy Policy. <br><br>
                            
                            You are solely responsible for any applicable taxes which may be payable for cash or prizes awarded to you through your use of THE PORTAL; <br>
                            The telecommunication networks and Internet access services required for you to access THE PORTAL are entirely beyond the control of THE ORGANISATION and THE ORGANISATION shall have no liability whatsoever for any outages, slowness, capacity constraints or other deficiencies affecting the same; and<br>
                            You are aged 21 or over and that you are not currently self-excluded from any online or mobile gambling site and that you will inform THE ORGANISATION immediately if you enter into a self-exclusion agreement with any gambling provider. <br><br>
                            
                            You agree that you are solely responsible for all use of THE PORTAL under your Login Credentials and that you shall not disclose the Login Credentials to any person whatsoever nor permit another person to use THE PORTAL via your User account.<br><br>
                            
                            You are obliged to keep your Login Credentials secret and confidential at all times and to take all efforts to protect their secrecy and confidentiality. Any unauthorized use of the Login Credentials shall be your sole responsibility and be deemed as your use. Any liability therefrom shall be solely that of yours. <br><br>
                            
                            You will only have one User account on THE PORTAL and shall only use THE PORTAL using such a single account. It is prohibited for a User to open multiple accounts on THE PORTAL. In the event that THE ORGANISATION becomes aware of additional accounts opened by you, THE ORGANISATION may close such additional accounts without notice and may confiscate funds held in such additional accounts. <br><br>
                            
                            You agree that monies held in your Cash Wallet account on THE PORTAL do not accrue interest. <br><br>
                            
                            You will not be able to place any bets using THE PORTAL for an amount greater than the total amount of money in your Cash Wallet account, less the Cash Wallet minimum balance requirements, if any, or probable TDS amount payable as of that moment of time based on your past investments and winnings. <br><br>
                            
                            You are fully responsible for paying all monies owed to THE ORGANISATION. You agree not to make any chargebacks, and/or deny or reverse any payment made by you in respect of the use of THE PORTAL. You will reimburse THE ORGANISATION for any chargebacks, denial or reversal of payments you make and any loss suffered by THE ORGANISATION as a consequence.<br><br>
                            
                            We reserve the right to bill you for the related sums incurred if we incur any charge-backs, reversals or other charges in respect of your account.<br><br>
                            
                            You agree to permit THE ORGANISATION the right to run your credit and/or identity checks, with Third-party credit reference agencies or services, using the information provided on THE PORTAL by you on registration on THE PORTAL. The third-party credit reference agencies or services may retain a record of the information but they will not use the information for any other purpose. <br><br>
                            
                            In the jurisdiction in which you are based, internet betting may be illegal. If so, to complete the transaction, you are not allowed to use your payment card. Both bets / wagers approved from those jurisdictions, however, may stand-win or lose. <br><br>
                            
                            You agree to allow THE ORGANISATION the right to use third party electronic payment processors and/or financial institutions to process payments made by and to you in connection with your use of THE PORTAL. <br><br>
                            
                            You agree and confirm that you SHALL NOT use the PORTAL to transfer monies from any of your financial sources to your Bank Account and that if such practices are observed, that THE ORGANISATION reserves the rights to charge you appropriate Service Charges for ALL Credit and Debits both past and present at rates as decided by THE ORGANISATION and debit the same from your Cash Wallet Balance without giving any notice nor reason and if found appropriate Cancel or Deactivate your account on THE PORTAL. <br><br>
                            
                            You acknowledge and agree that you will deposit ONLY that amount of money that you intend to use on THE PORTAL. <br><br>
                            
                            You acknowledge and agree that monies deposited by you in your Cash Wallet account on THE PORTAL are held in a ring-fenced account on your behalf. <br><br>
                            
                            By registering on THE PORTAL, you confirm that you have only one account on THE PORTAL and that it is linked to your PAN account. By agreeing to these Terms and Conditions while registering on THE PORTAL, that if multiple accounts are found to be linked to your PAN account, that you permit THE ORGANISATION to immediately freeze all accounts found in violation of the above terms and that you agree to forfeit any and all monies in those accounts. <br><br>
                            
                            By agreeing to these Terms and Conditions while registering with THE PORTAL, you are also confirming that you have read and agree to the Rules and Conditions under which Horse Racing is conducted by the Racing Clubs, organizer and the basis on which Dividends are calculated and that you shall not raise any objections regarding the same at any time. <br><br>
                            
                            THE ORGANISATION shall not be liable, in contact, tort (Including negligence) or for breach of statutory duty or in any other way for any of the following (which incurred directly or indirectly): <br>
                            Loss of profits; <br>
                            Loss of Revenue; <br>
                            Loss of Business; <br>
                            Loss of Data; <br>
                            Loss of Goodwill or Reputation; <br> 
                            any special or consequential or indirect losses<br>
                            Whether or not such losses were within the contemplation of the parties at the time of these terms and conditions. <br><br>
                            
                            <b>User Conduct</b><br>
                            Users agree to abide by these Terms and Conditions and all other rules, regulations and terms of use of THE PORTAL AND SWYOM, SWYOMSOFT AND SWYOM ENTERPRISES In the event User does not abide by these Terms and Conditions and all other rules, regulations and terms of use, THE ORGANISATION may, at its sole and absolute discretion, take necessary remedial action, including but not limited to: <br>
                            restricting, suspending, or terminating any User access to all or any part of THE PORTAL’s Services; <br>
                            Deactivating or deleting a User account and all related information and files on the account. Issues relating to the encashment of balance cash in their Cash Wallets on the date of deactivation or deletion, Users are advised to Contact US. Or<br>
                            Refraining from crediting any dividend(s) to such User. <br>
                            Users agree to provide true, accurate, current and complete information at the time of registration and at all other times (as required by THE ORGANISATION). Users further agree to update and keep updated their registration information. <br><br>
                            
                            A User shall not register or operate more than one User account on THE PORTAL. <br><br>
                            
                            Users agree to ensure that they can receive all communication from THE ORGANISATION by marking e-mails or sending SMSs from THE PORTAL as part of their "safe senders" list. THE ORGANISATION shall not be held liable if any e-mail/SMS remains unread by a User as a result of such e-mail getting delivered to the User junk or spam folder. <br><br>

                            Any password issued by THE PORTAL to a User may not be revealed to anyone else. Users may not use anyone else as password. Users are responsible for maintaining the confidentiality of their accounts and passwords. Users agree to immediately notify THE ORGANISATION of any unauthorized use of their passwords or accounts or any other breach of security. <br><br>
                            
                            Users agree to exit/log-out of their accounts at the end of each session. THE ORGANISATION shall not be responsible for any loss or damage that may result if the User fails to comply with these requirements. <br><br>
                            
                            Users agree not to copy, modify, rent, lease, loan, sell, assign, distribute, reverse engineer, grant a security interest in, or otherwise transfer any right of the technology or software underlying THE PORTAL. <br><br>
                            
                            Users agree that without THE ORGANISATIONs express written consent, they shall not modify or cause to be modified any files or software that are part of THE PORTAL. <br><br>
                            
                            Users agree not to disrupt, overburden, or aid or assist in the disruption or overburdening of any computer or server used to offer or support THE PORTAL (each a "Server"); or<br>
                            The enjoyment of THE PORTAL by any other User or person.<br> 
                            Users agree not to institute, assist or become involved in any type of attack, including without limitation to distribution of a virus, denial of service, or other attempts to disrupt THE PORTAL’s Services or any other persons use or enjoyment of THE PORTAL’s Services. <br><br>
                            
                            Users shall not attempt to gain unauthorized access to a User accounts, Servers or networks connected to THE PORTAL by any means other than the User interface provided by THE PORTAL, including but not limited to, by circumventing or modifying, attempting to circumvent or modify, or encouraging or assisting any other person to circumvent or modify, any security, technology, device, or software that underlies or is part of THE PORTAL. <br><br>
                            
                            Users agree not to use cheats, exploits, automation, software, bots, hacks or any unauthorized third-party software designed to modify or interfere with THE PORTAL’s operations and/or assist in such activity. <br><br>
                            
                            Without limiting the foregoing, Users agree not to use THE PORTAL for any of the following: <br>
                            To engage in any obscene, offensive, indecent, racial, communal, anti-national, objectionable, defamatory or abusive action or communication; <br>
                            To harass, stalk, threaten, or otherwise violate any legal rights of other individuals; <br>
                            To publish, post, upload, e-mail, distribute, or disseminate (collectively, "Transmit") any inappropriate, profane, defamatory, infringing, obscene, indecent, or unlawful content; <br>
                            To Transmit files that contain viruses, corrupted files, or any other similar software or programs that may damage or adversely affect the operation of another persons computer, THE PORTAL, any software, hardware, or telecommunications equipment; <br>
                            To advertise, offer or sell any goods or services for any commercial purpose on THE PORTAL without the express written consent from THE ORGANISATION; <br>
                            To download any file, recompile or disassemble or otherwise affect THE PORTAL that you know or reasonably should know cannot be legally obtained in such manner; <br>
                            To falsify or delete any author attributions, legal or other proper notices or proprietary designations or labels of the origin or the source of software or other material; <br>
                            To restrict or inhibit any other User from using and enjoying any public area within THE PORTAL; <br> 
                            To collect or store personal information about other Users; <br>
                            To interfere with or disrupt THE PORTAL, it’s servers, or it’s networks; <br>
                            To impersonate any person or entity, including, but not limited to, a representative of THE ORGANISATION, or falsely state or otherwise misrepresent User affiliation with a person or entity; <br>
                            To forge headers or manipulate identifiers or other data in order to disguise the origin of any content transmitted through THE PORTAL or to manipulate User presence on THE PORTAL; <br><br>
                            
                            To take any action that imposes an unreasonably or disproportionately large load on all THE PORTAL’s infrastructure; <br>
                            To engage in any illegal activities.<br><br> 
                            
                            You (The User) agree(s) to use the bulletin board services, chat areas, news groups, forums, communities and/or message or communication facilities (collectively, the "Forums") only to send and receive messages and material that are proper and related to that particular Forum. <br><br>
                            
                            If a User chooses a Nickname that, in THE ORGANISATIONS considered opinion is obscene, indecent, abusive or that might subject THE ORGANISATION to public disparagement or scorn, THE ORGANISATION reserves the right, without prior notice to the User, to change such Nickname and intimate the User or delete such Nicknames and posts from THE PORTAL, deny such User access to THE PORTAL, or any combination of these options. <br><br>
                            
                            Unauthorized access to THE PORTAL is a breach of these Terms and Conditions, and a violation of the law. Users agree not to access THE PORTAL by any means other than through the interface that is provided by THE PORTAL for use in accessing THE PORTAL. Users agree not to use any automated means, including, without limitation, agents, robots, scripts, or spiders, to access, monitor, or copy any part of THE PORTAL, except those automated means that THE ORGANISATION has approved in advance and in writing. <br><br>
                            
                            Use of THE PORTAL is subject to existing laws and legal processes. Nothing contained in these Terms and Conditions shall limit THE ORGANISATION’s right to comply with governmental, court, and law-enforcement requests or requirements relating to Users use of THE PORTAL. <br><br>
                            
                            The Users will have to disclose their real age at the appropriate time on THE PORTAL by submitting their KYC details and review thereof. <br><br>
                            
                            THE ORGANISATION may not be held responsible for any content contributed by Users on THE PORTAL. <br><br>
                            
                            <b>Release and Limitations of Liability</b><br>
                            Users shall access THE ORGANISATION’s Services provided on THE PORTAL voluntarily and at their own risk. THE ORGANISATION shall, under no circumstances be held responsible or liable on account of any loss or damage sustained (including but not limited to any accident, injury, death, loss of property) by Users or any other person or entity during the course of access to THE PORTAL. <br><br>

                            By accessing THE PORTAL provided therein, Users hereby release from and agree to indemnify THE ORGANISATION, and/ or any of its directors, partners, employees, associates and licensors, from and against all liability, cost, loss or expense arising out of their access to THE PORTAL including (but not limited to) personal injury and damage to property and whether direct, indirect, consequential, foreseeable, due to some negligent act or omission on their part, or otherwise.<br><br>
                            
                            THE ORGANISATION accepts no liability, whether jointly or severally, for any errors or omissions, whether on behalf of itself or third parties. <br><br>
                            
                            Users shall be solely responsible for any consequences which may arise due to their access of THE PORTAL by conducting an illegal act or due to non-conformity with these Terms and Conditions and other rules and regulations in relation to THE PORTAL, including provision of incorrect address or other personal details. Users also undertake to indemnify THE ORGANISATION and their respective officers, directors, employees and agents on the happening of such an event (including without limitation cost of attorney, legal charges etc.) on full indemnity basis for any loss/damage suffered by THE ORGANISATION on account of such act on the part of the Users.<br><br>

                            Users shall indemnify, defend, and hold THE ORGANISATION harmless from any third-party / entity / organization claims arising from or related to such User engagement or participation on THE PORTAL. In no event shall THE ORGANISATION be liable to any User for acts or omissions arising out of or related to User engagement or his/her participation on THE PORTAL.<br><br>
                            
                            In consideration of THE ORGANISATION allowing Users to access THE PORTAL’s Services, to the maximum extent permitted by law, the User waives and releases each and every right or claim, all actions, causes of actions (present or future) each of them has or may have against THE ORGANISATION, its respective agents, directors, officers, business associates, group companies, sponsors, employees, or representatives for all and any injuries, accidents, or mishaps (whether known or unknown) or (whether anticipated or unanticipated) arising out of the provision of THE PORTAL Services. <br><br>
                            
                            <b>Others</b><br>
                            The decision of THE ORGANISATION with respect to the Dividend payable for winnings across all pools shall be final, binding and non-contestable. <br><br>
                            
                            As you are aware, the right to access and/or use the Website (including any or all of the products offered via the Website) may be illegal in certain jurisdictions/ places. You are responsible for deciding whether your access to and/or use of the Website complies with applicable laws in your jurisdiction and you warrant to us that in the territory where a User to part as audience and bet online also participate and organize on all types-racing being conducted live and betting is not illegal. THE ORGANISATION shall at its sole and absolute discretion suspend/de-activate such Users and their User Cash Wallets and the User would forfeit any winning amounts won by such User. Any amount remaining unused in the User Cash Wallet Account on the date of deactivation or deletion shall not be reimbursed to the User. <br><br>
                            
                            THE ORGANISATION may be required under certain legislations, to notify User(s) of certain events. User(s) hereby acknowledge and consent that such notices will be effective upon THE ORGANISATION posting them on THE PORTAL website and/or delivering them to the User through the email address provided by the User at the time of registration. User(s) may update their email address by logging into their account on THE PORTAL. If they do not provide THE ORGANISATION with accurate information, THE ORGANISATION cannot be held liable for failure to notify the User. <br><br>
                            
                            THE ORGANISATION shall not be liable for any delay or failure to perform resulting from causes outside its reasonable control, including but not limited to any failure to perform due to unforeseen circumstances or cause beyond THE ORGANISATION control such as acts of God, war, terrorism, riots, embargoes, acts of civil or military authorities, fire, floods, accidents, network infrastructure failures, strikes, or shortages of transportation facilities, fuel, energy, labour or materials or any cancellation of any races or events. In such circumstances, THE ORGANISATION shall also be entitled to cancel any race or event and to process an appropriate refund for all applicable Users. <br><br>
                            
                            THE ORGANISATION failure to exercise or enforce any right or provision of these Terms and Conditions shall not constitute a waiver of such right or provision. <br><br>
                            
                            Users agree that regardless of any statute or law to the contrary, any claim or cause of action arising out of or related to the use of THE PORTAL or these Terms must be filed within thirty (30) days of such claim or cause of action arising or be forever barred. <br><br>

                            These Terms and Conditions, including all terms, conditions, and policies that are incorporated herein by reference including but not limited to the associated Race Clubs and their Terms and Conditions and Rules of Racing and Results declaration and Dividend calculation and declaration, constitute the entire agreement between the User(s) and THE ORGANISATION and govern the Users use of THE PORTAL, superseding any prior agreements that any User may have with THE ORGANISATION.<br><br>
                            
                            If any part of these Terms and Conditions is determined to be indefinite, invalid, or otherwise unenforceable, the rest of these Terms and Conditions shall continue in full force. <br><br>
                            
                            THE ORGANISATION reserves the right to moderate, restrict or ban the use of THE PORTAL, specifically to any User, or generally, in accordance with THE ORGANISATIONS policy/policies from time to time, at its sole and absolute discretion and without any notice. <br><br>
                            
                            THE ORGANISATION may, at its sole and absolute discretion, permanently close or temporarily suspend any of THE PORTAL’s Services. <br><br>
                            
                            <b>Dispute and Dispute Resolution</b><br>
                            The courts of competent jurisdiction at Maharashtra, India shall have exclusive jurisdiction to determine any and all disputes arising out of, or in connection with services provided by THE ORGANISATION, services provided on THE PORTAL, the construction, validity, interpretation and enforceability of these Terms and Conditions, or the rights and obligations of the User(s) (including Participants), as well as the exclusive jurisdiction to grant interim or preliminary relief in case of any dispute referred to arbitration as given below. All such issues and questions shall be governed and construed in accordance with the laws of the Republic of India. <br><br>
                            
                            In the event of any legal dispute (which may be a legal issue or question) which may arise, the party raising the dispute shall provide a written notification ("Notification") to the other party. On receipt of Notification, the parties shall first try to resolve the dispute through discussions. In the event that the parties are unable to resolve the dispute within fifteen (15) days of receipt of Notification, the dispute shall be settled by arbitration. <br><br>
                            
                            The seat and venue of arbitration shall be Maharashtra, India. All arbitration proceedings shall be conducted in English and in accordance with the provisions of the Arbitration and Conciliation Act, 1996, as amended from time to time. <br><br>
                            
                            The arbitration award will be final and binding on the Parties, and each Party will bear its own costs of arbitration and equally share the fees of the arbitrator unless the arbitral tribunal decides otherwise. The arbitrator shall be entitled to pass interim orders and awards, including the orders for specific performance and such orders would be enforceable in competent courts. The arbitrator shall give a reasoned award. <br><br>
                            
                            Nothing contained in these Terms and Conditions shall prevent THE ORGANISATION from seeking and obtaining interim or permanent equitable or injunctive relief, or any other relief available to safeguard THE ORGANISATIONs interest prior to, during or following the filing of arbitration proceedings or pending the execution of a decision or award in connection with any arbitration proceedings from any court having jurisdiction to grant the same. The pursuit of equitable or injunctive relief shall not constitute a waiver on the part of THE ORGANISATION to pursue any remedy for monetary damages through the arbitration described herein. <br><br>

                            Technical Support<br><br>
                            
                            FAQ’s System Requirements<br><br>
                            
                            Technical Support: Due to the nature of how THE PORTAL works, there are a number of factors that may cause a User to experience technical issues while accessing/navigating through THE PORTAL or with the application’s general functionality. <br><br>
                            
                            Possible issues among the others could be as follows: <br><br>
                            
                            Problems logging in<br>
                            Problems Depositing and Withdrawing funds <br>Unexpected/unusual error messages<br>
                            Unresponsive links and Display and functionality issues<br>
                            Should a User experience any of the above, please contact THE ORGANISATION’s Customer Technical Support team (Contact US) who will be happy to troubleshoot the issues. <br><br>

                            <b>Cookies Policy</b><br>
                            A cookie is a piece of software code that an internet web site sends to your browser when you access information at that site. A cookie is stored as a simple text file on your computer or mobile device by a website’s server and only that server will be able to retrieve or read the contents of that cookie. Cookies let you navigate between pages efficiently as they store your preferences, and generally improve your experience of a website. THE ORGANISATION use following types of cookies to enhance your experience and interactivity: <br>
                            Service cookies for helping us to make our website work efficiently, remembering your registration and login details, settings preferences, and keeping track of the pages you view. <br><br>
                            
                            Non-persistent cookies a.k.a per-session cookies. Per-session cookies serve technical purposes of providing seamless navigation. These cookies do not collect personal information on users and they are deleted as soon as you leave our website. The cookies do not permanently record data and they are not stored on your computer’s hard drive. The cookies are stored in memory and are only available during an active browser session. Again, once you close your browser, the cookie disappears. <br><br>
                            
                            Complaints Procedure<br>
                            Complaint Registration<br>
                            
                            THE ORGANISATION treats all complaints and disputes seriously and is fully committed to ensuring that any received are dealt with in a fair, open and timely manner. <br><br>
                            
                            <b>Complaints and Disputes Resolution</b><br>
                            THE ORGANISATION’s aim is to ensure that all customers always have a great experience when using THE PORTAL. However, THE ORGANISATION recognizes there are occasions where THE PORTAL may not have been able to meet a User expectations, and in doing so, THE ORGANISATION would want to hear from them as soon as possible so that THE ORGANISATION may resolve their concern quickly and fairly. <br><br>
                            
                            THE ORGANISATION’s Customer Service team (Contact US) is highly trained to resolve any queries in order to provide a satisfactory outcome. On the rare occasions where this is not possible, a User can request for their complaint to be escalated to a senior team member, who will independently review and seek resolution to their complaint. <br><br>
                            
                            <b>Making a Complaint</b><br>
                            Should a User wish to raise a complaint, they can Contact Us. <br>
                            What to Provide<br>
                            In order to resolve a User complaint as quickly as possible it is important that they provide THE ORGANISATION with as much information as they can, including: <br>
                            Name<br>
                            Email<br>
                            Game ID<br>
                            Unique Identification Number<br>
                            Upon receipt of a User complaint, the complaint would be assigned to an individual member of THE ORGANISATION’s Customer Service team to assess and resolve. THE ORGANISATION will respond within 48 hours. <br><br>
                            
                            If a User is not satisfied with THE ORGANISATION’s response, they can request an escalation, which will be overseen by a member of THE ORGANISATION’s Customer Service Management team. This should be viewed as THE ORGANISATION’s final response. <br><br>
                            
                            <b>International Races</b><br> 
                            THE ORGANISATION may offer International Races to its Customers from time to time on its PORTAL. These International Races could be from anywhere in the world and for selected Events as decided by the Stewards of THE ORGANISATION. It may be noted that in addition to the Terms & Conditions of THE PORTAL, the following additional Rules and Terms & Conditions would apply including independently and collectively where appropriate: <br>
                            THE ORGANISATION may offer International Races taking place across the world from time to time on its PORTAL. These would be Races/Events that THE ORGANISATION would have received permissions from the respective Venue/Event organizers. <br><br>
                            
                            The Rules of calculation and declaration of the Final Winning Dividends for every Pool would be as per the existing Rules of THE ORGANISATION as applied to the Indian Races and as declared by THE ORGANISATION. In case of any issue what-so-ever, Stewards of THE ORGANISATION can and will take an appropriate decision and such decision would be binding on all Patrons who have participated and that such Patrons on logging into THE PORTAL, agree to waive their rights to contest such decisions. <br><br>
                            
                            The Judges Placing/Final Results of each race as declared by the Event Organizers will be used to declare the Winners on THE PORTAL <br>
                            Only Registered Patrons of THE PORTAL would be permitted to participate in these International Races offered on THE PORTAL<br>
                            Wagering by Patrons can be done through their Cash Wallets and in Indian Rupees ONLY. <br>
                            Patrons can Add Cash, place their Bets, receive their Winning Dividends and Withdraw their Winning Amounts as they usually do when normal Indian Racing is conducted. <br><br>
                            
                            Live Race streaming will be provided on THE PORTAL. However, it may be noted that this will be provided on an as-Is basis and may not be guaranteed. <br><br>
                            
                            Live Race streaming may be limited to Patrons and the criteria of who would be entitled to view Live Races will be decided by THE ORGANISATION/PORTAL and would be binding on the Patrons. Live Race streaming of an Event/Race may be limited to Patrons based on their Category and/or who have invested a minimum amount in the Race. If it is based on the minimum investment amount then the same will be decided by THE ORGANISATION/PORTAL and can change without any notice. The criteria can be changed at any time by THE ORGANISATION and without giving any reason and notice<br>
                            
                            The Race Card for the Events would be as that declared by the Event Organizers<br>
                            The Withdraw of Racing Elements, change of Racing Elements, etc. would be as declared by the Event Organizers<br>
                            The Race Timings, Start of the Race, Cancellation of an Event/Race, etc. would be as declared by the Event Organizers<br>
                            The Judges Placing/Final Results would be as declared by the Event Organizers<br>
                            The Single Leg Pools for each Event would be as declared by the Stewards of THE ORGANISATION<br>
                            By logging into THE PORTAL the Patron agrees to abide by all the Terms & Conditions of THE PORTAL including the additional Terms & Conditions under Rules and Conditions for International Racing.<br><br>
                            
                            THE ORGANISATION/PORTAL reserves the right to Cancel/Declare Void an Event/Race at any time and with assigning any reason what-so-ever. Any investments done for such an Event/Race would be refunded as per the Rules of Racing of THE PORTAL. On logging-in into THE PORTAL, Patrons agree that they are not permitted to and will not contest any decisions of THE ORGANISATION/PORTAL. <br><br>
                            
                            Patrons may note that THE PORTAL, may where feasible, offer to present the Probable Dividends and/or ODDs being declared by the Event Organizers. It may be noted that such Probable Dividends/ODDs being presented are ONLY for their information and would be in the local currency of the Event/Race and such Dividends would NOT be the Dividends applicable to Winning Tickets on this PORTAL. In addition to such information, THE PORTAL would as usual present Patrons with the Probable Dividends being offered by THE PORTAL which would be based on the Betting Patterns of the local participating Patrons. <br><br>
                            
                            If the event has a scheduled "off" time, all bets matched after that scheduled off time will be void. <br><br>
                            
                            If the event does not have a scheduled "off" time, The Organisation will use its reasonable endeavours to ascertain the time of the actual "off" and all race and bets after the time of the "off" determined by The Organisation will be void. <br><br>
                            
                            The Organisation aims to use its reasonable endeavours to suspend the acceptance of bets at the start of the event. However, regardless of what it says in the Market Information, The Organisation does not guarantee that such markets will be suspended at the relevant time. <br><br>
                            
                            All the bets placed after the scheduled off time of the race will be void. Customers are responsible for managing their timing of race and bets all the time. <br><br>
                            
                            Any miss bets due to any technical problems will not be organisation’s responsibility and player has to bear any such losses incurred during the downtime. <br><br>
                            
                            We strictly follow international racing rules followed by Swyom, Swyomsoft and Swyom Enterprises. <br><br>

                            <b>Contact Us</b><br><br>
                            
                            Website: <span style="font-weight:bold; color: blue;">www.goracings.com</span><br><br>
                            
                            Email: <span style="font-weight:bold; color: blue;">help@goracings.com</span><br><br>
                            
                            By Order of the Swyom, Swyomsoft and Swyom Enterprises. <br>
                        </p>
                    </div>';
                    echo '<a href="./NormsDoc/Terms_and_Conditions_GoRacings.com.pdf" download><button>Download Terms and Conditions</button></a>';
                } elseif ($section == 'privacy-policy') {
                    echo '<h2>Privacy Policy</h2>
                    <div class="policy-container">
                        <p><strong>Privacy Policy for GoRacings.com</strong><br>
                        <strong>Effective Date: 1 July 2024</strong><br><br>
                        
                        <b>1. Introduction</b><br>
                        Welcome to GoRacings.com. We are committed to protecting your personal information and your right to privacy. If you have any questions or concerns about this privacy notice, or our practices with regards to your personal information, please contact us at goracings@swyomsoft.com.<br><br>
                        
                        <b>2. Information We Collect</b><br>
                        We collect personal information that you voluntarily provide to us when you register on the website, express an interest in obtaining information about us or our products and services, participate in activities on the website, or otherwise contact us.<br><br>
                        
                        <b>3. Personal Information Provided by You</b><br>
                        The personal information that we collect depends on the context of your interactions with us and the website, the choices you make, and the products and features you use. The personal information we collect can include the following:<br>
                        • Name and Contact Data: We collect your first and last name, email address, postal address, phone number, and other similar contact data.<br>
                        • Credentials: We collect passwords, password hints, and similar security information used for authentication and account access.<br><br>
                        
                        <b>4. Information Automatically Collected</b><br>
                        We automatically collect certain information when you visit, use, or navigate the website. This information does not reveal your specific identity (like your name or contact information) but may include device and usage information, such as your IP address, browser and device characteristics, operating system, language preferences, referring URLs, device name, country, location, information about how and when you use our website, and other technical information. This information is primarily needed to maintain the security and operation of our website, and for our internal analytics and reporting purposes.<br><br>
                        
                        <b>5. Use of Your Information</b><br>
                        We use personal information collected via our website for a variety of business purposes described below. We process your personal information for these purposes in reliance on our legitimate business interests, in order to enter into or perform a contract with you, with your consent, and/or for compliance with our legal obligations. We indicate the specific processing grounds we rely on next to each purpose listed below:<br>
                        • To Facilitate Account Creation and Login Process: If you choose to link your account with us to a third-party account (such as your Google or Facebook account), we use the information you allowed us to collect from those third parties to facilitate account creation and login process for the performance of the contract.<br>
                        • To Post Testimonials: We post testimonials on our website that may contain personal information. Prior to posting a testimonial, we will obtain your consent to use your name and the content of the testimonial. If you wish to update or delete your testimonial, please contact us at goracings@swyomsoft.com and be sure to include your name, testimonial location, and contact information.<br>
                        • Request Feedback: We may use your information to request feedback and to contact you about your use of our website.<br>
                        • To Enable User-to-User Communications: We may use your information in order to enable user-to-user communications with each user’s consent.<br>
                        • To Manage User Accounts: We may use your information for the purposes of managing our account and keeping it in working order.<br>
                        • To Send Administrative Information to You: We may use your personal information to send you product, service, and new feature information and/or information about changes to our terms, conditions, and policies.<br>
                        • To Protect Our Services: We may use your information as part of our efforts to keep our website safe and secure (for example, for fraud monitoring and prevention).<br>
                        • To Enforce Our Terms, Conditions, and Policies: To comply with legal and regulatory requirements or in connection with our contract.<br>
                        • To Respond to Legal Requests and Prevent Harm: If we receive a subpoena or other legal request, we may need to inspect the data we hold to determine how to respond.<br><br>
                        
                        <b>6. Sharing Your Information</b><br>
                        We only share and disclose your information in the following situations:<br>
                        • Compliance with Laws: We may disclose your information where we are legally required to do so in order to comply with applicable law, governmental requests, a judicial proceeding, court order, or legal process, such as in response to a court order or a subpoena (including in response to public authorities to meet national security or law enforcement requirements).<br>
                        • Vital Interests and Legal Rights: We may disclose your information where we believe it is necessary to investigate, prevent, or take action regarding potential violations of our policies, suspected fraud, situations involving potential threats to the safety of any person and illegal activities, or as evidence in litigation in which we are involved.<br>
                        • Business Transfers: We may share or transfer your information in connection with, or during negotiations of, any merger, sale of company assets, financing, or acquisition of all or a portion of our business to another company.<br>
                        • Third-Party Service Providers: We may share your information with third-party vendors, service providers, contractors, or agents who perform services for us or on our behalf and require access to such information to do that work. Examples include: payment processing, data analysis, email delivery, hosting services, customer service, and marketing efforts. We may allow selected third parties to use tracking technology on the website, which will enable them to collect data on our behalf about how you interact with our website over time. This information may be used to, among other things, analyze and track data, determine the popularity of certain content, pages, or features, and better understand online activity.<br><br>
                        
                        <b>7. Security of Your Information</b><br>
                        We use administrative, technical, and physical security measures to help protect your personal information. While we have taken reasonable steps to secure the personal information you provide to us, please be aware that despite our efforts, no security measures are perfect or impenetrable, and no method of data transmission can be guaranteed against any interception or other type of misuse.<br><br>
                        
                        <b>8. Data Retention</b><br>
                        We will only keep your personal information for as long as it is necessary for the purposes set out in this privacy notice, unless a longer retention period is required or permitted by law (such as tax, accounting, or other legal requirements). When we have no ongoing legitimate business need to process your personal information, we will either delete or anonymize such information, or, if this is not possible (for example, because your personal information has been stored in backup archives), then we will securely store your personal information and isolate it from any further processing until deletion is possible.<br><br>
                        
                        <b>9. Your Privacy Rights</b><br>
                        In some regions (like the European Economic Area), you have certain rights under applicable data protection laws. These may include the right (i) to request access and obtain a copy of your personal information, (ii) to request rectification or erasure; (iii) to restrict the processing of your personal information; and (iv) if applicable, to data portability. In certain circumstances, you may also have the right to object to the processing of your personal information. To make such a request, please use the contact details provided below. We will consider and act upon any request in accordance with applicable data protection laws.<br><br>
                        
                        <b>10. Contact Us</b><br>
                        If you have questions or comments about this notice, you may email us at goracings@swyomsoft.com or by post to:<br>
                        GoRacings.com<br>
                        Address:<br>
                        Swyom, Swyomsoft and Swyom Enterprises, Satara – partner:- www.swyomsoft.com<br>
                        GoRacings<br>
                        GPC 1, MIDC Road,<br>
                        Satara, Maharashtra,<br>
                        India - 415001<br></p>
                    </div>';
                    echo '<a href="./NormsDoc/Privacy_Policy_for_GoRacings.com.pdf" download><button>Download Privacy Policy</button></a>';
                } elseif ($section == 'refund-cancelation') {
                    echo '<h2>Refund & Cancellation Policy</h2>
                    <div class="policy-container">
                        <p>
                        Welcome to GoRacings.com! We aim to ensure your experience with us is smooth and enjoyable. However, we understand that there may be circumstances requiring refunds and cancellations. Below is our detailed policy regarding refunds and cancellations for various types of payments including racing allocation payment, participation payment, and audience ticket payment.<br>
                        For any queries or assistance, please feel free to contact our support team at goracings@swyomsoft.com.<br><br>
                        
                        <b>Racing Allocation Payment</b><br>
                        <u>Cancellation Policy</u><br>
                        • Cancellation Period: You can cancel your racing allocation up to 7 days before the event date.<br>
                        • How to Cancel: Send an email to goracings@swyomsoft.com with your allocation details and reason for cancellation.<br>
                        <u>Refund Policy</u><br>
                        • Refund Eligibility: If the cancellation request is received at least 7 days prior to the event date, you are eligible for a full refund.<br>
                        • Processing Time: Refunds will be processed within 30 working days from the date of cancellation request approval.<br>
                        • Credit Timeline: After processing, the refunded amount will be credited to your bank account within 5-7 working days.<br><br>
                        
                        <b>Participation Payment</b><br>
                        <u>Cancellation Policy</u><br>
                        • Cancellation Period: You can cancel your participation up to 14 days before the event date.<br>
                        • How to Cancel: Send an email to goracings@swyomsoft.com with your participation details and reason for cancellation.<br>
                        <u>Refund Policy</u><br>
                        • Refund Eligibility: If the cancellation request is received at least 14 days prior to the event date, you are eligible for a full refund.<br>
                        • Processing Time: Refunds will be processed within 30 working days from the date of cancellation request approval.<br>
                        • Credit Timeline: After processing, the refunded amount will be credited to your bank account within 5-7 working days.<br><br>
                        
                        <b>Audience Ticket Payment</b><br>
                        <u>Cancellation Policy</u><br>
                        • Cancellation Period: You can cancel your audience ticket up to 3 days before the event date.<br>
                        • How to Cancel: Send an email to goracings@swyomsoft.com with your ticket details and reason for cancellation.<br>
                        <u>Refund Policy</u><br>
                        • Refund Eligibility: If the cancellation request is received at least 3 days prior to the event date, you are eligible for a full refund.<br>
                        • Processing Time: Refunds will be processed within 30 working days from the date of cancellation request approval.<br>
                        • Credit Timeline: After processing, the refunded amount will be credited to your bank account within 5-7 working days.<br><br>
                        
                        <b>General Terms</b><br>
                        <u>Non-Refundable Situations</u><br>
                        • Late Cancellations: Requests made after the specified cancellation period for each type of payment will not be eligible for a refund.<br>
                        • Event Cancellations: If an event is cancelled by GoRacings, you will be eligible for a full refund irrespective of the cancellation period.<br>
                        • Force Majeure: In case of cancellations due to unforeseen circumstances such as natural disasters, refunds will be processed based on the situation and as per the company\'s discretion.<br><br>
                        
                        <u>Refund Process</u><br>
                        1. Initiation: Send a refund request to goracings@swyomsoft.com.<br>
                        2. Approval: You will receive a confirmation email once your request is reviewed and approved.<br>
                        3. Processing: Refunds will be processed within 30 working days from the approval date.<br>
                        4. Credit: Once processed, the amount will be credited to your bank account within 5-7 working days.<br><br>
                        
                        <b>Contact Us</b><br>
                        For any queries or further assistance regarding refunds and cancellations, please contact our support team at goracings@swyomsoft.com.<br>
                        We appreciate your understanding and cooperation. Thank you for choosing GoRacings.com!</p>
                    </div>';
                    echo '<a href="./NormsDoc/Refunds_&_Cancellations_Policy_GoRacings.com.pdf" download><button>Download Refund and Cancellation Policy</button></a>';
                } elseif ($section == 'responsible-Gaming') {
                    echo '<h2>Responsible Gaming </h2>
                    <div class="gaming-policy-contain">

                        <h4>Responsible Gaming Outline:</h4><br>
                        <b>1. Introduction</b><br>
                        o Definition of Responsible Gaming<br>
                        o Importance of Responsible Gaming<br>
                        o Overview of Different Types of Racing<br><br>
                        <b>2. Types of Racing</b><br>
                        o Horse Racing<br>
                        o Greyhound Racing<br>
                        o Car Racing<br>
                        o Bicycle Racing<br>
                        o Others (Marathons, Boat Racing) <br><br>
                        <b>3. Risks Associated with Racing and Gambling</b><br>
                        o Financial Risks<br>
                        o Emotional and Psychological Risks<br>
                        o Social Risks<br>
                        o Legal Risks<br><br>
                        <b>4. Principles of Responsible Gaming</b><br>
                        o Setting Limits<br>
                        o Understanding Odds<br>
                        o Recognizing Problematic Behavior<br>
                        o Seeking Help and Support<br><br>
                        <b>5. Responsible Gaming Strategies for Different Stakeholders</b><br>
                        o For Players<br>
                        o For Families and Friends<br>
                        o For Racing and Gaming Operators<br>
                        o For Regulators and Policymakers<br><br>
                        <b>6. Case Studies and Examples</b><br>
                        o Successful Implementation of Responsible Gaming Practices<br>
                        o Lessons from Failures<br><br>
                        <b>7. Resources and Support Networks</b><br>
                        o Helplines and Support Groups<br>
                        o Educational Resources<br>
                        o Online Tools and Apps<br><br>
                        <b>8. Conclusion</b><br>
                        o Summary of Key Points<br>
                        o Call to Action for All Stakeholders<br><br>
                        
                        <h5>Document:</h5><br><br>
                        
                        <h6>1. Introduction</h6><br>
                        
                        <strong>Definition of Responsible Gaming</strong><br>
                        
                        Responsible gaming refers to a set of social responsibility initiatives by the gaming industry, governments, and other stakeholders to ensure that gambling practices are conducted in a way that is safe and fair for all participants. This includes promoting awareness of the risks associated with gambling, providing tools and resources for individuals to manage their gambling behavior, and ensuring that gaming operators adhere to ethical standards.<br><br>
                        
                        <strong>Importance of Responsible Gaming</strong><br>
                        
                        Responsible gaming is crucial to mitigating the negative impacts of gambling, such as addiction, financial ruin, and social consequences. By promoting responsible gaming practices, the industry can ensure a safer environment for all participants, preserve the integrity of gaming activities, and contribute to a healthier society.<br><br>
                        
                        <strong>Overview of Different Types of Racing</strong><br>
                        
                        Racing is a popular form of entertainment and betting, encompassing various types including horse racing, greyhound racing, car racing, and bicycle racing, among others. Each type has its unique features, participants, and fan base, but all share common risks and responsibilities associated with gambling.<br><br>
                        
                        <h6>2. Types of Racing</h6><br>
                        
                        <strong>Horse Racing</strong><br>
                        
                        Horse racing is one of the oldest and most traditional forms of racing, with a rich history and widespread popularity. It involves betting on the outcome of races where horses compete over different distances.<br><br>
                        
                        <strong>Greyhound Racing</strong><br>
                        
                        Greyhound racing is similar to horse racing but involves greyhounds. It has a significant following in various parts of the world, particularly in countries like the UK and Australia.<br><br>
                        
                        <strong>Car Racing</strong><br>
                        
                        Car racing, including Formula 1, NASCAR, and rally racing, involves high-speed competitions with cars. It attracts a global audience and substantial betting activity.<br><br>
                        
                        <strong>Bicycle Racing</strong><br>
                        
                        Bicycle racing, such as the Tour de France, is a competitive sport where participants race bicycles over long distances. It has a dedicated fan base and a growing gambling market.<br><br>
                        
                        <strong>Others (Marathons, Boat Racing)</strong><br>
                        
                        Other forms of racing, like marathons and boat racing, also attract betting activities. Each type of racing presents unique risks and opportunities for promoting responsible gaming.<br><br>
                        
                        <h6>3. Risks Associated with Racing and Gambling</h6><br>
                        
                        <strong>Financial Risks</strong><br>
                        
                        Gambling on races can lead to significant financial losses. Individuals may bet more than they can afford to lose, leading to debt and financial instability.<br><br>
                        
                        <strong>Emotional and Psychological Risks</strong><br>
                        
                        Gambling addiction can have severe emotional and psychological effects, including stress, anxiety, depression, and even suicidal tendencies.<br><br>
                        
                        <strong>Social Risks</strong><br>
                        
                        Problem gambling can strain relationships, lead to social isolation, and negatively impact family dynamics.<br><br>
                        
                        <strong>Legal Risks</strong><br>
                        
                        Illegal gambling activities can result in legal consequences, including fines and imprisonment, affecting individuals and their families.<br><br>
                        
                        <h6>4. Principles of Responsible Gaming</h6><br>
                        
                        <strong>Setting Limits</strong><br>
                        
                        Players should set limits on the amount of time and money they spend on gambling. This helps prevent excessive gambling and reduce the risk of addiction.<br><br>
                        
                        <strong>Understanding Odds</strong><br>
                        
                        Understanding the odds and probabilities involved in gambling helps players make informed decisions and manage their expectations.<br><br>
                        
                        <strong>Recognizing Problematic Behavior</strong><br>
                        
                        Being aware of signs of gambling addiction, such as chasing losses and neglecting responsibilities, is crucial. Early recognition can prompt individuals to seek help before the problem escalates.<br><br>
                        
                        <strong>Seeking Help and Support</strong><br>
                        
                        Various resources, including helplines and support groups, are available for individuals struggling with gambling addiction. Seeking help is a vital step towards recovery.<br><br>
                        
                        <h6>5. Responsible Gaming Strategies for Different Stakeholders</h6><br>
                        
                        <strong>For Players</strong><br>
                        
                        Players should educate themselves about responsible gaming practices, set personal limits, and seek help if they recognize signs of problematic behavior.<br><br>
                        
                        <strong>For Families and Friends</strong><br>
                        
                        Families and friends can play a supportive role by encouraging responsible gaming, recognizing signs of addiction, and providing emotional and practical support.<br><br>
                        
                        <strong>For Racing and Gaming Operators</strong><br>
                        
                        Operators should implement measures to promote responsible gaming, such as providing information on odds and risks, offering self-exclusion options, and training staff to recognize and address problematic behavior.<br><br>
                        
                        <strong>For Regulators and Policymakers</strong><br>
                        
                        Regulators and policymakers should enforce laws and regulations that promote responsible gaming, protect consumers, and ensure fair practices within the industry.<br><br>
                        
                        <h6>6. Case Studies and Examples</h6><br>
                        
                        <strong>Successful Implementation of Responsible Gaming Practices</strong><br>
                        
                        • Example 1: The UK Gambling Commissions strict regulations on advertising and promotion of gambling, which include mandatory warnings about the risks of gambling.<br>
                        
                        • Example 2: Australias self-exclusion programs, allowing individuals to ban themselves from gambling venues and online platforms.<br><br>
                        
                        <strong>Lessons from Failures</strong><br>
                        
                        • Example 1: The collapse of the betting company 888 Holdings due to inadequate responsible gaming measures and the subsequent financial and reputational damage.<br>
                        
                        • Example 2: The rise in gambling addiction cases in countries with lax regulations and insufficient support systems.<br><br>
                        
                        <h6>7. Resources and Support Networks</h6><br>
                        
                        <strong>Helplines and Support Groups</strong><br>
                        
                        • GamCare: Provides support and information to anyone affected by problem gambling.<br>
                        
                        • Gamblers Anonymous: Offers a 12-step program for individuals struggling with gambling addiction.<br><br>
                        
                        <strong>Educational Resources</strong><br>
                        
                        • BeGambleAware: Provides resources and information on responsible gambling practices.<br>
                        
                        • National Council on Problem Gambling: Offers educational materials and resources for individuals and families.<br><br>
                        
                        <strong>Online Tools and Apps</strong><br>
                        
                        • BetBlocker: A free tool that allows individuals to block access to gambling websites and apps.<br>
                        
                        • GamBan: Software that blocks gambling sites on devices, helping individuals manage their gambling behavior.<br><br>
                        
                        <h6>8. Conclusion</h6><br>
                        
                        <strong>Summary of Key Points</strong><br>
                        
                        Responsible gaming is essential for protecting individuals from the risks associated with gambling, including financial, emotional, social, and legal consequences. By promoting responsible gaming practices, educating stakeholders, and providing support resources, the gaming industry and society can work together to mitigate the negative impacts of gambling.<br><br>
                        
                        <strong>Call to Action for All Stakeholders</strong><br>
                        
                        All stakeholders, including players, families, gaming operators, and regulators, must commit to promoting responsible gaming practices. By working together, we can create a safer and more sustainable gaming environment for everyone.<br>

                    </div>';
                    echo '<a href="./NormsDoc/Responsible Gaming.com.pdf" download><button>Download Responsible Gaming Policy</button></a>';
                } else {
                    echo '<h2>Welcome to Racing Norms</h2><p>Select a section from the dropdown menu to view the content.</p>';
                }
            } else {
                echo '<h2>Welcome to Racing Norms</h2><p>Select a section from the dropdown menu to view the content.</p>';
            }
            ?>
        </div>
    </div>
    <!-- Racing Norms End -->

    <!-- *********footer area********* -->
    <footer>
        <div class="footer-line-1">
            <p>Agree all terms and conditions for this platform</p>
        </div>
        <div class="footer-container">
            <div class="footer-col-1">
                <div class="footer-column">
                    <h4>SITEMAP</h4>
                    <ul>
                        <li><a href="#">Races</a></li>
                        <li><a href="#">Promotions</a></li>
                        <li>
                            <div class="footer-logo">
                                <a href="index.php">
                                    <img src="images/goracingslogo.png" alt="Go Race"></a>
                                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>INFORMATION</h4>
                    <ul>
                        <li><a href="#">Rules</a></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="racingnorms.php?section=privacy-policy">Privacy Policy</a></li>
                        <li><a href="racingnorms.php?section=terms-condition">Terms and Conditions</a></li>
                        <li><a href="racingnorms.php?section=responsible-Gaming">Responsible Gaming</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-col-2">
                <div class="footer-column">
                    <h4>CONTACT</h4>
                    <ul>
                        <li>
                            <div class="footer-logo">
                                <h4><span id="go">Go</span><span id="race">Racings</span></h4>
                            </div>
                        </li>
                        <li>GPC 1, MIDC Road,</br> Satara, Maharashtra,<br> India - 415001</li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>SOCIAL</h4>
                    <ul>
                        <li>
                            <div class="footer-icon">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="http://www.youtube.com/@goracings"><i class="fab fa-youtube"></i></a>
                                <a href="https://wa.me/919764662357" target="_blank"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </li>
                        <li>E-Mail - goracings@swyomsoft.com</li>
                        <li>Help No. - 02040008444</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-line-2">
            <p><span>&copy; 2024. Swyom, Swyomsoft And Swyom Enterprises.</span> All Rights Reserved.</p>
        </div>
        <div class="connection_line2">
            <div id="status-dot" class="connection_dot"></div>
        </div>
    </footer>
    <!-- **** footer area end **** -->

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>