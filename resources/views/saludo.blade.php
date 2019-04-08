@extends('layout')
@section('contenido')
    <h1>Saludos a {{$nombre}}</h1>

    @forelse($consolas as $consola)
        <li>{{ $consola }}</li>
    @empty
        <p>No hay consolas</p>
    @endforelse
@stop











<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saludo</title>
</head>
<body>
<h1>Saludos para <?php //echo $nombre ?></h1>
<h1>Saludos para {{$nombre}}</h1>
{!! $html !!}
<ul>
    @forelse($consolas as $consola)
        <li>{{ $consola }}</li>
    @empty
        <p>No hay consolas :(</p>
    @endforelse
</ul>

@if(count($consolas) === 1)
    <p>Solo tienes una consola</p>
@elseif(count($consolas) > 1)
        <p>Tienes varias consola</p>
@else
    <p>No tienes consolas</p>
@endif


<header>
    <nav>
        <a href="<?php //echo route('home') ?>">Inicio</a>
        <a href="<?php //echo route('saludos','Carlos') ?>">Saludos</a>
        <a href="<?php //echo route('contactos') ?>">Contactos</a>
    </nav>
</header>
</body>
</html>-->
