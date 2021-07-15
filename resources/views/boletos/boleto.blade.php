@php
    use Carbon\Carbon;
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
@endphp

<html>
     <head>
        <style>
            .ticket{
                border: 1px solid black;
                width: 100%;
                height: 300px;
                font-family: Serna;
                margin-top: 25%
            }
            .info{
                width: 75%;
                background-image: url('{{public_path('/img/fondo.jpeg')}}');
                /* border: 1px solid orange; */
                height: inherit;
                display : inline-block;
                position: absolute;
                background-size: cover;
                /* background-size: 100% 100%; */
                background-repeat:no-repeat;
                color: white;
                opacity: .9;
                background-position: 0 -150px;
            }
            .codigo{
                height: inherit;
                width: 25%;
                /* border: 1px solid rgb(84, 84, 240); */
                /* align : right; */
                display : inline-block;
                position: absolute;
                margin-left : 75%;
            }
            .qr{
                margin-top: 55px;
                margin-left: 15px;
                width: 70%;
            }
            @font-face{
                font-family: 'Serna';
                src: url('../fonts/1942.eot') format(“embedded-opentype”),
                url('../fonts/1942.woff') format(“woff”),
                url('../fonts/1942.ttf') format(“truetype”),
                url('../fonts/1942.svg') format(“svg”);
            }
            @font-face {
                font-family: "Serna";
                src: url({{ storage_path('fonts/1942.ttf') }}) format("truetype");
            }
        </style>
     </head>

     <body>
        <div class="ticket">
            <div class="info">
                <div style="margin-top: 35px; margin-left: 35px; font-size: 25px">
                    {{ $evento['Lugar']}}
                </div>
                    @php
                        $date = Carbon::create($evento['Fecha'])->locale('es');
                    @endphp
                <div style='text-align: right; margin-right: 15px'>
                    <p style="margin-bottom: 60px">
                        <label style="font-size: 40px">Jose de la Serna</label> <br>
                        <label style="font-size: 20px">{{ $evento['Evento'] }}</label><br>
                    </p>
                    <p>
                        <label style="font-size: 17px">{{ $date->isoFormat('LL')}} a las {{$evento['Hora']}}</label><br>
                        <label style="font-size: 17px">{{ $evento['Domicilio']}}, {{$evento['Ciudad']}}, {{$evento['Estado']}}</label>
                    </p>
                </div>
            </div>
            <div class="codigo">
                <img class="qr"  src="data:image/png;base64, {{ base64_encode(QrCode::format('png')->generate('127.0.0.1:8001/confirmarAsistencia/'.$boleto['id'])) }} ">
                <label style="margin-left: 280px; margin-top: -230px; width: 190px; display: inline-block; transform: rotate(-90deg); position:absolute">BOLETO INDIVIDUAL</label>
            </div>
        </div>
     </body>
</html>
