// use 'strict'
$(document).ready(function(){

	// alert("hello");
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

	$(".copy1").click(function(){
  		$copyText = $("#cprt");
  		$copyText.focus();
   		$copyText.select();
   		// $copyText.setSelectionRange(0, 99999);
		 document.execCommand("copy");
		_success('copied to clipboard');
	});

	$(".copy2").click(function(){
  		$copyText = $("#reflink");
  		$copyText.focus();
   		$copyText.select();
   		// $copyText.setSelectionRange(0, 99999);
		 document.execCommand("copy");
		_success('copied to clipboard');
	});

	//function to check password
	function checkPassword($sql){
		var upperCase= new RegExp('[A-Z]');
		var lowerCase= new RegExp('[a-z]');
		var numbers = new RegExp('[0-9]');

		if($sql.match(upperCase) && $sql.match(lowerCase) &&   $sql.match(numbers) && $sql.length >= 8)  
		{
			return 1;
		}else{
			return 0;
		}
	}

	function check2FA($sql){
		var numbers = new RegExp('[0-9]');
		if($sql.match(numbers) && $sql.length >= 6)  
		{
			return 1;
		}else{
			return 0;
		}
	}
// updatePassword
	$("#resetpassword").keyup(function(){
		$vl = $("#resetpassword").val();
		$tt = checkPassword($vl);
		if($tt == 1){
		 	$(".check-psw").removeClass("error-border");
		 	$(".rs1").removeClass("fa-times");
		 	$(".rs1").addClass("fa-check").css("color","green");
		 	
		}else{
			$(".check-psw").addClass("error-border");
		 	$(".rs1").addClass("fa-times").css("color","red");		 	
		}
	});

	$("#resetconfirmPassword").keyup(function(){
		$vl = $("#resetpassword").val();
		
		if($(this).val() == $vl){
		 	$(".psw2").removeClass("error-border");
		 	$("#updatePassword").removeAttr("disabled");
		 	$(".rs2").removeClass("fa-times");
		 	$(".rs2").addClass("fa-check").css("color","green");
		 	
		}else{
			$(".psw2").addClass("error-border");
			$("#updatePassword").attr("disabled","disabled");
		 	$(".rs2").addClass("fa-times").css("color","red");		 	
		}
	});

	$("#updatePassword").on("click", function(){
		$pass = $("#resetpassword").val();
		$pass2 = $("#resetconfirmPassword").val();
		$.ajax({
           type: "POST",
           url: '../query.php',
           data: {
           	action: 'updatePassword',
           	pass1 : $pass,
           	pass2: $pass2
           }, // serializes the form's elements.
           success: function(data){
               _success(data);
              $("#resetpassword").val('');
              $("#resetconfirmPassword").val('');
               $("#pwc-form").toggleClass('show');
           }
         });		
	});

	//TWOFA
	$("#upcode").keyup(function(){
		$tt = check2FA($(this).val());
		if($tt == 1){
			$("#update2FA").removeAttr("disabled");
		}else{
			$("#update2FA").attr("disabled","disabled");
		}
	});

	$("#update2FA").on("click", function(){
		$upcode = $("#upcode").val();
		$.ajax({
           type: "POST",
           url: '../query.php',
           data: {
           	action: 'update2FA',
           	upcode : $upcode
           }, // serializes the form's elements.
           success: function(data){
           	$dt = JSON.parse(data);
           	($dt.type=='success')? _success($dt.msg) : _danger($dt.msg);
              $("#upcode").val('');
               $("#tfa-form").toggleClass('show');
           }
         });
	});

	$(".fb_invite").on("click", function(){
		$ref = $("#reflink").val();
		$refMsg = $("#refMsg").text();
		$msg = $refMsg+" \n"+$ref;
		$link ="https://www.facebook.com/sharer/sharer.php?u"+$msg;
		window.open($link,'_blank');
	});

	$(".tw_invite").on("click", function(){
		$ref = $("#reflink").val();
		$refMsg = $("#refMsg").text();
		$siteUrl = $("#siteUrl").val();
		$msg = $refMsg+" \n"+$ref;
		$link ="http://twitter.com/share?text="+$msg+"&url="+$siteUrl+"&hashtags=Crypto,Exchange,Referral,BTC,ETH";
		window.open($link,'_blank');
	});

	$(".linkd_invite").on("click", function(){
		$ref = $("#reflink").val();
		$refMsg = $("#refMsg").text();
		$siteUrl = $("#siteUrl").val();
		$msg = $refMsg+" \n"+$ref;
		$link ="https://www.linkedin.com/shareArticle?mini=true&url"+$siteUrl+"&title=Referral%20Program&summary="+$msg+"source=LinkedIn";
		window.open($link,'_blank');
	});

	
	$(".dropdown").click(function(){
			console.log("hello");
			 $(".caret").addClass("transform-caret");
		});


	  // alert('hello');

});
