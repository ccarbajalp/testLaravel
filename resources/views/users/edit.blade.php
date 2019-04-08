@extends('layout')

@section('contenido')
    <h1>Editar usuario</h1>

    @if (session()->has('info'))
        <div class="alert alert-success">
            {{ session('info')  }}
        </div>
    @else
        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
        <!--<input type="hidden" name="_token" value="{{ csrf_token() }}">-->
            {{ method_field('PUT') }}
            {!! csrf_field() !!}
            <label for="nombre">
                Nombre
                <input class="form-control" type="text" name="name" value="{{ $user->name }}">
                {!! $errors->first('name', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <label for="email">
                email
                <input class="form-control" type="text" name="email" value="{{ $user->email }}">
                {!! $errors->first('email', '<span class=error>:message</span>') !!}
            </label>
            <br>

            <div class="checkbox">
                @foreach($roles as $id=>$name)
                <label>
                    <input type="checkbox" value="{{$id}}" {{ $user->roles->pluck('id')->contains($id) ? 'checked' : '' }} name="roles[]">
                        {{$name}}
                    </label>
                @endforeach

            </div>

            <input class="btn btn-primary" type="submit" value="Enviar">

        </form>
    @endif

@stop
