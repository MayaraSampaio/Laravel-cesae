@extends('layouts.fe_master')

@section('content')

    <h5 class="christmas-title"> Adicionar Gift</h5>

    <form method="POST" action="{{ route('gifts.store') }}">
        @csrf

        <div class="mb-3">
            <label>Nome da prenda</label>
            <input required type="text" name="nome" value="{{ old('nome') }}" class="form-control">
            @error('nome') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label>Valor previsto</label>
            <input required type="number" step="0.01" name="valor_previsto"
                   value="{{ old('valor_previsto') }}" class="form-control">
            @error('valor_previsto') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label>Pessoa</label>
            <select required name="user_id" class="form-control">
                <option value="">-- escolher --</option>
                @foreach ($users as $user)
                <option value="{{ $user->id}}">{{ $user->name}}</option>
                @endforeach
            </select>
            @error('user_id') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="mb-3">
            <label>Valor gasto</label>
            <input type="number" step="0.01" name="valor_gasto"
                   value="{{ old('valor_gasto') }}" class="form-control">
            @error('spent_value') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-success"> Salvar</button>
    </form>



@endsection
