@php
  use \App\Http\Controllers\Web\NotificationController;
  $media = (new NotificationController())->getMedia();
@endphp
<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!--<base href="/">--><base href=".">

  <title>@yield('title')</title>
  <link href="{{ asset('img/logo.png') }}" rel="icon">
  <link href="{{ asset('v3/css.css') }}" rel="stylesheet">
  <link href="{{ asset('v3/icon.css') }}" rel="stylesheet">
  <link href="{{ asset('v3/css/custome.css') }}" rel="stylesheet">
  <link href="{{ asset('v2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" href="{{ asset('noty.min.css') }}">
    <link href="{{ asset('img/logo.png') }}" rel="shortcut icon">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/logo.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="robots" content="noindex">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- <script type="text/javascript" async="" src="{{ asset('v3/roundtrip.js') }}"></script> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('v3/bootstrap-landing.css') }}">
    <!-- <script src="{{ asset('v3/polyfills.js') }}"></script>
    <script src="{{ asset('v3/bundle.js') }}"></script> -->
  <style>
    app-root{
      height: 100vh;
      width: 100%;
      display: block;
    }
    .active-bar{
      border-bottom: 0.4em solid #656fff!important;
      height: 3px!important;
      border-radius: 1px;
    }

    .hide{
      display: none;
    }
    .show{
      display: block;
    }
    .hide{
     display: none;
    }
    .blue-border{
      border-color: green;
    }
    .tx-red{
      color:red;
    }
    .tx_green{
      color: green;
    }
    .ctype{
       font-weight: bolder;
       color: #A9A9A9;
       padding-top: 5px;
       padding-left: 20px;
       padding-bottom: 5px;
    }
  </style>

  <style>
    .lottie-loading-container {
      width: 100%;
      height: 100%;
      background: #ffffff;
      position: fixed;
      top: 0; left: 0;
      bottom: 0; right: 0;
      z-index: 10000;
    }
    .lottie-loading {
      width: 80px;
      height: 80px;
      position: absolute;
      left: 50%; top: 50%;
        transform: translate(-50%, -50%);
    }
  </style>

  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ asset('v3/styles.c0e044b8f47196a94325.css') }}">
<script id="adroll_scr_exp" onerror="window.adroll_exp_list = [];" type="text/javascript" src="{{ asset('v3/index.js') }}"></script>
<style type="text/css">
iframe#_hjRemoteVarsFrame {display: none !important; width: 1px !important; height: 1px !important; opacity: 0 !important; pointer-events: none !important;}</style>

<script charset="utf-8" src="{{ asset('v3/1-es2015.b1a48058ec11e093c8ee.js') }}"></script>
<script charset="utf-8" src="{{ asset('v3/3-es2015.d531f49d239771fd2c4b.js') }}"></script>
<script charset="utf-8" src="{{ asset('v3/common-es2015.d94e0b746b1958c90b22.js') }}"></script>
<script charset="utf-8" src="{{ asset('v3/8-es2015.7e66b84e126dc890c92a.js') }}"></script>
<style></style>
<style>
</style>

<div style="width: 1px; height: 1px; display: inline; position: absolute;">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(1)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(2)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(3)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(4)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(5)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(6)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(7)') }}">
</div>
<script type="text/javascript" src="{{ asset('v3/sendrolling.js') }}"></script>
<div style="width: 1px; height: 1px; display: inline; position: absolute;">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(5)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(8)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(9)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(10)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(11)') }}">
  <img height="1" width="1" style="border-style:none;" alt="" src="{{ asset('v3/out(12)') }}">
</div>
<script charset="utf-8" src="{{ asset('v3/10-es2015.eead97acaefee61f1da0.js') }}"></script>

</head>
@php
  if(\App\CoinPair::whereStat(1)->count() > 0){
      $base = \App\CoinPair::whereStat(1)->first();
  }else{
      $base = \App\CoinPair::first();
    }

