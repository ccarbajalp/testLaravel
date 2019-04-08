@extends('layout')
@section('contenido')
    <h1>Crear usuario</h1>
    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session('info')  }}
        </div>
    @else
        <form method="POST" action="{{ route('usuarios.store') }}">
            {!! csrf_field() !!}
            <label for="nombre">
                Nombre
                <input class="form-control" type="text" name="name" value="{{ old('name') }}" >
                {!! $errors->first('name', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <label for="email">
                email
                <input class="form-control" type="text" name="email" value="{{ old('email') }}" >
                {!! $errors->first('email', '<span class=error>:message</span>') !!}
            </label>
            <br>
            <label for="password">
                Contraseña
                <input class="form-control" type="password" name="password" value="{{ old('password') }}">
                {!! $errors->first('password', '<span class=error>:message</span>') !!}
            </label>
            <br>
            <label for="password_confirmation">
                Confirmar contraseña
                <input class="form-control" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                {!! $errors->first('password_confirmation', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <div class="checkbox">
                @foreach($roles as $id=>$name)
                    <label>
                        <input type="checkbox" value="{{$id}}" name="roles[]">
                        {{$name}}
                    </label>
                @endforeach
            </div>
            {!! $errors->first('roles', '<span class=error>:message</span>') !!}

            <hr>

            <input class="btn btn-primary" type="submit" value="Guardar">

        </form>
    @endif
@stop
