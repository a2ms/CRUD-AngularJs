<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class KegiatanController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('kegiatan');
  }

  public function TampilKegiatanPantiDisetujui($page,$size){
   $id_panti_asuhan=$this->input->get('id_panti_asuhan');
   $response = array(
    'content' => $this->kegiatan->getKegiatanPanti_by_id_disetujui(($page - 1) * $size, $size,$id_panti_asuhan),
    'totalPages' => ceil($this->kegiatan->getCountKegiatanPantiDisetujui($id_panti_asuhan) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function TampilKegiatanPantiMenunggu($page,$size){
  $id_panti_asuhan=$this->input->get('id_panti_asuhan');
  $response = array(
   'content' => $this->kegiatan->getKegiatanPanti_by_id_menunggu(($page - 1) * $size, $size,$id_panti_asuhan),
   'totalPages' => ceil($this->kegiatan->getCountKegiatanPantiMenunggu($id_panti_asuhan) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}
public function TampilKegiatanPantiDitolak($page,$size){
 $id_panti_asuhan=$this->input->get('id_panti_asuhan');
 $response = array(
  'content' => $this->kegiatan->getKegiatanPanti_by_id_ditolak(($page - 1) * $size, $size,$id_panti_asuhan),
  'totalPages' => ceil($this->kegiatan->getCountKegiatanPantiDitolak($id_panti_asuhan) / $size));

 $this->output
 ->set_status_header(200)
 ->set_content_type('application/json', 'utf-8')
 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
 ->_display();
 exit;
}
}
