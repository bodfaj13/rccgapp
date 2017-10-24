<?php 
function purify($data){
	$input = trim($data);
	$input = stripcslashes($data);
	$input = strip_tags($data);
	$input = htmlspecialchars($data);
	return $data;
}
?>
