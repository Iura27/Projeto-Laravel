@extends('adminlte::page')

@section('content')
    <h3>Editando Produto:{{ $produto->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["produtos.update", 'id'=>$produto->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome', 'Nome:') !!}
        {!! Form::text('nome', $produto->nome, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('preco', 'Preço:') !!}
        {!! Form::text('preco', $produto->preco, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('qtd', 'Quantidade:') !!}
        {!! Form::select('qtd',
                                array(
                                    '1',
                                    '2',
                                    '3',
                                    '4',
                                    '5',
                                    '6',
                                    '7',
                                    '8',
                                    '9',
                                    '10',
                                    '11',
                                    '12',
                                    '13',
                                    '14',
                                    '15',
                                    '16',
                                    '17',
                                    '18',
                                    '19'),
                            $produto->qtd, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('tipo_tinta_id', 'Tipo dos Produtos:') !!}
        {!! Form::select('tipo_tinta_id',
                                \App\TipoTinta::orderBy('descricao')->pluck('descricao', 'id')->toArray(),
                                $produto->tipo_tinta_id, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Editar Produto', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
