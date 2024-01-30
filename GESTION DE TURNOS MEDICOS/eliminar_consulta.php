<?php
    session_start();
    if (empty($_SESSION['Usuario_Nivel']) ) {
        header('Location: cerrarsesion.php');
        exit;
    }
    
    require_once 'funciones/conexion.php';
    $MiConexion = ConexionBD();
   

    require_once 'funciones/selec_turnos.php';

    if ( Eliminar_Consulta($MiConexion , $_GET['ID_CONSULTA']) != false ) {
        $_SESSION['Mensaje'].='Se ha eliminado la consulta seleccionada';
        $_SESSION['Estilo']='success';
    }else {
        $_SESSION['Mensaje'].='No se pudo borrar la consulta. <br /> ';
        $_SESSION['Estilo']='warning';
    }
    
   
    header('Location: listado.php');
    exit;
?>