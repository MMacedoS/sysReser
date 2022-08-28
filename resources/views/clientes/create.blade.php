@extends('layouts.app', ['page' => 'clientes', 'pageSlug' => 'clientes'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Cadastrar Clientes</h4>
                        </div>

                            <div class="col-4 text-right">
                                <a href="{{ route('clientes.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                            </div>

                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    {!!Form::open()
                    ->post()
                    ->id('form-save')
                    ->route('clientes.store')
                    ->multipart()!!}
                    <div class="pl-lg-4">
                        @include('clientes._forms')
                    </div>
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
@endsection
