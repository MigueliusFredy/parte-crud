<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5339f90c2d.js" crossorigin="anonymous"></script>
</head>
<body>
   <!-- ventanas emergente -->
       
    <h1 class="text-center p-3 "> Crud en laravel</h1>
  
   @if (session("correcto"))
       <div class="alert alert-success">{{session("correcto")}}</div>
   @endif
   @if (session("incorrecto"))
       <div class="alert alert-danger">{{session("incorrecto")}}</div>
   @endif

    <script>
       var res=function(){
        var not=confirm("Esta seguro de querer eliminar?");
        return not;
       }
      </script>


  <!-- Modal de Registrar -->
<div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registar Praticante</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("crud.create")}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdni">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapellido">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edad</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtedad">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcorreo">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttelefono">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Fecha de inicio</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtfecha_inicio">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">ID de Usuario</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtid_usuario">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Carrera</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcarrera">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Actividad</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtactividad">
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="Submit" class="btn btn-primary">Registrar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
<div class="p-5  table-responsive">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalRegistrar"> Añadir poducto </button>
    <table class="table table-striped table-bordered table-hover">
        <thead class="bg-primary text-white">
          <tr>
            <th scope="col">DNI</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">Correo</th>
            <th scope="col">Telefono</th>
            <th scope="col">Fecha de inicio</th>
            <th scope="col">ID usuario</th>
            <th scope="col">Carrera</th>
            <th scope="col">Actividad</th>
            <th></th>
          </tr>
        </thead>
        <tbody class="table-group-divider">
         @foreach($datos as $item )
          <tr>
            <td>{{$item->DNI}}</td>
            <td>{{$item->Nombre}}</td>
            <td>{{$item->Apellido}}</td>
            <td>{{$item->Edad}}</td>
            <td>{{$item->Correo}}</td>
            <td>{{$item->Telefono}}</td>
            <td>{{$item->Fecha_Inicio}}</td>
            <td>{{$item->ID_Usuario}}</td>
            <td>{{$item->Nombre_Carrera}}</td>
            <td>{{$item->Nombre_Actividad}}</td>
            <td> 
            <a href="" data-bs-toggle="modal" data-bs-target="#modaleditar{{$item->DNI}}" class="btn btn-warning btn-sm" ><i class="fa-solid fa-pen-to-square"></i></a>
            <a href="{{route("crud.delete",$item->DNI)}}" onclick="return res()" class="btn btn-danger btn-sm" ><i class="fa-solid fa-trash"></i></a>
            </td>


 
<!-- Modal de modifocacion -->
<div class="modal fade" id="modaleditar{{$item->DNI}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modificar datos el praticante</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route("crud.update")}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">DNI</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtdni" value="{{$item->DNI}}" readonly >
          </div>
           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtnombre" value="{{$item->Nombre}}"> 
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtapellido" value="{{$item->Apellido}}">
          </div>
         
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Edad</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtedad" value="{{$item->Edad}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Correo Electronico</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtcorreo" value="{{$item->Correo}}">
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txttelefono" value="{{$item->Telefono}}">
          </div>
         
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="Submit" class="btn btn-primary">Modificar</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

          </tr>
         @endforeach
        </tbody>
      </table>
</div>
    


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"  integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>