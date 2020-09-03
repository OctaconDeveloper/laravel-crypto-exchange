<div class="col-lg-9 col-lg-offset-3 col-md-8 col-md-offset-4 col-sm-12 col-xs-12 tab-space">
    <mat-tab-group class="mat-tab-group mat-primary ng-animate-disabled">
        <mat-tab-header class="mat-tab-header">
            <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-before mat-elevation-z4 mat-ripple mat-tab-header-pagination-disabled" mat-ripple="">
                <div class="mat-tab-header-pagination-chevron"></div>
            </div>
            <div class="mat-tab-label-container">
                <div class="mat-tab-list" role="tablist" style="transform: translateX(0px);">
                    <div class="mat-tab-labels"><!---->
                        <div cdkmonitorelementfocus="" class="dalltrans mat-tab-label mat-ripple ng-star-inserted mat-tab-label-active" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-10-0" tabindex="0" aria-posinset="1" aria-setsize="2" aria-controls="mat-tab-content-10-0" aria-selected="true" aria-disabled="false">
                            <div class="mat-tab-label-content toke" data-id="alltrans">
                                Market history
                            </div>
                        </div>
                        <div cdkmonitorelementfocus="" class="dmytrans mat-tab-label mat-ripple ng-star-inserted" mat-ripple="" mattablabelwrapper="" role="tab" id="mat-tab-label-10-1" tabindex="-1" aria-posinset="2" aria-setsize="2" aria-controls="mat-tab-content-10-1" aria-selected="false" aria-disabled="false">
                            <div class="mat-tab-label-content toke" data-id="mytrans">
                                My trading history
                            </div>
                        </div>
                    </div>
                    <mat-ink-bar class="mat-ink-bar alltrans" style="visibility: visible; left: 0px; width: 171px;"></mat-ink-bar>
                    <mat-ink-bar class="mat-ink-bar mytrans" style="visibility: visible; left: 172px; width: 171px; display: none;"></mat-ink-bar>
                </div>
            </div>
            <div aria-hidden="true" class="mat-tab-header-pagination mat-tab-header-pagination-after mat-elevation-z4 mat-ripple" mat-ripple="">
                <div class="mat-tab-header-pagination-chevron"></div>
            </div>
        </mat-tab-header>
        <input type="hidden" id="target_coin" value="{{ $ticker->target_id}}">
        <input type="hidden" id="base_coin" value="{{ $ticker->base_id}}">
        <input type="hidden" id="pair_coin" value="{{ $ticker->pair}}">
        <div style="height:350px;">
            <div id="alltrans">
                <div class="Load_overlay" align="center" >
                    <img src="{{ asset('img/loader.gif') }}" width="400px" height="350px" alt="Loading" />
               </div>
            </div>
            <div id="mytrans" style="display: none;">
            </div>
        </div>
    </mat-tab-group>
</div>

<script src="{{ asset('v3/jquery-3.4.1.min.js') }}"></script>
<script>

    $(".toke").click(function(){
        $clax = $(this).data('id');
        $(".alltrans").hide();
        $(".mytrans").hide();
        $("."+$clax).show();

        $(".dalltrans").toggleClass('mat-tab-label-active');
        $(".dmytrans").toggleClass('mat-tab-label-active');

        $("#alltrans").hide();
        $("#mytrans").hide();
        $("#"+$clax).show();
    });

    $("#alltrans").load('/orderlog/general/'+$url);
    $("#mytrans").load('/orderlog/single/'+$url);

    setInterval(function(){
        $("#alltrans").load('/orderlog/general/'+$url);
        $("#mytrans").load('/orderlog/single/'+$url);
    }, 2000);


    $(window).bind('hashchange', function(){
        $hash = window.location.hash.slice(1);
        $url = window.location.href.substring(window.location.href.lastIndexOf('/') +1);
        // alert('changed');

        $("#alltrans").load('/orderlog/general/'+$url);
        $("#mytrans").load('/orderlog/single/'+$url);

        setInterval(function(){
        $("#alltrans").load('/orderlog/general/'+$url);
        $("#mytrans").load('/orderlog/single/'+$url);
        }, 2000);
    });

</script>
