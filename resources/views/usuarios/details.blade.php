@extends('master')
@extends('layouts.sidebar')

@section('content')
    <UsuariosDetails :usuario="{{ $usuario }}" :clubes="{{ $clubes }}"></UsuariosDetails>
@endsection

</main>
