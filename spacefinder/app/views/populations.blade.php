@extends('layout')


@section('content')
    <h2>Populations Table</h2>
    @foreach($populations as $population)
        <p>{{ $population->apn }}</p>
    @endforeach
@stop
