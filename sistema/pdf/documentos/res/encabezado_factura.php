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
				<br>6469 Talley Rd San Antonio Texas 78253<br> 
				Phone: 210-263-7210  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   210-338-5446<br>
				Email: <?php echo get_row('perfil','email', 'id_perfil', 1);?>
                
            </td>
			<td style="width: 25%;text-align:right">
			INVOICE Nº <?php echo $numero_factura;?>
			</td>
			
        </tr>
    </table>
	<?php }?>	