<?php 
	require_once('../conexion.php');
	extract($_POST);

	$query = "SELECT * FROM edificio WHERE id = '$codigo'";
				$resultado = pg_query($conexion, $query) or die("Error en la Consulta SQL");
				
				$registro=pg_fetch_array($resultado);
				
					if ($registro[0]==$codigo){
						?>
						<script type="text/javascript"> alert ("El edificio ya existe");</script>
						<script type="text/javascript">
						window.location='../../index.php';
					</script>
					<?php
					}

					else {
						
						$query1 = "INSERT INTO edificio VALUES ('$codigo', '$nombre')";
						$resultado = pg_query($query1);
					 	?>
					 	<script type="text/javascript"> alert ("Datos agregados correctamente");</script>
					<script type="text/javascript">
						window.location='../../index.php';
					</script>
					<?php
					
					}
 ?>

