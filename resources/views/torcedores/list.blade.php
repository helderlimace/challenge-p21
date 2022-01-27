@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a class="btn btn-primary" href="{{ url('torcedores/new')  }}">Novo Torcedor</a>
                        <a class="btn btn-secondary" href="{{ url('torcedores/import/planilha')  }}">Importar Planilha</a>
                        <a class="btn btn-secondary" href="{{ url('torcedores/import/xml')  }}">Importar XML</a>
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
                                <th scope="col">Nome</th>
                                <th scope="col">Documento</th>
                                <th scope="col">E-mail</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($torcedores as $torcedor)
                                <tr>
                                    <th scope="row">{{ $torcedor->id }}</th>
                                    <td>{{ $torcedor->nome }}</td>
                                    <td>{{ $torcedor->documento }}</td>
                                    <td>{{ $torcedor->email  }}</td>
                                    <td>
                                        <a href="torcedores/{{$torcedor->id}}/edit" class="btn btn-info">Editar</a>
                                    </td>
                                    <td>
                                        <a href="torcedores/delete/{{$torcedor->id}}" class="btn btn-danger">Excluir</a>
                                    </td>
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
