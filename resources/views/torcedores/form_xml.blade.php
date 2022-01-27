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
                        <h1>Importar XML</h1>
                        <form class="row g-3" action="{{ url('torcedores/import/xml/store')  }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="xml">Upload</label>
                                <input type="file" name="xml" class="form-control" id="xml" required>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Importar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
