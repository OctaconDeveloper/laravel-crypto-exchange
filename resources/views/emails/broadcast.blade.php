@component('mail::message')
<h5>{{$broadcast->title}}</h5>
<img src="{{$broadcast->image}}" style="height: 200px; width: 100%" />
<p>
    <br/>
    {!! $broadcast->message !!}
</p>

Andy Boyer,<br>
{{ config('app.name') }}
@endcomponent
