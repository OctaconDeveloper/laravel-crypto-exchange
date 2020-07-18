@component('mail::message')
Hi {{$user->email}},

You have created an account with {{ config('app.name')}}

Your activation token is: <b>{{$user->activation_code}} </b>

click here to <a href="{{ env('APP_URL')}}user/activation">activate account</a>


Thanks,<br>
{{ config('app.name') }}
@endcomponent
