@extends('adminlte::page')

@section('plugins.Sweetalert2', true)

@section('js')
    <script>
        function ConfirmaExclusao(id){
            swal.fire({
                title: 'Confirma exclusão?',
                text: "Esta ação não podera ser revertida!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'sim, excluir',
                cancelButtonText: 'Cancelar!',
                closeOnConfirm: false,
                focusCancel: true,
            }).then(function(isConfirm){
                if (isConfirm.value) {
                    $.get('/' + @yield('table-delete') + '/destroy?id=' + id, function(data) {
                        //success data
                        console.log(data);
                        if(data.status == 200) {
                            swal.fire(
                            "Deletado!",
                            "Exclusão confirmada.",
                            "success"
                            ).then(function() {
                                window.location.reload();
                            });
                        } else {
                            swal.fire(
                            "Erro!",
                            "Ocorreram erros na exclusão. Entre em contato com o suporte.",
                            "error"
                            );
                        }
                    });
                }
            })
        }
    </script>
@stop


