<?php 
 class correo{

 	public function enviarCorreo($datosCorreo){



        $destinatario = "info@sanantoniogolfcars.net"; 
        $asunto = $datosCorreo[2]; 
        $cuerpo = ' 
        <html> 
        <head> 
           <title>New Contact</title> 
        </head> 
        <body> 
        <h1>'.$datosCorreo[2].'</h1> 
        <p> 
        <b>
        Client: '.$datosCorreo[0].'
        <br>
        <p>
        '.$datosCorreo[3].'
        </p>
        <br>
        <p>
        Client email:  '.$datosCorreo[1].'
        </p>
        <br>
        </p> 
        </body> 
        </html> 
        '; 

        //para el envío en formato HTML 
        $headers = "MIME-Version: 1.0\r\n"; 
        $headers .= "Content-type: text/html; charset=utf-8\r\n"; 

        //dirección del remitente 
        $headers .= "From: San Antonio Golf cars WEB  <info@sanantoniogolfcars.net>\r\n"; 

        //dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: info@sanantoniogolfcars.net\r\n"; 

        //ruta del mensaje desde origen a destino 
        $headers .= "Return-path: '.$datosCorreo[1].'\r\n"; 

        //direcciones que recibián copia 
        $headers .= "Cc: sanantoniogolfcarts@hotmail.com\r\n"; 

        //direcciones que recibirán copia oculta 
        $headers .= "Bcc: jcjimenez.mx@gmail.com\r\n"; 

        $resutl = mail($destinatario,$asunto,$cuerpo,$headers); 
        
        if ($resutl) {
            return true;
        }else {
            return false;
        }
            
        }

      public function CaptchaContac($recaptcha, $correoContacto){

        if ($recaptcha != '') {

            $secret = '6Ld5L4cUAAAAAGSb277kT1F1XIDTe5J7eBGc5dP4';
            $ip     = $_SERVER['REMOTE_ADDR'];
            $var    = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha&remoteip=$ip");
            $array  = json_decode($var, true);
            if ($array['success']) {

                return self::enviarCorreo($correoContacto);

            } else {
                return 0;
            }
        }

    }

 		
 	}
 

 ?>