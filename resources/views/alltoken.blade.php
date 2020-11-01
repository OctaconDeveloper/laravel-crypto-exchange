@php
    if(request()->token){
        $tile = 1;
        $tokens = \App\Token::orWhere('ticker', 'like', '%' . request()->token . '%')
        ->orWhere('name', 'like', '%' . request()->token . '%')
        ->get();
    }else{
        $tile = 0;
    	$tokens = \App\Token::orderBy('name','ASC')->get();
    }

@endphp

@if(sizeof($tokens) > 0)

    @php
        $wallet2 = \App\Wallet::whereUserId(auth()->user()->id)->whereTicker($tokens[0]->ticker)->first();
        $wallet_address2 = \App\WithdrawalAddress::whereUserId(auth()->user()->id)->whereTicker($tokens[0]->ticker)->first();

        if($wallet2 && $wallet2->amount > 0 ){
                    $percent  = $wallet2->amount * 0.002;
                    $available = ($wallet2->amount) - $percent;
            }else{
                    $percent  = 0.00000;
                    $available = 0.00000;
            }
    @endphp
    <div id="default" data-stuff='["{{ $tokens[0]->ticker }}","{{ $tokens[0]->withdrawal_fee }}","{{ ($wallet2) ? $wallet2->address : ''}}","{{ ($wallet_address2) ? $wallet_address2->address : ''}}","{{ ($wallet2) ? sprintf("%0.5f",$wallet2->amount) : '0.00000' }}","{{ $available }}","{{ $tokens[0]->type }}","{{ $tokens[0]->base }}"]'>

    </div>

    @forelse ($tokens as $token)
        @php
            $wallet = \App\Wallet::whereUserId(auth()->user()->id)->whereTicker($token->ticker)->first();
            $wallet_address = \App\WithdrawalAddress::whereUserId(auth()->user()->id)->whereTicker($token->ticker)->first();
            if($wallet && $wallet->amount > 0){
                    $percent  = $wallet->amount * 0.002;
                    $available = ($wallet->amount) - $percent;
            }else{
                    $percent  = 0.00000;
                    $available = 0.00000;
            }
        @endphp
        <div _ngcontent-she-c18="" data-stuff='["{{$token->ticker}}","{{$token->withdrawal_fee}}","{{ ($wallet) ? $wallet->address : ''}}","{{ ($wallet_address) ? $wallet_address->address : ''}}","{{ ($wallet) ? sprintf("%0.5f",$wallet->amount) : '0.00000' }}","{{ $available }}","{{ $token->type }}","{{ $token->base }}"]' class="choseTicker  pending-coin ng-star-inserted active" routerlinkactive="active" tabindex="0">
    		<div _ngcontent-she-c18="" class="main-container-item special">
    			<img _ngcontent-she-c18="" style="width: 25px; height: 25px" class="wallet-icon" src="{{ $token->image }}">
    			<div _ngcontent-she-c18="" class="text-header">
    				<span _ngcontent-she-c18="">
    					<b _ngcontent-she-c18="">
    						{{strtoupper($token->ticker)}}
    					</b>
    					<span _ngcontent-she-c18="" class="wallet-name">
                            {{ucfirst($token->name)}}
    					</span>
    				</span>
    			</div>
    			<div _ngcontent-she-c18="" class="text-body">
    				<b _ngcontent-she-c18="" class="amount_ready">
    					 {{ ($wallet) ? sprintf("%0.5f",$wallet->amount) : '0.00000' }}
    				</b>
    			</div>
            </div>
            {{-- @if ( $wallet && $wallet->amount > 0)
                @php
                    $bal = $wallet->amount;
                    $percent  = $wallet->amount * 0.002;
                    $available = $bal-$percent;

                @endphp
                    <div _ngcontent-she-c18="" class="reserved ng-star-inserted bal" data-balance="{{ $available }}">
                        <span _ngcontent-she-c18="">Available balance</span>
                        <b _ngcontent-she-c18=""> {{ sprintf("%0.5f",$available) }} </b>
                    </div>
                    <div _ngcontent-she-c18="" class="reserved ng-star-inserted">
                        <span _ngcontent-she-c18="">Reserved</span>
                        <b _ngcontent-she-c18=""> {{ sprintf("%0.5f",$percent) }} </b>
                    </div>
            @endif --}}
    	</div>

        @empty

        @endforelse

    @else
    <div _ngcontent-she-c18="" class="pending-coin ng-star-inserted active" routerlinkactive="active" tabindex="0">
    		No data found!
    	</div>
    @endif

    <script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>
	<script type="text/javascript">

    $var = "{{ $tile }}";

    // alert($var);

	$(document).ready(function(){
        if($var == 0){
            $stuff2 = $("#default").data("stuff");
    		$ticker2 = $stuff2[0];
    		$fee2 = $stuff2[1];
    		$qrcode2 = $stuff2[2];
    		$amount = $stuff2[4];
            $bals = $stuff2[5];
            $("#total_amount_number").val($bals);
    		$(".ticker").html($ticker2.toUpperCase());
    		$("#token").html($ticker2);
    		$("#depTicker").val($ticker2);
    		$("#wTicker").val($ticker2.toUpperCase());
            $("#wAddress").val($stuff2[3]);
    		$log = '<span _ngcontent-she-c18="">Fee:</span><b _ngcontent-she-c18="">'+$fee2+'<span> '+$ticker2.toUpperCase()+'</span></b>';
            $log2 = '<span _ngcontent-she-c18="">Total:</span><b _ngcontent-she-c18="">'+(Number(2.00)+Number($fee2))+'<span> '+$ticker2.toUpperCase()+'</span></b>';

    		$("#withFee").html($log);
            $("#withTotal").html($log2);
    		$("#co-address").val($qrcode2);
    		$("#qrcodeImg").empty();
    		$("#qrcodeImg").qrcode({
    			width: 180,
    			height: 180,
    			text: $qrcode2
            });
            $(".wNow").attr("disabled","disabled");
            $("#amount_number").val('');
            $("#token_base").val($stuff2[7]);
            $("#token_type").val($ticker2);
        }
	})


	$(".choseTicker").on("click", function(){
		$stuff = $(this).data('stuff');
        $ticker = $stuff[0];
        $fee = $stuff[1];
        $qrcode = $stuff[2];
        $amount = $stuff[4];
        $bals = $stuff[5];
        $("#total_amount_number").val($bals);
		$(".ticker").html($ticker.toUpperCase());
		$("#depTicker").val($ticker);
		$("#token").html($ticker);
		$("#wTicker").val($ticker.toUpperCase());
        $("#wAddress").val($stuff[3]);
		$log = '<span _ngcontent-she-c18="">Fee:</span><b _ngcontent-she-c18="">'+$fee+'<span> '+$ticker.toUpperCase()+'</span></b>';
		$log2 = '<span _ngcontent-she-c18="">Total:</span><b _ngcontent-she-c18="">'+(Number(2.00)+Number($fee))+'<span> '+$ticker.toUpperCase()+'</span></b>';
		$("#withFee").html($log);
        $("#withTotal").html($log2);
		$("#co-address").val($qrcode);
		$("#qrcodeImg").empty();
		$("#qrcodeImg").qrcode({
			width: 180,
			height: 180,
			text: $qrcode
        });

        $token = $("#wTicker").val();
        if($token){
            $.ajax({
                url: "/user/trans/"+$token,
                cache: false, // very important in your case
                success: function(data)
                {
                    $(".singletrans").empty();
                    $(".singletrans").html(data);
                }
            });
        }
        $(".wNow").attr("disabled","disabled");
        $("#amount_number").val('');
            $("#token_base").val($stuff[7]);
            $("#token_type").val($ticker);

	})
</script>

