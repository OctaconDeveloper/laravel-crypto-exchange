@component('mail::message')
Hi {{$tokenData->email}},

You requested to reset your password on {{ config('app.name')}}

Your password reset code is: <b>{{$tokenData->token}} </b>.

Please ignore this email if you did not initiate the request. We also advice that you reset yor password for security reasons.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