@endphp
<body class="egret-indigo otranslate pace-done pace-done">
  <div class="pace  pace-inactive pace-inactive">
    <div class="pace-progress" data-progress-text="100%" data-progress="99" style="width: 100%;">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div>
</div>
  <app-root ng-version="8.2.12">
    <div class="theme-wrapper">
      <router-outlet></router-outlet>
      <app-main-layout _nghost-hwe-c0="">
        <app-maintenance _ngcontent-hwe-c0="" _nghost-hwe-c1=""><!----></app-maintenance>
        <header _ngcontent-hwe-c0="" class="dashboard-header authenticated">
          <div _ngcontent-hwe-c0="" class="dashboard-main-header">
            <!----><!---->
            <a _ngcontent-hwe-c0="" href="{{env('APP_URL')}}">
              <img _ngcontent-hwe-c0="" class="dashboard-logo dashboard-logo-light" src="{{ asset('img/logo.png') }}">
              <img _ngcontent-hwe-c0="" class="dashboard-logo dashboard-logo-dark" src="{{ asset('img/logo.png') }}" hidden="">
            </a>
            <!----><!---->
            <nav _ngcontent-hwe-c0="" class="hidden-xs mat-tab-nav-bar mat-primary" disableripple="" mat-tab-nav-bar="" style="margin-left: 4px;">
              <div class="mat-tab-links">
              <!---->
              <a  href="/market/{{$base->pair}}" class="mat-tab-link  {{ request()->is('market/*') ? ' mat-tab-label-active active-bar' : '' }}" aria-current="false" aria-disabled="false" tabindex="0">
               Trade
             </a>
             @if (auth()->user())
              <a  class="mat-tab-link  {{ request()->is('my-orders') ? ' mat-tab-label-active active-bar' : '' }}" href="/my-orders" aria-current="false" aria-disabled="false" tabindex="0">
                Orders
              </a>
              <a class="mat-tab-link  {{ request()->is('staking') ? ' mat-tab-label-active active-bar' : '' }}" href="/staking" aria-current="false" aria-disabled="false" tabindex="0">
                Staking
              </a>
              <a class="mat-tab-link {{ request()->is('my-wallets') ? ' mat-tab-label-active active-bar' : '' }}" href="/my-wallets" aria-current="true" aria-disabled="false" tabindex="0">   Wallet
              </a>
             @endif


            </div>
          </nav>
          <!---->
          <div _ngcontent-hwe-c0="" style="margin-left: auto">
            @if (!auth()->user())
               <a class="mat-tab-link {{ request()->is('user/signin') ? ' mat-tab-label-active active-bar' : '' }}" href="/user/signin" aria-current="true" aria-disabled="false" tabindex="0">   Signin
                </a>
               <a class="mat-tab-link {{ request()->is('user/signup') ? ' mat-tab-label-active active-bar' : '' }}" href="/user/signup" aria-current="true" aria-disabled="false" tabindex="0">   Signup
                </a>
              @endif

             @if (auth()->user())
            <div _ngcontent-hwe-c0="" class="dropdown-toggle">
              <!----><!---->
              <img _ngcontent-hwe-c0="" class="dashboard-thumbnail" id="imgProfileSel" src="{{ asset('v3/ic_profile.svg') }}">
              <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu main hidden-xs"><!---->
                <a href="/user/profile">
                  <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu-item" tabindex="0"> Settings </div>
                </a>
                <!---->
                <a href="/user/verification">
                  <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu-item" tabindex="0"> Verification </div>
                </a>
                <!---->
                <a href="/user/referral">
                  <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu-item" tabindex="0"> Invite Friends </div>
                </a>
                <!---->
                <a href="/user/wallet-addresses">
                  <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu-item" tabindex="0"> Withdrawal Addresses </div>
                </a>
                <a href="signout">
                  <div _ngcontent-hwe-c0="" class="dashboard-mobile-menu-item"> Sign out </div>
                </a>
              </div>
            </div>
            <!---->
            <!-- <img _ngcontent-hwe-c0="" class="mobile-menu-icon visible-xs-inline-block" src="{{ asset('assets/v3/ic_menu.svg') }}"> -->
          @endif
          </div>
            <!---->
          </div>
          <!----><!---->
        </header>


        @yield('mainbody')




