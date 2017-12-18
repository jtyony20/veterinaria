<?php  

/**
 * summary
 */
class Mficha extends CI_Model
{


  var $table = 'fichaclinica';
    var $column_order = array('fecha','sintomas_signos','tratamiento','diagnostico','tratamiento','citas',null);
    var $column_search = array('fecha','sintomas_signos','tratamiento','id_paciente'); 
    var $order = array('id' => 'desc'); 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {
        
        $this->db->from($this->table);

        $i = 0;
    
        foreach ($this->column_search as $item) // loop column 
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {
                
                if($i===0) // first loop
                {
                    $this->db->group_start();   
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
        
        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
    
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    public function get_by_id($id)
    {
        $this->db->from($this->table);
        $this->db->where('id',$id);
        $query = $this->db->get();

        return $query->row();
    }

    public function save($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($where, $data)
    {

        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete_by_id($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }









    //////////////////////////////////////////////////////////////////
  //////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////
      //////////////////////////////////////////////////////////////////
    public function getFicha($id_paciente){
        $this->db->where('id_paciente', $id_paciente);
        $r = $this->db->get('fichaclinica');
        return $r->result();
    }
    public function getFichas(){
    	$r = $this->db->get('fichaclinica');
    	return $r->result();
    }
    public function insertFicha($fichaclinica){
    	return $this->db->insert('fichaclinica', $fichaclinica);
    }
    public function updateFicha($id,$fichaclinica){
    	$this->db->where('id_ficha', $id);
    	$this->db->update('fichaclinica', $fichaclinica);
    }
    public function deleteFicha($id){
    	$this->db->where('id_ficha', $id);
    	$this->db->delete('fichaclinica');

    }
}

?>