@extends('master')
@extends('layouts.sidebar')

@section('content')
    <ClubesEditForm :clube="{{ $clube }}"></ClubesEditForm>
@endsection

</main>
