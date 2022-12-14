@extends('layouts.app', ['page' => 'reserva', 'pageSlug' => 'reserva'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Reserva</h4>
                        </div>

                            <div class="col-4 text-right">
                                <a href="{{ route('reserva.create') }}" class="btn btn-sm btn-primary">Adicionar Novo</a>
                            </div>

                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')

                    {!! Form::open()->fill(request()->all())->get() !!} <div class="row">
                        <div class="col-md-9">
                            {!! Form::text('material', 'Nome do material')->required(false)->attrs(['class' => 'from-control']) !!}
                        </div>

                        <div class="col-md-3 text-right mt-4">
                            <button class="        btn btn-sm  btn-primary" style="font-size: 9px;" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor"
                                    class="bi bi-funnel-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2z" />
                                </svg> Filtrar</button>
                            <a id="clear-filter" style="font-size: 9px;" class="btn btn-sm btn-danger"
                                href=""><svg xmlns="http://www.w3.org/2000/svg" width="9"
                                    height="9" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg> Limpar</a>
                        </div>

                    </div>
                    {!! Form::close() !!}
                    <div class="row mt-4">
                        <div class="col-md-9">
                            <div class="table-responsive-xl">
                                <table class="table tablesorter table-hover" status="" id="">
                                    <thead class=" text-primary">
                                        <tr id="">
                                        <th scope="col">#</th>
                                        <th scope="col">Cliente</th>
                                        <th scope="col">Dt. Retirada</th>
                                        <th scope="col">Dt. Retorno</th>
                                        <th scope="col">Endere??o</th>
                                        <th scope="col">Valor Final</th>
                                        <th>Pago</th>
                                        <th scope="col">Status</th>
                                        <th>Qtdo itens</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @forelse ($data as $item)
                                            <tr style="font-size: 11px; background-color: rgb(255, 255, 255);"
                                                status="{{ $item->status }}" id="{{ $item->id }}">
                                                <td class="text-left">
                                                   #
                                                </td>
                                                <td scope="col">{{ $item->cliente->nome }}</td>
                                                <td scope="col">{{ brDate($item->dataRetirada) }}</td>
                                                <td scope="col">{{ brDate($item->dataRetorno) }}</td>
                                                <td scope="col">{{ $item->endereco }}</td>
                                                <td scope="col">R$ {{ money($item->valor - ($item->valor * $item->desconto / 100)) }}</td>
                                                <th>R$ {{ money($item->pagamentos->sum('valor'))}}</th>
                                                <td scope="col">{{ $item->status ? 'Ativo': 'Inativo' }}</td>
                                                <td>{{ $item->itens->sum('quantidade') }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="20" style="text-align: center; font-size: 1.1em;">
                                                    Nenhuma informa????o cadastrada.
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-3 ">
                            <div class="painel-body">
                                <p class="text-center mb-0"><b>A????es<b></p>
                                <hr style="border-top: 2px solid #8c8b8b;" class="mt-2">


                                 <a class="btn btn-warning btn-block btn-sm" id="btnAdd" href="">Add|Rem Material</a>

                                 <a class="btn btn-success btn-block btn-sm" id="btnPag" href="">Add|Rem Pagamento</a>

                                 <a class="btn btn-info btn-block btn-sm" id="btnData" href="">Dados Cadastrais</a>

                                 <a class="btn btn-danger btn-block btn-sm" id="btnDel" href="">Deletar Reserva</a>

                                 <a class="btn btn-primary btn-block btn-sm" id="btnEditar" href="">Editar</a>

                                 <a class="btn btn-info btn-block btn-sm" id="btnComprovante" href="">Gerar Comprovante</a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-between" aria-label="...">
                        <p style="text-align: left">N.Registros: </p>

                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script>
        var trSelected = null
        var id = '';
        var name = '';
        var selecionado = 0;
        var status = 0;

        $("tr").on('click', function(e) {
            $('tr').each(function() {
                $(this).css("background-color", "#fff")
                $(this).find('td').each(function() {
                    $(this).css("color", "rgba(34, 42, 66, 0.7)")

                })
                trSelected = null
            });

            $(this).css("background-color", "#858796")
            $(this).find('td').each(function() {
                $(this).css("color", "#fff")
            })

            trSelected = $(this);
            id = trSelected[0].attributes.id.value;
            status = trSelected[0].attributes.status.value;
            console.log(status);

        });

        $('#btnData').click((event)=>{
            event.preventDefault();
            if(id === '')
            {
                swal('Aten????o', "selecione uma Reserva!",'warning');
            }else
            {
                redirectTo("/reserva/" + id + '/visualizar');
            }
        });

        $('#btnPag').click((event)=>{
            event.preventDefault();
            if(id === '')
            {
                swal('Aten????o', "selecione uma Reserva!",'warning');
            }else
            {
                redirectTo("/addPagamento/" + id);
            }
        });

        $('#btnEditar').click((event)=>{
            event.preventDefault();
            if(id === '')
            {
                swal('Aten????o', "selecione uma Reserva!",'warning');
            }else
            {
                redirectTo("/reserva/"+id+"/edit");
            }
        });

        $('#btnAdd').click((event)=>{
            event.preventDefault();
            if(id === '')
            {
                swal('Aten????o', "selecione uma Reserva!",'warning');
            }else
            {
                redirectTo("/addProduto/"+id);
            }
        });

        $('#btnDel').click((event)=>{
            event.preventDefault();
            if((id == '' || status != 1 ))
            {
                swal('Aten????o', "selecione uma Reserva ativo!",'warning');
            }else
            {
                swal({
                        title: 'Deseja Deletar?',
                        text: 'Deseja deletar este registro, n??o poderar recupera-lo, ou seja, ser?? deletado permanentimente!',
                        icon: 'warning',
                        buttons: ["Cancel", "Sim!"],
                    }).then(function(value) {
                        if (value) {
                            redirectTo("/reserva/" + id + '/deletar');
                        }
                    });
                //
            }
        });

        $('#btnComprovante').click((event)=>{
            event.preventDefault();
            if(id === '')
            {
                swal('Aten????o', "selecione uma Reserva!",'warning');
            }else
            {
                redirectTo("/comprovante/" + id + '/visualizar');
            }
        });

        function redirectTo(url)
        {
            window.location.href= getUrl() + url;
        }





    </script>
@endpush
