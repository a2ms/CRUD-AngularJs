<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Donasi extends CI_Controller {

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

  public function donasi_dana()
	{
		$jumlah_data = $this->donasi_admin->jumlah_data();
		$this->load->library('pagination');
		
		
		$config['base_url'] = base_url().'index.php/donasi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);
		
		$data['donasi_dana_data']=$this->donasi_admin->get_data_dana($config['per_page'],$from);
		
		$this->load->view('donasi',$data);
	}
	
	
	
  
  
	public function GetIdDana()
	{
		$id_donasi_dana=$this->input->get('id_donasi_dana');
		$this->session->set_flashdata('id_donasi_dana',$id_donasi_dana);
	}

	public function hapusDana()
	{
		$id_donasi_dana=$this->session->flashdata('id_donasi_dana');
		$this->donasi_admin->hapusDana($id_donasi_dana);
	}
	
	
	
	public function ajax_view($id_donasi_dana)
	{
		$data = $this->donasi_admin->get_by_id_view($id_donasi_dana);
		echo json_encode($data);
	}
	
	
	
	function caris(){
        $cari=$this->input->post('cari');
        if($this->donasi_admin->caris($cari))
		{
			$data['message']="";
			$data['donasi_dana_data']=$this->donasi_admin->hasilcaris($cari);
			$this->load->view('search_donasi_dana',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['donasi_dana_data']=$this->donasi_admin->hasilcaris($cari);
			$this->load->view('search_donasi_dana',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }
	
	public function UpdateDiterima()
	{
		$data=array(
				'id_donasi_dana'=>$this->input->post('id_donasi_dana'),
				'status_donasi_dana'=>'Diterima'
				);
				$this->donasi_admin->updateDana($data);
				redirect('Admin_Donasi/donasi_dana','refresh');
	}

  function _rules() 
    {
	$this->form_validation->set_rules('judul_berita', 'judul_berita', 'trim|required');
	$this->form_validation->set_rules('tanggal_berita', 'tanggal_berita', 'trim|required');
	$this->form_validation->set_rules('foto_berita', 'foto_berita', 'trim|required');
	$this->form_validation->set_rules('isi_berita', 'isi_berita', 'trim|required');
    }
  
}
