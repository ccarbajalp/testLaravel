@extends('layout')
@section('contenido')
    <h1>EDITAR MENSAJE</h1>

    <form method="POST" action="{{ route('mensajes.update', $message->id) }}">
    <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
        {{ method_field('PUT') }}
        {!! csrf_field() !!}

        @if(auth()->guest())
            Nombre
                <label for="nombre">
                <input class="form-control" type="text" name="nombre" value="{{ $message->nombre }}">
                {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <label for="email">
                email
                <input class="form-control" type="text" name="email" value="{{ $message->email }}">
                {!! $errors->first('email', '<span class=error>:message</span>') !!}
            </label>
        @else
            <input class="form-control" type="hidden" name="nombre" value="{{ $message->nombre }}">
            <input class="form-control" type="hidden" name="email" value="{{ $message->email }}">
        @endif
        <br>

        <label for="mensaje">
            Mensaje
            <textarea class="form-control" name="mensaje">{{ $message->mensaje }}</textarea>
            {!!  $errors->first('mensaje', '<span class=error>:message</span>') !!}
        </label>
        <br>

        <input class="btn btn-primary" type="submit" value="Enviar">

    </form>

@stop
