<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * summary
 */
class Cpacientes extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mpacientes');
    }

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vpacientes');
        $this->load->view('layout/footer');
        
    }

    public function ajax_list()
    {
        $list = $this->mpacientes->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $paciente) {
            $no++;
            $row = array();
            $row[] = $paciente->nombre;
            $row[] = $paciente->especie;
            $row[] = $paciente->raza;
            $row[] = $paciente->edad;
            $row[] = $paciente->sexo;
            $row[] = $paciente->color;
            $row[] = $paciente->senas;
            $row[] = $paciente->id_cliente;
 
            //add html for action
            $row[] = '<div class="btn-group"><button type="button" class="btn btn-default"      style="border:none;background:rgba(236,234,232,1);">Accion</button><button class="btn btn-default dropdown-toggle bg-primary" data-toggle="dropdown" style="border:none;background:rgba(166,164,162,1);color:white;"><span class="caret "></span></button><ul class="dropdown-menu" role="menu"><!-----------><li><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$paciente->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a></li><!-----------><li><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modalDeletePersona" onclick="delete_person('."'".$paciente->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li><!-----------><li><a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modalDeletePersona" onclick="ver_persona('."'".$paciente->id."'".')"><i class="glyphicon glyphicon-trash"></i>Ver</a></li></ul></div>'; 
         

/**
            
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>'; **/

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mpacientes->count_all(),
                        "recordsFiltered" => $this->mpacientes->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mpacientes->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        
        $this->_validate();
        $data = array(
                'nombre' => $this->input->post('txtnombre'),
                'especie' => $this->input->post('txtespecie'),
                'raza' => $this->input->post('txtraza'),
                'edad' => $this->input->post('txtedad'),
                'sexo' => $this->input->post('txtsexo'),
                'color' => $this->input->post('txtcolor'),
                'senas' => $this->input->post('txtsenas'),
                'id_cliente' => $this->input->post('txtcliente'),
            );
        $insert = $this->mpacientes->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $data = array(
                'nombre' => $this->input->post('txtnombre'),
                'especie' => $this->input->post('txtespecie'),
                'raza' => $this->input->post('txtraza'),
                'edad' => $this->input->post('txtedad'),
                'sexo' => $this->input->post('txtsexo'),
                'color' => $this->input->post('txtcolor'),
                'senas' => $this->input->post('txtsenas'),
                'id_cliente' => $this->input->post('txtcliente'),
            );
        $this->mpacientes->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mpacientes->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
    public function getpaciente_cli($id){
        $data = $this->mpacientes->getpaciente_cli($id);
        echo json_encode($data);
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
 
        if($this->input->post('txtespecie') == '')
        {
            $data['inputerror'][] = 'txtespecie';
            $data['error_string'][] = 'El especie Paterno es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtraza') == '')
        {
            $data['inputerror'][] = 'txtraza';
            $data['error_string'][] = 'El raza  es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtedad') == '')
        {
            $data['inputerror'][] = 'txtedad';
            $data['error_string'][] = 'El edad es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($this->input->post('txtsexo') == '')
        {
            $data['inputerror'][] = 'txtsexo';
            $data['error_string'][] = 'El sexo es obligatorio';
            $data['status'] = FALSE;
        }
        if($this->input->post('txtcolor') == '')
        {
            $data['inputerror'][] = 'txtcolor';
            $data['error_string'][] = 'El color es obligatorio';
            $data['status'] = FALSE;
        }
        if($this->input->post('txtsenas') == '')
        {
            $data['inputerror'][] = 'txtsenas';
            $data['error_string'][] = 'El Señas es obligatorio';
            $data['status'] = FALSE;
        }
         if($this->input->post('txtcliente') == '')
        {
            $data['inputerror'][] = 'txtcliente';
            $data['error_string'][] = 'El cliente es obligatorio';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}

?>
