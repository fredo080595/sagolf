<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	$id_workorder= $_SESSION['id_workorder'];
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['id_cliente'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['id_vendedor'])) {
           $errors[] = "Selecciona el vendedor";
        } else if (empty($_POST['condiciones'])){
			$errors[] = "Selecciona forma de pago";
		} else if ($_POST['estado_workorder']==""){
			$errors[] = "Selecciona el estado de la workorder";
		} else if (
			!empty($_POST['id_cliente']) &&
			!empty($_POST['id_vendedor']) &&
			!empty($_POST['condiciones']) &&
			$_POST['estado_workorder']!="" 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$id_cliente=intval($_POST['id_cliente']);
		$id_vendedor=intval($_POST['id_vendedor']);
		$condiciones=intval($_POST['condiciones']);

		$estado_workorder=intval($_POST['estado_workorder']);
		
		$sql="UPDATE workorder SET id_cliente='".$id_cliente."', id_vendedor='".$id_vendedor."', condiciones='".$condiciones."', estado_wo='".$estado_workorder."' WHERE id_wo='".$id_workorder."'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "work order updated successfuly.";
			} else{
				$errors []= "Sorry, something was worng try again later.".mysqli_error($con);
			}
		} else {
			$errors []= "unknown error.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡well done!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>