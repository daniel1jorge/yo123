<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Productos_admin_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_productos');

	}

    /**   ####################### Verificar esta funcion
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    * @access  public
    */ 
    public function index()
    {   
    	if ($this->_veri_log()) {
	        $session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador


	        }else{
        		// El usuario no es administrador!!!
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	        }

	    }else{
	    	// No logueado
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	    }

    }

    /**
            * Función que verifica si el usuario esta logueado
            * @access private    
            */
            private function _veri_log()
            {
                if ($this->session->userdata('logged_in')) {
                    return TRUE;
                } else {
                    return FALSE;
                }
                
            }

            
    public function get_all_productos()
    {	
    	if ($this->_veri_log()) {
    		$session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador
			    $this->load->view('adminlte/admin_header.php');
			    $this->load->view('adminlte/admin_header2', $data);
			    $this->load->view('adminlte/admin_asider', $data);
			    $data['lista_productos'] = $this->m_productos->get_productos();
			    $this->load->view('adminlte/admin_all_productos', $data);
			    $this->load->view('adminlte/admin_foother');

	        }else{
        		// El usuario no es administrador!!!
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	        }

	    }else{
	    	// No logueado
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	    }
	}

	public function get_all_categorias()
    {	
    	if ($this->_veri_log()) {
    		$session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador
			    $this->load->view('adminlte/admin_header.php');
			    $this->load->view('adminlte/admin_header2', $data);
			    $this->load->view('adminlte/admin_asider', $data);
			    $data['lista_categorias'] = $this->m_productos->get_categorias();
        		$this->load->view('adminlte/admin_all_categorias', $data);
			    $this->load->view('adminlte/admin_foother');

	        }else{
        		// El usuario no es administrador!!!
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	        }

	    }else{
	    	// No logueado
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	    }
	}


     /* debuelve las caterias en un arreglo  */
	public function all_categorias()
    {	
    	if ($this->_veri_log()) {
    		$session_data = $this->session->userdata('logged_in');
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
    		    //usuario Administrador
			    return $this->m_productos->solo_categorias();
	        }
	    }
	}

	public function form_insert_producto()
    {	
    	if ($this->_veri_log()) {
    		$session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador
			    $this->load->view('adminlte/admin_header.php');
			    $this->load->view('adminlte/admin_header2', $data);
			    $this->load->view('adminlte/admin_asider', $data);
        		$data['select_categorias'] = $this->all_categorias();  // busca en el metodo un arreglo de categorias.
        		$this->load->view('adminlte/admin_insert_product.php',$data);
        
			    $this->load->view('adminlte/admin_foother');

	        }else{
        		// El usuario no es administrador!!!
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	        }

	    }else{
	    	// No logueado
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	    }
	}

    function form_insert_categoria()
    {	
    	if ($this->_veri_log()) {
    		$session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador
			    $this->load->view('adminlte/admin_header.php');
			    $this->load->view('adminlte/admin_header2', $data);
			    $this->load->view('adminlte/admin_asider', $data);
        		$this->load->view('adminlte/admin_insert_categoria.php');
			    $this->load->view('adminlte/admin_foother');

	        }else{
        		// El usuario no es administrador!!!
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	        }

	    }else{
	    	// No logueado
            	$this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
            	redirect('ingreso', 'Location');
	    }
	}


