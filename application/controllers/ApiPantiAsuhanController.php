<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ApiPantiAsuhanController extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('ApiPantiAsuhanModel');
  }


  public function getPantiAsuhan($page,$size){
   $response = array(
    'content' => $this->ApiPantiAsuhanModel->getPanti(($page - 1) * $size, $size),
    'totalPages' => ceil($this->ApiPantiAsuhanModel->getCountPanti() / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function TampilPantiRekomendasi($page,$size){
   $response = array(
    'content' => $this->ApiPantiAsuhanModel->getPantiRekomendasi(($page - 1) * $size, $size),
    'totalPages' => ceil($this->ApiPantiAsuhanModel->getCountPantiRekomendasi() / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function cariPantiAsuhan($page,$size){
  $cari=$this->input->get('cari');
  $response = array(
    'content' => $this->ApiPantiAsuhanModel->getCariPanti(($page - 1) * $size, $size,$cari),
    'totalPages' => ceil($this->ApiPantiAsuhanModel->getCountCariPanti($cari) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

public function insertDonasiDana(){

 $data=array(
  'id_donatur'=>$this->input->get('id_donatur'),
  'id_panti_asuhan  '=>$this->input->get('id_panti_asuhan'),
  'nominal_donasi_dana'=>$this->input->get('nominal_donasi_dana'),
  'tanggal_donasi_dana'=>date('Y-m-d H:i:s'),
  'status_donasi_dana'=>'Upload Bukti');


 $this->ApiPantiAsuhanModel->insertDonasiDana($data);

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

public function insertDonasiBarang(){



 $data=array(
  'id_donatur'=>$this->input->get('id_donatur'),
  'id_panti_asuhan  '=>$this->input->get('id_panti_asuhan'),
  'nama_donasi_barang'=>$this->input->get('nama_donasi_barang'),
  'tanggal_donasi_barang'=>$this->input->get('tanggal_donasi_barang'),
  'jam_donasi_barang'=>$this->input->get('jam_donasi_barang'),
  'deskripsi_donasi_barang'=>$this->input->get('deskripsi_donasi_barang'),
  'status_donasi_barang'=>'Menunggu');

 $this->ApiPantiAsuhanModel->insertDonasiBarang($data);

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

public function insertKegiatan(){



 $data=array(
  'id_donatur'=>$this->input->get('id_donatur'),
  'id_panti_asuhan  '=>$this->input->get('id_panti_asuhan'),
  'nama_kegiatan'=>$this->input->get('nama_kegiatan'),
  'jam_kegiatan'=>$this->input->get('jam_kegiatan'),
  'tanggal_kegiatan'=>$this->input->get('tanggal_kegiatan'),
  'deskripsi_kegiatan'=>$this->input->get('deskripsi_kegiatan'),
  'status_kegiatan  '=>'Menunggu Konfirmasi');

 $this->ApiPantiAsuhanModel->insertKegiatan($data);

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
}
