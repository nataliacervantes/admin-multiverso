@extends('layouts.template')

@section('content')
  <section id="main-content">
    <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-file-text-o"></i> Promociones</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_document_alt"></i>Promociones</li>
            <li><i class="fa fa-file-text-o"></i>Crear promoción</li>
          </ol>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <section class="panel">
            <header class="panel-heading">
              Crear promoción
            </header>
            <div class="panel-body">
                {!! Form::open(['url'=>'guardarPromocion', 'class'=>'form-horizontal']) !!}
                  <div class="form-group">
                    {!! Form::label('Cupon','Título de la promoción', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Cupon', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('FechaI','Fecha de inicio', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::date('FechaI','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('FechaF','Fecha fin', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::date('FechaF','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Limite','Limite de la Promoción', ['class'=>'col-sm-2 control-label']) !!}
                      <div class="col-sm-10">
                        {!! Form::text('Limite', '', ['class'=>'form-control']) !!}
                      </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Tipo','Tipo de Promoción', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::select('Tipo', $tipos,'', ['class'=>'form-control','id'=>'selectTipo']) !!}
                    </div>
                  </div>
                  <div class="form-group" id="inputPorcentaje">
                    {!! Form::label('Porcentaje','Porcentaje', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Porcentaje','',['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group" id="inputDinero">
                    {!! Form::label('Dinero','Dinero', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Dinero', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group" id="inputDinero">
                    {!! Form::label('CorreoLbl','¿Está promo estará activa en el correo electrónico?', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::checkbox('Correo', '1','', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  {{-- <div class="form-group">
                    {!! Form::label('Cupo','Cupo máximo', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Cupo', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Ciudad','Ciudad', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Ciudad', '', ['class'=>'form-control']) !!}
                    </div>
                  </div>
                  <div class="form-group">
                    {!! Form::label('Estado','Estado', ['class'=>'col-sm-2 control-label']) !!}
                    <div class="col-sm-10">
                      {!! Form::text('Estado', '', ['class'=>'form-control']) !!}
                    </div>
                  </div> --}}
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

@section('scripts')
   <script>
     $(document).ready(function(){
        $('#inputPorcentaje').hide();
        $('#inputDinero').hide();
     })

     $('#selectTipo').on('change',function(){
        var value = $('#selectTipo').val();
        // alert(value)
        if(value == '1'){
          $('#inputPorcentaje').show();
          $('#inputDinero').hide();
        }else if(value == '2'){
          $('#inputDinero').show();
          $('#inputPorcentaje').hide();
        }else if(value == '3'){
          $('#inputPorcentaje').hide();
          $('#inputDinero').hide();
        }
     })
   </script> 
@endsection