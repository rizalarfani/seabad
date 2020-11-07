<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_sewa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group(2)){
			redirect('auth');
		}
		$this->load->library('form_validation');
		$this->load->model('penyewa/m_kelola_sewa','kelola_sewa');		
		$this->load->model('m_kelola_alat','kelola_alat');
	}

	public function index()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['request']		= $this->kelola_sewa->getDataRequestSewaId($data['user']->nik);
		$data['sewa']			= $this->kelola_sewa->getDataSewaId($data['user']->nik);
		$data['no']				= 1;
		$data['no2']			= 1;
		$data['main_content']	= 'penyewa/histori_sewa';
		$this->load->view('template',$data);
	}

	public function request(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
			$this->form_validation->set_rules('nm_kendaraan', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal Sewa', 'trim|required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir Sewa', 'trim|required');
			$this->form_validation->set_rules('pemakaian', 'Rencana Pemakaian', 'trim|required');
			$this->form_validation->set_rules('jns_pekerjaan', 'Jenis Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('pendanaan', 'Pendanaan', 'trim|required');

			if($this->form_validation->run() == TRUE) {
				$tgl1 = strtotime($this->input->post('tgl_awal'));
				$tgl2 = strtotime($this->input->post('tgl_akhir'));
				$tgl_awal = date('Y-m-d',$tgl1);
				$tgl_akhir = date('Y-m-d',$tgl2); 
				$data = array(
					'id_penyewa'	=> $this->input->post('nik'),
					'id_kendaraan'	=> $this->input->post('nm_kendaraan'),
					'tgl_awal_sewa'	=> $tgl_awal,
					'tgl_akhir_sewa'=> $tgl_akhir,
					'renc_pemakaian'=> $this->input->post('pemakaian'),
					'jns_pekerjaan'	=> $this->input->post('jns_pekerjaan'),
					'pendanaan'		=> $this->input->post('pendanaan')
					);

				$cek = $this->kelola_alat->checkStatus($data['id_kendaraan'],$tgl_awal);
				if($cek>0){
					$this->session->set_flashdata('info', 'Gagal Tambah Data. Data Sewa Pada Tanggal Tersebut Sudah Ada');
						redirect('f_penyewa/kelola_sewa/request','refresh');
				}else{
					$sql = $this->kelola_sewa->addData($data);
					if($sql)
					{
						$this->session->set_flashdata('info', 'Sukses Tambah Data!');
						redirect('f_penyewa/kelola_sewa/request','refresh');
					} else{
						$this->session->set_flashdata('info', 'Gagal Tambah Data!');
						redirect('f_penyewa/kelola_sewa/request','refresh');
					}
				}
				
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['kendaraan']		= $this->kelola_sewa->getDataAlat();
				$data['main_content']	= 'penyewa/request';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['kendaraan']		= $this->kelola_sewa->getDataAlat();
			$data['main_content']	= 'penyewa/request';
			$this->load->view('template',$data);
		}
	}

	public function hapus_request($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Hapus Data Gagal!');
			redirect('f_penyewa/kelola_sewa','refresh');
		} else{
			$sql = $this->kelola_sewa->deleteRequest($id);
			if($sql){
				$this->session->set_flashdata('info', 'Hapus Data Berhasil!');
				redirect('f_penyewa/kelola_sewa','refresh');
			}else{
				$this->session->set_flashdata('info', 'Hapus Data Gagal!');
				redirect('f_penyewa/kelola_sewa','refresh');
			}
		}
	}

	public function edit_request($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Update Data Gagal!');
			redirect('f_penyewa/kelola_sewa','refresh');
		} else{
			if($this->input->post('submit')==true){
				$this->form_validation->set_rules('nm_kendaraan', 'Nama Lengkap', 'trim|required');
				$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal Sewa', 'trim|required');
				$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir Sewa', 'trim|required');
				$this->form_validation->set_rules('pemakaian', 'Rencana Pemakaian', 'trim|required');
				$this->form_validation->set_rules('jns_pekerjaan', 'Jenis Pekerjaan', 'trim|required');
				$this->form_validation->set_rules('pendanaan', 'Pendanaan', 'trim|required');

				if($this->form_validation->run() == TRUE) {
					$tgl1 = strtotime($this->input->post('tgl_awal'));
					$tgl2 = strtotime($this->input->post('tgl_akhir'));
					$tgl_awal = date('Y-m-d',$tgl1);
					$tgl_akhir = date('Y-m-d',$tgl2); 
					$data = array(
						'id_kendaraan'	=> $this->input->post('nm_kendaraan'),
						'tgl_awal_sewa'	=> $tgl_awal,
						'tgl_akhir_sewa'=> $tgl_akhir,
						'renc_pemakaian'=> $this->input->post('pemakaian'),
						'jns_pekerjaan'	=> $this->input->post('jns_pekerjaan'),
						'pendanaan'		=> $this->input->post('pendanaan')
						);

					$sql = $this->kelola_sewa->updateRequest($id,$data);
					if($sql)
					{
						$this->session->set_flashdata('info', 'Sukses Update Data!');
						redirect('f_penyewa/kelola_sewa','refresh');
					} else{
						$this->session->set_flashdata('info', 'Gagal Update data!');
						redirect('f_penyewa/kelola_sewa','refresh');
					}
					
					
				} else{
					$data['user']			= $this->ion_auth->user()->row();
					$data['kendaraan']		= $this->kelola_sewa->getDataAlat();
					$data['request']		= $this->kelola_sewa->getDataRequestSewaById($id);
					$data['main_content']	= 'penyewa/request_edit';
					$this->load->view('template',$data);
				}
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['kendaraan']		= $this->kelola_sewa->getDataAlat();
				$data['request']		= $this->kelola_sewa->getDataRequestSewaById($id);
				$data['main_content']	= 'penyewa/request_edit';
				$this->load->view('template',$data);
				//print_r($data);
			}
		}
	}

}

/* End of file Kelola_sewa.php */
/* Location: ./application/controllers/f_penyewa/Kelola_sewa.php */