<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonasiController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiDonasiModel');
  }


 public function tampilDonasiSetuju($page,$size){
  $cari=$this->input->get('donatur');
  $response = array(
    'content' => $this->ApiDonasiModel->getDonasi(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiModel->getCountDonasi($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function tampilDonasiDitolak($page,$size){
  $cari=$this->input->get('donatur');
  $response = array(
    'content' => $this->ApiDonasiModel->getDonasiDitolak(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiModel->getCountDonasiDitolak($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}
public function tampilDonasiMenunggu($page,$size){
  $cari=$this->input->get('donatur');
  $response = array(
    'content' => $this->ApiDonasiModel->getDonasiMenunggu(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiModel->getCountDonasiMenunggu($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function tampilDonasiSetujuPanti($page,$size){
 $id_panti_asuhan=$this->input->get('id_panti_asuhan');
 $response = array(
   'content' => $this->ApiDonasiModel->getDonasiPanti(($page - 1) * $size, $size,$id_panti_asuhan),
   'totalPages' => ceil($this->ApiDonasiModel->getCountDonasiPanti($id_panti_asuhan) / $size));

 $this->output
 ->set_status_header(200)
 ->set_content_type('application/json', 'utf-8')
 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
 ->_display();
 exit;
}

public function tampilDonasiMenungguPanti($page,$size){
  $id_panti_asuhan=$this->input->get('id_panti_asuhan');
  $response = array(
    'content' => $this->ApiDonasiModel->getDonasiMenungguPanti(($page - 1) * $size, $size,$id_panti_asuhan),
    'totalPages' => ceil($this->ApiDonasiModel->getCountDonasiMenungguPanti($id_panti_asuhan) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}
}
