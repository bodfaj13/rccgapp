<?php 
include('config/db.php');
$sql = "SELECT * FROM admins WHERE NOT id = '1' ORDER BY id DESC";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $membersholder = array();
	while($row = $result->fetch_array()){
		echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['email']."</td>
                <td>".$row['level']."</td>
            </tr>";
	}
}else{
	echo "No Record Found!";
}
?>