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
                            <?php if (!empty($_SESSION['Mensaje'])) { ?>
                                <div class="alert alert-<?php echo $_SESSION['Estilo']; ?> alert-dismissable">
                                    <?php echo $_SESSION['Mensaje'] ; ?>
                                </div>
                            <?php } ?>

                        </div>
                        <ul class="breadcrumb">
                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Contextual-table ] start -->
        <div class="col-md-12">
        <BR/>
                       
                        <BR/>
                <div class="card">
                
                <?php if ($_SESSION ['Usuario_Nivel']==4 ){?>
                    <div class="card-header">
                        <BR/>
                        <h5>Todas las Prestaciones cargadas (Solo personal administrativo  - secretaria) ( # <?php
                                $maxElementos = 6;
                                //EL FAMOSO OPERADOR TERNARIO
                                $numElementos = ($Cantida_Lista_Turnos > $maxElementos) ? $maxElementos : $Cantida_Lista_Turnos;
                                echo $numElementos; ?>)  

                                  
                                <BR/>  <BR/><ul class="breadcrumb">
                         
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">Listados</a></li>
                                <li class="breadcrumb-item">Todas las prestaciones cargadas </li>
                                <!-- ver los titulos solicitados en el pdf-->
                                
                            </ul>
                        </h5>
                    </div>
                    <?php } ?>


                    <?php if ($_SESSION ['Usuario_Nivel']==1 ){?>
                    <div class="card-header">


                        <BR/>
                        <h5>Todas las Prestaciones cargadas (Solo personal administrativo ) ( # <?php echo $Cantida_Lista_Turnos; ?>)  
                               
                                  
                                <BR/>  <BR/><ul class="breadcrumb">
                         
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">Listados</a></li>
                                <li class="breadcrumb-item">Todas las prestaciones cargadas </li>
                                <!-- ver los titulos solicitados en el pdf-->
                                
                            </ul>
                        </h5>
                    </div>






                    <?php } ?>

                    <?php if ($_SESSION ['Usuario_Nivel']==2 ){?>
                            <div class="card-header">
                            <BR/>
                                <h5>Todas las Prestaciones cargadas (Solo acceso médico) ( # <?php echo $Cantida_Lista_Turnos; ?>)  
                                <BR/> <BR/><ul class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item"><a href="#!">Listados</a></li>
                                        <li class="breadcrumb-item">Mis prestaciones cargadas </li>
                                        <!-- ver los titulos solicitados en el pdf-->
                                        
                                    </ul>
                                </h5>
                            </div>
                    <?php } ?>

          >

                     <!-- ver los titulos solicitados en el pdf y en (xx) poder ver la cantidad de registros visualizados-->

                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <!-- ver columnas y datos solicitados para cada nivel -->
                                    <tr>
                                        <th>#
                                          
                                        </th>
                                        <th>Fecha</th>
                                        <th>Paciente</th>
                                        <th>Obra social</th>
                                        <th>Solicitante</th>
                                        <th>Prestación</th>
                                        
                                        <?php if ($_SESSION ['Usuario_Nivel']==4 ){  ?>
                                            <th>Acciones</th>
                            
					    <?php }?>
                                        
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
                                        <td><?php echo $Lista_Turnos[$i]['ID']; ?></td>
                                        <td><?php echo $Lista_Turnos[$i]['FECHA_TURNO']. ' * ' . $Lista_Turnos[$i]['HORA_TURNO']; ?></td>
                                        <td><?php echo ($Lista_Turnos[$i]['APELLIDO_PACIENTE'].' '.$Lista_Turnos[$i]['NOMBRE_PACIENTE']); ?></td>
                                        <td><?php echo $Lista_Turnos[$i]['OBRA_SOCIAL']; ?></td>
                                        <td><?php echo 'DR/A ' . ($Lista_Turnos[$i]['APELLIDO_MEDICO'].' '.$Lista_Turnos[$i]['NOMBRE_MEDICO']); ?></td>
                                        <td><?php echo $Lista_Turnos[$i]['PRESTACION'];?><br>
                                            <?php if ($Lista_Turnos[$i]['ID_PRESTACION']==3 || $Lista_Turnos[$i]['ID_PRESTACION']==4){
                                                  if($_SESSION ['Usuario_Nivel']==1 || $_SESSION ['Usuario_Nivel']==4){
                                                  echo  'Monto a abonar = ' . $Lista_Turnos[$i]['EXTRA'];}
                                            }
                                            
                                            ?></td>
                                         
                                                 <?php if ($_SESSION ['Usuario_Nivel']==4 ){  ?>
                            
	                                       <td>
                                        
                                                    
                                                    <a  href="cambiar_condicion.php?ID_CONSULTA=<?php echo $Lista_Turnos[$i]['ID']; ?>" 
                                                                class="icon feather icon-clock f-20  text-success " 
                                                                title="Cambiar condicion turno"
                                                                onclick="if (confirm('¿Estais segur@ que quereis modificar esta consulta?')) {return true;} else {return false;}">
                                                                
                                                    </a>

                                                    
                                                
                                                    
                                                    <a  href="eliminar_consulta.php?ID_CONSULTA=<?php echo $Lista_Turnos[$i]['ID']; ?>" 
                                                                class="feather icon-trash-2 ml-3 f-20 text-danger " 
                                                                title="Cancelar turno"
                                                                onclick="if (confirm('¿Estais segur@ que quereis eliminar esta consulta?')) {return true;} else {return false;
                                                                }">
                                                                    
                                                    </a>

                                            </td>

                                            <?php }?>
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
            <?php if ($_SESSION ['Usuario_Nivel']==1){  ?>
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
                                                        if($Lista_Turnos[$i]['COMPLEJIDAD']=='S')
                                                            if ($Lista_Turnos[$i]['ID_PRESTACION']==3 || $Lista_Turnos[$i]['ID_PRESTACION']==4){
                                                                $Total= $Total + $Lista_Turnos[$i]['EXTRA'];
                                                                $cant ++;
                                                                }                                 
                                                            }
                                                    echo $cant;?>
                                                </h3>
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
                                            <h6 class="m-b-5 text-white">Total Recaudación</h6>
                                            <h3 class="m-b-0 text-white">
                                                <?php
                                                   
                                                    echo $Total;
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
            <?php }?>

                </div>


       

</section>
<?php $_SESSION['Mensaje']= ''; 
        $_SESSION['Estilo']='';
?>