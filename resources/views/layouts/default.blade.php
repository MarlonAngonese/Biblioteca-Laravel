@extends('adminlte::page')

@section('plugins.Sweetalert2',true)

@section('js')
    <script>
        function ConfirmDelete(id) {
            swal.fire({
                title: "Confirma a exclusão?",
                text: "Esta ação não poderá ser revertida!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3086d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Sim, excluir!",
                cancelButtonText: "Cancelar!",
            }).then(function(result) {
                if (result.value) {
                    $.get('/' + @yield('table-delete') + '/delete/' + id, function(data) {
                        swal.fire(
                            'Deletado!',
                            'Exclusão confirmada.',
                            'success'
                        ).then(function() {
                            window.location.reload();
                        })
                    })
                }
            })
        }
    </script>
@stop