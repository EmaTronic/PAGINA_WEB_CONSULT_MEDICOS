
<?php 
session_start();

//print_r($UsuarioLogueado);

require_once 'funciones/conexion.php';
$MiConexion = ConexionBD();

$vMensaje = '';

if (!empty($_POST['BotonLogin'])) {
	require_once 'funciones/login.php';
	$vMensaje = Validar_Login();

    if (empty($vMensaje)) {
  
        $UsuarioLogueado = DatosLogin($_POST['email'], $_POST['password'], $MiConexion);

        if (!empty($UsuarioLogueado)) {
            $_SESSION['Usuario_Id'] = $UsuarioLogueado['ID'];
            $_SESSION['Usuario_Nombre'] = $UsuarioLogueado['NOMBRE'];
            $_SESSION['Usuario_Apellido'] = $UsuarioLogueado['APELLIDO'];
            $_SESSION['Usuario_Nivel'] = $UsuarioLogueado['NIVEL'];
            $_SESSION['Usuario_Img'] = $UsuarioLogueado['IMAGEN'];
            $_SESSION['Usuario_Obra_Social'] = $UsuarioLogueado['OBRA_SOCIAL'];

            header('Location: index.php');
            exit();
        } else {
            $vMensaje = 'Usuario y/o contraseña incorrectos.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>2do Desempeño</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />

	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.svg" type="image/x-icon">

	<!-- font css -->
	<link rel="stylesheet" href="assets/fonts/font-awsome-pro/css/pro.min.css">
	<link rel="stylesheet" href="assets/fonts/feather.css">
	<link rel="stylesheet" href="assets/fonts/fontawesome.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/customizer.css">


</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
				<form role="form" method='post'>
					<div class="card-body">
						<!--<img src="assets/images/logo-dark.svg" alt="" class="img-fluid mb-4"> -->
						
                        <h2>Ingresa al panel</h2>
						<h4 class="mb-3 f-w-400">Login</h4>
						<!--
						<div class="form-group text-left mt-2">
							<div class="alert alert-danger" role="alert">
                                Los datos son incorrectos. Intenta nuevamente. 
                            </div>
						</div>-->
					
							<div class="form-group text-left mt-2">
								<div class="alert alert-info" role="alert">
									Usuario y clave son requeridos.
								</div>
							</div>

							<?php if (!empty($vMensaje)) { ?>
								<div class="alert alert-warning alert-dismissable">
									<?php echo $vMensaje; ?>
								</div>
							<?php } ?>
													<!-- REQUERIMIENTO DE USUARIO (EMAIL)-->
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="mail"></i></span>
								</div>
								<input type="email" class="form-control" placeholder="Email address" name="email" id="email"
									value="<?php echo !empty($_POST ['email']) ? $_POST ['email'] : ''; ?>">
							</div>
								<!-- REQUERIMIENTO DE CONTRASEÑA-->
							<div class="input-group mb-4">
								<div class="input-group-prepend">
									<span class="input-group-text"><i data-feather="lock"></i></span>
								</div>
								<input type="password" class="form-control" placeholder="Password" name="password" id="password"
								value="<?php echo !empty($_POST ['password']) ? $_POST ['password'] : ''; ?>">
							
							</div>
							<button type="submit" class="btn btn-block btn-primary mb-4" value="Registrar" name="BotonLogin">Ingresa</button>
					
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<script src="assets/js/vendor-all.min.js"></script>
<script src="assets/js/plugins/bootstrap.min.js"></script>
<script src="assets/js/plugins/feather.min.js"></script>
<script src="assets/js/pcoded.min.js"></script>

</body>

</html>
