<?php 

    function validar_turno(){
        $vMensaje='';

        if (empty($_POST['Persons'])) {
            $vMensaje.= "Debe seleccionar un/a paciente.<br />";
        }
        if (empty($_POST['Prestac'])) {
            $vMensaje.= "Debe seleccionar una prestacion.<br />";
        }
        if (empty($_POST['date'])) {
            $vMensaje.= "Debe ingresar una fecha.<br />";
        }
        if (empty($_POST['hora'])) {
            $vMensaje.= "Debe ingresar una hora.<br />";
        }
        
        if (empty($_SESSION['Usuario_Id'])) {
            $vMensaje.= "Hubo un error al registrar el médico.<br />";
        }


        //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    
        return $vMensaje;
    }

    function InsertarTurnos($vConexion) {
        $listadoPersonas = ListaDePersonas($vConexion);
    
        // Buscar el ID de obra social correspondiente a la persona seleccionada
        $idObraSocial = "";
        foreach ($listadoPersonas as $persona) {
            if ($persona['ID_PERSONA'] == $_POST['Persons']) {
                $idObraSocial = $persona['ID_OBRA_SOCIAL'];
                break;
            }
        }
    
        // Verificar si se encontró el ID de obra social
        if ($idObraSocial === "") {
            die('<h4>Error: No se encontró el ID de obra social para la persona seleccionada.</h4>');
        }
    
        $SQL_Insert = "INSERT INTO turnos(Id, Id_paciente, Fecha_consulta, Id_prestaciones, Fecha_turno, Hora, Diagnostico, Asistido, Id_obraSocial, Id_solicitante) 
            VALUES ('', '" . $_POST['Persons'] . "', NOW(), '" . $_POST['Prestac'] . "', '" . $_POST['date'] . "',
            '" . $_POST['hora'] . "', '" . $_POST['Diagno'] . "', 'N', '$idObraSocial', '" . $_SESSION['Usuario_Id'] . "')";
    
        if (!mysqli_query($vConexion, $SQL_Insert)) {
            // Si surge un error, finalizo la ejecución del script con un mensaje
            die('<h4>Error al intentar insertar el registro.</h4>');
        }
    
        return true;
    }
    

//
?>

