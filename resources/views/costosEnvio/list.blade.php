@extends('layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Costos de Envío
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> País</th>
                      <th><i class="icon_mail_alt"></i> Costo</th>
                      <th><i class="icon_mobile"></i> Opciones</th>
                    </tr>
                    @foreach ($costosEnvio as $costoEnvio)
                        <tr>
                            <td>{{$costoEnvio->Pais}}</td>
                            <td>{{$costoEnvio->Costo}}</td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$costoEnvio->id}}"><i class="icon_plus_alt2"></i></button>
                                <a class="btn btn-danger" href="{{ url('eliminarCostoEnvio/'.$costoEnvio->id) }}"><i class="icon_close_alt2"></i></a>
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
                {!! Form::open(['url'=>'updateCostoEnvio']) !!}
                    <div class="modal-body">
                        <div class="form-group">
                            {!! Form::label('Pais','País', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Pais', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
                          </div>
                          <div class="form-group" >
                            {!! Form::label('Costo','Costo', [' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Costo','',['class'=>'form-control']) !!}
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
            $.get('{{url("getDataCostoEnvio")}}/'+value, function(returnData){
                // alert(returnData)
                $('#Pais').val(returnData.Pais);
                $('#Costo').val(returnData.Costo);
                $('#id').val(value);
            })
        })
    </script>
@endsection