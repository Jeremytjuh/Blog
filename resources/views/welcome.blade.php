@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="title">Welkom op mijn blog!</h1>
            <p>Mijn blog gaat ove Rocket League. Rocket League is een soort voetbal spel maar dan met auto's.<br>De game was gereleased op 7 Juli 2015. Het is een soort gerevampte versie van Psyonix' vorige game genaamd Supersonic Acrobatic Rocket Powered Battle Cars (SARPBC).</p>
            <img src="{{URL::asset('img/rocketleague.jpg')}}" width="600" height="338">
        </div>
    </div>
</div>
@endsection