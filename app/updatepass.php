<?php
include('../config/db.php');
include('../helpers/helper.php');
session_start();

if(isset($_POST['oldpass'])){
    $oldpass = purify($_POST["oldpass"]);
    $newpass = purify($_POST["newpass"]);
    $name  = $_SESSION['id'];

    $errorHolder = array();
    if(empty($oldpass)){
        echo "Former password field is required<br>";
        array_push($errorHolder , array(
            "param" => "oldemail" ,
            "msg" => "old password is required",
            "value" => $oldpass
        ));
       }else{
        $oldpasss = md5($oldpass);
        $sql = "SELECT * FROM admins WHERE  id = '$name' AND password = '$oldpasss'";
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            echo "Former pasword is not correct<br>";
            array_push($errorHolder , array(
                "param" => "oldpass" ,
                "msg" => "former pasword is not correct",
                "value" => $oldpass
            ));
        }
    }	




       if(empty($newpass)){
        echo "New password field is required<br>";
        array_push($errorHolder , array(
            "param" => "newpass" ,
            "msg" => "new password is required",
            "value" => $newpass
        )); 
       }else{
          if($oldpass == $newpass){
            echo "New password and former password should not be equal<br>";
            array_push($errorHolder , array(
                "param" => "passwords" ,
                "msg" => "new password is required",
                "value" => $oldpass." ".$newpass
            )); 
          }else{
            $newpass = md5($newpass);
          }

       }
   
       if(count($errorHolder) == 0){
        $sql = "UPDATE admins SET password = '$newpass' WHERE id ='$name'";
        if($conn->query($sql) === TRUE){
            echo "success";
        }else{
            echo $conn->error;
        }
    
       }
    

}
?>