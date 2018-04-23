<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class PenggunaController extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
      $this->load->model('pengguna');
      $this->load->model('donatur');
      $this->load->model('panti_asuhan');
  }

  public function Login()
  {
        $email=$this->input->post('email');
        $password=md5($this->input->post('password'));

        $DataPengguna=$this->pengguna->getDetailPengguna($email,$password);
        if($DataPengguna==NULL)
        {
          $response = array(
            'status'=>'gagal',
            'message'=>'pengguna belum terdaftar'
          );
        }
        else {
              if($DataPengguna['id_role']=='3')
              {
                $response = array(
                  'status'=>'sukses',
                  'id_role'=>'3',
                  'datapengguna'=> $this->pengguna->getPengguna($email,$password,'donatur'),
                  'datadonatur' => $this->donatur->getDonatur($DataPengguna['id_donatur']));
              }
              if($DataPengguna['id_role']=='2')
              {
                $response = array(
                  'status'=>'sukses',
                  'id_role'=>'2',
                  'datapengguna'=> $this->pengguna->getPengguna($email,$password,'panti_asuhan'),
                  'datapanti_asuhan' => $this->panti_asuhan->getPanti_asuhan($DataPengguna['id_panti_asuhan']));
              }
        }
      $this->output
          ->set_status_header(200)
          ->set_content_type('application/json', 'utf-8')
          ->set_output(json_encode($response, JSON_PRETTY_PRINT))
          ->_display();
      exit;
  }

  public function GantiPassword()
  {
      $password=$this->input->post('password');
      $id_pengguna=$this->input->post('id_pengguna');

      $DataPengguna=array(
        'password'=>$password
      );
      $this->pengguna->gantiPassword($id_pengguna,$DataPengguna);

      $response=array(
        'status'=>'sukses'
      );

      $this->output
        ->set_status_header(200)
        ->set_content_type('application/json', 'utf-8')
        ->set_output(json_encode($response, JSON_PRETTY_PRINT))
        ->_display();
      exit;
  }

  public function Register()
  {
    $role=$this->input->post('id_role');
    $email=$this->input->post('email');

    if($this->pengguna->cekUsername($email))
    {
      if($role=='3')
      {
        $response=$this->registerDonatur();
      }
      if($role=='2')
      {
        $response=$this->registerPanti_asuhan();
      }
    }
    else {
      $response=array(
        'status'=>'gagal',
        'message'=>'Email telah dipakai'
      );
    }

    $this->output
      ->set_status_header(200)
      ->set_content_type('application/json', 'utf-8')
      ->set_output(json_encode($response, JSON_PRETTY_PRINT))
      ->_display();
    exit;
  }

  public function registerDonatur()
  {
    $DataDonatur=array(
      'nama_donatur'=>$this->input->post('nama_donatur'),
      'telp_donatur'=>$this->input->post('telp_donatur'),
      'alamat_donatur'=>$this->input->post('alamat_donatur'),
      'foto_donatur'=>$this->input->post('foto_donatur')
    );
    $this->donatur->insertDonatur($DataDonatur);
    $DataPengguna=array(
      'email'=>$this->input->post('email'),
      'password'=>md5($this->input->post('password')),
      'id_role'=>$this->input->post('id_role'),
      'id_donatur'=>$this->donatur->getIdDonatur());
    $this->pengguna->insertPengguna($DataPengguna);
    $response = array(
      'status'=>'sukses');
    $gambar_konten=$this->input->post('foto_donatur');
    $gambarfile=base64_decode($this->input->post('gambar'));
                $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi_app/image/donatur/'.$gambar_konten.'', 'w');
          fwrite($fp, $gambarfile);

    return $response;
  }

  public function registerPanti_asuhan()
  {
      $DataPanti_asuhan=array(
        'nama_panti_asuhan'=>$this->input->post('nama_panti_asuhan'),
        'no_id_panti_asuhan'=>$this->input->post('no_id_panti_asuhan'),
        'foto_sertifikat_panti_asuhan'=>$this->input->post('foto_sertifikat_panti_asuhan'),
        'telp_panti_asuhan'=>$this->input->post('telp_panti_asuhan'),
        'rekening_panti_asuhan'=>$this->input->post('rekening_panti_asuhan'),
        'alamat_panti_asuhan'=>$this->input->post('alamat_panti_asuhan'),
        'longtitude_panti_asuhan'=>$this->input->post('longtitude_panti_asuhan'),
        'latitude_panti_asuhan'=>$this->input->post('latitude_panti_asuhan'),
		'kebutuhan_panti_asuhan'=>$this->input->post('kebutuhan_panti_asuhan'),
		'jumlah_anak_laki'=>$this->input->post('jumlah_anak_laki'),
		'jumlah_anak_perempuan'=>$this->input->post('jumlah_anak_perempuan'),
		'rentang_usia'=>$this->input->post('rentang_usia'),
		'foto_panti_asuhan'=>$this->input->post('foto_panti_asuhan'),
		'status_panti_asuhan'=>$this->input->post('status_panti_asuhan'),
        'deskripsi_panti_asuhan'=>$this->input->post('deskripsi_panti_asuhan'));
      $this->panti_asuhan->insertPanti_asuhan($DataPanti_asuhan);
      $DataPengguna=array(
        'email'=>$this->input->post('email'),
        'password'=>$this->input->post('password'),
        'id_role'=>$this->input->post('id_role'),
        'id_panti_asuhan'=>$this->panti_asuhan->getIdPanti_asuhan());
      $this->pengguna->insertPengguna($DataPengguna);
      $response = array(
          'status'=>'sukses');

      $gambar_konten=$this->input->post('foto_panti_asuhan');
      $gambarfile=base64_decode($this->input->post('gambar'));
                  $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi/image/panti/'.$gambar_konten.'', 'w');
        	      fwrite($fp, $gambarfile);

	  $gambar_konten2=$this->input->post('foto_sertifikat_panti_asuhan');
      $gambarfile2=base64_decode($this->input->post('gambar'));
                  $fp = fopen($_SERVER['DOCUMENT_ROOT'].'/berbagi/image/panti/'.$gambar_konten2.'', 'w');
        	      fwrite($fp, $gambarfile2);
    return $response;

  }
}
