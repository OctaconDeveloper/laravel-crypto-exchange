@include('layouts.header')

    <title>Wallet Address</title>

<style>.see-modal-form[_ngcontent-llj-c9]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;z-index:1000;padding-top:20vh;overflow:auto}.see-modal-form[_ngcontent-llj-c9]   .add-address[_ngcontent-llj-c9]{min-height:330px}.see-modal-form[_ngcontent-llj-c9]   .add-address[_ngcontent-llj-c9]   h3[_ngcontent-llj-c9]{margin-bottom:36px}.see-modal-form[_ngcontent-llj-c9]   .fixed[_ngcontent-llj-c9]{z-index:10000;overflow-y:auto;width:calc(100% - 24px)}.see-modal-form[_ngcontent-llj-c9]   .fixed[_ngcontent-llj-c9]   .tfa-submit-btn[_ngcontent-llj-c9]   button[_ngcontent-llj-c9]:disabled:after{display:none}.see-modal-form[_ngcontent-llj-c9]   img.close-modal[_ngcontent-llj-c9]{margin-left:auto;display:block;position:relative;top:-16px;right:-24px;cursor:pointer}.see-modal-form[_ngcontent-llj-c9]   .layout[_ngcontent-llj-c9]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;background:rgba(79,75,108,.2);z-index:4}</style>
<style type="text/css">
html[_ngcontent-llj-c10]{font-size:16px;-webkit-font-smoothing:antialiased;line-height:1.3;overflow:visible}body[_ngcontent-llj-c10]{overflow:visible}.error-message[_ngcontent-llj-c10]{color:#eb3c6d;width:100%;text-align:left;font-size:14px;padding-left:15px;display:inline-block;margin:0 0 14px}.position-sticky[_ngcontent-llj-c10]{position:sticky;position:-webkit-sticky;top:100px}@media screen and (max-width:767px){.position-sticky[_ngcontent-llj-c10]{position:unset}}.red-dote[_ngcontent-llj-c10]{color:#f65f6e}input[_ngcontent-llj-c10]:-webkit-autofill, input[_ngcontent-llj-c10]:-webkit-autofill:active, input[_ngcontent-llj-c10]:-webkit-autofill:focus, input[_ngcontent-llj-c10]:-webkit-autofill:hover{-webkit-box-shadow:0 0 0 50px #fafafc inset!important}input[_ngcontent-llj-c10]{background:#fafafc;border:1px solid #d5d4dc;border-radius:8px;margin-bottom:12px;height:48px;padding:13px 16px;transition:.2s ease;-webkit-appearance:none;color:#8985a4;font-size:16px}input[_ngcontent-llj-c10]:not(:disabled):active, input[_ngcontent-llj-c10]:not(:disabled):focus{border:2px solid #656fff}input[_ngcontent-llj-c10]:disabled{background:#f1f5fb!important;cursor:default;-webkit-text-fill-color:#8985a4!important;-webkit-opacity:1;color:#8985a4!important}input[readonly][_ngcontent-llj-c10]{background:#f1f5fb!important;cursor:default!important;color:#4f4b6c!important}input[readonly][_ngcontent-llj-c10]:active, input[readonly][_ngcontent-llj-c10]:focus{border:1px solid #d5d4dc}input[_ngcontent-llj-c10]::-moz-placeholder{color:#8985a4;opacity:1}input[_ngcontent-llj-c10]:-ms-input-placeholder{color:#8985a4}input[_ngcontent-llj-c10]::-webkit-input-placeholder{color:#8985a4}.button[_ngcontent-llj-c10]{min-width:158px;min-height:48px;width:auto;color:#fff;font-size:16px;letter-spacing:0;text-align:center;line-height:22px;font-weight:700;padding:13px 25px;text-transform:uppercase;border-radius:8px;display:inline-block;transition:.5s cubic-bezier(0,0,.38,.99);border:none;position:relative;background:0 0}.button[_ngcontent-llj-c10]:focus{outline:0}.middle.button[_ngcontent-llj-c10]{min-width:120px;min-height:38px;border-radius:6px;font-size:16px;font-weight:700;padding:8px 12px}.button.primary[_ngcontent-llj-c10]{background:linear-gradient(225deg,#767fff 0,#5560ff 100%);border:1px solid transparent;color:#fff}.button.primary[_ngcontent-llj-c10]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #5560ff;background:0 0;transition:.2s ease-out}.button.primary[_ngcontent-llj-c10]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#407dff 0,#3352e7 100%);opacity:0;transition:.1s ease-out}.button.primary[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.primary[_ngcontent-llj-c10]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary[_ngcontent-llj-c10]   span[_ngcontent-llj-c10]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary[_ngcontent-llj-c10]:hover:after{bottom:2px;transition:.2s ease-out}.button.primary[disabled][_ngcontent-llj-c10]{background-image:linear-gradient(225deg,#b7c3f7 0,#b7c3f7 100%);border-radius:8px;cursor:default}.button.primary[disabled][_ngcontent-llj-c10]:before{display:none}.button.primary[disabled][_ngcontent-llj-c10]:after{box-shadow:0 4px 32px 0 #5560ff80}.button.primary[disabled][_ngcontent-llj-c10]:hover:after{bottom:8px}.button.primary-white[_ngcontent-llj-c10]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #c3c4cb;background:0 0;transition:.2s ease-out}.button.primary-white[_ngcontent-llj-c10]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#f2f2f2,#e6e6e6 100%);opacity:0;transition:.1s ease-out}.button.primary-white[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.primary-white[_ngcontent-llj-c10]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary-white[_ngcontent-llj-c10]   span[_ngcontent-llj-c10]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary-white[_ngcontent-llj-c10]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[_ngcontent-llj-c10]{background:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);border:1px solid transparent;color:#fff}.button.button-green[_ngcontent-llj-c10]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #00b79e;background:0 0;transition:.2s ease-out}.button.button-green[_ngcontent-llj-c10]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);opacity:0;transition:.1s ease-out}.button.button-green[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.button-green[_ngcontent-llj-c10]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-green[_ngcontent-llj-c10]   span[_ngcontent-llj-c10]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-green[_ngcontent-llj-c10]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[disabled][_ngcontent-llj-c10]{background-image:linear-gradient(225deg,#93e6d7 0,#78d5c6 100%);border-radius:8px;cursor:default}.button.button-green[disabled][_ngcontent-llj-c10]:before{display:none}.button.button-green[disabled][_ngcontent-llj-c10]:after{box-shadow:0 4px 32px 0 #00b79e80}.button.button-green[disabled][_ngcontent-llj-c10]:hover:after{bottom:8px}.button.button-pink[_ngcontent-llj-c10]{background:linear-gradient(225deg,#ff6e7d 0,#eb3c6d 100%);border:1px solid transparent;color:#fff}.button.button-pink[_ngcontent-llj-c10]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #eb3c6d;background:0 0;transition:.2s ease-out}.button.button-pink[_ngcontent-llj-c10]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#ff314e 0,#dd174e 100%);opacity:0;transition:.1s ease-out}.button.button-pink[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.button-pink[_ngcontent-llj-c10]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-pink[_ngcontent-llj-c10]   span[_ngcontent-llj-c10]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-pink[_ngcontent-llj-c10]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-pink[disabled][_ngcontent-llj-c10]{background-image:linear-gradient(225deg,#f8a7b0 0,#ed8ca8 100%);border-radius:8px;cursor:default}.button.button-pink[disabled][_ngcontent-llj-c10]:before{display:none}.button.button-pink[disabled][_ngcontent-llj-c10]:after{box-shadow:0 4px 32px 0 #eb3c6d80}.button.button-pink[disabled][_ngcontent-llj-c10]:hover:after{bottom:8px}.button.secondary[_ngcontent-llj-c10]{background:linear-gradient(225deg, #4f4b6c 0, "" 100%);border:1px solid #d5d4dc;color:#4f4b6c}.button.secondary[_ngcontent-llj-c10]:hover{background:#4f4b6c;color:#fff;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-llj-c10]:active{background:#39364e;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.secondary[disabled][_ngcontent-llj-c10]{background:#39364e;transition:.3s ease-out}.button.secondary[disabled][_ngcontent-llj-c10]:hover{background:#39364e}.button.secondary[disabled][_ngcontent-llj-c10]   span[_ngcontent-llj-c10]{color:#fff}.button.btn-link[_ngcontent-llj-c10]{color:#4f4b6c;border:1px solid transparent;font-weight:500}.button.btn-link[_ngcontent-llj-c10]:hover{background:rgba(231,235,249,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-llj-c10]:active{background:rgba(190,201,239,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-llj-c10]:active   span[_ngcontent-llj-c10]{opacity:.8}.button.filled-btn[_ngcontent-llj-c10]{background:#4f4b6c;color:#fff;min-width:126px}.button.filled-btn[_ngcontent-llj-c10]:not(:disabled):active, .button.filled-btn[_ngcontent-llj-c10]:not(:disabled):hover{background:#39364e;transition:.2s ease-out}.button.filled-btn[_ngcontent-llj-c10]:disabled{opacity:.5;cursor:default}.cancel[_ngcontent-llj-c10]{padding:14px 0!important;text-align:left!important}.cancel[_ngcontent-llj-c10]   a.cancel-order[_ngcontent-llj-c10]{margin:0 0 0 16px;min-height:28px;padding:0 12px;font-size:14px;min-width:100px;display:inline-block;line-height:26px}.error-border[_ngcontent-llj-c10] > input[_ngcontent-llj-c10]{border:2px solid #f65f6e;transition:.2s ease}.strength-string[_ngcontent-llj-c10]   small[_ngcontent-llj-c10]   span[_ngcontent-llj-c10]{font-weight:700}.strength-1-active[_ngcontent-llj-c10], .strength-2-active[_ngcontent-llj-c10]{color:#f65f6e}.strength-3-active[_ngcontent-llj-c10]{color:#facc08}.strength-4-active[_ngcontent-llj-c10]{color:#15b9f5}.strength-5-active[_ngcontent-llj-c10]{color:#31c1a9}.dropdown[_ngcontent-llj-c10]{background:#e8eaf6;border:1px solid #d5d4dc;border-radius:8px;width:100%;position:relative;cursor:pointer;margin-bottom:24px;transition:.2s ease}.dropdown[_ngcontent-llj-c10]:after{content:"";position:absolute;top:-1px;left:-1px;width:calc(100% + 2px);height:50px;border:2px solid transparent;border-radius:8px;z-index:6}.dropdown.wallet-dropdown[_ngcontent-llj-c10]{position:static;border-left:none!important}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .select-trigger[_ngcontent-llj-c10]{position:static;border-left:1px solid #d5d4dc!important}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .search-input[_ngcontent-llj-c10]{display:none}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .select-menu-inner[_ngcontent-llj-c10]{max-height:180px;height:auto;margin-top:auto}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .dropdown-input[_ngcontent-llj-c10]{display:none}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .select-menu[_ngcontent-llj-c10]{position:absolute;width:100%;left:0;right:0;top:48px}.dropdown.wallet-dropdown[_ngcontent-llj-c10]   .select-trigger__item[_ngcontent-llj-c10]{display:none}.select-menu[_ngcontent-llj-c10]{position:absolute;width:100%;right:0;left:0;top:49px;background:#fff;box-shadow:0 4px 12px 0 rgba(79,75,108,.12);border-radius:0 0 6px 6px;cursor:pointer;font-weight:600;padding:10px 0 8px;overflow-y:auto;z-index:10000}.select-trigger[_ngcontent-llj-c10]{padding:13px 16px;position:relative;height:48px;background:#fff;width:100%;border-radius:8px;display:inline-block;text-align:left;border-right-color:#d5d4dc;transition:.3s ease-out}.select-trigger[_ngcontent-llj-c10]:focus{outline:0}.select-trigger__item[_ngcontent-llj-c10]{width:90%;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center}.select-trigger__no-search[_ngcontent-llj-c10]{max-width:100%;border-radius:8px;border:none}.modal-custom-dropdown[_ngcontent-llj-c10]{margin-bottom:12px}.modal-custom-dropdown[_ngcontent-llj-c10]   .select-trigger[_ngcontent-llj-c10]{max-width:100%;border:none;border-radius:8px}.modal-custom-dropdown[_ngcontent-llj-c10]   .select-menu-inner[_ngcontent-llj-c10]{margin-top:0}.dropdown-input[_ngcontent-llj-c10]{position:absolute;top:1px;right:1px;width:calc(100% - 156px);border-radius:0 7px 7px 0;background:#e8eaf6;border:none;color:#302d43;font-size:16px;z-index:7;margin:0;height:46px}.dropdown-input[_ngcontent-llj-c10]:active, .dropdown-input[_ngcontent-llj-c10]:focus{border:none!important}.caret[_ngcontent-llj-c10]{width:6px!important;height:6px!important;border-left:2px solid #656fff!important;border-right:none!important;border-top:2px solid #656fff!important;margin:0 4px!important;-ms-transform:rotate(45deg)!important;transform:rotate(45deg)!important;transition:.3s;position:absolute;top:22px;right:16px}.transform-caret[_ngcontent-llj-c10]{-ms-transform:rotate(223deg)!important;transform:rotate(223deg)!important}.select-menu-inner[_ngcontent-llj-c10]{max-height:180px;margin-top:66px;height:24vh}.selected[_ngcontent-llj-c10]{border:1px solid #656fff!important}.selected.dropdown[_ngcontent-llj-c10]:after{border-color:#656fff}input[_ngcontent-llj-c10]{border:none;width:100%}input[_ngcontent-llj-c10]:focus{outline:0}.select-item[_ngcontent-llj-c10]{font-size:16px;color:#8985a4;padding:12px 16px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-transform:capitalize;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;transition:.3s ease-out}.select-item[_ngcontent-llj-c10]   p[_ngcontent-llj-c10]{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin:0}.select-item[_ngcontent-llj-c10]   p[_ngcontent-llj-c10]:first-child{color:#3a3751;font-size:16px!important;font-weight:600}.select-item[_ngcontent-llj-c10]   p[_ngcontent-llj-c10]:nth-of-type(2){font-size:12px!important}.select-item[_ngcontent-llj-c10]   img[_ngcontent-llj-c10]{width:22px;vertical-align:middle;margin-right:10px}.select-item[_ngcontent-llj-c10]:hover{transition:.3s ease-out}.select-item[_ngcontent-llj-c10]:hover     .symbol-name{transition:.3s ease-out}.select-item[_ngcontent-llj-c10]:hover     .symbol-name b{color:#656fff;transition:.3s ease-out}.select-item[_ngcontent-llj-c10]:hover     .symbol-name span{color:#656fff;transition:.3s ease-out}.select-item.selectedValue[_ngcontent-llj-c10], .select-item[_ngcontent-llj-c10]:hover{color:#656fff}.search-input[_ngcontent-llj-c10]{width:calc(100% - 32px);margin:16px;background:#f1f5fb;border-radius:8px}.no-results-item[_ngcontent-llj-c10]{height:32px;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;padding:0 16px;font-size:16px;color:#8985a4;font-weight:400;margin-top:3px}.symbol-name[_ngcontent-llj-c10]   b[_ngcontent-llj-c10]{text-transform:none}

  cdk-virtual-scroll-viewport{display:block;position:relative;overflow:auto;contain:strict;transform:translateZ(0);will-change:scroll-position;-webkit-overflow-scrolling:touch}.cdk-virtual-scroll-content-wrapper{position:absolute;top:0;left:0;contain:content}[dir=rtl] .cdk-virtual-scroll-content-wrapper{right:0;left:auto}.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper{min-height:100%}.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>dl:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>ol:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>table:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>ul:not([cdkVirtualFor]){padding-left:0;padding-right:0;margin-left:0;margin-right:0;border-left-width:0;border-right-width:0;outline:0}.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper{min-width:100%}.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>dl:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>ol:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>table:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>ul:not([cdkVirtualFor]){padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;border-top-width:0;border-bottom-width:0;outline:0}.cdk-virtual-scroll-spacer{position:absolute;top:0;left:0;height:1px;width:1px;transform-origin:0 0}[dir=rtl] .cdk-virtual-scroll-spacer{right:0;left:auto;transform-origin:100% 0}
</style>
@php
    $tokens = \App\Token::orderBy('name', 'ASC')->get()
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
  							@include('layouts.sidebar');
  							<router-outlet _ngcontent-jwu-c23=""></router-outlet>
  							<app-wallet-addresses _nghost-jwu-c27="" class="ng-star-inserted">
  								<div _ngcontent-jwu-c27="" class="col-lg-9 col-md-8 col-sm-7">
  									<div _ngcontent-jwu-c27="" class="general-box">
  										<div _ngcontent-jwu-c27="" class="title-1">
  											<h3 _ngcontent-jwu-c27="">Withdrawal Addresses</h3>
  											<b _ngcontent-jwu-c27="" id="show_addressform">+ Add</b>
                                          </div>

                                            <span id="errorMail" style="color:green; font-weight:bolder;margin:20px">                                                 @if (\Session::has('msg'))
                                                    {!! \Session::get('msg') !!}
                                                @endif
                                            </span>
                                            <span id="errorMail" style="color:red; margin:20px">
                                                  @include('errors.errors')
                                              </span>
  										<div id="walletdir"></div>
  									</div>
  								</div><!---->

  								<app-wallet-address-modal _ngcontent-ndw-c13="" _nghost-ndw-c14="" id="walletadd" class="ng-star-inserted hide">
                    <div _ngcontent-ndw-c14="" class="see-modal-form">
                      <div _ngcontent-ndw-c14="" class="login-form add-address fixed">
                        <img _ngcontent-ndw-c14="" alt="close" class="close-modal closewallet" src="{{ asset('v3/ic_close_black.svg') }}"><!---->
                        <h3 _ngcontent-ndw-c14="" class="ng-star-inserted">Add New Address</h3><!---->
                        <div _ngcontent-ndw-c14="" novalidate="" class="ng-untouched ng-pristine ng-invalid">
                          <div _ngcontent-ndw-c14="">
                            <div _ngcontent-ndw-c14="" style="position: relative">
                              <app-select _ngcontent-ndw-c14="" formcontrolname="currency" _nghost-ndw-c9="" class="ng-untouched ng-pristine">
                                <div _ngcontent-ndw-c9="" appclickoutside="" class="dropdown modal-custom-dropdown">
                                  <div _ngcontent-ndw-c9="" class="select-trigger">
                                    <div _ngcontent-ndw-c9="" class="select-trigger__item"><!---->
                                      <span _ngcontent-ndw-c9="" class="symbol-name">
                                        <b _ngcontent-ndw-c9="" id="currency">Currency </b>
                                      </span>
                                    </div>
                                    <span _ngcontent-ndw-c9="" class="caret"></span>
                                  </div><!---->
                                <form method="POST" action="/add-wallet">
                                    @csrf
                                  <div _ngcontent-jma-c15="" id="dt" class="select-menu hide"><!---->
                                    <cdk-virtual-scroll-viewport _ngcontent-jma-c15="" class="select-menu-inner cdk-virtual-scroll-viewport cdk-virtual-scroll-orientation-vertical" itemsize="40" style="max-height: 300px; min-height: 100px; background: white; border-color: white;">
                                      <div class="cdk-virtual-scroll-content-wrapper" style="transform: translateY(0px);">
                                        @forelse ($tokens as $token)
                                        <div _ngcontent-jma-c15="" class="select-item ctype ng-star-inserted">
                                            {{ $token->name}}
                                          </div>
                                        @empty

                                        @endforelse
                                      </div>
                                    </cdk-virtual-scroll-viewport>
        </div>
        <input _ngcontent-ndw-c14="" name="coin_type" id="coin_type" value="" type="hidden" />
                                </div>
                              </app-select><!----><!---->
                            </div>
                            <div _ngcontent-ndw-c14="">
                              <input _ngcontent-ndw-c14="" name="address" id="address" formcontrolname="address" type="text" placeholder="Withdrawal address" class="ng-untouched ng-pristine ng-invalid" readonly="">
                              <span _ngcontent-ndw-c14="" class="dashboard-field-icon icon icon-edit"></span>
                            </div><!---->
                            <button _ngcontent-ndw-c14="" id="saveaddress" class="button primary" type="submit" disabled=""> Save Address </button><!----><!---->
                          </div>
                        </div>
                        </form>
                      </div>
                      <div _ngcontent-ndw-c14="" class="layout"></div>
                    </div>
                  </app-wallet-address-modal>


  							</app-wallet-addresses>
  						</div>
  					</div>
  				</div>
  			</div>
  		</app-settings>
  	</div>
    <script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('v3/address.js') }}"></script>

<script type="text/javascript">
	$("#walletdir").load('/user/showwallet');

	 	//
         $('#currency').bind('DOMSubtreeModified', function(){
            $cointype =  $("#currency").html();
            if($cointype!='currency'){
                $("#coin_type").val($cointype);
            }
            });
	//
</script>



@include('layouts.footer')
