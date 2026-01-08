@extends('layouts.fe_master')

@section('content')

    <h5 class="christmas-title">Todos os Gifts</h5>

    <a href="{{ route('gifts.add') }}" class="btn btn-success btn-sm mb-3">
        Adicionar Prenda
    </a>

    <table class="table christmas-table">
        <thead>
            <tr>
                <th>Prenda</th>
                <th>Valor previsto</th>
                <th>Pessoa</th>
                <th>Valor gasto</th>
                <th>Diferença</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gifts as $gift)
                <tr>
                    <td>{{ $gift->nome }}</td>

                    <td>
                        {{ number_format($gift->valor_previsto, 2, ',', '.') }} €
                    </td>

                    <td>{{ $gift->username}}</td>

                    <td>
                        @if ($gift->valor_gasto !== null)
                            {{ number_format($gift->valor_gasto, 2, ',', '.') }} €
                        @else
                            —
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('gifts.view', $gift->id) }}" class="btn btn-primary btn-sm">Ver</a>
                        <a href="{{ route('gifts.delete', $gift->id) }}"
                           class="btn btn-danger btn-sm">
                            Apagar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
