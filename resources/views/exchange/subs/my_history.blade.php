@php
    use \App\Http\Controllers\Web\OrderController;
    $target_coin = $pair->target_id;
    $base_coin = $pair->base_id;
    if(auth()->user()){
        $logs = (new OrderController())->my_history($pair->pair);
    }else{
        $logs = [];
    }
@endphp
<div class="mat-tab-body-wrapper"><!---->
    <mat-tab-body class="mat-tab-body ng-tns-c15-27 ng-star-inserted mat-tab-body-active" role="tabpanel" id="mat-tab-content-10-0" aria-labelledby="mat-tab-label-10-0">
        <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: none;">
            <app-market-history _nghost-xmu-c12="" class="ng-star-inserted" style="">
                <div _ngcontent-xmu-c12="" class="market-tab market-history-tab table">
                    <div _ngcontent-xmu-c12="" class="market-history">
                        <app-loader _ngcontent-xmu-c12="" _nghost-xmu-c9="">
                            <table _ngcontent-xmu-c12="" width="100%" class="ng-star-inserted" style="">
                                <thead _ngcontent-xmu-c12="">
                                    <tr _ngcontent-xmu-c12="" class="table-head">
                                        <th _ngcontent-xmu-c12="">Type</th>
                                        <th _ngcontent-xmu-c12="">Price</th>
                                        <th _ngcontent-xmu-c12="">Amount</ th>
                                        <th _ngcontent-xmu-c12="" class="main-data-col">Date</th>
                                    </tr>
                                </thead>
                                <tbody _ngcontent-xmu-c12="">
                                @forelse ($logs as $log)
                                
                                    <tr _ngcontent-xmu-c12="" class="bid-tr table-row ng-star-inserted" style="">
                                        <td _ngcontent-xmu-c12="">
                                                <span _ngcontent-xmu-c12="" class="sell ng-star-inserted">
                                                        <span _ngcontent-xmu-c12="">{{ strtoupper($log->type) }}</span>
                                                        <img _ngcontent-xmu-c12="" alt="{{ strtoupper($log->type) }}" src="{{ $log->image }}">
                                                </span> 
                                        </td>
                                        <td _ngcontent-xmu-c12="">{{ sprintf("%0.9f",$log->price) }} </td>
                                        <td _ngcontent-xmu-c12="">{{ sprintf("%0.9f",$log->amount) }}</td>
                                        <td _ngcontent-xmu-c12="" class="date-col main-data-col">
                                            {{ explode(" ", $log->created_at)[0] }}
                                            <b _ngcontent-xmu-c12=""> {{ explode(" ", $log->created_at)[1] }}</b>
                                        </td>
                                    </tr>
                                @empty
                                    <tr _ngcontent-xmu-c12="" class="bid-tr table-row ng-star-inserted" style="">
                                        <td _ngcontent-xmu-c12="" colspan="5">
                                                <img class="prt" src="{{ asset('v3/ic_empty_order.svg') }}">
                                                <br/>
                                                <span class="prt"> You have no trading history </span>
                                                <br/>
                                                <span class="prt">{{ str_replace("_","/",$pair->pair) }}</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </app-loader>
                </div>
            </div>
        </app-market-history>
    </div>
</mat-tab-body>
<mat-tab-body class="mat-tab-body ng-tns-c15-28 ng-star-inserted" role="tabpanel" id="mat-tab-content-10-1" aria-labelledby="mat-tab-label-10-1">
        <div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: translate3d(100%, 0px, 0px); min-height: 1px;">
        </div>
</mat-tab-body>
</div>

<style type="text/css">
        .prt{
                margin-left:350px;
                margin-top: 60px;
                padding: 10px;
        }
</style>
