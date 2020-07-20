@include('layouts.header')
<title>My Wallet</title>
    <div _ngcontent-jwu-c0="" class="wrapper"><!---->
        @include('layouts.deposit-nav')
      <style type="text/css">
          .active-pan{
            border-bottom: 0.2em solid #656fff!important;
            /*height: 3px!important;*/
          }
      </style>
      <style type="text/css">

        #qrcode {
        width: 128px;
        height: 128px;
        margin: 0 auto;
        text-align: center;
        }

        #qrcode a {
        font-size: 0.8em;
        }

        </style>
        <style>html[_ngcontent-she-c15]{font-size:16px;-webkit-font-smoothing:antialiased;line-height:1.3;overflow:visible}body[_ngcontent-she-c15]{overflow:visible}.error-message[_ngcontent-she-c15]{color:#eb3c6d;width:100%;text-align:left;font-size:14px;padding-left:15px;display:inline-block;margin:0 0 14px}.position-sticky[_ngcontent-she-c15]{position:sticky;position:-webkit-sticky;top:100px}@media screen and (max-width:767px){.position-sticky[_ngcontent-she-c15]{position:unset}}.red-dote[_ngcontent-she-c15]{color:#f65f6e}input[_ngcontent-she-c15]:-webkit-autofill, input[_ngcontent-she-c15]:-webkit-autofill:active, input[_ngcontent-she-c15]:-webkit-autofill:focus, input[_ngcontent-she-c15]:-webkit-autofill:hover{-webkit-box-shadow:0 0 0 50px #fafafc inset!important}input[_ngcontent-she-c15]{background:#fafafc;border:1px solid #d5d4dc;border-radius:8px;margin-bottom:12px;height:48px;padding:13px 16px;transition:.2s ease;-webkit-appearance:none;color:#8985a4;font-size:16px}input[_ngcontent-she-c15]:not(:disabled):active, input[_ngcontent-she-c15]:not(:disabled):focus{border:2px solid #656fff}input[_ngcontent-she-c15]:disabled{background:#f1f5fb!important;cursor:default;-webkit-text-fill-color:#8985a4!important;-webkit-opacity:1;color:#8985a4!important}input[readonly][_ngcontent-she-c15]{background:#f1f5fb!important;cursor:default!important;color:#4f4b6c!important}input[readonly][_ngcontent-she-c15]:active, input[readonly][_ngcontent-she-c15]:focus{border:1px solid #d5d4dc}input[_ngcontent-she-c15]::-moz-placeholder{color:#8985a4;opacity:1}input[_ngcontent-she-c15]:-ms-input-placeholder{color:#8985a4}input[_ngcontent-she-c15]::-webkit-input-placeholder{color:#8985a4}.button[_ngcontent-she-c15]{min-width:158px;min-height:48px;width:auto;color:#fff;font-size:16px;letter-spacing:0;text-align:center;line-height:22px;font-weight:700;padding:13px 25px;text-transform:uppercase;border-radius:8px;display:inline-block;transition:.5s cubic-bezier(0,0,.38,.99);border:none;position:relative;background:0 0}.button[_ngcontent-she-c15]:focus{outline:0}.middle.button[_ngcontent-she-c15]{min-width:120px;min-height:38px;border-radius:6px;font-size:16px;font-weight:700;padding:8px 12px}.button.primary[_ngcontent-she-c15]{background:linear-gradient(225deg,#767fff 0,#5560ff 100%);border:1px solid transparent;color:#fff}.button.primary[_ngcontent-she-c15]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #5560ff;background:0 0;transition:.2s ease-out}.button.primary[_ngcontent-she-c15]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#407dff 0,#3352e7 100%);opacity:0;transition:.1s ease-out}.button.primary[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.primary[_ngcontent-she-c15]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary[_ngcontent-she-c15]   span[_ngcontent-she-c15]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary[_ngcontent-she-c15]:hover:after{bottom:2px;transition:.2s ease-out}.button.primary[disabled][_ngcontent-she-c15]{background-image:linear-gradient(225deg,#b7c3f7 0,#b7c3f7 100%);border-radius:8px;cursor:default}.button.primary[disabled][_ngcontent-she-c15]:before{display:none}.button.primary[disabled][_ngcontent-she-c15]:after{box-shadow:0 4px 32px 0 #5560ff80}.button.primary[disabled][_ngcontent-she-c15]:hover:after{bottom:8px}.button.primary-white[_ngcontent-she-c15]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #c3c4cb;background:0 0;transition:.2s ease-out}.button.primary-white[_ngcontent-she-c15]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#f2f2f2,#e6e6e6 100%);opacity:0;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.primary-white[_ngcontent-she-c15]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c15]   span[_ngcontent-she-c15]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary-white[_ngcontent-she-c15]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[_ngcontent-she-c15]{background:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);border:1px solid transparent;color:#fff}.button.button-green[_ngcontent-she-c15]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #00b79e;background:0 0;transition:.2s ease-out}.button.button-green[_ngcontent-she-c15]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);opacity:0;transition:.1s ease-out}.button.button-green[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.button-green[_ngcontent-she-c15]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-green[_ngcontent-she-c15]   span[_ngcontent-she-c15]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-green[_ngcontent-she-c15]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[disabled][_ngcontent-she-c15]{background-image:linear-gradient(225deg,#93e6d7 0,#78d5c6 100%);border-radius:8px;cursor:default}.button.button-green[disabled][_ngcontent-she-c15]:before{display:none}.button.button-green[disabled][_ngcontent-she-c15]:after{box-shadow:0 4px 32px 0 #00b79e80}.button.button-green[disabled][_ngcontent-she-c15]:hover:after{bottom:8px}.button.button-pink[_ngcontent-she-c15]{background:linear-gradient(225deg,#ff6e7d 0,#eb3c6d 100%);border:1px solid transparent;color:#fff}.button.button-pink[_ngcontent-she-c15]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #eb3c6d;background:0 0;transition:.2s ease-out}.button.button-pink[_ngcontent-she-c15]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#ff314e 0,#dd174e 100%);opacity:0;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.button-pink[_ngcontent-she-c15]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c15]   span[_ngcontent-she-c15]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-pink[_ngcontent-she-c15]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-pink[disabled][_ngcontent-she-c15]{background-image:linear-gradient(225deg,#f8a7b0 0,#ed8ca8 100%);border-radius:8px;cursor:default}.button.button-pink[disabled][_ngcontent-she-c15]:before{display:none}.button.button-pink[disabled][_ngcontent-she-c15]:after{box-shadow:0 4px 32px 0 #eb3c6d80}.button.button-pink[disabled][_ngcontent-she-c15]:hover:after{bottom:8px}.button.secondary[_ngcontent-she-c15]{background:linear-gradient(225deg, #4f4b6c 0, "" 100%);border:1px solid #d5d4dc;color:#4f4b6c}.button.secondary[_ngcontent-she-c15]:hover{background:#4f4b6c;color:#fff;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c15]:active{background:#39364e;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.secondary[disabled][_ngcontent-she-c15]{background:#39364e;transition:.3s ease-out}.button.secondary[disabled][_ngcontent-she-c15]:hover{background:#39364e}.button.secondary[disabled][_ngcontent-she-c15]   span[_ngcontent-she-c15]{color:#fff}.button.btn-link[_ngcontent-she-c15]{color:#4f4b6c;border:1px solid transparent;font-weight:500}.button.btn-link[_ngcontent-she-c15]:hover{background:rgba(231,235,249,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c15]:active{background:rgba(190,201,239,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c15]:active   span[_ngcontent-she-c15]{opacity:.8}.button.filled-btn[_ngcontent-she-c15]{background:#4f4b6c;color:#fff;min-width:126px}.button.filled-btn[_ngcontent-she-c15]:not(:disabled):active, .button.filled-btn[_ngcontent-she-c15]:not(:disabled):hover{background:#39364e;transition:.2s ease-out}.button.filled-btn[_ngcontent-she-c15]:disabled{opacity:.5;cursor:default}.cancel[_ngcontent-she-c15]{padding:14px 0!important;text-align:left!important}.cancel[_ngcontent-she-c15]   a.cancel-order[_ngcontent-she-c15]{margin:0 0 0 16px;min-height:28px;padding:0 12px;font-size:14px;min-width:100px;display:inline-block;line-height:26px}.error-border[_ngcontent-she-c15] > input[_ngcontent-she-c15]{border:2px solid #f65f6e;transition:.2s ease}.strength-string[_ngcontent-she-c15]   small[_ngcontent-she-c15]   span[_ngcontent-she-c15]{font-weight:700}.strength-1-active[_ngcontent-she-c15], .strength-2-active[_ngcontent-she-c15]{color:#f65f6e}.strength-3-active[_ngcontent-she-c15]{color:#facc08}.strength-4-active[_ngcontent-she-c15]{color:#15b9f5}.strength-5-active[_ngcontent-she-c15]{color:#31c1a9}.dropdown[_ngcontent-she-c15]{background:#e8eaf6;border:1px solid #d5d4dc;border-radius:8px;width:100%;position:relative;cursor:pointer;margin-bottom:24px;transition:.2s ease}.dropdown[_ngcontent-she-c15]:after{content:"";position:absolute;top:-1px;left:-1px;width:calc(100% + 2px);height:50px;border:2px solid transparent;border-radius:8px;z-index:6}.dropdown.wallet-dropdown[_ngcontent-she-c15]{position:static;border-left:none!important}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .select-trigger[_ngcontent-she-c15]{position:static;border-left:1px solid #d5d4dc!important}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .search-input[_ngcontent-she-c15]{display:none}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .select-menu-inner[_ngcontent-she-c15]{max-height:180px;height:auto;margin-top:auto}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .dropdown-input[_ngcontent-she-c15]{display:none}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .select-menu[_ngcontent-she-c15]{position:absolute;width:100%;left:0;right:0;top:48px}.dropdown.wallet-dropdown[_ngcontent-she-c15]   .select-trigger__item[_ngcontent-she-c15]{display:none}.select-menu[_ngcontent-she-c15]{position:absolute;width:100%;right:0;left:0;top:49px;background:#fff;box-shadow:0 4px 12px 0 rgba(79,75,108,.12);border-radius:0 0 6px 6px;cursor:pointer;font-weight:600;padding:10px 0 8px;overflow-y:auto;z-index:10000}.select-trigger[_ngcontent-she-c15]{padding:13px 16px;position:relative;height:48px;background:#fff;width:100%;border-radius:8px;display:inline-block;text-align:left;border-right-color:#d5d4dc;transition:.3s ease-out}.select-trigger[_ngcontent-she-c15]:focus{outline:0}.select-trigger__item[_ngcontent-she-c15]{width:90%;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center}.select-trigger__no-search[_ngcontent-she-c15]{max-width:100%;border-radius:8px;border:none}.modal-custom-dropdown[_ngcontent-she-c15]{margin-bottom:12px}.modal-custom-dropdown[_ngcontent-she-c15]   .select-trigger[_ngcontent-she-c15]{max-width:100%;border:none;border-radius:8px}.modal-custom-dropdown[_ngcontent-she-c15]   .select-menu-inner[_ngcontent-she-c15]{margin-top:0}.dropdown-input[_ngcontent-she-c15]{position:absolute;top:1px;right:1px;width:calc(100% - 156px);border-radius:0 7px 7px 0;background:#e8eaf6;border:none;color:#302d43;font-size:16px;z-index:7;margin:0;height:46px}.dropdown-input[_ngcontent-she-c15]:active, .dropdown-input[_ngcontent-she-c15]:focus{border:none!important}.caret[_ngcontent-she-c15]{width:6px!important;height:6px!important;border-left:2px solid #656fff!important;border-right:none!important;border-top:2px solid #656fff!important;margin:0 4px!important;-ms-transform:rotate(45deg)!important;transform:rotate(45deg)!important;transition:.3s;position:absolute;top:22px;right:16px}.transform-caret[_ngcontent-she-c15]{-ms-transform:rotate(223deg)!important;transform:rotate(223deg)!important}.select-menu-inner[_ngcontent-she-c15]{max-height:180px;margin-top:66px;height:24vh}.selected[_ngcontent-she-c15]{border:1px solid #656fff!important}.selected.dropdown[_ngcontent-she-c15]:after{border-color:#656fff}input[_ngcontent-she-c15]{border:none;width:100%}input[_ngcontent-she-c15]:focus{outline:0}.select-item[_ngcontent-she-c15]{font-size:16px;color:#8985a4;padding:12px 16px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;text-transform:capitalize;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;transition:.3s ease-out}.select-item[_ngcontent-she-c15]   p[_ngcontent-she-c15]{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;margin:0}.select-item[_ngcontent-she-c15]   p[_ngcontent-she-c15]:first-child{color:#3a3751;font-size:16px!important;font-weight:600}.select-item[_ngcontent-she-c15]   p[_ngcontent-she-c15]:nth-of-type(2){font-size:12px!important}.select-item[_ngcontent-she-c15]   img[_ngcontent-she-c15]{width:22px;vertical-align:middle;margin-right:10px}.select-item[_ngcontent-she-c15]:hover{transition:.3s ease-out}.select-item[_ngcontent-she-c15]:hover     .symbol-name{transition:.3s ease-out}.select-item[_ngcontent-she-c15]:hover     .symbol-name b{color:#656fff;transition:.3s ease-out}.select-item[_ngcontent-she-c15]:hover     .symbol-name span{color:#656fff;transition:.3s ease-out}.select-item.selectedValue[_ngcontent-she-c15], .select-item[_ngcontent-she-c15]:hover{color:#656fff}.search-input[_ngcontent-she-c15]{width:calc(100% - 32px);margin:16px;background:#f1f5fb;border-radius:8px}.no-results-item[_ngcontent-she-c15]{height:32px;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;padding:0 16px;font-size:16px;color:#8985a4;font-weight:400;margin-top:3px}.symbol-name[_ngcontent-she-c15]   b[_ngcontent-she-c15]{text-transform:none}</style><style>.lottie-animation-copied[_ngcontent-she-c16] + img[_ngcontent-she-c16]{opacity:0}.copied-animation[_ngcontent-she-c16] > div[_ngcontent-she-c16]{width:26px!important;height:36px!important}</style><style>cdk-virtual-scroll-viewport{display:block;position:relative;overflow:auto;contain:strict;transform:translateZ(0);will-change:scroll-position;-webkit-overflow-scrolling:touch}.cdk-virtual-scroll-content-wrapper{position:absolute;top:0;left:0;contain:content}[dir=rtl] .cdk-virtual-scroll-content-wrapper{right:0;left:auto}.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper{min-height:100%}.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>dl:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>ol:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>table:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-horizontal .cdk-virtual-scroll-content-wrapper>ul:not([cdkVirtualFor]){padding-left:0;padding-right:0;margin-left:0;margin-right:0;border-left-width:0;border-right-width:0;outline:0}.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper{min-width:100%}.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>dl:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>ol:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>table:not([cdkVirtualFor]),.cdk-virtual-scroll-orientation-vertical .cdk-virtual-scroll-content-wrapper>ul:not([cdkVirtualFor]){padding-top:0;padding-bottom:0;margin-top:0;margin-bottom:0;border-top-width:0;border-bottom-width:0;outline:0}.cdk-virtual-scroll-spacer{position:absolute;top:0;left:0;height:1px;width:1px;transform-origin:0 0}[dir=rtl] .cdk-virtual-scroll-spacer{right:0;left:auto;transform-origin:100% 0}</style><style>html[_ngcontent-she-c18]{font-size:16px;-webkit-font-smoothing:antialiased;line-height:1.3;overflow:visible}body[_ngcontent-she-c18]{overflow:visible}.error-message[_ngcontent-she-c18]{color:#eb3c6d;width:100%;text-align:left;font-size:14px;padding-left:15px;display:inline-block;margin:0 0 14px}.position-sticky[_ngcontent-she-c18]{position:sticky;position:-webkit-sticky;top:100px}@media screen and (max-width:767px){.position-sticky[_ngcontent-she-c18]{position:unset}}.red-dote[_ngcontent-she-c18]{color:#f65f6e}.container-title[_ngcontent-she-c18]{font-size:18px;color:#302d43;padding:16px 24px;font-weight:600}.container-title[_ngcontent-she-c18]   b[_ngcontent-she-c18]{float:right;font-size:14px;color:#8985a4;font-weight:400}input[_ngcontent-she-c18]:-webkit-autofill, input[_ngcontent-she-c18]:-webkit-autofill:active, input[_ngcontent-she-c18]:-webkit-autofill:focus, input[_ngcontent-she-c18]:-webkit-autofill:hover{-webkit-box-shadow:0 0 0 50px #fafafc inset!important}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18], input[_ngcontent-she-c18]{background:#fafafc;border:1px solid #d5d4dc;border-radius:8px;width:100%;margin-bottom:12px;height:48px;padding:13px 16px;transition:.2s ease;-webkit-appearance:none;color:#8985a4;font-size:16px}input[_ngcontent-she-c18]:not(:disabled):active, input[_ngcontent-she-c18]:not(:disabled):focus{border:2px solid #656fff}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]:disabled, input[_ngcontent-she-c18]:disabled{background:#f1f5fb!important;cursor:default;-webkit-text-fill-color:#8985a4!important;-webkit-opacity:1;color:#8985a4!important}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[readonly][_ngcontent-she-c18], input[readonly][_ngcontent-she-c18]{background:#f1f5fb!important;cursor:default!important;color:#4f4b6c!important}input[readonly][_ngcontent-she-c18]:active, input[readonly][_ngcontent-she-c18]:focus{border:1px solid #d5d4dc}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]::-moz-placeholder, input[_ngcontent-she-c18]::-moz-placeholder{color:#8985a4;opacity:1}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]:-ms-input-placeholder, input[_ngcontent-she-c18]:-ms-input-placeholder{color:#8985a4}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]::-webkit-input-placeholder, input[_ngcontent-she-c18]::-webkit-input-placeholder{color:#8985a4}.general-box[_ngcontent-she-c18]{background:#fff;box-shadow:0 3px 8px 0 rgba(79,75,108,.12);border-radius:8px;margin-bottom:24px}.button[_ngcontent-she-c18]{min-width:158px;min-height:48px;width:auto;color:#fff;font-size:16px;letter-spacing:0;text-align:center;line-height:22px;font-weight:700;padding:13px 25px;text-transform:uppercase;border-radius:8px;display:inline-block;transition:.5s cubic-bezier(0,0,.38,.99);border:none;position:relative;background:0 0}.button[_ngcontent-she-c18]:focus{outline:0}.middle.button[_ngcontent-she-c18]{min-width:120px;min-height:38px;border-radius:6px;font-size:16px;font-weight:700;padding:8px 12px}.button.primary[_ngcontent-she-c18]{background:linear-gradient(225deg,#767fff 0,#5560ff 100%);border:1px solid transparent;color:#fff}.button.primary[_ngcontent-she-c18]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #5560ff;background:0 0;transition:.2s ease-out}.button.primary[_ngcontent-she-c18]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#407dff 0,#3352e7 100%);opacity:0;transition:.1s ease-out}.button.primary[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.primary[_ngcontent-she-c18]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary[_ngcontent-she-c18]   span[_ngcontent-she-c18]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary[_ngcontent-she-c18]:hover:after{bottom:2px;transition:.2s ease-out}.button.primary[disabled][_ngcontent-she-c18]{background-image:linear-gradient(225deg,#b7c3f7 0,#b7c3f7 100%);border-radius:8px;cursor:default}.button.primary[disabled][_ngcontent-she-c18]:before{display:none}.button.primary[disabled][_ngcontent-she-c18]:after{box-shadow:0 4px 32px 0 #5560ff80}.button.primary[disabled][_ngcontent-she-c18]:hover:after{bottom:8px}.button.primary-white[_ngcontent-she-c18]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #c3c4cb;background:0 0;transition:.2s ease-out}.button.primary-white[_ngcontent-she-c18]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#f2f2f2,#e6e6e6 100%);opacity:0;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.primary-white[_ngcontent-she-c18]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c18]   span[_ngcontent-she-c18]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary-white[_ngcontent-she-c18]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[_ngcontent-she-c18]{background:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);border:1px solid transparent;color:#fff}.button.button-green[_ngcontent-she-c18]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #00b79e;background:0 0;transition:.2s ease-out}.button.button-green[_ngcontent-she-c18]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);opacity:0;transition:.1s ease-out}.button.button-green[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.button-green[_ngcontent-she-c18]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-green[_ngcontent-she-c18]   span[_ngcontent-she-c18]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-green[_ngcontent-she-c18]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[disabled][_ngcontent-she-c18]{background-image:linear-gradient(225deg,#93e6d7 0,#78d5c6 100%);border-radius:8px;cursor:default}.button.button-green[disabled][_ngcontent-she-c18]:before{display:none}.button.button-green[disabled][_ngcontent-she-c18]:after{box-shadow:0 4px 32px 0 #00b79e80}.button.button-green[disabled][_ngcontent-she-c18]:hover:after{bottom:8px}.button.button-pink[_ngcontent-she-c18]{background:linear-gradient(225deg,#ff6e7d 0,#eb3c6d 100%);border:1px solid transparent;color:#fff}.button.button-pink[_ngcontent-she-c18]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #eb3c6d;background:0 0;transition:.2s ease-out}.button.button-pink[_ngcontent-she-c18]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#ff314e 0,#dd174e 100%);opacity:0;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.button-pink[_ngcontent-she-c18]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c18]   span[_ngcontent-she-c18]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-pink[_ngcontent-she-c18]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-pink[disabled][_ngcontent-she-c18]{background-image:linear-gradient(225deg,#f8a7b0 0,#ed8ca8 100%);border-radius:8px;cursor:default}.button.button-pink[disabled][_ngcontent-she-c18]:before{display:none}.button.button-pink[disabled][_ngcontent-she-c18]:after{box-shadow:0 4px 32px 0 #eb3c6d80}.button.button-pink[disabled][_ngcontent-she-c18]:hover:after{bottom:8px}.button.secondary[_ngcontent-she-c18]{background:linear-gradient(225deg, #4f4b6c 0, "" 100%);border:1px solid #d5d4dc;color:#4f4b6c}.button.secondary[_ngcontent-she-c18]:hover{background:#4f4b6c;color:#fff;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c18]:active{background:#39364e;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.secondary[disabled][_ngcontent-she-c18]{background:#39364e;transition:.3s ease-out}.button.secondary[disabled][_ngcontent-she-c18]:hover{background:#39364e}.button.secondary[disabled][_ngcontent-she-c18]   span[_ngcontent-she-c18]{color:#fff}.button.btn-link[_ngcontent-she-c18]{color:#4f4b6c;border:1px solid transparent;font-weight:500}.button.btn-link[_ngcontent-she-c18]:hover{background:rgba(231,235,249,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c18]:active{background:rgba(190,201,239,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c18]:active   span[_ngcontent-she-c18]{opacity:.8}.button.filled-btn[_ngcontent-she-c18]{background:#4f4b6c;color:#fff;min-width:126px}.button.filled-btn[_ngcontent-she-c18]:not(:disabled):active, .button.filled-btn[_ngcontent-she-c18]:not(:disabled):hover{background:#39364e;transition:.2s ease-out}.button.filled-btn[_ngcontent-she-c18]:disabled{opacity:.5;cursor:default}.cancel[_ngcontent-she-c18]{padding:14px 0!important;text-align:left!important}.cancel[_ngcontent-she-c18]   a.cancel-order[_ngcontent-she-c18]{margin:0 0 0 16px;min-height:28px;padding:0 12px;font-size:14px;min-width:100px;display:inline-block;line-height:26px}.error-border[_ngcontent-she-c18] > input[_ngcontent-she-c18]{border:2px solid #f65f6e;transition:.2s ease}.strength-string[_ngcontent-she-c18]   small[_ngcontent-she-c18]   span[_ngcontent-she-c18]{font-weight:700}.strength-1-active[_ngcontent-she-c18], .strength-2-active[_ngcontent-she-c18]{color:#f65f6e}.strength-3-active[_ngcontent-she-c18]{color:#facc08}.strength-4-active[_ngcontent-she-c18]{color:#15b9f5}.strength-5-active[_ngcontent-she-c18]{color:#31c1a9}input[_ngcontent-she-c18]:focus{outline:0}.back-button[_ngcontent-she-c18]{line-height:48px;vertical-align:middle;font-weight:600;color:#8985a4;cursor:pointer}.back-button[_ngcontent-she-c18]   span[_ngcontent-she-c18]{display:inline-block;vertical-align:middle;margin-left:16px}.general-box[_ngcontent-she-c18]   mat-tab-group[_ngcontent-she-c18]   mat-tab-header[_ngcontent-she-c18]{margin-left:auto!important}.general-box.first[_ngcontent-she-c18]{border-radius:0 0 8px 8px!important;margin-bottom:0!important}.general-box.first.loading[_ngcontent-she-c18]{min-height:calc(75vh - 120px);box-shadow:none!important}.title-parent[_ngcontent-she-c18]{position:-webkit-sticky;position:sticky;top:0;border-radius:8px 8px 0 0;z-index:10;margin-left:-12px;margin-right:-12px;background:#f2f6fb}.container-title[_ngcontent-she-c18]{box-shadow:0 4px 8px 0 rgba(79,75,108,.12);background:#fff;margin-left:12px;margin-right:12px;border-radius:8px 8px 0 0}.col-lg-3.col-md-4.col-sm-5.sticky-positioned-wallet.crypto-balance[_ngcontent-she-c18]:after{content:"";position:-webkit-sticky;position:sticky;bottom:-2px;left:0;display:inline-block;width:100%;height:20px;z-index:8;box-shadow:0 22px 12px 8px #f3f6fc}.crypto-balance[_ngcontent-she-c18]{height:75vh;overflow-y:auto;overflow-x:hidden;position:relative}.crypto-balance[_ngcontent-she-c18]::-webkit-scrollbar-thumb, .crypto-balance[_ngcontent-she-c18]::-webkit-scrollbar-thumb:horizontal, .crypto-balance[_ngcontent-she-c18]::-webkit-scrollbar-thumb:horizontal:hover, .crypto-balance[_ngcontent-she-c18]::-webkit-scrollbar-thumb:hover{background-color:transparent}.crypto-balance[_ngcontent-she-c18]   .for-shadow[_ngcontent-she-c18]{min-height:100%;background:#fff}.crypto-balance[_ngcontent-she-c18]   .for-shadow[_ngcontent-she-c18]   .first[_ngcontent-she-c18]{height:100%;background:#fff}.crypto-balance[_ngcontent-she-c18]   .no-search-result[_ngcontent-she-c18]{position:absolute;top:50%;left:50%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}.crypto-balance[_ngcontent-she-c18]   .no-search-result[_ngcontent-she-c18]   span[_ngcontent-she-c18]{color:#8985a4}.pending-coin[_ngcontent-she-c18]{padding:16px 20px;border-bottom:1px solid #e8ecfa;border-left:2px solid transparent;background:#fafafc;position:relative;cursor:pointer}.pending-coin[_ngcontent-she-c18]:focus{outline:0}.pending-coin.active[_ngcontent-she-c18]{background:#fff;border-left:2px solid #656fff}.pending-coin.active[_ngcontent-she-c18]:after{content:"";position:absolute;width:16px;height:40px;right:-6px;top:50%;-ms-transform:translate(50%,-50%);transform:translate(50%,-50%)}@media (max-width:767px){.container.wallets[_ngcontent-she-c18]{margin-top:40px}.pending-coin.active[_ngcontent-she-c18]:after{display:none}}.pending-coin[_ngcontent-she-c18] > .main-container-item[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;padding:0}.pending-coin[_ngcontent-she-c18] > .main-container-item[_ngcontent-she-c18]   img[_ngcontent-she-c18]{width:38px}.pending-coin[_ngcontent-she-c18]   .text-header[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;margin:0 12px}.pending-coin[_ngcontent-she-c18]   .text-header[_ngcontent-she-c18]   span[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;font-size:14px;color:#302d43}.pending-coin[_ngcontent-she-c18]   .text-header[_ngcontent-she-c18]   span[_ngcontent-she-c18]   b[_ngcontent-she-c18]{margin-right:4px}.pending-coin[_ngcontent-she-c18]   .text-header[_ngcontent-she-c18]   span.text[_ngcontent-she-c18]{font-size:12px;color:#8985a4}.pending-coin[_ngcontent-she-c18]   .text-body[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;font-size:14px;color:#4f4b6c;margin-left:auto;text-align:right}.pending-coin[_ngcontent-she-c18]   .text-body[_ngcontent-she-c18]   span[_ngcontent-she-c18]{font-size:12px;color:#8985a4}.selected-item[_ngcontent-she-c18]{height:100%;width:2px;background:#656fff;position:absolute;top:0;bottom:0;left:0}.special[_ngcontent-she-c18]{margin-bottom:16px}.pending[_ngcontent-she-c18], .reserved[_ngcontent-she-c18]{background:#eff0ff;width:100%;border-radius:4px;padding:6px 12px;margin-bottom:4px;font-size:12px;color:#4f4b6c;display:-ms-flexbox;display:flex;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-align:center;align-items:center}.wallet-info[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-direction:row-reverse;flex-direction:row-reverse;margin:0;padding:0 0 48px 24px;height:100%;min-height:406px}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]{-ms-flex:1;flex:1;padding:0 24px;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   label[_ngcontent-she-c18]{font-size:12px;color:#4f4b6c;padding:0 6px}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   label[_ngcontent-she-c18]   p.send[_ngcontent-she-c18]{margin-bottom:5px}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   button[_ngcontent-she-c18]{min-width:100%;margin:16px 0 8px}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]{margin-bottom:16px;color:#3a3751}.wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]:active, .wallet-info[_ngcontent-she-c18]   .wallet-intro[_ngcontent-she-c18]   input[_ngcontent-she-c18]:focus{outline:0;border:2px solid #656fff}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]{-ms-flex:1;flex:1;padding:0 24px}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]   div[_ngcontent-she-c18]{padding:24px 32px}.wallet-info[_ngcontent-she-c18]   .basic-info[_ngcontent-she-c18]{margin:0;padding:0 0 48px 24px;position:relative}.wallet-info[_ngcontent-she-c18]   .basic-info[_ngcontent-she-c18]   span[_ngcontent-she-c18]{font-size:12px;color:#4f4b6c;padding:0 6px}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]   div[_ngcontent-she-c18]{background:rgba(249,204,7,.1);border:1px solid rgba(249,204,7,.5);border-radius:8px;height:100%;font-size:14px;color:#8985a4;font-weight:300;-ms-flex:1;flex:1}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]   div[_ngcontent-she-c18]   p[_ngcontent-she-c18]   span[_ngcontent-she-c18]{font-size:16px;color:#8985a4}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]   div[_ngcontent-she-c18]   p[_ngcontent-she-c18]   span[_ngcontent-she-c18]   b[_ngcontent-she-c18]{color:#4f4b6c}.wallet-info[_ngcontent-she-c18]   .withFee[_ngcontent-she-c18]:last-child{font-weight:700}.wallet-info[_ngcontent-she-c18]   .withFee[_ngcontent-she-c18]{margin-top:7px;display:-ms-flexbox;display:flex}.wallet-info[_ngcontent-she-c18]   .withFee[_ngcontent-she-c18]   span[_ngcontent-she-c18]{margin-right:10px;-ms-flex:0;flex:0}.wallet-info[_ngcontent-she-c18]   .withFee[_ngcontent-she-c18]   b[_ngcontent-she-c18]{color:#302d43;text-align:left}.wallets[_ngcontent-she-c18]   .general-box[_ngcontent-she-c18]{position:relative}.wallets[_ngcontent-she-c18]   .general-box[_ngcontent-she-c18]   h5[_ngcontent-she-c18]{position:absolute;font-size:18px;color:#302d43;font-weight:600;padding:17px 24px;margin:0}.transaction-title[_ngcontent-she-c18]{font-size:18px;color:#302d43;padding:16px 24px;font-weight:600;background:#fff;border-radius:8px 8px 0 0;position:relative;z-index:1}.mobile-visible-header[_ngcontent-she-c18]{position:fixed;top:80px;left:0;width:100%;max-width:100%;border-radius:0;background:#fff;box-shadow:0 4px 24px 0 rgba(79,75,108,.12);padding:13px 24px;z-index:100}.mobile-visible-header[_ngcontent-she-c18] > div[_ngcontent-she-c18]{background-image:linear-gradient(-225deg,#767fff 0,#5560ff 100%);border-radius:6px;color:#fff;border:1px solid transparent;margin-left:12px;display:inline-block;font-weight:900;height:38px;padding:6px 30px;text-transform:uppercase;cursor:pointer}@media screen and (max-width:1024px){.wallet-info[_ngcontent-she-c18]{padding:0 0 24px;-ms-flex-direction:column-reverse;flex-direction:column-reverse}.wallet-info[_ngcontent-she-c18]   .intro-text[_ngcontent-she-c18]{padding-top:24px}}.withFee[_ngcontent-she-c18]{margin-top:7px;display:-ms-flexbox;display:flex}.withFee[_ngcontent-she-c18]   span[_ngcontent-she-c18]:first-child{-ms-flex:1;flex:1}.withFee[_ngcontent-she-c18]   span[_ngcontent-she-c18]:last-child{-ms-flex:3;flex:3}.withFee[_ngcontent-she-c18]:last-child{font-weight:700}.dep-with-disabled[_ngcontent-she-c18]{height:100%;display:-ms-flexbox;display:flex;-ms-flex-pack:center;justify-content:center;-ms-flex-align:center;align-items:center;font-size:16px;text-align:center;margin:0 auto;color:#8985a5;max-width:80%;-ms-flex-direction:column;flex-direction:column}.dep-with-disabled.desc[_ngcontent-she-c18]{font-size:16px;color:#4f4b6c}.dep-with-disabled.pending-status[_ngcontent-she-c18]{text-align:center;max-width:60%}.dep-with-disabled.pending-status[_ngcontent-she-c18]   h3[_ngcontent-she-c18]{font-size:22px;margin:0 0 16px;font-weight:600;color:#302d43}.dep-with-disabled[_ngcontent-she-c18]   .info[_ngcontent-she-c18]{font-size:14px;color:#8985a4;margin-top:12px}  .dep-with-disabled .info__inner div:first-child{background:rgba(49,192,168,.1);border:1px solid #31c0a8;border-radius:8px;font-size:20px;color:#4f4b6c;padding:16px 20px;margin:20px 0}.dep-with-disabled[_ngcontent-she-c18]   .info[_ngcontent-she-c18]   .button[_ngcontent-she-c18]{margin-top:32px!important;font-size:14px!important}@media screen and (max-width:1024px){.dep-with-disabled[_ngcontent-she-c18]{max-width:90%}}.widthdraw-address[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-direction:column;flex-direction:column;width:100%}.container__title-block[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:justify;justify-content:space-between;padding:16px 20px}.container__title-block[_ngcontent-she-c18]   label[for=searchCoins][_ngcontent-she-c18]{display:-ms-inline-flexbox;display:inline-flex;margin:0 20px 0 auto;position:relative}@media screen and (max-width:576px){.container__title-block[_ngcontent-she-c18]   label[for=searchCoins][_ngcontent-she-c18]{margin:0 10px 0 auto}}.container__title-block[_ngcontent-she-c18]   label[for=searchCoins][_ngcontent-she-c18]   input[_ngcontent-she-c18]{height:32px;width:120px;margin:0;padding:8px 10px;font-size:12px}.container__title-block[_ngcontent-she-c18]   label[for=searchCoins][_ngcontent-she-c18]   input[_ngcontent-she-c18]::-webkit-input-placeholder{font-size:12px}.container__title-block[_ngcontent-she-c18]   label[for=searchCoins][_ngcontent-she-c18]   img[_ngcontent-she-c18]{position:absolute;top:50%;right:12px;width:16px;-ms-transform:translateY(-50%);transform:translateY(-50%);cursor:pointer}.export[_ngcontent-she-c18]{width:20px;cursor:pointer}.container__title-btn[_ngcontent-she-c18]{min-width:120px;min-height:38px;border-radius:6px;font-size:16px;font-weight:700;padding:8px 12px;border:1px solid #d5d4dc;color:#4f4b6c;background:#fff;white-space:nowrap}.container__title-btn[_ngcontent-she-c18]:hover{background:#4f4b6c;color:#fff;transition:.3s ease-out;border-color:#4f4b6c}.wallet-name[_ngcontent-she-c18]{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:90px;display:block!important}@media screen and (max-width:870px){.wallet-name[_ngcontent-she-c18]{max-width:60px}}@media screen and (max-width:321px){.wallet-name[_ngcontent-she-c18]{max-width:40px}}@media screen and (max-width:767px){  .dep-with-disabled .info__inner div:first-child{font-size:16px}.wallet-pose[_ngcontent-she-c18]{padding-top:calc(64px + 24px)!important}}.label-for-address[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;width:100%}.label-for-address[_ngcontent-she-c18]   b.blue[_ngcontent-she-c18]{color:#656fff;margin-left:auto;cursor:pointer}.wallet-custom-dropdown[_ngcontent-she-c18]{right:0;width:48px;border-radius:0 8px 8px 0;height:48px;position:static;margin-left:auto}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown{width:48px;border-radius:0 8px 8px 0;height:48px;overflow:hidden}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown:after{display:none}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown .select-trigger{width:46px;border-radius:0 8px 8px 0;height:46px;overflow:hidden;border-right:none;border-left:1px solid #d5d4dc!important}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown.selected{border:1px solid #d5d4dc!important}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown.selected .select-trigger{border-left:0!important}.wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown.wallet-dropdown.selected .select-trigger{border-left:0!important}.dropdown-parent[_ngcontent-she-c18]{position:relative;margin-bottom:16px}.dropdown-parent[_ngcontent-she-c18] > input[_ngcontent-she-c18]{position:absolute;top:0;z-index:0;width:calc(100% - 48px)!important;border-radius:8px 0 0 8px!important;border-right:0!important}.dropdown-parent[_ngcontent-she-c18] > input[_ngcontent-she-c18]:focus + .wallet-custom-dropdown[_ngcontent-she-c18]{transition:.2s ease}.dropdown-parent[_ngcontent-she-c18] > input[_ngcontent-she-c18]:focus + .wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown{border:2px solid #656fff!important;overflow:hidden;border-left:0 solid #d5d4dc!important;transition:.2s ease}.dropdown-parent[_ngcontent-she-c18] > input[_ngcontent-she-c18]:focus + .wallet-custom-dropdown[_ngcontent-she-c18]     .dropdown .select-trigger{border-left:1px solid #d5d4dc!important}.custom-modal[_ngcontent-she-c18]{position:fixed;top:0;left:0;right:0;bottom:0;width:100%;height:100%;background:rgba(79,75,108,.32);z-index:110;display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center;-ms-flex-pack:center;justify-content:center;padding:12px}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]{background:#fff;box-shadow:0 8px 32px 0 rgba(79,75,108,.12);border-radius:8px;max-width:416px;padding:40px 40px 20px;position:relative;z-index:1}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   p[_ngcontent-she-c18]{text-align:center;font-size:16px;color:#302d43}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   img.close-btn[_ngcontent-she-c18]{position:absolute;top:16px;right:16px;width:24px;cursor:pointer}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]   button[_ngcontent-she-c18]:first-child{margin-right:10px}@media screen and (max-width:576px){.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]{-ms-flex-direction:column;flex-direction:column}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]   button[_ngcontent-she-c18]{min-width:100%}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]   button[_ngcontent-she-c18]:first-child{margin-right:0;margin-bottom:12px}.custom-modal[_ngcontent-she-c18]   .are-you-sure-modal[_ngcontent-she-c18]   .button-space[_ngcontent-she-c18]   button[_ngcontent-she-c18]:last-child{margin-top:0}}</style><style>.export[_ngcontent-she-c19]{cursor:pointer;margin:0;text-transform:capitalize;min-height:28px;padding:2px 4px;font-size:12px;font-weight:600}@media screen and (max-width:1320px){.transactions-header[_ngcontent-she-c19]{-ms-flex-direction:column;flex-direction:column;-ms-flex-align:normal;align-items:normal}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]{-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:justify;justify-content:space-between;padding:0}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19] > span[_ngcontent-she-c19]{display:none}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .filter-item[_ngcontent-she-c19]{width:100%;max-width:48%;margin:12px 0 0}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19]{width:100%!important;-ms-flex-wrap:wrap;flex-wrap:wrap;-ms-flex-pack:justify;justify-content:space-between;height:auto;margin:0!important}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19] > span[_ngcontent-she-c19]{display:none}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19] > div[_ngcontent-she-c19]{max-width:48%;width:100%;margin:0}}@media screen and (max-width:490px){.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .filter-item[_ngcontent-she-c19]{max-width:100%}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19]{margin:5px 0!important}.transactions-header[_ngcontent-she-c19]   .filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19] > div[_ngcontent-she-c19]{max-width:100%;height:40px}.filter-form.data-filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19]{height:auto!important;width:100%!important;display:-ms-flexbox;display:flex;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-wrap:wrap;flex-wrap:wrap}.filter-form.data-filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19] > span[_ngcontent-she-c19]{display:none}.filter-form.data-filter-form[_ngcontent-she-c19]   .filters-list[_ngcontent-she-c19]   .data-picker[_ngcontent-she-c19] > div[_ngcontent-she-c19]{width:47%}}.small-btn[_ngcontent-she-c19]{display:inline-block;min-width:80px;min-height:24px;padding:5px;float:right;font-size:.8em;margin:0}.see-modal-form[_ngcontent-she-c19]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;z-index:1000;padding-top:20vh;overflow:auto}.see-modal-form.step2[_ngcontent-she-c19]   .pass-reset-form[_ngcontent-she-c19]{min-height:auto}.see-modal-form.step2[_ngcontent-she-c19]   .pass-reset-form[_ngcontent-she-c19]   .mail-div[_ngcontent-she-c19]{margin:16px auto 32px}.see-modal-form.step2[_ngcontent-she-c19]   .pass-reset-form[_ngcontent-she-c19]   .mail-div[_ngcontent-she-c19]   h3[_ngcontent-she-c19]{margin-bottom:8px}.see-modal-form[_ngcontent-she-c19]   .fixed[_ngcontent-she-c19]{z-index:10000;overflow-y:auto;width:calc(100% - 24px)}.see-modal-form[_ngcontent-she-c19]   .fixed[_ngcontent-she-c19]   .tfa-submit-btn[_ngcontent-she-c19]   button[_ngcontent-she-c19]:disabled:after{display:none}.see-modal-form[_ngcontent-she-c19]   img.close-modal[_ngcontent-she-c19]{margin-left:auto;display:block;position:relative;top:-16px;right:-24px;cursor:pointer}.see-modal-form[_ngcontent-she-c19]   .layout[_ngcontent-she-c19]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;background:rgba(79,75,108,.2);z-index:4}.buttons[_ngcontent-she-c19]   button[_ngcontent-she-c19]{width:100%}.tid[_ngcontent-she-c19]{width:100px;max-width:100px;overflow:hidden;text-overflow:ellipsis;display:inline-block;margin-right:80px}.copy-img[_ngcontent-she-c19]{position:absolute;right:24px}.transaction-id-col[_ngcontent-she-c19]{padding-left:90px}</style><style>.mat-form-field{display:inline-block;position:relative;text-align:left}[dir=rtl] .mat-form-field{text-align:right}.mat-form-field-wrapper{position:relative}.mat-form-field-flex{display:inline-flex;align-items:baseline;box-sizing:border-box;width:100%}.mat-form-field-prefix,.mat-form-field-suffix{white-space:nowrap;flex:none;position:relative}.mat-form-field-infix{display:block;position:relative;flex:auto;min-width:0;width:180px}@media screen and (-ms-high-contrast:active){.mat-form-field-infix{border-image:linear-gradient(transparent,transparent)}}.mat-form-field-label-wrapper{position:absolute;left:0;box-sizing:content-box;width:100%;height:100%;overflow:hidden;pointer-events:none}.mat-form-field-label{position:absolute;left:0;font:inherit;pointer-events:none;width:100%;white-space:nowrap;text-overflow:ellipsis;overflow:hidden;transform-origin:0 0;transition:transform .4s cubic-bezier(.25,.8,.25,1),color .4s cubic-bezier(.25,.8,.25,1),width .4s cubic-bezier(.25,.8,.25,1);display:none}[dir=rtl] .mat-form-field-label{transform-origin:100% 0;left:auto;right:0}.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-label,.mat-form-field-empty.mat-form-field-label{display:block}.mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label{display:none}.mat-form-field-can-float .mat-form-field-autofill-control:-webkit-autofill+.mat-form-field-label-wrapper .mat-form-field-label{display:block;transition:none}.mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,.mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label{display:none}.mat-form-field-can-float .mat-input-server:focus+.mat-form-field-label-wrapper .mat-form-field-label,.mat-form-field-can-float .mat-input-server[placeholder]:not(:placeholder-shown)+.mat-form-field-label-wrapper .mat-form-field-label{display:block}.mat-form-field-label:not(.mat-form-field-empty){transition:none}.mat-form-field-underline{position:absolute;width:100%;pointer-events:none;transform:scaleY(1.0001)}.mat-form-field-ripple{position:absolute;left:0;width:100%;transform-origin:50%;transform:scaleX(.5);opacity:0;transition:background-color .3s cubic-bezier(.55,0,.55,.2)}.mat-form-field.mat-focused .mat-form-field-ripple,.mat-form-field.mat-form-field-invalid .mat-form-field-ripple{opacity:1;transform:scaleX(1);transition:transform .3s cubic-bezier(.25,.8,.25,1),opacity .1s cubic-bezier(.25,.8,.25,1),background-color .3s cubic-bezier(.25,.8,.25,1)}.mat-form-field-subscript-wrapper{position:absolute;box-sizing:border-box;width:100%;overflow:hidden}.mat-form-field-label-wrapper .mat-icon,.mat-form-field-subscript-wrapper .mat-icon{width:1em;height:1em;font-size:inherit;vertical-align:baseline}.mat-form-field-hint-wrapper{display:flex}.mat-form-field-hint-spacer{flex:1 0 1em}.mat-error{display:block}.mat-form-field-control-wrapper{position:relative}.mat-form-field._mat-animation-noopable .mat-form-field-label,.mat-form-field._mat-animation-noopable .mat-form-field-ripple{transition:none}</style><style>.mat-form-field-appearance-fill .mat-form-field-flex{border-radius:4px 4px 0 0;padding:.75em .75em 0 .75em}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-fill .mat-form-field-flex{outline:solid 1px}}.mat-form-field-appearance-fill .mat-form-field-underline::before{content:'';display:block;position:absolute;bottom:0;height:1px;width:100%}.mat-form-field-appearance-fill .mat-form-field-ripple{bottom:0;height:2px}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-fill .mat-form-field-ripple{height:0;border-top:solid 2px}}.mat-form-field-appearance-fill:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{opacity:1;transform:none;transition:opacity .6s cubic-bezier(.25,.8,.25,1)}.mat-form-field-appearance-fill._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{transition:none}.mat-form-field-appearance-fill .mat-form-field-subscript-wrapper{padding:0 1em}</style><style>.mat-form-field-appearance-legacy .mat-form-field-label{transform:perspective(100px);-ms-transform:none}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon{width:1em}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button{font:inherit;vertical-align:baseline}.mat-form-field-appearance-legacy .mat-form-field-prefix .mat-icon-button .mat-icon,.mat-form-field-appearance-legacy .mat-form-field-suffix .mat-icon-button .mat-icon{font-size:inherit}.mat-form-field-appearance-legacy .mat-form-field-underline{height:1px}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-legacy .mat-form-field-underline{height:0;border-top:solid 1px}}.mat-form-field-appearance-legacy .mat-form-field-ripple{top:0;height:2px;overflow:hidden}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-legacy .mat-form-field-ripple{height:0;border-top:solid 2px}}.mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline{background-position:0;background-color:transparent}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-legacy.mat-form-field-disabled .mat-form-field-underline{border-top-style:dotted;border-top-width:2px}}.mat-form-field-appearance-legacy.mat-form-field-invalid:not(.mat-focused) .mat-form-field-ripple{height:1px}</style><style>.mat-form-field-appearance-outline .mat-form-field-wrapper{margin:.25em 0}.mat-form-field-appearance-outline .mat-form-field-flex{padding:0 .75em 0 .75em;margin-top:-.25em;position:relative}.mat-form-field-appearance-outline .mat-form-field-prefix,.mat-form-field-appearance-outline .mat-form-field-suffix{top:.25em}.mat-form-field-appearance-outline .mat-form-field-outline{display:flex;position:absolute;top:.25em;left:0;right:0;bottom:0;pointer-events:none}.mat-form-field-appearance-outline .mat-form-field-outline-end,.mat-form-field-appearance-outline .mat-form-field-outline-start{border:1px solid currentColor;min-width:5px}.mat-form-field-appearance-outline .mat-form-field-outline-start{border-radius:5px 0 0 5px;border-right-style:none}[dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-start{border-right-style:solid;border-left-style:none;border-radius:0 5px 5px 0}.mat-form-field-appearance-outline .mat-form-field-outline-end{border-radius:0 5px 5px 0;border-left-style:none;flex-grow:1}[dir=rtl] .mat-form-field-appearance-outline .mat-form-field-outline-end{border-left-style:solid;border-right-style:none;border-radius:5px 0 0 5px}.mat-form-field-appearance-outline .mat-form-field-outline-gap{border-radius:.000001px;border:1px solid currentColor;border-left-style:none;border-right-style:none}.mat-form-field-appearance-outline.mat-form-field-can-float.mat-form-field-should-float .mat-form-field-outline-gap{border-top-color:transparent}.mat-form-field-appearance-outline .mat-form-field-outline-thick{opacity:0}.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-end,.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-gap,.mat-form-field-appearance-outline .mat-form-field-outline-thick .mat-form-field-outline-start{border-width:2px;transition:border-color .3s cubic-bezier(.25,.8,.25,1)}.mat-form-field-appearance-outline.mat-focused .mat-form-field-outline,.mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline{opacity:0;transition:opacity .1s cubic-bezier(.25,.8,.25,1)}.mat-form-field-appearance-outline.mat-focused .mat-form-field-outline-thick,.mat-form-field-appearance-outline.mat-form-field-invalid .mat-form-field-outline-thick{opacity:1}.mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline{opacity:0;transition:opacity .6s cubic-bezier(.25,.8,.25,1)}.mat-form-field-appearance-outline:not(.mat-form-field-disabled) .mat-form-field-flex:hover .mat-form-field-outline-thick{opacity:1}.mat-form-field-appearance-outline .mat-form-field-subscript-wrapper{padding:0 1em}.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-end,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-gap,.mat-form-field-appearance-outline._mat-animation-noopable .mat-form-field-outline-start,.mat-form-field-appearance-outline._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-outline{transition:none}</style><style>.mat-form-field-appearance-standard .mat-form-field-flex{padding-top:.75em}.mat-form-field-appearance-standard .mat-form-field-underline{height:1px}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-standard .mat-form-field-underline{height:0;border-top:solid 1px}}.mat-form-field-appearance-standard .mat-form-field-ripple{bottom:0;height:2px}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-standard .mat-form-field-ripple{height:0;border-top:2px}}.mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline{background-position:0;background-color:transparent}@media screen and (-ms-high-contrast:active){.mat-form-field-appearance-standard.mat-form-field-disabled .mat-form-field-underline{border-top-style:dotted;border-top-width:2px}}.mat-form-field-appearance-standard:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{opacity:1;transform:none;transition:opacity .6s cubic-bezier(.25,.8,.25,1)}.mat-form-field-appearance-standard._mat-animation-noopable:not(.mat-form-field-disabled) .mat-form-field-flex:hover~.mat-form-field-underline .mat-form-field-ripple{transition:none}</style><style>.mat-input-element{font:inherit;background:0 0;color:currentColor;border:none;outline:0;padding:0;margin:0;width:100%;max-width:100%;vertical-align:bottom;text-align:inherit}.mat-input-element:-moz-ui-invalid{box-shadow:none}.mat-input-element::-ms-clear,.mat-input-element::-ms-reveal{display:none}.mat-input-element,.mat-input-element::-webkit-search-cancel-button,.mat-input-element::-webkit-search-decoration,.mat-input-element::-webkit-search-results-button,.mat-input-element::-webkit-search-results-decoration{-webkit-appearance:none}.mat-input-element::-webkit-caps-lock-indicator,.mat-input-element::-webkit-contacts-auto-fill-button,.mat-input-element::-webkit-credentials-auto-fill-button{visibility:hidden}.mat-input-element[type=date]::after,.mat-input-element[type=datetime-local]::after,.mat-input-element[type=datetime]::after,.mat-input-element[type=month]::after,.mat-input-element[type=time]::after,.mat-input-element[type=week]::after{content:' ';white-space:pre;width:1px}.mat-input-element::-webkit-calendar-picker-indicator,.mat-input-element::-webkit-clear-button,.mat-input-element::-webkit-inner-spin-button{font-size:.75em}.mat-input-element::placeholder{transition:color .4s .133s cubic-bezier(.25,.8,.25,1)}.mat-input-element::-moz-placeholder{transition:color .4s .133s cubic-bezier(.25,.8,.25,1)}.mat-input-element::-webkit-input-placeholder{transition:color .4s .133s cubic-bezier(.25,.8,.25,1)}.mat-input-element:-ms-input-placeholder{transition:color .4s .133s cubic-bezier(.25,.8,.25,1)}.mat-form-field-hide-placeholder .mat-input-element::placeholder{color:transparent!important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element::-moz-placeholder{color:transparent!important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element::-webkit-input-placeholder{color:transparent!important;-webkit-text-fill-color:transparent;transition:none}.mat-form-field-hide-placeholder .mat-input-element:-ms-input-placeholder{color:transparent!important;-webkit-text-fill-color:transparent;transition:none}textarea.mat-input-element{resize:vertical;overflow:auto}textarea.mat-input-element.cdk-textarea-autosize{resize:none}textarea.mat-input-element{padding:2px 0;margin:-2px 0}select.mat-input-element{-moz-appearance:none;-webkit-appearance:none;position:relative;background-color:transparent;display:inline-flex;box-sizing:border-box;padding-top:1em;top:-1em;margin-bottom:-1em}select.mat-input-element::-ms-expand{display:none}select.mat-input-element::-moz-focus-inner{border:0}select.mat-input-element:not(:disabled){cursor:pointer}select.mat-input-element::-ms-value{color:inherit;background:0 0}.mat-form-field-type-mat-native-select .mat-form-field-infix::after{content:'';width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid;position:absolute;top:50%;right:0;margin-top:-2.5px}[dir=rtl] .mat-form-field-type-mat-native-select .mat-form-field-infix::after{right:auto;left:0}.mat-form-field-type-mat-native-select.mat-form-field-appearance-outline .mat-form-field-infix::after{margin-top:-5px}.mat-form-field-type-mat-native-select.mat-form-field-appearance-fill .mat-form-field-infix::after{margin-top:-10px}</style><style>.main-orders-header[_ngcontent-she-c3]{position:fixed;top:80px;left:0;width:100%;max-width:100%;border-radius:0;background:#fff;box-shadow:0 4px 24px 0 rgba(79,75,108,.12);padding:13px 24px;z-index:100;min-height:64px}.overall-balance[_ngcontent-she-c3]{display:-ms-flexbox;display:flex;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-align:center;align-items:center}h4[_ngcontent-she-c3]{font-size:16px;color:#8985a4;display:inline-block;margin:0}.ob-title[_ngcontent-she-c3], .ob-title[_ngcontent-she-c3] > div[_ngcontent-she-c3]{display:-ms-flexbox;display:flex;-ms-flex-align:center;align-items:center}@media (max-width:767px){.ob-title[_ngcontent-she-c3] > div[_ngcontent-she-c3]{-ms-flex-direction:column;flex-direction:column}.ob-title[_ngcontent-she-c3] > div[_ngcontent-she-c3]   .num[_ngcontent-she-c3]{line-height:36px}}.num[_ngcontent-she-c3]{font-size:18px;display:-ms-inline-flexbox;display:inline-flex;-ms-flex-align:center;align-items:center;margin:0 7px;color:#8985a4}.num[_ngcontent-she-c3]   b[_ngcontent-she-c3]{font-size:18px;color:#302d43;margin:0 4px}.num[_ngcontent-she-c3]   img[_ngcontent-she-c3]{width:24px;margin-right:8px}.header-deposit-button[_ngcontent-she-c3]{display:inline-block;color:#302d43;font-weight:900;height:38px;padding:6px 16px;text-transform:uppercase;border:1px solid #d5d4dc;border-radius:6px;cursor:pointer}.header-deposit-button[_ngcontent-she-c3]   img[_ngcontent-she-c3]{vertical-align:middle;margin-right:10px}.header-deposit-button[_ngcontent-she-c3]   b[_ngcontent-she-c3]{vertical-align:middle}@media screen and (max-width:767px){.main-orders-header[_ngcontent-she-c3]{top:64px}.ob-title[_ngcontent-she-c3]{width:100%;-ms-flex-direction:column;flex-direction:column}.ob-title[_ngcontent-she-c3] > div[_ngcontent-she-c3]{width:100%;text-align:center;margin-top:12px;-ms-flex-pack:center;justify-content:center}}</style><style>html[_ngcontent-she-c23]{font-size:16px;-webkit-font-smoothing:antialiased;line-height:1.3;overflow:visible}body[_ngcontent-she-c23]{overflow:visible}.error-message[_ngcontent-she-c23]{color:#eb3c6d;width:100%;text-align:left;font-size:14px;padding-left:15px;display:inline-block;margin:0 0 14px}.position-sticky[_ngcontent-she-c23]{position:sticky;position:-webkit-sticky;top:100px}@media screen and (max-width:767px){.position-sticky[_ngcontent-she-c23]{position:unset}}.red-dote[_ngcontent-she-c23]{color:#f65f6e}.table-head[_ngcontent-she-c23]{background:#fafafc;height:48px;border-top:1px solid #e8ecfa;border-bottom:1px solid #e8ecfa;text-align:center;white-space:nowrap;display:-ms-flexbox;display:flex;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-align:center;align-items:center}.table-head[_ngcontent-she-c23]   th[_ngcontent-she-c23]{padding:14px 24px;font-size:14px!important;color:#8985a4;text-transform:uppercase;text-align:center;background:#fafafc;z-index:1;width:145px}.table-head[_ngcontent-she-c23]   th[_ngcontent-she-c23]:last-child{text-align:right}.table-head[_ngcontent-she-c23]   th[_ngcontent-she-c23]:first-child{text-align:left}.table-head[_ngcontent-she-c23]   th.data-col[_ngcontent-she-c23]{width:170px!important}.table-head[_ngcontent-she-c23]   th.main-data-col[_ngcontent-she-c23]{width:200px!important}.table-head[_ngcontent-she-c23]   th.copy-table-col[_ngcontent-she-c23]{width:220px!important}.bid-tr[_ngcontent-she-c23]{display:-ms-flexbox;display:flex;-ms-flex-pack:justify;justify-content:space-between;-ms-flex-align:center;align-items:center}.bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]{vertical-align:middle;font-size:16px;color:#4f4b6c;padding:14px 24px;cursor:pointer;text-align:center;white-space:nowrap;width:145px}.bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]   span[_ngcontent-she-c23]{vertical-align:middle}.bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]   .buy[_ngcontent-she-c23]   img[_ngcontent-she-c23], .bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]   .sell[_ngcontent-she-c23]   img[_ngcontent-she-c23]{width:8px;margin-left:8.5px}.bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]:last-child{text-align:right}.bid-tr[_ngcontent-she-c23]   td[_ngcontent-she-c23]:first-child{position:relative;text-align:left}.bid-tr[_ngcontent-she-c23]   td.data-col[_ngcontent-she-c23]{width:170px!important}.bid-tr[_ngcontent-she-c23]   td.main-data-col[_ngcontent-she-c23]{width:200px!important}.bid-tr[_ngcontent-she-c23]   td.copy-table-col[_ngcontent-she-c23]{width:220px!important;position:relative}.header-text[_ngcontent-she-c23]{font-size:18px;color:#302d43;padding:16px 24px;font-weight:600;margin-bottom:0}.header-text[_ngcontent-she-c23]   b[_ngcontent-she-c23]{float:right;font-size:14px;color:#8985a4;font-weight:700}input[_ngcontent-she-c23]:-webkit-autofill, input[_ngcontent-she-c23]:-webkit-autofill:active, input[_ngcontent-she-c23]:-webkit-autofill:focus, input[_ngcontent-she-c23]:-webkit-autofill:hover{-webkit-box-shadow:0 0 0 50px #fafafc inset!important}input[_ngcontent-she-c23]{background:#fafafc;border:1px solid #d5d4dc;border-radius:8px;width:100%;margin-bottom:12px;height:48px;padding:13px 16px;transition:.2s ease;-webkit-appearance:none;color:#8985a4;font-size:16px}input[_ngcontent-she-c23]:not(:disabled):active, input[_ngcontent-she-c23]:not(:disabled):focus{border:2px solid #656fff}input[_ngcontent-she-c23]:disabled{background:#f1f5fb!important;cursor:default;-webkit-text-fill-color:#8985a4!important;-webkit-opacity:1;color:#8985a4!important}input[readonly][_ngcontent-she-c23]{background:#f1f5fb!important;cursor:default!important;color:#4f4b6c!important}input[readonly][_ngcontent-she-c23]:active, input[readonly][_ngcontent-she-c23]:focus{border:1px solid #d5d4dc}input[_ngcontent-she-c23]::-moz-placeholder{color:#8985a4;opacity:1}input[_ngcontent-she-c23]:-ms-input-placeholder{color:#8985a4}input[_ngcontent-she-c23]::-webkit-input-placeholder{color:#8985a4}.button[_ngcontent-she-c23]{min-width:158px;min-height:48px;width:auto;color:#fff;font-size:16px;letter-spacing:0;text-align:center;line-height:22px;font-weight:700;padding:13px 25px;text-transform:uppercase;border-radius:8px;display:inline-block;transition:.5s cubic-bezier(0,0,.38,.99);border:none;position:relative;background:0 0}.button[_ngcontent-she-c23]:focus{outline:0}.middle.button[_ngcontent-she-c23]{min-width:120px;min-height:38px;border-radius:6px;font-size:16px;font-weight:700;padding:8px 12px}.button.primary[_ngcontent-she-c23]{background:linear-gradient(225deg,#767fff 0,#5560ff 100%);border:1px solid transparent;color:#fff}.button.primary[_ngcontent-she-c23]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #5560ff;background:0 0;transition:.2s ease-out}.button.primary[_ngcontent-she-c23]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#407dff 0,#3352e7 100%);opacity:0;transition:.1s ease-out}.button.primary[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.primary[_ngcontent-she-c23]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary[_ngcontent-she-c23]   span[_ngcontent-she-c23]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary[_ngcontent-she-c23]:hover:after{bottom:2px;transition:.2s ease-out}.button.primary[disabled][_ngcontent-she-c23]{background-image:linear-gradient(225deg,#b7c3f7 0,#b7c3f7 100%);border-radius:8px;cursor:default}.button.primary[disabled][_ngcontent-she-c23]:before{display:none}.button.primary[disabled][_ngcontent-she-c23]:after{box-shadow:0 4px 32px 0 #5560ff80}.button.primary[disabled][_ngcontent-she-c23]:hover:after{bottom:8px}.button.primary-white[_ngcontent-she-c23]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #c3c4cb;background:0 0;transition:.2s ease-out}.button.primary-white[_ngcontent-she-c23]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#f2f2f2,#e6e6e6 100%);opacity:0;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.primary-white[_ngcontent-she-c23]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.primary-white[_ngcontent-she-c23]   span[_ngcontent-she-c23]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.primary-white[_ngcontent-she-c23]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[_ngcontent-she-c23]{background:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);border:1px solid transparent;color:#fff}.button.button-green[_ngcontent-she-c23]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #00b79e;background:0 0;transition:.2s ease-out}.button.button-green[_ngcontent-she-c23]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#3ad7bd 0,#00b79e 100%);opacity:0;transition:.1s ease-out}.button.button-green[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.button-green[_ngcontent-she-c23]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-green[_ngcontent-she-c23]   span[_ngcontent-she-c23]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-green[_ngcontent-she-c23]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-green[disabled][_ngcontent-she-c23]{background-image:linear-gradient(225deg,#93e6d7 0,#78d5c6 100%);border-radius:8px;cursor:default}.button.button-green[disabled][_ngcontent-she-c23]:before{display:none}.button.button-green[disabled][_ngcontent-she-c23]:after{box-shadow:0 4px 32px 0 #00b79e80}.button.button-green[disabled][_ngcontent-she-c23]:hover:after{bottom:8px}.button.button-pink[_ngcontent-she-c23]{background:linear-gradient(225deg,#ff6e7d 0,#eb3c6d 100%);border:1px solid transparent;color:#fff}.button.button-pink[_ngcontent-she-c23]:after{content:"";position:absolute;top:5px;right:12px;left:12px;z-index:-1;bottom:8px;border-radius:8px;box-shadow:0 4px 32px 0 #eb3c6d;background:0 0;transition:.2s ease-out}.button.button-pink[_ngcontent-she-c23]:before{content:"";position:absolute;top:0;right:0;left:0;bottom:0;width:100%;height:100%;border-radius:8px;background-image:linear-gradient(225deg,#ff314e 0,#dd174e 100%);opacity:0;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.button-pink[_ngcontent-she-c23]:active:before{z-index:1;opacity:1;transition:.1s ease-out}.button.button-pink[_ngcontent-she-c23]   span[_ngcontent-she-c23]:not(.blue){position:absolute;top:50%;left:50%;width:100%;-ms-transform:translate(-50%,-50%);transform:translate(-50%,-50%);z-index:2}.button.button-pink[_ngcontent-she-c23]:hover:after{bottom:2px;transition:.2s ease-out}.button.button-pink[disabled][_ngcontent-she-c23]{background-image:linear-gradient(225deg,#f8a7b0 0,#ed8ca8 100%);border-radius:8px;cursor:default}.button.button-pink[disabled][_ngcontent-she-c23]:before{display:none}.button.button-pink[disabled][_ngcontent-she-c23]:after{box-shadow:0 4px 32px 0 #eb3c6d80}.button.button-pink[disabled][_ngcontent-she-c23]:hover:after{bottom:8px}.button.secondary[_ngcontent-she-c23]{background:linear-gradient(225deg, #4f4b6c 0, "" 100%);border:1px solid #d5d4dc;color:#4f4b6c}.button.secondary[_ngcontent-she-c23]:hover{background:#4f4b6c;color:#fff;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c23]:active{background:#39364e;transition:.3s ease-out;border-color:#4f4b6c}.button.secondary[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.secondary[disabled][_ngcontent-she-c23]{background:#39364e;transition:.3s ease-out}.button.secondary[disabled][_ngcontent-she-c23]:hover{background:#39364e}.button.secondary[disabled][_ngcontent-she-c23]   span[_ngcontent-she-c23]{color:#fff}.button.btn-link[_ngcontent-she-c23]{color:#4f4b6c;border:1px solid transparent;font-weight:500}.button.btn-link[_ngcontent-she-c23]:hover{background:rgba(231,235,249,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c23]:active{background:rgba(190,201,239,.5);transition:.2s ease-out}.button.btn-link[_ngcontent-she-c23]:active   span[_ngcontent-she-c23]{opacity:.8}.button.filled-btn[_ngcontent-she-c23]{background:#4f4b6c;color:#fff;min-width:126px}.button.filled-btn[_ngcontent-she-c23]:not(:disabled):active, .button.filled-btn[_ngcontent-she-c23]:not(:disabled):hover{background:#39364e;transition:.2s ease-out}.button.filled-btn[_ngcontent-she-c23]:disabled{opacity:.5;cursor:default}.cancel[_ngcontent-she-c23]{padding:14px 0!important;text-align:left!important}.cancel[_ngcontent-she-c23]   a.cancel-order[_ngcontent-she-c23]{margin:0 0 0 16px;min-height:28px;padding:0 12px;font-size:14px;min-width:100px;display:inline-block;line-height:26px}.error-border[_ngcontent-she-c23] > input[_ngcontent-she-c23]{border:2px solid #f65f6e;transition:.2s ease}.strength-string[_ngcontent-she-c23]   small[_ngcontent-she-c23]   span[_ngcontent-she-c23]{font-weight:700}.strength-1-active[_ngcontent-she-c23], .strength-2-active[_ngcontent-she-c23]{color:#f65f6e}.strength-3-active[_ngcontent-she-c23]{color:#facc08}.strength-4-active[_ngcontent-she-c23]{color:#15b9f5}.strength-5-active[_ngcontent-she-c23]{color:#31c1a9}input[_ngcontent-she-c23]:focus{outline:0}.wallet-table-head[_ngcontent-she-c23]{overflow:auto}.info-form[_ngcontent-she-c23]{position:relative;z-index:0;border-radius:0 0 8px 8px!important}.small-btn[_ngcontent-she-c23]{display:inline-block;min-width:80px;min-height:24px;padding:5px;float:right;font-size:.8em;margin:0}.see-modal-form[_ngcontent-she-c23]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;z-index:1000;padding-top:20vh;overflow:auto}.see-modal-form.step2[_ngcontent-she-c23]   .pass-reset-form[_ngcontent-she-c23]{min-height:auto}.see-modal-form.step2[_ngcontent-she-c23]   .pass-reset-form[_ngcontent-she-c23]   .mail-div[_ngcontent-she-c23]{margin:16px auto 32px}.see-modal-form.step2[_ngcontent-she-c23]   .pass-reset-form[_ngcontent-she-c23]   .mail-div[_ngcontent-she-c23]   h3[_ngcontent-she-c23]{margin-bottom:8px}.see-modal-form[_ngcontent-she-c23]   .fixed[_ngcontent-she-c23]{z-index:10000;overflow-y:auto;width:calc(100% - 24px)}.see-modal-form[_ngcontent-she-c23]   .fixed[_ngcontent-she-c23]   .tfa-submit-btn[_ngcontent-she-c23]   button[_ngcontent-she-c23]:disabled:after{display:none}.see-modal-form[_ngcontent-she-c23]   img.close-modal[_ngcontent-she-c23]{margin-left:auto;display:block;position:relative;top:-16px;right:-24px;cursor:pointer}.see-modal-form[_ngcontent-she-c23]   .layout[_ngcontent-she-c23]{content:"";position:fixed;top:0;bottom:0;left:0;right:0;background:rgba(79,75,108,.2);z-index:4}.buttons[_ngcontent-she-c23]   button[_ngcontent-she-c23]{width:100%}.tid[_ngcontent-she-c23]{width:100px;max-width:100px;overflow:hidden;text-overflow:ellipsis;display:inline-block;margin-right:70px}.copy-img[_ngcontent-she-c23]{position:absolute;right:24px}.transaction-title[_ngcontent-she-c23]{font-size:18px;color:#302d43;padding:16px 24px;font-weight:600;background:#fff;border-radius:8px 8px 0 0;position:relative;z-index:1;display:-ms-flexbox;display:flex;-ms-flex-align:normal;align-items:normal;-ms-flex-pack:justify;justify-content:space-between}@media screen and (max-width:1023px){.transaction-title[_ngcontent-she-c23]{-ms-flex-direction:column;flex-direction:column;-ms-flex-align:normal;align-items:normal}}.wallet-usdt-filter[_ngcontent-she-c23]{width:140px;margin-left:24px}.wallet-usdt-filter[_ngcontent-she-c23]     .select-area{height:38px}.wallet-usdt-filter[_ngcontent-she-c23]     .select-area .caret{top:15px}</style><style>.mat-paginator{display:block}.mat-paginator-outer-container{display:flex}.mat-paginator-container{display:flex;align-items:center;justify-content:flex-end;min-height:56px;padding:0 8px;flex-wrap:wrap-reverse;width:100%}.mat-paginator-page-size{display:flex;align-items:baseline;margin-right:8px}[dir=rtl] .mat-paginator-page-size{margin-right:0;margin-left:8px}.mat-paginator-page-size-label{margin:0 4px}.mat-paginator-page-size-select{margin:6px 4px 0 4px;width:56px}.mat-paginator-page-size-select.mat-form-field-appearance-outline{width:64px}.mat-paginator-page-size-select.mat-form-field-appearance-fill{width:64px}.mat-paginator-range-label{margin:0 32px 0 24px}.mat-paginator-range-actions{display:flex;align-items:center}.mat-paginator-icon{width:28px;fill:currentColor}[dir=rtl] .mat-paginator-icon{transform:rotate(180deg)}</style><style>.mat-button .mat-button-focus-overlay,.mat-icon-button .mat-button-focus-overlay{opacity:0}.mat-button:hover .mat-button-focus-overlay,.mat-stroked-button:hover .mat-button-focus-overlay{opacity:.04}@media (hover:none){.mat-button:hover .mat-button-focus-overlay,.mat-stroked-button:hover .mat-button-focus-overlay{opacity:0}}.mat-button,.mat-flat-button,.mat-icon-button,.mat-stroked-button{box-sizing:border-box;position:relative;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:pointer;outline:0;border:none;-webkit-tap-highlight-color:transparent;display:inline-block;white-space:nowrap;text-decoration:none;vertical-align:baseline;text-align:center;margin:0;min-width:64px;line-height:36px;padding:0 16px;border-radius:4px;overflow:visible}.mat-button::-moz-focus-inner,.mat-flat-button::-moz-focus-inner,.mat-icon-button::-moz-focus-inner,.mat-stroked-button::-moz-focus-inner{border:0}.mat-button[disabled],.mat-flat-button[disabled],.mat-icon-button[disabled],.mat-stroked-button[disabled]{cursor:default}.mat-button.cdk-keyboard-focused .mat-button-focus-overlay,.mat-button.cdk-program-focused .mat-button-focus-overlay,.mat-flat-button.cdk-keyboard-focused .mat-button-focus-overlay,.mat-flat-button.cdk-program-focused .mat-button-focus-overlay,.mat-icon-button.cdk-keyboard-focused .mat-button-focus-overlay,.mat-icon-button.cdk-program-focused .mat-button-focus-overlay,.mat-stroked-button.cdk-keyboard-focused .mat-button-focus-overlay,.mat-stroked-button.cdk-program-focused .mat-button-focus-overlay{opacity:.12}.mat-button::-moz-focus-inner,.mat-flat-button::-moz-focus-inner,.mat-icon-button::-moz-focus-inner,.mat-stroked-button::-moz-focus-inner{border:0}.mat-raised-button{box-sizing:border-box;position:relative;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:pointer;outline:0;border:none;-webkit-tap-highlight-color:transparent;display:inline-block;white-space:nowrap;text-decoration:none;vertical-align:baseline;text-align:center;margin:0;min-width:64px;line-height:36px;padding:0 16px;border-radius:4px;overflow:visible;transform:translate3d(0,0,0);transition:background .4s cubic-bezier(.25,.8,.25,1),box-shadow 280ms cubic-bezier(.4,0,.2,1)}.mat-raised-button::-moz-focus-inner{border:0}.mat-raised-button[disabled]{cursor:default}.mat-raised-button.cdk-keyboard-focused .mat-button-focus-overlay,.mat-raised-button.cdk-program-focused .mat-button-focus-overlay{opacity:.12}.mat-raised-button::-moz-focus-inner{border:0}._mat-animation-noopable.mat-raised-button{transition:none;animation:none}.mat-stroked-button{border:1px solid currentColor;padding:0 15px;line-height:34px}.mat-fab{box-sizing:border-box;position:relative;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:pointer;outline:0;border:none;-webkit-tap-highlight-color:transparent;display:inline-block;white-space:nowrap;text-decoration:none;vertical-align:baseline;text-align:center;margin:0;min-width:64px;line-height:36px;padding:0 16px;border-radius:4px;overflow:visible;transform:translate3d(0,0,0);transition:background .4s cubic-bezier(.25,.8,.25,1),box-shadow 280ms cubic-bezier(.4,0,.2,1);min-width:0;border-radius:50%;width:56px;height:56px;padding:0;flex-shrink:0}.mat-fab::-moz-focus-inner{border:0}.mat-fab[disabled]{cursor:default}.mat-fab.cdk-keyboard-focused .mat-button-focus-overlay,.mat-fab.cdk-program-focused .mat-button-focus-overlay{opacity:.12}.mat-fab::-moz-focus-inner{border:0}._mat-animation-noopable.mat-fab{transition:none;animation:none}.mat-fab .mat-button-wrapper{padding:16px 0;display:inline-block;line-height:24px}.mat-mini-fab{box-sizing:border-box;position:relative;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:pointer;outline:0;border:none;-webkit-tap-highlight-color:transparent;display:inline-block;white-space:nowrap;text-decoration:none;vertical-align:baseline;text-align:center;margin:0;min-width:64px;line-height:36px;padding:0 16px;border-radius:4px;overflow:visible;transform:translate3d(0,0,0);transition:background .4s cubic-bezier(.25,.8,.25,1),box-shadow 280ms cubic-bezier(.4,0,.2,1);min-width:0;border-radius:50%;width:40px;height:40px;padding:0;flex-shrink:0}.mat-mini-fab::-moz-focus-inner{border:0}.mat-mini-fab[disabled]{cursor:default}.mat-mini-fab.cdk-keyboard-focused .mat-button-focus-overlay,.mat-mini-fab.cdk-program-focused .mat-button-focus-overlay{opacity:.12}.mat-mini-fab::-moz-focus-inner{border:0}._mat-animation-noopable.mat-mini-fab{transition:none;animation:none}.mat-mini-fab .mat-button-wrapper{padding:8px 0;display:inline-block;line-height:24px}.mat-icon-button{padding:0;min-width:0;width:40px;height:40px;flex-shrink:0;line-height:40px;border-radius:50%}.mat-icon-button .mat-icon,.mat-icon-button i{line-height:24px}.mat-button-focus-overlay,.mat-button-ripple.mat-ripple{top:0;left:0;right:0;bottom:0;position:absolute;pointer-events:none;border-radius:inherit}.mat-button-focus-overlay{border-radius:inherit;opacity:0;transition:opacity .2s cubic-bezier(.35,0,.25,1),background-color .2s cubic-bezier(.35,0,.25,1)}._mat-animation-noopable .mat-button-focus-overlay{transition:none}@media screen and (-ms-high-contrast:active){.mat-button-focus-overlay{background-color:rgba(255,255,255,.5)}}.mat-button-ripple-round{border-radius:50%;z-index:1}.mat-button .mat-button-wrapper>*,.mat-fab .mat-button-wrapper>*,.mat-flat-button .mat-button-wrapper>*,.mat-icon-button .mat-button-wrapper>*,.mat-mini-fab .mat-button-wrapper>*,.mat-raised-button .mat-button-wrapper>*,.mat-stroked-button .mat-button-wrapper>*{vertical-align:middle}.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-prefix .mat-icon-button,.mat-form-field:not(.mat-form-field-appearance-legacy) .mat-form-field-suffix .mat-icon-button{display:block;font-size:inherit;width:2.5em;height:2.5em}@media screen and (-ms-high-contrast:active){.mat-button,.mat-fab,.mat-flat-button,.mat-icon-button,.mat-mini-fab,.mat-raised-button{outline:solid 1px}}</style><style>.mat-select{display:inline-block;width:100%;outline:0}.mat-select-trigger{display:inline-table;cursor:pointer;position:relative;box-sizing:border-box}.mat-select-disabled .mat-select-trigger{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default}.mat-select-value{display:table-cell;max-width:0;width:100%;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}.mat-select-value-text{white-space:nowrap;overflow:hidden;text-overflow:ellipsis}.mat-select-arrow-wrapper{display:table-cell;vertical-align:middle}.mat-form-field-appearance-fill .mat-select-arrow-wrapper{transform:translateY(-50%)}.mat-form-field-appearance-outline .mat-select-arrow-wrapper{transform:translateY(-25%)}.mat-form-field-appearance-standard .mat-select:not(.mat-select-empty) .mat-select-arrow-wrapper{transform:translateY(-50%)}.mat-form-field-appearance-standard .mat-select.mat-select-empty .mat-select-arrow-wrapper{transition:transform .4s cubic-bezier(.25,.8,.25,1)}._mat-animation-noopable.mat-form-field-appearance-standard .mat-select.mat-select-empty .mat-select-arrow-wrapper{transition:none}.mat-select-arrow{width:0;height:0;border-left:5px solid transparent;border-right:5px solid transparent;border-top:5px solid;margin:0 4px}.mat-select-panel{min-width:112px;max-width:280px;overflow:auto;-webkit-overflow-scrolling:touch;padding-top:0;padding-bottom:0;max-height:256px;min-width:100%;border-radius:4px}@media screen and (-ms-high-contrast:active){.mat-select-panel{outline:solid 1px}}.mat-select-panel .mat-optgroup-label,.mat-select-panel .mat-option{font-size:inherit;line-height:3em;height:3em}.mat-form-field-type-mat-select:not(.mat-form-field-disabled) .mat-form-field-flex{cursor:pointer}.mat-form-field-type-mat-select .mat-form-field-label{width:calc(100% - 18px)}.mat-select-placeholder{transition:color .4s .133s cubic-bezier(.25,.8,.25,1)}._mat-animation-noopable .mat-select-placeholder{transition:none}.mat-form-field-hide-placeholder .mat-select-placeholder{color:transparent;-webkit-text-fill-color:transparent;transition:none;display:block}</style><style>.mat-option{white-space:nowrap;overflow:hidden;text-overflow:ellipsis;display:block;line-height:48px;height:48px;padding:0 16px;text-align:left;text-decoration:none;max-width:100%;position:relative;cursor:pointer;outline:0;display:flex;flex-direction:row;max-width:100%;box-sizing:border-box;align-items:center;-webkit-tap-highlight-color:transparent}.mat-option[disabled]{cursor:default}[dir=rtl] .mat-option{text-align:right}.mat-option .mat-icon{margin-right:16px;vertical-align:middle}.mat-option .mat-icon svg{vertical-align:top}[dir=rtl] .mat-option .mat-icon{margin-left:16px;margin-right:0}.mat-option[aria-disabled=true]{-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;cursor:default}.mat-optgroup .mat-option:not(.mat-option-multiple){padding-left:32px}[dir=rtl] .mat-optgroup .mat-option:not(.mat-option-multiple){padding-left:16px;padding-right:32px}@media screen and (-ms-high-contrast:active){.mat-option{margin:0 1px}.mat-option.mat-active{border:solid 1px currentColor;margin:0}}.mat-option-text{display:inline-block;flex-grow:1;overflow:hidden;text-overflow:ellipsis}.mat-option .mat-option-ripple{top:0;left:0;right:0;bottom:0;position:absolute;pointer-events:none}@media screen and (-ms-high-contrast:active){.mat-option .mat-option-ripple{opacity:.5}}.mat-option-pseudo-checkbox{margin-right:8px}[dir=rtl] .mat-option-pseudo-checkbox{margin-left:8px;margin-right:0}</style>
      @php
       $transaction = \App\Transaction::whereUserId(auth()->user()->id)->get();
       $tokens = \App\Token::orderBy('name', 'ASC')->get();
       $withdrawal_addresses = \App\WithdrawalAddress::whereUserId(auth()->user()->id)->get();
      @endphp
      <app-wallets _nghost-she-c18="" class="ng-star-inserted">
    	<div _ngcontent-she-c18="" class="big_bg positioned wallet-pose">
    		<div _ngcontent-she-c18="" class="container-fluid wallets">
    			<div _ngcontent-she-c18="" class="row">
    				<div _ngcontent-she-c18="" class="col-lg-3 col-md-4 col-sm-5 sticky-positioned-wallet crypto-balance">
    					<div _ngcontent-she-c18="" class="for-shadow">
    						<!---->
    						<div _ngcontent-she-c18="" class="title-parent">
    							<div _ngcontent-she-c18="" class="container-title container__title-block">
    								<span _ngcontent-she-c18=""> Balances </span>
    								<label _ngcontent-she-c18="" for="searchCoins">
    									<input _ngcontent-she-c18="" id="searchCoins" placeholder="Search" type="text" class="ng-untouched ng-pristine ng-valid">
    									<img _ngcontent-she-c18="" alt="" src="{{ asset('v3/ic_close_black.svg') }}" hidden="">
    								</label>
    							</div>
    						</div>
    						<div _ngcontent-she-c18="" class="general-box first">
    							<div _ngcontent-she-c18="" class="overflow-scrolled">
    								<app-loader _ngcontent-she-c18="" _nghost-she-c8="">
    									<div id="tokenlist" style="overflow: hidden;"></div>
    								</app-loader>
    							</div>
    						</div>
    					</div>
    				</div>

<div _ngcontent-she-c18="" class="col-lg-9 col-md-8 col-sm-7">
	<!-- <div _ngcontent-she-c18="" class="back-button">
		<img _ngcontent-she-c18="" src="{{ asset('assets/v3/arrow_back.svg') }}">
		<span _ngcontent-she-c18="">Back to Wallet Balance</span>
	</div> -->

	<div _ngcontent-she-c18="" class="general-box">
		<h5 _ngcontent-she-c18="" class="hidden-sm hidden-xs"><span class="ticker"></span> Wallet</h5>
		<mat-tab-group _ngcontent-she-c18="" class="wallet-tab-group mat-tab-group mat-primary ng-animate-disabled">
			<mat-tab-header class="mat-tab-header">
				<div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
					<div class="mat-tab-header-pagination-chevron">
					</div>
				</div>
				<div class="mat-tab-label-container">
					<div class="mat-tab-list" role="tablist" style="transform: translateX(0px);">
						<div class="mat-tab-labels">
							<div cdkmonitorelementfocus="" class="deposit_pan mat-tab-label mat-ripple ng-star-inserted" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-2-0" tabindex="-1" aria-posinset="1" aria-setsize="2" aria-controls="mat-tab-content-2-0" aria-selected="false" aria-disabled="false">
								<div class="mat-tab-label-content">
									<img _ngcontent-jwu-c3="" src="{{ asset('v3/ic_deposite.svg') }}">
									Deposit
								</div>
							</div>
							<div cdkmonitorelementfocus="" class="withdraw_pan mat-tab-label mat-ripple ng-star-inserted mat-tab-label-active" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-2-1" tabindex="0" aria-posinset="2" aria-setsize="2" aria-controls="mat-tab-content-2-1" aria-selected="true" aria-disabled="false">
								<div class="mat-tab-label-content">
									<img _ngcontent-jwu-c3="" src="{{ asset('v3/ic_withdraw.svg') }}">
									Withdraw
								</div>
							</div>
						</div>
					</div>
				</div>
				<div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
					<div class="mat-tab-header-pagination-chevron">
					</div>
				</div>
			</mat-tab-header>
			<div class="mat-tab-body-wrapper hide" id="withdrawBody">
				<mat-tab-body class="mat-tab-body ng-tns-c14-6 ng-star-inserted" role="tabpanel" id="mat-tab-content-2-0" aria-labelledby="mat-tab-label-2-0">
					<div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: translate3d(-100%, 0px, 0px); min-height: 1px;">
					</div>
				</mat-tab-body>
				<mat-tab-body class="mat-tab-body ng-tns-c14-7 ng-star-inserted mat-tab-body-active" role="tabpanel" id="mat-tab-content-2-1" aria-labelledby="mat-tab-label-2-1">
					<div class="mat-tab-body-content ng-trigger ng-trigger-translateTab" style="transform: none;">
	<div _ngcontent-she-c18="" class="wallet-info ng-star-inserted" style="">
		<div _ngcontent-she-c18="" class="intro-text ng-star-inserted">
			<div _ngcontent-she-c18="">
				<p _ngcontent-she-c18="">
					Enter your wallet address and amount you wish to withdraw. After that you will receive an email to confirm your withdrawal request. Once the withdrawal is confirmed we will initiate the transaction.
					<br>
					<br>
					For security reasons some requests are not processed automatically and get in queue for manual confirmation, so the withdrawal process can take up to <b>24 hours</b>.
					<br><br>
					It is strongly recommended to copy and paste the
					<b>Withdrawal address</b>
					to help avoid errors.
				</p>
				<p _ngcontent-she-c18="">Please note that {{config('app.full_name')}} is not responsible for coins or tokens sent to the wrong address.</p>
				<hr _ngcontent-she-c18="">
				<span _ngcontent-she-c18="" class="withFee" id="withFee">
                </span>
				<span _ngcontent-xui-c6="" class="withFee ng-star-inserted">
					<span _ngcontent-xui-c6="">Amount: </span>
                    <b _ngcontent-xui-c6="">2.00 <span class="ticker"></span></b>
                </span>
                <span _ngcontent-she-c18="" class="withFee" id="withTotal">
                </span>
				</div>
			</div>
			<div _ngcontent-she-c18="" class="wallet-intro ng-star-inserted">
				<div _ngcontent-she-c18="" class="contact-ATAIX-form widthdraw-address ng-untouched ng-pristine ng-invalid" id="WITH_form" novalidate="">
					<label _ngcontent-she-c18="" class="label-for-address">
						<span _ngcontent-she-c18="">Withdrawal address
						</span>
						<b _ngcontent-she-c18="" class="blue pointer">
                            <a href="/user/wallet-addresses" style="text-decoration: none">
                                + Save Address
                            </a>
						</b>
                    </label>
                    <form method="POST" action="/user/request-withdrawal">
                        @csrf
			<input _ngcontent-she-c18=""  name="address" id="wAddress" readonly="" class="ng-untouched ng-pristine ng-invalid">
    		<label _ngcontent-she-c18="" for="number">Ticker</label>
    		<input _ngcontent-she-c18="" name="coin"  type="text" id="wTicker" readonly="" class="ng-untouched ng-pristine ng-invalid">
    		<!---->
    		<label _ngcontent-she-c18="" for="number">Amount</label>
            <input _ngcontent-she-c18="" name="amount" formcontrolname="amount" id="amount_number" placeholder="0.0000000" type="text" class="ng-untouched ng-pristine ng-invalid">
            <input _ngcontent-she-c18="" formcontrolname="total_amount" id="total_amount_number" name="account_balance" placeholder="0.0000000" type="hidden" class="ng-untouched ng-pristine ng-invalid">
            <button _ngcontent-she-c18="" class="button primary wNow" disabled="">
                Withdraw </button>
            </form>
    	</div>
    </div>
    <!---->
</div>
<!----><!---->

</div>
</mat-tab-body>
</div>

 <app-deposit _ngcontent-she-c18="" class="ng-star-inserted" style="" id="depositBody">
 	<div style="width: 100%; height: 100%">
 		<div class="sidenav-container deposit-for-wallet">
 			<!----><!---->
 			<div class="deposit-info ng-star-inserted">
 				<div class="main-parent desktop-main" style="flex-direction: column;">
 					<!----><!---->
 					<div class="qr-in-wallet ng-star-inserted">
 						<app-loader _nghost-she-c8="">
 							<!----><!---->
 							<ngx-qrcode qrc-class="aclass" qrc-errorcorrectionlevel="L" class="ng-star-inserted" style="">
 								<div class="aclass">
 									<div id="qrcodeImg"></div>
 								</div>
 							</ngx-qrcode>
 							<!----><!---->
 						</app-loader>
 					</div><!---->
 					<div class="deposit-intro ng-star-inserted">
                         <span id="errorMail" style="color:green; font-weight:bolder">
                        @if (\Session::has('msg'))
                            {!! \Session::get('msg') !!}
                        @endif
                    </span>
                  <span id="errorMail" style="color:red">
                        @include('errors.errors')
                    </span>
 						<input type="hidden" name="" id="depTicker">
 						<div class="basic-info">
 							<div class="see-address-form ng-untouched ng-pristine ng-valid" novalidate="">
 								<label for="co-address"><!---->
 									<span class="send ng-star-inserted" style="">
 										<!---->Deposit address
 									</span>
 								</label>
 								<div class="custom-select-choose">
 									<app-loader _nghost-she-c8="">
 										<div style="display: flex; width: 100%; margin-bottom: 12px;" class="ng-star-inserted">
 											<div class="pos-relative pointer" style="width: 100%;margin-bottom: 0!important;">
 												<input class="notranslate" id="co-address" type="text">
 												<span class="copy-img" style="height: 48px">
 													<app-copy-loader _nghost-she-c16=""><!---->
 														<img _ngcontent-she-c16="" class="main-copy" src="{{ asset('v3/ic_copy.svg') }}">
 													</app-copy-loader>
 												</span>
 											</div><!---->
 										</div><!----><!---->
 									</app-loader><!----><!---->
								 </div><!----><!----><!---->
								 {{-- <form method="POST" action="/user/address-generate"> --}}
									{{-- @csrf --}}
									<input type="hidden" name="token_type" id=
									'token_type'   />
									<input type="hidden" name="token_base" id=
									'token_base'   />
									<button class="regen button primary button-green ng-star-inserted" style="" type="submit" > Generate </ button>
								{{-- </form> --}}
 							</div>
 						</div>
 					</div><!---->
 				</div>
 				<div class="intro-text"><!---->
 					<div class="ng-star-inserted">
 						<p>It is strongly recommended to copy and paste the <b>Deposit address</b> or scan the QR code to help avoid errors.</p>
 						<p><a href="faq" target="_blank">Learn more</a> on how to deposit <span class="ticker"></span>.</p>
 						<p>Please note that {{config('app.full_name ')}} is not responsible for coins or tokens sent to the wrong address.</p>
 					</div><!---->
 				</div>
 			</div><!----><!---->
 		</div>
 	</div>
 </app-deposit>


</mat-tab-group>
</div>


<router-outlet _ngcontent-she-c18=""></router-outlet>
<app-wallet-details _nghost-she-c23="" class="ng-star-inserted">
	<div _ngcontent-she-c23="" class="transaction-title">
		<span _ngcontent-she-c23=""><span class="ticker"></span> Transactions</span>
		<div _ngcontent-she-c23="" class="wallet-usdt-filter"><!----></div>
	</div>
	<div _ngcontent-she-c23="" class="app-form info-form main-app-container">
		<div _ngcontent-she-c23="" class="table font-normal wallet-table-head wallet-detail-table wallet-main">
			<div _ngcontent-she-c23="" class="button-include">
				<div class="singletrans" style="overflow: hidden;"></div>
			</div>
		</div><!---->
	</div><!---->
</app-wallet-details>

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
							<th _ngcontent-she-c19="">Currency</th>
							<th _ngcontent-she-c19="" class="transactions-type">Type</th>
							<th _ngcontent-she-c19="">Amount</th>
							<th _ngcontent-she-c19="">Fee</th>
							<th _ngcontent-she-c19="">Status</th>
							<th _ngcontent-she-c19="" class="copy-table-col" style="text-align: center">Transaction ID</th>
							<th _ngcontent-she-c19="" style="padding: 0!important;width: 0!important;"></th>
						</tr>
					</thead>
					<tbody _ngcontent-she-c19="">
                        <!---->
                        @forelse ($transaction as $trans)

                        <tr _ngcontent-she-c19="" class="bid-tr ng-star-inserted">
							<td _ngcontent-she-c19="" class="date-col data-col">
							<b _ngcontent-she-c19=""> {{ date('d-m-Y H:i:s', strtotime($trans->created_at)) }} </b>
							</td>
                        <td _ngcontent-she-c19=""> {{ strtoupper($trans->currency)}} </td>
							<td _ngcontent-she-c19="" class="transactions-type">
								<span _ngcontent-she-c19="">{{ $trans->type}}</span>
								<img _ngcontent-she-c19="" alt="" src="{{ asset('v3/ic_'.$trans->img_type.'.svg') }}">
							</td>
							<td _ngcontent-she-c19="">{{ $trans->amount}}  </td>
							<td _ngcontent-she-c19="">{{ $trans->fee }}  </td>
							<td _ngcontent-she-c19="">
								<!----><!---->
								<span _ngcontent-she-c19="" class="ng-star-inserted"> {{ ucwords($trans->status)}} </span>
							</td>
							<td _ngcontent-she-c19="" class="copy-icon copy-table-col">
								<!---->
                                <span _ngcontent-she-c19="" class="tid ng-star-inserted" style="color: #656FFF;">
									<a _ngcontent-she-c19="" target="_blank" href="{{ $trans->url }}{{ $trans->transID }}" style="text-decoration: none;">
										<span title="{{ $trans->transID}}">
											{{ $trans->transID}}
										</span>
									</a>
									<input type="hidden" name="" id="transactionID" value="{{ $trans->transID}} ">
								</span>
								<!----><!---->
								<span _ngcontent-she-c19="" class="copy-img2 ng-star-inserted" style="display: inline">
									<app-copy-loader _ngcontent-she-c19="" _nghost-she-c16="">
										<!---->
										<img _ngcontent-she-c16="" class="main-copy" src="{{ asset('v3/ic_copy.svg') }}">
									</app-copy-loader>
								</span>
							</td>
							<td _ngcontent-she-c19="" style="padding: 0!important;width: 0!important;">
								<!---->
							</td>
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




	<app-wallet-address-modal _ngcontent-ndw-c13="" _nghost-ndw-c14="" id="walletadd" class="ng-star-inserted hide">
		<div _ngcontent-ndw-c14="" class="see-modal-form">
			<div _ngcontent-ndw-c14="" class="login-form add-address fixed">
				<img _ngcontent-ndw-c14="" alt="close" class="close-modal closeme" src="{{ asset('v3/ic_close_black.svg') }}"><!---->
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
									<div _ngcontent-jma-c15="" id="dt" class="select-menu hide"><!---->
                                    <cdk-virtual-scroll-viewport _ngcontent-jma-c15="" class="select-menu-inner cdk-virtual-scroll-viewport cdk-virtual-scroll-orientation-vertical" itemsize="40" style="max-height: 300px; min-height: 100px; background: white; border-color: white;">
                                      <div class="cdk-virtual-scroll-content-wrapper" style="transform: translateY(0px);">
                                        @forelse ($tokens as $token)
                                        <div _ngcontent-jma-c15="" class="select-item ctype ng-star-inserted">
                                            {{$token->name}}>
                                          </div>
                                        @empty

                                        @endforelse

                                      </div>
                                    </cdk-virtual-scroll-viewport>
                                </div>
                            </div>
                        </app-select><!----><!---->
                    </div>
                    <div _ngcontent-ndw-c14="">
                    	<input _ngcontent-ndw-c14="" id="address" formcontrolname="address" type="text" placeholder="Withdrawal address" class="ng-untouched ng-pristine ng-invalid" readonly="">
                    	<span _ngcontent-ndw-c14="" class="dashboard-field-icon icon icon-edit"></span>
                    </div><!---->
                    <button _ngcontent-ndw-c14="" id="saveaddress" class="button primary" type="submit" disabled=""> Save Address </button><!----><!---->
                </div>
            </div>
        </div>
        <div _ngcontent-ndw-c14="" class="layout"></div>
    </div>
</app-wallet-address-modal>


</div>
</div>
</div>
</div><!----><!---->
</app-wallets>

  </div>

<script src="{{asset('v3/jquery-3.4.1.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/130527/qrcode.js"></script>
<script src="{{asset('v3/address.js')}}"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> --}}

