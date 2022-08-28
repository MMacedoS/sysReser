
<div class="row">
    <div class="col-md-8">
       {!!Form::text('nome', 'Nome do material')
        ->attrs(['class' => 'form-control'])
        !!}
    </div>
    <div class="col-md-2">
    {!!Form::text('valor', 'Valor')
                        ->attrs(['maxlength' => 7, 'step' => '0.01', 'min' => '0.00', 'value' => '0.00'])->type('number')
                        ->required()
                        !!}
    </div>
    <div class="col-md-2">
    {!! Form::select('status', 'Ativo', ['1' => 'Sim', 0 => 'Não'])
        ->required()
        !!}
    </div>
    <div class="col-md-6">
        {!! Form::text('caracteristicas', 'Caracteristicas')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required() !!}
    </div>
    <div class="col-md-2">
    {!! Form::select('tipo', 'Tipo', ['Diaria' => 'Diaria', 'Pacote' => 'Pacote'])
        ->required()
        !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('descricao', 'Descrição')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()!!}
    </div>

</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>


