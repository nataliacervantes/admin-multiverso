@extends('layouts.template')

@section('content')
    <section id="main-content">
        <section class="wrapper">
            <div class="row">
              <div class="col-lg-12">
                <h3 class="page-header"><i class="fa fa-file-text-o"></i> BOLETOS</h3>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <section class="panel">
                  <header class="panel-heading">
                    Generar Boletos
                  </header>
                  <div class="panel-body">
                      {!! Form::open(['url'=>'generarBoletos']) !!}
                        <div class="col-md-3">
                            {!! Form::label('no', 'Cuántos boletos vas a necesitar José?') !!}
                            {!! Form::number('Boletos','', ['class'=>'form-control']) !!}
                            <input type="number" class="form-control" name="otro">
                        </div>
                        <div >
                            {!! Form::submit('Generar', ['class'=>'btn btn-info','style'=>"margin-top: 25px"]) !!}
                        </div>
                        {!! Form::close() !!}
                  </div>
                </section>
              </div>
            </div>
        </section>
    </section>
@endsection
