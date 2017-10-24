<?php 
include('config/db.php');
$sql = "SELECT * FROM members ORDER BY id DESC";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $membersholder = array();
	while($row = $result->fetch_array()){
		echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['first_name']." ".$row['middle_name']." ".$row['last_name']."</td>
                <td>".$row['dob']."</td>
                <td>".$row['phone_number']."</td>
                <td>".$row['sex']."</td>
                <td>".$row['email']."</td>
                <td>".$row['home_address']."</td>
                <td>".$row['city']."</td>
                <td>".$row['state']."</td>
                <td>".$row['prayer_request']."</td>
            </tr>";
	}
}else{
	echo "No Record Found!";
}
?>