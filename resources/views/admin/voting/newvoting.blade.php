@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - New Voting</title>

@php
    $tokens = \App\Token::all();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Voting</h1>
    </div>
    <!-- DataTales Example -->
      <div class="row">
        <div class="card col-md-12">
            <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" style="color:red; padding:5px">
                @include('errors.errors')
            </span>
        </div>
      </div>
      <form class="user" method="POST" action="/addvote" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="card shadow mb-4 col-md-4">
        <div class="card-body">
                <div class="form-group">
                  <label> Token Array </label>
                  <small>Enter token ticker seperated by comma (e.g., BTC,ETH,ETC)</small>
                    <textarea name="tokens" id="tokens" rows="12" style="resize: none" class="form-control" placeholder="Enter Token tickers" ></textarea>
                </div>
        </div>
      </div>

        <div class="card shadow mb-4 col-md-4">
        <div class="card-body">
          <div class="form-group">
            <label>Start Date</label>
            <input type="date" class="form-control" name="start_date" placeholder="Start Date">
          </div>
          <div class="form-group">
            <label>End Date</label>
            <input type="date" class="form-control" name="end_date" placeholder="End Date">
          </div>
          <hr>
          <button class="btn btn-primary" name="add">
            <i class="fa fa-plus"></i> Add Voting
          </button>
      </div>
    </div>
  </form>

    </div>
    </div>
    </div>


@include('layouts.admin.footer')

