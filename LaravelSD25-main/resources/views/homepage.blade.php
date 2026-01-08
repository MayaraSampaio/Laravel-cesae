@extends('layouts.fe_master')

@section('content')
  @auth
  <h5>Olá {{ Auth::user()->name }}</h5>
  @endauth
    <p>{{ $cesaeInfo['name'] }} {{ $cesaeInfo['email'] }} {{ $cesaeInfo['address'] }}</p>

    <img src="{{ asset('images/5ea9a2c7-bd2e-46b0-b858-701f9cfbd7b1.png') }}" alt="">
    <ul>
        <li><a href="{{ route('welcome') }}">Welcome Page</a></li>
        <li><a href="{{ route('hello') }}">Hello Page</a></li>
        <li><a href="{{ route('users.add') }}">Adicionar USer</a></li>
        <li><a href="{{ route('users.all') }}">Todos os USers</a></li>
        <li><a href="{{ route('tasks.all') }}">Todas as tarefas</a></li>
        <li><a href="{{ route('tasks.add') }}">Adicionar tarefas</a></li>
    </ul>
@endsection
