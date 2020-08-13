@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - All Stakes</title>
@php
    $stakes = \App\Stake::with('token')->get();
@endphp
 <!-- Begin Page Content -->
 <div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Staking List</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                   <th>#</th>
                   <th>Token Name</th>
                   <th>Icon</th>
                   <th>Duration</th>
                   <th>Min. Deposit</th>
                   <th>Min. ROI (%)</th>
                   <th>Max. ROI (%)</th>
                   <th>Keywords</th>
                   <th>Date</th>
                   <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                   <th>#</th>
                  <th>Token Name</th>
                  <th>Icon</th>
                  <th>Duration</th>
                  <th>Min. Deposit</th>
                  <th>Min. ROI (%)</th>
                  <th>Max. ROI (%)</th>
                  <th>Keywords</th>
                  <th>Date</th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                  @forelse ($stakes as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ ucwords($item->token->name) }} {{ strtoupper($item->token->ticker) }}</td>
                        <td><img src="{{$item->token->image}}" width="25px" height="25"/></td>
                        <td>{{ $item->duration }} days</td>
                        <td>{{ $item->minimum_deposit }} {{ strtoupper($item->token->ticker) }}</td>
                        <td>{{ $item->minimum_annual }} %</td>
                        <td>{{ $item->maximum_annual }} % </td>
                        <td>{{ $item->keywords }}</td>
                        <td>{{ explode(" ", $item->created_at)[0] }} </td>

                    <td><button class="btn btn-danger deleteToken" data-id="{{$item->id}}"><i class="fa fa-trash"></i></button></td>
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
<script type="text/javascript">
    $(document).on('click','.deleteToken', function(){
     $cointype = $(this).data('id');
      if(confirm('Confirm Token Stake Delete ?')){
       window.location.href = '/deletestake/'+$cointype;
     }
   });

 </script>
