@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Detalles del Caso</strong>
                    </div>

                    <div class="card-body">
                        <ul>
                            <li>{{ $case->title }}</li>
                            <li>{{ $case->description }}</li>
                            <li>{{ $case->status }}</li>
                            <li>{{ $case->user_id }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
