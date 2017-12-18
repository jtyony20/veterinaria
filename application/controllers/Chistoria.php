<?php 

/**
* 
*/
class Chistoria extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m');
		$this->load->model('mficha');
	}
	public function index(){

	}
	public function nuevo($id=''){
		if (empty($id)) {
			redirect(base_url().'cclientes/');
		}
		$data = array('pacientes' =>$this->mpacientes->get_by_id($id));
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vficha',$data);
        $this->load->view('layout/footer');
	}

	public function save(){
    	$fecha = $this->input->post('fecha');
    	$sintomas_signos =  $this->input->post('sintomas_signos');
    	$peso =  $this->input->post('peso');
    	$temperatura =  $this->input->post('temperatura');
    	$vacunas =  $this->input->post('vacunas');
    	$diagnostico =  $this->input->post('diagnostico');
    	$tratamiento =  $this->input->post('tratamiento');
    	$citas =  $this->input->post('citas');
    	$id_paciente =  $this->input->post('id_paciente');
    	$ficha = array('fecha' => $fecha,
            'sintomas_signos' => $sintomas_signos,
    		'peso' => $peso,
    		'temperatura' => $temperatura,
    		'vacunas' => $vacunas,
    		'diagnostico' => $diagnostico,
    		'tratamiento' => $tratamiento,
    		'citas' => $citas,
    		'id_paciente' => $id_paciente

    		);

       if ($this->mficha->insertFicha($ficha)) {
        	return 1;
        } else{
        	return 0;
        }

    }
}
 ?>