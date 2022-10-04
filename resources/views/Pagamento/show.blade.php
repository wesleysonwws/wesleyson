@extends('layouts.base')

@section('conteudo')
    
    <h1><i class="bi bi-basket-fill"></i>
        Pagamento
    </h1>
    -
    <a href="{{ route('pagamento.create') }}" class="btn btn-dark">
        Novo
    </a>

    <table class="table table-striped table-border table-hover">
        {{-- Cabeçalho --}}
        <thead> 
            <tr>
                <th>Ações</th>
                <th>ID</th>
                <th>Tipo</th>
                <th>Pagamento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pagamentos as $pagamentos)
                
                <tr>
                    <td>
                        <a href="{{ route('centro.edit', ['id'=>$centro->id_centro_custo]) }}" class="btn btn-success">
                            Editar
                        </a>
                    </td>
                    <td>{{ $pagamento->id_pagamento }}</td>
                    <td>{{ $pagamento->categoria->categoria      }}</td>
                    <td>{{ $pagamento->pagamento    }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection