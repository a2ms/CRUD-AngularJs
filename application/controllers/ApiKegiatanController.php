<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiKegiatanController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiKegiatanModel');
  }


  public function getKegiatan($page,$size){
  $id_donatur=$this->input->get('donatur');
   $response = array(
    'content' => $this->ApiKegiatanModel->getKegiatanDisetujui(($page - 1) * $size, $size,$id_donatur),
    'totalPages' => ceil($this->ApiKegiatanModel->getCountKegiatanDisetujui($id_donatur) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function getKegiatanMenunggu($page,$size){
  $id_donatur=$this->input->get('donatur');
   $response = array(
    'content' => $this->ApiKegiatanModel->getKegiatanMenunggu(($page - 1) * $size, $size,$id_donatur),
    'totalPages' => ceil($this->ApiKegiatanModel->getCountKegiatanMenunggu($id_donatur) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function getKegiatanDitolak($page,$size){
  $id_donatur=$this->input->get('donatur');
   $response = array(
    'content' => $this->ApiKegiatanModel->getKegiatanDitolak(($page - 1) * $size, $size,$id_donatur),
    'totalPages' => ceil($this->ApiKegiatanModel->getCountKegiatanDitolak($id_donatur) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }
}
