<?php
include('../config/db.php');
include('../helpers/helper.php');
session_start();

if(isset($_POST['oldemail'])){
    $oldemail = purify($_POST["oldemail"]);
    $newemail = purify($_POST["newemail"]);
    $name  = $_SESSION['id'];

    $errorHolder = array();
    $emailPattern = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
    

    

    if(empty($oldemail)){
        echo "Former email field is required<br>";
        array_push($errorHolder , array(
            "param" => "oldemail" ,
            "msg" => "oldemail email is required",
            "value" => $oldemail
        ));
    }else{
        if (preg_match($emailPattern, $oldemail) === 0) {
            echo "New email address is not valid<br>";
            array_push($errorHolder , array(
                "param" => "oldemail" ,
                "msg" => "oldemail email address is not valid",
                 "value" => $oldemail
            ));
        }else{
            if($oldemail != $_SESSION['email']){
                echo "Old email address is not correct<br>";
                array_push($errorHolder , array(
                    "param" => "oldemail" ,
                    "msg" => "oldemail email address is not correct",
                     "value" => $oldemail
                ));
            }
        }	
    }





    if(empty($newemail)){
        echo "New email field is required<br>";
        array_push($errorHolder , array(
            "param" => "newemail" ,
            "msg" => "new email is required",
            "value" => $newemail
        ));
   }else{
    if (preg_match($emailPattern, $newemail) === 0) {
        echo "New email address is not valid<br>";
        array_push($errorHolder , array(
            "param" => "newemail" ,
            "msg" => "new email address is not valid",
            "value" => $newemail
        ));
    }else{
        $sql = "SELECT * FROM admins WHERE email = '$newemail'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo "New email address already exits<br>";
            array_push($errorHolder , array(
                "param" => "newemail" ,
                "msg" => "new email address is already taken",
                "value" => $newemail
            ));
        }
    }	
   }
   

   if(count($errorHolder) == 0){
    $sql = "UPDATE admins SET email = '$newemail' WHERE id ='$name'";
    if($conn->query($sql) === TRUE){
        echo "success";
    }else{
        echo $conn->error;
    }

   }
   

    

}
?>