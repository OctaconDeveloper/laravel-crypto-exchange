@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Notification Logs</title>
@php
    $notifications = \App\Notification::with('user')->orderBy('id','DESC')->get();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Search Account Log</h1>
    </div>
    <span class="alert ">Enter Email to search account</span>
    <!-- DataTales Example -->
  <div class="card shadow mb-4 col-md-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>UserID</th>
                  <th>Message</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($notifications as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $item->user->wallet_id }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ explode(" ", $item->created_at)[0] }} </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4"> No Record Found </td>
                    </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
@include('layouts.admin.footer')
