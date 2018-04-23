<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Donasi_Barang extends CI_Controller {

	  public function __construct()
	  {
		  parent::__construct();
			$this->load->model('donasi_admin');
			$this->load->library('form_validation');
			$this->load->helper('text');
			
			if($this->session->userdata('status') != "login"){
				$this->session->set_flashdata('flash_data', 'You login is expired !');
				redirect(base_url("index.php/login"));
			}
	  }

	public function donasi_barang()
	{
		$jumlah_data2 = $this->donasi_admin->jumlah_data2();
		$this->load->library('pagination');
		
		
		$config['base_url'] = base_url().'index.php/donasi/';
		$config['total_rows'] = $jumlah_data2;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['donasi_barang_data']=$this->donasi_admin->get_data_barang($config['per_page'],$from);
		
		$this->load->view('donasi_barang',$data);
	}
	
	public function read_more($id_donasi_barang) 
    {
        $row = $this->donasi_admin->get_by_id_view_barang($id_donasi_barang);
        if ($row) {
            $data = array(
			'id_donasi_barang' => $row->id_donasi_barang,
			'nama_donatur'=>$row->nama_donatur,
			'telp_donatur' => $row->telp_donatur,
			'alamat_donatur' => $row->alamat_donatur,
			'nama_panti_asuhan' => $row->nama_panti_asuhan,
			'telp_panti_asuhan' => $row->telp_panti_asuhan,
			'alamat_panti_asuhan' => $row->alamat_panti_asuhan,
			'nama_donasi_barang' => $row->nama_donasi_barang,
			'tanggal_donasi_barang' => $row->tanggal_donasi_barang,
			'jam_donasi_barang' => $row->jam_donasi_barang,
			'deskripsi_donasi_barang' => $row->deskripsi_donasi_barang,
			'foto_panti_asuhan' => $row->foto_panti_asuhan,
			'foto_donatur' => $row->foto_donatur,
			'status_donasi_barang' => $row->status_donasi_barang,
			);
            $this->load->view('detail_donasi_barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('donasi_barang'));
        }
    }
	
	public function GetIdBarang()
	{
		$id_donasi_barang=$this->input->get('id_donasi_barang');
		$this->session->set_flashdata('id_donasi_barang',$id_donasi_barang);
	}

	public function hapusBarang()
	{
		$id_donasi_barang=$this->session->flashdata('id_donasi_barang');
		$this->donasi_admin->hapusBarang($id_donasi_barang);
	}
	
	public function ajax_view($id_donasi_dana)
	{
		$data = $this->donasi_admin->get_by_id_view($id_donasi_dana);
		echo json_encode($data);
	}
	
	public function ajax_view_barang($id_donasi_barang)
	{
		$data = $this->donasi_admin->get_by_id_view_barang($id_donasi_barang);
		echo json_encode($data);
	}
	
	
	public function ajax_edit_barang($id_donasi_barang)
	{
		$data = $this->donasi_admin->get_by_id_edit($id_donasi_barang);
		echo json_encode($data);
	}
	
	public function UpdateBarang()
	{
		$tanggal_donasi_barang = date('Y-m-d');
		$jam_donasi_barang = time('H:m:s');
		$data=array(
				'id_donasi_barang'=>$this->input->post('id_donasi_barang'),
				'nama_donasi_barang'=>$this->input->post('nama_donasi_barang'),
				'tanggal_donasi_barang'=>$this->input->post('tanggal_donasi_barang'),
				'jam_donasi_barang'=>$this->input->post('jam_donasi_barang'),
				'deskripsi_donasi_barang'=>$this->input->post('deskripsi_donasi_barang'),
				);
				$this->donasi_admin->updateBarang($data);
				redirect('Admin_Donasi_Barang/donasi_barang','refresh');
	}
	
	public function UpdateTolak()
	{
		$data=array(
				'id_donasi_barang'=>$this->input->post('id_donasi_barang'),
				'status_donasi_barang'=>'Ditolak'
				);
				$this->donasi_admin->updateBarang($data);
				redirect('Admin_Donasi_Barang/donasi_barang','refresh');
	}
	
	public function UpdateDisetujui()
	{
		$data=array(
				'id_donasi_barang'=>$this->input->post('id_donasi_barang'),
				'status_donasi_barang'=>'Disetujui'
				);
				$this->donasi_admin->updateBarang($data);
				redirect('Admin_Donasi_Barang/donasi_barang','refresh');
	}
	
	public function UpdateMenunggu()
	{
		$data=array(
				'id_donasi_barang'=>$this->input->post('id_donasi_barang'),
				'status_donasi_barang'=>'Menunggu'
				);
				$this->donasi_admin->updateBarang($data);
				redirect('Admin_Donasi_Barang/donasi_barang','refresh');
	}
	
	function cari(){
        $cari=$this->input->post('cari');
        if($this->donasi_admin->cari($cari))
		{
			$data['message']="";
			$data['donasi_barang_data']=$this->donasi_admin->hasilcari($cari);
			$this->load->view('search_donasi',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['donasi_barang_data']=$this->donasi_admin->hasilcari($cari);
			$this->load->view('search_donasi',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }

  function _rules() 
    {
	$this->form_validation->set_rules('judul_berita', 'judul_berita', 'trim|required');
	$this->form_validation->set_rules('tanggal_berita', 'tanggal_berita', 'trim|required');
	$this->form_validation->set_rules('foto_berita', 'foto_berita', 'trim|required');
	$this->form_validation->set_rules('isi_berita', 'isi_berita', 'trim|required');
    }
  
}
