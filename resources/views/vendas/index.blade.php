<!DOCTYPE html>
<html lang="en">
<head>

    <title>Vendas</title>
</head>
<body>
    @extends('layouts.default')

    @section('content')


    <h1>Vendas</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'vendas']) !!}
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
        <th>Código</th>
        <th>Data</th>
        <th>Descrição</th>
        <th>Funcionário</th>
        <th>Cliente</th>
        <th>Produto</th>
        <th>Ações</th>

    </thead>
    <tbody>
        @foreach ($vendas as $venda)


        <tr>
            <td>{{ $venda->id }}</td>
            <td>{{ Carbon\Carbon::parse($venda->dt_compra)->format('d/m/Y') }}</td>
            <td>{{ isset($venda->descricao) ? $venda->descricao : "Tipo do Venda não informado" }}</td>
            <td>{{ $venda->funcionario->nome_fun  }}</td>
            <td>{{ $venda->cliente->nome_cli }}</td>
            <td>@foreach ($venda->produtosVendidos as $produtoVendido)
                <li>{{ $produtoVendido->produto->nome }}</li>
            @endforeach
        </td>
            <td>
                <a href="{{ route('vendas.edit', ['id'=> \Crypt::encrypt($venda->id)]) }}" class="btn-sm btn-sucess">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($venda->id) }}')" class="btn-sm btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $vendas->links() }}

<a href="{{ route('vendas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"vendas"
@endsection
</body>
</html>
