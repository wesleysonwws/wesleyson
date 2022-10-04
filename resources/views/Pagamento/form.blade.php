extends('layouts.base')

@section('conteudo')
    
    <h1>
        @if($pagamento)
        Atualizar Pagamento
        @else
        Novo Pagamento
        @endif
    </h1>
    @if ($pagamento)
        <form action="{{ route('pagamento.update', ['id'=>$pagamento->id_pagamento]) }}" method="post">        
    @else
        <form action="{{ route('pagamento.store') }}" method="post">        
    @endif
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="centro_custo"  class="form-label" >Pagamentos</label>
                <input type="text" name="pagamento" id="pagamento" class="form-control" value="{{ $pagamento ? $pagamento->pagamento : old('pagamento') }}" required>
            </div>
            <div class="form-group col-md-4">
                <label for="id_categoria" class="form-label">Categoria</label>
                <select name="id_categoria" id="id_categoria" class="form-select" required>
                <option value="">Selecione</option>
                

                    @foreach ($categoria as $categoria)
                        <option value="{{ $categoria->id_categoria }}"
                        {{ ($centro && $centro->id_categoria == $categoria->id_categoria) ? 'selected' : ''}}
                            >
                            {{ $categoria->categoria}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-2">
                <br>
                <input type="submit" value=" {{ $pagamento ? 'Atualizar' : 'Cadastrar'}}" class="btn btn-primary mt-2">
            </div>
        </div>
    </form>
@endsection