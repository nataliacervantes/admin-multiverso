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
                      <th><i class="icon_profile"></i> Título</th>
                      <th><i class="icon_mail_alt"></i> Fecha de Inicio</th>
                      <th><i class="icon_calendar"></i> Fecha Final</th>
                      <th><i class="icon_mail_alt"></i> Tipo de Desc</th>
                      <th><i class="icon_profile"></i> Porcentaje</th>
                      <th><i class="icon_pin_alt"></i> Dinero</th>
                      <th><i class="icon_mobile"></i> Sin Envío</th>
                    </tr>
                    @foreach ($promociones as $promocion)
                        <tr>
                            <td>{{$promocion->Titulo}}</td>
                            <td>{{$promocion->FechaI}}</td>
                            <td>{{$promocion->FechaF}}</td>
                            <td>{{$promocion->Tipo}}</td>
                            <td>{{$promocion->Porcentaje}}</td>
                            <td>{{$promocion->Dinero}}</td>
                            <td> </td>
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
                        {!! Form::label('Titulo','Título de la promoción', ['control-label']) !!}
                        
                          {!! Form::text('Titulo', '', ['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('FechaI','Fecha de inicio', [' control-label']) !!}
                        
                          {!! Form::date('FechaI','',['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('FechaF','Fecha fin', [' control-label']) !!}
                        
                          {!! Form::date('FechaF','',['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group">
                        {!! Form::label('Tipo','Tipo de Promoción', [' control-label']) !!}
                        
                          {!! Form::select('Tipo', $tipos,'', ['class'=>'form-control','id'=>'selectTipo']) !!}

                    </div>
                      <div class="form-group" id="inputPorcentaje">
                        {!! Form::label('Porcentaje','Porcentaje', [' control-label']) !!}
                      
                          {!! Form::text('Porcentaje','',['class'=>'form-control']) !!}

                    </div>
                      <div class="form-group" id="inputDinero">
                        {!! Form::label('Dinero','Dinero', [' control-label']) !!}
                      
                          {!! Form::text('Dinero', '', ['class'=>'form-control']) !!}

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
                // alert(returnData)
                $('#selecTipo').val(returnData.Tipo);
                $('#FechaI').val(returnData.FechaI);
                $('#FechaF').val(returnData.FechaF);
                $('#Titulo').val(returnData.Titulo);
                $('#Porcentaje').val(returnData.Porcentaje);
                $('#Dinero').val(returnData.Dinero);
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
        if(value == 'Porcentaje'){
          $('#inputPorcentaje').show();
          $('#inputDinero').hide();
        }else if(value == 'Dinero'){
          $('#inputDinero').show();
          $('#inputPorcentaje').hide();
        }else if(value == 'Sin Costo de Envío'){
          $('#inputPorcentaje').hide();
          $('#inputDinero').hide();
        }
    })
    </script>
@endsection