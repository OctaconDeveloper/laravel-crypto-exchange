@php
    use \App\Http\Controllers\Web\NotificationController;
    $logs = (new NotificationController())->fetchBroadcast();
@endphp 
<div class="col-lg-3 col-md-8 col-sm-12 col-xs-12">
    <div class="main-app-container order-container orders-seen" style="height: 400px" >
        <div class="container-title my-trade-history">
            <div>News</div>
            <small>
                <a href="/news">
                    All News
                </a>
            </small>
        </div>
    @forelse($logs as $log)  
        <div class="mainbar_body">
            <div>
                <small><b>{{ date('M d, Y h:i:s a', strtotime($log->created_at)) }}</b></small>
            </div>
            <a class="for_content" href="/news/{{str_replace(" ", "-", strtolower($log->title))}}">
                <div class="content_component_title"><u>{{$log->title}}</u></div>
            </a> 
        </div>
    @empty 
    @endforelse
    </div>
</div> 

<style>
    .mainbar_body{        
        padding: 5px;
        border-bottom: 1px solid #ccc;
        margin-left: 5px;
        font-size: 18px;
    }
    .for_content{
        color: inherit;
        text-decoration: none;
    }
    a{
        background-color: transparent;
        color: #29a001;
        text-decoration: none;
        cursor: pointer;
    }
</style>
 