@extends('layout')
@section('contenido')
    <h1>CONTACTO</h1>
    <h2>Escríbeme</h2>

    @if(session()->has('info'))
        <h1>{{ session('info') }}</h1>
    @else
        <form method="POST" action="{{ route('mensajes.store') }}">
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            {!! csrf_field() !!}

            @if(auth()->guest())
                <label for="nombre">
                    Nombre
                    <input class="form-control" type="text" name="nombre" value="{{ old('nombre') }}">
                    {!! $errors->first('nombre', '<span class=error>:message</span>') !!}
                </label>
                <br>

                <label for="email">
                    email
                    <input class="form-control" type="text" name="email" value="{{ old('email') }}">
                    {!! $errors->first('email', '<span class=error>:message</span>') !!}
                </label>
                <br>
            @else
                <input class="form-control" type="hidden" name="nombre" value="{{ auth()->user()->name }}">
                <input class="form-control" type="hidden" name="email" value="{{ auth()->user()->email }}">
            @endif

            <label for="mensaje">
                Mensaje
                <textarea class="form-control" name="mensaje">{{ old('mensaje') }}</textarea>
                {!!  $errors->first('mensaje', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <input class="btn btn-primary" type="submit" value="Enviar">

        </form>
    @endif
@stop
