<?php 
	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../<?php echo get_row('perfil','logo_url', 'id_perfil', 1);?>" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; font-size:12px;text-align:center">
                <span style="font-size:14px;font-weight:bold"><?php echo get_row('perfil','nombre_empresa', 'id_perfil', 1);?>                
                </span>
                <br>
                <span style="font-size:11px;font-weight:bold">
                	UTILITY AND GOLF CARS
SALES*RENTALS*SERVICE*PARTS

                </span>
				<br><?php echo get_row('perfil','direccion', 'id_perfil', 1).", ". get_row('perfil','ciudad', 'id_perfil', 1)." ".get_row('perfil','estado', 'id_perfil', 1);?><br> 
				Phone: <?php echo get_row('perfil','telefono', 'id_perfil', 1);?><br>
				Email: <?php echo get_row('perfil','email', 'id_perfil', 1);?>
                
            </td>
			<td style="width: 25%;text-align:right">
			QUOTATION Nº <?php echo $numero_quote;?>
			</td>
			
        </tr>
    </table>
	<?php }?>	