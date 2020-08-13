@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Market Settings</title>
@php
    $trade = \App\TradeSetup::first();
    $markers = \App\MarketMaker::with('token')->get();
    $logs = \App\CoinPair::all();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> Market trade setup</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="card shadow mb-4 col-md-4">
            <form class="user" method="POST" action="/updatetradefee" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                        @if (\Session::has('msg'))
                            {!! \Session::get('msg') !!}
                        @endif
                    </span>
                    <span id="errorMail" style="color:red; padding:5px">
                        @include('errors.errors')
                    </span>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label>Trade Fee <br/><small>(in percentage %)</small></label>
                            <input name="trade_fee" class="form-control" type="text" value="{{$trade->trade_fee ?? '' }}" placeholder="Trade Fee  (in %)" />
                        </div>
                        <div class="form-group col-md-6">
                            <label>Trade Mode <br/> <small>Live or Test</small></label>
                            @php
                                switch ($trade->trade_mode){
                                    case "mainnet": $mode = "Live Mode";
                                    break;
                                    case "testnet": $mode = "Test Mode";
                                    break;
                                    default : $mode = "Test Mode";
                                }
                            @endphp
                            <select class="form-control" name="trade_mode">
                                <option value="{{$trade->trade_mode ?? ''}}">{{$mode}}</option>
                                <option value ="mainnet"> Live Mode</option>
                                <option value ="testnet"> Test Mode</option>
                            </select>
                        </div>
                    </div>
                    <hr/>

                    <button class="btn btn-success" name="update">
                        <i class="fa fa-cog"></i> Update Settings
                    </button>
                </div>
            </form>
        </div>

        <div class="card shadow mb-4 col-md-8 ">

            <button class="add btn btn-sm btn-primary mb-2 mt-2"  data-toggle="modal" data-backdrop="false" data-target="#addModal">
                <i class="fa fa-plus"></i> Add Maker
            </button>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Trade Pair</th>
                      <th>Maximum Volume per Trade</th>
                      <th>Updated At</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Trade Pair</th>
                        <th>Maximum Volume per Trade</th>
                        <th>Updated At</th>
                        <th></th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @forelse ($markers as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$item->token['pair']}}
                            </td>
                            <td>
                                {{$item->maximum_volume}}
                            </td>
                            <td>
                                {{explode(" ",$item->updated_at)[0]}}
                            </td>
                            <td>
                                <a href="/deletemark/{{$item->id}}">
                                    <i title="Delete {{$item->token['pair']}}" class="fa fa-trash red"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                    		<td colspan="5">
                    			No Data Available
                    		</td>
                    	</tr>
                    @endforelse
                  </tbody>
                </table>
              </div>
        </div>
    </div>

          {{-- Add Modal --}}
<div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Add Maker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Select Pair</label>
                    <select class="form-control"  id="pair_type">
                        <option value="" selected>-Select Coin Pair-</option>
                        @forelse ($logs as $item)
                        <option value="{{$item->id}}">{{$item->pair}}</option>
                        @empty

                        @endforelse
                    </select>
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control"  id="max_volume" placeholder="Maximum Trade Volume per Trade" />
                  </div>
                  <div class="form-group">
                      <button type="button" id="sendAdd" class="btn btn-md btn-success">
                          <i class="fa fa-plus"></i> Add Maker
                      </button>
                  </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Add Modal  --}}

</div>
</div>

@include('layouts.admin.footer')
<script>
     $("#sendAdd").click(function(){
    $max_volume = $("#max_volume").val();
    $pair_type = $("#pair_type").children("option:selected"). val();
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '/addmaker',
        data: {
            pair : $pair_type,
            max_volume: $max_volume
        }, // serializes the form's elements.
        success: function(){
            window.location.href = '/block/markets/settings';
        }
    });
});
</script>
