<?php
function Listar_Medicos($vConexion) {

    $ListadoMedico=array();

    //1) genero la consulta que deseo
    $SQL = "SELECT
     T.Id,
     T.Id_solicitante,
     P.Nombre as NombreM,
     P.Apellido as ApellidoM 
      
        FROM turnos T, pacientes P
        WHERE T.Id_solicitante=P.Id_paciente  
        ORDER BY T.Id";

    //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
     $rs = mysqli_query($vConexion, $SQL);
        
     //3) el resultado deberá organizarse en una matriz, entonces lo recorro
     $i=0;
    while ($data = mysqli_fetch_array($rs)) {
        
            $ListadoMedico[$i]['ID_MEDICO'] = $data['Id_solicitante'];
            $ListadoMedico[$i]['APELLIDO_PACIENTE'] = $data['ApellidoM'];
            $ListadoMedico[$i]['NOMBRE_PACIENTE'] = $data['NombreM'];
        
                    $i++;
    }

    
    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $ListadoMedico;

}
?>