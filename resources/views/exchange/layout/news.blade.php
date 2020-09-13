@php
    use \App\Http\Controllers\Web\NotificationController;
    $logs = (new NotificationController())->fetchBroadcast();
@endphp 
<div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
    <div class="main-app-container order-container orders-seen" style="height: 400px" >
    News flow here
    <br/>
    {{ $logs }}
    </div>
</div>

