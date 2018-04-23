<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DonaturController extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('donatur');
  }
  
  public function getKegiatan_Id()
  {
	$id_donatur=$this->input->get('id_donatur');
	$ListKegiatan_disetujui=$this->donatur->getKegiatan_by_id_disetujui($id_donatur);
	$ListKegiatan_menunggu=$this->donatur->getKegiatan_by_id_menunggu($id_donatur);
    $response=array(
      'listkegiatansetujui'=>$ListKegiatan_disetujui,
	  'listkegiatanmenunggu'=>$ListKegiatan_menunggu
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }
  

}
