<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
		<h1>Registro de usuario</h1>
		<br>
			<?php 
			$correcto = $this->session->flashdata('correcto');
			if ($correcto){ ?>
			    <span id="registroCorrecto"><?= $correcto ?></span>
			<?php
			    }
			?>	
		<div id="register-form"  class="account-wall " role="form">
			<?php echo validation_errors(); ?>
			<?php echo form_open('registro_admin', ['class' => 'register-form', 'role' => 'form']); ?>
			<?php echo form_input(['type' => 'email', 'name' => 'email', 'id' => 'email', 'class' => 'form-control','placeholder' => 'Correo@electronico.com ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			<br>
			<?php echo form_input(['type' => 'text', 'name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Nombre ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			<br>
			<?php echo form_input(['type' => 'text', 'name' => 'apellido', 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'apellido', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			<br>
			
			<?php 
				$options = array(
				'0' => 'Elegir Categoria',	
				'2' => 'Administrador',
				'1' => 'Estandar',
				);
			echo form_dropdown('categoria', $options, 'Elegir Categoria', 'class="form-control placeholder required"');

		 	?>
			<br>

			<?php 
				$options = array(
				'0' => 'Elegir Estado',	
				'1' => 'Activo',
				'2' => 'No Activo',
				);
			echo form_dropdown('estado', $options, 'Elegir Estado', 'class="form-control placeholder required"');

		 	?>
			<br>
			
			
			<?php echo form_input(['type' => 'password','name' => 'pass', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Contraseña', 'required'=>'required']); ?>
			<br>
			<?php echo form_input(['type' => 'password','name' => 'pass2', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Reescriba Contraseña', 'required'=>'required']); ?>
			<br>

			<p class="text-info text-center">Todos los campos son requeridos</p>
			<br>
			<?php echo form_submit('registrar', 'Registrar usuario',"class='btn btn-lg btn-primary btn-block'"); ?>
			<?php echo form_close(); ?>
			</div>

		</section>
	</div>



