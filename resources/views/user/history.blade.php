@include('layouts.header')

    <title>Wallet Transaction</title>
    <div _ngcontent-jwu-c0="" class="wrapper"><!---->
        @include('layouts.deposit-nav')
        <div _ngcontent-jwu-c0="" class="sidenav-overlay"></div>
    </div>
    <router-outlet _ngcontent-jwu-c0=""></router-outlet>
  	<app-settings _nghost-jwu-c23="" class="ng-star-inserted">
  		<div _ngcontent-jwu-c23="" class="big_bg wrapper-cust">
  			<div _ngcontent-jwu-c23="" class="form-block" id="profile">
				<div _ngcontent-jwu-c23="" class="container-fluid">
  					<div _ngcontent-jwu-c23="" class="row">
  						@include('layouts.sidebar')
                           <router-outlet _ngcontent-jwu-c23=""></router-outlet>
  						<app-profile class="ng-star-inserted"><!---->
  							<div class="col-lg-9 col-md-8 col-sm-7 ng-star-inserted">
  						 		<div class=" app-form info-form general-box">
  						 			<div class="form-head"><!----><!---->
                                        <h3 class="ng-star-inserted">Wallet Transaction History</h3>
                                    </div>
                                    <app-wallet-transactions _ngcontent-she-c18="" _nghost-she-c19="">
                                        <div class="app-form info-form main-app-container usertrades">
                                            <div class="header-title transactions-header">
                                                <div class="header-text "> Transactions </div>
                                            </div>
                                            <div class="table  main-page-table wallet-main" style="padding: 10px;">
                                                <div class="button-include">
                                                    <table class="main-page-table-header ng-star-inserted" width="100%">
                                                        <thead>
                                                            <tr class="table-head">
                                                                <th>Date</th>
                                                                <th>Type</th>
                                                                <th>Coin</th>
                                                                <th>Amount</th>
                                                                <th >Fee</th>
                                                                <th> Status</th>
                                                                <th>Transaction ID </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @forelse ($data as $log)
                                                                <tr class="bid-tr ng-star-inserted">
                                                                    <td>
                                                                        <b> {{ explode(" ",$log->created_at)[0] }} </b>
                                                                    </td>
                                                                    <td> {{ $log->type }} </td>
                                                                    <td> {{ strtoupper($log->ticker) }} </td>
                                                                    <td> {{ $log->amount }} </td>
                                                                    <td> {{ $log->fee }} </td>
                                                                    <td>
                                                                        <span class="ng-star-inserted"> {{ ucwords($log->trans_type->name) }} </span>
                                                                    </td>
                                                                    <td> {{ ($log->transID != null) ? $log->transID : 'Pending'  }} </td>
                                                                </tr>
                                                            @empty
                                                                <tr class="text-center bid-tr ng-star-inserted">
                                                                    <td class="text-center">No available record</td>
                                                                </tr>
                                                            @endforelse
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </app-wallet-transactions>
                                </div>
                            </div>
                        </app-profile>
                    </div>
                </div>
            </div>
        </div>
    </app-settings>


@include('layouts.footer')

