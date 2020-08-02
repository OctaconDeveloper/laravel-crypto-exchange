@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Deposits</title>
@php
    $withdrawals = \App\WalletDeposit::with(['trans_type','user'])->orderBy('status','ASC')->get();
@endphp
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">View deposits</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>UserID</th>
                  <th>Email Address</th>
                  <th>Amount</th>
                  <th>Coin</th>
                  <th>Status</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>UserID</th>
                    <th>Email Address</th>
                    <th>Amount</th>
                    <th>Coin</th>
                    <th>Status</th>
                    <th>Date</th>
              </tfoot>
              <tbody>
                @forelse ($withdrawals as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->user['wallet_id']}}</td>
                        <td>{{$item->user['email']}}</td>
                        <td>{{$item->amount}} {{strtolower($item->ticker)}}</td>
                        <td>{{$item->ticker}}</td>
                        <td>{{$item->trans_type['name']}}</td>
                        <td>{{explode(" ", $item->created_at)[0]}}</td>
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
