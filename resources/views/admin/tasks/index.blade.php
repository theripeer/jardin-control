@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tareas</a></li>
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
                <form action="">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Busqueda</label>
                                <input type="text" class="form-control" id="search" name="term" value="{{$term}}" placeholder="Buscar ...">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group" style="padding-top: 21px;">
                                <button type="submit" class="btn btn-primary rounded" data-toggle="tooltip" title="Buscar"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card" style="overflow-y: auto;">
            <div class="card-body">
                @if(in_array(auth()->user()->rol, ['Administrador', 'Supervisor']))
                    <a href="{{ route('tasks.form') }}" class="btn btn-primary float-end"> + Agregar</a>
                @endif
                <table id="basic-datatable" class="table dt-responsive" >
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Servicio</th>
                            <th>Cuadrilla</th>
                            <th>Especie</th>
                            <th>Estado</th>
                            <th>Estado Pago</th>
                            <th width="20%">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($tasks as $task)
                            <tr>
                                <td>{{$task->folio}}</td>
                                <td>{{$task->service->name}}</td>
                                <td>{{$task->team->name}}</td>
                                <td>{{$task->type->name}}</td>
                                <td>{{$task->state}}</td>
                                <td>{{$task->payment_state}}</td>
                                <td>
                                    @if(in_array(auth()->user()->rol, ['Administrador', 'Supervisor']))
                                        <a href="{{route('tasks.form', $task->id)}}"> Editar</a>
                                        <a href="javascript:void(0)" class="text-danger delete" row-id="{{$task->id}}"> Eliminar</a>
                                    @else
                                        <a href="{{route('tasks.form', $task->id)}}"> Ver</a>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Sin informacion ...</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>
                <div class="mt-3">
                    {!! $tasks->links('pagination::bootstrap-5') !!}
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
                        let url = "{{ route('tasks.delete', ':id') }}"
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