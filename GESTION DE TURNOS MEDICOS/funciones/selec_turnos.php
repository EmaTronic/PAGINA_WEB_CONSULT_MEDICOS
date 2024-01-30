<?php
function Listar_Turnos($vConexion) {

    $Listado=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT T.Id,
     T.Fecha_turno, 
     T.Hora,
     T.Asistido,
     T.Id_solicitante,
     T.Id_paciente,
     P.Nombre as NombreP,
     P.Apellido as ApellidoP , 
     O.Obra_Social as Obra,
     R.Denominacion as Denominacion,
     R.Extra as Extra,
     R.Id_prestaciones as id_prestacion,
     R.Complejidad as complejidad,
     M.Apellido_M as ApellidoM,
     M.Nombre_M as NombreM
    
    
      
        FROM turnos T, pacientes P, obra_social O, prestaciones R, medicas M
        WHERE T.Id_paciente=P.Id_paciente  
          and T.Id_obraSocial = O.Id_obraSocial
        and T.Id_prestaciones = R.Id_prestaciones
        and T.Id_solicitante = M.Id_solicitante";

        if ($_SESSION['Usuario_Nivel'] == 3) {
        //si soy usuario normal, veo solo las mias
        $SQL.=" AND T.Id_paciente = ".$_SESSION['Usuario_Id'];
    }
    if ($_SESSION['Usuario_Nivel'] == 2) {
        //si soy usuario normal, veo solo las mias
        $SQL.=" AND T.Id_solicitante = ".$_SESSION['Usuario_Id'];
    }



    $SQL.="  ORDER BY T.Fecha_turno ASC, T.Hora ASC  ";

 
    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {

            $Listado[$i]['ID'] = $data['Id'];
            $Listado[$i]['FECHA_TURNO'] = $data['Fecha_turno'];
            $Listado[$i]['HORA_TURNO'] = $data['Hora'];
            $Listado[$i]['APELLIDO_PACIENTE'] = $data['ApellidoP'];
            $Listado[$i]['NOMBRE_PACIENTE'] = $data['NombreP'];
            $Listado[$i]['PRESTACION'] = $data['Denominacion'];
            $Listado[$i]['OBRA_SOCIAL'] = $data['Obra'];
            $Listado[$i]['APELLIDO_MEDICO'] = $data['ApellidoM'];
            $Listado[$i]['NOMBRE_MEDICO'] = $data['NombreM'];
            $Listado[$i]['ASISTIDO'] = $data['Asistido'];
            $Listado[$i]['EXTRA'] = $data['Extra'];
            $Listado[$i]['ID_PRESTACION'] = $data['id_prestacion'];
            $Listado[$i]['COMPLEJIDAD'] = $data['complejidad'];

            $i++;
    }


    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $Listado;



  }

    function Eliminar_Consulta($vConexion , $vIdConsulta) {
      //voy a permitir eliminar si :
      
  
      //soy admin 
      if ($_SESSION['Usuario_Nivel']== 4) {
          $SQL_MiConsulta="SELECT Id FROM  turnos
                          WHERE Id = $vIdConsulta ";
      }else {
  
      //o soy dueño de la consulta
          $SQL_MiConsulta="SELECT Id FROM turnos 
                          WHERE Id = $vIdConsulta AND Id_paciente = ".$_SESSION['Usuario_Nivel'];
      }
      
      $rs = mysqli_query($vConexion, $SQL_MiConsulta);
          
      $data = mysqli_fetch_array($rs);
  
      if (!empty($data['Id']) ) {
          //si se cumple todo, entonces elimino:
          mysqli_query($vConexion, "DELETE FROM turnos WHERE Id = $vIdConsulta");
          return true;
  
      }else {
          return false;
      }
      
  }


  function Modificar_Turno ($vConexion , $vIdConsulta) {
    //voy a permitir modificar si (en caso de que haya íconos en otros usuarios que no sea la secretaria):

    //soy admin 
        if ($_SESSION['Usuario_Nivel']== 4 ) {
            $SQL_MiConsulta="SELECT Id FROM  turnos
                            WHERE Id = $vIdConsulta ";
        }else {

        //o soy dueño de la consulta
            $SQL_MiConsulta="SELECT Id FROM turnos 
                            WHERE Id = $vIdConsulta AND Id_paciente = ".$_SESSION['Usuario_Nivel'];
         }
    
        $rs = mysqli_query($vConexion, $SQL_MiConsulta);
            
        $data = mysqli_fetch_array($rs);

        if (!empty($data['Id'])) {
            // Actualizar el estado de Asistido    
            mysqli_query($vConexion, "UPDATE turnos 
                SET Asistido = 
                    CASE WHEN Asistido = 'S' THEN 'N' 
                    ELSE 'S' END 
                WHERE Id = $vIdConsulta");
    
            // Verificar el estado después de la actualización
            $nuevoEstado = obtenerEstadoAsistido($vConexion, $vIdConsulta);
    
            if ($nuevoEstado == 'N') {
     
                $_SESSION['Mensaje'] = 'El estado se cambió de Asistido a No Asistido. Por lo tanto, ';
                $_SESSION['Estilo'] = 'success';
            } elseif ($nuevoEstado == 'S') {
               
                $_SESSION['Mensaje'] = 'El estado se cambió de No Asistido a Asistido. Por lo tanto, ';
                $_SESSION['Estilo'] = 'success';
            } else {
             
                $_SESSION['Mensaje'] = 'Se cambió la condición de la consulta, pero no se pudo determinar el nuevo estado.';
                $_SESSION['Estilo'] = 'warning';
            }
    
            return true;
        } else {
            $_SESSION['Mensaje'] = 'No se pudo modificar la consulta.';
            $_SESSION['Estilo'] = 'warning';
            return false;
        }


        
    }
    
    // Función para obtener el estado actual de Asistido
    function obtenerEstadoAsistido($vConexion, $vIdConsulta)
    {
        $sql = "SELECT Asistido FROM turnos WHERE Id = $vIdConsulta";
        $rs = mysqli_query($vConexion, $sql);
        $data = mysqli_fetch_array($rs);
    
        return !empty($data['Asistido']) ? $data['Asistido'] : null;
    }