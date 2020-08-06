@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Single Notification</title>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Send Single Notification Message</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-9">
        <div class="card-body">

              <form class="user" method="POST" action="/singlenotification" enctype="">
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
                  <input type="text" class="form-control " name="email" placeholder="Receiver Email address">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="9" style="resize: none;" name="message"></textarea>
                </div>
                <hr>
                <button class="btn btn-primary" name="add">
                  <i class="fa fa-bell"></i> Send Notification
                </button>
              </form>
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
