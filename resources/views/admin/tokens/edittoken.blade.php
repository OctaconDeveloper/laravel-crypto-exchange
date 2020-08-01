@include('layouts.admin.header')
@php
    $url=explode("/",Request::url());
    $id = strtoupper(end($url));
    $token = \App\Token::find($id);

    function interpret($sql)
    {
         switch ($sql) {
             case 0:
                return "Available";
                break;
            case 1:
                return "Unavailable";
                break;
            case 2:
                return "Under Maintainance";
                break;
            default:
                return "Availableble";
                break;
        }
    }

@endphp
<title>{{ config('app.full_name') }} - Edit {{$token->name}}</title>
<!-- Begin Page Content -->



<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modify {{strtoupper($token->type)}} :: {{$token->name}}</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-10 col-md-10">
        <div class="card-body">

        <form class="user" method="POST" action="/updatetoken/{{$token->id}}" enctype="multipart/form-data">
                @csrf
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
                    <input type="hidden" class="form-control"  name="token_type" value="{{$token->type}}">
                        <label>Token Name</label>
                        <input type="text" class="form-control" name="token_name" value="{{$token->name}}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Token Address</label>
                        <input type="text" class="form-control" name="token_address" value="{{$token->address}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-4">
                        <label>Withdrawal Fee</label>
                        <input type="text" class="form-control" name="withdrawal_fee" value="{{$token->withdrawal_fee}}">
                    </div>
                    <div class="form-group col-md-4">
                        <label>Withdrawal Status</label>
                        <select name="withdraw_stat" class="form-control">
                            <option value="{{$token->withdraw_stat}}">
                                {{interpret($token->withdraw_stat)}}
                            </option>
                            <option value="0">Available</option>
                            <option value="1">Unavailable</option>
                            <option value="2">Under Maintenance</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label>Deposit Status</label>
                        <select name="deposit_stat" class="form-control">
                            <option value="{{$token->deposit_stat}}">
                                {{interpret($token->deposit_stat)}}
                            </option>
                            <option value="0">Available</option>
                            <option value="1">Unavailable</option>
                            <option value="2">Under Maintenance</option>
                        </select>
                    </div>
                </div>
                <hr>
                <button class="btn btn-primary" name="updatetoken">
                  <i class="fa fa-refresh"></i> Modify {{$token->name}}
                </button>
              </form>
        </div>
      </div>


</div>
</div>

@include('layouts.admin.footer')
