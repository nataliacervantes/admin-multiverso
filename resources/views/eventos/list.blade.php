@extends('layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Lista de Eventos
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> Evento</th>
                      <th><i class="icon_profile"></i> Lugar</th>
                      <th><i class="icon_mail_alt"></i> Domicilio</th>
                      <th><i class="icon_calendar"></i> Fecha</th>
                      <th><i class="icon_mail_alt"></i> Hora</th>
                      <th><i class="icon_pin_alt"></i> Costo</th>
                      <th><i class="icon_mobile"></i> Cupo</th>
                      <th><i class="icon_mobile"></i> Ciudad</th>
                      <th><i class="icon_pin_alt"></i> Estado</th>
                      <th><i class="icon_pin_alt"></i> Video</th>
                      <th><i class="icon_mobile"></i> Imagen</th>
                      <th><i class="icon_mobile"></i> Maps</th>
                      <th><i class="icon_pin_alt"></i> Fanpage</th>
                    </tr>
                    @foreach ($eventos as $evento)
                        <tr>
                            <td>{{$evento->Evento}}</td>
                            <td>{{$evento->Lugar}}</td>
                            <td>{{$evento->Domicilio}}</td>
                            <td>{{$evento->Fecha}}</td>
                            <td>{{$evento->Hora}}</td>
                            <td>{{$evento->Costo}}</td>
                            <td>{{$evento->Cupo}}</td>
                            <td>{{$evento->Ciudad}}</td>
                            <td>{{$evento->Estado}}</td>
                            <td>{{$evento->Video}}</td>
                            <td>{{$evento->Imagen}}</td>
                            <td>{{$evento->Maps}}</td>
                            <td>{{$evento->Fanpage}}</td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$evento->id}}"><i class="icon_plus_alt2"></i></button>
                                <a class="btn btn-danger" href="{{ url('eliminarEvento/'.$evento->id) }}"><i class="icon_close_alt2"></i></a>
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
                {!! Form::open(['url'=>'updateEvento']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('Evento','Nombre del Evento', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Evento', '', ['class'=>'form-control','id'=>'Evento']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Lugar','Lugar del Evento', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Lugar', '', ['class'=>'form-control','id'=>'Lugar']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Domicilio','Domicilio', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Domicilio', '', ['class'=>'form-control','style'=>'resize: none','id'=>'Domicilio']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Fecha','Fecha del evento', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::date('Fecha','',['class'=>'form-control','id'=>'Fecha']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Hora','Hora del evento', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::time('Hora','',['class'=>'form-control','id'=>'Hora']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Costo','Costo', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Costo', '', ['class'=>'form-control','id'=>'Costo']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Cupo','Cupo máximo', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Cupo', '', ['class'=>'form-control','id'=>'Cupo']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Ciudad','Ciudad', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Ciudad', '', ['class'=>'form-control','id'=>'Ciudad']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Estado','Estado', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Estado', '', ['class'=>'form-control','id'=>'Estado']) !!}
                            {{-- </div> --}}
                        </div> 
                        <div class="form-group">
                            {!! Form::label('Video','Video', ['control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Video', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
                          </div>
                          <div class="form-group">
                            {!! Form::label('Imagen','Imagen', ['control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Imagen', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
                          </div>
                          <div class="form-group">
                            {!! Form::label('Maps','Maps', ['control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Maps', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
                          </div>
                          <div class="form-group">
                            {!! Form::label('Fanpage','Fanpage', ['control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Fanpage', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
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
            $.get('{{url("getDataEvento")}}/'+value, function(returnData){
                // alert(returnData)
                $('#Evento').val(returnData.Evento);
                $('#Lugar').val(returnData.Lugar);
                $('#Domicilio').val(returnData.Domicilio);
                $('#Fecha').val(returnData.Fecha);
                $('#Hora').val(returnData.Hora);
                $('#Costo').val(returnData.Costo);
                $('#Cupo').val(returnData.Cupo);
                $('#Estado').val(returnData.Estado);
                $('#Ciudad').val(returnData.Ciudad);
                $('#Video').val(returnData.Video);
                $('#Imagen').val(returnData.Imagen);
                $('#Maps').val(returnData.Maps);
                $('#Fanpage').val(returnData.Fanpage);
                $('#id').val(value);
            })
        })
      </script>
@endsection