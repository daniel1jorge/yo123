<?php 
//Se encarga de manejar la sesion de un socio, ni no estas logeado no podrás ingresar al panel
session_start();
/**
 * Panel_controller
 *
 * @package     back
 * @author      
*/ 
class Admin_controller extends CI_Controller {
 
    /**
    * Constructor del controller
    *
    * @access  public
    */
    function __construct()
    {
        parent::__construct();
    }
    
    /**%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    * Si existe sesión activa muestra la vista del panel general.
    * Si no hay sesión, redirige a la ruta panel
    * @access  public
    */
    function index()
    {
        if($this->session->userdata('logged_in'))
        {
            $session_data = $this->session->userdata('logged_in');
            $data['nombre'] = $session_data['nombre'];
            $data['categoria'] = $session_data['categoria'];
            
            $this->load->view('adminlte/header');
            $this->load->view('adminlte/header2');
            $this->load->view('adminlte/admin_contenido', $data);
        }
        else
        {
            redirect('admin', 'refresh');
            $data['titulo'] =('Ingreso de usuario');
            $this->load->view('visitante/w_header', $data);
            $this->load->view('visitante/w_navegacion');  
            
            
            $this->load->view('ingreso');
            $this->load->view('visitante/w_footer'); 
        }
    }
    /**
    * Función para cerrar la sesión activa.
    * Muestra la vista de login al cerrar sesión
    * @access  public
    */
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        $data['titulo'] =('Ingreso de usuario');
        $this->load->view('visitante/w_header', $data);
        $this->load->view('visitante/w_navegacion');  
       
        $this->load->view('ingreso');
        $this->load->view('visitante/w_footer'); 
    }
 
}
/* End of file panel_controller.php */
/* Location: ./application/controllers/back/panel_controller.php */