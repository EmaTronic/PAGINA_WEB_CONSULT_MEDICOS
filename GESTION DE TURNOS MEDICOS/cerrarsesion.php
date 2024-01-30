<?php

//abro sesión
session_start();

//le otorgo un array pero vacío --- vacío el array
$_SESSION=array();

//destruyo "implicitamente" la sesión (que está vacía?)
session_destroy();

//Redirijo al login y salgo de acá :/
header('Location: login.php');
exit;

?>