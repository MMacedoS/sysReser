
<div class="row">
    <div class="col-md-6">
       {!!Form::text('nome', 'Nome do Cliente')
        ->attrs(['class' => 'form-control'])
        !!}
       </div>
    <div class="col-md-2">
    {!! Form::select('status', 'Ativo', ['1' => 'Sim', 0 => 'Não'])
        ->required()
        !!}
    </div>
    <div class="col-md-4">
        {!! Form::text('nif', 'CPF/CNPJ')->attrs(['maxlength'=> 18, 'class' => 'form-control', 'style' => 'width: 100%;', 'oninput' => "if(this.value.length <= 11) { this.value = this.value.replace(/\D/g, ''); this.value = this.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})$/, '$1.$2.$3-$4') }else{ this.value = this.value.replace(/\D/g, ''); this.value = this.value.replace(/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})$/, '$1.$2.$3/$4-$5')  } "])->required()!!}
    </div>
    <div class="col-md-8">
        {!! Form::text('endereco', 'Endereço')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required() !!}
    </div>
    <div class="col-md-4">
        {!! Form::text('profissao', 'Profissão')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()!!}
    </div>
    <div class="col-md-2">
    {!! Form::select('tipo', 'Tipo', ['1' => 'Empresa', '0' => 'Fisica'])
        ->required()
        !!}
    </div>
    <div class="col-md-2">
        {!! Form::text('telefone', 'Telefone')->attrs([ 'maxlength' => 15 ,'class' => 'form-control', 'style' => 'width: 100%;', 'oninput' => "this.value = this.value.replace(/\D/g, ''); this.value = this.value.replace(/^(\d{2})(\d)/g, '($1) $2'); this.value = this.value.replace(/(\d{4})(\d{4})$/, '$1-$2')"])->required()!!}
    </div>
    <div class="col-md-4">
        {!! Form::text('celular', 'Celular')->attrs([ 'maxlength' => 15 ,'class' => 'form-control', 'style' => 'width: 100%;', 'oninput' => "this.value = this.value.replace(/\D/g, ''); this.value = this.value.replace(/^(\d{2})(\d)/g, '($1) $2'); this.value = this.value.replace(/(\d{1})(\d{4})(\d{4})$/, '$1 $2-$3')"])->required()!!}
    </div>
    <div class="col-md-4">
        {!! Form::text('email', 'E-mail')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->required()->type('email')!!}
    </div>

</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn btn-success float-right mt-4">Salvar</button>
    </div>
</div>


