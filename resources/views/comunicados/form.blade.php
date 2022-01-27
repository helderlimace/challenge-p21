@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ url('torcedores')  }}">Voltar</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <h1>Formulário Comunicado</h1>
                        @if(Request::is('*/edit'))
                                <form class="row g-3" action="{{ url('comunicados/update')  }}/{{ $comunicado->id  }}" method="POST">
                                    @csrf
                                    <div class="col-12s">
                                        <label for="titulo" class="form-label">Titulo</label>
                                        <input type="text" class="form-control" value="{{ $comunicado->titulo  }}" id="titulo"
                                               name="titulo" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="html" class="form-label">Corpo da mensagem</label>
                                        <textarea name="html" class="form-control" id="html" col="10" rows="5">{{ $comunicado->html  }}</textarea>
                                    </div>
                                    <div class="col-10">
                                        <label for="bairro" class="form-label">Data e hora do envio</label>
                                        <input type="datetime-local" value="{{ $comunicado->dt_envio  }}" class="form-control" id="bairro"
                                               name="dt_envio" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="status" class="form-label">Status</label>
                                        <select id="status" class="form-select" name="status">
                                            <option value="1">Enviado</option>
                                            <option value="0">Não enviado</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary">Agendar</button>
                                    </div>
                                </form>
                        @else
                            <form class="row g-3" action="{{ url('comunicados/add')  }}" method="POST">
                                @csrf
                                <div class="col-12s">
                                    <label for="titulo" class="form-label">Titulo</label>
                                    <input type="text" class="form-control" id="titulo"
                                            name="titulo" required>
                                </div>
                                <div class="form-group">
                                    <label for="html" class="form-label">Corpo da mensagem</label>
                                    <textarea name="html" class="form-control" id="html" col="10" rows="5"></textarea>
                                </div>
                                <div class="col-10">
                                    <label for="bairro" class="form-label">Data e hora do envio</label>
                                    <input type="datetime-local" class="form-control" id="bairro"
                                           name="dt_envio" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="status" class="form-label">Status</label>
                                    <select id="status" class="form-select" name="status">
                                        <option value="1">Enviado</option>
                                        <option value="0">Não enviado</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Agendar</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
