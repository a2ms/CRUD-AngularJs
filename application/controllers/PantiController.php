<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PantiController extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('panti_asuhan');
  }

  public function getListPantiAll()
  {
    $DataPanti=$this->panti_asuhan->get_data_all_panti();
    $response=array(
      'jumlah'=>count($DataPanti),
      'DataPanti'=>$DataPanti
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }

  public function getListPantiByJarak()
  {
    $longitude_panti_asuhan=$this->input->get('longitude_panti_asuhan');
    $latitude_panti_asuhan=$this->input->get('latitude_panti_asuhan');
    $DataPanti=$this->panti_asuhan->get_data_panti_jarak($longitude_panti_asuhan,$latitude_panti_asuhan);
    $response=array(
      'jumlah'=>count($DataPanti),
      'DataPanti'=>$DataPanti
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }

  public function UpdateProfil()
  {
    $DataPanti=array(
      'id_panti_asuhan'=>$this->input->post('id_panti_asuhan'),
      'nama_panti_asuhan'=>$this->input->post('nama_panti_asuhan'),
      'telp_panti_asuhan'=>$this->input->post('telp_panti_asuhan'),
      'alamat_panti_asuhan'=>$this->input->post('alamat_panti_asuhan'),
      'nama_pemilik'=>$this->input->post('nama_pemilik'),
      'no_id_panti_asuhan'=>$this->input->post('no_id_panti_asuhan'),
      'jumlah_anak_laki'=>$this->input->post('jumlah_anak_laki'),
      'jumlah_anak_perempuan'=>$this->input->post('jumlah_anak_perempuan'),
      'rentang_usia'=>$this->input->post('rentang_usia'),
      'foto_panti_asuhan'=>$this->input->post('foto_panti_asuhan'),
      'kebutuhan_panti_asuhan'=>$this->input->post('kebutuhan_panti_asuhan'),
      'deskripsi_panti_asuhan'=>$this->input->post('deskripsi_panti_asuhan'),
      'no_ktp_pemilik'=>$this->input->post('no_ktp_pemilik'),
      'rekening_panti_asuhan'=>$this->input->post('rekening_panti_asuhan')
    );

    $gambar_konten=$this->input->post('foto_panti_asuhan');
       $gambarfile=base64_decode($this->input->post('gambar'));
                   $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi_app/image/panti/'.$gambar_konten.'', 'w');
                fwrite($fp, $gambarfile);

      $this->panti_asuhan->updatePanti($DataPanti);
      exit;
  }

/*
  public function GetListRating()
  {
    $id_laundry=$this->input->get('id_laundry');
    $ListRating=$this->rating->GetListRating($id_laundry);
    $response=array(
      'jumlah'=>count($ListRating),
      'ListRating'=>$ListRating
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }
  */
}
