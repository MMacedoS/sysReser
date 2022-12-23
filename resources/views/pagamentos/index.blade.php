@extends('layouts.app', ['page' => 'pagamento', 'pageSlug' => 'pagamento'])

@section('content')

<div class="row mt-3">
    <div class="col-12 text-right">
        <a href="{{ route('reserva.index') }}" class="btn btn-sm btn-primary">Voltar</a>
    </div>
    <div class="col-sm-12 ">
        <h4>Adição de Pagamentos na Reserva</h4>
    </div>
    <div class="col-sm-3 mt-3">
        <p><b>Cliente:</b>
        {{ $item->cliente->nome }}</p>
    </div>
    <div class="col-sm-3 mt-3">
        <p><b>Valor R$:</b>
        {{ money($item->valor - $item->saldo) }}</p>
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
                                <input type="hidden" readonly="true" name="reserva_id" id="" value="{{ $item->id }}">
                                <input type="hidden" readonly="true" name="entrega" id="" value="{{ $item->dataRetorno }}">
                                <div class="col-md-5">
                                    {!!Form::select('tipo', 'Tipo de Pagamentos', [null => 'Selecione...', 'credito' => 'Cartão de Crédito', 'debito' => 'Cartão de Débito', 'dinheiro' => 'Dinheiro', 'pix' => 'Pix'])->required()!!}
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('valor', 'Valor')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 4, 'step' => '0.01', ])->min(0)->max($item->valor - $item->saldo)->type('number')->required() !!}
                                </div>
                                <div class="col-md-3">
                                <button class="btn btn-success mt-4" id="btn-add" type="button"><i class="fas fa-plus"></i> Adicionar
                                    Pagamento</button>
                                </div>
                        </div>

                        {!! Form::close() !!}


                        <div class="row">
                            <hr class="bg-secondary w-100">
                        </div>
                        <div class="row">
                            <div class="table-responsive ml-4">
                            <table id="tabela" class="table table-dynamic">
                                    <thead>
                                        <tr class="conteudo-th">
                                            <th class="data">Código</th>
                                            <th class="values">Tipo</th>
                                            <th class="values">Valor</th>
                                            <th class="values">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lista">
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

@endsection

@push('js')
    <script>

        $(function(){

            var id = "{{ $item->id }}";

            $.get(getUrl() + "/api/v1/getPagamento/" + id, function(response){

                table(response);

                });
        });

        $('#btn-add').on('click', function(e)
        {
            if($('#inp-valor').val() > (parseFloat('{{ $item->valor }}') - parseFloat('{{ $item->saldo }}')))
            {
                alert('Valor acima do valor Total da reserva');
            }else{
                var form  = $('#form-save').serialize();

                $.post(getUrl() + '/api/v1/addPagamento', form ,function(response){
                    table(response);
                });
            }

        });

        function table(data)
        {
            var tr = "";

            data.forEach(element => {
                tr += "<tr>";

                    tr += "<td>";
                        tr += element.id
                    tr += "</td>";

                    tr += "<td>";
                        tr += element.tipo
                    tr += "</td>";

                    tr += "<td>";
                        tr += parseFloat(element.valor).toFixed(2)
                    tr += "</td>";

                    tr += "<td>";
                        tr += '<a href="'+getUrl()+"/api/v1/addPagamento/"+ element.id +"/delete"+'">remover</a>';
                    tr += "</td>";

                tr += "</tr>";
            });

            $('#lista').html(tr);
        }
    </script>
@endpush