<footer _ngcontent-hwe-c0="" class="">
	<!---->
	<div _ngcontent-hwe-c0="" class="container-fluid">
		<div _ngcontent-hwe-c0="" class="footer-section row">
			<div _ngcontent-hwe-c0="" class="col-sm-2">
				<ul _ngcontent-hwe-c0="">
          <li></li>
					<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/market/{{$base->pair}}">Market</a></li>
					<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/fees">Fees</a></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/voting">Voting</a></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="listing">Listing</a></li>
				</ul>
			</div>
		<div _ngcontent-hwe-c0="" class="col-sm-2">
			<ul _ngcontent-hwe-c0="">
        <li></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="ieo">IEO</a></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="widgets">Widget</a></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="api-docs">API</a></li>
			<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="news-blog">News</a></li>
			</ul>
		</div>
	<div _ngcontent-hwe-c0="" class="col-sm-2">
		<ul _ngcontent-hwe-c0="">
      <li></li>
			<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/faq">FAQ</a></li>
			<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/legal-security">Legal</a></li>
			<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/privacy-policy">Privacy</a></li>
			<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" target="_blank" href="/tos">Terms</a></li>
		</ul>
	</div>
	<div _ngcontent-hwe-c0="" class="col-sm-6 operate">
		<div _ngcontent-hwe-c0="" class="socials">
			<div _ngcontent-hwe-c0="" class="stores">
				<a _ngcontent-hwe-c0="" href="#" target="_blank">
					<img _ngcontent-hwe-c0="" alt="app store" src="{{ asset('v3/appstore.png') }}">
				</a>
				<a _ngcontent-hwe-c0="" href="#" target="_blank">
					<img _ngcontent-hwe-c0="" alt="google play" src="{{ asset('v3/playstore.png') }}">
				</a>
			</div>
			<a _ngcontent-hwe-c0="" class="need-help" target="_blank" href="/support">Need help?
				<span _ngcontent-hwe-c0="">Contact us</span>
			</a>
		</div>
		<div _ngcontent-hwe-c0="" class="footer-info">
			<img _ngcontent-hwe-c0="" alt="Europian Union" src="{{ asset('v3/ic_eu.png') }}">
			<span _ngcontent-hwe-c0="">{{env('APP_FULL_NAME')}} operates in accordance with the EU licences: Providing services of exchanging a virtual currency against a fiat currency. Providing a virtual currency wallet service. EuroToken OÜ, Roosikrantsi tn 2-K468, Tallinn, 10119, Estonia</span>
		</div>
	</div>
	</div>
	</div>

	<div _ngcontent-hwe-c0="" class="licence">
		<div _ngcontent-hwe-c0="" class="footer-container container-fluid">
			<p _ngcontent-hwe-c0="">&copy; {{date('Y')}} {{env('APP_FULL_NAME')}} </p>
			<ul _ngcontent-hwe-c0="" class="social-share">
				<!-- <li _ngcontent-hwe-c0="">
					<a _ngcontent-hwe-c0="" href="https://t.me/{{env('APP_NAME')}}com" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_telegram.svg') }}" style="    width: 40px;">
					</a>
				</li> -->
				<li _ngcontent-hwe-c0="">
					<a _ngcontent-hwe-c0="" href="{{ $media->discord_handle }}" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_discord.svg') }}" style="    width: 40px;"></a>
				</li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="{{ $media->twitter_handle }} " rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_twitter.svg') }}"></a></li>
				<!-- <li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="https://www.reddit.com/r/{{ env('APP_NAME')}}" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_reddit.svg') }}"></a></li> -->
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="{{ $media->facebook_handle }}" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_facebook.svg') }}"></a></li>
				<li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="{{ $media->instagram_handle }}" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_instagram.svg') }}" style="    width: 40px;"></a></li>
				<!-- <li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="https://www.linkedin.com/company/{{ env('APP_NAME')}}" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_linkedin.svg') }}"></a></li> -->
				<!-- <li _ngcontent-hwe-c0=""><a _ngcontent-hwe-c0="" href="https://www.youtube.com/channel/UCCJFI_g-_nyELlSxBSH3HrQ" rel="noopener" target="_blank"><img _ngcontent-hwe-c0="" alt="Socilas icons" src="{{ asset('v3/ic_youtube.svg') }}"></a></li> -->
			</ul>

			<div _ngcontent-hwe-c0="" class=" profile-bar footer-lang" id="language_bar">
				<form _ngcontent-hwe-c0="" action="{{ env('APP_URL')}}" novalidate="" class="ng-untouched ng-pristine ng-valid">
					<app-drop-down-select _ngcontent-hwe-c0="" _nghost-hwe-c4="" class="ng-untouched ng-pristine ng-valid">
						<div _ngcontent-hwe-c4="" appclickoutside="" class="select-area">
							<div _ngcontent-hwe-c4="" class="current-value"><!----><!----><!----><!---->
								<span _ngcontent-hwe-c4="">en</span><!----><!---->
								<span _ngcontent-hwe-c4="" class="caret"></span>
							</div><!---->
						</div>
					</app-drop-down-select>
				</form>
			</div>
		</div>
	</div>
