<!DOCTYPE html>
<html lang="en">
<head>

    <title>Funcionários</title>
</head>
<body>
    @extends('layouts.default')

    @section('content')
    <h1>Funcionários</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'funcionarios']) !!}
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
    </thead>
    <tbody>
        @foreach ($funcionarios as $funcionario)
        <tr>
            <td>{{ $funcionario->nome_fun }}</td>
            <td>{{ '(' . substr($funcionario->telefone, 0, 2) . ') ' . substr($funcionario->telefone, 2, 4) . '-' . substr($funcionario->telefone, 6) }}</td>
            <td>
                <a href="{{ route('funcionarios.edit', ['id'=> \Crypt::encrypt($funcionario->id)]) }}" class="btn-sm btn-sucess">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($funcionario->id) }}')" class="btn-sm btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $funcionarios->links() }}

<a href="{{ route('funcionarios.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"funcionarios"
@endsection
</body>
</html>
