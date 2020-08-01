@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Account Wallets</title>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Search user account balance</h1>
    </div>
    <span class="alert ">Enter Email to search account</span>
    <!-- DataTales Example -->
              <form class="user" method="POST" action="/searchaccount" enctype="multipart/form-data">
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

          <button type="submit" class="btn btn-success" name="search">
            <i class="fa fa-search"></i> Search User
          </button>
        </div>
      </div>
  </form>

@if ( \Session::has('accounts'))
<div class="card shadow mb-4 col-md-12">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>UserID</th>
              <th>Email Address</th>
              <th>Coin</th>
              <th>Balance</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>#</th>
              <th>UserID</th>
              <th>Email Address</th>
              <th>Coin</th>
              <th>Balance</th>
            </tr>
          </tfoot>
          <tbody>
            @forelse (\Session::get('accounts') as $key => $item)
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->user['wallet_id']}}</td>
                    <td>{{$item->user['email']}}</td>
                    <td>{{strtoupper($item->ticker)}}</td>
                    <td>{{sprintf("%0.7f",$item->amount)}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5`">
                        No Record Found
                    </td>
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
