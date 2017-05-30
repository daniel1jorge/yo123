	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">		
			
				<h1>Categorias</h1>

		
			<a type="button" class="btn btn-success btn-group-sm" href="<?php echo base_url('insert_cat'); ?>">Agregar</a>  
			<br>

			<?php 
			$correcto = $this->session->flashdata('correcto');
			if ($correcto){ ?>
			    <span id="registroCorrecto"><?= $correcto ?></span>
			<?php
			    }
			?>  
			<div class="row container">
				<div class="col-md-8">
						
					<table class="table table-striped">
						<thead>
							<tr>
								<th>N°</th>
								<th>Categoria</th>

							</tr>
						</thead>
						<tbody>

							<?php foreach($lista_categorias->result() as $row){ ?>
							<tr>
								<td><?php echo $row->categoria_id;  ?></td>
								<td><?php echo $row->categoria;  ?></td>
			
								<td><a href="<?php echo base_url("cat_edit/$row->categoria_id");?>" class="fa fa-edit">Editar</a></td>
							</tr>
							<?php } ?>
						</tbody>
					</table>	
				</div>     
			</div>       
		
	</section>
	</div>