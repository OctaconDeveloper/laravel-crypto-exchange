@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Add Stakes</title>
@php
    $tokens = \App\Token::all();
@endphp
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add token to staking list</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-10">
        <div class="card-body">

              <form class="user" method="POST" action="/savestake" enctype="">
                @csrf
                <span id="errorMail" style="color:green; font-weight:bolder; padding:5px">
                    @if (\Session::has('msg'))
                        {!! \Session::get('msg') !!}
                    @endif
                </span>
                <span id="errorMail" style="color:red;  padding:5px">
                    @include('errors.errors')
                </span>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Token</label>
                        <select name="token" class="form-control"  >
                            <option value="" selected>-Select Token-</option>
                            @forelse ($tokens as $item)
                        <option value="{{$item->id}}">
                                {{ ucwords($item->name)}} {{ strtoupper($item->ticker) }}
                            </option>
                            @empty

                            @endforelse
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Minimum Deposit</label>
                        <input type="text" class="form-control" name="minimum_deposit" placeholder="Minimum Deposit">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Minimum Annual ROI (%)</label>
                        <input type="text" class="form-control" name="minimum_annual" placeholder="Minimum Annual ROI (%)">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Maximum Annual ROI (%)</label>
                        <input type="text" class="form-control" name="maximum_annual" placeholder="Maximum Annual ROI (%)">
                    </div>
                </div>
                <dv class="row">
                    <div class="form-group col-md-6">
                        <label>Duration</label>
                        <select class="form-control" name="duration">
                            <option value="7">7 days</option>
                            <option value="15">15 days</option>
                            <option value="30">30 days</option>
                            <option value="60">60 days</option>
                            <option value="90">90 days</option>
                            <option value="120">120 days</option>
                            <option value="365">365 days</option>
                        </select>
                    </div>
                    <div class="form-group  col-md-6">
                        <label>Keywords</label>
                        <small>Seperate multiple keyword with comma (,)</small>
                        <textarea class="form-control" name="keywords" placeholder="Keywords (eg., initial staking, ICO, etc)" rows="4" style="resize: none"></textarea>
                    </div>
                </dv>
                <hr>
                <button class="btn btn-primary" name="update">
                  <i class="fa fa-list"></i> Add to Staking List
                </button>
              </form>
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
