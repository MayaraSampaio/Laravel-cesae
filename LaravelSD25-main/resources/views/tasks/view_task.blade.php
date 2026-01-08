@extends('layouts.fe_master')

@section('content')
    <form method="POST" action="{{ route('tasks.update') }}">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $task->id }}">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nome</label>
            <input value="{{ $task-> name }}" name="name" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <p class="text-danger"> Erro de nome</p>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Descrição</label>
            <input value="{{ $task -> description }}" name="description" type="text" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        @error('description')
            <p class="text-danger"> Erro de descrição</p>
        @enderror


        <div class="mb-3">
            <label for="exampleInputDate" class="form-label">Data de Entrega</label>
            <input value="{{ $task -> due_at  }}" name="date" type="date" class="form-control" id="exampleInputDate"
                aria-describedby="date">
        </div>

        @error('date')
            <p class="text-danger"> Erro de Data</p>
        @enderror

        <select name="user_id" id="">
            <option>Escolha User</option>
            @foreach ($users as $user)
                <option 
                @if ($task -> user_id == $user -> id) selected                
                @endif
                value="{{ $user->id}}">{{ $user->name}}</option>
            @endforeach

        </select> <br>
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
@endsection
