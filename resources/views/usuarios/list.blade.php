@extends('master')
@extends('layouts.sidebar')

@section('content')
    <Home
        usuarios="{{ $usuarios }}"
    ></Home>
@endsection

</main>
