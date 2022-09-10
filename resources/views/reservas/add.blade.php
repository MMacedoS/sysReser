@extends('layouts.app', ['page' => 'reserva', 'pageSlug' => 'reserva'])

@section('content')

<div class="row mt-3">
    <div class="col-sm-12 ">
        <h4>Adição de materiais na reserva</h4>
    </div>
    <div class="col-sm-6 mt-3">
        <p><b>Cliente:</b>
        {{ $item->cliente->nome }}</p>
    </div>
    <div class="col-sm-3 mt-3">
        <p><b>Data de Retirada:</b>
        {{ brDate($item->dataRetirada) }}</p>
    </div>
    <div class="col-sm-3 mt-3">
        <p><b>Data de retorno:</b>
        {{ brDate($item->dataRetorno) }}</p>
    </div>

</div>

  <!-- Itens -->
  <div class="row">
            <div class="tab-content col-12">
                <div id="home" class="tab-pane fade show active">
                    <div class="painel-body">
                        <div class="row">
                            <hr class="bg-primary w-100">
                        </div>

                        {!!Form::open()
                        ->post()
                        ->id('form-save')!!}
                        <div class="row">
                                <div class="col-md-4">
                                    {!!Form::select('material_id', 'Material', [null => 'Selecione...'] + $produtos->pluck('nome', 'id')->all())->required()!!}
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('estoque', 'Em Estoque')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()->disabled() !!}
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('quatidade', 'Quantidade')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 4, 'oninput' => "this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"])->required() !!}
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('valor', 'Valor Uni.')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 4, 'step' => '0.01', ])->min(0)->type('number')->required() !!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('total', 'Total')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->readonly()->required() !!}
                                </div>
                        </div>
                        <div class="row">
                                <button class="btn btn-success btn-add mt-4" type="button"><i class="fas fa-plus"></i> Adicionar
                                    Item</button>
                        </div>
                        {!! Form::close() !!}


                        <div class="row">
                            <hr class="bg-secondary w-100">
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                            <table id="tabela" class="table table-dynamic">
                                    <thead>
                                        <tr class="conteudo-th">
                                            <th class="op"></th>
                                            <th class="data">Produto/Serviço</th>
                                            <th class="values">Qtde</th>
                                            <th class="values">Vl.Unit</th>
                                            <th class="values">Total do Item(R$)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
@endsection
