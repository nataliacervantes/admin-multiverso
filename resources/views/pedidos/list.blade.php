@extends('layouts.template')

@section('content')
          <!-- page end-->
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
                    <h3 class="page-header"><i class="fa fa-file-text-o"></i> Pedidos</h3>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                              <thead>
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