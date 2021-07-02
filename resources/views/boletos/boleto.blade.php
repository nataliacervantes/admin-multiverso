@php
    use Carbon\Carbon;
@endphp

<html>
     <head>
        <style>
            .ticket{
                border: 1px solid black;
                width: 100%;
                height: 300px;
                font-family: Serna;
            }
            .info{
                width: 65%;
                background-image: url('{{public_path('/img/fondo.jpeg')}}');
                /* border: 1px solid orange; */
                height: inherit;
                display : inline-block;
                position: absolute;
                background-size: cover;
                color: white;
                opacity: .9;
            }
            .codigo{
                height: inherit;
                width: 35%;
                /* border: 1px solid rgb(84, 84, 240); */
                align : right;
                display : inline-block;
                position: absolute;
                margin-left : 456px;;
            }
            @font-face{
                font-family: 'Serna';
                src:
                /* url({{ public_path('fonts/1942.ttf') }}) format("truetype"); */
                url('{{public_path('fonts/1942.eot')}}' format(“embedded-opentype”),
                url('{{public_path('fonts/1942.woff')}}' format(“woff”),
                url('{{public_path('fonts/1942.ttf')}}' format(“truetype”),
                url('{{public_path('fonts/1942.svg')}}' format(“svg”);
            }
        </style>
     </head>

     <body>
        <div class="ticket">
            <div class="info">
                <div style="margin-bottom: 60px; margin-top: 35px; margin-left: 35px">
                    {{ $evento['Lugar']}}
                </div>
                <div style="height : 70px; width: inheret"></div>
                <div style='text-align: right; margin-right: 15px'>
                        @php
                            $date = Carbon::create($evento['Fecha'])->locale('es');
                        @endphp
                    <p>
                        José de la Serna <br>
                        {{ $evento['Evento'] }} <br>
                        {{ $date->isoFormat('LL')}} a las {{$evento['Hora']}} <br>
                        {{ $evento['Domicilio']}} {{$evento['Ciudad']}} {{$evento['Estado']}}
                    </p>
                </div>
            </div>
            <div class="codigo">
                <div class="visible-print text-center">
                    {{-- <img src="data:image/png;base64, {{ base64_encode($message->embedData(QrCode::format('png')->generate($msg['Folio']), 'QrCode.png', 'images/png')) }} "> --}}
                </div>
            </div>
        </div>
     </body>
</html>
