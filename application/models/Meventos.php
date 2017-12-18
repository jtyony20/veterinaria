<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Meventos extends CI_Model {

public function __construct(){
  parent::__construct();
}
public function getEventos(){
       $this->db->select('id id,nombre title,fecinicio start,fecfin end');
       $this->db->from('eventos');
       return $this->db->get()->result();
    }
public function update($data){
  $campos = array(
    'fecinicio' =>$data['fecinicio'], 
    'fecfin' => $data['fecfin']);
  $this->db->where('id',$data['id']);
  $this->db->update('eventos',$campos);
  if ($this->db->affected_rows()==1) {
    return 1;
  }else{
    return 0;
  }
}
public function delete($id){
  $this->db->where('id',$id);
  return $this->db->delete('eventos');
  
}

}


 ?>