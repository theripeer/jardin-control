@extends('layout.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                    <li class="breadcrumb-item active">Form Elements</li>
                </ol>
            </div>
            <h4 class="page-title">Form Elements</h4>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12"> 
        <div class="card">
            <div class="card-body">
                <form method="post" action="{{ route('types.form') }}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Cuadrilla</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($teams as $team)
                                        <option value="{{ $team->id }}">{{$team->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Numero de Folio</label>
                                <input type="text" id="simpleinput" name="folio" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Direccion</label>
                                <input type="text" id="simpleinput" name="address" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Especie</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($types as $type)
                                        <option value="{{ $type->id }}">{{$type->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Servicio</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}">{{$service->name}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Cantidad Servicios</label>
                                <input type="text" id="simpleinput" name="qantity" class="form-control">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">DAP</label>
                                <input type="text" id="simpleinput" name="dap" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Plazo de Cumplimiento</label>
                                <select class="select2 form-control" name="deadlines" data-toggle="select2">
                                    @for ($i = 1 ; $i <= 20; $i++)
                                        <option value="{{ $i }}">{{$i}}</option>  
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado Fitosanitario</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($sanitary as $data)
                                        <option value="{{ $data }}">{{$data}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}">{{$state}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="simpleinput" class="form-label">Estado Pago</label>
                                <select class="select2 form-control" name="team_id" data-toggle="select2">
                                    @foreach ($states_payment as $payment)
                                        <option value="{{ $payment }}">{{$payment}}</option>  
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
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

<script>

</script>