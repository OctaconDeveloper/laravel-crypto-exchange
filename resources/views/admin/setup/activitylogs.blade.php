@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Activity Logs</title>

@php
    $logs = \App\Log::with('user')->orderBy('id','DESC')->get();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Activity Logs</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ClientID</th>
                  <th>Activity</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Activity</th>
                  <th>Date</th>
                </tr>
              </tfoot>
              <tbody>
                 @forelse ($logs as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $item->user->email}}</td>
                        <td>{{ ucfirst($item->log) }}</td>
                        <td>{{ explode(" ", $item->created_at)[0] }}</td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">
                            No Data Available
                        </td>
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
