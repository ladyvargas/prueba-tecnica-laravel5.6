@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @if(isset($case))
                <form method="post" action="{{ url('case/'.$case->id) }}">
                    <input name="_method" type="hidden" value="PUT">
                    @else
                    <form method="post" action="{{ url('case') }}">
                        @endif
                        <div class="card-header">
                            <strong>
                                @if(isset($case))
                                Editar Caso
                                @else
                                Agregar Caso
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
                                <label for="title" class="col-2 col-form-label">Titulo:</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="title"
                                        value="{{ isset($case->title) ? $case->title : '' }}" id="title">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-2 col-form-label">Descripción :</label>
                                <div class="col-10">
                                    <input class="form-control" type="text" name="description"
                                        value="{{ isset($case->description) ? $case->description : '' }}" id="description">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status" class="col-2 col-form-label">Estado :</label>
                                <div class="col-10">
                                    <select class="form-control" name="status" id="status">
                                        <option value="open" {{ (isset($case) && $case->status == 'open') ? 'selected' : '' }}>Abierto</option>
                                        <option value="in_progress" {{ (isset($case) && $case->status == 'in_progress') ? 'selected' : '' }}>En Proceso</option>
                                        <option value="closed" {{ (isset($case) && $case->status == 'closed') ? 'selected' : '' }}>Cerrado</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="user_id" class="col-2 col-form-label">Usuarios :</label>
                                <div class="col-10">
                                    <select class="form-control" name="user_id" id="user_id">

                                        @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ (isset($case) && $case->user_id == $user->id) ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <input type="submit" class="btn btn-primary" value="Guardar">
                            <a href="{{ url('case') }}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
@endsection