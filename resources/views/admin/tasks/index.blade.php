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
                <a href="{{ route('tasks.form') }}" class="btn btn-primary float-end" > + Agregar</a>
                <table id="basic-datatable" class="table dt-responsive nowrap w-100">
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
                                    <a href="{{route('tasks.form', $task->id)}}"> Editar</a>
                                    <a href="{{route('tasks.form', $task->id)}}" class="text-danger"> Eliminar</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Sin informacion ...</td>
                            </tr>
                        @endforelse
                        
                    </tbody>
                </table>     
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection