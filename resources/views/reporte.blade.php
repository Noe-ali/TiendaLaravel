<!DOCTYPE html>
<HTMl>
    <title> Reporte de Productos </title>

    <head>
        <style>
            table{
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;

            }

            td,th{
                border: 1px solid #dddddd;
                text-align :left;
                padding: 8px;
            }

            tr:nth-child(even){
                background-color: #dddddd;
            }



        </style>
        
    </head>
    <body>
        
    <h2>Reporte de productos</h2>
    <table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Descripcion</th>
        <th>Precio</th>
        <th>Existencia</th>
        <th>Registrado</th>
        <th>Actualizado</th>
    </tr>

    <tr>@foreach ($producto as $producto)
      <tr> 
      <td>{{$producto->id}}</td> 
       <td>{{$producto->nombre}}</td> 
        <td>{{$producto->descripcion}}</td> 
        <td>{{$producto->precio}}</td> 
        <td>{{$producto->cantidad}}</td> 
        <td>{{$producto->created_at}}</td> 
        <td>{{$producto->updated_at}}</td> 
      @endforeach
    </tr>
        </table>
    </body>
</HTMl>