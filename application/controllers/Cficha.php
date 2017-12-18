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
	}
	public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('ficha/vficha_list');
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
                        "recordsTotal" => $this->mfichas->count_all(),
                        "recordsFiltered" => $this->mfichas->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mfichas->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        
        $this->_validate();
        $pass=sha1($this->input->post('txtpassword'));
        $data = array(
                'nombre' => $this->input->post('txtnombre'),
                'appaterno' => $this->input->post('txtappaterno'),
                'apmaterno' => $this->input->post('txtapmaterno'),
                'dni' => $this->input->post('txtdni'),
                'celular' => $this->input->post('txtcelular'),
                'email' => $this->input->post('txtemail'),
                'password' => $pass,
            );
        $insert = $this->mfichas->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $id_ficha=$this->input->post('id');
        $data = array(
                'nombre' => $this->input->post('txtnombre'),
                'appaterno' => $this->input->post('txtappaterno'),
                'apmaterno' => $this->input->post('txtapmaterno'),
                'dni' => $this->input->post('txtdni'),
                'celular' => $this->input->post('txtcelular'),
                'email' => $this->input->post('txtemail'),
                'password' =>sha1($this->input->post('txtpassword')),
            );
        $this->mfichas->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mfichas->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('txtnombre') == '')
        {
            $data['inputerror'][] = 'txtnombre';
            $data['error_string'][] = 'El nombre es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtappaterno') == '')
        {
            $data['inputerror'][] = 'txtappaterno';
            $data['error_string'][] = 'El Apellido Paterno es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtapmaterno') == '')
        {
            $data['inputerror'][] = 'txtapmaterno';
            $data['error_string'][] = 'El Apellido Materno es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtdni') == '')
        {
            $data['inputerror'][] = 'txtdni';
            $data['error_string'][] = 'El dni es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtcelular') == '')
        {
            $data['inputerror'][] = 'txtcelular';
            $data['error_string'][] = 'El celular es obligatorio';
            $data['status'] = FALSE;
        }
        if($this->input->post('txtemail') == '')
        {
            $data['inputerror'][] = 'txtemail';
            $data['error_string'][] = 'El email es obligatorio';
            $data['status'] = FALSE;
        }
        if($this->input->post('txtpassword') == '')
        {
            $data['inputerror'][] = 'txtpassword';
            $data['error_string'][] = 'El password es obligatorio';
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