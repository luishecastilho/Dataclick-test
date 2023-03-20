@extends('master')

@section('content')
    <h1>Homepage</h1>
    {{ json_encode($usuarios) }}
    <br>
    {{ json_encode($clubes) }}
    <br>
    <App />
@endsection
