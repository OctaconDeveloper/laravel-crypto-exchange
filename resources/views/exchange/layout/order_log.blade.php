<div class="col-lg-9 col-md-8  col-sm-12 col-xs-12 custom-float-md">
    <div class="sell-n-buy">
        <div class="" style="position: relative">
            <app-market-orders _nghost-xmu-c11="" style="height: 500px;">
                <div _ngcontent-xmu-c11="" class="main-app-container buy-sell buyContainer" style="position: relative">
                    <div _ngcontent-xmu-c11="" id="buy_orders" class="main-open-orders orders-general-box">

                    </div>
                </div>
            </app-market-orders>
        </div>
        <div class="" style="position: relative"  style="height: 500px;">
            <app-market-orders _nghost-xmu-c11="">
                <div _ngcontent-xmu-c11="" class="main-app-container buy-sell sellContainer" style="position: relative">
                    <div _ngcontent-xmu-c11="" id="sell_orders" class=" main-open-orders orders-general-box">

                    </div>
                </div>
            </app-market-orders>
        </div>
    </div>
</div>
 
<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script>
    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);

    $("#buy_orders").load('/orders/list/'+$url+'/buy');
    $("#sell_orders").load('/orders/list/'+$url+'/sell');

    setInterval(function(){
        $("#buy_orders").load('/orders/list/'+$url+'/buy');
        $("#sell_orders").load('/orders/list/'+$url+'/sell');
    }, 2000);


    $(window).bind('hashchange', function(){
        $hash = window.location.hash.slice(1);
        $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);

        $("#buy_orders").load('/orders/list/'+$url+'/buy');
        $("#sell_orders").load('/orders/list/'+$url+'/sell');

        setInterval(function(){
        $("#buy_orders").load('/orders/list/'+$url+'/buy');
        $("#sell_orders").load('/orders/list/'+$url+'/sell');
        }, 2000);
    });
</script>
