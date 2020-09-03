@php
    use \App\Http\Controllers\Web\ChatController;
    $chat = (new ChatController())->chat_details();
    $chat_status = $chat->stat;
    $username = $chat->name
@endphp
@if ($chat_status > 0)
    <div class="col-md-10">
        <input type="text" id="chat_message" class="form-control" placeholder="{{ $username }} is typing...">
        <input type="hidden" id="chat_name" value="{{ $username }}>">
    </div>
    <button id="chat_button" class="btn btn-primary col-md-2 room_chat">
        <i class="fa fa-paper-plane"></i>
    </button>
@else
    <button class="btn btn-primary col-md-12 " disabled="disabled">
        {{ $username }} has been blocked.
    </button>
@endif

 <script type="text/javascript">

	$("#chat-foot").keypress(function (e) {
		$key = e.which;
		if($key == 13){
			$chat_message = $("#chat_message").val();
	 		$client_id = $("#client_id").val();
	 		$chat_name = $("#chat_name").val();
	 		if($chat_message){
		 		$.ajax({
                    type: "POST",
                    url: '/save-chat',
                    data: {
                        chat_message : $chat_message,
                    },
		 			success: function(){
		 				$("#chat_message").val('');
		 			}
		 		});
	 		}
		}
	});

 	$("#chat_button").on("click",function(){
 		$chat_message = $("#chat_message").val();
 		if($chat_message){
	 		$.ajax({
	 			type: "POST",
	 			url: '/save-chat',
	 			data: {
	 				chat_message : $chat_message,
	 			},
	 			success: function(){
	 				$("#chat_message").val('');
	 			}
	 		});
 		}
 	});
 </script>
