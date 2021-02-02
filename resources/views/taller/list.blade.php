@extends('layouts.template')

@section('content')
<section id="main-content">
  <section class="wrapper">
      <div class="row">
          <div class="col-lg-12">
    <!-- Page Wrapper -->
    <div id="wrapper">
      <!-- Content Wrapper -->
      <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
          <!-- Begin Page Content -->
          <div class="container-fluid">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Talleres</h3>

                  {{-- <div> --}}
                    {!! Form::open(['url'=>'altaTaller','method'=>'GET']) !!}
                      <button class="btn btn-warning" style="float: right; margin-bottom: 15px">Agregar</button>
                    {!! Form::close() !!}
                  
                  {{-- </div> --}}
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th><i class="icon_profile"></i> Nombre</th>
                                <th><i class="icon_pin_alt"></i> Descripción</th>
                                <th><i class="icon_mail_alt"></i> Precio</th>
                                <th><i class="icon_mobile"></i> Hora</th>
                                <th><i class="icon_calendar"></i> Fecha Inicio</th>
                                <th><i class="icon_mail_alt"></i> Fecha Fin</th>
                                <th><i class="icon_mobile"></i> Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if($talleres != null)
                              @foreach ($talleres as $taller)
                                <tr>
                                    <td>{{$taller->NombreTaller}}</td>
                                    <td>{{$taller->Descripción}}</td>
                                    <td>{{$taller->Precio}}</td>
                                    <td>{{$taller->Hora}}</td>
                                    <td>{{$taller->Inicio}}</td>
                                    <td>{{$taller->Fin}}</td>
                                    <td>
                                        <div class="btn-group">
                                        <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$taller->id}}"><i class="icon_plus_alt2"></i></button>
                                        {{-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> --}}
                                        <a class="btn btn-danger" href="{{ url('eliminarTaller/'.$taller->id) }}"><i class="icon_close_alt2"></i></a>
                                        </div>
                                    </td>
                                </tr>
                              @endforeach
                            @else 
                                <tr>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>
                            @endif
                          </tbody>
                      </table>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      </div></div>
            <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modificar Taller</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true"></span>
              </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['url'=>'updateTaller', 'files'=>'true']) !!}
                    <div class="form-group">
                        {!! Form::label('Taller','Nombre del Taller', ['class'=>'control-label']) !!}
                        {!! Form::text('Taller', '', ['class'=>'form-control']) !!}
                       
                    </div>
                    <div class="form-group">
                        {!! Form::label('Descripcion','Descripción del taller', ['control-label']) !!}
                        {!! Form::text('Descripcion', '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('FechaInicio','Fecha de Inicio del taller', ['class'=>'control-label']) !!}
                        {!! Form::date('FechaInicio','',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('FechaFin','Fecha Fin del taller', ['class'=>'control-label']) !!}
                        {!! Form::date('FechaFin','',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Hora','Hora del taller', ['class'=>'control-label']) !!}
                        {!! Form::time('Hora','',['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Precio','Precio', ['class'=>'control-label']) !!}
                        {!! Form::text('Precio', '', ['class'=>'form-control']) !!}
                    </div>
                    <input type="hidden" name="id" id="id">
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Actualizar</button>
              {!! Form::close() !!}
              </div>
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
            $.get('{{url("getDataTaller")}}/'+value, function(returnData){
                // alert(returnData.autores_id)
                $('#Taller').val(returnData.NombreTaller);
                $('#Hora').val(returnData.Hora);
                $('#Descripcion').val(returnData.Descripción);
                $('#Precio').val(returnData.Precio);
                $('#FechaFin').val(returnData.Fin);
                $('#FechaInicio').val(returnData.Inicio);
                $('#id').val(value);
            })
        })
      </script>
@endsection