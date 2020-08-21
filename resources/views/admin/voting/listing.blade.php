@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Add Coin List</title>
<!-- Begin Page Content -->
@php
    $logs = \App\BallotBackLog::orderBy('name','ASC')->get();
@endphp
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Add Coin List</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-10 col-md-12">
        <div class="card-body">

            <button class="add btn btn-primary mb-4"  data-toggle="modal" data-backdrop="false" data-target="#addModal">
                <i class="fa fa-plus"></i> Add Coin
            </button>

            <span id="errorMail" style="color:green; font-weight:bolder;padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" style="color:red; padding:5px">
                @include('errors.errors')
            </span>

          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Ticker</th>
                  <th>Address</th>
                  <th>Base</th>
                  <th>Icon</th>
                  <th>Circulation</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Ticker</th>
                  <th>Address</th>
                  <th>Base</th>
                  <th>Icon</th>
                  <th>Circulation</th>
                  <th></th>
                  <th></th>
                </tr>
              </tfoot>
              <tbody>
                  @forelse ($logs as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ucfirst($item->name)}}</td>
                        <td>{{strtoupper($item->ticker)}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->base}}</td>
                        <td><img src="{{$item->image}}" width="25px" height="25"/></td>
                        <td>{{$item->circulation}}</td>
                        <td>
                            <button
                            data-stuff='["{{$item->id}}","{{$item->name}}","{{$item->address}}","{{$item->circulation}}","{{$item->url}}","{{$item->white_paper}}","{{$item->description}}"]' title="Edit {{$item->question}}" class="btn btn-sm btn-primary edit"  data-toggle="modal" data-backdrop="false" data-target="#editModal">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <a href="/deletecoinlist/{{$item->id}}" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="8">
                            No Data Available
                        </td>
                    </tr>
                  @endforelse
              </tbody>
            </table>
          </div>

        {{-- Add Modal --}}
            <div class="modal fade text-left" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> Add Coin</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="user" method="POST" action="/addcoinlisting" enctype="multipart/form-data">


                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Token Base</label>
                                  <select class="form-control" name="token_base">
                                      <option value="" selected>-Select Token Base-</option>
                                      <option value="ETH">Ethereum</option>
                                      <option value="BTC">Bitcoin</option>
                                  </select>
                                </div>

                                <div class="form-group col-md-6">
                                  <label>Token Name</label>
                                  <input type="text" class="form-control" name="token_name" placeholder="Enter Token Name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Token Ticker</label>
                                    <input type="text" class="form-control" name="token_ticker" placeholder="Enter Token Ticker">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Token Address</label>
                                     <input type="text" class="form-control" name="token_address" placeholder="Enter Token Address">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                  <label>Token Circulation</label>
                                  <input type="text" class="form-control" name="token_circulation" placeholder="Enter Token Circulation">
                                  <br/>
                                  <label>Official Website</label>
                                  <input type="text" class="form-control" name="token_url" placeholder="Enter Token Official Website">
                                  <br/>
                                  <label>Token WhitePaper</label>
                                  <input type="text" class="form-control" name="token_white_paper" placeholder="Enter Token WhitePaper">
                                  <br/>
                                  <label>Token Icon <small>(icon should be 25x25, png,jpg,jpeg,svg)</small></label>
                                  <input type="file" class="form-control" name="token_file" />
                                </div>
                                <div class="form-group col-md-6">
                                  <label>Token Description</label>
                                  <textarea  class="form-control" name="token_description" placeholder="Enter Token Description" rows="13" style="resize: none"></textarea>
                                </div>
                            </div>
                                <hr>
                                <button class="btn btn-primary" name="addtoken">
                                  <i class="fa fa-cog"></i> Add Coin List
                                </button>
                              </form>
                        </div>
                    </div>
                </div>
            </div>
        {{-- End of Add Modal  --}}


        {{-- Edit Modal --}}
<div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"> Edit Coin List</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Name</label>
                            <input type="text" class="form-control" id="token_name" value="" readonly>
                            <input type="hidden" class="form-control" id="token_id" value="" readonly>
                            <br/>
                            <label>Address</label>
                            <input type="text" class="form-control" id="token_address" value="">
                            <br/>
                            <label>Circulation</label>
                            <input type="text" class="form-control" id="token_circulation" value="">
                            <br/>
                            <label>Website</label>
                            <input type="text" class="form-control" id="token_url" value="">
                            <br/>
                            <label>WhitePaper</label>
                            <input type="text" class="form-control" id="token_white_paper"  value="">
                        </div>
                        <div class="form-group col-md-8">
                            <label>Description</label>
                            <textarea  class="form-control" id="token_description" placeholder="Enter Token Description" rows="16" style="resize: none"></textarea>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary" id="updatetoken">
                      <i class="fa fa-refresh"></i> Modify Coin
                    </button>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Modal  --}}



        </div>
      </div>




</div>
</div>

@include('layouts.admin.footer')

<script>
     $(".edit").click( function(){
        $data = $(this).data('stuff');
        $id = $data[0];
        $name = $data[1];
        $address = $data[2];
        $circulation = $data[3];
        $url = $data[4];
        $white_paper = $data[5];
        $description = $data[6];
        $("#token_id").val($id);
        $("#token_name").val($name);
        $("#token_address").val($address);
        $("#token_circulation").val($address);
        $("#token_url").val($url);
        $("#token_white_paper").val($white_paper);
        $("#token_description").text($description);
    });

     $("#updatetoken").click(function(){

        $id = $("#token_id").val();
        $token_name =$ ("#token_name").val();
        $token_address = $("#token_address").val();
        $token_circulation = $("#token_circulation").val();
        $token_url = $("#token_url").val();
        $token_white_paper = $("#token_white_paper").val();
        $token_description = $("#token_description").text();
        event.preventDefault();
        $.ajax({
        type: "POST",
        url: '/updatecoinlisting/'+$id,
        data: {
            token_name : $token_name,
            token_address : $token_address,
            token_circulation : $token_circulation,
            token_url : $token_url,
            token_white_paper : $token_white_paper,
            token_description : $token_description
        }, // serializes the form's elements.
        success: function(){
                alert('Coin Listing Updated Successfully');
                window.location.href = '/block/setup/faq';
        }
        });
        });
</script>
