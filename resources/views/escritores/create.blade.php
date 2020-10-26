@extends('layouts.template')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Escritores</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Escritores</li>
            <li><i class="fa fa-file-text-o"></i>Dar de alta un escrito</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Crear Libros
            </header>
            <div class="panel-body">
                {!! Form::open(['url'=>'guardarEscritor', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                  <div class="form-group">
                    {!! Form::label('Nombre','Nombre del Escritor', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Nombre', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Descripcion','Descripción', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::textarea('Descripcion', '', ['class'=>'form-control','style'=>'resize: none']) !!}
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