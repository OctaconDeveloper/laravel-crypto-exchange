@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Withdrawals</title>
@php
    $withdrawals = \App\WithdrawRequest::with(['trans_type','user'])->orderBy('status','ASC')->get();
@endphp
  <!-- Begin Page Content -->
  <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">View withdrawal requests</h1>
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
                  {{-- <th>Wallet Balance</th> --}}
                  <th>Amount</th>
                  <th>Fee</th>
                  {{-- <th>Address</th> --}}
                  <th>Status</th>
                  <th colspan="2"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>UserID</th>
                    <th>Email Address</th>
                    {{-- <th>Wallet Balance</th> --}}
                    <th>Amount</th>
                    <th>Fee</th>
                    {{-- <th>Address</th> --}}
                    <th>Status</th>
                    <th colspan="2"></th>
              </tfoot>
              <tbody>
                @forelse ($withdrawals as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->user['wallet_id']}}</td>
                        <td>{{$item->user['email']}}</td>
                        {{-- <td>{{\App\Wallet::whereUserId($item->user_id)->whereTicker($item->ticker)->first()->amount}} {{strtolower($item->ticker)}}</td> --}}
                        <td>{{$item->withdraw_amount}} {{strtolower($item->ticker)}}</td>
                        <td>{{$item->withdraw_fee}} {{strtolower($item->ticker)}}</td>
                        {{-- <td>{{$item->withdraw_address}}</td> --}}
                        <td>{{$item->trans_type['name']}}</td>
                        <td>
                            @if ($item->status > 1)
                                <button style="cursor:not-allowed" disabled class="btn btn-danger btn-sm">
                                    <i title="Reject Transaction" class="fa fa-thumbs-down"></i>
                                </button>
                            @else
                                <a href="/withdrawaction/{{$item->id}}/5" class="btn btn-danger btn-sm">
                                    <i title="Reject Transaction" class="fa fa-thumbs-down"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if ($item->status > 1)
                                <button style="cursor:not-allowed" disabled class="btn btn-success btn-sm">
                                    <i title="Approve Transaction" class="fa fa-thumbs-up"></i>
                                </button>
                            @else
                                <a href="/withdrawaction/{{$item->id}}/2" class="btn btn-success btn-sm">
                                    <i title="Approve Transaction" class="fa fa-thumbs-up"></i>
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
