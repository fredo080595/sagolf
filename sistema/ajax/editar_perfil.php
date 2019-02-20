<?php
	include('is_logged.php');//Archivo verifica que el usario que intenta acceder a la URL esta logueado
	/*Inicia validacion del lado del servidor*/
	if (empty($_POST['nombre_empresa'])) {
           $errors[] = "Company name is empty";
        }else if (empty($_POST['telefono'])) {
           $errors[] = "Phone is empty";
        } else if (empty($_POST['email'])) {
           $errors[] = "E-mail is empty";
        } else if (empty($_POST['impuesto'])) {
           $errors[] = "IVA is empty";
        } else if (empty($_POST['moneda'])) {
           $errors[] = "Currency is empty";
        } else if (empty($_POST['direccion'])) {
           $errors[] = "Address is empty";
        } else if (empty($_POST['ciudad'])) {
           $errors[] = "Address is empty";
        }   else if (
			!empty($_POST['nombre_empresa']) &&
			!empty($_POST['telefono']) &&
			!empty($_POST['email']) &&
			!empty($_POST['impuesto']) &&
			!empty($_POST['moneda']) &&
			!empty($_POST['direccion']) &&
			!empty($_POST['ciudad']) 
		){
		/* Connect To Database*/
		require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
		require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos
		// escaping, additionally removing everything that could be (html/javascript-) code
		$nombre_empresa=mysqli_real_escape_string($con,(strip_tags($_POST["nombre_empresa"],ENT_QUOTES)));
		$telefono=mysqli_real_escape_string($con,(strip_tags($_POST["telefono"],ENT_QUOTES)));
		$email=mysqli_real_escape_string($con,(strip_tags($_POST["email"],ENT_QUOTES)));
		$impuesto=mysqli_real_escape_string($con,(strip_tags($_POST["impuesto"],ENT_QUOTES)));
		$moneda=mysqli_real_escape_string($con,(strip_tags($_POST["moneda"],ENT_QUOTES)));
		$direccion=mysqli_real_escape_string($con,(strip_tags($_POST["direccion"],ENT_QUOTES)));
		$ciudad=mysqli_real_escape_string($con,(strip_tags($_POST["ciudad"],ENT_QUOTES)));
		$estado=mysqli_real_escape_string($con,(strip_tags($_POST["estado"],ENT_QUOTES)));
		$codigo_postal=mysqli_real_escape_string($con,(strip_tags($_POST["codigo_postal"],ENT_QUOTES)));
		
		$sql="UPDATE perfil SET nombre_empresa='".$nombre_empresa."', telefono='".$telefono."', email='".$email."', impuesto='".$impuesto."', moneda='".$moneda."', direccion='".$direccion."', ciudad='".$ciudad."', estado='".$estado."', codigo_postal='$codigo_postal' WHERE id_perfil='1'";
		$query_update = mysqli_query($con,$sql);
			if ($query_update){
				$messages[] = "Data has been updated successfully.";
			} else{
				$errors []= "I'm sorry something has gone wrong try again.".mysqli_error($con);
			}
		} else {
			$errors []= "Unknown error.";
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
						<strong>¡Well done!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>