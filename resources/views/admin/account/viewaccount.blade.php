@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Account Lists</title>
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">View all users</h1>
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
                  <th>Referral Code</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th>KYC Status</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Account Type</th>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Referral Code</th>
                  <th>Date Created</th>
                  <th>Status</th>
                  <th>KYC Status</th>
                </tr>
              </tfoot>
              <tbody>
                @forelse ($accounts as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->user_type['name']}}</td>
                        <td>{{$item->wallet_id}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->refCode}}</td>
                        <td>{{ explode(" ",$item->created_at)[0]}}</td>
                        @php
                             switch($item->is_active){
                                case 0: $staus = " Inactive";
                                break;
                                case 1: $staus = "Active";
                                break;
                                case 2: $staus = "Blocked";
                                break;
                                default : $staus = "Inactive";
                            }
                            switch($item->kyc['stat']){
                                case 0: $kyc = "<span class='btn btn-sm btn-warning'>Incomplete</span>";
                                break;
                                case 1: $kyc = "<span class='btn btn-sm btn-primary'>Complete</span>";
                                break;
                                case 2: $kyc = "<span class='btn btn-sm btn-success'>Verified</span>";
                                break;
                                default : $kyc = "<span class='btn btn-sm btn-danger'>Pending</span>";
                            }
                        @endphp

                        <td> {{$staus}} </td>
                        <td>
                            {!! $kyc !!}
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
