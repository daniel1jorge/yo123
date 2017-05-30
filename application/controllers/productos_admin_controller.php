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
    	if ($this->session->userdata('logged_in')) {
	        $session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	        // consuta categoria de usuario
	        if ($data['categoria'] == 2){
	            //usuario Administrador
	            $this->mostrar_productos(get_all_productos());
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

    public function mostrar_productos($funcion)
    {
    	$session_data = $this->session->userdata('logged_in');
	        $data['nombre'] = $session_data['nombre'];
	        $data['apellido'] = $session_data['apellido'];
	        $data['categoria'] = $session_data['categoria'];
	  	$this->load->view('adminlte/admin_header.php');
	    $this->load->view('adminlte/admin_header2', $data);
	    $this->load->view('adminlte/admin_asider', $data);
	    //var_dump($this->all_categorias());
	    $this->$funcion(); // muestra todos los procuctos.
	    $this->load->view('adminlte/admin_foother');
	}
            
    public function get_all_productos()
    {	
       	$data['lista_productos'] = $this->m_productos->get_productos();
        $this->load->view('adminlte/admin_all_productos', $data);
       
    }

    public function get_all_categorias()
    {	
       	$data['lista_categorias'] = $this->m_productos->get_categorias();
        $this->load->view('adminlte/admin_all_categorias', $data);
       
    }
    //////////////////////////////////////////////////       /// Verificar falla 
	function cant_productos()
            {
                //$val=$this->m_productos->get_produ_activos();
                //return $val;
                return 5;

            }
	///////////////////////////////////////////////////////////////////////////////////

     /* debuelve las caterias en un arreglo  */
 	function all_categorias()
 	{
 		 
 		return $this->m_productos->solo_categorias();

 	}

 	function form_insert_producto()
    {
    	//var_dump(all_categorias());
 		//$data['cate_dropdown'] =
 		$data['select_categorias'] = $this->all_categorias();
 		//$datos['arrCategorias'] = $this->m_productos->solo_categorias(); 
 		//$data['salaries'] = $this->m_productos->solo_categorias();
        $this->load->view('adminlte/admin_insert_product.php',$data);
        
    }

    function form_insert_categoria()
    {
        $this->load->view('adminlte/admin_insert_categoria.php');
        
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