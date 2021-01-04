@extends('layouts.template')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Libros</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Crear Libros
            </header>
            <div class="panel-body">
                {!! Form::open(['url'=>'guardarLibro', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data']) !!}
                  <div class="form-group">
                    {!! Form::label('Titulo','Título del libro', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Titulo', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Autor','Autor del libro', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      <select name="Autor" class="form-control">
                        @foreach ($escritores as $escritor)
                            <option value="{{$escritor->id}}">{{$escritor->Nombre}}</option> 
                        @endforeach 
                      </select> 
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Descripcion','Descripción', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::textarea('Descripcion', '', ['class'=>'form-control','style'=>'resize: none']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Precio','Precio', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Precio', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Stock','Stock', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Stock', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Portada','Foto de la Portada', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::file('Portada', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Contraportada','Video', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Contraportada','', ['class'=>'form-control']) !!}
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