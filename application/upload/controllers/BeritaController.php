<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class BeritaController extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('berita');
      $this->load->model('panti_asuhan');
  }

  public function getBerita_All()
  {
	$ListBerita=$this->berita->getBerita();
    $response=array(
      'jumlah'=>count($ListBerita),
      'listberita'=>$ListBerita
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }
  
  public function getBerita_Id()
  {
	$id_panti_asuhan=$this->input->get('id_panti_asuhan');
	$ListBerita=$this->berita->getBeritaId($id_panti_asuhan);
    $response=array(
      'jumlah'=>count($ListBerita),
      'listberita'=>$ListBerita
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }
  
  public function insertBerita($DataBerita)
  {
    $this->db->insert('berita',$DataBerita);
  }
  
  

  
}
