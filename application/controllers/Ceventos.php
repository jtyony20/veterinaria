
<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * summary
 */
class Ceventos extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
    	parent::__construct();
    	$this->load->model('meventos');
    }

    public function index(){
    	$this->load->view('layout/header');
    	$this->load->view('layout/menu');
    	$this->load->view('veventos');
    	$this->load->view('layout/footer');
    }
    public function getEventos(){
        $res=$this->meventos->getEventos();
        echo json_encode($res);
    }
    public function update(){
        $data = array(
            'id' =>$this->input->post('id') ,
            'fecinicio'=>$this->input->post('fecinicio'),
            'fecfin'=>$this->input->post('fecfin')
            );
        $res=$this->meventos->update($data);
        echo $res;
    }
    public function delete(){
        $id=$this->input->post('id');
        $res=$this->meventos->delete($id);
        echo $res;
    }
}

?>