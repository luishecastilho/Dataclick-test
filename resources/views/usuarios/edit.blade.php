@extends('master')
@extends('layouts.sidebar')

@section('content')
    <UsuariosEditForm :usuario="{{ $usuario }}"></UsuariosEditForm>
@endsection

</main>
