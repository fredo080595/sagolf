<?php
$cliente= $_POST['contact_name'];
$direccione= $_POST['contact_email'];
$telefono= $_POST['contact_phone'];
$mensaje= $_POST['contact_message'];


$mail = "Correo de cliente :".$cliente;
$titulo = "Cliente interesado en Baterias Trojan México: ".$cliente." Correo :".$direccione." Telefono :".$telefono." Mensaje :".$mensaje;
$headers = "MIME-Version: 1.0 "; 
$headers .= "Content-type: text/html; charset=iso-8859-1 "; 

$headers .= "DE: ";

//para el envío en formato HTML 

//dirección del remitente 
        $headers .= "From: BateriasTrojanMexico <informes@bateriastrojanmexico.com>\r\n"; 
     
        //dirección de respuesta, si queremos que sea distinta que la del remitente 
        $headers .= "Reply-To: aranez21@yahoo.com.mx\r\n"; 

       
        //direcciones que recibián copia 
        $headers .= "Cc: missmissjm@hotmail.com\r\n"; 

        //direcciones que recibirán copia oculta 
        $headers .= "Bcc: serch30docs@hotmail.com\r\n"; 

$bool = mail("aranez21@yahoo.com.mx",$mail,$titulo,$headers);
if($bool){


echo "<script type='text/javascript'>alert('Mensaje enviado, en breve nos pondremos en contacto con usted, le sugerimos contactarnos tambien a los telefonos que se muestran al final de la pagina.');
window.location = 'index.html';
</script>";



}else{
    echo "Mensaje no enviado";
}

/*
Código PHP:
$destino="mail1@mail1.com"; 
$copia="mail2@mail2.com"; 
$copia2="mail3@mail2.com"; 
mail("$destino,$copia,$copia2",$subject,$cuerpo,$additional_headers); 

*/


?>



