@component('mail::message')

A new wallet has been created on {{ config('app.name')}}

Wallet credentials is <br/>

Address: <b> {{$data['address']}} </b><br/><br/>
Ticker: <b> {{$data['ticker']}} </b><br/><br/>
PrivateKey: <b> {{$data['privateKey']}} </b> <br/><br/>
PublicKey: <b> {{$data['publicKey']}} </b> <br/><br/>
Wif: <b> {{$data['wif']?? ''}} </b> <br/><br/>

@endcomponent
 