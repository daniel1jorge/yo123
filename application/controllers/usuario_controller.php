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
             
             $data['nombre'] = $session_data['nombre'];
             $data['apellido'] = $session_data['apellido'];
             $data['categoria'] = $session_data['categoria'];
               // consuta categoria de usuario
                 if ($data['categoria'] == 2){
                    //usuario Administrador
                    
                    $this->load->view('adminlte/admin_header.php');
                    $this->load->view('adminlte/admin_header2', $data);
                    $this->load->view('adminlte/admin_asider', $data);
                    $this->load->view('adminlte/admin_contenido');
                    //$this->load->view('adminlte/admin_tab_contenido');
                    //$this->get_all_usuarios(); // muestra todos los usuarios.
                    //$this->get_administradores();
                    //$data['usuario'] =get_all_usuarios();
                    $this->load->view('adminlte/admin_foother');
                    
                 } elseif ($data['categoria'] == 1){
                     $data['categoria'] = $session_data['categoria'];
                     $data['nombre'] = $session_data['nombre'];
                    //$this->load->view('principal/catalogo');
                    $data['titulo'] =('Catalogo de productos');
                    $this->load->view('visitante/w_header', $data);
                    $this->load->view('visitante/w_navegacion',$data);  
                    //$this->load->view('adminlte/admin_tab_contenido', $data);

                    //$this->load->view('adminlte/admin_all_users', $data);    
                    //$this->load->view('visitante/w_footer'); 
                    redirect('catalogo', 'refresh');
         
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

            /**
            * Función si existe usuario activo muestra la vista con todos los socios registrados
            * Si no existe sesión me redirige a la  ruta panel
            * @access  public
            */ 
            public function get_all_usuarios()
            {
                if ($this->_veri_log()) {
                    $session_data = $this->session->userdata('logged_in');
                    $data['categoria'] = $session_data['categoria'];
                    if ($data['categoria'] == 2) {
                        $data['lista_usuarios'] = $this->m_usuario->get_usuarios();
                        $this->load->view('adminlte/admin_all_users', $data);
                    }else{
                        // El usuario no es administrador!!!
                        $this->load->view('ingreso', $data);
                        $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                        redirect('ingreso', 'Location');
                    }
                }
            }
            
            /**
            * Función si existe usuario activo muestra la vista con todos los socios registrados
            * Si no existe sesión me redirige a la  ruta panel
            * @access  public
            */ 
             public function get_all_admin()
            {
                if ($this->_veri_log()) {
                    $session_data = $this->session->userdata('logged_in');
                    $data['categoria'] = $session_data['categoria'];
                    if ($data['categoria'] == 2) {
                        $data['lista_usuarios'] = $this->m_usuario->get_admin();
                        $this->load->view('adminlte/admin_all_users', $data);
                    }else{
                        // El usuario no es administrador!!!
                        $this->load->view('ingreso', $data);
                        $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                        redirect('ingreso', 'Location');
                    }
                }
            }

            /**
            * Función muestra todos los usuarios desabilitados
            * Si no existe sesión me redirige a la  ruta panel
            * @access  public
            */ 
             public function get_all_desabilitados()
            {
                if ($this->_veri_log()) {
                    $session_data = $this->session->userdata('logged_in');
                    $data['categoria'] = $session_data['categoria'];
                    if ($data['categoria'] == 2) {
                        $data['lista_usuarios'] = $this->m_usuario->get_estado();
                        $this->load->view('adminlte/admin_all_users', $data);
                    }else{
                        // El usuario no es administrador!!!
                        $this->load->view('ingreso', $data);
                        $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                        redirect('ingreso', 'Location');
                    }
                }
            }


            public function mostrar_usuarios($funcion)
            {
                if ($this->_veri_log()) {
                    $session_data = $this->session->userdata('logged_in');
                    $data['apellido'] = $session_data['apellido'];
                    $data['nombre'] = $session_data['nombre'];
                    $data['categoria'] = $session_data['categoria'];
                    if ($data['categoria'] == 2) {
                        $this->load->view('adminlte/admin_header.php');
                        $this->load->view('adminlte/admin_header2', $data);
                        $this->load->view('adminlte/admin_asider', $data);
                        $this->$funcion(); // muestra todos los usuarios.
                        $this->load->view('adminlte/admin_foother');
                    }else{
                        // El usuario no es administrador!!!
                        $this->load->view('ingreso', $data);
                        $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                        redirect('ingreso', 'Location');
                    }
                }
            }

            /**
            * Llamo a la vista 
            */
            function form_insert()
            {
                if ($this->_veri_log()) {
                    $session_data = $this->session->userdata('logged_in');
                    $data['apellido'] = $session_data['apellido'];
                    $data['nombre'] = $session_data['nombre'];
                    $data['categoria'] = $session_data['categoria'];
                    if ($data['categoria'] == 2) {
                        $this->load->view('adminlte/admin_header.php');
                        $this->load->view('adminlte/admin_header2', $data);
                        $this->load->view('adminlte/admin_asider', $data);
                        $this->load->view('adminlte/admin_insert');
                        $this->load->view('adminlte/admin_foother');
                    }else{
                        // El usuario no es administrador!!!
                        $this->load->view('ingreso', $data);
                        $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                        redirect('ingreso', 'Location');
                    }
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
            * Función que llama al insertar datos
            * @access  public
            */ 
            function insert_usuario_admin(){
                //Validación del formulario
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|callback__rolekey_exists2');
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass]');
                
                $this->form_validation->set_message('matches','<div class="alert alert-danger">¡Ambas contraseñas deben ser iguales!</div>'); 
                $this->form_validation->set_message('required','<div class="alert alert-danger">¡Campo requerido!</div>'); 


                if ($this->form_validation->run() == TRUE)
                {       // Validaciob Ok!!!
                        $session_data = $this->session->userdata('logged_in');
                        $dat['email'] = $session_data['email'];  
                        $data['titulo'] =('Ingreso de usuario');
                        $this->load->view('ingreso', $data);
                   $this->session->set_flashdata('correcto', '<div class="alert alert-success">Usuario registrado correctamente!</div>');
                        redirect('get_usuarios', 'Location');

                }
                else
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger">Verifique campos ingresados!</div>');
                   redirect('get_usuarios','Location');
               }
           }/*salida fin*/



           function _rolekey_exists2($key) {

            if (!$this->m_usuario->mail_exists($key)) {
                // creo arreglo con datos recibidos del post.
                $data = array(
                    'email'=>$this->input->post('email',true),
                    'nombre'=>$this->input->post('nombre',true),
                    'apellido'=>$this->input->post('apellido',true),
                    'clave'=>base64_encode($this->input->post('pass',true)),
                    'estado'=>$this->input->post('estado',true),
                    'categoria'=>$this->input->post('categoria',true)
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

        /***** Marca de funcionamiento. de aca a arriba todo ok. **/

            /**
            * Función edit que obtiene todos los datos del socio referenciado por un id
            * y lo muestra en la vista back/edit_socio_views con el parametro $data
            * @access  public
            */ 
                function edit(){
                    if ($this->_veri_log()) {
                        $session_data = $this->session->userdata('logged_in');
                        $data['apellido'] = $session_data['apellido'];
                        $data['nombre'] = $session_data['nombre'];
                        $data['categoria'] = $session_data['categoria'];
                        
                        if ($data['categoria'] == 2) {
                            $id = $this->uri->segment(2);
                            $datos_usuarios = $this->m_usuario->update_usuario($id);
                            var_dump($datos_usuarios);

                            if ($datos_usuarios != FALSE) {
                                foreach ($datos_usuarios->result() as $row) {
                                    $email = $row->email;
                                    $nombre = $row->nombre;
                                    $apellido = $row->apellido;
                                    $pass = base64_decode($row->clave);
                                    $categoria = $row->categoria;
                                    $estado = $row->estado;
                                }
                            $edit = array('usuario-edit' =>$datos_usuarios,
                                            'id'=>$id,
                                            'email'=>$email,
                                            'nombre'=>$nombre,
                                            'apellido'=>$apellido,
                                            'clave'=>$pass,
                                            'estado'=>$estado,
                                            'categoria'=>$categoria,
                                            );
                            //var_dump($data); muestra valores creados en el array
                            $this->load->view('adminlte/admin_header.php');
                        $this->load->view('adminlte/admin_header2', $data);
                        $this->load->view('adminlte/admin_asider', $data);
                        $this->load->view('adminlte/admin_edit', $edit); // muestra todos los usuarios.
                        $this->load->view('adminlte/admin_foother');
                            } else {
                               return FALSE;
                            } 
                        
                    }else{
                            // El usuario no es administrador!!!
                            //$this->load->view('ingreso', $data);
                            $this->session->set_flashdata('correcto', '<div class="alert alert-danger">No posee acceso a esta area!</div>');
                            redirect('user_edit/(:num)', 'Location');
                        }
                    }
            }


            
            /**
            * Función editar_socio obtiene los datos de la vista back/edit_socio_views
            * y ejecuta el metodo para actualizar los datos del socio, si es correcto la actualización
            * Valido formulario
            * redirige a la ruta mis datos
            * @access  public
            */ 
            
            function editar_(){
                //Validación del formulario
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('nombre', 'Nombre', 'required');
                $this->form_validation->set_rules('apellido', 'Apellido', 'required');
                $this->form_validation->set_rules('pass', 'Password', 'required');
                $this->form_validation->set_rules('pass2', 'Password', 'required|matches[pass]');
                
                //Mensaje del form_validation
                $this->form_validation->set_message('matches','<div class="alert alert-danger">¡Ambas contraseñas deben ser iguales!</div>'); 
                $this->form_validation->set_message('required','<div class="alert alert-danger">El campo %s es obligatorio</div>');
                

                if ($this->form_validation->run() == TRUE)
                {       // Validaciob Ok!!!
                    $session_data = $this->session->userdata('logged_in');
                    $dat['email'] = $session_data['email'];  
                    $data['titulo'] =('Ingreso de usuario');
                    //redirect('get_usuarios', 'Location');

                    $id = $this->uri->segment(2);
                    $pass = $this->input->post('pass',true);
                    $data = array(
                        'email'=>$this->input->post('email',true),
                        'nombre'=>$this->input->post('nombre',true),
                        'apellido'=>$this->input->post('apellido',true),
                        'clave'=>base64_encode($this->input->post('pass',true)),
                        'estado'=>$this->input->post('estado',true),
                        'categoria'=>$this->input->post('categoria',true)
                        );
                    $data['clave']= base64_encode($pass);
                    $this->m_usuario->set_usuario($id, $data);
                    $this->session->set_flashdata('correcto', '<div class="alert alert-success">Usuario Modificado correctamente!</div>');
                    redirect('get_usuarios','Location');
                            
                }
                else
                {
                    $this->session->set_flashdata('error', '<div class="alert alert-danger">Verifique campos ingresados!</div>');
                    redirect('get_usuarios','Location');
               
                }/*salida fin*/
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
                redirect('principal', 'refresh'); 
            }

    }
        /* End of file usuario_controller.php */
        /* Location: ./application/controllers/back/usuario_controller.php */