<?php
include 'dbConnection.php';
session_start();
$message = "";

/*RegisterMember*/

if (isset($_POST["btnRegisterMember"])) {

	$firstName = $_POST["txtFName"];
	$Middlename = $_POST["txtMName"];
	$lastname = $_POST["txtLName"];
	$Telephone = $_POST["txtTelephone"];
	$Address = $_POST["txtAddress"];
	$Email = $_POST["txtEmail"];
	$date_of_birth = $_POST["dob"];

	$sql = "INSERT INTO member(m_first_name, m_middle_name, m_last_name,m_address, m_telephone, email , m_dob)
	VALUES ('" . $firstName . "', '" . $Middlename . "', '" . $lastname . "', '" . $Address . "','" . $Telephone . "', '" . $Email . "', '" . $date_of_birth . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../member.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../member.php");
	}

	$con->close();

}

/*Register Staff*/

if (isset($_POST["btnRegisterStaff"])) {
	$Staff_FName = $_POST["txtFName"];
	$Staff_MName = $_POST["txtMName"];
	$Staff_LName = $_POST["txtLName"];
	$Staff_Address = $_POST["txtAddress"];
	$Staff_Position = $_POST["cbxPosition"];
	$Staff_Telephone = $_POST["txtTelephone"];
	$Staff_Email = $_POST["txtEmail"];
	$Staff_dob = $_POST["dob"];

	$sql = "INSERT INTO staff(st_first_name, st_middle_name, st_last_name,st_position, st_telephone, address , st_email,st_dob)
	VALUES ('" . $Staff_FName . "', '" . $Staff_MName . "', '" . $Staff_LName . "', '" . $Staff_Position . "','" . $Staff_Telephone . "', '" . $Staff_Address . "','" . $Staff_Email . "', '" . $Staff_dob . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../staff-registration.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../staff-registration..php");
	}

	$con->close();

}

/*register user*/

if (isset($_POST["btnRegisterUser"])) {
	$Name = $_POST["txtName"];
	$Username = $_POST["txtUsername"];
	$Password = password_hash($_POST["txtPassword"], PASSWORD_DEFAULT);
	$Starting_date = date("Y/m/d");
	$User_type = $_POST["UserType"];
	$activeFlag = "Active";

	$sql = "SELECT * FROM users WHERE u_username = '$Username'";
	$result = mysqli_query($con, $sql);
	$resultCheck = mysqli_num_rows($result);

	if ($resultCheck > 0) {
		header("Location: ../staff-registration.php?userTaken");
		$_SESSION["error"] = "Username already taken!";
		exit();
	} else {
		$hashedPwd = password_hash($Password, PASSWORD_DEFAULT);
		$sql = "INSERT INTO users(u_name,u_username,u_password,starting_date,u_type,active_flag) VALUES ('" . $Name . "','" . $Username . "','" . $hashedPwd . "','" . $Starting_date . "','" . $User_type . "','" . $activeFlag . "')";
		mysqli_query($con, $sql);
		$_SESSION["success"] = "User registration successfully done!";
		header("location: ../staff-registration.php");
	}

}


/*add club btn*/


if (isset($_POST["btnAddClub"])) {

	$Club_Name = $_POST["txtClubName"];
	$Location = $_POST["txtClubLocation"];

	$sql = "INSERT INTO club(cl_name,cl_location) VALUES ('" . $Club_Name . "','" . $Location . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../club.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../club..php");
	}

	$con->close();

}
 

/*payment form*/

	/*btnSavePrint*/


if (isset($_POST["btnSavePrint"])) {
	$Methode_of_Payment = $_POST["cbxMethodeOfPayment"];
	$Payment_Date = $_POST["pDate"];
	$Subscription_number = $_POST["txtSubscription-number"];
	$Total_Amount = $_POST["txtAmount"];
	$Paid = $_POST["txtPaid"];
	$Remain = $_POST["txtRemain"];

	$sql = "INSERT INTO payment(mop_name,sub_id,pay_amount,pay_date) VALUES ('" . $Methode_of_Payment . "', '" . $Subscription_number . "', '" . $Paid . "','" . $Payment_Date . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../payment.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../payment..php");
	}

	$con->close();

}

	/*btnNext*/
