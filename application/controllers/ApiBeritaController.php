<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiBeritaCOntroller extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiBeritaModel');
  }


  public function getBerita($page,$size){

   $response = array(
    'content' => $this->ApiBeritaModel->getBerita(($page - 1) * $size, $size),
    'totalPages' => ceil($this->ApiBeritaModel->getCountBerita() / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function getBeritaPanti($page,$size){
   $id=$this->input->get('id');
   $response = array(
     'content' => $this->ApiBeritaModel->getBeritaPanti(($page - 1) * $size, $size,$id),
     'totalPages' => ceil($this->ApiBeritaModel->getCountBeritaPanti($id) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

}
