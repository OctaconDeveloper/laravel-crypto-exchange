@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Zero Trade Account</title>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Zero trading account </h1>
    </div>
    <!-- DataTales Example -->
              <form class="user" method="POST" action="/checkZeroTrade" enctype="multipart/form-data">
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
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
              <hr/>

          <button class="btn btn-success" name="search">
            <i class="fa fa-search"></i> Search Account
          </button>
        </div>
      </div>
  </form>

  @if ( \Session::has('zeros'))
  <div class="card shadow mb-4 col-md-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Referral Code</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th>Zero Trading</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $item = \Session::get('zeros')
                @endphp
                <tr>
                    <td>{{$item->wallet_id}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->refCode}}</td>
                    <td>{{explode(" ",$item->created_at)[0]}}</td>
                        @php
                            switch($item->tradeStat){
                                case 0: $tradeStat = " <span class='alert alert-warning' style='padding:5px'> Normal Trading </span>";
                                break;
                                case 1: $tradeStat = "<span class='alert alert-success' style='padding:5px'> Zero Trading </span>";
                                break;
                                default : $tradeStat = "<span class='alert alert-warning' style='padding:5px'> Normal Trading </span>";
                            }
                        @endphp
                    <td> {!! $tradeStat !!}</td>
                    <td>
                        @if ($item->tradeStat==0)
                            <a href="/account/zerotrading/{{$item->id}}/1">
                            <span class="btn btn-success">Enable</span>
                            </a>
                        @else
                            <a href="/account/zerotrading/{{$item->id}}/0">
                            <span class="btn btn-danger">Disable</span>
                            </a>
                        @endif
                  </td>
                </tr>
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
