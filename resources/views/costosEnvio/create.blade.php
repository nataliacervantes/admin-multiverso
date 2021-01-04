@extends('layouts.template')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Costos de Envio</h3>
          {{-- <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Costos de Envío</li>
            <li><i class="fa fa-file-text-o"></i>Crear Costo</li>
          </ol> --}}
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Crear costo
            </header>
            <div class="panel-body">
                {!! Form::open(['url'=>'guardarCostoEnvio', 'class'=>'form-horizontal']) !!}
                  <div class="form-group">
                    {!! Form::label('Pais','País', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Pais', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group" id="inputPorcentaje">
                    {!! Form::label('Costo','Costo', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Costo','',['class'=>'form-control']) !!}
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