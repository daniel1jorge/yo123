	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
			
				<h1>Todos los Usuarios</h1>

		
			<a type="button" class="btn btn-success btn-group-sm" href="<?php echo base_url('insert'); ?>">Agregar</a>  
			<br>
			<?php 
			$correcto = $this->session->flashdata('error');
			if ($correcto){ ?>
			    <span id="registroCorrecto"><?= $correcto ?></span>
			<?php
			    }
			?>  

			<?php 
			$correcto = $this->session->flashdata('correcto');
			if ($correcto){ ?>
			    <span id="registroCorrecto"><?= $correcto ?></span>
			<?php
			    }
			?>  
			<table class="table table-striped">
				<thead>
					<tr>
						<th>N°</th>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>email</th>
						<th>categoria</th>
						<th>estado</th>

					</tr>
				</thead>
				<tbody>

					<?php foreach($lista_usuarios->result() as $row){ ?>
					<tr>
						<td><?php echo $row->id;  ?></td>
						<td><?php echo $row->nombre;  ?></td>
						<td><?php echo $row->apellido;  ?></td>
						<td><?php echo $row->email;  ?></td>
						<td><?php echo $row->categoria;  ?></td>
						<td><?php echo $row->estado;  ?></td>
						<td><a href="<?php echo base_url("user_edit/$row->id");?>" class="mode_edit">Editar</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	            
		
	</section>
	</div>