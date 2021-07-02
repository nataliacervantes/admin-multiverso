@php
    use Carbon\Carbon;
@endphp

<html>
     <head>
        <style>
            .ticket{
                border: 1px solid black;
                width: 100%;
                height: 300px;;
            }
            .info{
                width: 65%;
                background-image: url('{{public_path('/images/fondo.jpeg')}}');
                border: 1px solid orange;
                height: inherit;
                display : inline-block;
                position: absolute;
            }
            .codigo{
                height: inherit;
                width: 35%;
                border: 1px solid rgb(84, 84, 240);
                align : right;
                display : inline-block;
                position: absolute;
                margin-left : 470px;;
            }
        </style>
     </head>

     <body>
        <div class="ticket">
            <div class="info">
                <div>
                    {{ $evento['Lugar']}}
                </div>
                <div style='text-align: right'>
                    <p>José de la Serna</p>
                    <label for="">{{ $evento['Evento']}}</label>
                </div>
                <div style="height : 30px; width: inheret"></div>
                <div style='text-align: right'>
                        @php
                            $date = Carbon::create($evento['Fecha'])->locale('es');
                        @endphp
                    <p>
                        {{ $date->isoFormat('LL')}} a las {{$evento['Hora']}} <br><br>
                        {{$evento['Domicilio']}} {{$evento['Ciudad']}} {{$evento['Estado']}}
                    </p>
                </div>
            </div>
            <div class="codigo">

            </div>
        </div>
     </body>
</html>
