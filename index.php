  <?php include('partials/header.php') ?>
	<!-- content -->
	<div class="jumbotron blue darken-4 black-text" id="jumbo-holder">
  		<div class="container text-center">
    		<h3 class="display-1 text-uppercase">RCCG CTL PP junior church</h3>
    		<p class="lead">welcomes you</p>
    		<a href="#reg-form"><button class="btn my-btn">Let us know you more <i class="fa fa-arrow-down" aria-hidden="true"></i></button></a>
    		
    		
  		</div>
	</div>
	<!-- reg form -->

	<div class="container" id="reg-form">

    <div class="alert">
      
    </div>
    <p>The form label with <sup class="text-danger">*</sup> are required</p>
		<form method="post">
  			<div class="form-row">
   				 <div class="form-group col-xs-12 col-md-4">
      				<label for="firstName" class="col-form-label">First Name <sup class="text-danger">*</sup></label>
      				<input type="text" class="form-control" id="firstName" placeholder="">
              
    			</div>
    			<div class="form-group col-xs-12 col-md-4">
      				<label for="middleName" class="col-form-label">Middle Name</label>
      				<input type="text" class="form-control" id="middleName" placeholder="">
    			</div>
    			<div class="form-group col-xs-12 col-md-4">
      				<label for="lastName" class="col-form-label">Last Name <sup class="text-danger">*</sup></label>
      				<input type="text" class="form-control" id="lastName" placeholder="">
             
   				</div>
  			</div>
  			<div class="form-row">
   				 <div class="form-group col-xs-12 col-md-4">
      				<label for="dob" class="col-form-label">Date Of Birth <sup class="text-danger">*</sup></label>
      				<input type="text" class="form-control" id="dob" placeholder="mm/dd/yyyy">
              
    			</div>	
    			<div class="form-group col-xs-12 col-md-4">
      				<label for="phoneNumber" class="col-form-label">Phone Number <sup class="text-danger">*</sup> </label>
      				<input type="text" class="form-control" id="phoneNumber" placeholder="">
              
    			</div>	
    			<div class="form-group col-xs-12 col-md-4">
      				<label for="sex" class="col-form-label">Sex  <sup class="text-danger">*</sup></label>
      				 <select class="form-control" id="sex">
      				 	   <option>Choose...</option>
      					   <option value="male">Male</option>
      					   <option value="female">Female</option>
    				    </select>
                
    			</div>	
  			</div>
  			<div class="form-row">
   				 <div class="form-group col-xs-12 col-md-4">
      				<label for="emailAddress" class="col-form-label">Email Address <sup class="text-danger">*</sup></label>
      				<input type="email" class="form-control" id="emailAddress" placeholder="example jon@gmail.com">
    			</div>	
    			<div class="form-group col-xs-12 col-md-8">
      				<label for="homeAddress" class="col-form-label">Home Address <sup class="text-danger">*</sup> </label>
      				<input type="text" class="form-control" id="homeAddress" placeholder="">
             
    			</div>	
  			</div>
  			<div class="form-row">
   				<div class="form-group col-xs-12 col-md-6">
      				<label for="city" class="col-form-label">City <sup class="text-danger">*</sup></label>
      				<input type="text" class="form-control" id="city">
              
    			</div>
    			<div class="form-group col-xs-12 col-md-6">
      				<label for="state" class="col-form-label">State <sup class="text-danger">*</sup></label>
      				<input type="text" class="form-control" id="state">
              
    			</div>
  			</div>
  			<div class="form-group">
    			<label for="prayerRequest">Prayer Requests</label>
    			<textarea class="form-control" id="prayerRequest" rows="5"></textarea>
  			</div>
  			
  			<button type="reset" class="btn grey my-btn" id="resetbtn">Reset</button>
  			<button type="submit" class="btn green my-btn" id="submitbtn">Submit</button>
        <img src="img/loading.gif" alt="" width="150" height="100" id="loodinggif" style="margin-left: -55px;">
  			<br>
		</form>
	</div>
	<!-- //reg from -->
	<!-- content -->
      <!-- footer -->
  <footer>
    <div class="page-footer">
      <p class="footer-copyright text-center">
        © 2017. All rights reserved | Designed by rccg pacesetter's teens IT dept.
      </p>
    </div>
  </footer>

  <!-- //footer -->
  <script src="js/jquery.min.js"></script>
  <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  
  
  <script src="js/script.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
