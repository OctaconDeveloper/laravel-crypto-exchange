@include('layouts.header')
    <title>Wallet Transaction</title>
    @php
    $transaction = \App\Transaction::whereUserId(auth()->user()->id)->get();
    $tokens = \App\Token::orderBy('name', 'ASC')->get();
    $withdrawal_addresses = \App\WithdrawalAddress::whereUserId(auth()->user()->id)->get();
   @endphp
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


  							 			<div class="form-body">
  							 				<div class="profile">

            <app-wallet-transactions _ngcontent-she-c18="" _nghost-she-c19="">
                <div _ngcontent-she-c19="" class="app-form info-form main-app-container usertrades">
                    <div _ngcontent-she-c19="" class="header-title transactions-header">
                        <div _ngcontent-she-c19="" class="header-text "> Transactions </div>
                        <!---->
                        <div _ngcontent-she-c19="" class="button secondary middle export ng-star-inserted">
                            <span _ngcontent-she-c19="">Export</span>
                        </div>
                    </div>
                    <div _ngcontent-she-c19="" class="table  main-page-table wallet-detail-table wallet-main">
                        <div _ngcontent-she-c19="" class="button-include">
                            <!---->
                            <table _ngcontent-she-c19="" class="main-page-table-header ng-star-inserted" width="100%">
                                <thead _ngcontent-she-c19="">
                                    <tr _ngcontent-she-c19="" class="table-head">
                                        <th _ngcontent-she-c19="" class="data-col">Date</th>
                                        <th _ngcontent-she-c19="">Type</th>
                                        <th _ngcontent-she-c19="">Coin</th>
                                        <th _ngcontent-she-c19="">Amount</th>
                                        {{-- <th _ngcontent-she-c19="">Address</th> --}}
                                        <th _ngcontent-she-c19="">Status</th>
                                        <th _ngcontent-she-c19="" class="copy-table-col" style="text-align: center">Transaction ID</th>
                                        <th _ngcontent-she-c19="" style="padding: 0!important;width: 0!important;"></th>
                                    </tr>
                                </thead>
                                <tbody _ngcontent-she-c19="">
                                    <!---->
                                    @forelse ($data as $log)

                                    <tr _ngcontent-she-c19="" class="bid-tr ng-star-inserted">
                                        <td _ngcontent-she-c19="" class="date-col data-col">
                                        <b _ngcontent-she-c19=""> {{ date('d-m-Y', strtotime($log->created_at)) }} </b>
                                        </td>
                                        <td _ngcontent-she-c19=""> {{ $log->type }} </td>
                                        <td _ngcontent-she-c19=""> {{ strtoupper($log->ticker) }} </td>
                                        <td _ngcontent-she-c19=""> {{ $log->withdraw_amount + $log->withdraw_fee }} </td>
                                        {{-- <td _ngcontent-she-c19=""> {{ $log->withdraw_fee }} </td> --}}
                                        {{-- <td _ngcontent-she-c19=""> {{ $log->withdraw_address }} </td> --}}
                                        <td _ngcontent-she-c19="">
                                            <!----><!---->
                                            <span _ngcontent-she-c19="" class="ng-star-inserted"> {{ ucwords($log->trans_type->name) }} </span>
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
                            </table>
                        </div><!---->
                    </div><!---->
                    </div><!---->
                </app-wallet-transactions>



                                        </div>
                                    </div>
                                </div>
                            </div><!---->


  							 </app-profile>
  							</div>
  						</div>
  					</div>
  				</div>
  			</app-settings>
  		</div>


@include('layouts.footer')

