@extends('layout.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('users.form') }}">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Nombre</label>
                            <input type="text" id="simpleinput" name="name" class="form-control" @isset($user)
                                value="{{$user->name}}"
                            @endisset>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Usuario</label>
                            <input type="text" id="simpleinput" name="username" class="form-control"@isset($user)
                                value="{{$user->username}}"
                            @endisset>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Correo</label>
                            <input type="text" id="simpleinput" name="email" class="form-control"@isset($user)
                                value="{{$user->email}}"
                            @endisset>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Rol</label>
                            <select class="select2 form-control" name="rol" data-toggle="select2">
                                <option value="Administrador"@isset($user)
                               {{ $user->rol == "Administrador" ? "selected": ""}}
                            @endisset>Administrador</option>
                                <option value="Supervisor"@isset($user)
                                {{ $user->rol == "Supervisor" ? "selected": ""}}
                            @endisset>Supervisor</option>
                                <option value="Cuadrilla"@isset($user)
                                {{ $user->rol == "Cuadrilla" ? "selected": ""}}
                            @endisset>Cuadrilla</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Contraseña</label>
                            <input type="text" id="simpleinput" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Repita Contraseña</label>
                            <input type="text" id="simpleinput" name="password_confirmation" class="form-control">
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