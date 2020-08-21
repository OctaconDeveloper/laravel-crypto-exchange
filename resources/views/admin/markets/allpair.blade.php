@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - All Market Pair</title>
@php
    $pairs = \App\CoinPair::with(['cointarget','coinbase'])->get();
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
          <h1 class="h3 mb-0 text-gray-800">View market pairs</h1>
        </div>
        <!-- DataTales Example -->
          <div class="card shadow mb-12">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Pairing Code</th>
                      <th>Target Coin</th>
                      <th>Base Coin</th>
                      @if (auth()->user()->user_type_id == 1)
                          <th></th>
                          <th></th>
                      @endif
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Pairing Code</th>
                        <th>Target Coin</th>
                        <th>Base Coin</th>
                        @if (auth()->user()->user_type_id == 1)
                            <th></th>
                            <th></th>
                        @endif
                    </tr>
                  </tfoot>
                  <tbody>
                    @forelse ($pairs as $key => $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                {{$item->pair}}
                                @if ($item->stat === 1)
                                    <span class="alert">
                                        <i class="green fa fa-thumbs-up"></i>
                                    </span>
                                @endif
                            </td>

                        <td>
                            {{$item->cointarget['name']}}
                            <img width="25" height="25" src="{{$item->cointarget['image']}}" />
                        </td>
                        <td>
                            {{$item->coinbase['name']}}
                            <img width="25" height="25" src="{{$item->coinbase['name']}}" />
                        </td>

                        @if (auth()->user()->user_type_id == 1)
                            <td>
                                <a href="/defaultmarkets/{{$item->id}}">
                                    <i class="fa fa-cog blue" title="Make Default Ticker"></i>
                                </a>
                            </td>
                            <td>
                                <a href="/deletemarkets/{{$item->id}}">
                                    <i title="Delete {{$item->pair}}" class="fa fa-trash red"></i>
                                </a>
                            </td>
                        @endif
                    </tr>

                    @empty
                        <tr>
                    		<td colspan="6">
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
