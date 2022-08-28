@extends('layouts.app', ['page' => 'material', 'pageSlug' => 'material'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Informações do Cliente</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Nome: </strong></p>
                                    <p class="card-text">
                                        {{ $item->nome }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>CPF/CNPJ: </strong></p>
                                    <p class="card-text">
                                        {{ $item->nif }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Status: </strong></p>
                                    <p class="card-text">
                                        {{ $item->status ? 'Ativo':'Inativo' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Endereço: </strong></p>
                                    <p class="card-text">
                                        {{ $item->endereco }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Tipo: </strong></p>
                                    <p class="card-text">
                                        {{ $item->tipo ? 'Empresa' : 'Fisica' }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Telefone : </strong></p>
                                    <p class="card-text">
                                    {{$item->telefone ? $item->telefone : 'não inserido'}}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Celular: </strong></p>
                                    <p class="card-text">
                                        {{ $item->celular }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Email : </strong></p>
                                    <p class="card-text">
                                    {{$item->email ? $item->email : 'não inserido'}}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Profissão: </strong></p>
                                    <p class="card-text">
                                        {{ $item->profissao }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Dt. Criação: </strong></p>
                                    <p class="card-text">
                                        {{ $item->created_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Dt. Atualização: </strong></p>
                                    <p class="card-text">
                                        {{ $item->updated_at->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
