@extends('master')

@section('content')
    <h1>details usuarios</h1>
    <h2>Usuario:</h2> {{ json_encode($usuario) }}
    <h2>Clubes:</h2> {{ json_encode($clubes) }}
    <h2>Faturas:</h2> {{ json_encode($faturas) }}
@endsection
