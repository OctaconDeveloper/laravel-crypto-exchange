@include('layouts.header')
    <title>Referal</title>
@php
use Carbon\Carbon;
    $referal_log = \App\ReferalLog::whereReferalId(auth()->user()->id)->orderBy('created_at','DESC')->get();
    $referal_count = \App\User::whereReferral(auth()->user()->refCode)->count();
    $referal_count_block = \App\User::whereReferral(auth()->user()->refCode)->whereIsActive(2)->count();
    $referal_amount = \App\ReferalBalance::whereUserId(auth()->user()->id)->first();
    $scape_date = Carbon::today();
    $referal_amount_last = \App\ReferalLog::whereReferalId(auth()->user()->id)->where('created_at', '<=', $scape_date)->sum('amount');
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

                             <router-outlet _ngcontent-ndw-c6=""></router-outlet>

                             <app-referral _nghost-ndw-c27="" class="ng-star-inserted">
                                 <div _ngcontent-ndw-c27="" class="col-lg-9 col-md-8 col-sm-7">
                                     <div _ngcontent-ndw-c27="" class="info-form referral general-box">
                                         <div _ngcontent-ndw-c27="" class="form-head">
                                             <div _ngcontent-ndw-c27="" class="form-head__icon">
                                                 <img _ngcontent-ndw-c27="" alt="referral" src="{{ asset('v3/referral-icon.svg') }}">
                                             </div>
                                             <h3 _ngcontent-ndw-c27="">Invite friends and earn!</h3>
                                         </div>
                                         <div _ngcontent-ndw-c27="" class="referral__content">
                      <textarea id="refMsg">Hello</textarea>
                      <input id="siteUrl" value="{{ env('APP_URL')}}" type="hidden">
                                             <h4 _ngcontent-ndw-c27="" class="referral-text referral-text--one">Invite people you know to join {{ env('APP_FULL_NAME ')}} and you will earn <span class="green-color"> 10%</span> from their <b>trading commissions</b>.</h4>
                                             <div _ngcontent-ndw-c27="" class="copy-link">
                                                 <span _ngcontent-ndw-c27="">Copy and send a link</span>
                                             </div>
                                             <div _ngcontent-ndw-c27="" class="referral__copy">
                                                 <div _ngcontent-ndw-c27="" class="copy-input">
                                                     <img _ngcontent-ndw-c27="" alt="key" src="{{ asset('v3/https-key.svg') }}">
                                                 <input id="reflink" value="{{config('app.url')}}r/{{ auth()->user()->refCode }}" type="hidden" >
                                                     <span _ngcontent-ndw-c27="" class="green-color">https:</span>
                                                 <span _ngcontent-ndw-c27="">//{{config('app.url_short')}}/r/{{ auth()->user()->refCode }} </span>
                                                 </div>
                                                 <span _ngcontent-ndw-c27="" class="referral__copy__img">
                                                     <app-copy-loader _ngcontent-ndw-c27="" _nghost-ndw-c8=""><!---->
                                                         <img _ngcontent-ndw-c8="" class="main-copy copy2" src="{{ asset('v3/ic_copy.svg') }}">
                                                     </app-copy-loader>
                                                 </span>
                                             </div>
                                             <div _ngcontent-ndw-c27="" class="invite-socials">
                                                 <div _ngcontent-ndw-c27="" class="invite-socials__fb button primary sb-facebook" sharebutton="facebook" aria-label="Share on Facebook" style="--button-color:#4267B2;">
                                                     <span _ngcontent-ndw-c27="" class="fb_invite">
                                                         <img _ngcontent-ndw-c27="" alt="facebook" src="{{ asset('v3/ic_facebook.svg') }}">
                                                         <small _ngcontent-ndw-c27=""> Facebook</small>
                                                     </span>
                                                 </div>
                                                 <div _ngcontent-ndw-c27="" class="invite-socials__tw button primary sb-twitter" sharebutton="twitter" aria-label="Share on Twitter" style="--button-color:#00acee;">
                                                     <span _ngcontent-ndw-c27="" class="tw_invite">
                                                         <img _ngcontent-ndw-c27="" alt="twitter" src="{{ asset('v3/ic_twitter.svg') }}">
                                                         <small _ngcontent-ndw-c27="">Twitter</small>
                                                     </span>
                                                 </div>
                                                 <div _ngcontent-ndw-c27="" class="invite-socials__ln button primary sb-linkedin" sharebutton="linkedin" aria-label="Share on LinkedIn" style="--button-color:#006fa6;">
                                                     <span _ngcontent-ndw-c27="" class="linkd_invite">
                                                         <img _ngcontent-ndw-c27="" alt="inkedin" src="{{ asset('v3/ic_linkedin.svg') }}">
                                                         <small _ngcontent-ndw-c27=""> Linkedin</small>
                                                     </span>
                                                 </div>
                                             </div><!---->
                                         </div>
                                         <br _ngcontent-ndw-c27=""><!---->
                                     </div>
                                     <div _ngcontent-ndw-c27="" class="general-box overview">
                                         <h4 _ngcontent-ndw-c27="">Stats overview</h4>
                                         <div _ngcontent-ndw-c27="" class="overview__items">
                                             <div _ngcontent-ndw-c27="" class="overview__item">
                                             <span _ngcontent-ndw-c27="" class="number"> {{$referal_count}}</span>
                                                 <span _ngcontent-ndw-c27="" class="text"> Referrals </span>
                                             </div>
                                             <div _ngcontent-ndw-c27="" class="overview__item">
                                                 <span _ngcontent-ndw-c27="" class="visits"> {{$referal_count_block}} </span>
                                                 <span _ngcontent-ndw-c27="" class="text"> Blocked </span>
                                             </div>
                                             <div _ngcontent-ndw-c27="" class="overview__item">
                                                 <span _ngcontent-ndw-c27="" class="last"> {{ sprintf("%0.5f", $referal_amount_last) }} </span>
                                                 <span _ngcontent-ndw-c27="" class="text"> Estimated LAST   <b _ngcontent-ndw-c27="" class="green-color">BTC     </b></span>
                                             </div>
                                             <div _ngcontent-ndw-c27="" class="overview__item">
                                                 <span _ngcontent-ndw-c27="" class="total"> {{ sprintf("%0.5f", $referal_amount->amount) }} </span>
                                                 <span _ngcontent-ndw-c27="" class="text"> Estimated TOTAL  <b _ngcontent-ndw-c27="" class="green-color">BTC</b></span>
                                             </div>
                                         </div>
                                     </div>
                                     <div _ngcontent-ndw-c27="" class="app-form info-form main-app-container usertrades">
                                         <div _ngcontent-ndw-c27="" class="header-title header-title--referral transactions-header">
                                             <div _ngcontent-ndw-c27="" class="header-text "> Referral Commission History </div>
                                             <form _ngcontent-ndw-c27="" class="filter-form data-filter-form ng-untouched ng-pristine ng-valid" novalidate="">
                                                 <div _ngcontent-ndw-c27="" class="filters-list">
                                                     <div _ngcontent-ndw-c27="" class="clearfix"></div>
                                                 </div>
                                             </form>
                                         </div>
                                         <div _ngcontent-ndw-c27="" class="table  main-page-table wallet-detail-table wallet-main">
                                             <div _ngcontent-ndw-c27="" class="button-include"><!----></div><!---->
                                             <div _ngcontent-ndw-c27="" class="no-market-info ng-star-inserted">



                      <table  width="100%">
                        <thead >
                          <tr class="table-head">
                            <th>UserEmail</th>
                            <th>Currency</th>
                            <th>Amount</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($referal_log as $referal)
                                <tr  class="bid-tr ng-star-inserted" style="padding-right: 75px;">
                                <td>{{ $referal->user-id }}</td>
                                <td>{{ strtoupper($referal->currency) }}</td>
                                <td> {{sprintf("%0.8f",$referal->amount)}}</td>
                                <td>{{ $referal->created_at}}</td>
                              </tr>
                            @empty
                            <tr class="bid-tr ng-star-inserted"  style="padding-left: 40%; padding-top: 10%;">
                              <td colspan="4">
                                <img style="color:red; margin: 150px;" _ngcontent-ndw-c27="" alt="no-orders" src="{{ asset('v3/no-referral.svg') }}"> No Transactions
                              </td>
                            </tr>

                            @endforelse
                        </tbody>
                      </table>


                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </app-referral>
                            </div>
                        </div>
                    </div>
                </div>
            </app-settings>
        </div>

@include('layouts.footer')
