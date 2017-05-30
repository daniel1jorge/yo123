	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
			
				<h1>Todos los Productos</h1>

		
			<a type="button" class="btn btn-success btn-group-sm" href="<?php echo base_url('insert_producto'); ?>">Agregar</a>  
			<br>

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
						<th>Categoria</th>
						<th>imagen</th>
						<th>Precio</th>
						<th>stock</th>
						<th>activo</th>

					</tr>
				</thead>
				<tbody>

					<?php foreach($lista_productos->result() as $row){ ?>
					<tr>
						<td><?php echo $row->producto_id;  ?></td>
						<td><?php echo $row->nombre;  ?></td>
						<td><?php echo $row->categoria_id;  ?></td>
						<td><?php echo $row->imagen;  ?></td>
						<td><?php echo $row->precio;  ?></td>
						<td><?php echo $row->stock;  ?></td>
						<td><?php echo $row->activo;  ?></td>
						<td><a href="<?php echo base_url("pro_edit/$row->producto_id");?>" class="fa fa-edit">Editar</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>	            
		
	</section>
	</div>