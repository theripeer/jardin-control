@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('services.form') }}">
                @csrf
                <input type="hidden" name="id" value="@isset($service){{$service->id}}@endisset">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nombre Servicio</label>
                            <input type="text" id="simpleinput" name="name" class="form-control" value="@isset($service){{$service->name}}@endisset">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Precio</label>
                            <input type="text" id="simpleinput" name="price" class="form-control" value="@isset($service){{$service->price}}@endisset">
                        </div>
                    </div>
                </div>
                
                <div class="row">

                <div class="col-12">
                    <div class="md-3 float-end">
                        <button class="btn btn-primary" type="submit"> Guardar </button>
                    </div>
                </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
</script>