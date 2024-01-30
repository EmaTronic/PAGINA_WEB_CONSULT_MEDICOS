<?php 

function Validar_Login() {
    $vMensaje = '';

    if (empty($_POST['email'])) {
        $vMensaje .= "Debe ingresar una email<br />";
    }

    if (empty($_POST['password'])) {
        $vMensaje .= 'Debe ingresar un contraseña<br />';
    }

    return $vMensaje;
}


function DatosLogin($vUsuario, $vClave, $vConexion){
    $Usuario=array();
    //agrego la función de MD5 para que se encripte y compare con lo de la tabla
    $SQL="SELECT Id_paciente, Nombre, Apellido, Dni, Id_obraSocial, Id_nivel, Imagen
    FROM pacientes 
    WHERE Email='$vUsuario' AND Clave= MD5('$vClave')";
    $rs = mysqli_query($vConexion, $SQL);
     
    


    
    $data = mysqli_fetch_array($rs) ;
    if (!empty($data)) {
        $Usuario['ID'] = $data['Id_paciente'];
        $Usuario['NOMBRE'] = $data['Nombre'];
        $Usuario['APELLIDO'] = $data['Apellido'];
      //  $Usuario['DNI'] = $data['Dni'];
      //  $Usuario['OBRA_SOCIAL'] =$data ['Id_obraSocial'];
        $Usuario['NIVEL'] = $data['Id_nivel'];
        $Usuario['IMAGEN'] = $data['Imagen'];
    }
  
    return $Usuario;
}


?>


