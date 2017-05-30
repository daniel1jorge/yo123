<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
		<h1>Insertar Producto</h1>
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
			<?php echo form_open('form_insert_producto', ['class' => 'register-form', 'role' => 'form']); ?>
			<?php echo form_input(['type' => 'text', 'name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Producto', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			<br>
			
			<div class="form-group">
			<?php echo form_dropdown('idcat', $select_categorias, '$select_categorias', 'class="form-control placeholder required"'); ?>
			</div>

			<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<?php echo form_label('Imagen:', 'iamgen'); ?>
					<?php echo form_input(['type' => 'file','name' => 'filename', 'id' => 'filename', 'class' => 'form-control']); ?>
					<?php echo form_error('filename'); ?>
					<br>
				</div>		
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<?php echo form_label('Imagen actual:', 'img_ac'); ?>
					<img  id="imagen_view" name="imagen_view" class="img-thumbnail" src="" >
				</div>	
			</div>
		</div>

		 	<br>
			<?php echo form_input(['type' => 'text', 'name' => 'nombre', 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'Nombre ', 'required'=>'required', 'autofocus'=>'autofocus']); ?>
			<br>
			<div class="form-group">
					<?php echo form_label('Stock:', 'stock'); ?>
					<?php echo form_input(['type' => 'text','name' => 'stock', 'id' => 'stock','value'=>"$stock", 'class' => 'form-control','placeholder' => 'ingrese stock']); ?>
					<?php echo form_error('stock'); ?>
				</div>
			

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



