<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device‐width, initial‐scale=1.0">
	<title>Ingreso y registro de usuario</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/miestilo.css">
</head>

<body>
<div class="container">
    	<div class="row">
			<div id="ingreso" class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Ingreso</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Registro</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
							<?php 
									$correcto = $this->session->flashdata('correcto');
									if ($correcto){ ?>
								       <span id="registroCorrecto"><?= $correcto ?></span>
								    <?php
								    }
								    ?>	
								<!--Formulario de logueo-->
	            				<div id="login-form"  class="account-wall" role="form" style="display: block;">
									<?php echo validation_errors(); ?>
		            				<?php echo form_open('logueo_user', ['class' => 'form-signin', 'role' => 'form']); ?>
		            				<?php echo form_input(['type' => 'email', 'name' => 'email','id' => 'email', 'class' => 'form-control','placeholder' => 'correo@ejemplo.com', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			                		<br>
			                		<?php echo form_input(['type' => 'password','name' => 'pass', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Contraseña', 'required'=>'required']); ?>
			                		<br>
			                		<?php echo form_submit('iniciar_sesion', 'Iniciar sesión',"class='btn btn-lg btn-primary btn-block'"); ?>
									<?php echo form_close(); ?>
									<br>
									<div class="form-group text-center">
										<input type="checkbox" tabindex="3" class="" name="remember" id="remember">
										<label for="remember">¿Desea recordar usuario?</label>
									</div>
								</div>
								<!--Fin de formulario - lOGUEO -->
							</div>

								<!--Formulario de REGUISTRO	-->
								<div class="col-lg-12">
	            				<div id="register-form"  class="account-wall " role="form" style="display: none;">


									<?php echo validation_errors(); ?>
		            				<?php echo form_open('registro_user', ['class' => 'register-form', 'role' => 'form']); ?>
		            				<?php echo form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control','placeholder' => 'Correo@electronico.com ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			                		<br>
			                		<?php echo form_input(['type' => 'text', 'name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Nombre ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			                		<br>
			                		<?php echo form_input(['type' => 'text', 'name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'apellido', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			                		<br>
			                		<?php echo form_input(['type' => 'password','name' => 'pass', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Contraseña', 'required'=>'required']); ?>
			                		<br>
			                		<?php echo form_input(['type' => 'password','name' => 'pass2', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Contraseña', 'required'=>'required']); ?>
			                		<br>
									<p class="text-info text-center">Todos los campos son requeridos</p>
			                		<br>
			                		<?php echo form_submit('registrar', 'Registrar usuario',"class='btn btn-lg btn-primary btn-block'"); ?>
									<?php echo form_close(); ?>
								</div>
								<div class="col-lg-12">
								<!--Fin de formulario - Registro -->

						</div> 
					</div> <!--panel-body-->
				</div>
			</div>
		</div>
</div>



		<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/mini.js"></script>
		
</body>