@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Verified Accounts</title>
@php
    $kyc = \App\CustomerVerification::with('user')->whereStat(2)->orderBy('created_at','ASC')->get();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Verified Accounts</h1>
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
                  <th>Surname</th>
                  <th>Othername(s)</th>
                  <th>Email Address</th>
                  <th>Phone Number </th>
                  <th>Date verified</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>ClientID</th>
                  <th>Surname</th>
                  <th>Othername(s)</th>
                  <th>Email Address</th>
                  <th>Phone Number </th>
                  <th>Date verified</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                @forelse ($kyc as $key => $item)

                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$item->user['wallet_id']}}</td>
                  <td>{{ strtoupper($item->surname) }}</td>
                  <td>{{ ucwords($item->othernames) }}</td>
                  <td>{{$item->user['email']}}</td>
                  <td>{{ $item->phone }}</td>
                  <td> {{ explode(" ", $item->updated_at)[0]}}</td>
                  <td><button class="btn btn-success viewKyc" data-id="{{$item->id}}"><i class="fa fa-eye"></i></button></td>
                </tr>
                @empty
                    <tr>
                        <td colspan="8"> No Record Found </td>
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
<script type="text/javascript">
    $(document).on('click','.viewKyc', function(){
      $kycID = $(this).data('id');
      window.location.href = '/block/kyc/viewkyc/'+$kycID;
    });

  </script>
