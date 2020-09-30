@extends('layouts.app')
@section('mainbody')
@section('title', $news->title)
<div _ngcontent-xmu-c0="" class="wrapper">
    <!---->
    <router-outlet _ngcontent-xmu-c0=""></router-outlet>
    <app-main class="ng-star-inserted">
        @include('exchange.layout.nav')
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2 text-justify form-group">
                <div class="nav_tabs">
                    <div class="nav_tabs_item">
                        <div class="content_body">
                            <img src="{{$news->image}}" class="content_main_image">
                            <h4>{{$news->title}}</h4>
                            <p>
                                {!! $news->message !!}
                            </p>
                        </div>
                        <div class="pull-left">
                            <a href="/news">All news</a> 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div> 
    </app-main>

    </div>
<style>
    a{
        color: #29a001;
        text-decoration: none;
        background-color: transparent;
    }

    .content_body {
        padding: 0 30px 30px;
    }
    .nav_tabs_item {
        background: #fff;
        padding: 20px 10px 5px;
        min-height: 100px;
    }
    .content_main_image {
        float: left;
        margin-right: 5px;
        max-width: 200px;
        max-height: 100px;
    }
</style>
@endsection

