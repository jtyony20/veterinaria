<?php 

/**
* 
*/
class Cficha extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('mpacientes');
		$this->load->model('mficha');
         if (!$this->session->userdata('login')) {
            redirect(base_url().'clogin/');
        }
	}
	public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('ficha/vlist_all');
        $this->load->view('layout/footer'); 
	}
 public function ajax_list()
    {
        $list = $this->mficha->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ficha) {
            $no++;
            $row = array();
            $row[] = $ficha->fecha;
            $row[] = $ficha->sintomas_signos;
            $row[] = $ficha->peso;
            $row[] = $ficha->temperatura;
            $row[] = $ficha->vacunas;
            $row[] = $ficha->diagnostico;
            $row[] = $ficha->tratamiento;
            $row[] = $ficha->citas;
            $row[] = $ficha->id_paciente;
 
            //add html for action
            $row[] = '<div class="btn-group"><button type="button" class="btn btn-default"      style="border:none;background:rgba(236,234,232,1);">Accion</button><button class="btn btn-default dropdown-toggle bg-primary" data-toggle="dropdown" style="border:none;background:rgba(166,164,162,1);color:white;"><span class="caret "></span></button><ul class="dropdown-menu" role="menu"><li><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$ficha->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a></li><li><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modalDeletePersona" onclick="delete_person('."'".$ficha->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li></ul></div>'; 
         
/**
            
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$ficha->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$ficha->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>'; **/

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mficha->count_all(),
                        "recordsFiltered" => $this->mficha->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mficha->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'fecha' => $this->input->post('txtfecha'),
                'sintomas_signos' => $this->input->post('txtsintomas_signos'),
                'peso' => $this->input->post('txtpeso'),
                'temperatura' => $this->input->post('txttemperatura'),
                'vacunas' => $this->input->post('txtvacunas'),
                'diagnostico' => $this->input->post('txtdiagnostico'),
                'tratamiento' => $this->input->post('txttratamientos'),
                'citas' => $this->input->post('txtcitas'),
                'id_paciente' => $this->input->post('txtpaciente'),
            );
        $insert = $this->mficha->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $id_ficha=$this->input->post('id');
        $data = array(
                'fecha' => $this->input->post('txtfecha'),
                'sintomas_signos' => $this->input->post('txtsintomas_signos'),
                'peso' => $this->input->post('txtpeso'),
                'temperatura' => $this->input->post('txttemperatura'),
                'vacunas' => $this->input->post('txtvacunas'),
                'diagnostico' => $this->input->post('txtdiagnostico'),
                'tratamiento' => $this->input->post('txttratamientos'),
                'citas' => $this->input->post('txtcitas'),
                'id_paciente' => $this->input->post('txtpaciente'),
            );
        $this->mficha->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mficha->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('txtfecha') == '')
        {
            $data['inputerror'][] = 'txtfecha';
            $data['error_string'][] = 'La fecha es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtsintomas_signos') == '')
        {
            $data['inputerror'][] = 'txtsintomas_signos';
            $data['error_string'][] = 'Los sintomas o signos son obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtpaciente') == '')
        {
            $data['inputerror'][] = 'txtpaciente';
            $data['error_string'][] = 'El paciente es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }








/////***************************LIST BY ID***********************************/////////
/////**************************************************************/////////
/////**************************************************************/////////
	public function nuevo($id=''){
		if (empty($id)) {
			redirect(base_url().'cclientes/');
		}
		$data = array('pacientes' =>$this->mpacientes->get_by_id($id));
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('ficha/vficha',$data);
        $this->load->view('layout/footer');
	}
	public function ver_ficha($id){
		
		$data = array('fichas' => $this->mficha->getFicha($id), );
		$this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('ficha/vficha_list',$data);
        $this->load->view('layout/footer');
	}
	public function edit($id){

	}
	public function delete($id){

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