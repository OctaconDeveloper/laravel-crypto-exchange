@component('mail::message')
Hi {{$user->email}},

You have successfully enabled Two Factor Authentication (TFA) your account on {{ config('app.name') }}.

Please ignore this email if you did not initiate the request, we strongly advice that you enable Two Factor Authentication or write too support to temporarily block your account.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
