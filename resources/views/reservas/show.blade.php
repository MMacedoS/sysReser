@extends('layouts.app', ['page' => 'material', 'pageSlug' => 'material'])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Informações da Reserva</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('reserva.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Cliente: </strong></p>
                                    <p class="card-text">
                                        {{ $item->cliente->nome }}
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
                                    <p><strong>telefone: </strong></p>
                                    <p class="card-text">
                                     {{ $item->telefone }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Data Retirada : </strong></p>
                                    <p class="card-text">
                                    {{ brDate($item->dataRetirada)}}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Data Retorno: </strong></p>
                                    <p class="card-text">
                                        {{ brDate($item->dataRetorno)}}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="card-deck">
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Desconto: </strong></p>
                                    <p class="card-text">
                                    {{ $item->desconto}} %
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Valor Total: </strong></p>
                                    <p class="card-text">
                                    {{ money($item->valor) }}
                                    </p>
                                </div>
                            </div>
                            <div class="card m-2 shadow-sm">
                                <div class="card-body">
                                    <p><strong>Valor com Desconto: </strong></p>
                                    <p class="card-text">
                                       R$ {{ money($item->valor - ($item->valor * $item->desconto / 100)) }}
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
                    <div class="container">
                        <h4>Lista de material</h4>

                        <table class="table tablesorter table-hover">
                            <thead>
                                <th>Material</th>
                                <th>Tipo de Aluguel</th>
                                <th>Valor</th>
                                <th>Quantidade</th>
                                <th>Valor total</th>
                            </thead>

                            <tbody>
                                @php
                                    $valorTotal = 0;
                                @endphp
                                @foreach ($item->itens as $material )
                                    <tr>
                                        <td>{{ $material->material->nome }}</td>
                                        <td>{{ $material->material->tipo }}</td>
                                        <td>{{ $material->material->valor }}</td>
                                        <td>{{ $material->quantidade }}</td>
                                        @php
                                            $valorTotal +=  $material->quantidade * $material->material->valor;
                                        @endphp
                                        <td>{{ $material->quantidade * $material->material->valor }}</td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td colspan="1">Valor R$</td>
                                    <td colspan="1" class="float-right">{{ money($valorTotal) }}</td>
                                    <td colspan="2">Adicionais por Atrasos R$</td>
                                    <td colspan="1" class="float-right">{{ money($item->valor - $valorTotal) }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
