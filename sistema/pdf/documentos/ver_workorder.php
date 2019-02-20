<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	//Archivo de funciones PHP
	include("../../funciones.php");
	$id_workorder= intval($_GET['id_workorder']);
	$sql_count=mysqli_query($con,"select * from workorder where id_wo='".$id_workorder."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('Work order not found')</script>";
	echo "<script>window.close();</script>";
	exit;
	}
	$sql_workorder=mysqli_query($con,"select * from workorder where id_wo='".$id_workorder."'");
	$rw_workorder=mysqli_fetch_array($sql_workorder);
	$numero_workorder=$rw_workorder['numero_wo'];
	$id_cliente=$rw_workorder['id_cliente'];
	$id_vendedor=$rw_workorder['id_vendedor'];
	$fecha_factura=$rw_workorder['fecha_wo'];
	$condiciones=$rw_workorder['condiciones'];
	$simbolo_moneda=get_row('perfil','moneda', 'id_perfil', 1);
	require_once(dirname(__FILE__).'/../html2pdf.class.php');
    // get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/ver_workorder_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Workorder.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
