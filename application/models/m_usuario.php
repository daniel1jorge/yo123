<?php
/**
 * Usuario Class
 *
 * @package Modelo
 * @category    usuario
 * @author      Silva Jorge daniel
*/
Class M_usuario extends CI_Model
{
    /**
    * Constructor de la clase
    *
    * @access  public
    */
    public function __construct() {
        parent::__construct();
    }
    /**
    * Retorna un array de dato si existe en la base
    *
    * @access  public
    * @param   string ($correo, $password)
    * @return  array
    */

    function login($email, $password)
    {
        $query = $this->db->get_where('usuarios', array('email' => $email, 'clave' => base64_encode($password) ), 1);

        if($query->num_rows() == 1)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }

    /**
    * Retorna todos los datos de un usuario
    *
    * @access  public
    * @param   int($id)
    * @return  array
    */
    function update_usuario($id){

        $query = $this->db->get_where('usuarios', array('id' => $id),1);
        
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }
    /**
    * Actualiza los datos de un socio
    *
    * @access  public
    * @param   int($id), array($data)
    * @return  boolean
    */
    function set_usuario($id, $data){
        $this->db->where('id', $id);
        $query = $this->db->update('usuario', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    /**
    * Inserta todos los datos de un socio
    *
    * @access  public
    * @param   array
    * @return  boolean
    */
    public function create_usuario($data){
        $this->db->insert('usuarios', $data);
    }

    /*
    * Verfifica que email no este en uso
    *   
    * @access  public
    * @param   email
    * @return  boolean
    */
    public function mail_exists($key)
    {
        $this->db->where('email',$key);
        $query = $this->db->get('usuarios');
        if ($query->num_rows() > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function get_usuarios()
    {
        $usuario = $this->db->get('usuarios');
        return $usuario;

    }

}
/* End of file m_usuario.php */
/* Location: ./application/models/m_usuario.php */
