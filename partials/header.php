<?php 
include('config/dbcheck.php');
// session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/font-awesome.css">
  
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!-- nav -->
	<nav class="navbar navbar-expand-lg navbar-light white black-text my-nav fixed-top">
  		<div class="container">
  			<a class="navbar-brand" href="index.php">
  			<img src="img/redeem.png" width="30" height="30" class="d-inline-block align-top" alt="">
  			RCCG PACESETTERS
  			</a>
  			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    			<span class="navbar-toggler-icon"></span>
  			</button>

  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
      				<li class="nav-item active">
        				<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      				</li>
      				<li class="nav-item dropdown">
        				<a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Member</a>

        				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    						<a class="dropdown-item" href="index.php#reg-form"><i class="fa fa-user-plus" aria-hidden="true"></i> New Member</a>
    						<a class="dropdown-item" href="login.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
  						</div>
      				</li>
      				
    			</ul>
    		
  			</div>
  		</div>
	</nav>
	<!-- //nav -->