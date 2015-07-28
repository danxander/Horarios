<?php 
	require_once('../conexion.php');
	extract($_POST);


	$query = "SELECT * FROM salones WHERE salon = '$nombre'";
				$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
				
				$registro=pg_fetch_array($resultado);
				
					if ($registro[1]==$nombre && $registro[2]==$edificio){
						?>
						<script type="text/javascript"> alert ("El salon ya existe");</script>
						<script type="text/javascript">
						window.location='../../index.php';
					</script>
					<?php
					}

					else {
						
						$query1 = "INSERT INTO salones VALUES (nextval('salones_id_seq'::regclass), '$nombre','$edificio')";
						$resultado = pg_query($query1);
					 	?>
					 	<script type="text/javascript"> alert ("Datos agregados correctamente");</script>
					<script type="text/javascript">
						window.location='../../index.php';
					</script>
					<?php
					
					}
 ?>

