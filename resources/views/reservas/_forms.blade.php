
<div class="row">
    <div class="col-md-6">
    {!! Form::select('cliente_id', 'Cliente', [null => 'Selecione...'] + $clientes->pluck('nome', 'id')->all())->attrs(['class' => 'select2', 'style' => 'width: 100%;'])->required() !!}
    </div>
    <div class="col-md-3">
    {!!Form::date('dataRetirada', 'Data da Retirada')->value(isset($item->date) ? ukDate($item->date) : now()->format('Y-m-d'))->min(now()->format('Y-m-d'))->required()!!}
    </div>
    <div class="col-md-3">
    {!!Form::date('dataRetorno', 'Data do Retorno')->value(isset($item->date) ? ukDate($item->date) : now()->addDays(1)->format('Y-m-d'))->min(now()->addDays(1)->format('Y-m-d'))->required()!!}
    </div>
    <div class="col-md-3">
        {!! Form::text('valor', 'Valor Total')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->readonly()->required() !!}
    </div>
    <div class="col-md-3">
        {!! Form::text('desconto', 'Desconto em %')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 2, 'oninput' => "this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"])->required() !!}
    </div>
    <div class="col-md-4">
    {!! Form::select('status', 'Status', [0 => 'Cancelada', '1' => 'Reservada', 2 => 'Utilizada', 3 => 'Finalizada', 4 => 'Ultrapassada'])
        ->required()
        !!}
    </div>
    <!-- <div class="col-md-4">
        {!! Form::text('caracteristicas', 'Caracteristicas')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required() !!}
    </div> -->
    <div class="col-md-2">
    {!! Form::select('tipo', 'Tipo', ['Diaria' => 'Diaria', 'Pacote' => 'Pacote'])
        ->required()
        !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('descricao', 'Descrição')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()!!}
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

            <div class="col-md-12">
                    <div class="row ">
                        <div class="col-12">
                           <button type="submit"  class="btn btn-success float-right mt-4">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

