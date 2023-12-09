<!DOCTYPE html>
<html lang="en">
<head>

    <title>Produtos</title>
</head>
<body>
    @extends('layouts.default')

    @section('content')
    <h1>Produtos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'produtos']) !!}
    <div class="sidebar-form">
        <div class="input-group">
            <input type="text" name="desc_filtro" class="form-control" style="width:80% !important;" placeholder="Pesquisa...">
            <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-default">
                    <i class="fa fa-search"></i>
                </button>
            </span>
        </div>
    </div>
{!! Form::close() !!}

<br>
<br>

    <table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Nome</th>
        <th>Preço do Produto</th>
        <th>Tipo do Produto</th>
        <th>Ações</th>

    </thead>
    <tbody>
        @foreach ($produtos as $produto)
        <tr>
            <td>{{ $produto->nome }}</td>
            <td>{{ $produto->preco }}</td>
            <td>{{ isset($produto->descricao) ? $produto->descricao : "Tipo do produto não informado" }}
            <td>
                <a href="{{ route('produtos.edit', ['id'=> \Crypt::encrypt($produto->id)]) }}" class="btn-sm btn-sucess">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($produto->id) }}')" class="btn-sm btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $produtos->links() }}

<a href="{{ route('produtos.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"produtos"
@endsection
</body>
</html>
