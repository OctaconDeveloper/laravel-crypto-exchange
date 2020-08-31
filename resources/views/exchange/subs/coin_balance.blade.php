@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
@endphp

    @if (auth()->user())
        <div class="base-balance ng-star-inserted">
            <img src="{{ (new OrderController())->getTokenImage($target_coin)}}">
            <span>{{strtoupper($target_coin)}}</span><!---->
            <b class="ng-star-inserted">{{ sprintf("%0.5f",(new OrderController())->sumToken($target_coin)) }}</b>
        </div>
                            <!---->
        <div class="quote-balance ng-star-inserted">
            <img src="{{ (new OrderController())->getTokenImage($base_coin)}}">
            <span>{{strtoupper($base_coin)}}</span>
            <!---->
            <b class="ng-star-inserted">{{ sprintf("%0.5f",(new OrderController())->sumToken($base_coin)) }} </b>
        </div>
   @else
        <div class="base-balance ng-star-inserted">
            <img src="{{ (new OrderController())->getTokenImage($target_coin)}}">
            <span>{{strtoupper($target_coin)}}</span><!---->
            <b class="ng-star-inserted">0.0000</b>
        </div>
                          <!---->
        <div class="quote-balance ng-star-inserted">
            <img src="{{ (new OrderController())->getTokenImage($base_coin)}}">
            <span>{{strtoupper($base_coin)}}</span>
            <!---->
            <b class="ng-star-inserted">0.0000</b>
        </div>
   @endif
                          <!----><!---->
