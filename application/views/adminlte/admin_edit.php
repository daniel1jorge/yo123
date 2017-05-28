<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Modificar Usuario</h1>
		<br>

			            
	<?php echo form_open("user_up/$id", ['class' => 'form-signin', 'role' => 'form']); ?>
	<div class="form-group">
		<?php echo form_error('email'); ?>
		<?php echo form_input(['name' => 'email','value'=>"$email", 'id' => 'email', 'class' => 'form-control','placeholder' => 'ingrese email', 'autofocus'=>'autofocus']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('nombre'); ?>
		<?php echo form_input(['name' => 'nombre','value'=>"$nombre", 'id' => 'nombre', 'class' => 'form-control','placeholder' => 'ingrese nombre', 'autofocus'=>'autofocus']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('apellido'); ?>
		<?php echo form_input(['name' => 'apellido','value'=>"$apellido", 'id' => 'apellido', 'class' => 'form-control','placeholder' => 'ingrese apellido']); ?>
	</div>
	<div class="form-group">
		<?php echo form_error('categoria'); ?>
		<?php 
			$options1 = array(	
			'2' => 'Administrador',
			'1' => 'Estandar',
			);
		echo form_dropdown('categoria', $options1, $categoria, 'class="form-control required"');
		?>
	</div>


	<div class="form-group">
		<?php echo form_error('estado'); ?>
			<?php 
				$options = array(	
				'1' => 'Activo',
				'2' => 'No Activo',
				);
			echo form_dropdown('estado', $options, $estado, 'class="form-control required"');
		 	?>
	</div>

	
	<div class="form-group">
		<?php echo form_error('pass'); ?>
		<?php echo form_input(['type' => 'password','name' => 'pass', 'id' => 'pass', 'class' => 'form-control','placeholder' => 'Nueva Contraseña', 'required'=>'required']); ?>
	</div>
	
	<div class="form-group">
		<?php echo form_error('pass2'); ?>
		<?php echo form_input(['type' => 'password','name' => 'pass2', 'id' => 'pass2', 'class' => 'form-control','placeholder' => 'Reescriba Contraseña', 'required'=>'required']); ?>
	</div>
	<br>
	<?php echo form_submit('modificar', 'Modificar',"class='btn btn-lg btn-warning btn-block'"); ?>
	<?php echo form_close(); ?>
</section>
</div>