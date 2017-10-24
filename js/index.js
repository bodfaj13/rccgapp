
    $("div.alert").hide();  
    $("img#loodinggif").hide();
    $("#submitbtn").click(function (e) {
      e.preventDefault();
      var firstName =  $("#firstName").val();
      var middleName =  $("#middleName").val();
      var lastName =  $("#lastName").val();
      var dob = $("#dob").val();
      var phoneNumber =  $("#phoneNumber").val();
      var sex = $("#sex").val();
      var emailAddress = $("#emailAddress").val();
      var homeAddress = $("#homeAddress").val();
      var city = $("#city").val();
      var state = $("#state").val();
      var prayerRequest = $("#prayerRequest").val();

       $.ajax({
        url: 'app/addmember.php',
        type: 'POST',
        data: {firstName: firstName, middleName: middleName, lastName: lastName, dob: dob, phoneNumber: phoneNumber, sex: sex, homeAddress: homeAddress ,emailAddress: emailAddress, city: city, state: state, prayerRequest: prayerRequest},
        beforeSend: function(){
            $("#resetbtn").hide();
            $("#submitbtn").hide();
            $("img#loodinggif").show();
        },
        success: function(data){
            setTimeout(function(){
              if(data == "success"){
                $("div.alert").show().removeClass("alert-danger").addClass("alert-success").text("Details Added Successfully!");
                var firstName =  $("#firstName").val(null);
      var middleName =  $("#middleName").val(null);
      var lastName =  $("#lastName").val(null);
      var dob = $("#dob").val();
      var phoneNumber =  $("#phoneNumber").val(null);
      var sex = $("#sex").val(null);
      var emailAddress = $("#emailAddress").val(null);
      var homeAddress = $("#homeAddress").val(null);
      var city = $("#city").val(null);
      var state = $("#state").val(null);
      var prayerRequest = $("#prayerRequest").val(null);
              }else{
                $("div.alert").show().removeClass("alert-success").addClass("alert-danger").html(data);
              }

            $("#resetbtn").show();
            $("#submitbtn").show();
            $("img#loodinggif").hide();
            },700);
        }
      });
       

    });
