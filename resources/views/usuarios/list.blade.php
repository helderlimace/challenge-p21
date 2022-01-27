@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><a href="{{ url('usuarios/new')  }}">Novo usuário</a></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h1>Lista dos usuários</h1>
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usuarios as $u)
                                <tr>
                                    <th scope="row">{{ $u->id }}</th>
                                    <td>{{ $u->name }}</td>
                                    <td>{{ $u->email  }}</td>
                                    <td>
                                        <a href="usuarios/{{$u->id}}/edit" class="btn btn-info">Editar</a>
                                    </td>
                                    <td>
                                        <a href="usuarios/delete/{{$u->id}}" class="btn btn-danger">Excluir</a>
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
