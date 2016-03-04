
@extends('app')

@section('title') Home @parent @endsection

@section('content')

<div class="jumbotron">
    <h1>Start New Game</h1>
    <hr />
    <p><a class="btn btn-lg btn-block btn-success" href="{{ URL::to('/play') }}" role="button">PLAY</a></p>
</div>

@endsection