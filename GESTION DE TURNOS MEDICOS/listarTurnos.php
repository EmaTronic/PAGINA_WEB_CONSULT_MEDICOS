<?php 

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    //si tengo vacío mi elemento de sesion me tiene que redireccionar al login
    // al cerrarsesion para mate todo de la sesion y el se encarga de ubicar en el login


    //voy a necesitar la conexion: incluyo la funcion de Conexion.
    require_once 'funciones/conexion.php';

    //genero una variable para usar mi conexion desde donde me haga falta
    //no envio parametros porque ya los tiene definidos por defecto
    $MiConexion = ConexionBD();

    //ahora voy a llamar el script con la funcion que genera mi listado
    require_once 'funciones/selec_turnos.php';


    //voy a ir listando lo necesario para trabajar en este script: 
    $Lista_Turnos = Listar_Turnos($MiConexion);
    $Cantida_Lista_Turnos = count($Lista_Turnos);

        for ($i=0 ; $i < $Cantida_Lista_Turnos ; $i++) {
                                                        
            $Lista_Turnos[$i]['ID'];
            $Lista_Turnos[$i]['FECHA_TURNO'];
            $Lista_Turnos[$i]['HORA_TURNO'];
            $Lista_Turnos[$i]['APELLIDO_PACIENTE'];
            $Lista_Turnos[$i]['NOMBRE_PACIENTE'];
            $Lista_Turnos[$i]['PRESTACION'];
            $Lista_Turnos[$i]['OBRA_SOCIAL'];
            $Lista_Turnos[$i]['APELLIDO_MEDICO'];
            $Lista_Turnos[$i]['NOMBRE_MEDICO'];
            $Lista_Turnos[$i]['ASISTIDO'];
            $Lista_Turnos[$i]['EXTRA'];
            $Lista_Turnos[$i]['ID_PRESTACION']; 
            $Lista_Turnos[$i]['COMPLEJIDAD'];
        }

?>