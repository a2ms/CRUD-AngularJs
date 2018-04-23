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
	$ListKegiatan_ditolak=$this->donatur->getKegiatan_by_id_ditolak($id_donatur);
    $response=array(
      'listkegiatansetujui'=>$ListKegiatan_disetujui,
	  'listkegiatanmenunggu'=>$ListKegiatan_menunggu,
	  'listkegiatanditolak'=>$ListKegiatan_ditolak
    );

    $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
    exit;
  }

  public function getID_Donatur_Tetap(){
		 $id_donatur_tetap=$this->input->get('id_donatur_tetap');
		 $status=array(
			'status_donatur_tetap'=>$this->input->get('temp')
		 );
		 $this->donatur->updateStatusDonaturTetap($id_donatur_tetap,$status);
	}

	public function getID_Donasi_Barang(){
		 $id_donasi_barang=$this->input->get('id_donasi_barang');
		 $status=array(
			'status_donasi_barang'=>$this->input->get('temp')
		 );
		 $this->donatur->updateStatusDonasiBarang($id_donasi_barang,$status);
	}

	public function getID_Kegiatan(){
		 $id_kegiatan=$this->input->get('id_kegiatan');
		 $status=array(
			'status_kegiatan'=>$this->input->get('temp')
		 );
		 $this->donatur->updateStatusKegiatan($id_kegiatan,$status);
	}


  public function UpdateDonatur()
  {
    $DataDonatur=array(
      'id_donatur'=>$this->input->post('id_donatur'),
      'nama_donatur'=>$this->input->post('nama_donatur'),
      'telp_donatur'=>$this->input->post('telp_donatur'),
      'alamat_donatur'=>$this->input->post('alamat_donatur'),
      'foto_donatur'=>$this->input->post('foto_donatur')
    );
    $this->donatur->editProfile($DataDonatur['id_donatur'],$DataDonatur);
    $gambar_konten=$this->input->post('foto_donatur');
    $gambarfile=base64_decode($this->input->post('gambar'));
                   $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi_app/image/donatur/'.$gambar_konten.'', 'w');
                fwrite($fp, $gambarfile);
    exit;
  }

  public function TampilDonaturTetapDiterima($page,$size){
   $id_panti_asuhan=$this->input->get('id_panti_asuhan');
   $response = array(
    'content' => $this->donatur->getDonaturTetapDiterima(($page - 1) * $size, $size,$id_panti_asuhan),
    'totalPages' => ceil($this->donatur->getCountDonaturTetapDiterima($id_panti_asuhan) / $size));

   $this->output
   ->set_status_header(200)
   ->set_content_type('application/json', 'utf-8')
   ->set_output(json_encode($response, JSON_PRETTY_PRINT))
   ->_display();
   exit;
 }

 public function TampilDonaturTetapMenunggu($page,$size){
  $id_panti_asuhan=$this->input->get('id_panti_asuhan');
  $response = array(
   'content' => $this->donatur->getDonaturTetapMenunggu(($page - 1) * $size, $size,$id_panti_asuhan),
   'totalPages' => ceil($this->donatur->getCountDonaturTetapMenunggu($id_panti_asuhan) / $size));

  $this->output
  ->set_status_header(200)
  ->set_content_type('application/json', 'utf-8')
  ->set_output(json_encode($response, JSON_PRETTY_PRINT))
  ->_display();
  exit;
}

}
