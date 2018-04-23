<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct()
    {
        parent::__construct();
        $this->load->model('User');
        $this->load->library('form_validation');
        $this->load->helper('text');
    }
	
	public function index()
	{
		$this->load->view('login_form');
	}
	
	public function login_action(){
		$email=$this->input->post('email');
		$password=$this->input->post('password');

		$where=array(
			'email'=>$email,
			'password'=>md5($password),
			'id_role'=>1
		);
		$row = $this->User->cek_login("pengguna",$where);

		if($row->num_rows()==1){
			foreach($row->result() as $data)
			{
				$datasession= array(
					'email' => $email,
					'status' => "login",
					'id_pengguna'=>$data->id_pengguna
				);
					$this->session->set_userdata($datasession);
			}


			redirect(base_url("index.php/dashboard"));

		}else{
			$this->session->set_flashdata('message', 'Inputan Email Dan kata sandi tidak cocok !');
			redirect(base_url("index.php/login"));
		}
	}
	
	
	function logout(){
		$this->session->sess_destroy();
		$this->session->set_flashdata('flash_data', 'Logout Sussessfuly');
		redirect(base_url('index.php/login'));
	}
	
}
