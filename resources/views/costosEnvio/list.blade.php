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
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Costos de Envío</h3>

                  {{-- <div> --}}
                    {!! Form::open(['url'=>'altaCostoEnvio','method'=>'GET']) !!}
                      <button class="btn btn-warning" style="float: right; margin-bottom: 15px">Agregar</button>
                    {!! Form::close() !!}
                  
                  {{-- </div> --}}
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                <th><i class="icon_profile"></i> País</th>
                                <th><i class="icon_mail_alt"></i> Costo</th>
                                <th><i class="icon_mobile"></i> Opciones</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if($costosEnvio != null)
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
                            @else 
                                <tr>
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
  </section>
</section>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Modificar Costo</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"></span>
      </button>
      </div>
      {!! Form::open(['url'=>'updateCostoEnvio']) !!}
          <div class="modal-body">
              <div class="form-group">
                  {!! Form::label('Pais','País', [' control-label']) !!}
                  {{-- <div class="col-sm-10"> --}}
                    {!! Form::text('Pais', '', ['class'=>'form-control','id'=>'Pais']) !!}
                  {{-- </div> --}}
                </div>
                <div class="form-group" >
                  {!! Form::label('Costo','Costo', [' control-label']) !!}
                  {{-- <div class="col-sm-10"> --}}
                    {!! Form::text('Costo','',['class'=>'form-control','id'=>'Costo']) !!}
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

@endsection

@section('scripts')
    <script>
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            alert(value)
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