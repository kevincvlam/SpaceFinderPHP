@extends('layout')


@section('content')
    <h2>Buildings Table</h2>
    @foreach($buildings as $building)
        <p>{{ $building->apn }}</p>
    @endforeach
@stop
