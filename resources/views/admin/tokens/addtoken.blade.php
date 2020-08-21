@include('layouts.admin.header')
@php
    $url=explode("/",Request::url());
    $type = strtoupper(end($url));
@endphp
<title>{{ config('app.full_name') }} - Add {{ $type }}</title>
<!-- Begin Page Content -->



<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add {{ $type }}</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-10 col-md-10">
        <div class="card-body">

              <form class="user" method="POST" action="/addtoken" enctype="multipart/form-data">
                @csrf
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
                  <label>Token Base</label>
                  <select class="form-control" name="token_base">
                      <option value="" selected>-Select Token Base-</option>
                      <option value="ETH">Ethereum</option>
                      <option value="BTC">Bitcoin</option>
                  </select>
                </div>

                <div class="form-group col-md-6">
                  <input type="hidden" class="form-control"  name="token_type" value="{{strtolower($type)}}">
                  <label>Token Name</label>
                  <input type="text" class="form-control" name="token_name" placeholder="Enter Token Name">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>Token Ticker</label>
                    <input type="text" class="form-control" name="token_ticker" placeholder="Enter Token Ticker">
                </div>
                <div class="form-group col-md-6">
                    <label>Token Address</label>
                     <input type="text" class="form-control" name="token_address" placeholder="Enter Token Address">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label>Token Circulation</label>
                  <input type="text" class="form-control" name="token_circulation" placeholder="Enter Token Circulation">
                  <br/>
                  <label>Official Website</label>
                  <input type="text" class="form-control" name="token_url" placeholder="Enter Token Official Website">
                  <br/>
                  <label>Token WhitePaper</label>
                  <input type="text" class="form-control" name="token_white_paper" placeholder="Enter Token WhitePaper">
                  <br/>
                  <label>Withdrawal Fee</label>
                  <input type="text" class="form-control" name="withdrawal_fee" placeholder="Withdrawal Fee (0.003)">
                  <br/>
                  <label>Token Icon <small>(icon should be 25x25, png,jpg,jpeg,svg)</small></label>
                  <input type="file" class="form-control" name="token_file" />
                </div>
                <div class="form-group col-md-6">
                  <label>Token Description</label>
                  <textarea  class="form-control" name="token_description" placeholder="Enter Token Description" rows="16" style="resize: none"></textarea>
                </div>
            </div>
                <hr>
                <button class="btn btn-primary" name="addtoken">
                  <i class="fa fa-cog"></i> Add {{ $type }}
                </button>
              </form>
        </div>
      </div>




</div>
</div>

@include('layouts.admin.footer')
