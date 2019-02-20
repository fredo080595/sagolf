<?php
/*-------------------------
	Autor: INNOVAWEBSV
	Web: www.innovawebsv.com
	Mail: info@innovawebsv.com
	---------------------------*/
	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: login.php");
		exit;
        }
	
	
	$active_productos="";
	$active_clientes="";
	$active_quote="active";
	$active_workorder="";
	$active_facturas="";
	$active_usuarios="";	
	$title="San Antonio Golf Cars | SWIQ";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<?php include("head.php");?>

  </head>
  <body>
	<?php
	include("navbar.php");
	?>  
    <div class="container">
		<div class="panel panel-info">
		<div class="panel-heading">
		    <div class="btn-group pull-right">
				<a  href="nueva_quote.php" class="btn btn-info"><span class="glyphicon glyphicon-plus" ></span> New Quotation</a>
			</div>
			<h4><i class='glyphicon glyphicon-search'></i> Search Quote</h4>
		</div>
			<div class="panel-body">
				<form class="form-horizontal" role="form" id="datos_quote">
				
						<div class="form-group row">
							<label for="q" class="col-md-2 control-label">Client o # of Quote</label>
							<div class="col-md-5">
								<input type="text" class="form-control" id="q" placeholder="Customer name o # of Quote" onkeyup='load(1);'>
							</div>
							
							
							
							<div class="col-md-3">
								<button type="button" class="btn btn-default" onclick='load(1);'>
									<span class="glyphicon glyphicon-search" ></span> Search</button>
								<span id="loader"></span>
							</div>
							
						</div>
				
				
				
			</form>
				<div id="resultados"></div><!-- Carga los datos ajax -->
				<div class='outer_div'></div><!-- Carga los datos ajax -->
			</div>
		</div>	
		
	</div>
	<hr>
	<?php
	include("footer.php");
	?>
	<script type="text/javascript" src="js/VentanaCentrada.js"></script>
	<script type="text/javascript" src="js/quote.js"></script>
  </body>
</html>