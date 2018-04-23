<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiDonaturTetapController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiDonaturTetapModel');
  }


  public function getDonaturTetap($page,$size){
      $id_donatur=$this->input->get('donatur');

   $response = array(
    'content' => $this->ApiDonaturTetapModel->getDonaturTetap(($page - 1) * $size, $size,$id_donatur),
    'totalPages' => ceil($this->ApiDonaturTetapModel->getCountDonaturTetap($id_donatur) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

public function getDonaturTetapMenunggu($page,$size){
      $id_donatur=$this->input->get('donatur');

   $response = array(
    'content' => $this->ApiDonaturTetapModel->getDonaturTetapMenunggu(($page - 1) * $size, $size,$id_donatur),
    'totalPages' => ceil($this->ApiDonaturTetapModel->getCountDonaturTetapMenunggu($id_donatur) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function insertDonaturTetap(){
  $data=array(
  'id_donatur'=>$this->input->get('id_donatur'),
  'id_panti_asuhan  '=>$this->input->get('id_panti_asuhan'),
  'tanggal_mulai'=>date('Y-m-d H:i:s'),
  'status_donatur_tetap  '=>'Menunggu');

 $this->ApiDonaturTetapModel->insertKegiatan($data);

 $response = array(
  'status'=>'success',
  'message'=>'pengguna belum terdaftar'
  );

 $this->output
 ->set_status_header(200)
 ->set_content_type('application/json', 'utf-8')
 ->set_output(json_encode($response, JSON_PRETTY_PRINT))
 ->_display();
 exit;
}

public function cekDonaturTetap(){
    $id_pengguna=$this->input->get('id_donatur');
    $id_wisata=$this->input->get('id_panti_asuhan');

    if($this->ApiDonaturTetapModel->cekDonaturTetap($id_pengguna,$id_wisata)){
      $response = array(
        'Success' => false,
        'Info' => 'Favorit sudah tersedia');
    }
    else{
     $response = array(
      'Success' => true,
      'Info' => 'Data Tersimpan');
   }
   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }
 public function hapusfavorit(){
  $id=$this->input->get('id');
  $this->ApiDonaturTetapModel->delete($id); 
  $response = array(
    'status'=>'sukses',
    'message'=>'pengguna berhasil didaftarkan'
    );

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

}
