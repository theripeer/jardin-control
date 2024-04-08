@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('services.form') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nombre Servicio</label>
                            <input type="text" id="simpleinput" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Precio</label>
                            <input type="text" id="simpleinput" name="price" class="form-control">
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