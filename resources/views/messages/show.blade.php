@extends('layout')
@section('contenido')
    <h1>Mensaje</h1>
    @if($message != null)
        <p>Enviado por {{ $message->present()->userName() }} - {{ $message->present()->userEmail() }}</p>
        <p>{{ $message->mensaje }}</p>
    @else
        <p>No existe el usuario</p>
    @endif

@stop
