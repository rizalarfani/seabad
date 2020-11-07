<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_user extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
		// 	redirect('auth');
		// }
		$this->load->library('form_validation');
		$this->load->model('m_kelola_user','kelola_user');
	}

	public function index()
	{
		$this->user();
	}

	public function user(){
		$data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->ion_auth->users(array(1,2,3))->result();
		$data['no']				= 1;
		$data['main_content']	= 'admin/kelola_user';
		$this->load->view('template',$data);
	}

	public function tambah_user(){
		
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
			$this->form_validation->set_rules('nama', 'NAMA', 'trim|required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('email', 'Email', 'required|min_length[2]|valid_email|valid_emails');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|max_length[15]');
			$this->form_validation->set_rules('r_password', 'Retype Password', 'required|matches[password]');
			$this->form_validation->set_rules('group', 'Group', 'required');

			if($this->form_validation->run() == TRUE) {
				$user = $this->ion_auth->user();
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$email 	= $this->input->post('email');

				$input_nik = explode('-', $this->input->post('nik'));
				$nik 	   = $input_nik[0];
				$nama 	   = $input_nik[1];

				if($nik=='01234567891234567'){
					$additional_data = array(
					'nik' 		 => 0,
					'first_name' => $this->input->post('nama'),
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
					redirect('f_admin/kelola_user/tambah_user','refresh');
				} 
				else if($this->ion_auth->email_check($email)){
					$this->session->set_flashdata('info', 'Tambah User Gagal. Email telah terdaftar!');
					redirect('f_admin/kelola_user/tambah_user','refresh');
				} else{
					$this->ion_auth->register($username,$password,$email,$additional_data,$group);

					$this->session->set_flashdata('info', 'Tambah User Berhasil!');
					redirect('f_admin/kelola_user/tambah_user','refresh');
				}
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['penyewa']		= $this->kelola_user->getDataPenyewa();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_user_add';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['penyewa']		= $this->kelola_user->getDataPenyewa();
			$data['no']				= 1;
			$data['main_content']	= 'admin/kelola_user_add';
			$this->load->view('template',$data);
		}
	}

	public function hapus_user($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus User!');
			redirect('f_admin/kelola_user/user');
		} else{
			$sql = $this->ion_auth->delete_user($id);
			if($sql){
				$this->session->set_flashdata('info', 'Sukses Hapus User!');
				redirect('f_admin/kelola_user/user');
			}else{
				$this->session->set_flashdata('info', 'Gagal Hapus User!');
				redirect('f_admin/kelola_user/user');
			}
		}
	}

	public function edit_user($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit User!');
			redirect('f_admin/kelola_user/user');
		} else{
			if($this->input->post('submit')==true){
				$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
				$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|min_length[2]');
				$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required');
				if($this->form_validation->run() == TRUE) {
					$data = array(
						'nik'		=> $this->input->post('nik'),
						'first_name' => $this->input->post('firstname'),
						'last_name'	=> $this->input->post('lastname'),
						);

					$sql = $this->ion_auth->update($id,$data);
					if($sql){
						$this->session->set_flashdata('info', 'Berhasil Edit User!');
						redirect('f_admin/kelola_user/user');
					} else{
						$this->session->set_flashdata('info', 'Gagal Edit User!');
						redirect('f_admin/kelola_user/user');
					}
				} else{
					$data['user']			= $this->ion_auth->user()->row();
					$data['data_list']		= $this->ion_auth->user($id)->row();
					$data['no']				= 1;
					$data['main_content']	= 'admin/kelola_user_edit';
					$this->load->view('template',$data);
				}
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['data_list']		= $this->ion_auth->user($id)->row();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_user_edit';
				$this->load->view('template',$data);
			}
		}
	}

	public function changePassword($id=null){
		if($id==null){
			$this->session->set_flashdata('infoPassword', 'Gagal Mengubah Password');
			redirect('f_admin/kelola_user/user','refresh');
		}

		$this->form_validation->set_rules('passwordBaru','Password Baru','required|min_length[8]|max_length[12]');
		$this->form_validation->set_rules('retypePassword', 'Retype Password', 'required|min_length[8]|max_length[12]|matches[passwordBaru]');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'password' => $this->input->post('passwordBaru')
				);
			if($this->ion_auth->update($id,$data)){
				$this->session->set_flashdata('infoPassword', 'Sukses Ganti Password');
				redirect('f_admin/kelola_user/user','refresh');
			} else{
				$this->session->set_flashdata('infoPassword', 'Gagal Ganti Password');
				redirect('f_admin/kelola_user/user','refresh');
			}
		} else {
			$this->session->set_flashdata('infoPassword', 'Password harus lebih dari 8 karakter & Pastikan diulang dengan benar!');
			redirect('f_admin/kelola_user/user','refresh');
		}

	}

	public function penyewa(){
		$data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->kelola_user->getDataPenyewa();
		$data['no']				= 1;
		$data['main_content']	= 'admin/kelola_user_penyewa';
		$this->load->view('template',$data);
	}

	public function tambah_penyewa(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('alamat_ktp', 'Alamat KTP', 'trim|required');
			$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
			$this->form_validation->set_rules('alamat_pr', 'Alamat Perusahaan', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('hp', 'No Hp', 'trim|required');

			if($this->form_validation->run() == TRUE) {
				$data = array(
					'nik'			=> $this->input->post('nik'),
					'nm_penyewa'	=> $this->input->post('nama'),
					'alamat_ktp'	=> $this->input->post('alamat_ktp'),
					'nm_perusahaan'	=> $this->input->post('perusahaan'),
					'alamat_perusahaan'	=> $this->input->post('alamat_pr'),
					'nm_jabatan'	=> $this->input->post('jabatan'),
					'no_hp'			=> $this->input->post('hp')
					);
				$cek_data = $this->kelola_user->getDataPenyewaId($data['nik'])->num_rows();
				if(!$cek_data>0){
					$sql = $this->kelola_user->addDataPenyewa($data);
					if ($sql)
					{
						$this->session->set_flashdata('info', 'Registrasi Berhasil!');
						redirect('f_admin/kelola_user/tambah_penyewa','refresh');
					} else{
						$this->session->set_flashdata('info', 'Registrasi Gagal!');
						redirect('f_admin/kelola_user/tambah_penyewa','refresh');
					}
				} else{
					$this->session->set_flashdata('info', 'Registrasi Gagal. NIK telah terdaftar!');
					redirect('f_admin/kelola_user/tambah_penyewa','refresh');
				}
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_user_penyewa_add';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['no']				= 1;
			$data['main_content']	= 'admin/kelola_user_penyewa_add';
			$this->load->view('template',$data);
		}
	}

	public function hapus_penyewa($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('f_admin/kelola_user/penyewa');
		} else{
			$sql = $this->kelola_user->deleteDataPenyewa($id);
			if($sql){
				$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
				redirect('f_admin/kelola_user/penyewa');
			} else{
				$this->session->set_flashdata('info', 'Gagal Hapus Data!');
				redirect('f_admin/kelola_user/penyewa');
			}
		}
	}

	public function edit_penyewa($id=null){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
			$this->form_validation->set_rules('nama', 'Nama Lengkap', 'trim|required|min_length[2]');
			$this->form_validation->set_rules('alamat_ktp', 'Alamat KTP', 'trim|required');
			$this->form_validation->set_rules('perusahaan', 'Perusahaan', 'trim|required');
			$this->form_validation->set_rules('alamat_pr', 'Alamat Perusahaan', 'trim|required');
			$this->form_validation->set_rules('jabatan', 'Jabatan', 'trim|required');
			$this->form_validation->set_rules('hp', 'No Hp', 'trim|required');

			if($this->form_validation->run() == TRUE) {
				$data = array(
					'nik'			=> $this->input->post('nik'),
					'nm_penyewa'	=> $this->input->post('nama'),
					'alamat_ktp'	=> $this->input->post('alamat_ktp'),
					'nm_perusahaan'	=> $this->input->post('perusahaan'),
					'alamat_perusahaan'	=> $this->input->post('alamat_pr'),
					'nm_jabatan'	=> $this->input->post('jabatan'),
					'no_hp'			=> $this->input->post('hp')
					);

				$cek_data = $this->kelola_user->getDataPenyewaId($data['nik'])->num_rows();
				if($id==$data['nik']){
					$sql = $this->kelola_user->updateDataPenyewa($id,$data);
					if($sql)
					{
						$this->session->set_flashdata('info', 'Update Data Berhasil!');
						redirect('f_admin/kelola_user/penyewa','refresh');
					} else{
						$this->session->set_flashdata('info', 'Update Data Gagal!');
						redirect('f_admin/kelola_user/penyewa','refresh');
					}
				}else if(!$cek_data>0){
					$sql = $this->kelola_user->updateDataPenyewa($id,$data);
					if($sql)
					{
						$this->session->set_flashdata('info', 'Update Data Berhasil!');
						redirect('f_admin/kelola_user/penyewa','refresh');
					} else{
						$this->session->set_flashdata('info', 'Update Data Gagal!');
						redirect('f_admin/kelola_user/penyewa','refresh');
					}
				} else{
					$this->session->set_flashdata('info', 'Update Data Gagal. NIK telah terdaftar!');
					redirect('f_admin/kelola_user/edit_penyewa/'.$id,'refresh');
				}
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['data_list']		= $this->kelola_user->getDataPenyewaId($id)->row();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_user_penyewa_edit';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['data_list']		= $this->kelola_user->getDataPenyewaId($id)->row();
			$data['no']				= 1;
			$data['main_content']	= 'admin/kelola_user_penyewa_edit';
			$this->load->view('template',$data);
		}
	}

}

/* End of file Kelola_user.php */
/* Location: ./application/controllers/admin/Kelola_user.php */