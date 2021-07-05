@extends('layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
              <div class="col-lg-8">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> BOLETOS</h3>
              </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" >
                            <div class="col-md-8" style="margin-top: 15px;" >
                                Generar Boletos
                            </div>
                            <div class="col-md-4" style="margin-top: 15px;">
                                <a href="{{ url('verEventos')}}" type="button" class="btn btn-info">Crear evento</a>
                            </div>
                        </header>
                        <div class="panel-body">
                            @foreach ($eventos as $evento)
                                {!! Form::open(['url'=>'generarBoleto']) !!}
                                    <div class="row" style="margin: 15px 0">
                                        <div class="col-md-4">
                                            {!! Form::label('Evento', $evento->Evento) !!}
                                        </div>
                                        {!! Form::hidden('id', $evento->id) !!}
                                        <div class="col-md-2">
                                            <button class="btn btn-info">Generar Boleto</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            @endforeach
                        </div>
                    </section>
                </div>
            </div>
        </section>
    </section>
@endsection
