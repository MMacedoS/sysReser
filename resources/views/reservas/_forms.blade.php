
<div class="row">
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
        {!! Form::select('status', 'Status', ['1' => 'Reservada', 2 => 'Utilizada', 3 => 'Finalizada', 4 => 'Ultrapassada', 0 => 'Cancelada'])
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
    <div class="col-md-9">
        {!! Form::text('endereco', 'Endereço')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()!!}
    </div>

    <div class="col-md-3">
        {!! Form::text('telefone', 'Telefone')->attrs([ 'maxlength' => 15 ,'class' => 'form-control', 'style' => 'width: 100%;', 'oninput' => "this.value = this.value.replace(/\D/g, ''); this.value = this.value.replace(/^(\d{2})(\d)/g, '($1) $2'); this.value = this.value.replace(/(\d{4})(\d{4})$/, '$1-$2')"])->required()!!}
    </div>



            <div class="col-md-12">
                    <div class="row ">
                        <div class="col-12">
                           <button type="submit"  class="btn btn-success float-right mt-4">Salvar</button>
                        </div>
                    </div>
                </div>
            </div>