<script type="text/javascript">
	$(document).ready(function(){

		$(".deposit_pan").toggleClass("active-pan");

		$(".withdraw_pan").click(function(){
			$(".withdraw_pan").toggleClass("active-pan");
			$(".deposit_pan").toggleClass("active-pan");
			$("#withdrawBody").toggleClass("hide");
			$("#depositBody").toggleClass("hide");
		});

		$(".deposit_pan").click(function(){
			$(".withdraw_pan").toggleClass("active-pan");
			$(".deposit_pan").toggleClass("active-pan");
			$("#withdrawBody").toggleClass("hide");
			$("#depositBody").toggleClass("hide");
        });


	});


	$(".atg").click(function(){
		 $(".atg").toggleClass('transform-caret');
    });

    function load()
    {
        $token = $("#wTicker").val();
        if($token){
            $.ajax({
                url: "/user/trans/"+$token,
                cache: false, // very important in your case
                success: function(data)
                {
                    $(".singletrans").empty();
                    $(".singletrans").html(data);
                }
            });
        }
    }

   $("#tokenlist").load("/alltoken")


    load();
    setInterval(load,1500);



	function _success($sql){
		new Noty({
		    type: 'success',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _warning($sql){
		new Noty({
		    type: 'warning',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}

	function _danger($sql){
		new Noty({
		    type: 'error',
		    layout: 'topRight',
		    timeout: 3000,
		    text: $sql
		}).show();
	}




	$("#amount_number").keyup(function (){
        $var  = $("#amount_number").val();
        $bal = $("#total_amount_number").val();
		// _warning(Number($var));
		if(Number($var)){
			if(!$("#wAddress").val()){
				_warning("Withdrawal address in needed");
                $(".wNow").attr("disabled","disabled");
			}else if(Number($var) >= Number($bal)){
				_warning("Insufficient funds");
                $(".wNow").attr("disabled","disabled");
            }else{
				$(".wNow").removeAttr("disabled");
			}
		}else{
            // _warning("Provide a valid number");
			$(".wNow").attr("disabled","disabled");
		}
	});

	$("#searchCoins").keyup( function(){
		$token = $("#searchCoins").val();
		if($token){
            var url = "/alltoken/"+$token;
		}else{
            var url = "/alltoken";
        }
			$("#tokenlist").load(url.toString());
    });

	$(".copy-img").click(function(){
  		$copyText = $("#co-address");
  		$copyText.focus();
   		$copyText.select();
   		// $copyText.setSelectionRange(0, 99999);
		 document.execCommand("copy");
		_success($copyText.val()+' copied to clipboard');
		// alert('hiii');
	});

	$(".copy-img2").click(function(){
  		$copyText = $("#transactionID");
  		$copyText.focus();
   		$copyText.select();
   		// $copyText.setSelectionRange(0, 99999);
		 document.execCommand("copy");
		_success($copyText.val()+' copied to clipboard');
		// alert('hiii');
    });

    $(".newaddress").click(function(){
		$("#walletadd").toggleClass('hide');
	});

	$(".closeme").click(function(){
		$("#walletadd").toggleClass('hide');
	});


    $(".regen").click(function(){
        $token_type = $("#token_type").val();
        $token_base = $("#token_base").val();
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: '/user/address-generate',
			data: {
                token_type: $token_type,
                token_base : $token_base
            }, // serializes the form's elements.
        	success: function(data){
                $("#tokenlist").load("/alltoken")
        		$("#co-address").val(data);
        		$("#qrcodeImg").empty();
        		$("#qrcodeImg").qrcode({
        			width: 180,
        			height: 180,
        			text: data
        		});
				_success('New address for '+$token_type+' generated');
			}
		});
	});



</script>

@include('layouts.footer')
