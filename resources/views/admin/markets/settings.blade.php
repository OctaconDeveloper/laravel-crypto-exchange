@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Market Settings</title>
@php
    $trade = \App\TradeSetup::first();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> Market trade setup</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="card shadow mb-4 col-md-8">
            <form class="user" method="POST" action="/updatetradefee" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                        @if (\Session::has('msg'))
                            {!! \Session::get('msg') !!}
                        @endif
                    </span>
                    <span id="errorMail" style="color:red; padding:5px">
                        @include('errors.errors')
                    </span>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Trade Fee <small>(in percentage %)</small></label>
                            <input name="trade_fee" class="form-control" type="text" value="{{$trade->trade_fee ?? '' }}" placeholder="Trade Fee  (in %)" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Trade Mode </label>
                            @php
                                switch ($trade->trade_mode){
                                    case "mainnet": $mode = "Live Mode";
                                    break;
                                    case "testnet": $mode = "Test Mode";
                                    break;
                                    default : $mode = "Test Mode";
                                }
                            @endphp
                            <select class="form-control" name="trade_mode">
                                <option value="{{$trade->trade_mode ?? ''}}">{{$mode}}</option>
                                <option value ="mainnet"> Live Mode</option>
                                <option value ="testnet"> Test Mode</option>
                            </select>
                        </div>
                    </div>
                    <hr/>

                    <button class="btn btn-success" name="update">
                        <i class="fa fa-cog"></i> Update Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('layouts.admin.footer')
