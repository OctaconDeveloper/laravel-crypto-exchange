<div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
    <div class="main-app-container order-container orders-seen" id="chat"  style="height: 600px" >
      <div class="Load_overlay" align="center" >
         <img src="{{ asset('img/loader.gif') }}" width="400px" height="350px" alt="Loading" />
      </div>
    </div>
</div>

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
   $("#chat").load('/chats/chat');
</script>
