<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Verifico_controller
 *
 * @package     
 * @author      
*/ 

class Verifico_controller extends CI_Controller {

    /**
     * Constructor del Controller
     *
     * @package     back
     * Cargo modelo socio
    */ 
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_usuario','',TRUE);

    }
    /**
    * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
    * Ejecuta la validación del formulario y si es FALSE muestra la vista de login,
    * Si redige a la ruta panel si es correcta la verificación y logeo
    * @access  public
    */ 
    function index()
    {
        //This method will have the credentials validation

        $this->form_validation->set_rules('email', 'Email', 'required','trim|required|xss_clean');
        $this->form_validation->set_rules('pass', 'Pass', 'trim|required|xss_clean|callback_check_database');

        if($this->form_validation->run() == FALSE)
        {
            //Field validation failed.  User redirected to login page
            // vuelve al logueo de pagina
            $data['titulo'] =('Ingreso de usuario');
            $data['direccion']= "ingreso";
            $data['accion']= "Ingresar";
            $data['user_logueo']= 'Para compras debe estar logueado';
            $this->load->view('visitante/w_header', $data);
            $this->load->view('visitante/w_navegacion');  
            $this->load->view('ingreso');
            $this->load->view('visitante/w_footer'); 

        }
        else
        {
            //Go to private area
            redirect('usuario', 'refresh');
        }

  

    }
    /**
    * Función que chequea los datos en la base si exiten.
    * Si es correcto creo un arreglo de session del socio
    * Si es incorrecto se muestra un mensaje de error de datos ingresados
    * @access  public
    */ 
    function check_database($password)
    {
        //Field validation succeeded.  Validate against database
        $email = $this->input->post('email');
        //echo $this->input->post('email');
        //query the database
        $result = $this->m_usuario->login($email, $password);
 
        if($result)
        {
           $sess_array = array();
           foreach($result as $row)
           {
                $sess_array = array(
                    'id' => $row->id,
                    'email' => $row->email,
                    'nombre'=> $row->nombre,
                    'apellido'=> $row->apellido,
                    'categoria'=> $row->categoria
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('check_database', '<div class="alert alert-danger">Usuario o contraseña invalido!!!</div>');
            return false;
        }
    }
}
/* End of file verifico_controller.php */
/* Location: ./application/controllers/verifico_controller.php */
