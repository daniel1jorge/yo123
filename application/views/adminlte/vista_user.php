			<h1>Todos los Libros</h1>
		</div>	
		<a type="button" class="btn btn-success" href="<?php echo base_url('insert_l'); ?>">Agregar</a>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>N° ID</th>
					<th>Email</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Estado</th>
					<th>categoria</th>
					<th>Editar</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$query = $this->db->query("select * from usuarios");
					foreach ($query->result() as $row)
					{	
				?>
				<tr>
					<td><?php echo $row->id  ?></td>
					<td><?php echo $row->email ?></td>
					<td><?php echo $row->nombre;  ?></td>
					<td><?php echo $row->apellido;  ?></td>
					<td><?php echo $row->estado;  ?></td>
					<td><?php echo $row->categoria;  ?></td>
					
					<td></td>
					<td><a href="<?php echo base_url("libro_edit/$row->id");?>">Editar</a></td>
				</tr>
				<?php } ?>
			</tbody>
		</table>