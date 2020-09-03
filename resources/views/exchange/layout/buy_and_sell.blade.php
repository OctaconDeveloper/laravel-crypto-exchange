
                      <div class="col-lg-3 col-md-4 main main-app-container sticky-positioned-div desk-scroll mob-popover" style="display: block;">
                        <!----><!---->
                        <div>
                          <div>
                            <div class="order-type row mat-ink-side" style="cursor:pointer; z-index:900">
                              <div class="col-lg-6 t_a active" data-id="buy"> Buy </div>
                              <div class="col-xs-6 t_a " data-id="sell"> Sell </div>
                            </div>
                            <!-- <mat-tab-body class="mat-tab-body ng-tns-c15-26 ng-star-inserted" role="tabpanel" id="mat-tab-content-9-1" aria-labelledby="mat-tab-label-9-1">
                               <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px;">
                            </mat-tab-body> -->
                            <div id="buy_panel" class="show" style="height:400px;">
                                <div class="Load_overlay" style="margin-top: 50%">
                                    <img src="{{ asset('img/loader.gif') }}" alt="Loading" />
                               </div>
                            </div>
                            <div id="sell_panel" class="hide" style="height:400px">
                                <div class="Load_overlay"  style="margin-top: 50%">
                                    <img src="{{ asset('img/loader.gif') }}" alt="Loading" />
                               </div>
                            </div>


                          </div>
                          <div class="balances">
                            <span class="span-title">Available balance</span>
                            <app-loader _nghost-xmu-c9="" id="coin_balance">
                            </app-loader>
                          </div>
                        </div>
                      </div>



<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">


    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
  $(".t_a").click(function(){
    $type = $(this).data("id");
    $(this).toggleClass("active");
    if($type=='sell'){
        $("#buy_panel").removeClass( "show" ).addClass( "hide" );
        $("#sell_panel").removeClass( "hide" ).addClass( "show" );
    }else{
        $("#sell_panel").removeClass( "show" ).addClass( "hide" );
        $("#buy_panel").removeClass( "hide" ).addClass( "show" );
    }


    $(".order-type").toggleClass('mat-ink-side');
  });

  $("#coin_balance").load('/coin_balance/'+$url);
  $("#buy_panel").load('/order/panel/'+$url+'/buy');
  $("#sell_panel").load('/order/panel/'+$url+'/sell');


  /**
  * If URL Changes
  **/
  $(window).bind('hashchange', function(){
    $hash = window.location.hash.slice(1);
    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
    $("#coin_balance").load('/coin_balance/'+$url);

    $("#buy_panel").load('/order/panel/'+$url+'/buy');
    $("#sell_panel").load('/order/panel/'+$url+'/sell');
  });

</script>
