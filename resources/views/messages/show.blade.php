@extends('layout')
@section('contenido')
    <h1>Mensaje</h1>
    @if($message != null)
    <p>Enviado por {{ $message->nombre }} - {{ $message->email }}</p>
    <p>{{ $message->mensaje }}</p>
        @else
        <p>No existe el usuario</p>
    @endif

@stop
