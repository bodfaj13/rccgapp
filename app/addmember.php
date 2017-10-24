<?php 	
	include('../config/db.php');
	include('../helpers/helper.php');

	if(isset($_POST['firstName'])){
	$firstName = purify($_POST["firstName"]);
	$middleName = purify($_POST["middleName"]);
	$lastName = purify($_POST["lastName"]);
	$phoneNumber = purify($_POST["phoneNumber"]);
	$dob = purify($_POST["dob"]);
	$sex = purify($_POST["sex"]);
	$emailAddress = purify($_POST["emailAddress"]);
	$homeAddress = purify($_POST["homeAddress"]);
	$city = purify($_POST["city"]);
	$state = purify($_POST["state"]);
	$prayerRequest = purify($_POST["prayerRequest"]);

	$errorHolder = array();
	$emailPattern = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";

	if(empty($firstName)){
		echo "First name field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "firstName" ,
	 	 	"msg" => "Firstname is required",
	 	 	"value" => $firstName
	 	 ));
	 }
	if(empty($lastName)){
		echo "Last name field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "lastName" ,
	 	 	"msg" => "Lastname is required",
	 	 	"value" => $middleName
	 	 ));
	 }
	 if(empty($dob)){
		echo "Date of Birth field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "dob" ,
	 	 	"msg" => "Date of Birth is required",
	 	 	"value" => $dob
	 	 ));
	 }
	 if(empty($phoneNumber)){
		echo "Phone number field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "phoneNumber" ,
	 	 	"msg" => "Phonenumber is required",
	 	 	"value" => $phoneNumber
	 	 ));
	 }
	 if(empty($sex)){
		echo "Sex field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "sex" ,
	 	 	"msg" => "Sex is required",
	 	 	"value" => $sex
	 	 ));
	 }else{
		if($sex == "male" || $sex == "female"){
			
	 	}else{
			echo "Sex field is not answered correctly<br>";
			array_push($errorHolder , array(
				"param" => "$sex" ,
				"msg" => "Sex field is not answered correctly",
				"value" => $sex
			));
		 }

	}

	 if(empty($city)){
		echo "City field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "city" ,
	 	 	"msg" => "City is required",
	 	 	"value" => $city
	 	 ));
	 }
	 if(empty($state)){
		echo "State field is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "state" ,
	 	 	"msg" => "State is required",
	 	 	"value" => $state
	 	 ));
	 }

	if($emailAddress){
		if (preg_match($emailPattern, $emailAddress) === 0) {
			echo "Email address is not valid<br>";
    		array_push($errorHolder , array(
	 	 		"param" => "emailAddress" ,
	 	 		"msg" => "Email Address is not valid",
	 	 		"value" => $emailAddress
	 	 	));
		}else{
			$sql = "SELECT * FROM members WHERE email = '$emailAddress'";
			$result  = $conn->query($sql);
			if ($result->num_rows > 0) {
				echo "Email address already exists<br>";
				array_push($errorHolder , array(
					 "param" => "emailAddress" ,
					 "msg" => "Email address already exists",
					 "value" => $emailAddress
				 ));
			}
		}	
	}
	if(empty($homeAddress)){
		echo "Home address is required<br>";
	 	 array_push($errorHolder , array(
	 	 	"param" => "homeAddress" ,
	 	 	"msg" => "Home address is required",
	 	 	"value" => $homeAddress
	 	 ));
	 }
	 
	 
	 if(count($errorHolder) == 0){
	 	$sql = "INSERT INTO members VALUES ('','$firstName','$middleName','$lastName','$dob','$phoneNumber','$sex','$emailAddress','$homeAddress','$city','$state','$prayerRequest')";
	 		if($conn->query($sql) === TRUE){
	 			echo "success";
	 		}else{
	 			echo $conn->error;
	 		}
	 	}


	}
	 

?>