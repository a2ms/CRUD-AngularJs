<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Berita extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
        $this->load->model('berita_admin');
        $this->load->library('form_validation');
		//$this->load->library('template');
        $this->load->helper('text');
  }

  public function berita()
	{
		$jumlah_data = $this->berita_admin->jumlah_data();
		$this->load->library('pagination');
		
		
		$config['site_url'] = site_url().'Admin_Berita/berita/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['berita_data']=$this->berita_admin->get_data_all($config['per_page'],$from);
		
		$this->load->view('berita',$data);
	}
  
  public function insert_action() 
    {
		$date = date('Y-m-d H:i:s');
		$id=0;

        $this->load->library('upload');
        $this->_rules();
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './image/berita/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '2000'; //lebar maksimum 1288 px
        $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['foto_berita']['name'])
        {
            if ($this->upload->do_upload('foto_berita'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto_berita' =>$gbr['file_name'],
                  'judul_berita' => $this->input->post('t_judul_berita',TRUE),
                  'isi_berita' => $this->input->post('t_isi_berita',TRUE),
				  'tanggal_berita' => $date,
				  'id_panti_asuhan' => $id,
                  
                );
                 $this->berita_admin->insert($data);
                 
				 $this->session->set_flashdata('message', 'Tambah Berita Sukses');
                 redirect(site_url('berita'));
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect(site_url('berita'));

            }
        }    
    }
	
	public function UpdateBerita()
	{
		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time

			$config['upload_path'] = './image/berita/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '2000'; //lebar maksimum 1288 px
			$config['max_height']  = '2000'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['foto_berita']['name'])
			{
				if ($this->upload->do_upload('foto_berita'))
				{
					$gbr = $this->upload->data();
					$data=array(
					'id_berita'=>$this->input->post('id_berita'),
					'judul_berita'=>$this->input->post('judul_berita'),
					'isi_berita'=>$this->input->post('isi_berita'),
					'foto_berita'=>$gbr['file_name'],
					);
					$this->berita_admin->updateBerita($data);
					redirect('Admin_Berita/berita','refresh');
				}
				else{
					$this->session->set_flashdata('message', 'Gagal upload foto');
					redirect('Admin_Berita/berita','refresh');
				}
			}
			else
			{
				$data=array(
					'id_berita'=>$this->input->post('id_berita'),
					'judul_berita'=>$this->input->post('judul_berita'),
					'isi_berita'=>$this->input->post('isi_berita'),
					);
					$this->berita_admin->updateBerita($data);
					redirect('Admin_Berita/berita','refresh');
			}
	}

	public function GetIdBerita()
	{
		$id_berita=$this->input->get('id_berita');
		$this->session->set_flashdata('id_berita',$id_berita);
	}

	public function hapus()
	{
		$id_berita=$this->session->flashdata('id_berita');
		$this->berita_admin->hapus($id_berita);
	}


	public function ajax_edit($id_berita)
	{
		$data = $this->berita_admin->get_by_id($id_berita);
		echo json_encode($data);
	}
	
	public function ajax_view($id_berita)
	{
		$data = $this->berita_admin->get_by_id_view($id_berita);
		echo json_encode($data);
	}
	
	function cari(){
        $cari=$this->input->post('cari');
        if($this->berita_admin->cari($cari))
		{
			$data['message']="";
			$data['berita']=$this->berita_admin->hasilcari($cari);
			$this->load->view('search_berita',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['berita']=$this->berita_admin->hasilcari($cari);
			$this->load->view('search_berita',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }
	
	
	
	
	

  function _rules() 
    {
	$this->form_validation->set_rules('judul_berita', 'judul_berita', 'trim|required');
	$this->form_validation->set_rules('foto_berita', 'foto_berita', 'trim|required');
	$this->form_validation->set_rules('isi_berita', 'isi_berita', 'trim|required');
    }
  
}
