<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		 $data['titulo'] =('Principal - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion');
		$this->load->view('visitante/w_carrusel');
		$this->load->view('visitante/w_principal');
		$this->load->view('visitante/w_footer');


	}

	public function quienessomos()
	{
		$data['titulo'] =('Quienes Somos - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_quienessomos');
		$this->load->view('visitante/w_footer'); 
	}


	public function contacto()
	{
		$data['titulo'] =('Contacto - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_contacto'); 
		$this->load->view('visitante/w_footer'); 
	}

	public function terminos()
	{
		$data['titulo'] =('Terminos y condiciones - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_terminos');
		$this->load->view('visitante/w_footer'); 
	}

	public function catalogo()
	{
		$data['titulo'] =('Catalogo - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_catalogo'); 
		$this->load->view('visitante/w_footer'); 
	}

	public function consultas()
	{
		$data['titulo'] =('Conaultas - Venta de Consolas y juegos');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion'); 
		$this->load->view('visitante/w_consultas');  
		$this->load->view('visitante/w_footer'); 
	}

	public function ingreso()
	{	
		$data['titulo'] =('Ingreso de usuario');
		$this->load->view('visitante/w_header', $data);
		$this->load->view('visitante/w_navegacion');  
		$this->load->view('ingreso');
		$this->load->view('visitante/w_footer'); 

	}




	public function get_usuarios(){

		$query = $this->db->query('SELECT email, nombre, apellido, estado FROM usuarios');

			foreach ($query->result() as $row)
			{
				        echo $row->nombre;
				        echo $row->apellido;
				        echo $row->email;
			}
			echo "<br>";

echo 'Total usuarios: ' . $query->num_rows();
	}
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */