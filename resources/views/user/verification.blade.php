@include('layouts.header')
    <title>Account Verification</title>
    @php
        $kyc = \App\CustomerVerification::whereUserId(auth()->user()->id)->first();
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
  							 				<h3 class="ng-star-inserted">Get Verified</h3>
  							 				<h4 class="ng-star-inserted">Complete verification to enable all account features.</h4>
                                            @if(auth()->user()->email_verified_at == null)
                                            <div class="user-verification-steps not-submitted ng-star-inserted">
                                                <div class="submittion-steps ">
                                                    <span class="red">Not Verified</span>
                                                    <img alt="earning" class="icon" src="{{ asset('v3/ic_information_red.svg') }}">
                                                </div>
                                            </div>
                                            @else
                                            <div class="btn btn-success user-verification-steps submitted ng-star-inserted">
                                                <div class="submittion-steps ">
                                                    <span class="red">Verification Completed</span>
                                                    <b style="color:green; font-weight: bolder;"> Verified <i class="fa fa-thumbs-up"></i></b>
                                                </div>
                                            </div>
                                            @endif
                                           </div>


  							 			<div class="form-body">
  							 				<div class="profile">
                                                <span id="errorMail" style="color:green; font-weight:bolder">
                                                    @if (\Session::has('msg'))
                                                        {!! \Session::get('msg') !!}
                                                    @endif
                                                </span>
                                              <span id="errorMail" style="color:red">
                                                    @include('errors.errors')
                                                </span>
  							 					<div class="verification-form pending-step-style ng-untouched ng-pristine ng-invalid" novalidate="">
  							 						<div class="field-left">
  							 							<div class="country-code-field pending-look">
  							 								<div class="phone-look">
  							 									<div class="icon-part">
  							 										<img alt="icon" src="{{ asset('v3/ic_phone_small.svg') }}">
  							 									</div>
  							 									<div class="description-space">
  							 										<h4>Phone number</h4>
                                     <br/>
                                      @if($kyc) {{$kyc->phone}} @endif
  							 									</div>
  							 								</div><!----><!---->
                                                            @if(auth()->user()->email_verified_at == null)
  							 								<div class="add-number ng-star-inserted">
  							 									<button id="showphone" class="button secondary filled-btn sec-middle">Add </button>
                                                            </div>
                                                            @endif
  							 							</div>
  							 						</div>
  							 					</div>
  							 					<div class="government-space ng-untouched ng-pristine ng-valid" novalidate="">
  							 						<div style="margin-bottom: 20px">
  							 							<div class="upload-img">
  							 								<div class="img-info-container"><div>
  							 									<div class="icon-part">
                                                                       <img alt="icon" src="{{ asset('v3/id.svg') }}">

  							 									</div>
  							 									<div class="description-space">
  							 										<h4>Government-issued ID</h4>
                                                                       <p>(e.g. passport or other photo identification document).</p><!----><!---->
                                                                       <br/>
                                                                       @if($kyc->idcard)<img src="{{$kyc->idcard}}" style="width:70px; height:70px" />@endif
                                                                </div>

                                                            </div>
                                                            <div>
                                                                @if(auth()->user()->email_verified_at == null)
                                                                <div class="add-number ng-star-inserted">
                                                                    <button data-type="idcard" class="uploaddoc button secondary filled-btn sec-middle"> Upload  </button>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div><!---->
                                                </div>
                                                <div style="margin-bottom: 20px">
                                                    <div class="upload-img ver-residence">
                                                        <div class="img-info-container">
                                                            <div>
                                                                <div class="icon-part">
                                                                    <img alt="icon" src="{{ asset('v3/selfie.svg') }}">
                                                                </div>
                                                                <div class="description-space">
                                                                    <h4>Selfie</h4>
                                                                    <p>
                                                                        <ul>A photo of yourself where your face is clearly visible with the following:</ul>
                                                                        <li>Holding ID that was used for KYC.</li>
                                                                        <li>Paper with the current date and {{ config('app.full_name')}} KYC” handwritten on it.</li>
                                                                    </p><!----><!---->
                                                                    <br/>
                                                                    @if($kyc->passport)<img src="{{$kyc->passport}}" style="width:70px; height:70px" />@endif
                                                                </div>
                                                            </div>
                                                            <div class="if-verified">
                                                                @if(auth()->user()->email_verified_at == null)
                                                                <div class="add-number ng-star-inserted">
                                                                    <button data-type="passport" class="uploaddoc button secondary filled-btn sec-middle">Upload </button>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div><!---->
                                                </div><!---->
                                                <div style="margin-bottom: 20px">
  							 							<div class="upload-img">
  							 								<div class="img-info-container"><div>
  							 									<div class="icon-part">
  							 										<img alt="icon" src="{{ asset('v3/id.svg') }}">
  							 									</div>
  							 									<div class="description-space">
  							 										<h4>Proof of Residence</h4>
  							 										<p>(e.g. Government issued document in area of residence).</p><!----><!---->
                                                                       <br/>
                                                                       @if($kyc->residence)<img src="{{$kyc->residence}}" style="width:70px; height:70px" />@endif
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                @if(auth()->user()->email_verified_at == null)
                                                                <div class="add-number ng-star-inserted">
                                                                    <button data-type="residence" class="uploaddoc button secondary filled-btn sec-middle"> Upload </button>
                                                                </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div><!---->
                                                </div>
                                                <p class="info-par ng-star-inserted">Allowed file types: JPG, PNG or PDF and max. size: 16MB.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!---->

  							 	<!-- Phone Modal-->
  							 	<div id="addphone" class="security-code see-modal-form ng-star-inserted hide">
  							 		<div class="after-signup fixed">
  							 			<img alt="close" id="closephone" class="close-modal" src="{{ asset('v3/ic_close_black.svg') }}"
  							 			<div class="ng-star-inserted">
  							 				<div class="mail-div">
  							 					<img alt="check" src="{{ asset('v3/ic_phone_small.svg') }}">
  							 				</div>
  							 				<h4>Enter Phone Number</h4>
  							 				<p class="enter-code">Enter SMS-capable phone number to receive temporarily verification secure codes. Carrier SMS charges may apply.</p>
                                               <form method="POST"   action="/add-phone">
                                                @csrf

  							 				<div class="pos-relative phone-space">
                                                   <div>
  							 							<label>Country code</label>
  							 							<app-drop-down-select formcontrolname="phoneCode" _nghost-ndw-c4="" class="ng-untouched ng-pristine ng-valid">
  							 								<div _ngcontent-ndw-c4="" appclickoutside="" class="select-area">
  							 									<div _ngcontent-ndw-c4="" class="current-value"><!----><!----><!----><!---->
  							 										<span _ngcontent-ndw-c4="" class="ng-star-inserted" id="c_code"></span>
  							 										<!----><!---->
  							 									</div><!---->
  							 								</div>
  							 							</app-drop-down-select>
  							 						</div>
  							 						<div>
  							 							<label>Phone number</label>
                                                       <input appdigitsonly="" name="phone" formcontrolname="phone" id="phone" value="{{ $kyc ? $kyc->phone : ''}}" type="text" class="ng-untouched ng-pristine ng-invalid">
  							 						</div>
  							 				</div>
  							 				<button type="submit" class="button primary" id="save_phone" disabled="">
                                                {{ $kyc ?  $kyc->phone ?'Update' : 'Add Phone' : 'Add Phone'}}
                                            </button>
                                               </form>
  							 			</div><!---->
  							 		</div>
  							 		<div class="layout"></div>
  							 	</div>

                    <!--Upload Modal-->
                    <div id="upload" class="security-code see-modal-form ng-star-inserted hide">
                    <div class="after-signup fixed">
                      <img alt="close" id="closeupload" class="close-modal" src="{{ asset('v3/ic_close_black.svg') }}"
                      <div class="ng-star-inserted">
                        <div class="mail-div">
                          <img alt="check" src="{{ asset('v3/ic_add_24.svg') }}">
                        </div>
                        <h4 id="cardtitle"></h4>
                        <form method="POST" enctype="multipart/form-data" action="/upload-kyc">
                            @csrf
                        <div class="pos-relative phone-space">
                          <div id="" class="ver-phone-num ng-untouched ng-pristine ng-invalid" >
                              <center>
                                <img id="imageBox" style="height: 150px; width: 150px; border-radius: 10px">
                              </center>
                             <input type="hidden" id="filetype" name="file_type" >
                              <input type="file" name="file" id="imgFile">
                            </div>
                          </div>
                        <button class="button primary" id="dataSend">
                          Upload
                        </button>
                    </form>
                      </div><!---->
                    </div>
                    <div class="layout"></div>
                  </div>


  							 </app-profile>
  							</div>
  						</div>
  					</div>
  				</div>
  			</app-settings>
  		</div>

    <script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('v3/address.js') }}"></script>

   <script type="text/javascript">

     $("#imgFile").change(function(){
      readURL(this);
      $("#uploadImg").removeAttr("disabled");
    });

    $("#phone").keyup(function(){
    $var = $("#phone").val();
      $var.length > 7 && $.isNumeric($var) ? $("#save_phone").removeAttr("disabled") : $("#save_phone").attr("disabled","disabled") ;
  });

    </script>

@include('layouts.footer')

