<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Usuarios</title>   
    <style>
        .page-break {
            page-break-after: always;
        }
        </style>
</head>
<body>        
    <img src="{{ public_path('logo2.jpg') }}" style="width: 70px; height: 50px">
    <h4 style="text-align: center;">Listado de Usuarios</h4>
    <div style="background-color: #688a7e; height: 16px"></div>
          <br>          
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Estado</th>                                                 
                  </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $value)
                    <tr class="table-danger">
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>                        
                        <td>{{$value->cargo}}</td>
                        <td>@if ($value->estado == 1)
                            Habilitado
                        @else
                            Deshabilitado
                        @endif</td>                                                                                                               
                    </tr>
                @endforeach
                </tbody>
            </table>                    
</body>
</html>






{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .page-break{
            page-break-after: always;
        }
        .titulo{
            border: 2px solid red;
            border-radius: 15px;
            padding: 15px;
        }
        .titulo h1{
            text-align: center;
        }
        .titulo p{
            text-align: right;
        }

        .table{
            width: 100%;
            border: 1px solid red;
            text-align: center;
        }
    </style>
</head>
<body>
    <header class="titulo">
        <h1>Informe de Agenda</h1>
        <p>De: {{$input["txtFechaInicial"]}} a {{$input["txtFechaFinal"]}}</p>
    </header>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Usuario</th>
                    <th>Fecha</th>
                    <th>Hora Inicial</th>
                    <th>Hora Final</th>
                    <th>Descripción</th>
                </tr>                
            </thead>
            <tbody>
                @foreach ($agenda as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->usuario_id}}</td>
                        <td>{{$value->fecha}}</td>
                        <td>{{$value->hora_inicio}}</td>
                        <td>{{$value->hora_final}}</td> 
                        <td>{{$value->descripcion}}</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer style="position: absolute; bottom:0;">
        <p style="text-align:center;">Informe generado {{date("Y-m-d")}}</p>
    </footer>
</body>
</html> --}}