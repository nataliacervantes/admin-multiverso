@extends('layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> BOLETOS</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Generar Boletos
                  </header>
                  <div class="panel-body">
                    {!! Form::open(['url'=>'guardarEvento']) !!}
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Evento','Nombre del Evento', ['class'=>'control-label']) !!}
                            </div>
                            <div class="col-md-3">
                                {!! Form::text('Evento', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Lugar','Lugar del Evento', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Lugar', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Domicilio','Domicilio', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Domicilio', '', ['class'=>'form-control','style'=>'resize: none']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Fecha','Fecha del evento', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::date('Fecha','',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Hora','Hora del evento', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::time('Hora','',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Costo','Costo', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Costo', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Cupo','Cupo máximo', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Cupo', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Ciudad','Ciudad', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Ciudad', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                {!! Form::label('Estado','Estado', ['class'=>' control-label']) !!}
                            </div>
                            <div class="col-md-3">
                            {!! Form::text('Estado', '', ['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div >
                            {!! Form::submit('Generar', ['class'=>'btn btn-info','style'=>"margin-top: 25px"]) !!}
                        </div>
                    {!! Form::close() !!}
                  </div>
                </section>
              </div>
            </div>
        </section>
    </section>
@endsection
