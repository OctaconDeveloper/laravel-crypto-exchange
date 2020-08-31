@php
    use \App\Http\Controllers\Web\OrderController;
    $pair_coin = $pair->pair;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
@endphp
    <div class="header-trade-bar">
        <div class="header-trade-dropdown tip"><!---->
          <img width="50" height="50" src="{{ (new OrderController())->get_token_info($target_coin)->image}}" class="ng-star-inserted">
          <b>{{ str_replace("_", "/",$pair_coin) }} </b>
          <span class="caret header-caret arrow-down"></span>
        </div>
          <!---->
          <div class="ng-star-inserted"></div>

          <div class="header-trade-info hidden-xs hidden-sm">
            <div>
              <span>Last:</span>
              <b class="lastResults">{{ (new OrderController())->get_last_price($pair_coin)}} <span>{{ strtoupper($base_coin) }}</span></b>
            </div>
            <div>
              <span>24h High:</span><b class="lastResults">{{ (new OrderController())->get_24_high($pair_coin)}}  <span>{{ strtoupper($base_coin) }}</span></b>
            </div>
            <div>
              <span>24h Low:</span><b class="lastResults">{{ (new OrderController())->get_24_low($pair_coin)}} <span> {{ strtoupper($base_coin) }}</span></b>
            </div>
            <div>
              <span>24h Change:</span>
                <b style="margin-left: 4px;" class="{{ (new OrderController())->get_24_percent($pair_coin)['type']}}">
                  {{ (new OrderController())->get_24_percent($pair_coin)['percent'] }}<span>%</span>
                </b>
            </div>
          </div>
</div>

<script src="{{ asset('v3/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript">
  $(".tip").click(function(){
    $(this).toggleClass("opened");
    $(".side").toggleClass("hide");
    $(".caret").toggleClass("arrow-down");
  });
</script>
