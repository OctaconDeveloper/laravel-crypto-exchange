@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Create New User</title>
@php
     $userTypes = \App\UserType::whereName('Admin')->orWhere('name','Chat Admin')->get();
@endphp
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create new admin account</h1>
    </div>
    <span class="alert ">Account creation details shall be sent to registered mail</span>
    <!-- DataTales Example -->
              <form class="user"  method="POST" action="/newadmin" enctype="multipart/form-data">
                @csrf
    <div class="row">
        <div class="card shadow mb-4 col-md-6">
            <span id="errorMail" style="color:green; font-weight:bolder; padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" style="color:red;  padding:5px">
                @include('errors.errors')
            </span>
        <div class="card-body">
                <div class="form-group">
                  <label>Email Address</label>
                  <input type="email" class="form-control" name="email" placeholder="Email Address">
                </div>
                <div class="form-group">
                  <label>Account Type</label>
                  <select name="account_type" class="form-control" >
                    @forelse ($userTypes as $userType)
                      <option value="{{$userType->id}}">{{$userType->name}}</option>
                    @empty

                    @endforelse
                  </select>
                </div>
                <hr/>

          <button class="btn btn-primary" name="add">
            <i class="fa fa-plus"></i> Add Admin
          </button>
        </div>
      </div>
  </form>

    </div>
    </div>
    </div>

@include('layouts.admin.footer')
