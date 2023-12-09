@extends('adminlte::page')

@section('content')

    <h3>Editando Venda:{{ $venda->descricao }}</h3>

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {!! Form::open(['route'=> ["vendas.update", 'id'=>$venda->id], 'method'=>'put']) !!}

    <div class="form-group">
        {!! Form::label('descricao', 'Descrição:') !!}
        {!! Form::text('descricao', $venda->descricao, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('dt_compra', 'Data da Compra:') !!}
        {!! Form::text('dt_compra', $venda->dt_compra, ['class'=>'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('funcionario_id', 'Funcionário:') !!}
        {!! Form::select('funcionario_id',
                                \App\Funcionario::orderBy('nome_fun')->pluck('nome_fun', 'id')->toArray(),
                                $venda->funcionario_id, ['class' => 'form-control', 'required']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('cliente_id', 'Clientes:') !!}
        {!! Form::select('cliente_id',
                                \App\Cliente::orderBy('nome_cli')->pluck('nome_cli', 'id')->toArray(),
                                $venda->cliente_id, ['class' => 'form-control', 'required']) !!}
    </div>

    <hr>
<h4>Produtos</h4>
<div class="input_fields_wrap">
    @foreach ($venda->produtos as $produto)
        <div>
            <div style="width:94%; float:left" id="produto">
                {!! Form::select("produtos[]", \App\Produto::orderBy("nome")->pluck("nome", "id")->toArray(), $produto->id, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Produto"]) !!}
            </div>
            <button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button>
        </div>
    @endforeach
</div>
<br>

<button style="float: right" class="add_field_button btn btn-default">
    Adicionar Produto
</button>
<br>
<hr>


<div class="form-group">
    {!! Form::submit('Editar Venda', ['class'=>'btn btn-primary']) !!}
    {!! Form::reset('Limpar', ['class'=>'btn btn-default']) !!}
</div>

{!! Form::close() !!}

@stop

@section('js')
<script>
$(document).ready(function() {
    var wrapper = $(".input_fields_wrap");
    var add_button = $(".add_field_button");
    var x = {!! $venda->produtos->count() ?? 0 !!};


    var myarray = [];
    var previousValue = 0;
    var previousIndex = 0;

    @foreach($venda->produtos as $produto)
            myarray.push({{$produto->id}});
        @endforeach


    $(add_button).click(function(e) {
        x++;

        var newField = '<div><div style="width:94%; float:left" id="produto">{!! Form::select("produtos[]", \App\Produto::orderBy("nome")->pluck("nome", "id")->toArray(), null, ["class"=>"form-control", "required", "placeholder"=>"Selecione um Produto"]) !!}</div><button type="button" class="remove_field btn btn-danger btn-circle"><i class="fa fa-times"></i></button></div>';



        $(wrapper).append(newField);
    });

    $(wrapper).on("click", ".remove_field", function(e) {
        e.preventDefault();

        selectedValue = $(this).parent('div').find(":selected").val();
        var myIndex = myarray.indexOf(selectedValue);
        if (myIndex !== -1)
            myarray.splice(myIndex, 1);

        $(this).parent('div').remove();
        x--;
    });

    $(wrapper).on("focus", "select", function(e) {
        e.preventDefault();
        previousValue = $(this).find(":selected").val();
        previousIndex = $(this).find(":selected").index();
    });

    $(wrapper).on("change", "select", function(e) {
        e.preventDefault();
        selectedValue = $(this).find(":selected").val();
        if(myarray.find(element => element == selectedValue)) {
            Swal.fire('Produto já se encontra na lista de produtos da venda!',
            'Por favor, selecione outro produto.',
            'warning');
            $(this).prop('selectedIndex', previousIndex);
        }
        else {
            if(myarray.length < x && previousValue == "") {
                myarray.push(selectedValue);
            }
            else {
                var index = myarray.indexOf(previousValue);
                if(index !== -1) {
                    myarray[index] = selectedValue;
                    previousValue = selectedValue;
                }
            }
        }
        /* Exemplo para imprimir log e inspecionar funcionamento
        do código no browser */
        //for (i = 0; i < myarray.length; i++)
        //    console.log((i+1) + ": " + myarray[i]);
        //console.log("---");
    });

});

</script>
@stop




