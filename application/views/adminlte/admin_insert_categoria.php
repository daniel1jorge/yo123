<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
		<h1>Agregar Categoria</h1>
		<br>
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
			<?php echo form_open('productos_admin_controller/agregar_categoria', ['class' => 'register-form', 'role' => 'form']); ?>
			<br>
			<?php echo form_input(['type' => 'text', 'name' => 'categoria', 'id' => 'categoria', 'class' => 'form-control','placeholder' => 'Categoria ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			
			
			<br>
			<?php echo form_submit('agregar', 'Cargar Categoria',"class='btn btn-lg btn-primary btn-block'"); ?>
			<?php echo form_close(); ?>
			</div>

		</section>
	</div>



