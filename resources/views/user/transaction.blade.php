@php
    if(request()->token){
        $logs = \App\Transaction::whereUserId(auth()->user()->id)->whereCurrency(request()->token)->get();
    }
@endphp

<table _ngcontent-she-c19="" class="main-page-table-header ng-star-inserted" width="100%">
                    <thead _ngcontent-she-c19="">
                        <tr _ngcontent-she-c19="" class="table-head">
                            <th _ngcontent-she-c19="" class="data-col">Date</th>
                            <th _ngcontent-she-c19="">Currency</th>
                            <th _ngcontent-she-c19="" class="transactions-type">Type</th>
                            <th _ngcontent-she-c19="">Amount</th>
                            <th _ngcontent-she-c19="">Fee</th>
                            <th _ngcontent-she-c19="">Status</th>
                            <th _ngcontent-she-c19="" class="copy-table-col" style="text-align: center">Transaction ID</th>
                            <th _ngcontent-she-c19="" style="padding: 0!important;width: 0!important;"></th>
                        </tr>
                    </thead>
                    <tbody _ngcontent-she-c19="">
                        <!---->
                       @forelse ($logs as $log)
                            <tr _ngcontent-she-c19="" class="bid-tr ng-star-inserted">
                                <td _ngcontent-she-c19="" class="date-col data-col">
                                <b _ngcontent-she-c19=""> {{ date('d-m-Y H:i:s', strtotime($log->created_at)) }} </b>
                                </td>
                                <td _ngcontent-she-c19=""> {{ strtoupper($log->currency) }} </td>
                                <td _ngcontent-she-c19="" class="transactions-type">
                                    <span _ngcontent-she-c19="">{{ $log->type }}</span>
                                    <img _ngcontent-she-c19="" alt="" src="{{ asset('v3/ic_'.$log->type.'.svg') }}>
                                </td>
                                <td _ngcontent-she-c19=""> {{ $log->amount }} </td>
                                <td _ngcontent-she-c19=""> {{ $log->fee }} </td>
                                <td _ngcontent-she-c19="">
                                    <!----><!---->
                                    <span _ngcontent-she-c19="" class="ng-star-inserted"> {{ ucwords($log->status) }} </span>
                                </td>
                                <td _ngcontent-she-c19="" class="copy-icon copy-table-col">
                                    <!---->
                                    <span _ngcontent-she-c19="" class="tid ng-star-inserted" style="color: #656FFF;">
                                        <a _ngcontent-she-c19="" target="_blank" href="{{ $log->url.$log->transID }}" style="text-decoration: none;">
                                            <span title="{{ $log->transID }}">
                                                {{ $log->transID }}
                                            </span>
                                        </a>
                                        <input type="hidden" name="" id="transactionID" value="{{ $log->transID }} ">
                                    </span>
                                    <!----><!---->
                                    <span _ngcontent-she-c19="" class="copy-img2 ng-star-inserted" style="display: inline">
                                        <app-copy-loader _ngcontent-she-c19="" _nghost-she-c16="">
                                            <!---->
                                            <img _ngcontent-she-c16="" class="main-copy" src="{{ asset('v3/ic_copy.svg') }}">
                                        </app-copy-loader>
                                    </span>
                                </td>
                                <td _ngcontent-she-c19="" style="padding: 0!important;width: 0!important;">
                                    <!---->
                                </td>
                            </tr>
                       @empty
                            <tr _ngcontent-she-c19="" class="text-center bid-tr ng-star-inserted">
                                <td class="text-center">No available record</td>
                            </tr>
                       @endforelse

                    </tbody>
                </table>



