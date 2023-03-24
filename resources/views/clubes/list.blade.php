@extends('master')
@extends('layouts.sidebar')

@section('content')
    <ClubesList :clubes="{{ $clubes }}"></ClubesList>
@endsection

</main>
