@component('mail::message')
Hi {{$user->email}},

<p>
    {!! $message !!}
</p>

Andy Boyer,<br>
{{ config('app.name') }}
@endcomponent
