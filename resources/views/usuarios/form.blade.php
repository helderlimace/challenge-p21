@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('usuarios')  }}">Voltar</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                            <h1>Formulário Usuário</h1>
                        @if(Request::is('*/edit'))
                            <form action="{{ url('usuarios/update')  }}/{{ $usuario->id  }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" placeholder="name@example.com">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                    <input type="email" name="email" value="{{ $usuario->email }}" class="form-control"
                                           placeholder="name@example.com">
                                </div>
                                <button class="btn btn-primary" type="submit">Atualizar</button>
                            </form>
                        @else
                            <form action="{{ url('usuarios/add')  }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Nome</label>
                                    <input type="text" name="name" class="form-control" required placeholder="Nome">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">E-mail</label>
                                    <input type="email" name="email" class="form-control" required
                                           placeholder="email@email.com">
                                </div>
                                <button class="btn btn-primary" type="submit">Cadastrar</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
