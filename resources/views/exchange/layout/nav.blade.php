@php
   use \App\Http\Controllers\Web\OrderController;
  $base = \App\CoinPair::distinct()->get('base_id');
@endphp
<div class="content positioned">
      <!-- <div class="dashboard-layout ng-star-inserted"></div> -->

        <div id="top_nav"></div>

        <div class="trade-pairs-container side hide">
            <div class="dashboard-trade-pairs ng-star-inserted">
              <div class="layout-after"></div>
              <div class="trade-pair-bar trade-main-pair">
                <span class="pair-bar-title">Pairs</span>
              <div>
              <label class="coin-filter" for="coinSearch">
                <input axautofocus="" id="coinSearch" placeholder="Search" type="text" class="ng-touched ng-pristine ng-valid">
                <img id="del" alt="" src="{{asset('v3/ic_close_black.svg') }}">
              </label><!---->
              @forelse ($base as $key => $pair)
                <div class="main-pair-item @if($key==0) selected @endif ng-star-inserted" data-pair="{{ str_replace(' ', '',$pair->base_id)}}_pair">
                    @php
                        $token =  \App\Token::whereTicker($pair->base_id)->first();
                    @endphp
                    <img alt="" src="{{$token->image}}">
                    <span>{{$pair->base_id}}</span>
                </div>
            @empty

            @endforelse
            </div>
          </div><div class="trade-pair-bar trade-secondary-pair" style="max-height: 500px;">
            <span class="pair-bar-title"></span><!---->

@forelse ($base as $key => $pair)
<div class="{{ str_replace(' ', '',$pair->base_id) }}_pair @if($key!==0) hide @endif clk"><!---->
@php
  $token_pairs = \App\CoinPair::whereBaseId($pair->base_id)->orderBy('target_id','ASC')->get();
@endphp
@forelse ($token_pairs as $tk)
  <div data-id="{{$tk->pair}}" class="secondary-pair-item ng-star-inserted all_{{$tk->pair}}">
    <div class="secondary-pair-item-header">
      <div class="secondary-pair-item-header__hover">
        @php
        $tokenLog =  \App\Token::whereTicker($tk->target_id)->first();
        @endphp
        <img width="50" height="50" alt="{{$tk->pair}}" src="{{$tokenLog->image}}">
        <span class="make-favorite">
          <img alt="{{$tk->pair}}" src="{{$tokenLog->image}}">
          <img alt="{{$tk->pair}}" class="fav-op-0" src="{{$tokenLog->image}}">
        </span>
        </div>
        <b>{{ $tk->target_id}}<span>/{{ $tk->base_id }}</span></b>
        @php
            $order = (new OrderController())->get_24_percent($tk->pair)
        @endphp
            <span class="rate-change {{ $order['rate'] }}">
                {{ $order['operator'] }} {{ $order['percent'] }}
                %
            </span>
      </div>
      <div class="secondary-pair-item-info">
        <div>
          <span>Price </span><b>{{ (new OrderController())->get_avg_price($tk->pair)}}</b>
        </div>
        <div>
        <span>24h Volume:</span><b>{{ (new OrderController())->get_24_volume($tk->pair)}}</b>
      </div>
    </div>
  </div>
@empty

@endforelse
</div>
@empty

@endforelse



              <div id="searchResult">

            </div>



            </div>
      </div>
        </div>
      </div>




<style>
  .hide{
    display:none;
  }
</style>

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
  $("#searchResult").hide();
    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
    $(".all_"+$url).toggleClass("selected");
    $("#top_nav").load('/coinstat/'+$url);

  setTimeout(() => {
    $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
    $(".all_"+$url).toggleClass("selected");
    $("#top_nav").load('/coinstat/'+$url);
  }, 2000);

  $(".main-pair-item").click(function(){
    $dr = $(this).data('pair');
    $(".main-pair-item").removeClass('selected');
    $(this).toggleClass('selected');
    $(".clk").addClass('hide');
    $("."+$dr).toggleClass('hide');
  });



  $(".secondary-pair-item").click(function(){
    $pair = $(this).data("id");
    $("#top_nav").load('/coinstat/'+$pair);
    $(".secondary-pair-item").removeClass("selected");
    $(this).toggleClass("selected");
    $(".tip").toggleClass("opened");
    $(".side").toggleClass("hide");
    $(".caret").toggleClass("arrow-down");
    window.location.hash=$pair;
    history.pushState(null,'',$pair);
  });

$("#del").click(function(){
  $("#coinSearch").val('');
  $(".clk").show();
  $("#searchResult").hide();
});

$("#coinSearch").keyup(function(){
  $val = $(this).val();
//   alert($val)
  if($val){
    $(".clk").hide();
    $("#searchResult").show();
    $("#searchResult").load('/coin_search/'+$val);
  }else{
    $(".clk").show();
    $("#searchResult").hide();
  }
});
</script>
