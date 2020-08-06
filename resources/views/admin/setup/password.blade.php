@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Password Settings</title>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Change Password</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-4">
        <div class="card-body">

              <form class="user" method="POST" action="/password-reset" enctype="">
                @csrf
                <span id="errorMail" style="color:green; font-weight:bolder; padding:5px">
                    @if (\Session::has('msg'))
                        {!! \Session::get('msg') !!}
                    @endif
                </span>
                <span id="errorMail" style="color:red;  padding:5px">
                    @include('errors.errors')
                </span>

                <div class="form-group">
                  <input type="text" class="form-control"  id="exampleInputEmail" value="{{ auth()->user()->email }}" disabled >
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password" placeholder="New Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                </div>
                <hr>
                <button class="btn btn-primary" name="update">
                  <i class="fa fa-cog"></i> Update Password
                </button>
              </form>
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
