@extends('adminlte::page')

@section('content')
    <h3>Novo Tipo de Produto</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'tipo_tintas.store']) !!}

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::text('descricao', null, ['class'=>'form-control', 'required']) !!}
    </div>



    <div class="form-group">
        {!! Form::submit('Criar Tipo de Produto', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop
