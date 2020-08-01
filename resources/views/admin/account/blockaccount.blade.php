@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Blocked Account</title>

  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Search account to block</h1>
    </div>
    <span class="alert ">Enter Email to search account</span>
    <!-- DataTales Example -->
    <form class="user" method="POST" action="/checkBlocked" enctype="multipart/form-data">
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



  @if ( \Session::has('blocked'))
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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @php
                    $item = \Session::get('blocked')
                @endphp
                    <tr>
                        <td>{{$item->wallet_id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->refCode}}</td>
                        <td>{{explode(" ",$item->created_at)[0]}}</td>
                            @php
                                switch($item->is_active){
                                    case 1: $blockStat = " <span class='alert alert-success' style='padding:5px'> Active </span>";
                                    break;
                                    case 2: $blockStat = "<span class='alert alert-danger' style='padding:5px'> Blocked </span>";
                                    break;
                                    default : $blockStat = "<span class='alert alert-warning' style='padding:5px'> Inactive </span>";
                                }
                            @endphp
                        <td> {!! $blockStat !!}</td>
                        <td>
                            @if ($item->is_active==2)
                            <a href="/account/blocked/{{$item->id}}/open">
                                <span class="btn btn-success">Unblock</span>
                                </a>
                            @else
                                <a href="/account/blocked/{{$item->id}}/close">
                                <span class="btn btn-danger">Block</span>
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
