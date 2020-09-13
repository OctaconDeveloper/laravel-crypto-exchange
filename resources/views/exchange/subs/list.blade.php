@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
    $pair_coin = $pair->pair;
    $token_type = ( new OrderController())->get_token_info($target_coin)->type;

if(auth()->user()){
    $zero_trade = ( new OrderController())->get_zero_trade();
}else{
    $zero_trade = 0;
}

if(auth()->user() && auth()->user()->tradeStat === 1){
  $trans_fee = 0;
}else{
  $trans_fee = ( new OrderController())->get_trans_fee();
}

@endphp
    <div class="order-info" >
        <div class="{{ ucfirst($type)}}-checkbox">
            <mat-tab-group class="mat-tab-group mat-primary ng-animate-disabled">
                <mat-tab-header class="mat-tab-header">
                <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
                    <div class="mat-tab-header-pagination-chevron"></div>
                </div>
                <div class="mat-tab-label-container">
                    <div class="mat-tab-list" role="tablist" style="transform: translateX(0px);">
                        <div class="mat-tab-labels">
                        <!---->
                        <div cdkmonitorelementfocus="" class="mat-tab-label mat-ripple ng-star-inserted mat-tab-label-active" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-9-0" tabindex="0" aria-posinset="1" aria-setsize="2" aria-controls="mat-tab-content-9-0" aria-selected="true" aria-disabled="false">
                          <div class="mat-tab-label-content">
                            <!----><!---->
                            Limit
                          </div>
                        </div>
                        <div cdkmonitorelementfocus="" class="mat-tab-label mat-ripple ng-star-inserted" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-9-1" tabindex="-1" aria-posinset="2" aria-setsize="2" aria-controls="mat-tab-content-9-1" aria-selected="false" aria-disabled="false">
                          <div class="mat-tab-label-content">
                            <!----><!---->
                            Market
                          </div>
                        </div>
                      </div>
                      <mat-ink-bar class="mat-ink-bar" style="visibility: visible; left: 1px; width: 108px;">
                      </mat-ink-bar>
                    </div>
                  </div>
                  <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-ripple" mat-ripple="">
                    <div class="mat-tab-header-pagination-chevron"></div>
                  </div>
                </mat-tab-header>
                <div class="mat-tab-body-wrapper">
                  <!---->
                  <mat-tab-body class="mat-tab-body ng-tns-c15-25 ng-star-inserted mat-tab-body-active" role="tabpanel" id="mat-tab-content-9-0" aria-labelledby="mat-tab-label-9-0">
                    <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: none;">
                      <!---->
                      <app-loader _nghost-xmu-c9="" class="ng-star-inserted" style="">
                        <!----><!---->
                        <div fxlayout="row wrap parented" style="position: relative;" class="ng-star-inserted">
                          <label class="input-label" for="amount">
                            <span>Amount of {{ strtoupper($target_coin) }} to {{ ucfirst($type) }}</span>
                          </label>
                          <div class="input-parent">
                            <input class="ng-pristine ng-valid ng-touched {{$type}}_target_amount" min="0" placeholder="0.00" name="amount" type="text" step="0.00001">
                            <span class="input-symbol">{{strtoupper($target_coin)}}</span>
                          </div>
                          <label class="input-label" for="price" style="position: relative">
                            <span> Price Per 1 {{ strtoupper($target_coin)}}</span>
                          </label>
                          <div class="input-parent mb-0">
                            <input min="0" placeholder="0.00" name="price"  type="text" step="0.000001" class="{{ $type}}_base_mount ng-untouched ng-pristine ng-valid">
                            <span class="input-symbol">{{ strtoupper($base_coin)}}</span>
                            <input type="hidden" class="{{ $type}}_total" placeholder="0.00" />
                          </div>
                          <div fxflex="100">
                            <!---->
                            <app-drop-down-select _nghost-xmu-c4="" class="ng-pristine ng-valid ng-star-inserted ng-touched">
                              <div _ngcontent-xmu-c4="" appclickoutside="" class="select-area">
                                <!---->
                              </div>
                            </app-drop-down-select>
                          </div>
                          <div class="total">
                            <b> Fee:</b>
                            <span class="estimated_amount">
                              <b class="fee">0.00</b>
                              <input type="hidden" class="fee_amount">
                              <span class="currency">{{ strtoupper($base_coin)}}</span>
                            </span>
                          </div>
                          <div class="total">
                            <b> Total:</b>
                            <span class="estimated_amount">
                              <b class="total_pay">0.00</b>
                              <input type="hidden" class="total_amount">
                              <span class="currency">{{ strtoupper($base_coin)}}</span>
                            </span>
                          </div>
                        </div>
                        <!----><!---->
                      </app-loader>
                      <!---->
                    </div>
                  </mat-tab-body>

                </div>
              </mat-tab-group></div>
            </div>
          <div class="submit-order" style="margin-bottom: 5px;"> 
            <!---->

              @if($token_type=='ieo' && $type=='sell')
                <button class="button button-green ng-star-inserted" disabled="disabled">
                  <span> IEO COIN </span>
                </button>
              @else
              @php $color = ($type=='sell')? 'pink' : 'green'; @endphp

                @if(auth()->user())
                    <button class="button button-{{ $color }} ng-star-inserted pay">
                      <span> {{ ucfirst($type) }}</span>
                    </button>
                    <input type="hidden" class="target_balance" value="{{(new OrderController())->sumToken($target_coin)}}">
                    <input type="hidden" class="base_balance" value=" {{(new OrderController())->sumToken($base_coin)}} ">
                @else
                    <button class="button button-{{ $color }} ng-star-inserted" title="You have to login first" disabled="disabled" style="cursor: not-allowed;">
                      <span> {{ ucfirst($type) }}</span>
                    </button>
                    <input type="hidden" class="target_balance" value="0.00000">
                  <input type="hidden" class="base_balance" value="0.00000">
                @endif
            @endif
 
          </div>


