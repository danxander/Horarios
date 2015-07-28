    <style>
    body{
        background: #0042BA;
    }

    .navbar-default{
        background: #0042BA;
    }

    #page-wrapper{
        background: #fff;
    }

    td{
        background: #fff;
        height: 37px;
    }
    .medio{
        text-align: center;
    }
    
    th{
        text-align: center;
        width: 9%;
        //background: #666e78;
    }

    .hora{
        text-align: center;
        font-size: 1em;
        font-weight: bold;
    }
    
    h1{
        color: #000;
    }
    @media screen and (max-width: 1200px){
        tr th{
            text-align: center;
        }
        .hora{
            text-align: center;
            font-size: .9em;
        }
     }

    @media screen and (max-width: 1000px){
        tr th{
            text-align: center;
        }
        .hora{
            text-align: center;
            font-size: .8em;
        }
     }

     @media screen and (max-width: 940px){
        .hora{
            text-align: center;
            font-size: .7em;
        }

        tr th{
            text-align: center;
        }
        span{
            display: none;
        }
     }
</style>
        <div>
            <form id="select" method="POST" action="" name="select">
                <div>
                       <?php 
                        require_once('consulta/conexion.php');
                        $query = "SELECT id, edificio FROM edificio";
                        $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
                    ?>
                    <label>Edificio</label>
                    <label id="labelse">
                    <select id='select1' name='select1' onChange='cargaContenido(this.id)'>
                    <option value='0'>Seleccione una opción</option> 
                        <?php while ($fila = pg_fetch_row($resultado)) { ?>
                                <option value='<?= $fila[0] ?>'><?= $fila[1]?></option>
                        <?php } ?>
                    </select>
                    </label>
                    
                </div>

                <div>
                    
                    <label id="labelse">
                    <label>Salon</label>
                    <select id="select2"  name="select2" disabled="disabled">
                        <option value="0">No se ha cargado</option>
                    </select>
                    
                    
                </div>
                <input id="oculta" type="hidden" name="oculta" value="<?php if(isset($select1)){ echo "valor"; } ?>" >
                <!--modificar el input name edificio por el valor del select2-->
                <!---->
                <hr>
            </form>
        </div>
    <?php 
            extract($_POST);
            if (isset($select1)) {
                //require_once ('../consulta/conexion.php');
                $conexion = pg_connect("host='localhost' port=5432 dbname='universidad' user='daniel' password='root'") or die ("Error de conexin."); 
                $query = "SELECT b.id, a.edificio, b.salon FROM edificio a INNER JOIN salones b ON  a.id = b.cod_edi WHERE a.id = '$select1' AND b.id = '$select2'";
                $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
                $fila1 = pg_fetch_row($resultado);
                //print_r($fila);
            }
         ?>
        
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered">
            <caption> <?php echo "Edificio \"".$fila1[1]."\" &nbsp; Salon ".$fila1[2]; ?></caption> 
            <thead>
                <tr class="active">
                    <th>hor<span>a</span></th>
                    <th>lun<span>es</span></th>
                    <th>mar<span>tes</span></th>
                    <th>mie<span>coles</span></th>
                    <th>jue<span>ves</span></th>
                    <th>vie<span>rnes</span></th>
                    <th>sab<span>ado</span></th>
                    <th>dom<span>ingo</span></th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $conexion = pg_connect("host='localhost' port=5432 dbname='universidad' user='daniel' password='root'") or die ("Error de conexin."); 
                if (isset($select1)) {
                    $query = "SELECT * FROM horario a WHERE salon = '$fila1[0]'";
                    $resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL horario");
                    $fila = pg_fetch_all($resultado);
                    $contador = count($fila);
                }
             ?>
                <tr>
                    <td class="hora">7:00 a 7:45</td>
                    <td data-toggle="modal" href="#Edificio" id="h_1" class="td"><?php for ($i=0; $i < $contador; $i++) { if($fila[$i]['id_enlace'] == '001') {echo $fila[$i]['materia'] . "<br /> Prof. ".$fila[$i]['profesor'] . "<br />" .$fila[$i]['periodo']. "<br />" .$fila[$i]['trayecto'] . $fila[$i]['trimestre'] . "<br />" . $fila[$i]['seccion'];?> <style type='text/css'> #<?php echo $fila[$i]['id_enlace']; ?>{ background: <?php echo $fila[$i]['carrera']; ?> }</style> <?php }} ?></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:45 a 8:30</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">8:40 a 9:25</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">9:25 a 10:10</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <th class="medio active" colspan="8">Tarde</th>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                    <td data-toggle="modal" href="#Edificio"></td>
                </tr>
                <tr>
                    <th class="medio active" colspan="8">noche</th>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="hora">7:00 a 7:00</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
   </div>
</div>

   

<div id="Edificio" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
            		<div class="modal-header">
                			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                			<h4 class="modal-title"><?php echo "Edificio \"".$fila1[1]."\" &nbsp; Salon ".$fila1[2]; ?></h4>
            		</div>
            		<div class="modal-body">
            			<form action="insertar.php" method="POST">
	                			<div>
                	                    			<label>Periodo</label>

                                                    <label id="labelse">
                	                    			<select id="periodo" class="form-control input-sm" name="periodo">
                	                        				<option value="0">-------------------------</option>
                	                        				<option value="a - 2015">25-01-2015 - 17-04-2015 - a</option>
                	                        				<option value="b - 2015">17-04-2015 - 31-12-2015 - b</option>
                	                    			</select>
                                                    </label>
	                			</div>

	                			<div>
    	                    			<label>Trayecto</label>
                                        <label id="labelse">
    	                    			<select id="trayecto" class="form-control input-sm" name="trayecto">
							<option value="0"           >-------------------------</option>
							<option value="T0"          >Trayecto inicial</option>
							<option value="Prosecucion" >Prosecucion</option>
							<option value="T1"          >Trayecto 1</option>
							<option value="T2"          >Trayecto 2</option>
							<option value="T3"          >Trayecto 3</option>
							<option value="T4"          >Trayecto 4</option>
	                   				</select>
                                    </label>
	                			</div>

	                			<div>
	                    			<label>Trimestre</label>
                                    <label id="labelse">
	                    			<select id="trimestre" class="form-control input-sm" name="trimestre">
			                        		<option value="0" >-------------------------</option>
			                        		<option value="T1">Trimestre 1</option>
			                        		<option value="T2">Trimestre 2</option>
			                        		<option value="T3">Trimestre 3</option>
	                    			</select>
                                    </label>
	                			</div>

	                			<div>
	                    			<label>Seccion</label>
                                    <label id="labelse">
	                    			<select id="seccion" class="form-control input-sm" name="seccion">
	                        				<option value="0"        >-------------------------</option>
	                        				<option value="seccion A">seccion "A"</option>
	                        				<option value="seccion B">seccion "B"</option>
	                        				<option value="seccion C">seccion "C"</option>
	                    			</select>
                                    </label>
	                			</div>  

	                			<div>
	                    			<label>Materia</label>
                                    <label id="labelse">
	                    			<select id="materia" class="form-control input-sm" name="materia">
	                        				<option value="0"               >-------------------------</option>
	                        				<option value="programacionII"  >programacionII</option>
	                        				<option value="Base de datos"   >Base de datos</option>
	                    			</select>
                                    </label>
	                			</div>

	                			<div>
	                    			<label>Profesor</label>
                                    <label id="labelse">
	                    			<select id="profesor" class="form-control input-sm" name="profesor">
	                        				<option value="0"   >-------------------------</option>
	                        				<option value="raquel"  >raquel</option>
	                        				<option value="albert"  >albert</option>
	                        				<option value="adolfo"  >adolfo</option>
	                    			</select>
                                    </label>
	                			</div>

	                			<div>
	                    			<label>Carrera</label>
                                    <label id="labelse">
	                    			<select id='carrera' class="form-control input-sm" name='carrera'>
				                    	<option value="null"            >-------------------------</option>
				                       	 <option value="rgb(5, 139, 0)"      >Agroalimentacion</option>
				                       	 <option value="rgb(0, 12, 191)"     >Geociencia</option>
				                       	 <option value="rgb(0, 240, 181)"    >Construccion Civil</option>
				                        	<option value="rgb(150, 145, 3)"    >Hoteleria-Turismo</option>
				                       	 <option value="rgb(182, 0, 169)"    >Informatica</option>
				                       	 <option value="rgb(255, 145, 154)"  >Contaduria</option>
				                       	 <option value="rgb(255, 126, 103)"  >Administracion</option>
				                      	  <option value="rgb(255, 0, 0)"      >Mision Sucre</option>
				                       	 <option value="rgb(114, 104, 255)"  >U.N.E.S.R.</option>
				                        	<option value="rgb(10, 138, 181)"   >Postgrado Cuba-Vzla</option>
				                      	  <option value="rgb(225, 255, 0)"    >Radiologia</option>
				                      	  <option value="rgb(135, 54, 0)"     >Fonoaudiologia</option>
				                       	 <option value="rgb(114, 114, 114)"  >Historia</option>
	                    			</select>	
                                    </label>
	                			</div>

                                                                <br />

	                			<div>
	                				<label>&nbsp;</label>
	                				<input class="btn btn-primary btn-xs" type="submit" value="Guardar Horario">
						<input class="btn btn-primary btn-xs" type="reset" value="Borrar">
	                			</div>
	                		</form>
            		</div>
        		</div>
    	</div>
</div>