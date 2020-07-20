@php

@endphp

{{-- <table _ngcontent-she-c19="" class="main-page-table-header ng-star-inserted" width="100%">
                <thead _ngcontent-she-c19="">
                    <tr _ngcontent-she-c19="" class="table-head">
                        <th _ngcontent-she-c19="" class="data-col">Date</th>
                        <th _ngcontent-she-c19="">Currency</th>
                        <th _ngcontent-she-c19="">Amount</th>
                        <th _ngcontent-she-c19="">Fee</th>
                        <th _ngcontent-she-c19="">Address</th>
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
                            <td _ngcontent-she-c19=""> {{ strtoupper($log->ticker) }} </td>
                            <td _ngcontent-she-c19=""> {{ $log->withdraw_amount }} </td>
                            <td _ngcontent-she-c19=""> {{ $log->withdraw_fee }} </td>
                            <td _ngcontent-she-c19=""> {{ $log->withdraw_address }} </td>
                            <td _ngcontent-she-c19="">
                                <!----><!---->
                                <span _ngcontent-she-c19="" class="ng-star-inserted"> {{ ucwords($log->trans_type) }} </span>
                            </td>
                            <td _ngcontent-she-c19=""> {{ ($log->transID != null) ? $log->transID : 'Pending'  }} </td>

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
            </table> --}}



