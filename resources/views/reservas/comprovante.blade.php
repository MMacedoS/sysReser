<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprovante</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        p{
            font-size: 12px !important;
        }
        body{
            font-size: 12px !important;
        }
    </style>
</head>
<body>
<section class="w-100 h-500">
    <div class="container">
        <h1 class="text-center text-uppercase mb-0"><ins>H. Andaimes</ins></h1>
        <p class="text-center text-uppercase mb-0"><b> aluguel de Andaimes e estroncas</b></p>
        <p class="text-center text-capitalize mb-0">Rua Adalto Pereira de Souza, nº 108 - Cep.: 48.792-000 - Caldas do Jorro - Ba</p>
        <p class="text-center text-uppercase mb-0">Tel: (75) 3256-1197 / (71) 9 9160-8041</p>
    </div>
    <div class="container center mt-4">
        <div class="col-md-12 text-justify">
            <b>Senhor(a): </b>&nbsp; <ins> {{ $data->cliente->nome }}</ins>
            &nbsp; <b>RG: </b> &nbsp;<ins> {{ "não inserido" }}</ins>
            &nbsp; <b>CPF/CNPJ: </b> &nbsp; <ins> {{ $data->cliente->nif }}</ins>
            &nbsp; <b>Telefone: </b> &nbsp; <ins> {{ $data->cliente->telefone }}.</ins>
            <p>
            Andaimes tubulares correspondente à metros de autura, material este que será entregue limpo de massa de reboco ou tinta e dentro das normas
            técnicas de segurança, correspondendo a diária sempre com pagamento antecipado, mediante as seguintes condições:
            </p>
            <ul>
                <li>O prazo da presente locação começa a partir do dia da entrega dos andaimes pelo locador;</li>
                <li>A reserva só é finalizada com a devolução pelo locatário;</li>
                <li>Em caso de atraso na devolução do material na data correspondente ao retorno será gerada a cobrança diária por material(quantidade alugada * valor unitário); </li>
                <li>O locatário pagará por antecipação;</li>
                <li>Caso perca alguma peça ou danifique, será cobrada o valor estipulado por cada peça danificada ou inutilizada; </li>
            </ul>
            <p>H. Andaimes fica isento de quaisquer responsabilidades trabalhista ou cívil, inclusive indenizações, seja a qual título com referência a acidentes pessoais ou materiais, por ventura venha à ocorrer no transporte e no uso. </p>
            <p>OBS.: O locatário responsável pelo material, levar e entregar nas condições acima exigidas </p>

            <table class="table border">
                <thead>
                    <tr>
                        <th>Quantidade</th>
                        <th>Descrição</th>
                        <th>Tipo</th>
                        <th class="text-right">Qtdo. Dias</th>
                        <th class="text-right">Preço unitário R$</th>
                        <th class="text-right">Total R$</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($data->itens as $item)
                        <tr>

                                <td>{{ $item->quantidade }}</td>
                                <td>{{ $item->material->nome }}</td>
                                <td>{{ $item->material->tipo }}</td>
                                <td class="text-right">{{ carbon($data->dataRetirada)->diffInDays(carbon($data->dataRetorno)) }}</td>
                                <td class="text-right">{{ money($item->valor) }}</td>
                                @if($item->material->tipo == 'Diaria')
                                    <td class="text-right">{{ money($item->total * carbon($data->dataRetirada)->diffInDays(carbon($data->dataRetorno))) }}</td>
                                @else
                                    <td class="text-right">{{ money($item->total) }}</td>
                                @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5"> Nenhum produto!</td>
                        </tr>
                    @endforelse
                    <tr>
                        <td colspan="3" class="text-right"><b> Total R$</b></td>
                        <td class="text-right" colspan="3">{{ money($data->valor) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12 mt-4">
            <p class="text-center text-uppercase mb-0">_______________________________________________________________________________________________________________________________</p>
            <p class="text-center text-uppercase mb-0">Ass. do Responsável</p>
        </div>

        <div class="col-md-12 mt-3">
            <p class="text-center text-uppercase mb-0">_______________________________________________________________________________________________________________________________</p>
            <p class="text-center text-uppercase mb-0">Ass. do Locatário</p>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
