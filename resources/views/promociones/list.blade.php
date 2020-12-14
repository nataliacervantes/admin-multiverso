@extends('layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Promociones
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> Cupón</th>
                      <th><i class="icon_mail_alt"></i> Fecha de Inicio</th>
                      <th><i class="icon_calendar"></i> Fecha Final</th>
                      <th><i class="icon_mail_alt"></i> Tipo de Desc</th>
                      <th><i class="icon_mail_alt"></i> Cantidad Máx.</th>
                      <th><i class="icon_profile"></i> Porcentaje</th>
                      <th><i class="icon_pin_alt"></i> Dinero</th>
                      <th><i class="icon_mobile"></i> Acivo en correo</th>
                      <th><i class="icon_mobile"></i> Opciones</th>
                    </tr>
                    @foreach ($promociones as $promocion)
                        <tr>
                            <td>{{$promocion->Cupon}}</td>
                            <td>{{$promocion->FechaI}}</td>
                            <td>{{$promocion->FechaF}}</td>
                            <td>{{$promocion->Tipo}}</td>
                            <td>{{$promocion->Limite}}</td>
                            <td>{{$promocion->Porcentaje}}</td>
                            <td>{{$promocion->Dinero}}</td>
                            @if($promocion->Correo == 1)
                              <td>Si</td>
                            @else 
                              <td>No</td> 
                            @endif
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$promocion->id}}"><i class="icon_plus_alt2"></i></button>
                                <a class="btn btn-danger" href="{{ url('eliminarPromocion/'.$promocion->id) }}"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </section>
            </div>
          </div>
          <!-- page end-->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modificar Libro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
                </div>
                {!! Form::open(['url'=>'updatePromocion']) !!}
                    <div class="modal-body">
                      <div class="form-group">
                        {!! Form::label('Cupon','Cupón de la promoción', ['control-label','required']) !!}
                        
                          {!! Form::text('Cupon', '', ['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('FechaI','Fecha de inicio', [' control-label']) !!}
                        
                          {!! Form::date('FechaI','',['class'=>'form-control','required']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('FechaF','Fecha fin', [' control-label']) !!}
                        
                          {!! Form::date('FechaF','',['class'=>'form-control','required']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('Tipo','Tipo de Promoción', [' control-label']) !!}
                          {!! Form::select('Tipo', $tipos,'', ['class'=>'form-control','id'=>'selectTipo','required']) !!}

                    </div>
                    <div class="form-group">
                      {!! Form::label('Limite','Limite de la Promoción', [' control-label']) !!}
                      {!! Form::text('Limite', '', ['class'=>'form-control','id'=>'Limite','required']) !!}

                  </div>
                      <div class="form-group" id="inputPorcentaje">
                        {!! Form::label('Porcentaje','Porcentaje', [' control-label']) !!}
                        {!! Form::text('Porcentaje','',['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group" id="inputDinero">
                        {!! Form::label('Dinero','Dinero', [' control-label']) !!}
                        {!! Form::text('Dinero', '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group" id="inputDinero">
                      {!! Form::label('CorreoLbl','¿Está promo estará activa en el correo electrónico?', ['control-label']) !!}
                        {!! Form::checkbox('Correo', '1','', ['class'=>'form-control']) !!}
                    </div>
                      <input type="hidden" name="id" id="id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                {!! Form::close() !!}
            </div>
            </div>
        </div>
        </section>
      </section>
@endsection

@section('scripts')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            // alert(value)
            var value = button.data('whatever') 
            // alert(value)
            $.get('{{url("getDataPromocion")}}/'+value, function(returnData){
                // alert(returnData.Tipo)
                $('#selecTipo').val(returnData.Tipo);
                $('#FechaI').val(returnData.FechaI);
                $('#FechaF').val(returnData.FechaF);
                $('#Cupon').val(returnData.Cupon);
                $('#Porcentaje').val(returnData.Porcentaje);
                $('#Dinero').val(returnData.Dinero);
                $('#Limite').val(returnData.Limite);
                // $('#Hora').val(returnData.Hora);
                // $('#Costo').val(returnData.Costo);
                // $('#Cupo').val(returnData.Cupo);
                // $('#Estado').val(returnData.Estado);
                // $('#Ciudad').val(returnData.Ciudad);
                $('#id').val(value);
            })
        })

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