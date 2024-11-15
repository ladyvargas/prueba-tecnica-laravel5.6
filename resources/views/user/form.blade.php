@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(isset($user))
                <form method="post" action="{{ url('user/'.$user->id) }}">
                    <input name="_method" type="hidden" value="PUT">
                    @else
                    <form method="post" action="{{ url('user') }}">
                        @endif
                        <div class="card-header">
                            <strong>
                                @if(isset($user))
                                Editar Usuaurio
                                @else
                                Agregar Usuaurio
                                @endif
                            </strong>
                        </div>

                        <div class="card-body">
                            @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error  }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-2 col-form-label">Nombre:</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="name"
                                        value="{{ isset($user->name) ? $user->name : '' }}" id="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-2 col-form-label">Correo :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="email"
                                        value="{{ isset($user->email) ? $user->description : '' }}" id="email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-2 col-form-label">Contraseña :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="password"
                                        value="{{ isset($user->password) ? $user->password : '' }}" id="password">
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                            <a href="{{ url('user') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection