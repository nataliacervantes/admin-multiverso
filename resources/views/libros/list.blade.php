@extends('layouts.template')

@section('content')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-lg-12 table-responsive">
              {{-- <section class="panel">
                <header class="panel-heading">
                  Lista de Libros
                </header> --}}
                <table class="table table-striped table-advance table-hover">
                  <tbody>
                    <tr>
                      <th><i class="icon_profile"></i> Titulo</th>
                      <th><i class="icon_calendar"></i> Autor</th>
                      <th><i class="icon_mail_alt"></i> Precio</th>
                      <th><i class="icon_mail_alt"></i> Stock</th>
                      <th><i class="icon_pin_alt"></i> Descripción</th>
                      <th><i class="icon_mobile"></i> Portada</th>
                      <th><i class="icon_mobile"></i> Contraportada</th>
                      <th><i class="icon_mobile"></i> Opciones</th>
                    </tr>
                    @foreach ($libros as $libro)
                        <tr>
                            <td>{{$libro->Titulo}}</td>
                            <td>{{$libro->autores->Nombre}}</td>
                            <td>{{$libro->Precio}}</td>
                            <td>{{$libro->Stock}}</td>
                            <td>{{$libro->Descripcion}}</td>
                            <td>
                                {{-- <img src="{!! url('getImage/'.$libro->id) !!}" width="100px"> --}}
                                <img src="img/Portadas/{{$libro->Portada}}" width="100px">
                            </td>
                            <td>
                                {{-- <img src="{!! url('getImage/'.$libro->id) !!}" width="100px"> --}}
                                <img src="img/Portadas/{{$libro->Contraportada}}" width="100px">
                            </td>
                            <td>
                                <div class="btn-group">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$libro->id}}"><i class="icon_plus_alt2"></i></button>
                                {{-- <a class="btn btn-success" href="#"><i class="icon_check_alt2"></i></a> --}}
                                <a class="btn btn-danger" href="{{ url('eliminarLibro/'.$libro->id) }}"><i class="icon_close_alt2"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              {{-- </section> --}}
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
                <div class="modal-body">
                    {!! Form::open(['url'=>'updateLibro', 'files'=>'true']) !!}
                        <div class="form-group">
                            {!! Form::label('Titulo','Título del libro', ['class'=>'control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                            {!! Form::text('Titulo', '', ['class'=>'form-control','id'=>'Titulo']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Autor','Autor del libro', ['class'=>'control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              <select name="Autor" class="form-control">
                                @foreach ($escritores as $escritor)
                                    <option value="{{$escritor->id}}">{{$escritor->Nombre}}</option> 
                                @endforeach 
                              </select> 
                            {{-- </div> --}}
                          </div>
                        <div class="form-group">
                            {!! Form::label('Descripcion','Descripción', ['class'=>'control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                                {!! Form::textarea('Descripcion', '', ['class'=>'form-control','style'=>'resize: none','id'=>'Descripcion']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Precio','Precio', ['class'=>'control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                                {!! Form::text('Precio', '', ['class'=>'form-control','id'=>'Precio']) !!}
                            {{-- </div> --}}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Stock','Stock', ['class'=>' control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                              {!! Form::text('Stock', '', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
                          </div>
                        <div class="form-group">
                            {!! Form::label('Imagenes','Foto de la Portada', ['class'=>'control-label']) !!}
                            {{-- <div class="col-sm-10"> --}}
                                {!! Form::file('Imagenes', ['class'=>'form-control']) !!}
                            {{-- </div> --}}
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
            $.get('{{url("getDataLibro")}}/'+value, function(returnData){
                alert(returnData.autores_id)
                $('#Titulo').val(returnData.Titulo);
                $('#Autor').val(returnData.autores_id);
                $('#Descripcion').val(returnData.Descripcion);
                $('#Precio').val(returnData.Precio);
                $('#Stock').val(returnData.Stock);
                $('#id').val(value);
            })
        })
      </script>
@endsection