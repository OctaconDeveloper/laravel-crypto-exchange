@include('layouts.admin.header')
<title>{{ config('app.full_name') }} - Add market pair</title>
@php
    $tokens = \App\Token::all();
@endphp
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800"> Add Market Trade Pair</h1>
    </div>
    <!-- DataTales Example -->
    <div class="row">
        <div class="card shadow mb-4 col-md-8">
            <span class="alert ">Select Tokens/Coins to be traded against a base coin</span>
            <form class="user" method="POST" action="/newpair" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
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
                            <label>Target Coin</label>
                            <select name="target_coin" class="form-control">
                                <option value="" selected>Select Target Coin</option>
                                @forelse ($tokens as $item)
                                    <option value="{{$item->ticker}}">
                                        {{$item->name}}
                                    </option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Base Coin</label>
                            <select name="base_coin" class="form-control">
                                <option value="" selected>Select Base Coin</option>
                                @forelse ($tokens as $item)
                                    <option value="{{$item->ticker}}">
                                        {{$item->name}}
                                    </option>
                                @empty

                                @endforelse
                            </select>
                        </div>
                    </div>
                    <hr/>

                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-cart-plus"></i> Add Pair
                    </button>
                </div>
            </form>
        </div>
        <div class="card shadow mb-4 col-md-4 pl-2" >
            <div class="card-body">
                <h4>Notice!!!</h4>
                1. Trade Pair is a unique identifier for a trade against two coins/tokens. <code>E.g., THC_BTC</code> <br/><br/>
                2. Target Coin/Token is the token that is to be traded against an exiting coin/token. <code>E.g., if the trade pair is THC_BTC, THC is the target token</code> <br/><br/>
                3. Base Coin/Token is the token that is been traded against an exiting coin/token. <code>E.g., if the trade pair is THC_BTC, BTC is the base token</code><br/><br/>
            </div>
        </div>
    </div>
</div>
</div>

@include('layouts.admin.footer')
