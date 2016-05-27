@extends('template')

@section('title')
    Olá
@stop

@section('content')

    <h1>Olá {{ $nome }}</h1>


    <!-- Assim seria para ignorar a segurança/tratamento de output do Laravel -->
    <!-- <h1>Olá {{!! $nome !!}}</h1> -->

@stop