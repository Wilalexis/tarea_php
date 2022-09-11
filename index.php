<!DOCTYPE html>
<html lang="en">
<head>
  <title>Estudiantes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="registro.png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-warning navbar-light  nav justify-content-center">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="leer.png" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">Estudiantes</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Tipos de sangre</a>
    </li>
  </ul>
</nav>

<div class="container">
  
  <br><br>
  <h2>Tabla de estudiantes</h2>
  <br>
  
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" onclick="borrar()">
    Ingresar
  </button>

    
  <!-- Modal de modificar/eliminar -->
  <div class="modal" id="algo">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Modificar/eliminar estudiante</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form action="crud_estudiantes.php" method="post" id="formulario">
            <input type="text" name="id_estudiante" id="id_estudiante" class="form-control" value="0" readonly>
            <div class="form-group">
              <label for="carne">Carnet</label>
              <input type="text" class="form-control" id="carne" placeholder="Ingrese carnet" name="carne">
            </div>
            <div class="form-group">
              <label for="nombres">Nombres</label>
              <input type="text" class="form-control" id="nombres" placeholder="Ingrese los nombres" name="nombres">
            </div>
            <div class="form-group">
              <label for="apellidos">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" placeholder="Ingrese los apellidos" name="apellidos">
            </div>
            <div class="form-group">
              <label for="direccion">Direccio:</label>
              <input type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion" name="direccion">
            </div>
            <div class="form-group">
              <label for="telefono">Telefono</label>
              <input type="number" class="form-control" id="telefono" placeholder="Ingrese numero de telefono" name="telefono">
            </div>
            <div class="form-group">
              <label for="correo_electronico">Correo electronico:</label>
              <input type="text" class="form-control" id="correo_electronico" placeholder="Ingrese correo electronico" name="correo_electronico">
            </div>
            <div class="form-group">
              <label for="id_tipo_sangre">Tipo de sangre</label>
              <select class="form-control" id="drop_sangre"  name="drop_sangre">
              <option value=0>--- Eliga el tipo de sangre ---</option>
                    <?php 
                    include("datos_conexion.php");
                    $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                    $db_conexion ->real_query("select id_tipos_sangre as id, sangre from tipos_sangre;");
                    $resultado = $db_conexion->use_result();
                    while($fila = $resultado->fetch_assoc()){
                        echo"<option value=". $fila['id'] . ">". $fila['sangre']."</option>";
                    }
                    $db_conexion -> close();
                    ?>
              </select>
            </div>
            <div class="form-group">
              <label for="fecha_nacimiento">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="fecha_nacimiento"  name="fecha_nacimiento">
            </div>
            <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="btn_modificar" id="btn_modificar" value="modificar">Modificar</button>
          <button type="submit" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar" value="eliminar" onclick="javascript:if(!confirm('¿Desea Eliminar?'))return false">Eliminar</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal de ingresar -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingrese los datos de un nuevo estudiante</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <div class="modal-body">
          <form action="crud_estudiantes.php" method="post" id="formulario">
            <div class="form-group">
            <input type="text" name="id_estudiante" id="id_estudiante" class="form-control" value="0" readonly>
              <label for="carne">Carnet</label>
              <input type="text" class="form-control" id="carne" placeholder="Ingrese carnet" name="carne">
            </div>
            <div class="form-group">
              <label for="nombres">Nombres</label>
              <input type="text" class="form-control" id="nombres" placeholder="Ingrese los nombres" name="nombres">
            </div>
            <div class="form-group">
              <label for="apellidos">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" placeholder="Ingrese los apellidos" name="apellidos">
            </div>
            <div class="form-group">
              <label for="direccion">Direccio:</label>
              <input type="text" class="form-control" id="direccion" placeholder="Ingrese la direccion" name="direccion">
            </div>
            <div class="form-group">
              <label for="telefono">Telefono</label>
              <input type="number" class="form-control" id="telefono" placeholder="Ingrese numero de telefono" name="telefono">
            </div>
            <div class="form-group">
              <label for="correo_electronico">Correo electronico:</label>
              <input type="text" class="form-control" id="correo_electronico" placeholder="Ingrese correo electronico" name="correo_electronico">
            </div>
            <div class="form-group">
              <label for="id_tipo_sangre">Tipo de sangre.</label>
              <select class="form-control" id="drop_sangre"  name="drop_sangre">
              <option value=0>--- Eliga el tipo de sangre ---</option>
                    <?php 
                    include("datos_conexion.php");
                    $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                    $db_conexion ->real_query("select id_tipos_sangre as id, sangre from tipos_sangre;");
                    $resultado = $db_conexion->use_result();
                    while($fila = $resultado->fetch_assoc()){
                        echo"<option value=". $fila['id'] . ">". $fila['sangre']."</option>";
                    }
                    $db_conexion -> close();
                    ?>
              </select>
            </div>
            <div class="form-group">
              <label for="fecha_nacimiento">Fecha de nacimiento</label>
              <input type="date" class="form-control" id="fecha_nacimiento"  name="fecha_nacimiento">
            </div>
            <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" name="btn_crear" id="btn_crear" value="crear">Crear</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <br><br>
  <table class="table table-bordered table-hover">
    <thead class="thead-light">
      <tr>
        <th>Carnet</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Correo electronico</th>
        <th>Tipo sangre</th>
        <th>fecha de nacimiento</th>
      </tr>
    </thead>
    <tbody id="tbl_estudiantes">
    <?php 
        include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $db_conexion -> real_query ("select e.id_estudiante as id,e.carne,e.nombres,e.apellidos,e.direccion,e.telefono, e.correo_electronico, t.sangre, e.fecha_nacimiento,e.id_tipo_sangre from estudiantes as e inner join tipos_sangre as t on e.id_tipo_sangre = t.id_tipos_sangre;");
        $resultado = $db_conexion -> use_result();
        while ($fila = $resultado ->fetch_assoc()){
            echo "<tr data-id=". $fila['id']." data-idt=". $fila['id_tipo_sangre'].">";
            echo "<td>". $fila['carne']."</td>";
            echo "<td>". $fila['nombres']."</td>";
            echo "<td>". $fila['apellidos']."</td>";
            echo "<td>". $fila['direccion']."</td>";
            echo "<td>". $fila['telefono']."</td>";
            echo "<td>". $fila['correo_electronico']."</td>";
            echo "<td>". $fila['sangre']."</td>";
            echo "<td>". $fila['fecha_nacimiento']."</td>";
            echo "</tr>";
        }
        $db_conexion ->close();
        ?>
    </tbody>
  </table>
