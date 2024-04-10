@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('types.form') }}">
                @csrf
                <input type="hidden" name="id" value="@isset($type){{$type->id}}@endisset">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nombre Especie</label>
                            <input type="text" id="simpleinput" name="name" class="form-control" value="@isset($type){{$type->name}}@endisset">
                        </div>
                    </div>
                    <input type="hidden" name="is_active" id="is_active" @isset($type)
                        {{ $type->is_active ? 1 : 0}}
                    @endisset>
                    <div class="col-6">    
                        <div class="form-check mb-2 mt-4">
                            <input type="checkbox" class="form-check-input" id="customCheckcolor1" onclick="checkbox()" @isset($type)
                        {{ $type->is_active ? 'checked' : ''}}
                    @endisset>
                            <label class="form-check-label" for="customCheckcolor1">Activo</label>
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

    function checkbox() {
        let checkBox = document.getElementById("customCheckcolor1");
        let input = document.getElementById("is_active");

        if (checkBox.checked == true){
        input.value = 1;
        } else {
        input.value = 0;
        }
    }

    /* $(document).ready(function(){
        $('#customCheckcolor1').on('click', function(){
            alert()
        })
    }) */
</script>