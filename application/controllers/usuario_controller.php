    <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    //Se encarga de manejar la sesion de un socio, ni no estas logeado no podrás ingresar al panel
    session_start();
    /**
     * Usuario_contoller
     *
     * @package     Controller
     * @author      
     */ 
    class Usuario_controller extends CI_Controller {

        /**
         * Constructor del Controller
         *
         * @package     back
         * Cargo modelo socio
        */ 
        function __construct() {
            parent::__construct();
            $this->load->model('m_usuario');
        }

        /**   ####################### Verificar esta funcion
        * Función principal del controlador ejecuta por defecto si no nombramos el metodo.
        * @access  public
        */ 
        public function index()
        {   
         $session_data = $this->session->userdata('logged_in');
         
         $dat['nombre'] = $session_data['nombre'];
         $dat['apellido'] = $session_data['apellido'];
         $dat['categoria'] = $session_data['categoria'];
           // consuta categoria de usuario
             if ($dat['categoria'] == 2){
                //usuario Administrador
                
                $this->load->view('adminlte/admin_header.php');
                $this->load->view('adminlte/admin_header2', $dat);
                $this->load->view('adminlte/admin_asider', $dat);

                $this->load->view('adminlte/admin_contenido', $dat);
                $this->load->view('adminlte/admin_tab_contenido');
                //$data['usuario'] =get_all_usuarios();
                
             } elseif ($dat['categoria'] == 1){
                //usuario Estandar
                    echo "estandar";
                //$this->load->view('principal/catalogo');
                $data['titulo'] =('Ingreso de usuario');
                $this->load->view('visitante/w_header', $data);
                $this->load->view('visitante/w_navegacion');  
                $this->load->view('adminlte/admin_tab_contenido', $data);

                //$this->load->view('adminlte/admin_all_users', $data);    
                //$this->load->view('visitante/w_footer'); 
     
            }

        }

        public function get_all_usuarios()
        {
            $data['usuario'] = $this->m_usuario->get_usuarios();
            //return $data;
            $this->load->view('adminlte/admin_all_users', $data);

        }
        
     
        /**
        * Función si existe usuario activo muestra la vista con todos los socios registrados
        * Si no existe sesión me redirige a la  ruta panel
        * @access  public
        */
        public function usuarios()
        {
            if ($this->session->userdata('logged_in')) {
                return TRUE;
            } else {
                return FALSE;
            }
            
        }



        /**
        * Función si existe usuario activo muestra la vista con todos los socios registrados
        * Si no existe sesión me redirige a la  ruta panel
        * @access  public
        */ 
        public function all()
        {
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $dat['email'] = $session_data['email'];
                $dat['categoria'] = $session_data['categoria'];     
                $data = array(
                    'usuarios' => $this->m_usuario->get_usuarios()
                    );
                $this->load->view('adminlte/header');
                
            }
            else
            {
               redirect('ingreso', 'refresh');
           }

       }
        /**
        * Llamo a la vista 
        */
        function form_insert(){
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $dat['usuario'] = $session_data['usuario'];
                $this->load->view('adminlte/header',$dat);
                $this->load->view('adminlte/header2',$dat);  
                //$this->load->view('partes/head_views',$dat);
                //$this->load->view('back/socio/inse_socio_views', $dat);
                //$this->load->view('partes/footer_views');
            }
        }
        /**
        * Función que llama al insertar datos
        * @access  public
        */ 
        function insert_usuario(){
            //Validación del formulario
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__rolekey_exists');
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');
            $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass]');
            
            $this->form_validation->set_message('matches','<div class="alert alert-danger">¡Ambas contraseñas deben ser iguales!</div>'); 
            $this->form_validation->set_message('required','<div class="alert alert-danger">¡Campo requerido!</div>'); 


            if ($this->form_validation->run() == FALSE)
            {

                if($this->_veri_log())
                {
                    $session_data = $this->session->userdata('logged_in');
                    $dat['email'] = $session_data['email'];  

                    $data['titulo'] =('Ingreso de usuario');
                    $this->load->view('visitante/w_header', $data);
                    $this->load->view('visitante/w_navegacion');  
                    $this->load->view('ingreso');
                    $this->load->view('visitante/w_footer'); 
                }

            }
            else
            {

               $this->session->set_flashdata('correcto', '<div class="alert alert-success">Usuario registrado correctamente!</div>');


               redirect('ingreso','Location');
           }
       }   

       function _rolekey_exists($key) {

        if (!$this->m_usuario->mail_exists($key)) {
                # code...

            // creo arreglo con datos recibidos del post.

            $data = array(
                'email'=>$this->input->post('email',true),
                'nombre'=>$this->input->post('nombre',true),
                'apellido'=>$this->input->post('apellido',true),
                'clave'=>base64_encode($this->input->post('pass',true)),
                'estado'=>'1',
                'categoria'=>'1'
                );

                    //Envio array el metodo insert para registro de datos
            $datos_usuario = $this->m_usuario->create_usuario($data);
                    //redirect('datos', 'refresh');
                    //$this->form_validation->set_message('_rolekey_exists', '<div class="alert alert-success">ok!!!</div>');
            return TRUE;

        }else{
         $this->form_validation->set_message('_rolekey_exists', '<div class="alert alert-danger">Correo ya existente!!!</div>');
         return FALSE;

            }  
        }


        /**
        * Función edit que obtiene todos los datos del socio referenciado por un id
        * y lo muestra en la vista back/edit_socio_views con el parametro $data
        * @access  public
        */ 
        function edit(){
            $id = $this->uri->segment(2);
            $datos_socios = $this->socio->update_socios($id);
            if ($datos_socios != FALSE) {
                foreach ($datos_socios->result() as $row) {
                    $nombre = $row->nombre;
                    $apellido = $row->apellido;
                    $dias_prestamos = $row->dias_prestamos;
                    $usuario = $row->usuario;
                    $pass = base64_decode($row->pass);


                }
                $data = array('socio' =>$datos_socios,
                  'id'=>$id,
                  'nombre'=>$nombre,
                  'apellido'=>$apellido,
                  'dias_prestamos'=>$dias_prestamos,
                  'usuario'=>$usuario,
                  'pass'=>$pass
                  );
            } else {
                return FALSE;
            }   
            if($this->_veri_log())
            {
                $session_data = $this->session->userdata('logged_in');
                $dat['usuario'] = $session_data['usuario'];  
                $this->load->view('partes/head_views',$dat);
                $this->load->view('back/socio/edit_socio_views',$data);
                $this->load->view('partes/footer_views');
            }
        }
        /**
        * Función editar_socio obtiene los datos de la vista back/edit_socio_views
        * y ejecuta el metodo para actualizar los datos del socio, si es correcto la actualización
        * Valido formulario
        * redirige a la ruta mis datos
        * @access  public
        */ 
        function editar_socio(){
            //Validación del formulario
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('apellido', 'Apellido', 'required');
            $this->form_validation->set_rules('dias_prestamos', 'Dias Prestados', 'required|numeric');
            $this->form_validation->set_rules('usuario', 'Usuario', 'required');
            $this->form_validation->set_rules('pass', 'Password', 'required');

            //Mensaje del form_validation
            $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');    
            $this->form_validation->set_message('numeric','<div class="alert alert-danger">El campo %s debe contener un valor numérico</div>');         

            $id = $this->uri->segment(2);
            $pass = $this->input->post('pass',true);
            $data = array(
                'id'=>$id,
                'nombre'=>$this->input->post('nombre',true),
                'apellido'=>$this->input->post('apellido',true),
                'dias_prestamos'=>$this->input->post('dias_prestamos',true),
                'usuario'=>$this->input->post('usuario',true)
                );
            
            if ($this->form_validation->run() == FALSE)
            {
                //Si hay error en algun campo del formulario la clave permanece legible
                $data['pass'] = $pass;
                $this->load->view('partes/head_views',$data);
                $this->load->view('back/socio/edit_socio_views',$data);
                $this->load->view('partes/footer_views');
            }
            else
            {
                //Si la validación del formulario es correcta la clave la encripta
                $data['pass']= base64_encode($pass);

                $this->socio->set_socio($id, $data);
                redirect('datos', 'refresh');
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
    /* End of file usuario_controller.php */
    /* Location: ./application/controllers/back/usuario_controller.php */