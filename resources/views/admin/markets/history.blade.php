@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Market History</title>
@php
    $logs = \App\TradeLog::with('user')->get();
@endphp
<style>
    .green{
        color:green;
    }
    .red{
        color:red;
    }
    .blue{
        color:blueviolet;
    }
</style>
  <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">View market history</h1>
        </div>
        <!-- DataTales Example -->
          <div class="card shadow mb-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Email</th>
                      <th>Pair</th>
                      <th>Type</th>
                      <th>Price</th>
                      <th>Quantity</th>
                      <th>Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Email</th>
                        <th>Pair</th>
                        <th>Type</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Amount</th>
                        <th>Date</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @forelse ($logs as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$item->user['email']}}
                            </td>

                            <td>
                                {{$item->coin_pair}}
                            </td>
                            <td>
                                {{ucfirst(strtolower($item->type))}}
                            </td>
                            <td>
                                {{ sprintf("%0.7f",$item->price).' '. explode("/", strtolower($item->coin_pair))[1]}}
                            </td>
                            <td>
                                {{ sprintf("%0.7f",$item->quantity).' '. explode("/", strtolower($item->coin_pair))[0]}}
                            </td>
                            <td>
                                {{ sprintf("%0.7f",$item->amount).' '. explode("/", strtolower($item->coin_pair))[1]}}
                            </td>
                            <td>
                                {{explode(" ", $item->created_at)[0]}}
                            </td>
                    </tr>

                    @empty
                        <tr>
                    		<td colspan="8">
                    			No Data Available
                    		</td>
                    	</tr>
                    @endforelse
                  	{{-- if(!empty($coin_pair->all())){
                  		$sn=1;
                  		foreach ($coin_pair->all() as $logs) {
                            switch($logs['stat']){
                                case 0: $gh = " ";
                                break;
                                case 1: $gh = "<i class='fa fa-check green'></i>";
                                break;
                                default : $gh = "";
                              }
                 --}}

                  </tbody>
                </table>
              </div>
            </div>
          </div>

		</div>
		</div>
@include('layouts.admin.footer')
