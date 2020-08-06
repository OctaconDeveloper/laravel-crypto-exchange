@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Chat Room</title>
@php
    $chats = \App\Chat::with('user')->get();
@endphp
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-12">
      <h1 class="h3 mb-0 text-gray-800">Chat Room</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-4 col-md-9">
        <div class="card-body" id="div1" style="height: 420px; overflow-y: scroll;">
          @forelse ($chats as $item)

          <div class="form-group">
            <span class="form-control" >
              <b>{{ $item->user->email }} :</b>
              {{ ucfirst($item->message) }}
            </span>
          </div>
          @empty

          @endforelse
        </div>
      </div>

    </div>
</div>
@include('layouts.admin.footer')
<script type="text/javascript">
    var d = $('#div1');
  d.scrollTop(d.prop("scrollHeight"));
  </script>
