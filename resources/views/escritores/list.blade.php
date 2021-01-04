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
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> Escritores</h3>

                  {{-- <div> --}}
                    {!! Form::open(['url'=>'altaEscritor','method'=>'GET']) !!}
                      <button class="btn btn-warning" style="float: right; margin-bottom: 15px">Agregar</button>
                    {!! Form::close() !!}
                  
                  {{-- </div> --}}
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                              <tr>
                                  <th>NOMBRE</th>
                                  <th>DESCRIPCIÓN</th>
                                  <th>OPCIONES</th>
                              </tr>
                          </thead>
                          {{-- <tfoot>
                              <tr>
                                  <th>Name</th>
                                  <th>Position</th>
                                  <th>Office</th>
                                  <th>Age</th>
                                  <th>Start date</th>
                                  <th>Salary</th>
                              </tr>
                          </tfoot> --}}
                          <tbody>
                            @if($escritores != null)
                              @foreach ($escritores as $escritor)
                                <tr>
                                  <td>{{$escritor->Nombre}}</td>
                                  <td>{{$escritor->Descripcion}}</td>
                                  <td>
                                    <div class="btn-group">
                                      <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$escritor->id}}"><i class="icon_plus_alt2"></i></button>
                                      <a class="btn btn-danger" href="{{ url('eliminarEscritor/'.$escritor->id) }}"><i class="icon_close_alt2"></i></a>
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
    <!-- Modal -->
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modificar Escritor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"></span>
            </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['url'=>'updateEscritor']) !!}
                    <div class="form-group">
                        {!! Form::label('Nombre','Nombre del Escritor', ['class'=>'control-label']) !!}
                        
                        {!! Form::text('Nombre', '', ['class'=>'form-control']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('Descripcion','Descripción', ['class'=>'control-label']) !!}
                        
                        {!! Form::textarea('Descripcion', '', ['class'=>'form-control','style'=>'resize: none']) !!}
                    
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
          <!-- page end-->
@endsection

@section('scripts')
      <script>
          $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            // alert(value)
            var value = button.data('whatever') 
            // alert(value)
            $.get('{{url("getDataEscritor")}}/'+value, function(returnData){
                // alert(returnData)
                $('#Nombre').val(returnData.Nombre);
                $('#Descripcion').val(returnData.Descripcion);
                $('#id').val(value);
            })
        })
      </script>
@endsection