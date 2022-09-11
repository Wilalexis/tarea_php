<?php
     
     if( !empty($_POST) ){
       $id_estudiante = utf8_decode($_POST["id_estudiante"]);
        $carne = utf8_decode($_POST["carne"]);
        $nombres = utf8_decode($_POST["nombres"]);
        $apellidos = utf8_decode($_POST["apellidos"]);
        $direccion = utf8_decode($_POST["direccion"]);
        $telefono = utf8_decode($_POST["telefono"]);
        $correo_electronico = utf8_decode($_POST["correo_electronico"]);
        $drop_sangre = utf8_decode($_POST["drop_sangre"]);
        $fecha_nacimiento = utf8_decode($_POST["fecha_nacimiento"]);
      include("datos_conexion.php");
        $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
        $sql ="";
        if(isset($_POST['btn_crear'])  ){
          $sql = "INSERT INTO estudiantes(carne,nombres,apellidos,direccion,telefono,correo_electronico,fecha_nacimiento,id_tipo_sangre) VALUES ('". $carne ."','". $nombres ."','". $apellidos ."','". $direccion ."','". $telefono ."','". $correo_electronico ."','". $fecha_nacimiento ."',". $drop_sangre .");";
        }
        if( isset($_POST['btn_modificar'])  ){
          $sql = "update estudiantes set carne='". $carne ."',nombres='". $nombres ."',apellidos='". $apellidos ."',direccion='". $direccion ."',telefono='". $telefono ."',fecha_nacimiento='". $fecha_nacimiento ."',correo_electronico='". $correo_electronico ."',id_tipo_sangre=". $drop_sangre ." where id_estudiante = ". $id_estudiante.";";
        }
        if( isset($_POST['btn_eliminar'])  ){
          $sql = "delete from estudiantes  where id_estudiante = ". $id_estudiante.";";
        }
         
          if ($db_conexion->query($sql)===true){
            $db_conexion->close();
           
            header('Location: /tarea_php');
          }else{
            $db_conexion->close();
          
          }

      }
?>