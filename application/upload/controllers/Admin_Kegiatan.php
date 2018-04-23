<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Kegiatan extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
        $this->load->model('kegiatan_admin');
        $this->load->library('form_validation');
        $this->load->helper('text');
		
		if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('flash_data', 'You login is expired !');
            redirect(base_url("index.php/login"));
        }
  }

  public function permintaan_kegiatan()
	{	
		$jumlah_data = $this->kegiatan_admin->jumlah_data();
		$this->load->library('pagination');
		
		
		$config['base_url'] = base_url().'index.php/Admin_Kegiatan/permintaan_kegiatan/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['kegiatan_data']=$this->kegiatan_admin->get_data_all($config['per_page'],$from);
		
		$this->load->view('permintaan_kegiatan',$data);
		
	}
  
  public function read_more($id_kegiatan) 
    {
        $row = $this->kegiatan_admin->get_by_id($id_kegiatan);
        if ($row) {
            $data = array(
			'id_kegiatan' => $row->id_kegiatan,
			'nama_donatur'=>$row->nama_donatur,
			'telp_donatur' => $row->telp_donatur,
			'alamat_donatur' => $row->alamat_donatur,
			'nama_panti_asuhan' => $row->nama_panti_asuhan,
			'telp_panti_asuhan' => $row->telp_panti_asuhan,
			'alamat_panti_asuhan' => $row->alamat_panti_asuhan,
			'nama_kegiatan' => $row->nama_kegiatan,
			'tanggal_kegiatan' => $row->tanggal_kegiatan,
			'jam_kegiatan' => $row->jam_kegiatan,
			'deskripsi_kegiatan' => $row->deskripsi_kegiatan,
			'foto_panti_asuhan' => $row->foto_panti_asuhan,
			'foto_donatur' => $row->foto_donatur,
			'status_kegiatan' => $row->status_kegiatan,
			);
            $this->load->view('detail_permintaan_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pemintaan_kegiatan'));
        }
    }
	
	public function GetIdKegiatan()
	{
		$id_kegiatan=$this->input->get('id_kegiatan');
		$this->session->set_flashdata('id_kegiatan',$id_kegiatan);
	}

	public function hapus()
	{
		$id_kegiatan=$this->session->flashdata('id_kegiatan');
		$this->kegiatan_admin->hapus($id_kegiatan);
	}
	

	
	public function ajax_edit($id_kegiatan)
	{
		$data = $this->kegiatan_admin->get_by_id_edit($id_kegiatan);
		echo json_encode($data);
	}
	
	public function UpdateKegiatan()
	{
		$tanggal_kegiatan = date('Y-m-d');
		$data=array(
				'id_kegiatan'=>$this->input->post('id_kegiatan'),
				'nama_kegiatan'=>$this->input->post('nama_kegiatan'),
				'tanggal_kegiatan'=>$this->input->post('tanggal_kegiatan'),
				'jam_kegiatan'=>$this->input->post('jam_kegiatan'),
				'deskripsi_kegiatan'=>$this->input->post('deskripsi_kegiatan'),
				//'status_kegiatan'=>'Ditolak'
				);
				$this->kegiatan_admin->updateKegiatan($data);
				redirect('Admin_Kegiatan/permintaan_kegiatan','refresh');
	}
	
	public function UpdateTolak()
	{
		$data=array(
				'id_kegiatan'=>$this->input->post('id_kegiatan'),
				'status_kegiatan'=>'Ditolak'
				);
				$this->kegiatan_admin->updateKegiatan($data);
				redirect('Admin_Kegiatan/permintaan_kegiatan','refresh');
	}
	
	public function UpdateDisetujui()
	{
		$data=array(
				'id_kegiatan'=>$this->input->post('id_kegiatan'),
				'status_kegiatan'=>'Disetujui'
				);
				$this->kegiatan_admin->updateKegiatan($data);
				redirect('Admin_Kegiatan/permintaan_kegiatan','refresh');
	}
	
	public function UpdateMenunggu()
	{
		$data=array(
				'id_kegiatan'=>$this->input->post('id_kegiatan'),
				'status_kegiatan'=>'Menunggu'
				);
				$this->kegiatan_admin->updateKegiatan($data);
				redirect('Admin_Kegiatan/permintaan_kegiatan','refresh');
	}
	
	function cari(){
        $cari=$this->input->post('cari');
        if($this->kegiatan_admin->cari($cari))
		{
			$data['message']="";
			$data['kegiatan_data']=$this->kegiatan_admin->hasilcari($cari);
			$this->load->view('search_permintaan_kegiatan',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['kegiatan_data']=$this->kegiatan_admin->hasilcari($cari);
			$this->load->view('search_permintaan_kegiatan',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }
	
  function _rules() 
    {
	$this->form_validation->set_rules('nama_kegiatan', 'nama_kegiatan', 'trim|required');
	$this->form_validation->set_rules('tanggal_kegiatan', 'tanggal_kegiatan', 'trim|required');
	$this->form_validation->set_rules('jam_kegiatan', 'jam_kegiatan', 'trim|required');
	$this->form_validation->set_rules('deskripsi_kegiatan', 'deskripsi_kegiatan', 'trim|required');
	$this->form_validation->set_rules('status_kegiatan', 'status_kegiatan', 'trim|required');
    }
  
}
