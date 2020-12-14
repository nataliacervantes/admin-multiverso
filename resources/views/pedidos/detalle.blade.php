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
                <div class="col-md-6 ">
                    <div class="heading_s1">
                        <h4>Datos de Envío</h4>
                    </div>
                        <div class="form-inline">
                            {!! Form::label('FolioLbl', 'Folio',['style'=>'font-weight: 500; font-size: large; width: 120px']) !!}
                            {!! Form::label('FolioTxt', $pedido->Folio,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('NombreLbl', 'Nombre',['style'=>'font-weight: 500; font-size: large; width: 120px']) !!}
                            {!! Form::label('NombreTxt', $pedido->Nombre,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('ApellidoLbl', 'Apellido',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('ApellidoTxt', $pedido->Apellido,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('DomicilioLbl', 'Domicilio',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('DomicilioTxt', $pedido->Domicilio,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('ColoniaLbl', 'Colonia',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('ColoniaTxt', $pedido->Colonia,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('CiudadLbl', 'Ciudad',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('CiudadTxt', $pedido->Ciudad,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('EstadoLbl', 'Estado',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('EstadoTxt', $pedido->Estado,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('PaisLbl', 'Pais',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('PaisTxt', $pedido->Pais,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('CPLbl', 'CP',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('CPTxt', $pedido->CP,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('TelefonoLbl', 'Teléfono',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('TelefonoTxt', $pedido->Telefono,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('EmailLbl', 'Email',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('EmailTxt', $pedido->Email,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                        <div class="form-inline">
                            {!! Form::label('InfoExtraLbl', 'InfoExtra',['style'=>'font-weight: 500; font-size: large;width: 120px']) !!}
                            {!! Form::label('InfoExtraTxt', $pedido->InfoExtra,['style'=>'font-weight: 350; font-size: 20px']) !!}
                        </div>
                </div>
                <div class="col-md-6 ">
                   <div class="col-md-6">
                        @if($pedido->EstatusPago == 'Pendiente')
                            <h2><span class="badge badge-dark" style="background: rgb(219, 215, 215); height: 30px; font-size: 20px">{{$pedido->EstatusPago}}</span></h2>
                        @elseif($pedido->EstatusPago == 'Pagado')
                            <h2><span class="badge badge-dark" style="background: #000; height: 30px; font-size: 20px">{{$pedido->EstatusPago}}</span></h2>
                            @if($pedido->EstatusEnvio == 'Pendiente')
                                <button class="btn btn-secondary" type="button" data-id="{{$pedido->id}}" data-target="#modal-enviar" data-toggle="modal">Surtir</button>
                            @else 
                                <h2><span class="badge badge-dark" style="background: #000; height: 30px; font-size: 20px">{{$pedido->EstatusEnvio}}</span></h2>
                            @endif
                        @endif
                   </div>
                    <div class="col-md-6">
                        @if($pedido->FichaPago != null)
                            <button type="button" data-target="#modal-ficha" data-id="{{$pedido->id}}" data-toggle="modal"><img src="{!! url('http://127.0.0.1:8000/Clientes/'.$pedido->FichaPago) !!}" width="100px"></button>
                        @endif
                    </div>
                </div>
            </section>
        </div>
    </section>
    <div class="modal fade" id="modal-enviar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Datos de Envío</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {!! Form::open(['url'=>'enviarPedido']) !!}
                <div class="modal-body">
                    {!! Form::label('Guia', 'Número de Guia') !!}
                    {!! Form::text('Guia', '', ['class'=>'form-control']) !!}
                    {!! Form::label('Paqueteria', 'Paquetería') !!}
                    {!! Form::text('Paqueteria', '', ['class'=>'form-control']) !!}
                    {!! Form::hidden('id', '', ['id'=>'id']) !!}
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Enviar</button>
            {!! Form::close() !!}
            </div>
        </div>
        </div>
    </div>
    <div class="modal fade" id="modal-ficha" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Datos de Envío</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{!! url('http://127.0.0.1:8000/Clientes/'.$pedido->FichaPago) !!}" width="60%" style="display:block;
                margin:auto;"><br><br>
                {!! Form::label('Texto', '¿Confirmar pago?', ['style'=>'font-size:20px; font-weight:600;']) !!}
            </div>
            <div class="modal-footer">
                {!! Form::open(['url'=>'confirmarPago']) !!}
                    {!! Form::hidden('idPedido', '', ['id'=>'idPedido']) !!}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                {!! Form::close() !!}
            </div> 
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        $('#modal-enviar').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            $('#id').val(recipient);
            // alert(recipient)
        })
        $('#modal-ficha').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('id') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            $('#idPedido').val(recipient);
            // alert(recipient)
        })
    </script>
@endsection