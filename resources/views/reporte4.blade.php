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
        
    <h2>Reporte de zonaes</h2>
    <table>
    <tr>
    <th>Id</th>
        <th>Nombre</th>
        <th>Id_Producto</th>
        <th>Nombre Producto</th>

       
    </tr>

    @foreach ($zona as $zona)
      <tr> 
      <td>{{$zona->id}}</td> 
       <td>{{$zona->ciudad}}</td> 
       <td>{{$zona->id_proveedor}}</td> 
       <td>{{$zona->nombre_proveedor}}</td> 
 
      @endforeach
    </tr>
        </table>
    </body>
</HTMl>