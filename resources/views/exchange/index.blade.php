@extends('layouts.app')
@section('mainbody')
@section('title', $ticker->pair.' Market')
    <div _ngcontent-xmu-c0="" class="wrapper">
        <!---->
        <router-outlet _ngcontent-xmu-c0=""></router-outlet>
        <app-main class="ng-star-inserted"> 
            @include('exchange.layout.nav')

            <div class="main-exchange">
                <div class="container-fluid">
                    <div class="row">
                        @include('exchange.layout.buy_and_sell',['ticker' => $ticker])
                        @include('exchange.layout.chart_graph',['ticker' => $ticker])
                        @include('exchange.layout.chat')
                        @include('exchange.layout.order_log',['ticker' => $ticker])
                        @include('exchange.layout.history_log',['ticker' => $ticker]) 
                        @include('exchange.layout.news')
                    </div>
                </div>
                <div class="sidenav-overlay"></div>
            </div>
        </app-main>
    </div> 
    @endsection
    {{-- <script type="text/javascript">
        window.history.pushState(null, null, "/exchange/{{$ticker->pair}}");
    </script> --}}

