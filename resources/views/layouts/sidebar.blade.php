<style type="text/css">
	a{
		text-decoration: none;
	}
   .tx-red{
      color:red;
    }
    .tx_green{
      color: green;
    }
</style>

@php
    function is_active($a){
        $server = explode('/', $_SERVER['REQUEST_URI']);
        $one = array_slice($server, -2, 2, true);
        $two = implode("/", $one);
        if($a==$two){
            return 'active-link';
        }
    }
@endphp

  							<div _ngcontent-jwu-c23="" class="col-lg-3 col-md-4 col-sm-5">
  								<div _ngcontent-jwu-c23="" class="profile-view general-box">
  									<div _ngcontent-jwu-c23="" class="prof">
  										<div _ngcontent-jwu-c23="" class="avatar"><!----><!---->
                                          <img _ngcontent-jwu-c23="" alt="{{ auth()->user()->wallet_id }}" class="user-prof-pic default ng-star-inserted" src="{{ auth()->user()->picture ? auth()->user()->picture : asset('img/ic_profile.svg') }}">
  											<div _ngcontent-jwu-c23="" class="add background-color">
  												<input _ngcontent-jwu-c23="" accept="image/jpeg,image/png" id="profilePic" type="file">
  												<label _ngcontent-jwu-c23="" for="profilePic">
  													<img _ngcontent-jwu-c23="" alt="add photo" src="{{ asset('v3/ic_add_24.svg') }}">
  													<span _ngcontent-jwu-c23="" class="upload-img">Upload</span>

  												</label>
  											</div>
  										</div><!---->
  										<div _ngcontent-jwu-c23="" class="avatar-main-info"><!---->
  											<h4 _ngcontent-jwu-c23="" class="mail">
  												<b _ngcontent-jwu-c23="">{{auth()->user()->email}} </b></h4>
  											</div>
  										</div>
  										<div _ngcontent-jwu-c23="" class="main-info">
  											<span _ngcontent-jwu-c23="" class="status-space">
  												<span _ngcontent-jwu-c23="" class="status">Verification Status</span>

                                @if (auth()->user()->email_verified_at===null)
                                    <a href="/user/verification">
                                        <span _ngcontent-jwu-c23="" class="upgrade-status upgraded ng-star-inserted" tabindex="0">verify</span>
                                    </a>
                                @endif
  												<!---->
  											</span>
  											<div _ngcontent-jwu-c23="" class="tier-step"><!----><!---->
  												<span _ngcontent-jwu-c23="" class="">
                                                    @if (auth()->user()->email_verified_at===null)
                                <b style="color:red; font-weight: bolder;"> Not Verified <i class="fa fa-exclamation-triangle"></i> </b>
                            @else
                                <b style="color:green; font-weight: bolder;"> Verified <i class="fa fa-thumbs-up"></i></b>
                           @endif
  												</span><!---->
  											</div><!---->
  										</div>
  									</div>
  									<div _ngcontent-jwu-c23="" class="general-box choose">
  										<a style="text-decoration: none;" href="/user/profile">
  											<div _ngcontent-jwu-c23="" class="{{ is_active('user/profile') }}" tabindex="0">Profile </div>
  										</a>
  										<a style="text-decoration: none;" href="/user/verification">
  											<div _ngcontent-jwu-c23="" class="{{ is_active('user/verification') }}"  tabindex="0"> Verification </div>
  										</a>
  										<a style="text-decoration: none;" href="/user/referral">
  											<div _ngcontent-jwu-c23="" class="{{ is_active('user/referral') }}" tabindex="0">
  												<span _ngcontent-jwu-c23="" class="referral-title">Invite Friends </span>
  											</div>
  										</a>
  										<a style="text-decoration: none;" href="/user/wallet-addresses">
  											<div _ngcontent-jwu-c23="" class="{{ is_active('user/wallet-addresses') }}" tabindex="0">
  												<span _ngcontent-jwu-c23="" class="referral-title">Withdrawal Addresses</span>
	  										</div>
	  									</a>
  									</div>
  								</div>


