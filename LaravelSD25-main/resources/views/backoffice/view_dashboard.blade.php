@extends('layouts.fe_master')

@section('content')
    @if(Auth::user()->user_type == \App\Models\User::TYPE_ADMIN)
    <div class="alert alert-success" role="alert">
            Conta de Administrador
    </div>
    @endif
    <div>
         <h1>Olá, {{ Auth::user()->name }}</h1>
    </div>


@endsection
