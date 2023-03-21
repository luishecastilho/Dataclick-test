@extends('master')
@extends('layouts.sidebar')

@section('content')
    <Home
        clubes="{{ $clubes }}"
    ></Home>
@endsection

</main>
