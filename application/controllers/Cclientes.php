<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * summary
 */
class Cclientes extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mclientes');
    }

    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vclientes');
        $this->load->view('layout/footer');
        
    }

    public function ajax_list()
    {
        $list = $this->mclientes->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $cliente) {
            $no++;
            $row = array();
            $row[] = $cliente->codigo;
            $row[] = $cliente->nombre;
            $row[] = $cliente->appaterno;
            $row[] = $cliente->apmaterno;
            $row[] = $cliente->direccion;
            $row[] = $cliente->celular;
            $row[] = $cliente->email;
            $row[] = '<a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modal-tabla" onclick="list_pacientes('."'".$cliente->id."'".')"><i class="fa fa-paw"></i>Ver Pacientes</a>';
 
            //add html for action
            $row[] = '<div class="btn-group"><button type="button" class="btn btn-default"      style="border:none;background:rgba(236,234,232,1);">Accion</button><button class="btn btn-default dropdown-toggle bg-primary" data-toggle="dropdown" style="border:none;background:rgba(166,164,162,1);color:white;"><span class="caret "></span></button><ul class="dropdown-menu" role="menu"><!-----------><li><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$cliente->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a></li><!-----------><li><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modalDeletePersona" onclick="delete_person('."'".$cliente->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li><!-----------><li><a class="btn btn-sm btn-success" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modal-default" onclick="ver_cliente('."'".$cliente->id."'".')"><i class="glyphicon glyphicon-trash"></i>Ver</a></li></ul></div></ul></div>'; 
         
/**
            
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$cliente->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$cliente->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>'; **/

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->mclientes->count_all(),
                        "recordsFiltered" => $this->mclientes->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->mclientes->get_by_id($id);
        echo json_encode($data);
    }
 
    public function ajax_add()
    {
        
        $this->_validate();
        $pass=sha1($this->input->post('txtpassword'));
        $data = array(
                'codigo' => $this->input->post('txtcodigo'),
                'nombre' => $this->input->post('txtnombre'),
                'appaterno' => $this->input->post('txtappaterno'),
                'apmaterno' => $this->input->post('txtapmaterno'),
                'direccion' => $this->input->post('txtdireccion'),
                'celular' => $this->input->post('txtcelular'),
                'email' => $this->input->post('txtemail'),
                'fecha_registro' => $this->input->post('txtfecha'),
            );
        $insert = $this->mclientes->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();

        $data = array(
                'codigo' => $this->input->post('txtcodigo'),
                'nombre' => $this->input->post('txtnombre'),
                'appaterno' => $this->input->post('txtappaterno'),
                'apmaterno' => $this->input->post('txtapmaterno'),
                'direccion' => $this->input->post('txtdireccion'),
                'celular' => $this->input->post('txtcelular'),
                'email' => $this->input->post('txtemail'),
                'fecha_registro' => $this->input->post('txtfecha'),
            );
        $this->mclientes->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->mclientes->delete_by_id($id);
        echo json_encode(array("status" => TRUE));
    }
 
 
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;
 
        if($this->input->post('txtcodigo') == '')
        {
            $data['inputerror'][] = 'txtcodigo';
            $data['error_string'][] = 'El codigo es obligatorio';
            $data['status'] = FALSE;
        }

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
 
        if($this->input->post('txtdireccion') == '')
        {
            $data['inputerror'][] = 'txtdireccion';
            $data['error_string'][] = 'La direccion es obligatorio';
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
        if($this->input->post('txtfecha') == '')
        {
            $data['inputerror'][] = 'txtfecha';
            $data['error_string'][] = 'El fecha es obligatorio';
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