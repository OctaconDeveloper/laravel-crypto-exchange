<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="{{ config('app.full_name') }} Centralized Exchange">
  <meta name="author" content="{{ config('app.full_name')}}">
<link rel="shortcut icon" href="{{ asset('img/logo.png')}}">
  <link href="{{ asset('v2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="{{ asset('v2/css/sb-admin-2.min.css') }}" rel="stylesheet">
  <link href="{{ asset('v2/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
@php
is_token_active('block/tokens/edit');
    function nav_active($sql)
    {
    	$gh=$_SERVER['REQUEST_URI'];
    	if(in_array($gh, $sql)){
    		return "show";
        }
    }

    function is_token_active($sql)
    {
        $arr = explode("/",Route::current()->uri());
        array_pop($arr);
        $path = implode("/",$arr);
        if($path == $sql)
        // return Route::is($sql,'*') ? 'show' : '';
        return "show";

    }
    function is_token_active_nav($sql)
    {
        $arr = explode("/",Route::current()->uri());
        array_pop($arr);
        $path = implode("/",$arr);
        if($path == $sql)
        // return Route::is($sql,'*') ? 'show' : '';
        return "active";

    }

    function is_active($sql){
    	$gh=$_SERVER['REQUEST_URI'];
    	if(in_array($gh, $sql)){
    		return "";
        }
    }


