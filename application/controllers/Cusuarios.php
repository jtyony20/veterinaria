<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * summary
 */
class Cusuarios extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {

        parent::__construct();
        $this->load->model('musuarios');
        if (!$this->session->userdata('login')) {
            redirect(base_url().'clogin/');
        }
    }

    public function index(){
        
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vusuarios');
        $this->load->view('layout/footer');
        
    }

    public function ajax_list()
    {
        $list = $this->musuarios->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $usuario) {
            $no++;
            $row = array();
            $row[] = $usuario->nombre;
            $row[] = $usuario->appaterno;
            $row[] = $usuario->apmaterno;
            $row[] = $usuario->dni;
            $row[] = $usuario->celular;
            $row[] = $usuario->email;
 
            //add html for action
            $row[] = '<div class="btn-group"><button type="button" class="btn btn-default"      style="border:none;background:rgba(236,234,232,1);">Accion</button><button class="btn btn-default dropdown-toggle bg-primary" data-toggle="dropdown" style="border:none;background:rgba(166,164,162,1);color:white;"><span class="caret "></span></button><ul class="dropdown-menu" role="menu"><li><a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a></li><li><a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" data-toggle="modal" data-target="#modalDeletePersona" onclick="delete_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a></li></ul></div>'; 
         
/**
            
          $row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Editar</a>
                  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$usuario->id."'".')"><i class="glyphicon glyphicon-trash"></i> Eliminar</a>'; **/

            $data[] = $row;
        }
 
        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->musuarios->count_all(),
                        "recordsFiltered" => $this->musuarios->count_filtered(),
                        "data" => $data,
                );
        //output to json format
        echo json_encode($output);
    }
 
    public function ajax_edit($id)
    {
        $data = $this->musuarios->get_by_id($id);
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
        $insert = $this->musuarios->save($data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_update()
    {
        $this->_validate();
        $id_usuario=$this->input->post('id');
        $data = array(
                'nombre' => $this->input->post('txtnombre'),
                'appaterno' => $this->input->post('txtappaterno'),
                'apmaterno' => $this->input->post('txtapmaterno'),
                'dni' => $this->input->post('txtdni'),
                'celular' => $this->input->post('txtcelular'),
                'email' => $this->input->post('txtemail'),
                'password' =>sha1($this->input->post('txtpassword')),
            );
        $this->musuarios->update(array('id' => $this->input->post('id')), $data);
        echo json_encode(array("status" => TRUE));
    }
 
    public function ajax_delete($id)
    {
        $this->musuarios->delete_by_id($id);
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

}

?>