###############################################################################################################3

    public function agregar_categoria(){
        $this->form_validation->set_rules('categoria', 'Categoria', 'trim|required|callback__rolekey_exists');
		$this->form_validation->set_message('required','<div class="alert alert-danger">¡Campo requerido!</div>');
		if ($this->form_validation->run() == TRUE)
            {
            	$this->session->set_flashdata('correcto', ' <br><div class="alert alert-success">Categoria cargada correctamente!</div> <br>');
                       	redirect('categorias','Location');
		            // si no cumple algunas de las 2 condiciones 
        }else{
	             $this->session->set_flashdata('correcto', '<br><div class="alert alert-danger">La Categoria no fue cargada!</div>');
                redirect('categorias','Location');
            
  		}
    	
    }


    function _rolekey_exists($key) {

        if (!$this->m_productos->categria_exists($key)) {
            // creo arreglo con datos recibidos del post.
            $data = array(
                        'categoria'=>$this->input->post('categoria',true)
                         );
                    //Envio array el metodo insert para registro de datos
            $datos_categoria = $this->m_productos->create_categoria($data);                         
            return TRUE;
		}else{
			$this->form_validation->set_message('_rolekey_exists', '<br><div class="alert alert-danger">Categoria ya existente!!!</div>');
            return FALSE;

        }  
    }

                






   	/*



        
	public function deleteproducto(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $this->seguridad_model->SessionActivo($url);
		$Productos 		= json_decode($this->input->post('MiProducto'));
		$id             = base64_decode($Productos->Id);
 (
				"estatus"   => false,
	            "error_msg" => ""
	    );
		 $this->m_productos->EliminarProducto($id);
		 $response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Producto Eliminado Correctamente Clave: <strong>".$codigo."</strong>, La Información de Actualizara en 5 Segundos <meta http-equiv='refresh' content='5'></div>";
		 echo json_encode($reHTTP_HOST'].$_SERVER['REQUEST_URI'];
          $this->seguridad_model->SessionActivo($url);
		$id 			   = base64_decode($id); 
		$data["productos"] = $this->m_productos->BuscarProducto($id);
		$data["titulo"]    = "Editar Producto";
		$this->load->view('constant');
		$this->load->view('view_header');
		$this->load->view('productos/view_nuevo_producto',$data);
		$this->load->view('view_footer');
	}
	public function nuevo(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $this->seguridad_model->SessionActivo($url);
		$this->load->view('constant');
		$this->load->view('view_hs->load->view('view_footer');
	}
	public function ca	public function subcategorias(){
ode($subcategorias);
	}
	public function proveedores(){
		$proveedores = $this->m_productos->Proveedores();
		echo json_encode($proveedores);
	}
	public function GuardaProductos(){
		$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
          $this->seguridad_model->SessionActivo($url);
		$Productos 		= json_decode($this->input->post('Productos'));
		/*Array de response*//*
		 $response = array (
				"estatus"   => false,
				"campo"     => "",
	            "error_msg" => ""
	    );//
		 if($Productos->Codigo==""){
			$response["campo"]     = "codigo";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El Codigo de Barras es Obligatorio</div>";
			echo json_encode($response);
		}else if($Productos->Descripcion==""){
			$response["campo"]     = "descripcion";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>El Descripcion del Producto es obligatorio</div>";
			echo json_encode($response);
		}else if($Productos->Pcompra==""){
			$response["campo"]       = "pcompra";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>El Precio Compra es Obligatorio</div>";
			echo json_encode($response);
		}else if($Productos->Pventa==""){
				$response["campo"]       = "pventa";
				$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>El Precio Venta es obligatorio</div>";
				echo json_encode($response);
		}else if($Productos->unidadmedida=="0"){
				$response["campo"]       = "unidadmedida";
				$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>La Unidad de Medida es Obligatorio</div>";
				echo json_encode($response);
		}else if($Productos->Categoria=="0"){
			$response["campo"]       = "categoria";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>Elige una Categoria</div>";
			echo json_encode($response);
		}else if($Productos->SubCategoria=="0"){
			$response["campo"]       = "subcategoria";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>Elige una Sub-Categoria</div>";
			echo json_encode($response);
		}else if($Productos->Inventario=="0"){
			$response["campo"]       = "inventario";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>Elige una Si es Inventariable el Producto</div>";
			echo json_encode($response);
		}else if($Productos->Inventario=="1" and ($Productos->Stock=="" or $Productos->Stock=="0")){
			$response["campo"]       = "stock";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' data-dismiss='alert'>&times;</button>El Stock Es Obligatorio</div>";
			echo json_encode($response);
		}else if($Productos->Proveedor=="0"){
			$response["campo"]       = "proveedor";
			$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable><button type='button' class='close' datelse{
				/*Verificamos si Existe el codigo de barras*/

				/*
				if($Productos->Id==""){
					$ExisteProducto         = $this->m_productos->ExisteCodigo($Productos->Codigo);
					if($ExisteProducto==true){
						$response["campo"]     = "codigo";
						$response["error_msg"]   = "<div class='alert alert-danger text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>El Codigo de Barras Ya esta en Uso</div>";
						echo json_encode($response);
					}else{
						$RegistrProducto 		= array(
						'codigo'     		=> $Productos->Codigo,
						'descripcion'		=> $Productos->Descripcion,
						'precio_compra'		=> $Productos->Pcompra,
						'precio_venta'		=> $Productos->Pventa,
						'id_categoria'		=> $Productos->Categoria,
						'id_subcategoria'	=> $Productos->SubCategoria,
						'inventariables->Proveedor,
						'unidadmedida'	    => $Productos->unidadmedida,
						'fecha'				=> date('Y-m-j H:i:s')
						);
						$this->m_productos->SaveProductos($RegistrProducto);
						$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Informacion Guardada Correctamente</div>";
						echo json_encode($response);
					}
				}else{
					$UpdateProductos 		= array(
						'codigo'     		=> $Productos->Codigo,
						'descripcion'		=> $Productos->Descripcion,
						'precio_compra'		=> $Productos->Pcompra,
						'precio_venta'		=> $Productos->Pventa,
						'id_categoria'		=> $Productos->Categoria,
						'id_subcategoria'	=> $Productos->SubCategoria,
						'inventariables->Proveedor,
						'unidadmedida'	    => $Productos->unidadmedida,
						'FechaEdicion'		=> date('Y-m-j H:i:s')
						);
					$this->m_productos->UpdateProductos($UpdateProductos,$Productos->Id);
					$response["error_msg"]   = "<div class='alert alert-success text-center' alert-dismissable> <button type='button' class='close' data-dismiss='alert'>&times;</button>Informacion Actualizada Correctamente</div>";
					echo json_encode($response);
				}
		}
	}
	*/
}