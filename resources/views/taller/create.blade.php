@extends('layouts.template')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Taller</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Crear taller
            </header>
            <div class="panel-body">
                {!! Form::open(['url'=>'guardarTaller', 'class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
                  <div class="form-group">
                    {!! Form::label('Taller','Nombre del Taller', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Taller', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Descripcion','Descripción del taller', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Descripcion', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('FechaInicio','Fecha de Inicio del taller', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::date('FechaInicio','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('FechaFin','Fecha Fin del taller', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::date('FechaFin','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Hora','Hora del taller', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::time('Hora','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Precio','Precio', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Precio', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Imagen','Imagen', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::file( 'Imagen', ['class'=>'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-10" align='right' >
                      {!! Form::submit('Guardar', ['class'=>'btn btn-default']) !!}
                    </div>
                  </div>
                  
                {!! Form::close() !!}
            </div>
          </section>
        </div>
      </div>
    </section>
  </section>
@endsection