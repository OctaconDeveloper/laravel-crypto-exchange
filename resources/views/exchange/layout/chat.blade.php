<div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
    <div class="main-app-container order-container orders-seen" id="chat"  style="height: 430px" >
      <div class="Load_overlay"  style="margin-top: 40%">
            <img src="{{ asset('img/loader.gif') }}" alt="Loading" />
       </div>
    </div>
</div>

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
   $("#chat").load('/chats/chat');
</script>
