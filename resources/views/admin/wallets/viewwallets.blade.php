@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - View Exchange Wallets</title>

@php
    $trade_mode = \App\TradeSetup::first()->trade_mode;

    $wallets = \App\SystemWallet::whereStatus(1)->get();
    $network = \App\TradeSetup::first()->trade_mode;
    $tokens = \App\Token::all();

    function mainnet($address) 
    {

        $ethWallet = \App\SystemWallet::whereStatus(1)->whereTicker('ETH')->first();
        return 'https://etherscan.io/token/'.$address.'?a='.$ethWallet->address;
    } 
    function testnet($address)
    {
        $ethWallet = \App\SystemWallet::whereStatus(1)->whereTicker('ETH')->first();
        return 'https://kovan.etherscan.io/token/'.$address.'?a='.$ethWallet->address;
    }
    
@endphp
  <!-- Begin Page Content -->
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">View exchange wallets</h1>
    </div>
   
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <div class="m-3" style="font-weight:bold">
                NETWORK :
                @if ($network === 'mainnet')
                  <span class="p-2 " style="font-weight: bolder; color:white; background:green"> {{$network}}</span>
                @else
                  <span class="p-2 " style="font-weight: bolder; color:white; background:red"> {{$network}}</span>
                @endif
            </div>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Coin</th>
                  <th>Address</th>
                  <th>Balance</th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>Coin</th>
                    <th>Contract Address</th>
                    <th>Wallet Balance</th>
                    <th></th>
              </tfoot>
              <tbody>
                @forelse ($tokens as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->ticker}}</td>
                        <td>{{$item->address}}</td>
                            <td>{{$item->balance}} </td>
                        <td>

                            @if($item->ticker === 'BTC' || $item->ticker === 'ETH')
                                @php
                                    $data = \App\SystemWallet::whereTicker($item->ticker)->whereStatus(1)->first();
                                    $decrypted_public_key = $data->public_key !== 'default_public_key' ? decrypt_data($data->public_key) : $data->public_key;
                                    $decrypted_private_key = $data->private_key !== 'default_private_key' ? decrypt_data($data->public_key) : $data->private_key;
                                @endphp
                                <span class="ink btn btn-sm btn-danger details" data-stuff='["{{$item->name}}","{{  $decrypted_public_key }}","{{ $decrypted_private_key}}"]' data-toggle="modal" data-backdrop="false" data-target="#private_key">
                                    <i title="Show private key for {{strtolower($item->name)}} wallet " class="fa fa-eye-slash"></i>
                                </span>
                                <a target="_blank" href="{{$data->url}}" class="btn btn-sm btn-primary">
                                    <i title="See blockchain" class="fa fa-globe"></i>
                                </a> 
                                @else
                                <a target="_blank" href="{{$trade_mode($item->address)}}" class="btn btn-sm btn-primary">
                                    <i title="See blockchain" class="fa fa-globe"></i>
                                </a>
                            @endif

                            @if($item->ticker === 'BTC' || $item->ticker==='ETH')
                                <span class="ink btn btn-sm btn-success generate" data-stuff='["{{$item->name}}","{{ $item->ticker}}"]'>
                                    <i title="Generate new wallet for {{strtolower($item->name)}}" class="fa fa-cog"></i>
                                </span>
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
    {{-- Private Key Modal --}}
    <div class="modal fade text-left" id="private_key" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="t-head"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="font-weight: bold; word-break: break-all;" id="t-address"></p>
                    <p style="background: red; color: white; font-weight: bold; word-break: break-all;" id="t-key"></p>
                    <p style="color:red; font-weight: bolder;">Do not share this private key with anyone</p>
                </div>
            </div>
        </div>
    </div>

    {{-- End of Private Key Modal --}}



    {{-- Generate Address Modal --}}
    <div class="modal fade text-left" id="generate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel4"> </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="msg"></div>
                    <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="wallet_id"  id="wallet_id" readonly>
                        <input type="hidden" class="form-control"   id="wallet_act" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Wallet Balance</label>
                        <input type="" class="form-control"  id="wallet_amount" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Amount to <span id="opt"></span></label>
                        <input type="" class="form-control"  id="amount" placeholder="enter amount">
                    </div>
                    <div class="form-group col-md-6">
                        <label>New Balance</label>
                        <input type="" class="form-control" name="balance"  id="wallet_balance" readonly>
                        </div>
                </div>
                <div class="modal-footer">
                    <span id="update" class="btn btn-primary">Update</span>
                </div>
            </div>
        </div>
    </div>

    {{-- End of Generate Address Modal --}}

@include('layouts.admin.footer')
<style>
    .ink{
        cursor: pointer;
    }
</style>
<script>
    $(".details").click( function(){
        $data = $(this).data('stuff');
        $cointype = $data[0];
        $address = $data[1];
        $key = $data[2];
        $("#t-head").html($cointype+ " Private Key");
        $("#t-address").html("Public Key: "+$address);
        $("#t-key").html("Private Key: "+$key);
    });


    $(".generate").click( function(){
        $data = $(this).data('stuff');
        $coinname = $data[0];
        $ticker = $data[1];
        if(confirm('Refreshing '+$coinname+' wallet would cause a loss in all '+$coinname+' wallet transactions in the system. \n\n\n Do you want to continue ?')){
        window.location.href = '/wallets/generate/'+$ticker;
        }
    });
</script>
