@php
    use \App\Http\Controllers\Web\OrderController;
    $token_pairs = (new OrderController())->get_search($pair);
@endphp

    <div class="base_pair clk"><!---->
        @forelse ($token_pairs as $tk)
                <div data-id="{{ $tk->pair }}" class="secondary-pair-item ng-star-inserted all_{{ $tk->pair }}">
                  <div class="secondary-pair-item-header">
                    <div class="secondary-pair-item-header__hover">
                      <img width="50" height="50" alt="{{ $tk->pair }}" src="{{ (new OrderController())->get_token_info($tk->target_id)->image}}">
                      <span class="make-favorite">
                        <img alt="{{ $tk->pair }}" src="{{ (new OrderController())->get_token_info($tk->target_id)->image}}">
                        <img alt="{{ $tk->pair }}" class="fav-op-0" src="{{ (new OrderController())->get_token_info($tk->target_id)->image}}">
                      </span>
                      </div>
                      <b>{{ $tk->target_id }}<span>/{{ $tk->base_id }}</span></b><span class="rate-change {{ (new OrderController())->get_24_percent($tk->pair)['rate'] }}">
                        {{ (new OrderController())->get_24_percent($tk->pair)['operator'] }} {{ (new OrderController())->get_24_percent($tk->pair)['percent'] }} %</span>
                    </div>
                    <div class="secondary-pair-item-info">
                      <div>
                        <span>Price </span><b>{{ (new OrderController())->get_avg_price($tk->pair) }}</b>
                      </div>
                      <div>
                      <span>24h Volume:</span><b>{{ (new OrderController())->get_24_volume($tk->pair) }}</b>
                    </div>
                  </div>
                </div>
                @empty

                @endforelse
              </div>

<script>
    $(".secondary-pair-item").click(function(){
        $pair = $(this).data("id");
        $("#top_nav").load('/coinstat.php/'+$pair);
        $(".secondary-pair-item").removeClass("selected");
        $(this).toggleClass("selected");
        $(".tip").toggleClass("opened");
        $(".side").toggleClass("hide");
        $(".caret").toggleClass("arrow-down");
        $("#coinSearch").val('');
        $(".clk").show();
        $("#searchResult").hide();
        window.location.hash=$pair;
        history.pushState(null,'',$pair);
    });
</script>
