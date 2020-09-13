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
                                    <th _ngcontent-xmu-c12="">Type</th>
                                    <th _ngcontent-xmu-c12="">Pair</th>
                                    <th _ngcontent-xmu-c12="">Amount </th>
                                    <th _ngcontent-xmu-c12="">Price</th>
                                    <th _ngcontent-xmu-c12="">Total </th>
                                    <th _ngcontent-xmu-c12=""></th>
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
                                        <td _ngcontent-xmu-c12="">
                                            <span _ngcontent-xmu-c12="" class="sell ng-star-inserted">
                                                <span _ngcontent-xmu-c12="">{{ strtoupper($log->type) }}</span>
                                                <img _ngcontent-xmu-c12="" alt="{{ strtoupper($log->type) }}" src="{{ asset($img) }}">
                                            </span>
                                        </td>
                                        <td _ngcontent-xmu-c12="">{{ implode("/",explode("_",$log->pair)) }} </td>
                                        <td _ngcontent-xmu-c12="">{{ sprintf("%0.6f",$log->amount).' '.$log->target_coin }} </td>
                                        <td _ngcontent-xmu-c12="">{{ sprintf("%0.6f",$log->price).' '.$log->base_coin }}</td>
                                        <td _ngcontent-xmu-c12="">{{ sprintf("%0.6f",$log->total).' '.$log->base_coin }}</td>
                                        <td _ngcontent-xmu-c12="">
                                            <i class="fa fa-trash del-order" style="color:red" data-id="{{ $log->id }}">
                                            </i>
                                        </td>
                                    </tr>

    @empty
        <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: none;">
            <!---->
            <app-orders-transactions _ngcontent-bil-c19="" class="ng-star-inserted" style="">
                <div class="table font-normal main-page-table">
                    <div class="orders-big-table">
                        <!----><!---->
                        <div class="no-market-info ng-star-inserted">
                            <img alt="no-order" src="{{ asset('v3/ic_empty_order.svg') }}"> 
                            No Order
                        </div>
                    </div>
                    <!---->
                </div>
            </app-orders-transactions>
            <!---->
        </div> 
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