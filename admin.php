<?php 
  include('config/dbcheck.php');
  include("helpers/helper.php");
  session_start(); 

  if(!isset($_SESSION['email']) && !isset($_SESSION['name']) && !isset($_SESSION['level'])){
    $msg = "Access denied";
    header("Location: login.php?msg=".purify($msg));
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard Template for Bootstrap</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link href="css/dashboard.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <!-- <link href="css/datatables.min.css" rel="stylesheet"> -->
    <!-- <link href="css/jquery.dynatable.css" rel="stylesheet"> -->
  </head> 

  <body>
    <nav class="navbar navbar-expand-lg navbar-light  navbar-dark fixed-top bg-dark" my-nav fixed-top">
      
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
                <a class="nav-link" href="index.php"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
              </li>
               
              <li class="nav-item hide-on-med-and-up">
              <a class="nav-link active vm" href="#"><!-- <i class="fa fa-tachometer" aria-hidden="true"></i> --> View Members <span class="sr-only">(current)</span></a>
              </li>

              
            <?php 
            if($_SESSION['level'] > 0){
              ?>
              <li class="nav-item hide-on-med-and-up">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#addadminmodal"><!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->  Add Admins</a>
            </li>
              <li class="nav-item hide-on-med-and-up">
              <a class="nav-link va" href="#"><!-- <i class="fa fa-tachometer" aria-hidden="true"></i> --> View Admins </a>
            </li> 
            <?php
              }
            ?>
            <li class="nav-item hide-on-med-and-up">
              <a class="nav-link" href="#"  data-toggle="modal" data-target="#settings"><!-- <i class="fa fa-cog" aria-hidden="true"></i> -->  Settings</a>
            </li>
            <li class="nav-item hide-on-med-and-up">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logout"><!-- <i class="fa fa-sign-out" aria-hidden="true"></i> --> Logout</a>
            </li>
          </ul>
          <form class="form-inline mt-2 mt-md-0 admintablesearch">
            <input class="form-control mr-sm-2 " type="text" placeholder="Search names..." aria-label="Search" id="myInputa" onkeyup="myFunctiona()">

          </form>
          <form class="form-inline mt-2 mt-md-0 membertablesearch">
            <input class="form-control mr-sm-2 " type="text" placeholder="Search names..." aria-label="Search" id="myInputm" onkeyup="myFunctionm()">

          </form>
        </div>
      
  </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-sm-1 col-md-1 d-none d-sm-block bg-light sidebar">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link active vm" href="#"><!-- <i class="fa fa-tachometer" aria-hidden="true"></i> --> View Members <span class="sr-only">(current)</span></a>
            </li>
            
            <?php 
              if($_SESSION['level'] > 0){
                ?>
                <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#addadminmodal"><!-- <i class="fa fa-user-plus" aria-hidden="true"></i> -->  Add Admins</a>
            </li>
                <li class="nav-item">
              <a class="nav-link va" href="#"><!-- <i class="fa fa-tachometer" aria-hidden="true"></i> --> View Admins </a>
            </li> 
            <?php
              }
            ?>
            <li class="nav-item">
              <a class="nav-link" href="#"   data-toggle="modal" data-target="#settings"><!-- <i class="fa fa-cog"></i> -->  Settings</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#" data-toggle="modal" data-target="#logout"><!-- <i class="fa fa-sign-out" aria-hidden="true"></i> --> Logout</a>
            </li>
          </ul>
        </nav>

        <main class="col-sm-11 ml-sm-auto col-md-11 pt-3 grey" role="main">
          <h1>Administrator Dashboard</h1>


          
          <div class="table-responsive">
          <h2>Members Details</h2>
              <table id="memberstable" class="table table-bordered table-striped">
                <thead class="thead-inverse">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>DOB</th>
                    <th>Phone Number</th>
                    <th>Sex</th>
                    <th>Email</th>
                    <th>Home Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Prayer Request</th>
                    
                  </tr>
                </thead>
                <tbody>
                <?php include('app/showmember.php') ?>
                </tbody>
              </table>
              <table id="admintable" class="table table-bordered table-striped">
                <thead class="thead-inverse">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Level</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php include('app/showadmins.php') ?>
                </tbody>
              </table>

          </div>

          <!-- <div class="align-center">
            
            <nav aria-label="...">
            <ul class="pagination">
              <li class="page-item disabled">
                <span class="page-link">Previous</span>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item active">
                <span class="page-link">
                  2
                  <span class="sr-only">(current)</span>
                </span>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
          </nav>
          </div> -->
        </main>
      </div>
    </div>


    <!-- modals -->
    <div class="modal fade" id="addadminmodal" tabindex="-1" role="dialog" aria-labelledby="addadminmodal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addadminmodal"><i class="fa fa-user-plus" aria-hidden="true"></i>  Add Admins</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
      <div class="alert addadminalert">
        
      </div>
        <form>
          <div class="form-group">
            <label for="name" class="form-control-label">Name</label>
            <input type="text" class="form-control" id="addadminname">
          </div>
          
          <div class="form-group">
            <label for="email" class="form-control-label">Email</label>
            <input type="email" class="form-control" id="addadminemail">
          </div>
          <div class="form-group">
            <label for="globaladmin" class="form-control-label">Global Admin?</label>
            <select class="form-control" id="globaladmin">
      				<option>Choose...</option>
      				<option value="yes">Yes</option>
      				<option value="no">No</option>
    				</select>
          </div>
          <div class="form-group">
            <label for="password" class="form-control-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="addadminpassword" placeholder="">
                <div class="input-group-addon pass-addon">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="conpassword" class="form-control-label">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="addadminconpassword" placeholder="">
                <div class="input-group-addon pass-addon">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger my-btn" data-dismiss="modal" id="addadminclose">Close</button>
        <button type="button" class="btn green my-btn" id="addadminbtn">Add Admin</button>
       <img src="img/loading.gif" alt="" width="150" height="100" id="loodinggif" style="margin: -10px;">
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="settings" tabindex="-1" role="dialog" aria-labelledby="settings" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="settings"><i class="fa fa-cog" aria-hidden="true"></i>  Settings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <ul class="nav nav-tabs">

  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="#emailtab" role="tab">Email</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="#passwordtab" role="tab">Password</a>
  </li>
</ul>


      <div class="tab-content">
 
  <div class="tab-pane active" id="emailtab" role="tabpanel">
  <div class="alert updateemailalert">

  </div>
    <form>
          <div class="form-group">
            <label for="oldemail" class="form-control-label">Former Email</label>
            <input type="text" class="form-control" id="oldemail">
          </div>
          <div class="form-group">
            <label for="newemail" class="form-control-label">New Email</label>
            <input type="text" class="form-control" id="newemail">
          </div>
         <button type="button" class="btn green my-btn" id
         ="updateemailbtn">Update Email</button>
         <img src="img/loading.gif" alt="" width="150" height="100" id="loodinggif" style="margin-left: -30px;">
        </form>
  </div>
  <div class="tab-pane fade" id="passwordtab" role="tabpanel">
  <div class="alert updatepassalert">

  </div>
    <form>
          <div class="form-group">
            <label for="oldpass" class="form-control-label">Former Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="oldpass" placeholder="">
                <div class="input-group-addon pass-addon">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
          </div>
          <div class="form-group">
            <label for="newpass" class="form-control-label">New Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="newpass" placeholder="">
                <div class="input-group-addon pass-addon">
                  <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
            </div>
          </div>
         <button type="button" class="btn green my-btn" id="updatepassbtn">Update Password</button>
         <img src="img/loading.gif" alt="" width="150" height="100" id="loodinggif" style="margin-left: -30px;">
        </form>
  </div>
  
</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger my-btn" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<div class="modal fade " id="logout" tabindex="-1" role="dialog" aria-labelledby="logout" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="addadminmodal">  Are you sure you want to logout?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
      </div>
      <div class="modal-body">
        <button type="button" class="btn btn-danger my-btn" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary my-btn" id="logoutbtn">Confirm</button>
      </div>
      
    </div>
  </div>
  </div>
</div>

    <script src="js/jquery.min.js"></script>
  <!-- <script src="js/jquery -3.2.1.slim.min.js"></script> -->
  <!-- <script src="js/datatables.min.js"></script> -->
  <!-- <script src="js/jquery.dynatable.js"></script> -->
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.tabledit.js"></script>
    <script src="js/scripts.js"></script>
    
    <script>
      $("#logoutbtn").click(function(){
        window.location.assign("logout.php");
      });
      $("img#loodinggif").hide();
      $(".addadminalert").hide();
      $(".updateemailalert").hide();
      $(".updatepassalert").hide();
      
      $("#addadminbtn").click(function(e){
        e.preventDefault();
        var name = $("#addadminname").val();
        var email = $("#addadminemail").val();
        var globaladmin = $("#globaladmin").val();
        var password  = $("#addadminpassword").val();
        var conpassword = $("#addadminconpassword").val();

        $.ajax({
          url: 'app/addadmin.php',
          type: 'POST',
          data: {name: name, email: email, globaladmin: globaladmin,password: password, conpassword: conpassword},
          beforeSend: function(){
            $("#addadminclose").hide();
            $("#addadminbtn").hide();
            $("img#loodinggif").show();
          },
          success: function(data){
            setTimeout(function(){
              
              if(data == "success"){
                $(".addadminalert").show().addClass("alert-success").removeClass("alert-danger").html("Admin added successfully");
                $("#addadminname").val(null);
                $("#addadminemail").val(null);
                $("#globaladmin").val(null);
                $("#addadminpassword").val(null);
                $("#addadminconpassword").val(null);
              }else{
                $(".addadminalert").show().addClass("alert-danger").removeClass("alert-success").html(data);
              }
            
              $("#addadminclose").show();
              $("#addadminbtn").show();
              $("img#loodinggif").hide();
            }, 1500);
          }
        })
      });
      $("#updateemailbtn").click(function(e){
        e.preventDefault();
        var oldemail = $("#oldemail").val();
        var newemail = $("#newemail").val();
       

        $.ajax({
          url: 'app/updateemail.php',
          type: 'POST',
          data: {oldemail: oldemail, newemail: newemail},
          beforeSend: function(){
            $("#updateemailbtn").hide();
            $("img#loodinggif").show();
          },
          success: function(data){
            setTimeout(function(){
              
              
                if(data == "success"){
                  $(".updateemailalert").show().addClass("alert-success").removeClass("alert-danger").html("Email updated successfully, logining out in a bit");
                  setTimeout(function(){
                    window.location.assign("logout.php");
                  },1500);
                $("#newemail").val(null);

                }else{
                  $(".updateemailalert").show().addClass("alert-danger").removeClass("alert-success").html(data);
                }
              $("#updateemailbtn").show();
              $("img#loodinggif").hide();
            }, 1500);
          }
        })
      });

      $("#updatepassbtn").click(function(e){
        e.preventDefault();
        var oldpass = $("#oldpass").val();
        var newpass = $("#newpass").val();
       

        $.ajax({
          url: 'app/updatepass.php',
          type: 'POST',
          data: {oldpass: oldpass, newpass: newpass},
          beforeSend: function(){
            $("#updatepassbtn").hide();
            $("img#loodinggif").show();
          },
          success: function(data){
            setTimeout(function(){
                if(data == "success"){
                  $(".updatepassalert").show().addClass("alert-success").removeClass("alert-danger").html("Password updated successfully, logining out in a bit");
                  setTimeout(function(){
                    window.location.assign("logout.php");
                  },1500);
                $("#oldpass").val(null);
                $("#newpass").val(null);
                }else{
                  $(".updatepassalert").show().addClass("alert-danger").removeClass("alert-success").html(data);
                }
              $("#updatepassbtn").show();
              $("img#loodinggif").hide();
            }, 1500);
          }
        })
      });

      $('#admintable').Tabledit({
          url: 'app/action.php',
          editButton: false,
          columns:{
            identifier:[0, "id"],
            editable: [[1,"name"],[2,"email"]]
          },
          restoreButton: false,
          onSuccess: function(data, textStatus, jqXHR){
            if(data.action == "delete"){
              $("#"+data.id).remove();
            }
            
          }
          
      });


     
          

      $("#admintable").hide();
      $(".admintablesearch").hide();

      $(".vm").click(function(){
        $("#memberstable").show().parent().find("h2").text("Members Details");
        $("#admintable").hide();
        $(".admintablesearch").hide();
        $(".membertablesearch").show();
      });
      $(".va").click(function(){
        $("#admintable").show().parent().find("h2").text("Admin Details");
        $("#memberstable").hide();
        $(".admintablesearch").show();
        $(".membertablesearch").hide();
      });

    </script>
  </body>
</html>
