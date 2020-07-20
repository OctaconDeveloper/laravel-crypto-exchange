@php
    $withdrawal_addresses = \App\WithdrawalAddress::whereUserId(auth()->user()->id)->get();
@endphp
<div _ngcontent-jwu-c27="" class="wallet-addresses-table">
        <table _ngcontent-jwu-c27="" width="100%">
        <thead >
            <tr class="table-head">
                <th>Email Address</th>
                <th>Currency</th>
                <th>Withdrawal address</th>
                <th></th>
            </tr>
        </thead>
        <tbody _ngcontent-jwu-c27="">

            @forelse ($withdrawal_addresses as $address)
                <tr class="bid-tr ng-star-inserted" style="padding-right: 75px;">
                    <td _ngcontent-jwu-c27="">
                        {{auth()->user()->email}}
                    </td>
                    <td _ngcontent-jwu-c27="">
                        {{strtoupper($address->ticker)}}
                    </td>
                    <td _ngcontent-jwu-c27="">
                        {{$address->address}}
                    </td>
                    <td _ngcontent-jwu-c27="">
                        <a href="/remove-wallet-addresses/{{$address->id}}">
                            <span class="btn btn-default" title="Remove {{$address->type}} Address">
                                <i class="fa fa-trash" style="color: red"></i>
                            </span>
                        </a>
                    </td>
                </tr>
            @empty

            @endforelse
</tbody>
    </table>
</div>
