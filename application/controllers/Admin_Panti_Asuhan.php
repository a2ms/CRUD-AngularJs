<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_Panti_Asuhan extends CI_Controller {

  public function __construct()
  {
      parent::__construct();
        $this->load->model('panti_asuhan_admin');
		$this->load->model('pengguna');
        $this->load->library('form_validation');
        $this->load->helper('text');
		
		if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('flash_data', 'You login is expired !');
            redirect(base_url("login"));
        }
  }


  public function panti_asuhan_terverifikasi()
	{		
		$jumlah_data = $this->panti_asuhan_admin->jumlah_data_t();
		$this->load->library('pagination');
		$config['site_url'] = site_url().'panti_terverifikasi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(5);
		$this->pagination->initialize($config);

		$data['data_panti_b']=$this->panti_asuhan_admin->get_data_panti_b($config['per_page'],$from);
		
		$this->load->view('panti_terverifikasi',$data);
	}
	
	public function panti_asuhan_belum_terverifikasi()
	{		
		$jumlah_data = $this->panti_asuhan_admin->jumlah_data_b();
		$this->load->library('pagination');
		
		
		$config['site_url'] = site_url().'Admin_Panti_Asuhan/panti_asuhan_belum_terverifikasi/';
		$config['total_rows'] = $jumlah_data;
		$config['per_page'] = 10;
		$from = $this->uri->segment(4);
		$this->pagination->initialize($config);

		$data['data_panti_s']=$this->panti_asuhan_admin->get_data_panti_s($config['per_page'],$from);
		
		$this->load->view('panti_belum_terverifikasi',$data);
	}
	
	public function tambah_panti_form()
	{
		$this->load->view('tambah_panti_form');
	}
	
	public function insert_action() 
    {
		$id=2;
		$f='null';
		$t='Terverifikasi';

        $this->load->library('upload');
        $this->_rules();
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './image/sertifikat/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '2000'; //lebar maksimum 1288 px
        $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['foto_sertifikat_panti_asuhan']['name'])
        {
            if ($this->upload->do_upload('foto_sertifikat_panti_asuhan'))
            {
                $gbr = $this->upload->data();
                $data = array(
                'foto_sertifikat_panti_asuhan' =>$gbr['file_name'],
                'nama_panti_asuhan'=>$this->input->post('nama_panti_asuhan'),
				'no_id_panti_asuhan'=>$this->input->post('no_id_panti_asuhan'),
				'nama_pemilik'=>$this->input->post('nama_pemilik'),
				'no_ktp_pemilik'=>$this->input->post('no_ktp_pemilik'),
				'telp_panti_asuhan'=>$this->input->post('telp_panti_asuhan'),
				'rekening_panti_asuhan'=>$this->input->post('rekening_panti_asuhan'),
				'alamat_panti_asuhan'=>$this->input->post('alamat_panti_asuhan'),
				'longtitude_panti_asuhan'=>$this->input->post('longtitude_panti_asuhan'),
				'latitude_panti_asuhan'=>$this->input->post('latitude_panti_asuhan'),
				'kebutuhan_panti_asuhan'=>$this->input->post('kebutuhan_panti_asuhan'),
				'jumlah_anak_laki'=>$this->input->post('jumlah_anak_laki'),
				'jumlah_anak_perempuan'=>$this->input->post('jumlah_anak_perempuan'),
				'rentang_usia'=>$this->input->post('rentang_usia'),
				'status_panti_asuhan'=>$t,
				'deskripsi_panti_asuhan'=>$this->input->post('deskripsi_panti_asuhan')
                );
                 $this->panti_asuhan_admin->insert($data);
				$DataPengguna=array(
				  'email'=>$this->input->post('email'),
				  'password'=>md5($this->input->post('password')),
				  'id_role'=>$id,
				  'id_panti_asuhan'=>$this->panti_asuhan_admin->getIdPanti());
				$this->pengguna->insertPengguna($DataPengguna);
                 
				 $this->session->set_flashdata('message', 'Tambah Panti Asuhan Sukses');
                 redirect(site_url('panti_terverifikasi'));
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect(site_url('panti_belum_terverifikasi'));

            }
        }    
    }
	
	
	public function read_more($id_panti_asuhan) 
    {
        $row = $this->panti_asuhan_admin->get_by_id($id_panti_asuhan);
        if ($row) {
            $data = array(
			'id_panti_asuhan' => $row->id_panti_asuhan,
			'email'=>$row->email,
			'nama_panti_asuhan' => $row->nama_panti_asuhan,
			'nama_pemilik' => $row->nama_pemilik,
			'no_ktp_pemilik' => $row->no_ktp_pemilik,
			'no_id_panti_asuhan' => $row->no_id_panti_asuhan,
			'foto_sertifikat_panti_asuhan' => $row->foto_sertifikat_panti_asuhan,
			'telp_panti_asuhan' => $row->telp_panti_asuhan,
			'rekening_panti_asuhan' => $row->rekening_panti_asuhan,
			'alamat_panti_asuhan' => $row->alamat_panti_asuhan,
			'deskripsi_panti_asuhan' => $row->deskripsi_panti_asuhan,
			'kebutuhan_panti_asuhan' => $row->kebutuhan_panti_asuhan,
			'jumlah_anak_laki' => $row->jumlah_anak_laki,
			'jumlah_anak_perempuan' => $row->jumlah_anak_perempuan,
			'rentang_usia' => $row->rentang_usia,
			'longtitude_panti_asuhan' => $row->longtitude_panti_asuhan,
			'latitude_panti_asuhan' => $row->latitude_panti_asuhan,
			'foto_panti_asuhan' => $row->foto_panti_asuhan,
			'status_panti_asuhan' => $row->status_panti_asuhan,
			);
            $this->load->view('detail_panti_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panti_asuhan_terverifikasi'));
        }
    }
	
	
	public function update($id_panti_asuhan) 
    {
        $row = $this->panti_asuhan_admin->get_by_id($id_panti_asuhan);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('panti/updateaction'),
        		'id_panti_asuhan' => set_value('id_panti_asuhan', $row->id_panti_asuhan),
        		'nama_panti_asuhan' => set_value('nama_panti_asuhan', $row->nama_panti_asuhan),
        		'nama_pemilik' => set_value('nama_pemilik', $row->nama_pemilik),
        		'no_ktp_pemilik' => set_value('no_ktp_pemilik', $row->no_ktp_pemilik),
        		'no_id_panti_asuhan' => set_value('no_id_panti_asuhan', $row->no_id_panti_asuhan),
        		'foto_sertifikat_panti_asuhan' => set_value('foto_sertifikat_panti_asuhan', $row->foto_sertifikat_panti_asuhan),
        		'telp_panti_asuhan' => set_value('telp_panti_asuhan', $row->telp_panti_asuhan),
        		'rekening_panti_asuhan' => set_value('rekening_panti_asuhan', $row->rekening_panti_asuhan),
				'alamat_panti_asuhan' => set_value('alamat_panti_asuhan', $row->alamat_panti_asuhan),
				'deskripsi_panti_asuhan' => set_value('deskripsi_panti_asuhan', $row->deskripsi_panti_asuhan),
				'kebutuhan_panti_asuhan' => set_value('kebutuhan_panti_asuhan', $row->kebutuhan_panti_asuhan),
				'jumlah_anak_laki' => set_value('jumlah_anak_laki', $row->jumlah_anak_laki),
				'jumlah_anak_perempuan' => set_value('jumlah_anak_perempuan', $row->jumlah_anak_perempuan),
				'rentang_usia' => set_value('rentang_usia', $row->rentang_usia),
				'longtitude_panti_asuhan' => set_value('longtitude_panti_asuhan', $row->longtitude_panti_asuhan),
				'latitude_panti_asuhan' => set_value('latitude_panti_asuhan', $row->latitude_panti_asuhan),
				'foto_panti_asuhan' => set_value('telp_panti_asuhan', $row->foto_panti_asuhan),
				//'status_panti_asuhan' => set_value('status_panti_asuhan', $row->status_panti_asuhan),
        	    );
            $this->load->view('edit_panti_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('panti_terverifikasi'));
        }
    }
	
	public function update_action() 
    {
        $this->load->library('upload');
        $this->_rules();
        $nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
        $config['upload_path'] = './image/sertifikat/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '2000'; //lebar maksimum 1288 px
        $config['max_height']  = '2000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if($_FILES['foto_sertifikat_panti_asuhan']['name'])
        {
            if ($this->upload->do_upload('foto_sertifikat_panti_asuhan'))
            {
                $gbr = $this->upload->data();
                $data = array(
					'foto_sertifikat_panti_asuhan' =>$gbr['file_name'],
					'nama_panti_asuhan'=>$this->input->post('nama_panti_asuhan',TRUE),
					'no_id_panti_asuhan'=>$this->input->post('no_id_panti_asuhan',TRUE),
					'nama_pemilik'=>$this->input->post('nama_pemilik',TRUE),
					'no_ktp_pemilik'=>$this->input->post('no_ktp_pemilik',TRUE),
					'telp_panti_asuhan'=>$this->input->post('telp_panti_asuhan',TRUE),
					'rekening_panti_asuhan'=>$this->input->post('rekening_panti_asuhan',TRUE),
					'alamat_panti_asuhan'=>$this->input->post('alamat_panti_asuhan',TRUE),
					'longtitude_panti_asuhan'=>$this->input->post('longtitude_panti_asuhan',TRUE),
					'latitude_panti_asuhan'=>$this->input->post('latitude_panti_asuhan',TRUE),
					'kebutuhan_panti_asuhan'=>$this->input->post('kebutuhan_panti_asuhan',TRUE),
					'jumlah_anak_laki'=>$this->input->post('jumlah_anak_laki',TRUE),
					'jumlah_anak_perempuan'=>$this->input->post('jumlah_anak_perempuan',TRUE),
					'rentang_usia'=>$this->input->post('rentang_usia',TRUE),
					//'status_panti_asuhan'=>$this->input->post('status_panti_asuhan',TRUE),
					'deskripsi_panti_asuhan'=>$this->input->post('deskripsi_panti_asuhan',TRUE), 
                );
                 $this->panti_asuhan_admin->update($this->input->post('id_panti_asuhan',TRUE), $data);
                 $this->session->set_flashdata('message', 'Create Record Success');
                 redirect(site_url('panti_terverifikasi'));
            }else{
                //pesan yang muncul jika terdapat error dimasukkan pada session flashdata
                $this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Gagal upload gambar !!</div></div>");
                redirect(site_url('status_panti_asuhan'));

            }
        }
        else{
             $data = array(
            
                    'nama_panti_asuhan'=>$this->input->post('nama_panti_asuhan',TRUE),
					'no_id_panti_asuhan'=>$this->input->post('no_id_panti_asuhan',TRUE),
					'nama_pemilik'=>$this->input->post('nama_pemilik',TRUE),
					'no_ktp_pemilik'=>$this->input->post('no_ktp_pemilik',TRUE),
					'telp_panti_asuhan'=>$this->input->post('telp_panti_asuhan',TRUE),
					'rekening_panti_asuhan'=>$this->input->post('rekening_panti_asuhan',TRUE),
					'alamat_panti_asuhan'=>$this->input->post('alamat_panti_asuhan',TRUE),
					'longtitude_panti_asuhan'=>$this->input->post('longtitude_panti_asuhan',TRUE),
					'latitude_panti_asuhan'=>$this->input->post('latitude_panti_asuhan',TRUE),
					'kebutuhan_panti_asuhan'=>$this->input->post('kebutuhan_panti_asuhan',TRUE),
					'jumlah_anak_laki'=>$this->input->post('jumlah_anak_laki',TRUE),
					'jumlah_anak_perempuan'=>$this->input->post('jumlah_anak_perempuan',TRUE),
					'rentang_usia'=>$this->input->post('rentang_usia',TRUE),
					//'status_panti_asuhan'=>$this->input->post('status_panti_asuhan',TRUE),
					'deskripsi_panti_asuhan'=>$this->input->post('deskripsi_panti_asuhan',TRUE),
                  
                );
                 $this->panti_asuhan_admin->update($this->input->post('id_panti_asuhan',TRUE), $data);
                 $this->session->set_flashdata('message', 'Create Record Success');
                 redirect(site_url('panti_terverifikasi'));
        }    
    }
	
	
	
	public function GetIdPanti()
	{
		$id_panti_asuhan=$this->input->get('id_panti_asuhan');
		$this->session->set_flashdata('id_panti_asuhan',$id_panti_asuhan);
	}
	
	public function hapus()
	{
		$id_panti_asuhan=$this->session->flashdata('id_panti_asuhan');
		$this->panti_asuhan_admin->hapus($id_panti_asuhan);
		$this->panti_asuhan_admin->hapuspengguna($id_panti_asuhan);
	}
	
	public function UpdateVerifikasi()
	{
		$data=array(
				'id_panti_asuhan'=>$this->input->post('id_panti_asuhan'),
				'status_panti_asuhan'=>'Terverifikasi'
				);
				$this->panti_asuhan_admin->updateStatus($data);
				redirect('Admin_Panti_Asuhan/panti_asuhan_terverifikasi','refresh');
	}
	
	
	function cari(){
        $cari=$this->input->post('cari');
        if($this->panti_asuhan_admin->cari($cari))
		{
			$data['message']="";
			$data['data_panti_b']=$this->panti_asuhan_admin->hasilcari($cari);
			$this->load->view('search_panti_terverifikasi',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['data_panti_b']=$this->panti_asuhan_admin->hasilcari($cari);
			$this->load->view('search_panti_terverifikasi',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }
	
	function caris(){
        $cari=$this->input->post('cari');
        if($this->panti_asuhan_admin->caris($cari))
		{
			$data['message']="";
			$data['data_panti_s']=$this->panti_asuhan_admin->hasilcari($cari);
			$this->load->view('search_panti_belum_terverifikasi',$data);
		}
		else {
			$data['message']="<div class='alert alert-success'>Data tidak ditemukan</div>";
			$data['data_panti_s']=$this->panti_asuhan_admin->hasilcaris($cari);
			$this->load->view('search_panti_belum_terverifikasi',$data);
			$this->session->set_flashdata('flash_data','Data Tidak Ditemukan!');
			}
    }


  function _rules() 
    {
	$this->form_validation->set_rules('id_panti_asuhan', 'id_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('nama_panti_asuhan', 'nama_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('nama_pemilik', 'nama_pemilik', 'trim|required');
	$this->form_validation->set_rules('no_ktp_pemilik', 'no_ktp_pemilik', 'trim|required');
	$this->form_validation->set_rules('no_id_panti_asuhan', 'no_id_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('foto_sertifikat_panti_asuhan', 'foto_sertifikat_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('telp_panti_asuhan', 'telp_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('rekening_panti_asuhan', 'rekening_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('alamat_panti_asuhan', 'alamat_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('deskripsi_panti_asuhan', 'deskripsi_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('kebutuhan_panti_asuhan', 'kebutuhan_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('jumlah_anak_laki', 'jumlah_anak_laki', 'trim|required');
	$this->form_validation->set_rules('jumlah_anak_perempuan', 'jumlah_anak_perempuan', 'trim|required');
	$this->form_validation->set_rules('rentang_usia', 'rentang_usia', 'trim|required');
	$this->form_validation->set_rules('longtitude_panti_asuhan', 'longtitude_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('latitude_panti_asuhan', 'latitude_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('foto_panti_asuhan', 'foto_panti_asuhan', 'trim|required');
	$this->form_validation->set_rules('status_panti_asuhan', 'status_panti_asuhan', 'trim|required');
    }
/*  
id_panti_asuhan
nama_panti_asuhan
nama_pemilik
no_ktp_pemilik
no_id_panti_asuhan
foto_sertifikat_panti_asuhan
telp_panti_asuhan
rekening_panti_asuhan
alamat_panti_asuhan
deskripsi_panti_asuhan
kebutuhan_panti_asuhan
jumlah_anak_laki
jumlah_anak_perempuan
rentang_usia
longtitude_panti_asuhan
latitude_panti_asuhan
foto_panti_asuhan
status_panti_asuhan
 */
}