</footer><!---->

</app-main-layout>
</div>
</app-root>
<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('v3/custom.js') }}"></script>
<script src="{{ asset('noty.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js.js') }}"></script>


  <script>
    // <!-- var animation = bodymovin.loadAnimation({ -->
      // container: document.querySelector('.lottie-loading'), // Required
      // path: '{{ asset('v3/animation/loading.json') }}', // Required
    //   renderer: 'svg', // Required
    //   loop: true, // Optional
    //   autoplay: true, // Optional
    //   name: "Hello World", // Name for future reference. Optional.
    // });

    // window.addEventListener('load', function() {
    //   document.querySelector('.lottie-loading-container').remove();
    // });
  </script>


<script type="text/javascript">
	$("#close2fa").click(function(){
		 $("#tfa-form").toggleClass('show');
	});
	$("#show2fa").click(function(){
		 $("#tfa-form").toggleClass('show');
	});
	$(".custom-checkbox").click(function(){
		$(this).toggleClass('active-checkbox');
	});
	$("#showpwc").click(function(){
		 $("#pwc-form").toggleClass('show');
	});
	$("#closepwc").click(function(){
		 $("#pwc-form").toggleClass('show');
	});
	$("#showphone").click(function(){
		 $("#addphone").toggleClass('show');
	});
	$("#closephone").click(function(){
		 $("#addphone").toggleClass('show');
	});
	$(".closewallet").click(function(){
		 $("#walletadd").toggleClass('show');
	});
	$("#show_addressform").click(function(){
		 $("#walletadd").toggleClass('show');
	});
	$(".header-deposit-button").click(function(){
		alert("hello");
	});
</script>
<!--
<script src="{{ asset('v3/runtime-es2015.504e2b35622db7c5ae8e.js') }}" type="module"></script>
<script src="{{ asset('v3/runtime-es5.504e2b35622db7c5ae8e.js') }}" nomodule="" defer=""></script>
<script src="{{ asset('v3/polyfills-es5.b85f8105131a00f85f35.js') }}" nomodule="" defer=""></script>
<script src="{{ asset('v3/polyfills-es2015.fa8722039361d7744117.js') }}" type="module"></script>
<script src="{{ asset('v3/scripts.201b83107aecbb33dbd3.js') }}" defer=""></script>
<script src="{{ asset('v3/main-es2015.daa4091cd06824777144.js') }}" type="module"></script>
<script src="{{ asset('v3/main-es5.daa4091cd06824777144.js') }}" nomodule="" defer=""></script> -->

</body>
</html>
