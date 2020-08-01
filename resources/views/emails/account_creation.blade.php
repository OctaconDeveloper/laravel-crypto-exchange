@component('mail::message')
Hi {{$user->email}},

An account has been created for you on {{ config('app.name')}}

Your account credentials is <br/>

Email: <b>{{$user->email}}</b> <br/>
Account ID: <b>{{$user->wallet_id}}</b> <br/>
Password: <b>{{$password}}</b> <br/>
Created At: <b>{{$user->created_at}}</b> <br/>

@if ($user->user_type_id == '3')

Your activation token is: <b>{{$user->activation_code}} </b>

click here to <a href="{{ env('APP_URL')}}user/activation">activate account</a>

@endif


Thanks,<br>
{{ config('app.name') }}
@endcomponent
