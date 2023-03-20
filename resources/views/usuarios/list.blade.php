@extends('master')

@section('content')
    <h1>list usuarios</h1>
    <ul>
    @foreach($usuarios as $usuario)
        <li>{{ json_encode($usuario) }}</li>
    @endforeach
    </ul>
@endsection
