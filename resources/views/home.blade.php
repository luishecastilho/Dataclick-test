@extends('master')
@extends('layouts.sidebar')

@section('content')
    <Home
        clubes="{{ $clubes }}"
        usuarios="{{ $usuarios }}"
    ></Home>
@endsection

</main>
