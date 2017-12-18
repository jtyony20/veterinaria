<?php 

/**
* 
*/
class Mlogin extends CI_Model
{
	public function __construct(){
		parent::__construct();
	}
	
	public function ingresar($usu,$pass){
		$this->db->select('u.id,u.nombre,u.appaterno,u.apmaterno');

		$this->db->from('usuario u');

		$this->db->where('u.email',$usu);

		$this->db->where('u.password',$pass);

		//get() retorna el resultado de la consulta
		$resultado = $this->db->get();

		if($resultado->num_rows() == 1){

			//row() toma el registo devuelto
			$r = $resultado->row();

			$s_usuario = array(
				's_id_usuario',
				's_usuario'=>$r->nombre . ", " . $r->appaterno . " " . $r->apmaterno,
				'login'=>TRUE
			);

			$this->session->set_userdata($s_usuario);

			return 1;
			
		}else{
			return 0;
		}

		
	}


}

?>