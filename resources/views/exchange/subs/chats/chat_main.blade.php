@php
    use \App\Http\Controllers\Web\ChatController;

@endphp
<div class="container-title my-trade-history">
    <div>{{ ucfirst(strtolower(env('APP_NAME'))) }} Trollbox</div>
</div>
<div class="trading-history">
    @if (auth()->user())
        @php $chat_count = (new ChatController())->is_chat(); @endphp
        @if(!$chat_count)
            <div id="cfg" class="config_chat" style="height: 85%">
                <div class="col-md-12" style="margin-top: 20px;">
                    <p>Hi! We noticed that this is your first time chatting here, kindly set up your chat username</p>
                    <br/><br/>
                    <label>Enter Chat Name</label>
                    <input type="text" id="chat-name" class="form-control">
                </div>
                <button id="chat-config" class="btn btn-primary col-md-12">
                    Save
                </button>
            </div>
            <div id="chat-body" style="margin-bottom: 15px; height: 81%; overflow-x: hidden; display: none;">
            </div>
            <div id="chat-foot" class="row room_chat" style="display: none;">
            </div>
        @else
            <div id="chat-body" style="margin-bottom: 15px; height: 81%; overflow-x: hidden;">
            </div>
        @endif
        <div id="chat-foot" class="row room_chat"></div>
    @else
        <div id="log" align="center" style="margin-top:40%;">
            <p>Welcome Guest! Kindly login or create account to enter chat room</p>
            <div class="row" style="margin:20px">
                <a href="/user/signin">
                <span class="btn btn2 btn-primary ng-star-inserted">
                    Signin
                </span>
                </a>
                <a href="/user/signup">
                <span class="btn btn2 btn-success ng-star-inserted">
                    Sigup
                </span>
                </a>
            </div>
        </div>
    @endif

<style type="text/css">
    #log{
        font-size: 14px;
        font-weight: 800;
    }
    a{
        text-decoration: none;
    }
    .btn2{
        width: 100px;
        margin:20px;
        height: 50px;
        font-size: 16px;
        font-weight: 800;
        padding: 10px;
    }
</style>

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
    function updateScroll(){
      var element = document.getElementById("chat-body");
      element.scrollTop = element.scrollHeight;
    }

      $("#chat-foot").load('/chats/send');

      setInterval(function(){
        $("#chat-body").load('/chats/room');
        updateScroll();
      }, 100);


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



    $("#chat-config").click(function(){
      $chat_name = $("#chat-name").val();
      if($chat_name){
        $.ajax({
          type: "POST",
          url: '/save-chat-name',
          data: {
            chat_name : $chat_name,
          },
          success: function(data){ 
            $dt = JSON.parse(data);
            if($dt.type=='success'){
              $(".config_chat").hide();
              $(".room_chat").show();
              $("#chat-body").show();
              $("#chat-foot").show();
              _success($dt.msg);
            }else{
              _danger($dt.msg);
            }
          }
        });
      }else{
        _warning("Username can not be empty");
      }
    });
  </script>
