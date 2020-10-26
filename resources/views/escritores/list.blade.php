@extends('layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12">
              <section class="panel">
                <header class="panel-heading">
                  Lista de Libros
                </header>
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> Nombre</th>
                      <th><i class="icon_pin_alt"></i> Descripción</th>
                    </tr>
                    @foreach ($escritores  as $escritor)
                        <tr>
                            <td>{{$escritor->Nombre}}</td>
                            <td>{{$escritor->Descripcion}}</td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$escritor->id}}"><i class="icon_plus_alt2"></i></button>
                                {{-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> --}}
                                <a class="btn btn-danger" href="{{ url('eliminarEscritor/'.$escritor->id) }}"><i class="icon_close_alt2"></i></a>
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