<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mhorarios extends CI_Model {

	public function __construct(){
		parent::__construct();
	}
	public function getHorarios(){
		$r = $this->db->get('events');
    	return $r->result();
	}
	public function insert($data){

    	$this->db->insert('events', $data);

    }
	public function update($id,$data){

    	$this->db->where('id', $id);
    	$this->db->update('events', $data);
	}
	public function delete($id){
    	$this->db->where('id',$id);
    	return $result= $this->db->delete('events');

    }

}
?>