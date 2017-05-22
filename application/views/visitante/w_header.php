<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<!--<meta name="viewport" content="width=device‐width, initial‐scale=1.0">-->
	<meta name="viewport" content="initial-scale=1.0, user-scalable=yes">
	
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/miEstilo.css'); ?>">

</head>

<body>
	<div class="conteiner">
		<!--- Comienzo Cabecera -->
			<header id="cabecera">
				<div class="container">
					<h1>Xtreme Soluciones <small>Venta de repuestos, reparacion y juegos digitales todas las consolas</small></h1>
						<div class="col-md-8">
						 	<form role="form col-md-offset-10">
								<div class="form-group col-xs-3><label for="Busqueda"></label>
									<input type="text" class="form" id="Buscar"
									placeholder="Buscar">
									<button type="submit" class="btn btn-xs btn-default glyphicon glyphicon-search"></button>
								</div>
							</form>
						</div>
				
					<div class="col-md-4">
							<a href="<?php echo base_url(); ?>principal/ingreso"><b>Ingreso</b></a>
					</div>
						
					 </div>  
			</header>
	