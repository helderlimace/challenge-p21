@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ url('comunicados/new')  }}">Novo Comunicado</a>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Lista de Torcedores</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titulo</th>
                                <th scope="col">Status</th>
                                <th scope="col">Agendados para</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comunicados as $comunicado)
                                <tr>
                                    <th scope="row">{{ $comunicado->id }}</th>
                                    <td>{{ $comunicado->titulo }}</td>
                                    <td>{{ $comunicado->status }}</td>
                                    <td>{{ $comunicado->dt_envio }}</td>
                                    @if($comunicado->status != 1)
                                    <td>
                                        <a href="comunicados/{{$comunicado->id}}/edit" class="btn btn-info">Editar</a>
                                    </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
