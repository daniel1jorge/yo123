<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Principal extends CI_Controller {


	/**
	 * Constructor principal
	 *
	 * @package    
	 * Cargo modelo socio
	*/ 
	public function __construct()
        {
           parent::__construct();
     	   $this->load->model('m_usuario');
    }
	/**
	 * Constructor del Controller
	**/

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		//echo "Usuario: ", $data['nombre'], $data['categoria'];
		$data['activado']= $this->activa_boton();
		$data['titulo'] =('Principal - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion');
		$this->load->view('visitante/w_carrusel');
		$this->load->view('visitante/w_principal');
		$this->load->view('visitante/w_footer'); 

	}

	public function quienessomos()
	{
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		//var_dump($this->_acceso()); Muestra valores del array.
		$data['activado']= $this->activa_boton();
		$data['titulo'] =('Quienes Somos - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_quienessomos');
		$this->load->view('visitante/w_footer'); 
	}


	public function contacto()
	{	
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		$data['activado']= $this->activa_boton();
		$data['titulo'] =('Contacto - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_contacto'); 
		$this->load->view('visitante/w_footer'); 
	}

	public function terminos()
	{
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		$data['activado']= $this->activa_boton();
		$data['titulo'] =('Terminos y condiciones - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_terminos');
		$this->load->view('visitante/w_footer'); 
	}

	public function catalogo()
	{
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		$data['titulo'] =('Catalogo - Venta de Consolas y juegos');
		$data['activado']= $this->activa_boton();
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_catalogo'); 
		$this->load->view('visitante/w_footer'); 
	}

	public function consultas()
	{	
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		$data['titulo'] =('Conaultas - Venta de Consolas y juegos');
		$data['activado']= $this->activa_boton();
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_consultas');  
		$this->load->view('visitante/w_footer'); 
	}

	public function ingreso()
	{		
		$data = $this->_acceso(); //llama a la funcion que obtengo los valores de las variables.
		$data['titulo'] =('Ingreso de usuario');
		$data['activado']= $this->activa_boton();
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion');  
		$this->load->view('ingreso');
		$this->load->view('visitante/w_footer'); 

	}

	/*
	+	carga los parametros de sesion a la variable $data.
	+ @param ninguno 
	+ @result $dato  array de datos
	*/
	public function _acceso()
	{
		$session_data = $this->session->userdata('logged_in');
         
         $data['id_admin'] = $session_data['id'];
         $data['nombre'] = $session_data['nombre'];
         $data['apellido'] = $session_data['apellido'];
         $data['categoria'] = $session_data['categoria'];
         if ($this->session->userdata('logged_in')) 
         {
         	// si el usuario esta logueado, muestra sus datos de acceso y adas el nombre de usuario.
         	$data['direccion']= "logout";
         	$data['accion']= "Salir";
         	$data['user_logueo']= 'Usuario ' .  $session_data['nombre']. ' '. $session_data['categoria'];
		 }
		 else
		{
	       	// si el usuario no esta loguedo.
         	$data['direccion']= "ingreso";
         	$data['accion']= "Ingresar";
         	$data['user_logueo']= 'Para compras debe estar logueado';
			//echo "Usuario: ", $data['nombre'], $data['categoria'];
        }
        return $data;
    }

	// Verifica si usuario esta loguedo para mostrar el moton de usuario
	// Return Bolean Retorna estorna True o False
    public function activa_boton()
	{
		if ($this->session->userdata('logged_in')) { 
			$result = TRUE;
		}else{
			$result = FALSE;
		}
		return $result;
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */