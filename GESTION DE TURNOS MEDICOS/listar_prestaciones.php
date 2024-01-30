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
require_once 'funciones/select_prestacion.php';


//voy a ir listando lo necesario para trabajar en este script: 
$ListadoPrestacion = Listar_Prestacion($MiConexion);
$CantidadPrestacion = count($ListadoPrestacion);

for ($i=0 ; $i < $CantidadPrestacion ; $i++) {
                                            
     $ListadoPrestacion[$i]['ID_PRESTACION'] ;
     $ListadoPrestacion[$i]['PRESTACION'] ; 
     $ListadoPrestacion[$i]['EXTRA']; 
     $ListadoPrestacion[$i]['COMPLEJIDAD'] ;

}


?>