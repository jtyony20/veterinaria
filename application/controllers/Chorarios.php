<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * summary
 */
class Chorarios extends CI_Controller
{
    /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhorarios');
    }
    public function index(){
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vhorarios');
        $this->load->view('layout/footer');
    }
    public function getHorarios(){
        echo json_encode($this->mhorarios->getHorarios());
    }
    public function insert(){
        $title = $this->input->post('title');
        $start =  $this->input->post('start');
        $end =  $this->input->post('end');

        $events = array(
            'title' => $title,
            'start' => $start,
            'end' => $end,
            );
        $this->mhorarios->insert($events);

    }
    public function update(){
        $start=$this->input->post('start');
        $end=$this->input->post('end');
        $id=$this->input->post('id');
        $events = array(
            'start'=>$start,
            'end' => $end,
            );
        $this->mhorarios->update($id,$events);
    }
    public function delete(){
    $id=$this->input->post('id');
     $result=$this->mhorarios->delete($id);
        if ($result) {
            echo "1";
        }
    }


 }