@extends('layout')

@section('content')
    @foreach($populations as $population)
        <p>{{ $population->apn }}</p>
    @endforeach
@stop
