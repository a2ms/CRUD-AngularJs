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
