<?php
function ListaDePersonas($vConexion) {

    $ListadoPersonas=array();

      //1) genero la consulta que deseo
        $SQL = "SELECT * FROM pacientes ORDER BY Apellido ASC ";

        //2) a la conexion actual le brindo mi consulta, y el resultado lo entrego a variable $rs
        $rs = mysqli_query($vConexion, $SQL);
        
        //3) el resultado deberá organizarse en una matriz, entonces lo recorro
        $i=0;
        while ($data = mysqli_fetch_array($rs)) {
     
            $ListadoPersonas[$i]['ID_PERSONA'] = $data['Id_paciente'];
            $ListadoPersonas[$i]['NOMBRE'] = $data['Nombre'];
            $ListadoPersonas[$i]['APELLIDO'] = $data['Apellido'];
            $ListadoPersonas[$i]['DNI'] = $data['Dni'];
            $ListadoPersonas[$i]['ID_OBRA_SOCIAL'] = $data['Id_obraSocial'];
            $ListadoPersonas[$i]['NIVEL'] = $data['Id_nivel'];

            $i++;
        }

    //devuelvo el listado generado en el array $Listado. (Podra salir vacio o con datos)..
    return $ListadoPersonas;

}
?>