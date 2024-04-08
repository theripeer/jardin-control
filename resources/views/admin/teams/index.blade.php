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
                            <th width="20%">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $team)
                            <tr>
                            <td>{{$team->name}}</td>
                            <td>
                                <a href="{{route('teams.form', $team->id)}}"> Editar</a>
                                <a href="{{route('teams.form', $team->id)}}" class="text-danger"> Eliminar</a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                        
                    </tbody>
                </table>     
            </div> <!-- end card body-->
        </div> <!-- end card -->
    </div><!-- end col-->
</div>
@endsection