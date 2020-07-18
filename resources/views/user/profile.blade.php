{{-- @extends('layouts.app') --}}
            @include('layouts.header')
<title>{{auth()->user()->email.' Profile'}}</title>
@php
    $QR_Image =  \QrCode::size(150)->errorCorrection('H')
                         ->generate(auth()->user()->qrcode_url);

@endphp
        {{-- @section('content') --}}
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
                                        <app-profile _nghost-jwu-c24="" class="ng-star-inserted">
                                            <div _ngcontent-jwu-c24="" class="col-lg-9 col-md-8 col-sm-7">
                                                <div _ngcontent-jwu-c24="" class="general-box">
                                                    <div _ngcontent-jwu-c24="" class="title-1">
                                                        <h3 _ngcontent-jwu-c24="">Security &amp; Login</h3>

                                                    </div>
                                                    <div _ngcontent-jwu-c24="" class="displayed">
                                                        <div _ngcontent-jwu-c24="" class="settings-space password-space">
                                                            <span id="errorMail" style="color:green; font-weight:bolder">
                                                                @if (\Session::has('msg'))
                                                                    {!! \Session::get('msg') !!}
                                                                @endif
                                                            </span>
                                                            <span id="errorMail" style="color:red">
                                                                  @include('errors.errors')
                                                              </span>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-jwu-c24="" class="displayed">
                                                        <div _ngcontent-jwu-c24="" class="settings-space password-space">
                                                            <div _ngcontent-jwu-c24="">
                                                                <h3 _ngcontent-jwu-c24="">Email </h3>
                                                                <span _ngcontent-jwu-c24="" class="email-text">{{ auth()->user()->email}}</span>
                                                            </div>
                                                        </div>
                                                        <div _ngcontent-jwu-c24="" class="settings-space password-space">
                                                            <div _ngcontent-jwu-c24="">
                                                                <h3 _ngcontent-jwu-c24="">Password</h3>
                                                                <span _ngcontent-jwu-c24="" class="pass">• • • • • • • • • •</span>
                                                            </div>
                                                            <button _ngcontent-jwu-c24="" id="showpwc" class="button secondary min-buttons"> Change </button>
                                                        </div>
                                                    </div>
                                                    <div _ngcontent-jwu-c24="" class="settings-space tfa-sector">
                                                        <div _ngcontent-jwu-c24="">
                                                            <h3 _ngcontent-jwu-c24="">2 Factor Authorization</h3><!---->
                                                        </div><!---->
                                                        <button _ngcontent-jwu-c24="" class="button secondary min-buttons ng-star-inserted" id="show2fa"> Enable </button><!---->
                                                    </div>
                                                    <!-- <div _ngcontent-jwu-c24="" class="settings-space promo-sector">
                                                        <div _ngcontent-jwu-c24="">
                                                            <h3 _ngcontent-jwu-c24="">Promo code</h3>
                                                        </div>
                                                        <div _ngcontent-jwu-c24="" class="with-input">
                                                            <div _ngcontent-jwu-c24="" class="promo-input">
                                                                <input _ngcontent-jwu-c24="" type="text" placeholder="Your promo code">
                                                            </div>
                                                            <button _ngcontent-jwu-c24="" class="button filled-btn with-btn ng-star-inserted">Add </button>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div><!---->




                                            <!-- //2FA Modal -->
                                            <div id="tfa-form" _ngcontent-jwu-c24="" class="see-modal-form see-tfa-form ng-star-inserted hide"><!---->
                                                <div _ngcontent-jwu-c24="" class="login-form enable2fa fixed ng-star-inserted">
                                                    <img _ngcontent-jwu-c24="" alt="close" id="close2fa" class="close-modal" src="{{ asset('v3/ic_close_black.svg') }}">
                                                    <div _ngcontent-jwu-c24="" class="order-info" style="text-align: center"><!---->
                                                        <div _ngcontent-jwu-c24="" class="ng-star-inserted">
                                                            <h3 _ngcontent-jwu-c24="" class="enable-h3">Enable 2 Factor Authorization</h3>
                                                            <div _ngcontent-jwu-c24="" class="form-row enable-description">
                                                                <p _ngcontent-jwu-c24="">Scan QR code by Google Authenticator and enter 2FA code from the app.</p>
                                                            </div>
                                                            <div _ngcontent-jwu-c24="" class="share-store">
                                                                <div _ngcontent-jwu-c24="">
                                                                    <a _ngcontent-jwu-c24="" href="https://itunes.apple.com/us/app/google-authenticator/id388497605?mt=8" target="_blank">
                                                                        <img _ngcontent-jwu-c24="" alt="" src="{{ asset('v3/appstore.png') }}">App store
                                                                    </a>
                                                                </div>
                                                                <div _ngcontent-jwu-c24="">
                                                                    <a _ngcontent-jwu-c24="" href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&amp;hl=en" target="_blank">
                                                                        <img _ngcontent-jwu-c24="" alt="" src="{{ asset('v3/playstore.png') }}">Google Play
                                                                    </a>
                                                                </div>
                                                            </div><!---->
                                                            <div _ngcontent-jwu-c24="" class="form-row qr-row ng-star-inserted">
                                                                <ngx-qrcode _ngcontent-jwu-c24="" qrc-class="aclass" qrc-errorcorrectionlevel="L">
                                                                    <div class="aclass">
                                                                        <div>
                                                                            {!! $QR_Image !!}
                                                                        </div>
                                                                    </div>
                                                                </ngx-qrcode>
                                                            </div>
                                                            <div _ngcontent-jwu-c24="" class="copy-symbols">
                                                            <input _ngcontent-jwu-c24="" id="cprt" value="{{auth()->user()->secret}}" readonly="" type="text">
                                                                <span _ngcontent-jwu-c24="" class="copy"><!---->
                                                                    <span _ngcontent-jwu-c24="" class="copy-img ng-star-inserted">
                                                                        <app-copy-loader _ngcontent-jwu-c24="" _nghost-jwu-c15=""><!---->
                                                                            <img _ngcontent-jwu-c15="" class="main-copy copy1" src="{{ asset('v3/ic_copy.svg') }}">
                                                                        </app-copy-loader>
                                                                    </span>
                                                                </span>
                                                            </div>
                                                            <form method="POST" action="/activate-tfa">
                                                                @csrf
                                                            <p _ngcontent-jwu-c24="" class="keep-tfa">Keep your 2FA backup key to be able to move your 2FA to a new device.</p>
                                    @if(auth()->user()->tfa_stat)
                                      <div _ngcontent-jwu-c24="" class="form-row">
                                        <p _ngcontent-jwu-c24="" class="keep-tfa" style="color: green">2FA already enabled.</p>
                                      </div>
                                    @else
                                      <div _ngcontent-jwu-c24="" class="form-row">
                                        <input _ngcontent-jwu-c24="" appdigitsonly="" name="tfa_code" id="upcode" inputmode="numeric" maxlength="6" minlength="6" pattern="[0-9]*" type="text" autofocus="" placeholder="Authorization Code" class="ng-untouched ng-pristine ng-invalid">
                                      </div>
                                    @endif
                                                        </div><!---->
                                                            <div _ngcontent-jwu-c24="" class="row submit-row tfa-submition">
                                                                <div _ngcontent-jwu-c24="" class="col-sm-12">
                                                                    <div _ngcontent-jwu-c24="" class="submit-button">
                                                                        <div _ngcontent-jwu-c24="" class="tfa-submit-btn" style="text-align: right">
                                                                            <button _ngcontent-jwu-c24="" id="update2FA" class="btn button primary" type="submit" disabled=""><!---->
                                                                                <span _ngcontent-jwu-c24="" class="ng-star-inserted">SUBMIT</span><!---->
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div _ngcontent-jwu-c24="" class="layout"></div>
                                            </div><!----><!----><!---->

                                            <!--End 2FA-->
                                            <!--- Change Password-->
                                             <div _ngcontent-tuq-c19="" id="pwc-form" class="see-modal-form see-resspass-form ng-star-inserted hide">
                                                 <div _ngcontent-tuq-c19="" class="login-form pass-reset-form fixed">
                              <img _ngcontent-tuq-c19="" alt="close" id="closepwc" class="close-modal" src= "{{ asset('v3/ic_close_black.svg') }}">
                              <h3 _ngcontent-tuq-c19="">Reset your password</h3>
                              <p _ngcontent-tuq-c19="">We will send an email with confirmation on your password reset.</p>
                                                 <p _ngcontent-tuq-c19="" class="fixed-email">{{auth()->user()->email}}</p>
                              <class _ngcontent-tuq-c19="" autocomplete="__away" novalidate="" class="ng-pristine ng-invalid ng-touched">
                                <form method="POST" action="/password-reset">
                                    @csrf
                                <div _ngcontent-tuq-c19="">
                                    <span id="errorMail" style="color:green; font-weight:bolder">
                                        @if (\Session::has('msg'))
                                            {!! \Session::get('msg') !!}
                                        @endif
                                    </span>
                                  <span id="errorMail" style="color:red">
                                        @include('errors.errors')
                                    </span>
                                  <div _ngcontent-tuq-c19="" class="check-psw error-border">
                                    <input  id="resetpassword" name="password" type="password" placeholder="New password" class="ng-untouched ng-pristine ng-valid">
                                    <div _ngcontent-tuq-c19="" class="password-strength">
                                      <i class="fa rs1"></i>
                                    </div>
                                  </div>
                                  <div _ngcontent-tuq-c19="" class="check-psw psw2 error-border">
                                    <input id="resetconfirmPassword" name="password_confirmation" type="password" placeholder="Confirm new password" class="ng-untouched ng-pristine ng-valid">
                                    <div _ngcontent-tuq-c19="" class="password-strength">
                                      <i class="fa rs2"></i>
                                    </div>
                                  </div>
                                  <button _ngcontent-tuq-c19="" class="button primary" id="updatePassword" disabled="" type="submit" > Reset </button>
                                  <div class="pass-valid-info"> Password must be at least 8 characters long, contain an UPPERCASE letter, a lowercase letter and a number or a symbol. </div>
                                  <div _ngcontent-tuq-c19="" class="error-section popup-errors"><!----></div>
                                </div>
                            </form>
                              </class>
                            </div>
                            <div _ngcontent-tuq-c19="" class="layout"></div>
                          </div>
                                            <!--End Password-->

                                        </app-profile>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </app-settings>
                </div>


                @include('layouts.footer')
