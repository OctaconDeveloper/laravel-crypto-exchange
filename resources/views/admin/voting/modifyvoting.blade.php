@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Modify Voting</title>
@php
    $ballots = \App\Ballot::with(['firstcount','secondcount','thirdcount','fourthcount'])->orderBy('end_date','DESC')->get();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modify Vote List</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th rowspan="2" style="vertical-align: middle;">#</th>
                  <th colspan="2" >Token1</th>
                  <th colspan="2">Token2</th>
                  <th colspan="2">Token3</th>
                  <th colspan="2">Token4</th>
                  <th rowspan="2" style="vertical-align: middle;">Start Date</th>
                  <th rowspan="2" style="vertical-align: middle;">End Date</th>
                  <th rowspan="2" style="vertical-align: middle;"></th>
                </tr>
                <tr>
                  <th>Token Name</th>
                  <th>Token Vote</th>
                  <th>Token Name</th>
                  <th>Token Vote</th>
                  <th>Token Name</th>
                  <th>Token Vote</th>
                  <th>Token Name</th>
                  <th>Token Vote</th>
                </tr>
              </thead>

              <tbody>
                  @forelse ($ballots as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ strtoupper($item->first_token)}}</td>
                        <td>{{ \App\Vote::whereBallotId($item->id)->whereName($item->first_token)->count()}} </td>
                        <td>{{ strtoupper($item->second_token)}}</td>
                        <td>{{ \App\Vote::whereBallotId($item->id)->whereName($item->second_token)->count()}} </td>
                        <td>{{ strtoupper($item->third_token)}}</td>
                        <td>{{ \App\Vote::whereBallotId($item->id)->whereName($item->third_token)->count()}} </td>
                        <td>{{ strtoupper($item->fourth_token)}}</td>
                        <td>{{ \App\Vote::whereBallotId($item->id)->whereName($item->fourth_token)->count()}} </td>
                        <td>{{$item->start_date}}</td>
                        <td>{{$item->end_date}}</td>
                        <td>
                            <button class="btn btn-danger deleteToken" data-id="{{$item->id}}" title="Delete vote"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="12">
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
      if(confirm('Confirm Vote List Delet ?')){
       window.location.href = '/deletevoting/'+$cointype;
     }
   });


 </script>
