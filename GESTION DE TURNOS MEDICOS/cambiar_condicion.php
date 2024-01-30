<?php
    session_start();
    if (empty($_SESSION['Usuario_Nombre']) ) {
        header('Location: cerrarsesion.php');
        exit;
    }
    
    require_once 'funciones/conexion.php';
    $MiConexion = ConexionBD();
   

    require_once 'funciones/selec_turnos.php';

    if ( Modificar_Turno ($MiConexion , $_GET['ID_CONSULTA']) != false ) {
        $_SESSION['Mensaje'].='se cambió la condición de la consulta';
        $_SESSION['Estilo']='success';
    }else {
        $_SESSION['Mensaje'].='No se pudo modificar la consulta. <br /> ';
        $_SESSION['Estilo']='warning';
    }
    
   
    header('Location: listado.php');
    exit;
?>