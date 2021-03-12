@extends('layout')

@section('title', 'Bienvenido con nickname')

@section('content')
    <p>Bienvenido {{ $name }}, tu apodo es {{ $nickname }}.</p>
@endsection