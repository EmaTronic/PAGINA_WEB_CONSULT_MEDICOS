<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (empty($_SESSION['Usuario_Id'])){
    header('Location: cerrarsesion.php');
    exit;
    
}


require_once 'funciones/conexion.php';
$MiConexion=ConexionBD(); 



//$UsuarioTurnos = Listar_Turnos($MiConexion );


//ahora voy a llamar el script con la funcion que genera mi listado
require_once 'listar_prestaciones.php';

require_once 'listar_personas.php';

//voy a ir listando lo necesario para trabajar en este script: 

require_once 'funciones/insertar_turnos.php';

//require_once 'funciones/validacion_registro_usuario.php'; 
//require_once 'funciones/insertar_turnos.php';



$Mensaje='';
$Estilo='warning';


if (!empty($_POST['BotonRegistrar'])) {
    //estoy en condiciones de poder validar los datos

   $Mensaje=validar_turno();
  
  
    if (empty($Mensaje)) { ///no hubo errores, paso a registrar
        if (InsertarTurnos($MiConexion) != false) {
            $_SESSION['Mensaje']= "El turneli se ha registrado correctamente! :) .";
            $_SESSION['Estilo']='success';

            $_POST = array ();
            
            header ('Location:carga.php');
           
            exit;
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



	<!-- Include Bootstrap CDN
	<link href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
		rel="stylesheet"> -->
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
	</script>
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
	</script>
    <!--
Include Moment.js CDN  -->
	<script type="text/javascript" src=
"https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
	</script>

	<!-- Include Bootstrap DateTimePicker CDN -->
	<link
		href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css"
		rel="stylesheet">

	<script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js">
		</script>

</head>
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ Mobile header ] start -->
	<div class="pc-mob-header pc-header">
		<div class="pcm-logo">
			<img src="assets/images/logo.svg" alt="" class="logo logo-lg">
		</div>
		<div class="pcm-toolbar">
			<a href="#!" class="pc-head-link" id="mobile-collapse">
				<div class="hamburger hamburger--arrowturn">
					<div class="hamburger-box">
						<div class="hamburger-inner"></div>
					</div>
				</div>
				<!-- <i data-feather="menu"></i> -->
			</a>

			<a href="#!" class="pc-head-link" id="header-collapse">
				<i data-feather="more-vertical"></i>
			</a>
		</div>
	</div>
	<!-- [ Mobile header ] End -->

	<!-- [ navigation menu ] start -->
	<nav class="pc-sidebar ">
		<div class="navbar-wrapper">
			<div class="m-header">
				<a href="index.html" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="assets/images/logo.svg" alt="" class="logo logo-lg">
					<img src="assets/images/logo-sm.svg" alt="" class="logo logo-sm">
				</a>
			</div>
			<div class="navbar-content">
				<ul class="pc-navbar">
					<li class="pc-item pc-caption">
						<label>Navegación</label>
                        <li class="pc-item"><a href="index.php" class="pc-link ">
                        <span class="pc-micon"><i data-feather="layout"></i></span>
                        <span class="pc-mtext">Inicio</span></a>
                    </li>
					</li>

				
					<li class="pc-item pc-caption">
						<label>Prestaciones</label>
					</li>
                    
				
                    <li class="pc-item"><a href="carga.php" class="pc-link " >
                        <span class="pc-micon"><i data-feather="layout"></i></span>
                        <span class="pc-mtext">Cargar nueva</span></a>
                    </li>
					<li class="pc-item pc-caption">
						<label>Listados</label>
					</li>
					<li class="pc-item"><a href="listado.php" class="pc-link ">
                        <span class="pc-micon"><i data-feather="list"></i></span>
                        <span class="pc-mtext">Listado de mis turnos</span></a>
                    </li>
					


					
					
              
				</ul>
			</div>
		</div>
	</nav>
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
	<header class="pc-header ">
		<div class="header-wrapper">
			
			<div class="ml-auto">
				<ul class="list-unstyled">
					<li class="dropdown pc-h-item">
						<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<i data-feather="search"></i>
						</a>
						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown drp-search">
							<form class="px-3">
								<div class="form-group mb-0 d-flex align-items-center">
									<i data-feather="search"></i>
									<input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
								</div>
							</form>
						</div>
					</li>
					<li class="dropdown pc-h-item">
                    
                    <?php require_once 'informa_usuario.php';?>

						<div class="dropdown-menu dropdown-menu-right pc-h-dropdown">
							<div class=" dropdown-header">
								<h6 class="text-overflow m-0">Bienvenido!</h6>
							</div>
							<a href="#!" class="dropdown-item">
								<i data-feather="user"></i>
								<span>Mis Datos</span>
							</a>							
							<a href="cerrarsesion.php" class="dropdown-item">
								<i data-feather="power"></i>
								<span>Cerrar sesión</span>
							</a>
						</div>
					</li>
                    
                </div>
				</ul>
             
			</div>
         
                <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h5 class="m-b-10">--Solicitudes--</h5>
                            </div>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">Prestaciones</a></li>
                                <li class="breadcrumb-item">Carga nueva </li>
                                <!-- ver los titulos solicitados en el pdf-->
                                
                            </ul>
                        </div>
                </div>
        
	</header>

	<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<section class="pc-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                       
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ form-element ] start -->
            <div class="col-md-12">
                <div class="card">


                    <div class="card-body">
                        <h5>Cargar Solicitud </h5>
                        <hr>

                        
                        <?php if (!empty($Mensaje)) { ?>
                          
                            <div class="alert alert-warning" role="alert">
                            <i data-feather="alert-circle"></i> 
							Debe completar todos los datos requeridos. 
                            <?php $_SESSION['Mensaje'] ='';?>
						</div>
                         <?php } ?>

                  
                         <?php if (!empty($_SESSION['Mensaje'])) { ?>
                                        <div class="alert alert-<?php echo $_SESSION['Estilo']; ?> alert-dismissable">
                                        <?php echo $_SESSION['Mensaje'] ?>
                                        </div>
                            <?php } ?>

                     

                        <div class="alert alert-info" role="alert">
                        <i data-feather="info"></i> 
							Los campos con * son obligatorios. 
						</div>

                        <form role="form" method='post' id="miFormulario">
                      
                                <div class="row">
                                    <div class="col-md-6">


                                    <?php if (!empty($Mensaje)) { ?>
                                        <div class="alert alert-<?php echo $Estilo; ?> alert-dismissable">
                                        <?php echo $Mensaje; ?>
                                        </div>
                                        <?php } ?>


                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1">Indique el Paciente (*)
                                                </label>
                                                <select class="form-control" name="Persons" id="persons">

                                                    <option value="">Selecciona una opción...</option>
                                                    
                                                    <?php
                                                    // Inicia un bucle for para iterar sobre un conjunto de datos (array de personas)
                                                    for ($i = 0; $i < $CantidadPersonas; $i++) {
                                                        // Inicializa la variable $selected como una cadena vacía
                                                        $selected = '';

                                                        // Verifica si hay un valor en $_POST['Persons'] y si coincide con el ID_PERSONA actual en el bucle
                                                        if (!empty($_POST['Persons']) && $_POST['Persons'] == $Lista_Personas[$i]['ID_PERSONA']) {
                                                            // Si hay coincidencia, establece $selected en 'selected'
                                                            $selected = 'selected';
                                                        

                                                          // Asigna el valor de ID_OBRA_SOCIAL solo cuando se selecciona un paciente
                                                            $_POST['OvraSocial'] = $Lista_Personas[$i]['ID_OBRA_SOCIAL'];

                                                        } else {
                                                            // Si no hay coincidencia, deja $selected como una cadena vacía
                                                            $selected = '';
                                                        }
                                                        // Imprime una opción para un elemento de lista desplegable (por ejemplo, un select)
                                                        ?>
                                                        <option value="<?php echo $Lista_Personas[$i]['ID_PERSONA']; ?>" <?php echo $selected; ?>  >
                                                            <?php
                                                            // Imprime información sobre la persona, como apellido, nombre y DNI
                                                            echo $Lista_Personas[$i]['APELLIDO'] . ' ' . $Lista_Personas[$i]['NOMBRE']
                                                                . ' - DNI # ' . $Lista_Personas[$i]['DNI'];
                                                               
                                                            ?>
                                                        </option>
                                                                                    
                                                    <?php } 
                                                  ?>

                                                </select>
                                            </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleFormControlSelect2">Seleccione Prestación (*)</label>
                                                <select class="form-control" name="Prestac" id="prestac">
                                                    <option value="">Selecciona una opción...</option>

                                                    <?php
                                                    // Itera sobre la lista de prestaciones
                                                    for ($i = 0; $i < $CantidadPrestacion; $i++) {
                                                        // Inicializa la variable $selected como una cadena vacía
                                                        $selected = '';

                                                        // Verifica si el valor de $_POST['Prestac'] coincide con el ID de la prestación actual
                                                        if (!empty($_POST['Prestac']) && $_POST['Prestac'] == $ListadoPrestacion[$i]['ID_PRESTACION']) {
                                                            // Si hay coincidencia, establece $selected como 'selected'
                                                            $selected = 'selected';
                                                        } else {
                                                            // Si no hay coincidencia, deja $selected como una cadena vacía
                                                            $selected = '';
                                                        }
                                                        ?>
                                                        <!-- Abre una etiqueta <option> con el valor y el atributo 'selected' según la lógica anterior -->
                                                        <option value="<?php echo $ListadoPrestacion[$i]['ID_PRESTACION']; ?>" <?php echo $selected; ?>>
                                                            <!-- Muestra el texto de la prestación -->
                                                            <?php echo $ListadoPrestacion[$i]['PRESTACION']; ?>
                                                        </option>
                                                        <!-- Cierra la etiqueta <option> -->
                                                    <?php } ?>


                                                </select>
                                            </div>
                                        </div>

                                                     
                                    <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="texto">Ingrese el Diagnóstico</label>

                                                    <textarea class="form-control" name="Diagno" id="diagno"><?php echo !empty($_POST['Diagno']) ? $_POST['Diagno'] : ''; ?></textarea>
                                                    
                                            </div>
                                    </div>


                                    <div class="col-md-6">
                                        <label for="datepicker">Ingresa Fecha y Hora (*)</label>
                                        <div class="col-md-3">
                                            <div class="md-form md-outline input-with-post-icon datepicker">
                                                <input class="form-control" type="date" id="datepicker" 
                                                name="date" value="<?php echo !empty($_POST['date']) ? $_POST['date'] : ''; ?>" min="<?php echo date('Y-m-d'); ?>">
                                            </div>
                                    
                                            <div class="md-form md-outline input-with-post-icon datepicker">
                                                <input class="form-control" placeholder="Selecciona hora" name="hora" type="time" id="timepicker" 
                                                value="<?php echo !empty($_POST['hora']) ? $_POST['hora'] : ''; ?>" min="08:00" max="19:00">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                                        
                                                               
                                   
                                    <!--
                                    <script>
                                        document.addEventListener("DOMContentLoaded", function() {
                                            var timePicker = document.getElementById("timepicker");
                                            var datePicker = document.getElementById("datepicker");

                                            // Agrega un listener para el cambio en el valor de la entrada de hora
                                            timePicker.addEventListener("input", function() {
                                                var selectedHour = parseInt(timePicker.value.split(":")[0], 10);

                                                // Verifica si la hora seleccionada está fuera del rango permitido
                                                if (selectedHour < 8 || selectedHour > 19) {
                                                    alert("Selecciona una hora válida entre las 08:00 y las 19:00");
                                                    timePicker.value = ""; // Limpia el valor para indicar que la hora no es válida
                                                    datePicker.setCustomValidity(""); // Limpia la validación de la fecha
                                                } else {
                                                    datePicker.setCustomValidity("Completa este campo");
                                                }
                                            });
                                        });
                                    </script>
                                    
                                    -->

                                

                                    
                                    <div class="col-md-12">
                                            <button class="btn  btn-primary" type="submit" value="Registrar" name="BotonRegistrar">Registrar!</button> 
                                            <button class="btn btn-secondary" type="button" value="Limpiar datos" onclick="limpiarFormulario()"> Limpiar Datos</button>

                                            <a class="btn btn-light" href="index.php" role="button">Volver a Home</a>
                                    </div>
                                    
                                    <script>
                                        function limpiarFormulario() {
                                            // Restablecer el formulario
                                            document.getElementById("miFormulario").reset();
                                        }
                                    </script>




                                </div>
                        </form>
                       

                        <script>
                            $('#datetime').datetimepicker({
                                format: 'HH:mm:ss'
                            });
                        </script>
                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->

    </div>
</section>

    <!-- Required Js -->
    <script src="assets/js/vendor-all.min.js"></script>
    <script src="assets/js/plugins/bootstrap.min.js"></script>
    <script src="assets/js/plugins/feather.min.js"></script>
    <script src="assets/js/pcoded.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="assets/js/plugins/clipboard.min.js"></script>
    <script src="assets/js/uikit.min.js"></script>

<script>


    // header option
    $('#pct-toggler').on('click', function() {
        $('.pct-customizer').toggleClass('active');

    });
    // header option
    $('#cust-sidebrand').change(function() {
        if ($(this).is(":checked")) {
            $('.theme-color.brand-color').removeClass('d-none');
            $('.m-header').addClass('bg-dark');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
            $('.theme-color.brand-color').addClass('d-none');
        }
    });
    // Header Color
    $('.brand-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.m-header').removeClassPrefix('bg-');
        } else {
            $('.m-header').removeClassPrefix('bg-');
            $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
            $('.m-header').addClass(temp);
        }
    });
    // Header Color
    $('.header-color > a').on('click', function() {
        var temp = $(this).attr('data-value');
        // $('.header-color > a').removeClass('active');
        // $('.pcoded-header').removeClassPrefix('brand-');
        // $(this).addClass('active');
        if (temp == "bg-default") {
            $('.pc-header').removeClassPrefix('bg-');
        } else {
            $('.pc-header').removeClassPrefix('bg-');
            $('.pc-header').addClass(temp);
        }
    });
    // sidebar option
    $('#cust-sidebar').change(function() {
        if ($(this).is(":checked")) {
            $('.pc-sidebar').addClass('light-sidebar');
            $('.pc-horizontal .topbar').addClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo-dark.svg');
        } else {
            $('.pc-sidebar').removeClass('light-sidebar');
            $('.pc-horizontal .topbar').removeClass('light-sidebar');
            // $('.m-header > .b-brand > .logo-lg').attr('src', 'assets/images/logo.svg');
        }
    });
    $.fn.removeClassPrefix = function(prefix) {
        this.each(function(i, it) {
            var classes = it.className.split(" ").map(function(item) {
                return item.indexOf(prefix) === 0 ? "" : item;
            });
            it.className = classes.join(" ");
        });
        return this;
    };
</script>


</body>

<?php $_SESSION['Mensaje']= ''; 
        $_SESSION['Estilo']='';
?>

</html>


