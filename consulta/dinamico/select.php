<?php
// Array que vincula los IDs de los selects declarados en el HTML con el nombre de la tabla donde se encuentra su contenido
$listadoSelects = array("select1" => "edificio", "select2" => "salones");

function validaSelect($selectDestino){
	// Se valida que el select enviado via GET exista
	global $listadoSelects;
	if(isset($listadoSelects[$selectDestino])) return true;
	else return false;
}

function validaOpcion($opcionSeleccionada){
	// Se valida que la opcion seleccionada por el usuario en el select tenga un valor numerico
	if(is_numeric($opcionSeleccionada)) return true;
	else return false;
}

$selectDestino		= $_GET["select"];
$opcionSeleccionada = $_GET["salon"];

if(validaSelect($selectDestino) && validaOpcion($opcionSeleccionada)){
	$tabla		 = $listadoSelects[$selectDestino];

	require_once('../conexion.php');
	$sql         = "SELECT id, salon FROM $tabla WHERE cod_edi = '$opcionSeleccionada'";
	$consulta	 = pg_query($conexion,$sql);	
	
	// Comienzo a imprimir el select
	?>
		<label>Salon</label>
		<select id="<?php echo $selectDestino;?>" name="<?php echo $selectDestino;?>" onChange='cargaContenido(this.id)'>
		<option value='0'>Seleccione una opci&oacute;n</option>
	<?php
	while($registro=pg_fetch_array($consulta)){
		// Convierto los caracteres conflictivos a sus entidades HTML correspondientes para su correcta visualizacion
		$registro[1]=htmlentities($registro[1]);
		// Imprimo las opciones del select
		echo "<option value='".$registro[0]."'>".$registro[1]."</option>";
	}			
	echo "</select> </label>";
	echo "<div align='right' style='margin-top:5px'><input class='btn btn-primary btn-xs' type='submit' value='Consultar Salon'></div>";
}
?>

