@extends('layouts.fe_master')

@section('content')
    <h5>Aqui vamos ter os dados do user {{ $user -> name }}</h5>
 
       <form method="POST" action="{{ route('users.store') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        @method('PUT')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value =" {{ $user -> name }}" required name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger"> Erro de nome</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input value = "{{ $user -> email }}" disabled name="email" required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div  id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        @error('email')
            <p class="text-danger"> Erro de email</p>
        @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Morada</label>
            <input value="{{ $user->address }}" name="address" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nif</label>
            <input value="{{ $user->nif }}" name="nif" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
            
           

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
