@extends('layouts.app', ['page' => 'reserva', 'pageSlug' => 'reserva'])

@section('content')

<div class="row mt-3">
    <div class="col-12 text-right">
        <a href="{{ route('reserva.index') }}" class="btn btn-sm btn-primary">Voltar</a>
    </div>
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
                                <input type="hidden" readonly="true" name="reserva_id" id="" value="{{ $item->id }}">
                                <input type="hidden" readonly="true" name="entrega" id="" value="{{ $item->dataRetorno }}">
                                <div class="col-md-5">
                                    {!!Form::select('material_id', 'Material', [null => 'Selecione...'] + $produtos->pluck('nome', 'id')->all())->required()!!}
                                </div>
                                <div class="col-md-2">
                                    {!! Form::text('quantidade', 'Quantidade')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 4, 'oninput' => "this.value = this.value.replace(/[^0-9]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');"])->required() !!}
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('valor', 'Valor Uni.')->attrs(['class' => 'form-control', 'style' => 'width: 100%;', 'maxlength' => 4, 'step' => '0.01', ])->min(0)->type('number')->required() !!}
                                </div>
                                <div class="col-md-3">
                                    {!! Form::text('total', 'Total')->attrs(['class' => 'form-control', 'style' => 'width: 100%;'])->readonly()->required() !!}
                                </div>
                        </div>
                        <div class="row">
                                <button class="btn btn-success mt-4" id="btn-add" type="button"><i class="fas fa-plus"></i> Adicionar
                                    Item</button>
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
                                            <th class="data">Material</th>
                                            <th class="values">Qtde</th>
                                            <th class="values">Vl.Unit</th>
                                            <th class="values">Total do Item(R$)</th>
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

            $.get(getUrl() + "/api/v1/getProduto/" + id, function(response){

                table(response);

                });
        });

        $('#inp-material_id').on('change', function()
        {
            var id = $(this).val();
            if(id != '')
            {
                $.get(getUrl() + "/api/v1/addProduto/"+id, function(response){
                    console.log(response);
                    $('#inp-quantidade').val(1);
                    $('#inp-valor').val(parseFloat(response.valor).toFixed(2));
                    $('#inp-total').val((parseFloat(response.valor) * 1).toFixed(2));
                });
            }
        });

        $('#inp-quantidade').on('keyup', function()
        {
            console.log($(this).val());
            var valor = $('#inp-valor').val();
            $('#inp-total').val((parseFloat(valor) * $(this).val()).toFixed(2));

        });

        $('#btn-add').on('click', function(e)
        {
            var form  = $('#form-save').serialize();

            $.post(getUrl() + '/api/v1/addProduto', form ,function(response){
                table(response);
            });

        });

        function table(data)
        {
            var tr = "";

            data.forEach(element => {
                tr += "<tr>";

                    tr += "<td>";
                        tr += element.material.nome
                    tr += "</td>";

                    tr += "<td>";
                        tr += element.quantidade
                    tr += "</td>";

                    tr += "<td>";
                        tr += element.valor
                    tr += "</td>";

                    tr += "<td>";
                        tr += element.total
                    tr += "</td>";

                    tr += "<td>";
                        tr += '<a href="'+getUrl()+"/api/v1/"+ element.id +"/delete"+'" >remover</a>';
                    tr += "</td>";

                tr += "</tr>";
            });

            $('#lista').html(tr);
        }
    </script>
@endpush
