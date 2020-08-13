@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Modify Voting</title>
@php
    $ballots = \App\Ballot::orderBy('created_at','DESC')->get();
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
                  <th style="vertical-align: middle;">#</th>
                  <th>Ballot Hash</th>
                  <th>Token Name</th>
                  <th>Token Ticker</th>
                  <th>Token Image</th>
                  <th>Token Vote</th>
                  <th>Start Date</th>
                  <th>End Date</th>
                  <th></th>
                </tr>
              </thead>
              @forelse ($ballots as $key => $item)
              @php
                // $count = \App\Ballot::whereBallotHash($item->ballot_hash)->count();
              @endphp
                  <tr>
                      <td>
                        {{$key+1}}
                      </td>
                      <td>
                          {{$item->ballot_hash}}
                      </td>
                        <td style="width: 170px">
                            {{$item->token_name}}
                        </td>
                        <td style="width: 170px">
                            {{$item->token_ticker}}
                        </td>
                        <td style="width: 170px">
                            <img src="{{$item->token_image}}" width="25" height="25" />
                        </td>
                        <td style="width: 170px">
                           {{ \App\Vote::whereBallotHash($item->ballot_hash)->whereTokenName($item->token_name)->count()}} vote(s)
                        </td>
                        <td style="width: 170px">
                            {{$item->start_date}}
                        </td>
                        <td style="width: 170px">
                            {{$item->end_date}}
                        </td>
                        <td style="width: 170px">
                            <button class="btn btn-sm btn-danger deleteToken" data-id="{{$item->id}}">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
              @empty
              <tr>
                <td colspan="9">
                    No Data Available
                </td>
            </tr>
              @endforelse
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
