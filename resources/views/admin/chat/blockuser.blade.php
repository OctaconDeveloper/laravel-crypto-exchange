@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Block Chat User</title>

 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Block/Unblock User Chat </h1>
    </div>
    <!-- DataTales Example -->
    <form class="user" method="POST" action="/getchatuser" enctype="multipart/form-data">
                @csrf
    <div class="row">
        <div class="card shadow mb-4 col-md-12">
        <div class="card-body">
            <span id="errorMail" style="color:green; font-weight:bolder; padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" style="color:red;  padding:5px">
                @include('errors.errors')
            </span>
                <div class="form-group col-md-6">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
              <hr/>

          <button class="btn btn-success" type="submit">
            <i class="fa fa-search"></i> Search Account
          </button>
        </div>
      </div>
  </form>

  @if ( \Session::has('logs'))
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
                    $item = \Session::get('logs')
                @endphp
                @if (!empty($item))
                <tr>
                        <td>{{$item->user->wallet_id}}</td>
                        <td>{{ $item->user->email}}</td>
                        <td> {{$item->user->refCode}} </td>
                        <td>{{ explode(" ", $item->user->created_at)[0] }}</td>
                        @php
                            switch($item->stat){
                            case 0: $gh = " <span class='alert alert-warning'> Not Blocked </span>";
                            break;
                            case 1: $gh = "<span class='alert alert-danger'> Blocked </span>";
                            break;
                            default : $gh = "<span class='alert alert-warning'> Not Blocked </span>";
                        }
                        @endphp
                        <td>{!! $gh !!}</td>
                        <td>
                                @if ($item->stat > 0)
                                    <a href="/chatblock/{{$item->id}}/0">
                                        <span class="btn btn-success">Unblock</span>
                                    </a>
                                @else
                                    <a href="/chatblock/{{$item->id}}/1">
                                        <span class="btn btn-danger">Block</span>
                                    </a>
                                @endif
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="6">No Record Found</td>
                    </tr>
                @endif
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @else

      @endif


    </div>
</div>
</div>

@include('layouts.admin.footer')
