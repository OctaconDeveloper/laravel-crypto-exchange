@include('layouts.admin.header')

@php
    $url=explode("/",Request::url());
    $type = strtoupper(end($url));
    $logs = \App\Token::whereType($type)->orderBy('name','ASC')->get();
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
<title>{{ config('app.full_name') }} - Modify {{ $type }}</title>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Modify Token</h1>
    </div>
    <!-- DataTales Example -->
      <div class="card shadow mb-12">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Base</th>
                  <th>Icon</th>
                  <th>Withdraw</th>
                  <th>Deposit</th>
                  <th></th>
                  @if (auth()->user()->user_type_id == 1)<th></th>@endif
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Base</th>
                  <th>Icon</th>
                  <th>Withdraw</th>
                  <th>Deposit</th>
                  <th></th>
                  @if (auth()->user()->user_type_id == 1)<th></th>@endif
                </tr>
              </tfoot>
              <tbody>
                  @forelse ($logs as $key => $item)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ucfirst($item->name)}}</td>
                        <td>{{$item->address}}</td>
                        <td>{{$item->base}}</td>
                        <td><img src="{{$item->image}}" width="25px" height="25"/></td>
                        <td>{{interpret($item->withdraw_stat)}}</td>
                        <td>{{interpret($item->deposit_stat)}}</td>
                        <td>
                            <a href="/block/tokens/edit/{{$item->id}}" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        @if (auth()->user()->user_type_id == 1)
                            <td>
                                <a href="/delete-token/{{$item->id}}" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        @endif
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
        </div>
      </div>

    </div>
    </div>
@include('layouts.admin.footer')
