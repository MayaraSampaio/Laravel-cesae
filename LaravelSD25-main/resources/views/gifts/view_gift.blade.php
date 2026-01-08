@extends('layouts.fe_master')

@section('content')

<h5>Detalhes da Prenda</h5>

@if ($gifts)
    <p><strong>Prenda:</strong> {{ $gifts->nome }}</p>
    <p><strong>Valor previsto:</strong> {{ $gifts->valor_previsto }}</p>
    <p><strong>Pessoa:</strong> {{ $gifts->username }}</p>
    <p><strong>Valor gasto:</strong> {{ $gifts->valor_gasto ?? '—' }}</p>

    <a href="{{ route('gifts.all') }}" class="btn btn-secondary btn-sm">Voltar</a>
@else
    <p>Prenda não encontrada.</p>
    <a href="{{ route('gifts.all') }}" class="btn btn-secondary btn-sm">Voltar</a>
@endif

@endsection
