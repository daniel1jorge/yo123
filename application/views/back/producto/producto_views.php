		<h1>Todos los Productos</h1>
	</div>	
	<a type="button" class="btn btn-success" href="<?php echo base_url('insert_l'); ?>">Agregar</a>
	<div>
		
		<?php 

		

		$this->table->set_heading('ID', 'nombre','idcat', 'imagen', 'precio', 'stock'); //crea la primera fila de la tabla con el encabezado
		$tmp = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1"class="mytable">' ); //modifica el espaciado
		$this->table->set_template($tmp); //aplico los cambios de modificacion anterior
 
		/*ok aca vamos a hacer que el correo tenga un enlace a enviar un mail
con el foreach recorro los resultados de la consulta */
 
	  foreach($results->result() as $dato)
	  {
	 
	   // $array['ID'] = $dato->id;
	    $array['nombre'] = $dato->nombre;
	    $array['idcat'] = $dato->idcat;
	    $array['imagen'] = $dato->imagen;
	    $array['precio'] = $dato->precio;
	    $array['stock'] = $dato->stock;

	    $this->table->add_row($array); //agregamos la celda a la tabla por cada iteracion
	  }
	 
	echo $this->table->generate($array); //cuando termina generamos la tabla a partir del vector
	 
	echo $this->pagination->create_links(); 

$tmpl = array ( 'table_open'  => '<table border="1" cellpadding="2" cellspacing="1" class="mytable">' );

$this->table->set_template($tmpl);