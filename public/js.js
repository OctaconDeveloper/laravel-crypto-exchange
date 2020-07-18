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


$("#chat-button").click(function(){
	$message = $("#chat-message").val();
	$clientID = $("#clientID").val();
	$clientEmail = $("#clientEmail").val();
	$.ajax({
		type: "POST",
		url: 'query.php',
		data: {
			action: 'chat', 
			message : $message,
			clientID: $clientID,
			clientEmail: $clientEmail
		},
		success: function(data){
			$("#chat-message").val("");
		}
	});
}); 