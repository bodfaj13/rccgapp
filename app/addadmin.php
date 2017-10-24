<?php
include('../config/db.php');
include('../helpers/helper.php');

if(isset($_POST['email'])){
    $name = purify($_POST["name"]);
    $email = purify($_POST["email"]);
    $globaladmin = purify($_POST["globaladmin"]);
    $password = purify($_POST["password"]);
    $conpassword = purify($_POST["conpassword"]);
    $level = 0;
    $date = date("Y-m-d");

    $errorHolder = array();
    $emailPattern = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
    

    if(empty($name)){
        echo "Name field is required<br>";
        array_push($errorHolder , array(
            "param" => "name" ,
            "msg" => "name is required",
            "value" => $name
        ));
   }
    if(empty($email)){
        echo "Email field is required<br>";
        array_push($errorHolder , array(
            "param" => "email" ,
            "msg" => "email is required",
            "value" => $email
        ));
   }else{
    if (preg_match($emailPattern, $email) === 0) {
        echo "Email address is not valid<br>";
        array_push($errorHolder , array(
            "param" => "email" ,
            "msg" => "email address is not valid",
            "value" => $email
        ));
    }else{
        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "Email address already exits<br>";
            array_push($errorHolder , array(
                "param" => "email" ,
                "msg" => "email address is already taken",
                "value" => $email
            ));
        }
    }	
   }
   if(empty($globaladmin)){
    echo "Global Admin not answered<br>";
    array_push($errorHolder , array(
        "param" => "$globaladmin" ,
        "msg" => "global admin  not answered",
        "value" => $globaladmin
    ));
   }else{
    if($globaladmin == "yes" || $globaladmin == "no"){
        if($globaladmin == "yes"){
            $level = 1;
        }
    }else{
        echo "Global Admin  not answered correctly<br>";
        array_push($errorHolder , array(
            "param" => "$globaladmin" ,
            "msg" => "global admin  not answered correctly",
            "value" => $globaladmin
        ));
    }
   }


   if(empty($password)){
    echo "Password field is required<br>";
    array_push($errorHolder , array(
        "param" => "password" ,
        "msg" => "password is required",
        "value" => $password
    ));
   }
   if(empty($conpassword)){
    echo "Confirm Password field is required<br>";
    array_push($errorHolder , array(
        "param" => "conpassword" ,
        "msg" => "conpassword is required",
        "value" => $conpassword
    ));
   }else{
       if($password != $conpassword){
            echo "Passwords don't tally<br>"; 
            array_push($errorHolder , array(
                "param" => "passwords" ,
                "msg" => "passwords is required",
                "value" => $password." ".$conpassword
            ));
       }else{
           $password = md5($password);
       }
   }

   if(count($errorHolder) == 0){
    $sql = "INSERT INTO admins VALUES ('','$name','$email','$password','$level','$date')";
    if($conn->query($sql) === TRUE){
        echo "success";
    }else{
        echo $conn->error;
    } 
   }

}
?>