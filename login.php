  <?php include('partials/header.php'); include("helpers/helper.php"); ?>
  <!-- content -->
	
	<div class="container">
		<div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" id="login-holder">
        <br>
        <p class="display-4 text-center">Admin Login</p>
        <!-- login form -->
        <div class="alert">
          
        </div>
      <?php 
        if(isset($_GET['msg'])){
          $msg  = purify($_GET['msg']);
          $msgafter = ",please login!";
          if($msg != "Access denied"){
            $msg = null; 
            $msgafter = null;
          }else{
            echo "<div class='alert alert-danger ssalert'>".$msg.$msgafter."</div>";
          }
          
        } 
      ?>
        <form method="post" autocomplete="false">
          <div class="form-group">
            <label for="email" class="col-form-label">Email</label>
            <input type="text" class="form-control" id="email" placeholder="">
          </div>
          <div class="form-group">
             <label for="password" class="col-form-label">Password</label>
              <div class="input-group">
                <input type="password" class="form-control" id="password" placeholder="">
                <div class="input-group-addon pass-addon">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
         </div>
        <button type="submit" class="btn green my-btn" id="signinbtn">Sign in</button>
        <img src="img/loading.gif" alt="" width="150" height="100" id="loodinggif" style="margin-left: -55px;">

       
      </form>
      <br>
      <!-- //login from -->
      </div>
    </div>
	</div>
	
	<!-- content -->
	  <!-- //footer -->
  <script src="js/jquery.min.js"></script>
  <!-- <script src="js/jquery-3.2.1.slim.min.js"></script> -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/script.js"></script>
  <script>
    $("div.alert").hide(); 
    $(".ssalert").show();
    $("img#loodinggif").hide();
    $("#signinbtn").click(function (e) {
      e.preventDefault();
      var email =  $("#email").val();
      var password =  $("#password").val();
      $(".ssalert").remove();

      $.ajax({
        url: 'app/loginadmin.php',
        type: 'POST',
        data: {email: email, password: password},
        beforeSend: function(){
          $("#signinbtn").hide(); 
          $("img#loodinggif").show();
        },
        success: function(data){
            setTimeout(function(){
              $("#signinbtn").show();
              console.log(data);
              if(data == "Email not found" ){
                $("div.alert").show().removeClass("alert-success").addClass("alert-danger").text(data);
                email =  $("#email").val(null);
                password =  $("#password").val(null);
              }else if(data == "Password is invalid" ){
                $("div.alert").show().removeClass("alert-success").addClass("alert-danger").text(data);
                  password =  $("#password").val(null);
              }else if(data == "Both are valid"){
                $("div.alert").show().removeClass("alert-danger").addClass("alert-success").text("Access granted, please wait...");
                setTimeout(function(){
                  window.location.assign("admin.php");
                },1500);
              }
              
              $("img#loodinggif").hide();
            },1500);
        }
      });
     
    });
  </script>
</body>
</html>