if (isset($_POST["btnNext"])) {

	$sql = "INSERT INTO payment(pay_id,mop_id,sub_id,pay_amount) VALUES ('" . $Invoice_Number . "','" . $Methode_of_Payment . "', '" . $Payment_Date . "', '" . $Subscription_number . "','" . $Total_Amount . "', '" . $Paid . "','" . $Remain . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../payment.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../payment..php");
	}

	$con->close();

}

	/*btn preview*/
if (isset($_POST["btnPreview"])) {

	$sql = "INSERT INTO payment(pay_id,mop_id,sub_id,pay_amount) VALUES ('" . $Invoice_Number . "','" . $Methode_of_Payment . "', '" . $Payment_Date . "', '" . $Subscription_number . "','" . $Total_Amount . "', '" . $Paid . "','" . $Remain . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../payment.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../payment..php");
	}

	$con->close();

}

/*btn new*/

if (isset($_POST["btnNew"])) {

	$sql = "INSERT INTO payment(pay_id,mop_id,sub_id,pay_amount) VALUES ('" . $Invoice_Number . "','" . $Methode_of_Payment . "', '" . $Payment_Date . "', '" . $Subscription_number . "','" . $Total_Amount . "', '" . $Paid . "','" . $Remain . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../payment.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../payment..php");
	}

	$con->close();

}
/*btn print*/
/*btn refund*/

/*membership*/
	/*btn new*/
	/*btn show price*/

	/*btnAddMS*/
if (isset($_POST["btnAddMS"])) {
	$Membership_name = $_POST["txtMname"];
	$Membership_description = $_POST["txtMdescription"];
	$Membershhip_type = $_POST["txtMtype"];
	$sql = "INSERT INTO membership(ms_id,ms_name,ms_description,ms_type) VALUES ('" . $Membership_name . "','" . $Membership_description . "','" . $Membership_type . "','" . $Membership_price . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../membership-type.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../membership_type..php");
	}

	$con->close();

}


/* btn login*/

if (isset($_POST["btnLogin"])) {

	$username = $_POST["txtUsername"];
	$password = $_POST["txtPassword"];

	$sql = "SELECT * FROM users WHERE u_username = '$username'";
	$result = mysqli_query($con, $sql);
	$resultCheck = mysqli_num_rows($result);
	if ($resultCheck < 1) {
		header("Location: ../index.php?login=error=0");
		$_SESSION["error"] = "Username/Password Error, Try Again!";
		exit();
	} else {
		if ($row = mysqli_fetch_assoc($result)) {
			$hashedPwdCheck = password_verify($_POST["txtPassword"], $row['u_password']);
			if ($hashedPwdCheck = false) {
				header("Location: ../index.php?login=error=1");
				$_SESSION["error"] = "Username/Password Error, Try Again!";
				exit();
			} elseif ($hashedPwdCheck = true) {
				if ($row['u_type'] == "Admin") {
					header("Location: ../main.php");
					$_SESSION["user_name_loggedIn_admin"] = $row['u_username'];
				}
			}
		}
	}
}

 /*subscription from*//*
if (isset($_POST["btnSaveSub"])) {
	$Club_Name = $_POST["txtClubName"];
	$Location = $_POST["txtClubLocation"];

	$sql = "INSERT INTO subscription() VALUES ('" . $ . "',)";  //(cl_name,cl_location) VALUES ('" . $Club_Name . "','" . $Location . "')";

	if ($con->query($sql) === true) {
		$message = "New record created successfully";
		$_SESSION["success"] = $message;
		header("location: ../subscription.php");
	} else {
		$message = "Error: " . $sql . "<br>" . $con->error;
		$_SESSION["error"] = $message;
		header("location: ../subscription..php");
	}

	$con->close();

}*/
