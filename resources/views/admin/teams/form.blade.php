@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('teams.form') }}">
                @csrf
                <input type="hidden" name="id" class="form-control" @isset($team)
                                value="{{$team->id}}"
                            @endisset>
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nombre Cuadrilla</label>
                            <input type="text" id="simpleinput" name="name" class="form-control" @isset($team)
                                value="{{$team->name}}"
                            @endisset>
                        </div>
                    </div>
                     <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Usuarios</label>
                            <select class="select2 form-control select2-multiple" name="users[]" data-toggle="select2" multiple="multiple">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        @isset($team)
                                            {{ in_array($user->id, $teamusers) ? 'selected' : '' }}
                                        @endisset    
                                    >{{$user->name}}</option>  
                                @endforeach
                            </select>
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