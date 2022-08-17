@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        <span>
                            <h2 class="text-left mt-2 ml-4">Material</h2>
                        </span>
                    </div>
                    <div class="col-md-4 text-right">
                        <button class="btn btn-info">
                            voltar
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body ml-4">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <tr>
                                    <th> Name</th>
                                    <th> Country </th>
                                    <th> City </th>
                                    <th class="text-center">Salary </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> Dakota Rice </td>
                                    <td> Niger </td>
                                    <td>Oud-Turnhout </td>
                                    <td class="text-center">$36,738</td>
                                </tr>
                                <tr>
                                    <td>Minerva Hooper </td>
                                    <td> Curaçao </td>
                                    <td> Sinaai-Waas</td>
                                    <td class="text-center"> $23,789 </td>
                                </tr>
                                <tr>
                                    <td> Sage Rodriguez </td>
                                    <td> Netherlands </td>
                                    <td> Baileux</td>
                                    <td class="text-center">$56,142</td>
                                </tr>
                                <tr>
                                    <td>Philip Chaney</td>
                                    <td>Korea, South</td>
                                    <td>Overland Park</td>
                                    <td class="text-center">$38,735</td>
                                </tr>
                                <tr>
                                    <td>Doris Greene</td>
                                    <td>Malawi</td>
                                    <td>Feldkirchen in Kärnten</td>
                                    <td class="text-center">$63,542</td>
                                </tr>
                                <tr>
                                    <td>Mason Porter</td>
                                    <td>Chile</td>
                                    <td>Gloucester</td>
                                    <td class="text-center">$78,615</td>
                                </tr>
                                <tr>
                                    <td>Jon Porter</td>
                                    <td>Portugal</td>
                                    <td>Gloucester</td>
                                    <td class="text-center">$98,615</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection