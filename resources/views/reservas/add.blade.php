@extends('layouts.app', ['page' => 'reserva', 'pageSlug' => 'reserva'])

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h4>Adição de materiais na reserva</h4>
    </div>
    <div class="col-sm-6">
        <p><b>Cliente:</b>
        {{ $item->cliente->nome }}</p>
    </div>
    <div class="col-sm-6">
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
                            <div class="table-responsive">
                                <table id="tabela" class="table table-dynamic">
                                    <thead>
                                        <tr class="conteudo-th">
                                            <th class="op"></th>
                                            <th class="data">Produto/Serviço</th>
                                            <th  class="op">Un. Medida</th>
                                            <th class="values">Qtde</th>
                                            <th class="values">Vl.Unit</th>
                                            <th class="values">Desconto</th>
                                            <th class="values">Total do Item(R$)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="dynamic-form">
                                            <td>
                                                <button type="button" class="btn-sm btn-danger btn-remove"><i
                                                        class="fas fa-trash"></i></button>
                                            </td>
                                            <td>
                                                <div class="form-group" style="width:250px">
                                                    <label for="product"></label>
                                                    <select name="product[]" class="form-control product " required>
                                                        <option value="">Selecione</option>
                                                            @foreach($produtos as $produto)
                                                                <option value="{{ $produto->id }}">{{ $produto->nome }}</option>
                                                            @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                            <td>
                                                {!!Form::text('um[]')
                                                ->readonly()
                                                ->required()
                                                !!}
                                            </td>
                                            <td>
                                                {!!Form::text('quantity[]')
                                                ->attrs(['class' => 'quantity', 'step' => '0.01' ])->min('0')->type('number')
                                                ->required()
                                                !!}
                                            </td>
                                            <td>
                                                {!!Form::text('value_unit[]')
                                                ->attrs(['class' => 'money value', 'step' => '0.01' ])->min('0')->type('number')
                                                ->required()
                                                !!}
                                            </td>
                                            <td>
                                                {!!Form::text('desconto[]')
                                                ->attrs(['class' => 'money value', 'step' => '0.01' ])->min('0')->type('number')
                                                ->required()
                                                !!}
                                            </td>
                                            <td>
                                                {!!Form::text('total[]')
                                                ->attrs(['class' => 'money value'])->readonly()
                                                ->required()
                                                !!}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row increment mt-3">
                            <div class="col-12">
                                <button class="btn btn-success btn-add" type="button"><i class="fas fa-plus"></i>Adicionar
                                    Item</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
