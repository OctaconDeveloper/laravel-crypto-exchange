@php
    use \App\Http\Controllers\Web\ChatController;
    $chats = (new ChatController())->all_chats();
@endphp

<style type="text/css">
	.name{
		color:green;
		font-weight: 600;
		font-size: 12px;
		font-style: italic;
	}
	.chat{
		font-style: italic;
		font-size: 13px;
	}
</style>

@forelse ($chats as $chat)
<div>
    <img src="{{ asset('img/user.png') }}" style="width:10px; height:10px;">
    <span class="name">{{ $chat->name }}</span>:
    <span class="chat">{{ $chat->message }}</span>
</div>
@empty

@endforelse

