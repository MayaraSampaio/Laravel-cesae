@extends('layouts.fe_master')

@section('content')
    @if(auth()->user())
    <div class="alert alert-success" role="alert">
            Conta de Administrador>
    </div>
    @endif
    <div>
         <h1>Olá, {{ auth()->user()->name }}</h1>
    </div>


@endsection
