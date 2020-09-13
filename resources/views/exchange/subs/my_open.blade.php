@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
    if(auth()->user()){
        $logs = (new OrderController())->get_my_orders();
    }else{
        $logs = [];
    }
@endphp 
    <app-market-history _nghost-xmu-c12="" class="ng-star-inserted" style="">
            <div _ngcontent-xmu-c12="" class="market-tab market-history-tab table">
                <div _ngcontent-xmu-c12="" class="market-history">
                    <app-loader _ngcontent-xmu-c12="" _nghost-xmu-c9="">
                        <table _ngcontent-xmu-c12="" width="100%" class="ng-star-inserted" style="">
                            <thead _ngcontent-xmu-c12="">
                                <tr _ngcontent-xmu-c12="" class="table-head">
                                    <!-- <th _ngcontent-xmu-c12="">#</th> -->
                                    <th _ngcontent-xmu-c12="" style="width: 10px;">Type</th>
                                    <th _ngcontent-xmu-c12="" style="width:10px">Pair</th>
                                    <th _ngcontent-xmu-c12="" style="width:20px">Amount </th>
                                    <th _ngcontent-xmu-c12="" style="width:20px">Price</th>
                                    <th _ngcontent-xmu-c12="" style="width:20px">Total </th>
                                    <th _ngcontent-xmu-c12="" style="width: 5px;"></th>
                                </tr>
                            </thead>  
                            <tbody _ngcontent-xmu-c12="">
                                @forelse($logs as $log)
                                    <tr _ngcontent-xmu-c12="" class="bid-tr table-row ng-star-inserted" style="">
                                        <!-- <td _ngcontent-xmu-c12="">
                                            {{ $log->wallet_id }} 
                                        </td> -->
                                        @php 
                                            if(strtoupper($log->type)== 'BUY'){
                                                $img =  "v3/ic_buy.svg";
                                            }else{
                                                $img = "v3/ic_sell.svg";
                                            }
                                        @endphp 
                                        <td _ngcontent-xmu-c12="" style="width: 10px;">
                                            <span _ngcontent-xmu-c12="" class="sell ng-star-inserted">
                                                <span _ngcontent-xmu-c12="">{{ strtoupper($log->type) }}</span>
                                                <img _ngcontent-xmu-c12="" alt="{{ strtoupper($log->type) }}" src="{{ asset($img) }}">
                                            </span>
                                        </td>
                                        <td _ngcontent-xmu-c12="" style="width:10px">{{ implode("/",explode("_",$log->pair)) }} </td>
                                        <td _ngcontent-xmu-c12="" style="width:20px">{{ sprintf("%0.4f",$log->amount).' '.$log->target_coin }} </td>
                                        <td _ngcontent-xmu-c12="" style="width:20px">{{ sprintf("%0.4f",$log->price).' '.$log->base_coin }}</td>
                                        <td _ngcontent-xmu-c12="" style="width:20px">{{ sprintf("%0.4f",$log->total).' '.$log->base_coin }}</td>
                                        <td _ngcontent-xmu-c12="" style="width: 5px;">
                                            <i class="fa fa-trash del-order" style="color:red" data-id="{{ $log->id }}">
                                            </i>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr _ngcontent-xmu-c12="" class="bid-tr table-row ng-star-inserted" style="">
                                        <td _ngcontent-xmu-c12="" colspan="5">
                                            <img class="prt" src="{{ asset('v3/ic_empty_order.svg') }}">
                                            <br/>
                                            <span class="prt"> No Order </span>
                                        </td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </app-loader>
                </div>
            </div>
        </app-market-history> 
 

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script type="text/javascript">
    $(".del-order").click(function(){
        $id = $(this).data("id");
        $.ajax({
            type: "POST",
            url: '/delete-order-id',
            data: {
                id  : $id
            },
            success: function(data){
                $dt = JSON.parse(data);
                ($dt.type=='success')? _success($dt.msg) : _danger($dt.msg);
            }
        });

    });
</script>