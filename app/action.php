<?php 	
	include('../config/db.php');
    include('../helpers/helper.php');

    $input = filter_input_array(INPUT_POST);
    $name = purify($input["name"]);
    $email = purify($input["email"]);
    $id = $input["id"];
    
    $errorHolder = array();
    $emailPattern = "/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD";
        



    if($input["action"] === 'edit'){
        if(empty($name)){
            echo "name field is required<br>";
            array_push($errorHolder , array(
                "param" => "name" ,
                "msg" => "name is required",
                "value" => $name
            ));
        }
        if(empty($email)){
            echo "email field is required<br>";
            array_push($errorHolder , array(
                "param" => "email" ,
                "msg" => "email is required",
                "value" => $email
            ));
        }else{
            if (preg_match($emailPattern, $email) === 0) {
                echo "email address is not valid<br>";
                array_push($errorHolder , array(
                    "param" => "email" ,
                    "msg" => " email address is not valid",
                     "value" => $email
                ));
            }else{
                $sql = "SELECT * FROM admins WHERE email = '$email'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    echo "email address already exits<br>";
                    array_push($errorHolder , array(
                        "param" => "email" ,
                        "msg" => "new email address is already taken",
                        "value" => $email
                    ));
                }
            }	
        }

        if(count($errorHolder) == 0){
            $sql = "UPDATE admins SET name = '$name', email = '$email' WHERE id ='$id'"; 
                
            $conn->query($sql); 
        }
        
        
        
    }
    if($input["action"] === 'delete'){
        $sql = "DELETE FROM admins WHERE id ='$id'"; 
         
        $conn->query($sql);
        
    }

    echo json_encode($input);

?>