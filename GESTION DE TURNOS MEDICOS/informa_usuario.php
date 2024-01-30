<a class="pc-head-link dropdown-toggle arrow-none mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src=                   
                            "assets/images/user/<?php echo $_SESSION['Usuario_Img'];?>" alt="user-image" class="user-avtar">
							<span>
                            <span class="user-name"> <?php echo  $_SESSION['Usuario_Apellido'] .' '. $_SESSION['Usuario_Nombre']  ?></span>
								<span class="user-desc"><?php 
                                if ($_SESSION['Usuario_Nivel'] ==1){
                                    echo 'ADMINISTRADOR';
                                } else if ($_SESSION['Usuario_Nivel'] ==2){
                                    echo 'DOCTOR ESPECIALISTA';
                                }else if ($_SESSION['Usuario_Nivel'] ==3){
                                    echo 'PACIENTE';
                                }else{
                                    echo 'SECRETARIO';

                                }
                               ?></span>
							</span>
						</a>