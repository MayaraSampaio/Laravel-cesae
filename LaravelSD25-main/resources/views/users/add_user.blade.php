@extends('layouts.fe_master')
@section('content')
    <h4>Olá, aqui podes adicionar utilizadores</h4>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user }}
            </li>
        @endforeach
    </ul>

    <form method="POST" action="{{ route('users.store') }}">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger"> Erro de nome</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div  id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p class="text-danger"> Erro de email</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        @error('password')
            <p class="text-danger"> Erro de password</p>
        @enderror

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
