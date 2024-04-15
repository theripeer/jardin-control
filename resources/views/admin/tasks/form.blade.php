@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    @isset($task)
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Editar</a></li>
                    @else
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Crear</a></li>
                    @endisset
                    <li class="breadcrumb-item active">Tarea</li>
                </ol>
            </div>
            <h4 class="page-title">Informacion de Tarea</h4>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="post" action="{{ route('tasks.form') }}" enctype="multipart/form-data" class="needs-validation" novalidate>
                    @csrf
                    <input type="hidden" name="id" value="@isset($task){{$task->id}}@endisset">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Cuadrilla</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2" required>
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}" @isset($task)
                                            {{$task->team_id == $team->id ? 'selected' : ''}}
                                        @endisset>{{$team->name}}</option>  
                                    @endforeach
                                </select>
                                
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Numero de Folio</label>
                                <input type="text" id="folio" style="text-transform:uppercase;" name="folio" class="form-control" @isset($task)
                                    value="{{$task->folio}}" 
                                @endisset required>
                                <span class="font-13 text-muted">e.g "xxxxxx-xxxxxx"</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Direccion</label>
                                <input type="text" id="simpleinput" name="address" class="form-control"  @isset($task)
                                    value="{{$task->address}}"
                                @endisset required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Especie</label>
                                <select class="select2 form-control" name="type_id" data-toggle="select2" required>
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}" @isset($task)
                                            {{$task->team_id == $team->id ? 'selected' : ''}}
                                        @endisset>{{$type->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Servicio</label>
                                <select class="select2 form-control" name="service_id" data-toggle="select2" required>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}" @isset($task)
                                            {{$task->team_id == $team->id ? 'selected' : ''}}
                                        @endisset>{{$service->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Cantidad Servicios</label>
                                <input type="text" id="simpleinput" name="quantity_services" class="form-control" required  @isset($task)
                                    value="{{$task->quantity_services}}"
                                @endisset>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">DAP</label>
                                <input type="text" id="simpleinput" name="dap" class="form-control" required @isset($task)
                                    value="{{$task->quantity_services}}"
                                @endisset>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Plazo de Cumplimiento</label>
                                <select class="select2 form-control" name="deadlines" data-toggle="select2" required>
                                    @for ($i = 1 ; $i <= 20; $i++)
                                        <option value="{{ $i }}" @isset($task)
                                            {{$task->deadlines ==$i ? 'selected' : ''}}
                                        @endisset>{{$i}}</option>  
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado Fitosanitario</label>
                                <select class="select2 form-control" name="state_phytosanitary" data-toggle="select2" required>
                                    @foreach ($sanitary as $data)
                                        <option value="{{ $data }}"@isset($task)
                                            {{$task->state_phytosanitary == $data ? 'selected' : ''}}
                                        @endisset>{{$data}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado</label>
                                <select class="select2 form-control" name="state" data-toggle="select2" required>
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}"@isset($task)
                                            {{$task->state == $state ? 'selected' : ''}}
                                        @endisset>{{$state}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado Pago</label>
                                <select class="select2 form-control" name="payment_state" data-toggle="select2" required>
                                    @foreach ($states_payment as $payment)
                                        <option value="{{ $payment }}"@isset($task)
                                            {{$task->payment_state == $payment ? 'selected' : ''}}
                                        @endisset>{{$payment}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Imagen 1</label>
                                <input type="file" name="img_1" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Imagen 2</label>
                                <input type="file" name="img_2" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="simpleinput" class="form-label">Observacion</label>
                            <textarea name="observation" class="form-control" id="" cols="30" rows="5"> @isset($task) {{$task->observation}}  @endisset</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 mt-1">
                                <label for="simpleinput" class="form-label">Imagen 3</label>
                                <input type="file" name="img_3" id="" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 mt-1">
                                <label for="simpleinput" class="form-label">Imagen 4</label>
                                <input type="file" name="img_4" id="" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-3">
                            @isset($task)
                             @if ($task->getImage($task->img_1) && $task->img_1)
                                <a target="_blank" href="{{ asset("images/task/$task->folio/$task->img_1")}}" class="btn btn-primary"> Imagen 1</a>
                             @endif
                            @endisset
                        </div>
                        <div class="col-3">
                            @isset($task)
                             @if ($task->getImage($task->img_2) && $task->img_2)
                                <a target="_blank" href="{{ asset("images/task/$task->folio/$task->img_2")}}" class="btn btn-primary"> Imagen 2</a>
                             @endif
                            @endisset
                        </div>
                        <div class="col-3">
                            @isset($task)
                             @if ($task->getImage($task->img_3) && $task->img_3)
                                <a target="_blank" href="{{ asset("images/task/$task->folio/$task->img_3")}}" class="btn btn-primary"> Imagen 3</a>
                             @endif
                            @endisset
                        </div>
                        <div class="col-3">
                            @isset($task)
                             @if ($task->getImage($task->img_4) && $task->img_4)
                                <a target="_blank" href="{{ asset("images/task/$task->folio/$task->img_4")}}" class="btn btn-primary"> Imagen 4</a>
                             @endif
                            @endisset
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div class="md-3 mt-4 float-end">
                                <button class="btn btn-primary" type="submit"> Guardar </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    let $ = jQuery;

    $(document).ready(function() {
        $('#folio').mask('AAAAAA-AAAAAA', 
            {
                'translation': {
                    A: {pattern: /[A-Za-z0-9]/}
                },
                'definitions': {
                    A: { casing: "upper" }
                }
            }
        );
    });
</script>
@endpush