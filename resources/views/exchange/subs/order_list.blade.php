@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
    $logs = (new OrderController())->get_list($pair->pair,$type);
@endphp
 
 
	<app-loader _ngcontent-xmu-c11="" _nghost-xmu-c9="">
		<!----><!---->
		<div _ngcontent-xmu-c11="" class="main ng-star-inserted">
			<div _ngcontent-xmu-c11="" class="buy-orders-title">
			{{ ucfirst($type) }} orders
			<b _ngcontent-xmu-c11="">Volume: <span _ngcontent-xmu-c11="">
				{{ sprintf("%0.7f",(new OrderController())->get_volume($pair,$type)) }}
			</span>
				{{ strtoupper($target_coin) }}
			</b>
		</div>
		<div _ngcontent-xmu-c11="" class="buy-orders-table" style="height: 450px;">
			<!---->
			<table _ngcontent-xmu-c11="" class="no-upper-padding ng-star-inserted" clipboard="no-upper-padding" width="100%">
				<tr _ngcontent-xmu-c11="" class="table-head">
					<th _ngcontent-xmu-c11="">Total</th>
					<th _ngcontent-xmu-c11="">Amount</th>
					<th _ngcontent-xmu-c11="">Price</th>
				</tr>
			</table>
			<div _ngcontent-xmu-c11="" class="sell-buy-bids ">
				<div _ngcontent-xmu-c11="" class="dinamic-table">
					<table _ngcontent-xmu-c11="" class="no-upper-padding" width="100%">
                        <!---->
                        @forelse ($logs as $log)
                        <tr _ngcontent-xmu-c11=""
                            class="bid-tr ng-star-inserted ord"
                            data-type = "{{ $type }}"
                            data-total="{{ sprintf("%0.9f",(new OrderController())->get_market_total($log->price,$type,$pair->pair)) }}" data-price="{{ sprintf("%0.9f",$log->price) }}"
                            data-amount=" {{ sprintf("%0.9f",(new OrderController())->get_total_amount($log->price,$type,$pair->pair)) }}"
                            >
                            <td _ngcontent-xmu-c11=""> {{ sprintf("%0.9f",(new OrderController())->get_market_total($log->price,$type,$pair->pair)) }} </td>
                            <td _ngcontent-xmu-c11=""> {{ sprintf("%0.9f",(new OrderController())->get_total_amount($log->price,$type,$pair->pair)) }} </td>
                            <!----><!---->
							<td _ngcontent-xmu-c11="" class="ng-star-inserted"> {{ sprintf("%0.9f",$log->price) }} </td>
							
                        </tr>
                        @empty

                        @endforelse
						</table>
						<!-- <div _ngcontent-xmu-c11="" class="sell-dinamic-element">
						<div _ngcontent-xmu-c11="" class="ng-star-inserted" style="width: 2.54558%;"></div>
						<div _ngcontent-xmu-c11="" class="ng-star-inserted" style="width: 7.36169%;"></div>
						<div _ngcontent-xmu-c11="" class="ng-star-inserted" style="width: 19.5658%;"></div>
						<div _ngcontent-xmu-c11="" class="ng-star-inserted" style="width: 35.603%;"></div>
						<div _ngcontent-xmu-c11="" class="ng-star-inserted" style="width: 100%;"></div>
					</div> -->
				</div>
				<!---->
			</div>
		</div>
	</div><!----><!---->
</app-loader>

<script type="text/javascript">

	$(".ord").click(function(){

		$ty = $(this).data('type');
		$type2 = ($ty == 'sell') ? 'buy' : 'sell';
		$target_amount = $(this).data('amount');
		$base_mount = $(this).data('price');
		// $total = $(this).data('total');
		$("."+$type2+"_base_mount").val($base_mount);
		$("."+$type2+"_target_amount").val($target_amount);
		$total = parseFloat($base_mount * $target_amount);

        if($ty=='sell'){
            $("#buy_panel").removeClass( "show" ).addClass( "hide" );
            $("#sell_panel").removeClass( "hide" ).addClass( "show" );
        }else{
            $("#sell_panel").removeClass( "show" ).addClass( "hide" );
            $("#buy_panel").removeClass( "hide" ).addClass( "show" );
        }


      if($target_amount){
        $("."+$type2+"_total").val($total);
        $calc = (($fee/100)*$total).toFixed(9);
        $(".fee").html($calc);
        $(".fee_amount").val($calc);
        $newcalc = (parseFloat($calc)+$total).toFixed(9);
        $(".total_pay").html($newcalc);
        $(".total_amount").val($newcalc);
      }

	});
</script>
