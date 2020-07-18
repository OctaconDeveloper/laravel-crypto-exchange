

 //noty functions
	function _success($sql){
		new Noty({
		    type: 'success',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _warning($sql){
		new Noty({
		    type: 'warning',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _danger($sql){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

// 	var code = document.getElementById("userpassword");
// var strengthbar = document.getElementById("password-progress");
// var display = document.getElementsById("errorMsg");

// code.addEventListener("keyup", function() {
//   checkpassword(code.value);
// });


function checkpassword(password) {
  var strength = 0;
  if (password.match(/[a-z]+/)) {
    strength += 1;
  }
  if (password.match(/[A-Z]+/)) {
    strength += 1;
  }
  if (password.match(/[0-9]+/)) {
    strength += 1;
  }
  if (password.match(/[$@#&!]+/)) {
    strength += 1;

  }
  switch (strength) {
    case 0:
      return 0;
      break;

    case 1:
      return 25;
      break;

    case 2:
      return 50;
      break;

    case 3:
      return 75;
      break;

    case 4:
     return 100;
      break;
  }
}

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}

	$("#userpassword").keyup(function(){
		$vl = $("#userpassword").val();
		$("#password-progress").toggleClass('hide');
		$tt = checkpassword($vl);
		$("#password-progress").val($tt);
		$("#userpasswordconfirm").val("");
		if ($vl.length < 6) {
			$("#errorMsg").html("minimum number of characters is 6");
			$("#userpasswordconfirm").attr("disabled","disabled");
		}else
		if ($vl.length > 13) {
		    $("#errorMsg").html("maximum number of characters is 13");
		    $("#userpasswordconfirm").attr("disabled","disabled");
		}else if($tt < 100){
		    $("#errorMsg").html("password should contain atleast One Uppercase, One SmallCase, One Numer and One Special Character");
		    $("#userpasswordconfirm").attr("disabled","disabled");
		}else{
			$("#errorMsg").html("");
			$("#userpasswordconfirm").removeAttr("disabled");
		}

		$("#createaccount").attr("disabled","disabled");

	});

	$("#userpasswordconfirm").keyup(function(){
		$vl = $("#userpasswordconfirm").val();
		$lv = $("#userpassword").val();
		if ($vl!=$lv) {
			$("#errorMsg2").html("Please enter the same password");
			$("#createaccount").attr("disabled","disabled");
		}else
		if(!$("#useremail").val()){
			$("#errorMsg2").html("");
			$("#errorMeg").html("Please provide your email address");
			$("#createaccount").attr("disabled","disabled");
		}else{
			$("#errorMsg2").html("");
			$("#errorMeg").html("");
			$("#createaccount").removeAttr("disabled");
		}
	});

	$("#useremail").keyup(function(){
		$ht = $("#useremail").val();
		$vl = $("#userpasswordconfirm").val();
		$lv = $("#userpassword").val();
		$gt = isEmail($ht);
		if($gt!=true){
			$("#errorMail").html("Invalid email address");
			$("#createaccount").attr("disabled","disabled");
		}else
		if(!$vl){
			$("#errorMeg").html("Password is required");
			$("#errorMail").html("");
			$("#createaccount").attr("disabled","disabled");
		}else{
			$("#errorMail").html("");
			$("#errorMeg").html("");
			$("#createaccount").removeAttr("disabled");
		}

		// alert($ht);
			// $("#errorMail").html($gt);
	});



	$(".reveal").click(function(){
		$('#loginpassword').attr('type', function(index, attr){
			return attr == 'text' ? 'password' : 'text';
		});
	});

	$("#loginemail").keyup(function(){
		$("#errorMsg").html("");
		$("#errorMeg").html("");
		$("#successMeg").html("");
		$ht = $("#loginemail").val();
		$gt = isEmail($ht);
		if($gt!=true){
			$("#errorMail").html("Invalid email address");
			$("#login").attr("disabled","disabled");
		}else if(!$("#loginpassword").val()){
			$("#errorMail").html("");
			$("#errorMsg").html("Password is required");
			$("#login").attr("disabled","disabled");
		}else{
			$("#errorMail").html("");
			$("#login").removeAttr("disabled");
		}

	});

	$("#loginpassword").keyup(function(){
		$("#errorMsg").html("");
		$("#errorMeg").html("");
		$("#successMeg").html("");
		$ht = $("#loginpassword").val();
		if($ht.length < 6){
			$("#errorMail").html("");
			$("#errorMsg").html("Password must be greater than 6 characters");
			$("#login").attr("disabled","disabled");
		}else
		if($ht < 0){
			$("#errorMail").html("");
			$("#errorMsg").html("Password is required");
			$("#login").attr("disabled","disabled");
		}else{
			$("#errorMail").html("");
			$("#errorMsg").html("");
			$("#login").removeAttr("disabled");
		}

	});

