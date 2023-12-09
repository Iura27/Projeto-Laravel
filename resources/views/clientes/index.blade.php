<!DOCTYPE html>
<html lang="en">
<head>

    <title>Clientes</title>
</head>
<body>
    @extends('layouts.default')

    @section('content')
    <h1>Clientes</h1>
    {!! Form::open(['name'=>'form_name', 'route'=>'clientes']) !!}
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
        <th>Telefone</th>
        <th>Endereço</th>
        <th>CPF</th>
    </thead>
    <tbody>
        @foreach ($clientes as $cliente)
        <tr>
            <td>{{ $cliente->nome_cli }}</td>
            <td>{{ '(' . substr($cliente->telefone, 0, 2) . ') ' . substr($cliente->telefone, 2, 4) . '-' . substr($cliente->telefone, 6) }}</td>
            <td>{{ $cliente->endereco }}</td>
            <td>{{ substr_replace(substr_replace(substr_replace($cliente->cpf, '.', 3, 0), '.', 7, 0), '-', 11, 0) }}</td>
            <td>
                <a href="{{ route('clientes.edit', ['id'=> \Crypt::encrypt($cliente->id)]) }}" class="btn-sm btn-sucess">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($cliente->id) }}')" class="btn-sm btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $clientes->links() }}

<a href="{{ route('clientes.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"clientes"
@endsection
</body>
</html>
