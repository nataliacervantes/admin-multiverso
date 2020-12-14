@extends('layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                    Pedidos
                    </header>
                    <table class="table ">
                      <tbody>
                        <tr>
                          <th><i class="icon_profile"></i> Folio</th>
                          <th><i class="icon_profile"></i> Nombre</th>
                          <th><i class="icon_mail_alt"></i> Fecha de Pedidos</th>
                          <th><i class="icon_calendar"></i> Estatus de Pago</th>
                          {{-- {{-- <th><i class="icon_profile"></i> Porcentaje</th> --}}
                          <th><i class="icon_pin_alt"></i> Estatus de Envío</th>
                          <th><i class="icon_mail_alt"></i> Método de Pago</th>
                          <th><i class="icon_mobile"></i> Ver</th> 
                        </tr>
                        @foreach ($pedidos as $pedido)
                            <tr>
                              <td>{{$pedido->Folio}}</td>
                                <td>{{$pedido->Nombre}}</td>
                                <td>{{$pedido->created_at}}</td>
                                <td>{{$pedido->EstatusPago}}</td>
                                <td>{{$pedido->EstatusEnvio}}</td>
                                <td>{{$pedido->Metodo}}</td>
                                
                                <td>
                                    <div class="btn-group">
                                    {{-- <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="{{$pe->id}}"><i class="icon_plus_alt2"></i></button> --}}
                                        <a class="btn btn-primary" href="{{ url('verPedido/'.$pedido->id) }}"><i class="icon_close_alt2"></i></a>
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
        {{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div> --}}
        </section>
      </section>
@endsection
@section('scripts')
    <script>
       $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }
    </script>
@endsection