<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->model('M_kelola_user');
		
		
	}

	public function index()
	{
		if($this->ion_auth->logged_in()){
			$this->cek_login();
		} else{
			$this->load->view('login');
		}
		
	}

	public function login(){
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == TRUE) {
			$identity = $this->input->post('username');
			$password = $this->input->post('password');
			if($this->ion_auth->login($identity, $password, false)){
					$this->cek_login();
			} else{
				$this->session->set_flashdata('info', 'Username atau Password Anda Salah!');
					redirect('auth');
			}
		} else {
			$this->session->set_flashdata('info', 'Silahkan Cek Username Atau Password Anda!');
			$this->load->view('login');
		}
		
	}

	public function cek_login(){
		if($this->ion_auth->is_admin()){
			redirect('admin');
		} else{
			$this->ion_auth->logout();
			redirect('auth/login');
		}
	}

	public function logout(){
		if($this->ion_auth->logged_in()){
			$this->ion_auth->logout();
			redirect('auth');
		} else{
			redirect('auth');
		}
	}

	public function register ()
	{
		$data['title'] = "Halaman Regisrasi users";

		$this->form_validation->set_rules('username', 'Usename', 'required|trim');
		$this->form_validation->set_radio('nik','NIK','required|trim|numeric|min_length[16]', array(
			'numeric' => 'Harus berisi angka',
			'min_length[16]' => 'Nik harus 16 digit angka'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[2]|valid_email|valid_emails|is_unique[users.email]');
		$this->form_validation->set_rules('first_name','First_name','required|trim');
		$this->form_validation->set_rules('last_name','Last_name','required|trim');
		$this->form_validation->set_rules('pass','Password','required|min_length[5]',array(
			'min_length[5]' => 'Minimal passwor 5 karakter'
		));

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('registrasi', $data);
		} else {
			$user = $this->ion_auth->user();
			$username = $this->input->post('username');
			$password = $this->input->post('pass');
			$email 	= $this->input->post('email');

			$input_nik = explode('-', $this->input->post('nik'));
			$nik 	   = $input_nik[0];
			$nama 	   = $input_nik[1];

			if($nik=='01234567891234567'){
				$additional_data = array(
				'nik' 		 => 0,
				'first_name' => $this->input->post('first_name'),
				);
			}else{
				$additional_data = array(
				'nik' 		 => $nik,
				'first_name' => $nama,
				);
			}
			$group = array($this->input->post('group'));
			if ($this->ion_auth->username_check($username))
			{
				$this->session->set_flashdata('info', 'Tambah User Gagal. Username telah terdaftar!');
				redirect('auth/register');
			} 
			else if($this->ion_auth->email_check($email)){
				$this->session->set_flashdata('info', 'Tambah User Gagal. Email telah terdaftar!');
				redirect('auth/register');
			} else{
				$this->ion_auth->register($username,$password,$email,$additional_data,$group);

				$this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Berhasil register</div>');
				redirect('auth/login_u');
			}

		}
		
		
	}

	public function login_u ()
	{
		$data['title'] = "Halaman Login Users";
		$this->form_validation->set_rules('username', 'Usename', 'required|trim');
		$this->form_validation->set_rules('pass','Password','required');
		$user = $this->input->post('username',true);
		$pass = $this->input->post('pass', true);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('login_users', $data);
		} else {
			if ($this->ion_auth->login($user,$pass, false)) {
				$data = [
					'user' => $user
				];
				$this->session->set_userdata($data);
				$this->cek_login();
			} else {
				$this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Passwod atau email salah!!</div>');
				redirect('auth/login_u');
			}
		}
	
	}

	public function logout_u ()
	{
		$this->session->unset_userdata('user');
		redirect ('auth/login_u');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */