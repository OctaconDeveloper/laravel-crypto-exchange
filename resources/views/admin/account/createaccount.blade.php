@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Create New User</title>
@php
    $userTypes = \App\UserType::all();
@endphp
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Create new account</h1>
    </div>
    <span class="alert ">Account creation details shall be sent to registered mail</span>
    <!-- DataTales Example -->
              <form class="user"  method="POST" action="/newuser" enctype="multipart/form-data">
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
                      <option>-Select Account Type-</option>
                      @forelse ($userTypes as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @empty

                      @endforelse
                  </select>
                </div>
                <hr/>

          <button class="btn btn-primary" name="add">
            <i class="fa fa-plus"></i> Add User
          </button>
        </div>
      </div>
  </form>

    </div>
    </div>
    </div>

@include('layouts.admin.footer')
