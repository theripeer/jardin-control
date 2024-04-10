@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Cuadrillas</a></li>
                    <li class="breadcrumb-item active">Listado</li>
                </ol>
            </div>
        </div>
    </div>
</div>  
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <a href="{{route('teams.form')}}" class="btn btn-primary float-end"> + Agregar</a>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Personas</th>
                            <th width="20%">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                            <td>{{$team->name}}</td>
                            <td>{{$team->countUsers()}}</td>
                            <td>
                                <a href="{{route('teams.form', $team->id)}}"> Editar</a>
                                <a href="javascript:void(0)" class="text-danger delete" row-id="{{$team->id}}"> Eliminar</a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="mt-3">
                    {!! $teams->links('pagination::bootstrap-5') !!}
                </div>    
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection

@push('script')
    <script>
        let $ = jQuery;
        $(document).ready(function(){
            $('.delete').on('click', function(e) {
                e.preventDefault();
                Swal.fire({
                    title: 'Estas seguro que desea eliminar este registro?',
                    text: "Una vez eliminado no podra reutilizar su informacion!",
                    icon: 'error',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, Eliminar!',
                    cancelButtonText: 'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let url = "{{ route('teams.delete', ':id') }}"
                        url = url.replace(':id', $(this).attr('row-id'));
                        $.ajax({
                            type: 'GET',
                            url: url,
                            success: function(res) {
                                Swal.fire(
                                    'Eliminado!',
                                    'Se ha eliminado el registro exitosamente',
                                    'success'
                                );
                                window.location.reload();
                            },
                            error: function(err) {
                                Swal.fire(
                                    'Info!',
                                    err.responseJSON.message,
                                    'warning'
                                );
                            }
                        })
                    }
                })
            });
        })
    </script>
@endpush