<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('noty.min.js')}}"></script>
<script type="text/javascript">
  function calculate()
  {
    $type = '{{ $type }}';
     $fee =  parseFloat('{{ $trans_fee}}');
      $base_mount = parseFloat($(".{{ $type}}_base_mount").val());
      $target_amount = parseFloat($(".{{ $type}}_target_amount").val());
      $total = parseFloat($base_mount * $target_amount);
      if($target_amount && $base_mount){
        if($type=='buy'){
          $(".{{ $type}}_total").val($total);
          $calc = (($fee/100)*$total).toFixed(9);
          $(".fee").html($calc);
          $(".fee_amount").val($calc);
          $newcalc = (parseFloat($calc)+$total).toFixed(9);
          $(".total_pay").text($newcalc);
          $(".total_amount").val($newcalc);
        }else{
          $(".{{ $type}}_total").val($total);
          $calc = 0.000000000;
          $(".fee").html($calc);
          $(".fee_amount").val($calc);
          $newcalc = ($total).toFixed(9);
          $(".total_pay").text($newcalc);
          $(".total_amount").val($newcalc);
        }
      }
  }
  calculate();
   // $("#<?php print($type);?>_base_mount").change(calculate);
    $(".{{$type}}_target_amount").keyup(calculate);
    $(".{{$type}}_base_mount").keyup(calculate);



    // Payment
    $(".pay").click(function(){
      $trans_fee = parseFloat($(".fee_amount").val());
      $trans_total = parseFloat($(".total_amount").val());
      $target_balance = parseFloat($(".target_balance").val());
      $base_balance = parseFloat($(".base_balance").val());
      $target_amount = parseFloat($(".{{ $type }}_target_amount").val());
      $base_mount = parseFloat($(".{{ $type }}_base_mount").val());
      $type = "{{ $type }}";
      $pair_coin = "{{ $pair_coin }}";
      $base_coin = "{{ $base_coin }}";
      $target_coin = "{{ $target_coin }}";
      if($trans_total && $type=='buy'){
        if($trans_total > $base_balance){
          _danger("Insufficient {{ $base_coin }} balance");
        }else{
          $.ajax({
            type: "POST",
            url: '/buy_logic',
            data: {
              action: 'newbuy',
              trans_fee : $trans_fee,
              trans_total : $trans_total,
              target_balance : $target_balance,
              base_balance : $base_balance,
              base_coin : $base_coin,
              type : $type,
              target_coin : $target_coin,
              pair_coin: $pair_coin,
              target_amount: $target_amount,
              base_mount: $base_mount
            },
            success: function(data){
              $(".fee_amount").val('');
              $(".total_amount").val('');
              $(".target_balance").val('');
              $(".base_balance").val('');
              $(".{{ $type }}_target_amount").val('');
              $(".{{ $type }}_base_mount").val('');
              $(".total_pay").html('0.00');
              $(".fee").html('0.00');
              $dt = JSON.parse(data);
              ($dt.type=='success')? _success($dt.msg) : _danger($dt.msg);
              $("#buy_panel").load('/order/panel/'+$url+'/buy');
              $("#sell_panel").load('/order/panel/'+$url+'/sell'); 
            }
          });
        }
      }else
      if($trans_total && $type=='sell'){
        if($target_amount > $target_balance){
          _danger("Insufficient {{ $target_coin }} balance");
        }else{
          $.ajax({
            type: "POST",
            url: '/sell_logic',
            data: {
              action: 'newsell',
              trans_fee : $trans_fee,
              trans_total : $trans_total,
              target_balance : $target_balance,
              base_balance : $base_balance,
              base_coin : $base_coin,
              type : $type,
              target_coin : $target_coin,
              pair_coin: $pair_coin,
              target_amount: $target_amount,
              base_mount: $base_mount
            },
            success: function(data){
              $(".fee_amount").val('');
              $(".total_amount").val('');
              $(".target_balance").val('');
              $(".base_balance").val('');
              $(".{{ $type }}_target_amount").val('');
              $(".{{ $type }}_base_mount").val('');
              $(".total_pay").html('0.00');
              $(".fee").html('0.00');
              $dt = JSON.parse(data);
              ($dt.type=='success')? _success($dt.msg) : _danger($dt.msg);
              $("#buy_panel").load('/order/panel/'+$url+'/buy');
              $("#sell_panel").load('/order/panel/'+$url+'/sell'); 
            }
          });
        }
      }
    });














    function _success($sql){
		new Noty({
		    type: 'success',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _warning($sql){
		new Noty({
		    type: 'warning',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _danger($sql){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}
</script>
