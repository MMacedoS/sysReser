@extends('layouts.app', ['page' => 'material', 'pageSlug' => 'material'])

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Editar Clientes</h4>
                        </div>

                            <div class="col-4 text-right">
                                <a href="{{ route('cliente.index') }}" class="btn btn-sm btn-primary">Voltar</a>
                            </div>

                    </div>
                </div>
                <div class="card-body">
                    @include('alerts.success')
                    {!!Form::open()
                    ->put()
                    ->id('form-save')->fill($item)
                    ->route('cliente.update', [$item->id])
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
