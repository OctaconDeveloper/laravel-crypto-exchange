@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - FAQs Logs</title>

@php
    $faqs = \App\FAQ::orderBy('id','DESC')->get();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">FAQs Logs</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
            <span id="errorMail" class="ml-5 mt-2" style="color:green; font-weight:bolder;padding:5px">
                @if (\Session::has('msg'))
                    {!! \Session::get('msg') !!}
                @endif
            </span>
            <span id="errorMail" class="ml-5 mt-2"  style="color:red; padding:5px">
                @include('errors.errors')
            </span>
        <div class="card-body">
            <button class="add btn btn-primary mb-4"  data-toggle="modal" data-backdrop="false" data-target="#addModal">
                <i class="fa fa-plus"></i> Add FAQ
            </button>
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th style="width: 5px">#</th>
                  <th>Question</th>
                  <th>Answer</th>
                  <th style="width: 10px"></th>
                  <th style="width: 10px"></th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th>#</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th></th>
                    <th></th>
                </tr>
              </tfoot>
              <tbody>
                 @forelse ($faqs as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$item->question}}</td>
                        <td>{!! $item->answer !!}</td>
                        <td>
                            <button data-stuff='["{{$item->id}}","{{$item->question}}","{{$item->answer}}"]' title="Edit {{$item->question}}" class="btn btn-sm btn-primary edit"  data-toggle="modal" data-backdrop="false" data-target="#editModal">
                                <i class="fa fa-edit"></i>
                            </button>
                        </td>
                        <td>
                            <button data-id="{{$item->id}}" title="Delete {{$item->question}}" class="btn btn-sm btn-danger del">
                                <i class="fa fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                 @empty
                    <tr>
                        <td colspan="4">
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
                <h5 class="modal-title"> Add FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="text" class="form-control"  id="add_question" placeholder="Question">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control"  id="add_answer" placeholder="Answer" rows="5" style="resize: none"></textarea>
                  </div>
                  <div class="form-group">
                      <button type="button" id="sendAdd" class="btn btn-md btn-success">
                          <i class="fa fa-plus"></i> Add FAQ
                      </button>
                  </div>
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
                <h5 class="modal-title"> Edit FAQ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" class="form-control"  id="edit_id" placeholder="ID" >
                    <input type="text" readonly class="form-control"  id="edit_question" placeholder="Question">
                  </div>
                  <div class="form-group">
                      <textarea class="form-control"  id="edit_answer" placeholder="Answer" rows="5" style="resize: none"></textarea>
                  </div>
                  <div class="form-group">
                      <button type="button" id="update" class="btn btn-md btn-success">
                          <i class="fa fa-retweet"></i> Update FAQ
                      </button>
                  </div>
            </div>
        </div>
    </div>
</div>
{{-- End of Edit Modal  --}}
    </div>
    </div>

@include('layouts.admin.footer')

<script>
     $(".edit").click( function(){
        $data = $(this).data('stuff');
        $id = $data[0];
        $question = $data[1];
        $answer = $data[2];
        $("#edit_id").val($id);
        $("#edit_question").val($question);
        $("#edit_answer").text($answer);
    });
    $(".del").click( function (){
        $data = $(this).data('id');
        if(confirm('You are to about delete a FAQ details. \n\n\n Do you want to continue ?')){
        window.location.href = '/deletefaq/'+$data;
        }
    });
    $("#update").click(function(){

        $edit_question = $("#edit_question").val();
        $edit_answer = $("#edit_answer").val();
        event.preventDefault();
	 	$.ajax({
           type: "POST",
           url: '/addfaq',
           data: {
            question : $edit_question,
            answer: $edit_answer
           }, // serializes the form's elements.
           success: function(){
                alert('Faq Updated Successfully');
                window.location.href = '/block/setup/faq';
           }
         });
    });

    $("#sendAdd").click(function(){
    $add_question = $("#add_question").val();
    $add_answer = $("#add_answer").val();
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: '/addfaq',
        data: {
            question : $add_question,
            answer: $add_answer
        }, // serializes the form's elements.
        success: function(){
                alert('Faq Added Successfully');
                window.location.href = '/block/setup/faq';
        }
    });
});
</script>

