@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Broadcast Notifications</title>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Send Broadcast Notification</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-9">
        <div class="card-body">

              <form class="user" method="POST" action="/broadcastnotification" enctype="multipart/form-data">
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
                    <label>Title</label>
                  <input class="form-control" placeholder="Enter Title"name="broadcast_title" />
                </div>
                <div class="form-group">
                    <label>Image</label>
                  <input type="file" class="form-control" name="broadcast_image"/>
                </div>
                <div class="form-group">
                    <label>Message</label>
                  <textarea class="form-control" placeholder="Enter Message" rows="12" style="resize: none;" name="broadcast_message"></textarea>
                </div>
                <hr>
                <button class="btn btn-primary" name="add">
                  <i class="fa fa-bell"></i> Push Broadcast
                </button>
              </form>
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
