@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div></div>
                    <a href="{{ url('case/create') }}" class="btn btn-primary btn-sm float-right"><span
                            class="glyphicon glyphicon-plus"></span>Agregar Casos</a>
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
                                <th>Título</th>
                                <th>Descripcíon</th>
                                <th>Estado</th>
                                <th>Usuario</th>
                                <th width="200px">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($case as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['title'] }}</td>
                                <td>{{ $item['description'] }}</td>
                                <td>{{ $item['status'] }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td class="text-center">
                                    @if(Auth::id() == $item->user_id)
                                    <a href="{{ url('case/'.$item['id']. '/edit') }}" class="btn btn-info btn-sm">Editar</a>
                                    <form method="post" action="{{ url('case/'.$item['id']) }}" style="display:inline;">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    @else
                                    <button class="btn btn-info btn-sm" onclick="showAlert('Editar')">Editar</button>
                                    <button class="btn btn-danger btn-sm" onclick="showAlert('Eliminar')">Eliminar</button>
                                    @endif
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
                    {!! $case->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showAlert(action) {
        alert('No tienes permiso para ' + action + ' este caso.');
    }
</script>
@endsection