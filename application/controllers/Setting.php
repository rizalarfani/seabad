<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->ion_auth->logged_in()){
			redirect('auth');
		}
	}

	public function index(){
		$data['user']			= $this->ion_auth->user()->row();
		$data['main_content']	= 'setting';
		$this->load->view('template',$data);
	}

	public function changePassword($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Mengubah Password');
			redirect('setting');
		}

		$this->form_validation->set_rules('passwordBaru','Password Baru','required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('retypePassword', 'Retype Password', 'required|min_length[8]|max_length[12]|matches[passwordBaru]');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' => $this->input->post('passwordBaru')
				);
			if($this->ion_auth->update($id,$data)){
				$this->session->set_flashdata('infoPassword', 'Sukses Ganti Password');
				redirect('setting');
			} else{
				$this->session->set_flashdata('infoPassword', 'Gagal Ganti Password');
				redirect('setting');
			}
		} else {
			$this->session->set_flashdata('infoPassword', 'Password harus lebih dari 8 karakter & Pastikan diulang dengan benar!');
			redirect('setting');
		}

	}

	public function changeData($id){
		if($id==null){
			$this->session->set_flashdata('infoData', 'Gagal Mengubah Password');
			redirect('setting');
		}

		$this->form_validation->set_rules('firstname', 'First Name', 'required|min_length[3]|max_length[30]');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name'	=> $this->input->post('lastname')
				);
			if($this->ion_auth->update($id,$data)){
				$this->session->set_flashdata('infoData', 'Sukses Update Data');
				redirect('setting');
			} else{
				$this->session->set_flashdata('infoData', 'Gagal Update Data');
				redirect('setting');
			}
		} else {
			$this->session->set_flashdata('infoData', 'Masukan data dengan benar & Firstname minimal 3 karakter!');
			redirect('setting');
		}
	}

}

/* End of file Setting.php */
/* Location: ./application/controllers/Setting.php */