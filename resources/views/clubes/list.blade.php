@extends('master')

@section('content')
    <h1>list clubes</h1>
    <ul>
    @foreach($clubes as $clube)
        <li>{{ $clube["name"] }}</li>
    @endforeach
    </ul>
@endsection
