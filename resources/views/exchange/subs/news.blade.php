@extends('layouts.app')
@section('mainbody')
@section('title', 'News')
@php
    use \App\Http\Controllers\Web\NotificationController;
    $logs = (new NotificationController())->fetchBroadcast();
@endphp 
<div _ngcontent-xmu-c0="" class="wrapper">
    <!---->
    <router-outlet _ngcontent-xmu-c0=""></router-outlet>
    <app-main class="ng-star-inserted">
        @include('exchange.layout.nav')
        @forelse ($logs as $log)
        <div class="form-group">
            <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="row">
                        <div class="col-xs-3">
                            <a href="/news/{{str_replace(" ", "-", strtolower($log->title))}}">
                                <div class="content_all_images">
                                    <img src="{{$log->image}}">
                                </div>
                            </a>
                        </div>
                        <div class="col-xs-9">
                            <div class="row">
                                <div class="col-xs-12">
                                    <span class="pull-right">{{ date('M d, Y ', strtotime($log->created_at)) }}</span>
                                    <a href="/news/{{str_replace(" ", "-", strtolower($log->title))}}"><h4>{{$log->title}}</h4></a>
                                </div>
                                <div class="col-xs-12">
                                    {!! $log->message !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            
        @empty
            
        @endforelse
    </app-main>

    </div>

@endsection