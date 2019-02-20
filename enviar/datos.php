<?php

require_once "clases.php";



$captcha = $_POST['g-recaptcha-response'];

$datosCorreo = array();

$datosCorreo[0] = $_POST['name'];
$datosCorreo[1] = $_POST['email'];
$datosCorreo[2] = $_POST['subject'];
$datosCorreo[3] = $_POST['message'];




$obj = new correo();

if ($obj->CaptchaContac($captcha,$datosCorreo)) {
	$resultado = "email sent";
     echo '<script>alert("' . $resultado . '");
     window.location.href="../index.html"</script>';
}else{
	$resultado = "error";
	 echo '<script>alert("' . $resultado . '");
     window.location.href="../index.html"</script>';
}

