@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div></div>
                        <a href="{{ url('user/create') }}" class="btn btn-primary btn-sm float-right"><span
                                    class="glyphicon glyphicon-plus"></span>Agregar Usuarios</a>
                    </div>
                    <div class="card-body">
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th width="200px">Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($user as $item)
                                <tr>
                                    <td>{{ $item['id'] }}</td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['email'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('user/'.$item['id']. '/edit') }}" class="btn btn-info btn-sm">Editar</a>
                                        <!-- Button Delete -->
                                        <form method="post" action="{{ url('user/'.$item['id']) }}" style="display:inline;">
                                         @csrf
                                        <input type="hidden" name="_method" value="delete" >
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">No hay información</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer" style="padding-bottom: 0px;">
                        {!! $user->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
