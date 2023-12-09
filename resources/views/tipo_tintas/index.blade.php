<!DOCTYPE html>
<html lang="en">
<head>

    <title>Tipo dos Produtos</title>
</head>
<body>
    @extends('layouts.default')

    @section('content')
    <h1>Tipo dos Produtos</h1>

    {!! Form::open(['name'=>'form_name', 'route'=>'tipo_tintas']) !!}
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

    <table class="table table-striped table-bordered table-hover">
    <thead>
        <th>Descrição</th>
        <th>Ações</th>
    </thead>
    <tbody>
        @foreach ($tipo_tintas as $tipo_tinta)
        <tr>
            <td>{{ $tipo_tinta->descricao }}</td>
            <td>
                <a href="{{ route('tipo_tintas.edit', ['id'=> \Crypt::encrypt($tipo_tinta->id)]) }}" class="btn-sm btn-sucess">Editar</a>
                <a href="#" onclick="return ConfirmaExclusao('{{ \Crypt::encrypt($tipo_tinta->id) }}')" class="btn-sm btn-danger">Remover</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $tipo_tintas->links() }}

<a href="{{ route('tipo_tintas.create', []) }}" class="btn btn-info">Adicionar</a>
@stop

@section('table-delete')
"tipo_tintas"
@endsection
</body>
</html>
