@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Account Lists</title>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">View all admin</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Account Type</th>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Account Type</th>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                @forelse ($accounts as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->user_type['name']}}</td>
                        <td>{{$item->wallet_id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{ explode(" ",$item->created_at)[0]}}</td>
                        @php
                             switch($item->is_active){
                                    case 1: $blockStat = " <span class='alert alert-success' style='padding:5px'> Active </span>";
                                    break;
                                    case 2: $blockStat = "<span class='alert alert-danger' style='padding:5px'> Blocked </span>";
                                    break;
                                    default : $blockStat = "<span class='alert alert-warning' style='padding:5px'> Inactive </span>";
                                }
                        @endphp

                        <td> {!! $blockStat !!} </td>
                        <td>
                            @if ($item->is_active==2)
                            <a href="/admin/blocked/{{$item->id}}/open">
                                <span class="btn btn-success">Unblock</span>
                                </a>
                            @else
                                <a href="/admin/blocked/{{$item->id}}/close">
                                <span class="btn btn-danger">Block</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">
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
