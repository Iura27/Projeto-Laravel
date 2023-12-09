<head>
    <!-- Outros elementos da tag head -->

    <!-- Inclua o arquivo inputmask.min.js -->
    <script src="{{ asset('js/inputmask.min.js') }}"></script>
  </head>



@extends('adminlte::page')

@section('content')
    <h3>Novo Funcionário</h3>



    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=>'funcionarios.store']) !!}

    <div class="form-group">
        {!! Form::label('nome_fun', 'Nome:') !!}
        {!! Form::text('nome_fun', null, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('telefone', 'Telefone:') !!}
        {!! Form::text('telefone', null, ['class'=>'form-control',  'id'=>'telefone', 'name'=>'telefone', 'placeholder'=>'(00) 0000-0000','required']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Criar Funcionário', ['class'=>'btn btn-primary']) !!}
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