@endphp
<body id="page-top">
  <div id="wrapper">
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/block/home">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"> Admin Dashboard  </div>
      </a>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item {{ is_active(array('/block/home')) }}">
        <a class="nav-link" href="/block/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider">
    @if (auth()->user()->user_type_id !== 3)
      @if (auth()->user()->user_type_id == 1)
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ is_active(array('/block/admin/createaccount','/block/admin/viewaccount','/block/admin/accountslog')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#admin" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Admin</span>
        </a>
        <div id="admin" class="collapse {{ nav_active(array('/block/admin/createaccount','/block/admin/viewaccount','/block/admin/accountslog')) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Components:</h6>
            <a class="collapse-item" href="/block/admin/createaccount">Create Account  </a>
            <a class="collapse-item" href="/block/admin/viewaccount">Accounts</a>
            <a class="collapse-item" href="/block/admin/accountslog">Accounts Log</a>
          </div>
        </div>
      </li>
      @endif
      <li class="nav-item {{ is_active(array('/block/account/createaccount','/block/account/accountslog','/block/account/accountwallet','/block/account/zerotrading','/block/account/blockaccount','/block/account/viewaccount')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#account" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-users"></i>
          <span>Users</span>
        </a>
        <div id="account" class="collapse {{ nav_active(array('/block/account/createaccount','/block/account/accountslog','/block/account/accountwallet','/block/account/zerotrading','/block/account/blockaccount','/block/account/viewaccount')) }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">User Components:</h6>
            <a class="collapse-item" href="/block/account/createaccount">Create Account  </a>
            <a class="collapse-item" href="/block/account/viewaccount">User Accounts</a>
            <a class="collapse-item" href="/block/account/accountwallet">Account Wallet</a>
            <a class="collapse-item" href="/block/account/zerotrading">Zero Trading Account</a>
            <a class="collapse-item" href="/block/account/blockaccount">Block Account</a>
            <a class="collapse-item" href="/block/account/accountslog">Accounts Log</a>
          </div>
        </div>
      </li>
      <li class="nav-item {{is_token_active_nav('block/tokens/edit')}} {{ is_active(array('/block/tokens/addtoken/token','/block/tokens/addtoken/ieo','/block/tokens/modifytoken/token','/block/tokens/modifytoken/ieo')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tokens" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-coins"></i>
          <span>Coin/Tokens</span>
        </a>
    <div id="tokens" class="collapse {{ nav_active(array('/block/tokens/addtoken/token','/block/tokens/addtoken/ieo','/block/tokens/modifytoken/token','/block/tokens/modifytoken/ieo')) }} {{is_token_active('block/tokens/edit')}}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Token Components:</h6>
            <a class="collapse-item" href="/block/tokens/addtoken/token">Add Token</a>
            <a class="collapse-item" href="/block/tokens/modifytoken/token">Modify Token</a>
            <a class="collapse-item" href="/block/tokens/addtoken/ieo">Add IEO</a>
            <a class="collapse-item" href="/block/tokens/modifytoken/ieo">Modify IEO</a>
          </div>
        </div>
      </li>
      <li class="nav-item {{ is_active(array('/block/markets/history','/block/markets/addpair','/block/markets/allpair','/block/markets/settings','/block/markets/market')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#market" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Market</span>
        </a>
        <div id="market" class="collapse {{ nav_active(array('/block/markets/history','/block/markets/addpair','/block/markets/allpair','/block/markets/settings','/block/markets/market')) }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Coin Market Components:</h6>
            <a class="collapse-item" href="/block/markets/addpair">Add Market Pair</a>
            <a class="collapse-item" href="/block/markets/allpair">View Market Pair</a>
            <a class="collapse-item" href="/block/markets/market">Search Market</a>
            <a class="collapse-item" href="/block/markets/history">Market History</a>
            <a class="collapse-item" href="/block/markets/settings">Trade Settings</a>
          </div>
        </div>
      </li>

      @if (auth()->user()->user_type_id == 1)
      <li class="nav-item {{ is_active(array('/block/wallets/viewwallets','/block/wallets/refreshwallets','/block/wallets/withdrawals','/block/wallets/deposits')) }}">
        <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#wallet" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wallet"></i>
          <span>Wallet</span>
        </a>
        <div id="wallet" class="collapse {{ nav_active(array('/block/wallets/viewwallets','/block/wallets/refreshwallets','/block/wallets/withdrawals','/block/wallets/deposits')) }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Wallet Components:</h6>
            <a class="collapse-item" href="/block/wallets/viewwallets">View Wallets</a>
            {{-- <a class="collapse-item" href="/block/wallets/refreshwallets">Refresh Wallets</a> --}}
            <a class="collapse-item" href="/block/wallets/withdrawals">Withdrawals</a>
            <a class="collapse-item" href="/block/wallets/deposits">Deposits</a>
          </div>
        </div>
      </li>
      @endif
      <li class="nav-item {{is_token_active_nav('block/kyc/viewkyc')}} {{ is_active(array('/block/kyc/pendingverification','/block/kyc/verifiedaccounts','/block/kyc/viewkyc')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#kyc" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-user-check"></i>
          <span>KYC</span>
        </a>
        <div id="kyc" class="collapse {{is_token_active('block/kyc/viewkyc')}} {{ nav_active(array('/block/kyc/pendingverification','/block/kyc/verifiedaccounts','/block/kyc/viewkyc')) }}" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">KYC Components:</h6>
            <a class="collapse-item" href="/block/kyc/pendingverification">Pending Verification</a>
            <a class="collapse-item" href="/block/kyc/verifiedaccounts">Verified Accounts</a>
          </div>
        </div>
      </li>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item {{ is_active(array('/block/voting/newvoting','/block/voting/modifyvoting','/block/voting/listing')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#voting" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-vote-yea"></i>
          <span>Voting</span>
        </a>
        <div id="voting" class="collapse {{ nav_active(array('/block/voting/newvoting','/block/voting/modifyvoting','/block/voting/listing')) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Voting Components:</h6>

            @if (auth()->user()->user_type_id == 1)
                <a class="collapse-item" href="/block/voting/listing">Coin Listing</a>
            @endif
            <a class="collapse-item" href="/block/voting/newvoting">New Voting</a>
            <a class="collapse-item" href="/block/voting/modifyvoting">Modify Voting</a>
          </div>
        </div>
      </li>

      <li class="nav-item {{ is_active(array('/block/staking/addstakes','/block/staking/allstakes','/block/staking/request')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#staking" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-vote-yea"></i>
          <span>Staking</span>
        </a>
        <div id="staking" class="collapse {{ nav_active(array('/block/staking/addstakes','/block/staking/allstakes','/block/staking/request')) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Staking Components:</h6>
            <a class="collapse-item" href="/block/staking/addstakes">Add</a>
            <a class="collapse-item" href="/block/staking/allstakes">View</a>
            {{-- <a class="collapse-item" href="/block/staking/request">Requests</a> --}}
          </div>
        </div>
      </li>
    @endif
      @if (auth()->user()->user_type_id == 3 || auth()->user()->user_type_id == 1)
      <li class="nav-item {{ is_active(array('/block/chat/chatroom','/block/chat/blockuser')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#chat" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-comments"></i>
          <span>Chat</span>
        </a>
        <div id="chat" class="collapse {{ nav_active(array('/block/chat/chatroom','/block/chat/blockuser')) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Chat Components:</h6>
            <a class="collapse-item" href="/block/chat/chatroom">Chat Room</a>
            <a class="collapse-item" href="/block/chat/blockuser">Block User</a>
          </div>
        </div>
      </li>
      @endif
      @if (auth()->user()->user_type_id !== 3)
      <li class="nav-item {{ is_active(array('/block/notifications/single','/block/notifications/broadcast','/block/notifications/multiple','/block/notifications/logs')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#notifications" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-bell"></i>
          <span>Notification</span>
        </a>
        <div id="notifications" class="collapse {{ nav_active(array('/block/notifications/single','/block/notifications/multiple','/block/notifications/logs','/block/notifications/broadcast')) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Notification Components:</h6>
            <a class="collapse-item" href="/block/notifications/single">Single Notification</a>
            <a class="collapse-item" href="/block/notifications/multiple">Multiple Notification</a>
            <a class="collapse-item" href="/block/notifications/broadcast">Broadcast</a>
            <a class="collapse-item" href="/block/notifications/logs">Notification Logs</a>
          </div>
        </div>
      </li>
      @endif

      <li class="nav-item {{ is_active(array('/block/setup/faq','/setup/password','/setup/socialmedia','/setup/activitylogs','/setup/myactivitylog')) }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setup" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-cog"></i>
          <span>Setup</span>
        </a>
        <div id="setup" class="collapse {{ nav_active(array('/block/setup/faq','/setup/password','/setup/socialmedia','/setup/activitylogs','/setup/myactivitylog')) }}" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Notification Components:</h6>
            <a class="collapse-item" href="/block/setup/password">Password</a>
            <a class="collapse-item" href="/block/setup/socialmedia">Social Media</a>
            <a class="collapse-item" href="/block/setup/faq">FAQs</a>
            <a class="collapse-item" href="/block/setup/myactivitylog">My Activity Logs</a>

            @if (auth()->user()->user_type_id == 1)
            <a class="collapse-item" href="/block/setup/activitylogs">All Activity Logs</a>
            @endif
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->



<div id="content-wrapper" class="d-flex flex-column">
  <div id="content">
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
           <i class="fa fa-bars"></i>
         </button>
         <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">

         </form>

         <!-- Topbar Navbar -->
         <ul class="navbar-nav ml-auto">

           <!-- Nav Item - Alerts -->
           <li class="nav-item dropdown no-arrow mx-1">
             <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <i class="fas fa-bell fa-fw"></i>
               <!-- Counter - Alerts -->
               <span class="badge badge-danger badge-counter">1+</span>
             </a>
             <!-- Dropdown - Alerts -->
             <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
               <h6 class="dropdown-header">
                 Alerts Center
               </h6>
               <a class="dropdown-item d-flex align-items-center" href="#">
                 <div class="mr-3">
                   <div class="icon-circle bg-primary">
                     <i class="fas fa-file-alt text-white"></i>
                   </div>
                 </div>
                 <div>
                   <div class="small text-gray-500">December 12, 2019</div>
                   <span class="font-weight-bold">A new monthly report is ready to download!</span>
                 </div>
               </a>
               <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
             </div>
           </li>

           <div class="topbar-divider d-none d-sm-block"></div>           <!-- Nav Item - User Information -->
           <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin Module</span>
               <img class="img-profile rounded-circle" src="{{ asset('img/ic_profile.svg') }}">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
               <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                 <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                 Logout
               </a>
             </div>
           </li>
         </ul>
       </nav>
       <!-- End of Topbar -->
