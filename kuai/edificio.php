<div class="modal-header">
							<h4 class="modal-title">Agregar Edificio</h4>
						</div>
						<form id="Edi" class="contact_form" method="post" action="consulta/edificio/insercion.php">
							<div class="form-group">
								<label class="sr-only" ></label>
							    <div class="input-group">
							    	<div class="input-group-addon">Codigo</div>
							    	<input type="number"  class="form-control"  maxlength="5" autofocus  max="99999" placeholder="Ingrese un codigo de edificio" name="codigo" required>
							    </div>
							</div>
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount"></label>
							    <div class="input-group">
							    	<div class="input-group-addon">Nombre</div>
							    	<input type="text" required pattern="[a-zA-Z]*"  class="form-control" id="exampleInputAmount" placeholder="Ingrese un nombre de edificio" name="nombre" required>
							    </div>
							</div>
							<div class="modal-footer">
								<input  type="reset" class="btn btn-primary btn-xs" >
								<input  type="submit" class="btn btn-primary btn-xs" >
							</div>
						</form>
						<div class="modal-header">
							<h4 class="modal-title">Agregar Salon</h4>
						</div>
						<form id="Edi" class="contact_form" method="post" action="consulta/salon/insercion.php">
							<div>	
								<?php 
	                                $query3 = "SELECT id, edificio FROM edificio";
	                   			    $resultado1 = pg_query($conexion, $query3) or die("Error en la Consulta SQL");
	                    		?>
	                    		<label>Edificio</label>
	                    		<label id="labelse">
	                    		<select id='select1' name='edificio' required>
	                    			<option value='0'>Seleccione un Edificio</option> 
	                        		<?php while ($fila = pg_fetch_row($resultado1)) { ?>
	                                <option value='<?= $fila[0] ?>'><?= $fila[1]?></option>
	                        		<?php } ?>
	                    		</select>
	                    		</label>
	                    	</div>
							<div class="form-group">
								<label class="sr-only" for="exampleInputAmount"></label>
							    <div id="sal" class="input-group">
							    	<div class="input-group-addon">Nombre/N&uacute;mero</div>
							    	<input type="number" max="99"  class="form-control" id="exampleInputAmount" placeholder="Ingrese un nombre o n&uacute;mero del Salon" name="nombre" required>
							    </div>
							</div>
							<div class="modal-footer">
								<input  type="reset" class="btn btn-primary btn-xs" >
								<input  type="submit" class="btn btn-primary btn-xs" >
							</div>
						</form>