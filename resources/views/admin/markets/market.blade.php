@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Market</title>
@php
    $pairs = \App\CoinPair::all();
@endphp
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Search market </h1>
    </div>
    <span class="alert ">Select market ticker</span>
    <!-- DataTales Example -->
              <form class="user" method="POST" action="/checkmarket" enctype="multipart/form-data">
                @csrf
    <div class="row">
        <div class="card shadow mb-4 col-md-12">
        <div class="card-body">
            <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" style="color:red; padding:5px">
                @include('errors.errors')
            </span>
                <div class="form-group col-md-6">
                  <label>Market Ticker</label>
                  <select name="market_ticker" class="form-control">
                    <option value="" selected>Select market ticker-</option>
                        @forelse ($pairs as $item)
                            <option value="{{$item->pair}}">
                                {{$item->pair}}
                            </option>
                        @empty

                        @endforelse
                </select>
                </div>
              <hr/>

          <button class="btn btn-success" name="search">
            <i class="fa fa-search"></i> Search Market
          </button>
        </div>
      </div>
  </form>

  @if ( \Session::has('markets'))

  <div class="card shadow mb-4 col-md-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Ticker</th>
                  <th>Market Type</th>
                  <th>Price</th>
                  <th>Amount</th>
                  <th>Date Created</th>
                </tr>
              </thead>
              <tbody>
                  @forelse (\Session::get('markets') as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->wallet_id}}</td>
                        <td>{{$item->user['email']}}</td>
                        <td>{{$item->pair}}</td>
                        <td>{{strtoupper($item->type)}}</td>
                        <td>{{sprintf("%0.7s",$item->price)}} {{strtolower($item->base_coin)}}</td>
                        <td>{{sprintf("%0.7s",$item->amount)}} {{strtolower($item->target_coin)}}</td>
                        <td>{{explode(" ",$item->created_at)[0]}}</td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="8"> No Record Found</td>
                    </tr>
                  @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      @endif

    </div>
    </div>
    </div>
@include('layouts.admin.footer')
