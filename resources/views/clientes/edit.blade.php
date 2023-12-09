<head>
    <!-- Outros elementos da tag head -->

    <!-- Inclua o arquivo inputmask.min.js -->
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
  </head>



@extends('adminlte::page')

@section('content')
    <h3>Editando Clientes:{{ $cliente->nome }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["clientes.update", 'id'=>$cliente->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('nome_cli', 'Nome:') !!}
        {!! Form::text('nome_cli', $cliente->nome_cli, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', $cliente->telefone, ['class'=>'form-control',  'id'=>'telefone', 'name'=>'telefone', 'placeholder'=>'(00) 0000-0000', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('endereco', 'Endereço:') !!}
        {!! Form::text('endereco', $cliente->endereco, ['class'=>'form-control', 'placeholder'=>'Rua das Flores, 123 - Bairro Jardim Primavera', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cpf', 'CPF:') !!}
        {!! Form::text('cpf', $cliente->cpf, ['class'=>'form-control', 'id'=>'cpf', 'name'=>'cpf', 'placeholder'=>'000.000.000-00', 'required']) !!}
    </div>


    <div class="form-group">
        {!! Form::submit('Editar Cliente', ['class'=>'btn btn-primary']) !!}
        {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
    </div>

    {!! Form::close() !!}
@stop

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var telefoneInput = document.getElementById('telefone');

      var telefoneMask = new Inputmask('(99) 9999-9999');
      telefoneMask.mask(telefoneInput);
    });
  </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
      var cpfInput = document.getElementById('cpf');

      var cpfMask = new Inputmask('999.999.999-99');
      cpfMask.mask(cpfInput);
    });
  </script>
