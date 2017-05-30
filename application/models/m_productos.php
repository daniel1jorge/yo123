<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_productos extends CI_Model {
	function __construct()
     {
          parent::__construct();
          $this->load->library('image_lib');
          $this->load->model('m_productos');

     }

     /**
    * Retorna todos los Productos registrados
    *
    * @access  public
    * @param   No recibe
    * @return  array
    */
     function get_productos()
    {
        $query = $this->db->get("productos");
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

      /**
    * Retorna todas las categorias
    * @access  public
    * @param   No recibe
    * @return  array
    */
     function get_categorias()
    {
        $query = $this->db->get("categorias");
        
        if($query->num_rows()>0) {
            return $query;
        } else {
            return FALSE;
        }        
    }

      /**
    * Retorna solo categorias
    * @access  public
    * @param   No recibe
    * @return  array
    */
     function solo_categorias()
    {
        /*$sql = "select categoria from categorias";
        $res = $this->db->query($sql);
        if($res->num_rows() > 0){
            return $res->result_array();
        }else{
            return false;
        }*/
/*
        $this->db->select('categoria');
        $this->db->from('categorias');
        $query = $this->db->get();
        return $query->result_array();
*/
    //     $this->db->from($this->categorias);
    // $this->db->order_by('categoria_id');
    // $result = $this->db->get();
    // $return = array();
    // if($result->num_rows() > 0){
    //         $return[''] = 'please select';
    //     foreach($result->result_array() as $row){
    //         $return[$row['categoria_id']] = $row['categoria'];
    //     }
    // }
    // return $return;

       
    $this->db->from('categorias');
    $result = $this->db->get();
    $return = array();
    if($result->num_rows() > 0){
        foreach($result->result_array() as $row){
            $return[$row['categoria_id']] = $row['categoria'];
        }
    }
    return $return;

    }



     /**
    * Retorna la cantida de  Productos registrados
    *
    * @access  public
    * @param   No recibe
    * @return  int
    */
    function get_produ_activos()
    {
        
        return $this->db->count_all('productos');
    }

     /* dado  un campo existente en la bd retorna todos los datos del usuario ordenados desc por ese campo */
    function get_productos_desc($campo)
    {
    	/*
        $this->db->orderby($campo.' desc');
        $query = $this->db->get('producto');
        return $query; 

        $this->db->order_by($campo, "desc");
		$query = $this->db->get($this->productos);
		return $query->result();
		*/
		$this->db->order_by($campo, 'asc');
		$this->db->where('productos');
      
     } 
       /*
		$data = array();
    $this->db->select()->from('venues')->where('id', $id);<----change it to

    $Q = $this->db->get();<----change it to
    if ($Q->num_rows() > 0)
    {
        foreach ($Q->result() as $row)
        {
            $data[] = $row;
        }
    }

    $Q->free_result();
    return $data;

        /*

    


    /**
    * Inserta todos los datos de un producto
    *
    * @access  public
    * @param   array
    * @return  boolean
    */
    public function create_producto($data){
        $this->db->insert('productos', $data);
    }
    /**
    * Retorna todos los datos de un producto
    *
    * @access  public
    * @param   int($id)
    * @return  array
    */
    function update_producto($id){

        $query = $this->db->get_where('productos', array('producto_id' => $id),1);
                
        if($query->num_rows() == 1) {
            return $query;
        } else {
            return FALSE;
        }
    }

    /**
    * Actualiza los datos de un producto
    *
    * @access  public
    * @param   int($id), array($data)
    * @return  boolean
    */
    function set_producto($id, $data){
        $this->db->where('producto_id', $id);
        $query = $this->db->update('productos', $data);
        if($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    
    /*


	public function ListarProductos(){
		$sql="SELECT P.id, P.codigo, P.descripcion, P.precio_compra, P.precio_venta, P.cantidad, C.descripcion AS DesCategoria, Pro.nombre_proveedor FROM productos AS P INNER JOIN categorias AS C ON P.id_categoria = C.id INNER JOIN proveedores AS Pro ON P.id_proveedor = Pro.id order by P.descripcion asc";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function BuscarProducto($id){
		$sql="SELECT * FROM productos  where id='".$id."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function EliminarProducto($id)
	{
		# code...
		$this->db->where('id',$id);
		return $this->db->delete('productos');
	}
	public function Categorias(){
		$sql="select * from categorias";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function Subcategorias($id){
		$sql="select * from subcategoria where id_categoria='".$id."'";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function Proveedores(){
		$sql="SELECT  * FROM proveedores where estatus=1";
		$query=$this->db->query($sql);
		return $query->result();
	}
	public function ExisteCodigo($codigo){
		$this->db->where("codigo",$codigo);
        $check_exists = $this->db->get("productos");
        if($check_exists->num_rows() == 0){
            return false;
        }else{
            return true;
        }
	}
	public function SaveProductos($arrayProductos){
		$this->db->trans_start();
     	$this->db->insert('productos', $arrayProductos);
     	$this->db->trans_complete();
	}
	public function UpdateProductos($arrayProductos, $id){
		$this->db->trans_start();
		$this->db->where('id', $id);
		$this->db->update('productos', $arrayProductos); 
		$this->db->trans_complete();
	}

    */
}

/* End of file m_productos.php */
/* Location: ./application/models/m_productos.php */