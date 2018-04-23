<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonasiUangController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiDonasiUangModel');
  }


 public function tampilDonasiSetuju($page,$size){
  $cari=$this->input->get('donatur');
  $response = array(
    'content' => $this->ApiDonasiUangModel->getDonasi(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiUangModel->getCountDonasi($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function tampilDonasiUpload($page,$size){
  $cari=$this->input->get('donatur');
  $response = array(
    'content' => $this->ApiDonasiUangModel->getDonasiUpload(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiUangModel->getCountDonasiUpload($cari) / $size));

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
    'content' => $this->ApiDonasiUangModel->getDonasiMenunggu(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiDonasiUangModel->getCountDonasiMenunggu($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function tampilDonasiDanaPanti($page,$size){
  $id_panti_asuhan=$this->input->get('id_panti_asuhan');
  $response = array(
    'content' => $this->ApiDonasiUangModel->getDonasiDanaPanti(($page - 1) * $size, $size,$id_panti_asuhan),
    'totalPages' => ceil($this->ApiDonasiUangModel->getCountDonasiDanaPanti($id_panti_asuhan) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function UploadBuktiPembayaran()
{
  $DataDonasiUang=array(
    'id_donasi_dana'=>$this->input->post('id_donasi_dana'),
    'foto_bukti_transfer'=>$this->input->post('foto_bukti_transfer'),
    'status_donasi_dana'=>'Menunggu Konfirmasi'
    );
    $gambar_konten=$this->input->post('foto_bukti_transfer');
    $gambarfile=base64_decode($this->input->post('gambar'));
                   $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi_app_fix/image/bukti/'.$gambar_konten.'', 'w');
                fwrite($fp, $gambarfile);
    $this->ApiDonasiUangModel->updateDonasiUang($DataDonasiUang);
    exit;

}

}
