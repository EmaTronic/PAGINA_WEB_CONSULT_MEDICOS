<?php 
session_start();

if (empty($_SESSION['Usuario_Id'])){
    header('Location: cerrarsesion.php');
    exit;
    
}

//si tengo vacío mi elemento de sesion me tiene que redireccionar al login
// al cerrarsesion para mate todo de la sesion y el se encarga de ubicar en el login


//voy a necesitar la conexion: incluyo la funcion de Conexion.
require_once 'funciones/conexion.php';

//genero una variable para usar mi conexion desde donde me haga falta
//no envio parametros porque ya los tiene definidos por defecto
$MiConexion = ConexionBD();

//ahora voy a llamar el script con la funcion que genera mi listado
require_once 'listarTurnos.php';


//voy a ir listando lo necesario para trabajar en este script: 

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

					</li>

				
					<li class="pc-item pc-caption">
						<label>Prestaciones</label>
					</li>

	
					<li class="pc-item pc-caption">
						<label>Listados</label>
					</li>

                        
                        <?php if ($_SESSION ['Usuario_Nivel']==3 ){  ?>
                            <li class="pc-item"><a href="listadoMissAsistencia.php" class="pc-link ">
                                <span class="pc-micon"><i data-feather="layout"></i></span>
                                <span class="pc-mtext">Listado de mis turnos</span></a>
                            </li>
					    <?php }?>

                      
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
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Prestaciones</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#!">Listados</a></li>
                            <li class="breadcrumb-item">Mis turnos asignados </li>
                            <!-- ver los titulos solicitados en el pdf-->
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <br/>
        <!-- [ breadcrumb ] end -->
        <!-- [ Contextual-table ] start -->
        <div class="col-md-12">
                <div class="card">
                    <br/>
                    <div class="card-header">
                        <h5>Mis turnos asignados de paciente # (<?php echo $Cantida_Lista_Turnos; ?>)</h5>
                    </div>
                     <!-- ver los titulos solicitados en el pdf y en (xx) poder ver la cantidad de registros visualizados-->

                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <!-- ver columnas y datos solicitados para cada nivel -->
                                    <tr>
                                        <th>#</th>
                                        <th>Fecha y Hora</th>
                                        <th>Paciente</th>
                                        <th>Obra social</th>
                                        <th>Solicitante</th>
                                        <th>Prestación</th>
                                     
                                    </tr>
                                </thead>
                                <tbody>
                                
                                <?php 

                            //QUÉ COLOR PARA CADA FILA :)    
                            // Obtén la fecha y hora actual                      
                            // Combina la fecha y hora del turno en un formato compatible con la fecha y hora actual
                            $maxElementos = 6;

                            if ($_SESSION ['Usuario_Nivel']==4 ){ 
                                //TERNARY OPERATOR :)
                            $numElementos = ($Cantida_Lista_Turnos > $maxElementos) ? $maxElementos : $Cantida_Lista_Turnos;

                            } else{

                                $numElementos = $Cantida_Lista_Turnos;
                            }
                         

                            for ($i=0; $i<$numElementos; $i++) { 


                            $fechaHoraActual = date('Y-m-d H:i:s');
                            $fechaHoraTurno = $Lista_Turnos[$i]['FECHA_TURNO'] . ' ' . $Lista_Turnos[$i]['HORA_TURNO'];
                        ?>
                         

                            <tr <?php
                                //PUNTO DUDOSO DE LA CONSIGNA - MOTIVO PARA DESAPROBAR - 
                                /*CONSIGNA PAGINA 2 : " Tambien se contará con un dato que indique si el turno fue Asistido o
                                    No Asistido (elegir como trabajar, esto servirá luego para mostrar
                                    colores en el listado). Al guardar el turno, este valor será como “No
                                    asistido”."
                                CONSIGNA PAGINA 3 SECRETARIA : "Para este y todos los niveles, los colores de cada fila de la grilla dependen del campo
                                    que indica si el turno fue Cargado, Asistido o No Asistido. (Queda en blanco si solo fue
                                    cargado, verde para cuando el turno figure Asistido, el naranja cuando se cargue que
                                    fue No asistido). Esto en todos los listados, revisar el tooltip indicando esta
                                    información. Pueden cambiar el valor a mano directamente en la base para probar los
                                    diferentes colores. No se pide por el momento programar el Cambio de estado del
                                    turno." 
                                SI EL TURNO FUE CARGADO  Y EL VALOR ES/SERÁ COMO "NO ATENDIDO", ¿CUÁNDO ADQUIERE EL VALOR DE 'Cargado'?
                                una posible solución es que el turno se coloree como cargado (N), y si pasa la fecha del turno y no fue cambiado a la condición
                                de 'asistido', el turno pasa a la condición de 'no asistido'. Así mismo, la secretaria puede cambiar la condición del turno de 
                                'no asistido' a 'asistido', incluso pasada la fecha del turno*/
                            
                                        if( $fechaHoraTurno > $fechaHoraActual && $Lista_Turnos[$i]['ASISTIDO'] == 'N')
                                            {?>
                                                class="table-light";
                                                title="Este turno solo fue cargado";
                                    
                                <?php } if ($fechaHoraTurno < $fechaHoraActual && $Lista_Turnos[$i]['ASISTIDO'] == 'N')
                                            { ?>
                                                class = 'table-warning';    
                                                title="Este turno no fue asistido";                             
                                <?php } else  if  ($Lista_Turnos[$i]['ASISTIDO'] == 'S') 
                                            { ?>
                                                class= 'table-success';
                                                title="Este turno fue asistido";
                                <?php }  ?>
                                
                       
                            >
                                        <td>
                                                
                                      
                                            
                                        
                                        </td>
                                            <td><?php echo $Lista_Turnos[$i]['FECHA_TURNO']. ' * ' . $Lista_Turnos[$i]['HORA_TURNO']; ?></td>
                                            <td><?php echo ($Lista_Turnos[$i]['APELLIDO_PACIENTE'].' '.$Lista_Turnos[$i]['NOMBRE_PACIENTE']); ?></td>
                                            <td><?php echo $Lista_Turnos[$i]['OBRA_SOCIAL']; ?></td>
                                            <td><?php echo ($Lista_Turnos[$i]['APELLIDO_MEDICO'].' '.$Lista_Turnos[$i]['NOMBRE_MEDICO']); ?></td>
                                            <td><?php echo $Lista_Turnos[$i]['PRESTACION'];?><br>
                                             <?php if ($Lista_Turnos[$i]['ID_PRESTACION']==3 || $Lista_Turnos[$i]['ID_PRESTACION']==4){
                                                echo  'Costo = ' . $Lista_Turnos[$i]['EXTRA'];
                                            }
                                            
                                            ?></td>
                                         
                                            </tr>
                                        <?php } ?>
                            
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
            <!-- [ Contextual-table ] end -->


               
            <!-- support-section start -->
            <div class="col-xl-6 col-md-12">
                <div class="card flat-card">
                    <div class="row-table">
                    <div class="col-sm-6">
                        <div class="card prod-p-card background-pattern">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5">Cantidad de Prestaciones Complejas</h6>
                                    <h3 class="m-b-0"><?php 
                                    $cant=0;
                                    $Total=0;
                                   
                                    for ($i=0; $i<$Cantida_Lista_Turnos; $i++){

                                        if ($Lista_Turnos[$i]['COMPLEJIDAD']=='S'&& $Lista_Turnos[$i]['ASISTIDO']=='S'){
                                            if ($Lista_Turnos[$i]['ID_PRESTACION']==3){
                                                $Total= $Total + ($Lista_Turnos[$i]['EXTRA']/10);
                                                $cant ++;
                                            } else if ($Lista_Turnos[$i]['ID_PRESTACION']==4){
                                                $Total= $Total + ($Lista_Turnos[$i]['EXTRA']/5);
                                            $cant ++;
                                      
                                            }
                                        }
                                   
                                }
                                echo $cant;
                                    ?></h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tags text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="col-sm-6">
                        <div class="card prod-p-card bg-primary background-pattern-white">
                            <div class="card-body">
                                <div class="row align-items-center m-b-0">
                                    <div class="col">
                                        <h6 class="m-b-5 text-white">Total a pagar aplicado el descuento de obra social</h6>
                                        <h3 class="m-b-0 text-white">
                                            <?php
                                               
                                                echo '$   ' .$Total;
                                            ?>

                                        </h3>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-money-bill-alt text-white"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>   
                </div>
            </div>

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


</body>

</html>

         