</div>

<script>
  //Para validar la expresion regular
  const formulario = document.getElementById('formulario')
  const inputs = document.querySelectorAll('#formulario input')
  const expresion={
      carne: /^[E]+[0-9]{3}$/   //Expresion regular
  }
  const validar = (e) =>{
      switch(e.target.name){
          case "carne":
              if(expresion.carne.test(e.target.value)){
                      return true
              }else{
                  
                  confirm("Formato valido: E001 al E999")
                  return false                
                  
              }
          break
      }
  }
  inputs.forEach((input) =>{
      input.addEventListener('blur', validar)
  })
  formulario.addEventListener('submit',(e) =>{
  })
  //Para mostrar el contenido de los inputs
  $('#tbl_estudiantes').on('click','tr td',function(evt){
    var target,id_estudiante,id_tipo_sangre,carne,nombres,apellidos,direccion,telefono,correo_electronico,fecha_nacimiento
    target = $(event.target)
    
    id_estudiante = target.parent().data('id');
    id_tipo_sangre = target.parent().data('idt');
    carne = target.parents("tr").find("td").eq(0).html()
    nombres = target.parents("tr").find("td").eq(1).html()
    apellidos = target.parents("tr").find("td").eq(2).html()
    direccion = target.parents("tr").find("td").eq(3).html()
    telefono = target.parents("tr").find("td").eq(4).html()
    correo_electronico = target.parents("tr").find("td").eq(5).html()
    fecha_nacimiento = target.parents("tr").find("td").eq(7).html()
    
    $("#id_estudiante").val(id_estudiante)
    $("#carne").val(carne)
    $("#nombres").val(nombres)
    $("#apellidos").val(apellidos)
    $("#direccion").val(direccion)
    $("#telefono").val(telefono)
    $("#correo_electronico").val(correo_electronico)
    $("#drop_sangre").val(id_tipo_sangre)
    $("#fecha_nacimiento").val(fecha_nacimiento)
    $("#algo").modal('show');
  })
</script>

</body>
</html>