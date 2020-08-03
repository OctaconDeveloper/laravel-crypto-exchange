@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - KYC Details</title>
@php
    $url=explode("/",Request::url());
    $id = strtoupper(end($url));
    $log = \App\CustomerVerification::with('user')->whereId($id)->first();
@endphp

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">KYC Details for {{$log->user['email']}}</h1>
    </div>
    <!-- DataTales Example -->
  <div class="row">
      <div class="card shadow mb-7 col-md-7">
          <div class="card-header">
            <h4>Bio Data</h4>
          </div>
        <div class="card-body">
              <form class="user" method="post" enctype="">
                  @csrf
                <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                    @if (\Session::has('msg'))
                        {!! \Session::get('msg') !!}
                    @endif
                </span>
                <span id="errorMail" style="color:red; padding:5px">
                    @include('errors.errors')
                </span>

                <div class="form-group">
                  <label>Surname</label>
                  <input type="text" class="form-control form-control-user"  id="exampleInputEmail" value="{{strtoupper($log->surname) }}" disabled >
                </div>
                <div class="form-group">
                  <label>Othername(s)</label>
                  <input type="type" class="form-control form-control-user"  value="{{ ucwords($log->othernames) }}" disabled >
                </div>
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="type" class="form-control form-control-user"  value="{{ $log->user['email']}}" disabled >
                </div>
                <div class="form-group">
                  <label>Phone Number</label>
                  <input type="type" class="form-control form-control-user"  value="{{ $log->phone}}" disabled >
                </div>
                <div class="form-group">
                  <label>Date of Submission</label>
                  <input type="type" class="form-control form-control-user"  value="{{ explode(" ", $log->created_at)[0] }}" disabled >
                </div>
              </form>
        </div>
      </div>

        <div class="card shadow mb-4 col-md-3 ml-2">
          <div class="card-header">
            <h4>Identification</h4>
          </div>
        <div class="card-body">
              <form class="user" method="post" enctype="">

                <div class="form-group">
                  <label>Passport</label>
                  <img src="{{ $log->passport }}"  width="150px" height="150px" />
                </div>
                <div class="form-group">
                  <label>ID Card</label>
                  <br/>
                  <img src="{{ $log->idcard}}" width="150px" height="150px" />
                </div>
                <div class="form-group">
                  <label>Residential</label>
                  <br/>
                  <img src="{{ $log->residence}}" width="150px" height="150px" />
                </div>
                @if ($log->stat > 1)
                    <div class="form-group">
                        <label>Status</label>
                        <input type="type" class="form-control form-control-user"  value="Verified" disabled >
                    </div>
                @else
                    <div class="form-group">
                        <label>Status</label>
                        <input type="type" class="form-control form-control-user"  value="Not Verified" disabled >
                    </div>
                @endif
              </form>
        </div>
      </div>
    </div>

    </div>
    </div>

@include('layouts.admin.footer')
