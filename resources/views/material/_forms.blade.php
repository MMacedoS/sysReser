
<div class="row">
    <div class="col-md-4">
       {!!Form::text('nome', 'Nome do material')
        ->attrs(['class' => 'form-control'])
        !!}
    </div>
    <div class="col-md-4">
        {!! Form::text('descricao', 'Descrição')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()->readonly(isset($item)? true : false ) !!}
    </div>
    <div class="col-md-6">
    {!! Form::select('', 'Conta Bancária')->id('account_id')
        ->options()
        ->attrs(['class' => 'select2'])
        ->required()
        !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('wallet', 'Carteira')->attrs(['maxlength' => '2'])->required() !!}
    </div>
    <div class="col-md-4">
        {!!Form::text('gw_dev_app_key','GW_DEV_APP_KEY')->required()!!}
    </div>
    <div class="col-md-8">
        {!!Form::text('client_id','CLIENT_ID')->required()!!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('client_secret','CLIENT_SECRET')->required()!!}
    </div>
    <div class="col-md-12">
        {!!Form::textarea('authorization','AUTHORIZATION')->required()!!}
    </div>
    <div class="col-md-2">
        {!! Form::select('sandbox', 'Sandbox', ['' => 'Selecione', 1 => 'Sim', 0 => 'Não'])->required() !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('wallet_variation', 'Variação da Carteira')->attrs(['maxlength' => '2'])->required() !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('contract', 'Contrato/Convênio')->attrs(['maxlength' => '7'])->required()->readonly(isset($item)? true : false ) !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('instructions_one', 'Instruções 1')->attrs(['maxlength' => 60]) !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('instructions_two', 'Instruções 2')->attrs(['maxlength' => 60]) !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('instructions_three', 'Instruções 3')->attrs(['maxlength' => 60]) !!}
    </div>
    <div class="col-md-12">
        {!! Form::text('instructions_four', 'Instruções 4')->attrs(['maxlength' => 60]) !!}
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>


