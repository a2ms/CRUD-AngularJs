<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Donatur extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
        $this->load->model('donatur_admin');
		$this->load->model('pengguna');
		$this->load->library('session');
        $this->load->library('form_validation');
        $this->load->helper('text');
		
		if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('flash_data', 'You login is expired !');
            redirect(base_url("index.php/login"));
        }
  }

  public function donatur()
	{
		$jumlah_data = $this->donatur_admin->jumlah_data();
		$this->load->library('pagination');


		$config['base_url'] = base_url().'index.php/Admin_Donatur/donatur/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(3);
		$this->pagination->initialize($config);

		$data['donatur_list']=$this->donatur_admin->get_data_all($config['per_page'],$from);

		$this->load->view('donatur_view',$data);
	}

  public function insert_action()
    {
		$id=3;

        $this->load->library('upload');
        $this->_rules();
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './image/donatur/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '2000'; //lebar maksimum 1288 px
        $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['foto_donatur']['name'])
        {
            if ($this->upload->do_upload('foto_donatur'))
            {
                $gbr = $this->upload->data();
                $data = array(
                  'foto_donatur' =>$gbr['file_name'],
                  'nama_donatur' => $this->input->post('nama_donatur',TRUE),
                  'telp_donatur' => $this->input->post('telp_donatur',TRUE),
				  'alamat_donatur' => $this->input->post('alamat_donatur',TRUE),

                );
                 $this->donatur_admin->insert($data);
				$DataPengguna=array(
				  'email'=>$this->input->post('email'),
				  'password'=>md5($this->input->post('password')),
				  'id_role'=>$id,
				  'id_donatur'=>$this->donatur_admin->getIdDonatur());
				$this->pengguna->insertPengguna($DataPengguna);

				 $this->session->set_flashdata('message', 'Tambah Donatur Sukses');
                 redirect(site_url('donatur'));
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect(site_url('donatur'));

            }
        }
    }

	public function UpdateDonatur()
	{
		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
			$config['upload_path'] = './image/donatur/'; //path folder
			$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
			$config['max_size'] = '2048'; //maksimum besar file 2M
			$config['max_width']  = '2000'; //lebar maksimum 1288 px
			$config['max_height']  = '2000'; //tinggi maksimu 768 px
			$config['file_name'] = $nmfile; //nama yang terupload nantinya
			$this->upload->initialize($config);
			if($_FILES['foto_donatur']['name'])
			{
				if ($this->upload->do_upload('foto_donatur'))
				{
					$gbr = $this->upload->data();
					$DataDonatur=array(
					'id_donatur'=>$this->input->post('id_donatur'),
					'nama_donatur'=>$this->input->post('nama_donatur'),
					'telp_donatur'=>$this->input->post('telp_donatur'),
					'alamat_donatur'=>$this->input->post('alamat_donatur'),
					'foto_donatur'=>$nmfile['file_name'],
					);
					$this->donatur_admin->updateDonatur($DataDonatur);
					redirect('Admin_Donatur/donatur','refresh');
				}
				else{
					$this->session->set_flashdata('message', 'Gagal upload foto');
					redirect('Admin_Donatur/donatur','refresh');
				}
			}
			else
			{
				$DataDonatur=array(
					'id_donatur'=>$this->input->post('id_donatur'),
					'nama_donatur'=>$this->input->post('nama_donatur'),
					'telp_donatur'=>$this->input->post('telp_donatur'),
					'alamat_donatur'=>$this->input->post('alamat_donatur'),
					);
					$this->donatur_admin->updateDonatur($DataDonatur);
					redirect('Admin_Donatur/donatur','refresh');
			}
	}

	public function GetIdDonatur()
	{
		$id_donatur=$this->input->get('id_donatur');
		$this->session->set_flashdata('id_donatur',$id_donatur);
	}

	public function hapus()
	{
		$id_donatur=$this->session->flashdata('id_donatur');
		$this->donatur_admin->hapus($id_donatur);
		$this->donatur_admin->hapuspengguna($id_donatur);
	}


  public function ajax_edit($id_donatur)
	{
		$data = $this->donatur_admin->get_by_id($id_donatur);
		echo json_encode($data);
	}

	function cari(){
        $cari=$this->input->post('cari');
        if($this->donatur_admin->cari($cari))
		{
			$data['message']="";
			$data['donatur_list']=$this->donatur_admin->hasilcari($cari);
			$this->load->view('search_donatur_view',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['donatur_list']=$this->donatur_admin->hasilcari($cari);
			$this->load->view('search_donatur_view',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }
 
  function _rules()
    {
	$this->form_validation->set_rules('nama_donatur', 'nama_donatur', 'trim|required');
	$this->form_validation->set_rules('telp_donatur', 'telp_donatur', 'trim|required');
	$this->form_validation->set_rules('alamat_donatur', 'alamat_donatur', 'trim|required');
	$this->form_validation->set_rules('foto_donatur', 'foto_donatur', 'trim|required');
    }

}
