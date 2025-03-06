<?php	

include 'gRconnection.php';
// Database connection parameters
//$servername = "localhost";
//$username = "sa";
//$password = "gosusat@123";
//$database = "Race";

try {
    // Establishing a database connection
    //$conn = new PDO("sqlsrv:Server=$servername;Database=$database", $username, $password);
    /*
	if( $conn === false )
    {
        echo "Could not connect.\n";
        print('<pre>');
        die( print_r( sqlsrv_errors(), true));
        print('</pre>');
    } else {
    echo "<p>Connection to the site successful. Welcome!</p>";
	
    die( print_r(sqlsrv_errors(), true));
	}
	*/
	//echo "<p>Values inserted start!</p>";
    // Set the error mode to exception
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Sample data to be inserted
	/*
    $name = "John Doe";
    $age = 30;
    $email = "john@example.com";
	*/
	
	$UserName = 'GoRacings'; 
	$UserAddress = 'Satara';
	$UserPostalCode = '415004';
	$UserCountry = 'India';
	$UserState = 'Maharashtra';
	$UserDistirct = 'Satara';
	$UserTaluka = 'Satara';
	$UserEmailID = 'help@goracings.com';
	$UserEmailPasscode = 'abc@abc.com';
	$UserMobileNumber = '1234567890';
	$UserMobileNumberOTP = '1234';	
	$UserAgreement = 'Agree';
	$UserTermsConditions = 'Accepted';
	$UserAllotedTokenNumber = '12345';
	$RecordDateTime = '01-01-2024';
	$SetDateTime = '01-01-2025';
    
	echo "<p>Values inserted start!</p>";
    // Prepare the SQL statement with placeholders
	/*
    $stmt = $conn->prepare("EXECUTE SaveRaceUser @UserName=?, @UserAddress=?, @UserPostalCode=?, @UserCountry=?,
	@UserState=?,
	@UserDistirct=?,
	@UserTaluka=?,
	@UserEmailID=?,
	@UserEmailPasscode=?,
	@UserMobileNumber=?,
	@UserMobileNumberOTP=?,
	@UserAgreement=?,
	@UserTermsConditions=?,
	@UserAllotedTokenNumber=?,
	@RecordDateTime=?,
	@SetDateTime=?");
	
	$UserCountry
	$UserState
	$UserDistirct
	$UserTaluka
	$UserEmailID
	$UserEmailPasscode
	$UserMobileNumber
	$UserMobileNumberOTP
	$UserAgreement
	$UserTermsConditions
	$UserAllotedTokenNumber
	$RecordDateTime
	$SetDateTime
    */
	
	$stmt = $conn->prepare("{CALL SaveRaceUser (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)}");
	
    // Bind parameters
	/*
    $stmt->bindParam(1, $name, PDO::PARAM_STR);
    $stmt->bindParam(2, $age, PDO::PARAM_INT);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
	*/
	
	$stmt->bindParam(1, $UserName, PDO::PARAM_STR);
    $stmt->bindParam(2, $UserAddress, PDO::PARAM_STR);
    $stmt->bindParam(3, $UserPostalCode, PDO::PARAM_STR);
	$stmt->bindParam(4, $UserCountry, PDO::PARAM_STR);
	$stmt->bindParam(5, $UserState, PDO::PARAM_STR);
	$stmt->bindParam(6, $UserDistirct, PDO::PARAM_STR);
	$stmt->bindParam(7, $UserTaluka, PDO::PARAM_STR);
	$stmt->bindParam(8, $UserEmailID, PDO::PARAM_STR);
	$stmt->bindParam(9, $UserEmailPasscode, PDO::PARAM_STR);
	$stmt->bindParam(10, $UserMobileNumber, PDO::PARAM_STR);
	$stmt->bindParam(11, $UserMobileNumberOTP, PDO::PARAM_STR);
	$stmt->bindParam(12, $UserAgreement, PDO::PARAM_STR);
	$stmt->bindParam(13, $UserTermsConditions, PDO::PARAM_STR);
	$stmt->bindParam(14, $UserAllotedTokenNumber, PDO::PARAM_STR);
	$stmt->bindParam(15, $RecordDateTime, PDO::PARAM_STR);
	$stmt->bindParam(16, $SetDateTime, PDO::PARAM_STR);
    
    // Execute the prepared statement
    $stmt->execute();
    
    echo "<p>Values inserted successfully!</p>";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$conn = null;
















/*
	$serverName = "110.227.185.209";
	// $serverName = "SWYOM\GORACINGS";
    $connectionInfo = array( "Database"=>"Race", "UID"=>"sa", "PWD"=>"gosusat@123");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);
    if( $conn === false )
    {
        echo "Could not connect.\n";
        print('<pre>');
        die( print_r( sqlsrv_errors(), true));
        print('</pre>');
    } else {
    echo "<p>Connection to the site successful. Welcome!</p>";
    die( print_r(sqlsrv_errors(), true));
	}



    /*--------- The next few steps call the stored procedure. ---------*/

    /* Define the Transact-SQL query. Use question marks (?) in place of
    the parameters to be passed to the stored procedure */
    $tsql_callSP = "{call SaveRaceUser(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)}";

    /* Define the parameter array. By default, the first parameter is an
    INPUT parameter. The second parameter is specified as an INOUT
    parameter. Initializing $vacationHrs to 8 sets the returned PHPTYPE to
    integer. To ensure data type integrity, output parameters should be
    initialized before calling the stored procedure, or the desired
    PHPTYPE should be specified in the $params array.*/


/*
	$UserName = 'GoRacings'; 
	$UserAddress = 'Satara';
	$UserPostalCode = '415004';
	$UserCountry = 'India';
	$UserState = 'Maharashtra';
	$UserDistirct = 'Satara';
	$UserTaluka = 'Satara';
	$UserEmailID = 'help@goracings.com';
	$UserEmailPasscode = 'abc@abc.com';
	$UserMobileNumber = '1234567890';
	$UserMobileNumberOTP = '1234';	
	$UserAgreement = 'Agree';
	$UserTermsConditions = 'Accepted';
	$UserAllotedTokenNumber = '123456qert7y';
	$RecordDateTime = '01-01-2024';
	$SetDateTime = '01-01-2025';	

    //$date = date_create('2000-01-01');
    $date = '01-01-2000';

    echo $date;
	

    

    $params = array(		
			array($UserName, SQLSRV_PARAM_IN),
			array($UserAddress, SQLSRV_PARAM_IN),
			array($UserPostalCode, SQLSRV_PARAM_IN),
			array($UserCountry, SQLSRV_PARAM_IN),
			array($UserState, SQLSRV_PARAM_IN),
			array($UserDistirct, SQLSRV_PARAM_IN),
			array($UserTaluka, SQLSRV_PARAM_IN),
			array($UserEmailID, SQLSRV_PARAM_IN),
			array($UserEmailPasscode, SQLSRV_PARAM_IN),
			array($UserMobileNumber, SQLSRV_PARAM_IN),
			array($UserMobileNumberOTP, SQLSRV_PARAM_IN),
			array($UserAgreement, SQLSRV_PARAM_IN),
			array($UserTermsConditions, SQLSRV_PARAM_IN),
			array($UserAllotedTokenNumber, SQLSRV_PARAM_IN),
			array($RecordDateTime, SQLSRV_PARAM_IN),
			array($SetDateTime, SQLSRV_PARAM_IN)	
        
    );

    /* Execute the query. */
	/*
    $stmt3 = sqlsrv_query( $conn, $tsql_callSP, $params);
    if( $stmt3 === false )
    {
        echo "Error in executing statement 3.\n";
        die( print_r( sqlsrv_errors(), true));
    }

    /*Free the statement and connection resources. */
	/*
    sqlsrv_free_stmt($stmt3);
    sqlsrv_close($conn);
	*/
	?>
	