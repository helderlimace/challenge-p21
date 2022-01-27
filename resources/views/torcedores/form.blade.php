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
                        <h1>Formulário Torcedor</h1>
                        @if(Request::is('*/edit'))
                            <form class="row g-3" action="{{ url('torcedores/update')  }}/{{ $torcedor->id  }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" value="{{ $torcedor->nome }}" id="nome"
                                           name="nome" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="number" class="form-control" id="documento"
                                           value="{{ $torcedor->documento }}" name="documento" required>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $torcedor->email }}" id="email"
                                           name="email"
                                           placeholder="email@email.com">
                                </div>
                                <div class="col-6">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="number" class="form-control" id="telefone"
                                           value="{{ $torcedor->telefone }}" name="telefone"
                                           placeholder="11988888888">
                                </div>
                                <div class="col-6">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco"
                                           value="{{ $torcedor->endereco }}" name="endereco"
                                           placeholder="Logradouro, Nº" required>
                                </div>
                                <div class="col-6">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" value="{{ $torcedor->bairro }}"
                                           name="bairro" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" value="{{ $torcedor->cidade }}"
                                           name="cidade" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="uf" class="form-label">Estado</label>
                                    <select id="uf" class="form-select" name="uf" required>
                                        <option value="AC" {{($torcedor->uf === 'AC') ? 'Selected' : ''}}>Acre</option>
                                        <option value="AL" {{($torcedor->uf === 'AL') ? 'Selected' : ''}}>Alagoas</option>
                                        <option value="AP" {{($torcedor->uf === 'AP') ? 'Selected' : ''}}>Amapá</option>
                                        <option value="AM" {{($torcedor->uf === 'AM') ? 'Selected' : ''}}>Amazonas</option>
                                        <option value="BA" {{($torcedor->uf === 'BA') ? 'Selected' : ''}}>Bahia</option>
                                        <option value="CE" {{($torcedor->uf === 'CE') ? 'Selected' : ''}}>Ceará</option>
                                        <option value="DF" {{($torcedor->uf === 'DF') ? 'Selected' : ''}}>Distrito Federal</option>
                                        <option value="ES" {{($torcedor->uf === 'ES') ? 'Selected' : ''}}>Espírito Santo</option>
                                        <option value="GO" {{($torcedor->uf === 'GO') ? 'Selected' : ''}}>Goiás</option>
                                        <option value="MA" {{($torcedor->uf === 'MA') ? 'Selected' : ''}}>Maranhão</option>
                                        <option value="MT" {{($torcedor->uf === 'MT') ? 'Selected' : ''}}>Mato Grosso</option>
                                        <option value="MS" {{($torcedor->uf === 'MS') ? 'Selected' : ''}}>Mato Grosso do Sul</option>
                                        <option value="MG" {{($torcedor->uf === 'MG') ? 'Selected' : ''}}>Minas Gerais</option>
                                        <option value="PA" {{($torcedor->uf === 'PA') ? 'Selected' : ''}}>Pará</option>
                                        <option value="PB" {{($torcedor->uf === 'PB') ? 'Selected' : ''}}>Paraíba</option>
                                        <option value="PR" {{($torcedor->uf === 'PR') ? 'Selected' : ''}}>Paraná</option>
                                        <option value="PE" {{($torcedor->uf === 'PE') ? 'Selected' : ''}}>Pernambuco</option>
                                        <option value="PI" {{($torcedor->uf === 'PI') ? 'Selected' : ''}}>Piauí</option>
                                        <option value="RJ" {{($torcedor->uf === 'RJ') ? 'Selected' : ''}}>Rio de Janeiro</option>
                                        <option value="RN" {{($torcedor->uf === 'RN') ? 'Selected' : ''}}>Rio Grande do Norte</option>
                                        <option value="RS" {{($torcedor->uf === 'RS') ? 'Selected' : ''}}>Rio Grande do Sul</option>
                                        <option value="RO" {{($torcedor->uf === 'RO') ? 'Selected' : ''}}>Rondônia</option>
                                        <option value="RR" {{($torcedor->uf === 'RR') ? 'Selected' : ''}}>Roraima</option>
                                        <option value="SC" {{($torcedor->uf === 'SC') ? 'Selected' : ''}}>Santa Catarina</option>
                                        <option value="SP" {{($torcedor->uf === 'SP') ? 'Selected' : ''}}>São Paulo</option>
                                        <option value="SE" {{($torcedor->uf === 'SE') ? 'Selected' : ''}}>Sergipe</option>
                                        <option value="TO" {{($torcedor->uf === 'TO') ? 'Selected' : ''}}>Tocantins</option>
                                        <option value="EX" {{($torcedor->uf === 'EX') ? 'Selected' : ''}}>Estrangeiro</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" class="form-control" id="cep" value="{{ $torcedor->cep }}"
                                           name="cep" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="estado" class="form-label">Status</label>
                                    <select id="estado" class="form-select" name="ativo">
                                        <option value="1" {{($torcedor->ativo == '1') ? 'Selected' : ''}}>Ativo</option>
                                        <option value="0" {{($torcedor->ativo == '0') ? 'Selected' : ''}}>Inatico</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        @else
                            <form class="row g-3" action="{{ url('torcedores/add')  }}" method="POST">
                                @csrf
                                <div class="col-md-6">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" class="form-control" id="nome" name="nome" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="documento" class="form-label">Documento</label>
                                    <input type="number" class="form-control" id="documento" name="documento" required>
                                </div>
                                <div class="col-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="email@email.com">
                                </div>
                                <div class="col-6">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input type="number" class="form-control" id="telefone" name="telefone"
                                           placeholder="11988888888">
                                </div>
                                <div class="col-6">
                                    <label for="endereco" class="form-label">Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco"
                                           placeholder="Logradouro, Nº" required>
                                </div>
                                <div class="col-6">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="uf" class="form-label">Estado</label>
                                    <select id="uf" class="form-select" name="uf" required>
                                        <option value="AC">Acre</option>
                                        <option value="AL">Alagoas</option>
                                        <option value="AP">Amapá</option>
                                        <option value="AM">Amazonas</option>
                                        <option value="BA">Bahia</option>
                                        <option value="CE">Ceará</option>
                                        <option value="DF">Distrito Federal</option>
                                        <option value="ES">Espírito Santo</option>
                                        <option value="GO">Goiás</option>
                                        <option value="MA">Maranhão</option>
                                        <option value="MT">Mato Grosso</option>
                                        <option value="MS">Mato Grosso do Sul</option>
                                        <option value="MG">Minas Gerais</option>
                                        <option value="PA">Pará</option>
                                        <option value="PB">Paraíba</option>
                                        <option value="PR">Paraná</option>
                                        <option value="PE">Pernambuco</option>
                                        <option value="PI">Piauí</option>
                                        <option value="RJ">Rio de Janeiro</option>
                                        <option value="RN">Rio Grande do Norte</option>
                                        <option value="RS">Rio Grande do Sul</option>
                                        <option value="RO">Rondônia</option>
                                        <option value="RR">Roraima</option>
                                        <option value="SC">Santa Catarina</option>
                                        <option value="SP">São Paulo</option>
                                        <option value="SE">Sergipe</option>
                                        <option value="TO">Tocantins</option>
                                        <option value="EX">Estrangeiro</option>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label for="cep" class="form-label">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" required>
                                </div>
                                <div class="col-md-2">
                                    <label for="estado" class="form-label">Status</label>
                                    <select id="estado" class="form-select" name="ativo">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inatico</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
