@extends('master')

@section('content')
    <h1>list clubes</h1>
    <ul>
    @foreach($clubes as $clube)
        <li>{{ json_encode($clube) }}</li>
    @endforeach
    </ul>
@endsection
