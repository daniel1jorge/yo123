<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos_controller extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('m_productos');
		$this->load->helper('url');
		$this->load->library('helper');

		

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
    /**
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    *@access  public
    */ 
	public function index()
	{
		if($this->_veri_log())
        {
        	$session_data = $this->session->userdata('logged_in');
            $dat['nombre'] = $session_data['nombre'];    		
			$data = array(
			        'productos' => $this->m_productos->get_productos()
			);
			// Menu profesor Anulado
			//$this->load->view('partes/head_views',$dat);
		$this->load->library('pagination'); //cargamos la libreria de paginacion
		$this->load->library('table'); //cargamos la libreria para el manejo de tablas

		$config['total_rows'] = $this->m_productos->get_productos_cantidad();  //llamo a una funcion del modelo que me retorna la cantidad de productos que tengo en la tabla.
        $config['per_page'] = '5'; //cantidad de filas a mostrar por pagina
 
        $this->pagination->initialize($config); // le paso el vector con mis configuraciones al paginador
         
        //llamo a la funcion get_productos que me retorna el resultado de la consulta SQL con los datos.
        $data['results'] = $this->m_productos->get_productos($config['per_page'],$this->uri->segment(3));
   
        //obtengo los productos ordenados descendientemente por el id
        //$data['productos'] = $this->m_productos->get_productos_desc('id'); 
 
        //$this->load->view('usuario_index',$data); //cargo la vista usuario_index y le paso el vector
         	
         	// Muestra la tabla de productos.
			$this->load->view('back/producto/producto_views',$data);//array_merge($data,$dat));
			//$this->load->view('partes/footer_views');
		}else{
			redirect('ingreso', 'refresh');
		}
	}


	/*
	public function index(){
          $this->load->view('constant');
          $this->load->view('view_header');
          $data['productos'] = $this->m_productos->ListarProductos();
          $this->load->view('productos/view_productos', $data);
          $this->load->view('view_footer');
	}
    
        
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