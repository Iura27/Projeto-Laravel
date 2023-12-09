@extends('adminlte::page')

@section('content')
    <h3>Editando Tipo de Produto:{{ $tipo_tinta->descricao }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["tipo_tintas.update", 'id' => $tipo_tinta->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::text('descricao', $tipo_tinta->descricao, ['class'=>'form-control', 'required']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Editar Tipo do Produto', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
