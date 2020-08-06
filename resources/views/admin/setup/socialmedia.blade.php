@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Social Media Settings</title>
@php
    $handles = \App\SocialMedia::first();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Social Media Handle </h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-10">
        <div class="card-body">

              <form class="user" method="POST" action="/savemedia" enctype="">
                  @csrf
                <span id="errorMail" style="color:green; font-weight:bolder; padding:5px">
                    @if (\Session::has('msg'))
                        {!! \Session::get('msg') !!}
                    @endif
                </span>
                <span id="errorMail" style="color:red;  padding:5px">
                    @include('errors.errors')
                </span>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Facebook Handle</label>
                        <input type="text" class="form-control form-control-user"  name="facebook_handle" value="{{ $handles->facebook_handle }}"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Twitter Handle</label>
                        <input type="text" class="form-control form-control-user" name="twitter_handle" value="{{ $handles->twitter_handle }}" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Instagram Handle</label>
                        <input type="text" class="form-control form-control-user" name="instagram_handle" value="{{ $handles->instagram_handle }}" >
                    </div>
                    <div class="form-group col-md-6">
                        <label>Discord Handle</label>
                        <input type="text" class="form-control form-control-user" name="discord_handle" value="{{ $handles->discord_handle }}" >
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary" name="update">
                  <i class="fa fa-cog"></i> Update Social Media handles
                </button>
              </form>
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
