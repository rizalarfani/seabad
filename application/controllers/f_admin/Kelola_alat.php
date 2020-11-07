<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_alat extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
			 redirect ('auth/login');
		}
		$this->load->model('M_kelola_alat','kelola_alat');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->kelola_alat->getData();
		$data['no']				= 1;
		$data['main_content']	= 'admin/kelola_alat';
		$this->load->view('template',$data);
	}

	public function addAlat(){
		$this->form_validation->set_rules('nm_kendaraan', 'Nama Kendaraan', 'trim|required|min_length[2]');
		$this->form_validation->set_rules('jns_kendaraan', 'Jenis Kendaraan', 'trim|required');
		$this->form_validation->set_rules('biaya_sewa', 'Biaya Sewa', 'trim|required');
		$this->form_validation->set_rules('operator', 'Operator', 'trim|required');
		if ($this->form_validation->run() == TRUE) {
			$data = array(
				'nm_kendaraan' => $this->input->post('nm_kendaraan'),
				'jns_kendaraan' => $this->input->post('jns_kendaraan'),
				'biaya_sewa' => $this->input->post('biaya_sewa'),
				'operator' => $this->input->post('operator'),
				'gambar' => $this->upload()
				);
			$sql = $this->kelola_alat->addData($data);
			if($sql){
				$this->session->set_flashdata('infoAdd', 'Sukses Tambah Data!');
				redirect('f_admin/kelola_alat','refresh');
			} else{
				$this->session->set_flashdata('infoAdd', 'Gagal Tambah Data!');
				redirect('f_admin/kelola_alat','refresh');
			}
		} else {
			$this->index();
		}
	}

	

	function deleteAlat($id=null){
		$data['data_list']		= $this->kelola_alat->getDataId($id);
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('f_admin/kelola_alat','refresh');
		} else{

			$path = 'assets/img/alat_berat/';
			$foto = $data['data_list']->gambar;
			@unlink($path.$foto);

			$sql = $this->kelola_alat->deleteData($id);
			if($sql){
				$this->session->set_flashdata('info', 'Sukses Hapus Alat!');
				redirect('f_admin/kelola_alat','refresh');
			} else{
				$this->session->set_flashdata('info', 'Gagal Hapus Alat!');
				redirect('f_admin/kelola_alat','refresh');
			}
		}

	}

	function editAlat($id=null){
		$data['data_list']		= $this->kelola_alat->getDataId($id);
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Edit Data!');
			redirect('f_admin/kelola_alat','refresh');
		} else{
			if($this->input->post('submit')==true){
				$this->form_validation->set_rules('nm_kendaraan', 'Nama Kendaraan', 'trim|required|min_length[2]');
				$this->form_validation->set_rules('jns_kendaraan', 'Jenis Kendaraan', 'trim|required');
				$this->form_validation->set_rules('biaya_sewa', 'Biaya Sewa', 'trim|required');
				$this->form_validation->set_rules('operator', 'Operator', 'trim|required');

				if ($this->form_validation->run() == TRUE) {

					if ( !empty($_FILES['upload']['name'])) {
						$upload = $this->upload();
						$path = 'assets/img/alat_berat/';
						$fota_lama = $data['data_list']->gambar;
						@unlink($path.$fota_lama);
					} else {
						$upload = $data['data_list']->gambar;
					}

					$data = array(
						'nm_kendaraan' => $this->input->post('nm_kendaraan'),
						'jns_kendaraan' => $this->input->post('jns_kendaraan'),
						'biaya_sewa' => $this->input->post('biaya_sewa'),
						'operator' => $this->input->post('operator'),
						'gambar' => $upload
						);
					$sql = $this->kelola_alat->updateData($id,$data);
					if($sql){
						$this->session->set_flashdata('info', 'Sukses Update Data!');
						redirect('f_admin/kelola_alat','refresh');
					} else{
						$this->session->set_flashdata('info', 'Gagal Tambah Data!');
						redirect('f_admin/kelola_alat','refresh');
					}
				} else {
					$data['user']			= $this->ion_auth->user()->row();
					$data['data_list']		= $this->kelola_alat->getDataId($id);
					$data['main_content']	= 'admin/kelola_alat_edit';
					$this->load->view('template',$data);
				}
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['data_list']		= $this->kelola_alat->getDataId($id);
				$data['main_content']	= 'admin/kelola_alat_edit';
				$this->load->view('template',$data);
			}
		}
		
	}

	public function status_alat(){
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['list_kendaraan']	= $this->kelola_alat->getData();
		$data['list_status']	= $this->kelola_alat->getListStatus();
		$data['data_list']		= $this->kelola_alat->getDataStatus();
		$data['main_content']	= 'admin/status_alat';
		$this->load->view('template',$data);
	}

	public function addStatus(){
		
		$this->form_validation->set_rules('nm_kendaraan', 'Nama Kendaraan', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('tgl', 'Tanggal', 'trim|required');
		$this->form_validation->set_rules('lama', 'Lama Sewa', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$tgl = strtotime($this->input->post('tgl'));
			$tgl1 = date('Y-m-d',$tgl);
			$data = array(
				'id_kendaraan'	=> $this->input->post('nm_kendaraan'),
				'id_status'		=> $this->input->post('status'),
				'tgl_update'	=> $tgl1,
				'lama'			=> $this->input->post('lama'),
				);
			$cek = $this->kelola_alat->checkStatus($data['id_kendaraan'],$data['tgl_update']);
			if($cek>0){
				$this->session->set_flashdata('infoAdd', 'Gagal Tambah Data, Status Sudah Ada!');
				redirect('f_admin/kelola_alat/status_alat','refresh');
			} else{
				$sql = $this->kelola_alat->addStatus($data);
				if($sql){
					$this->session->set_flashdata('infoAdd', 'Berhasil Tambah Data!');
					redirect('f_admin/kelola_alat/status_alat','refresh');
				}else{
					$this->session->set_flashdata('infoAdd', 'Gagal Tambah Data!');
					redirect('f_admin/kelola_alat/status_alat','refresh');
				}
			}
			
		} else {
			$this->session->set_flashdata('infoAdd', 'Gagal Tambah Data. Isi Data Form dengan Benar!');
			$this->status_alat();
		}
		
	}

	public function deleteStatus($id=null,$tgl=null){
		if($id==null || $tgl==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('f_admin/kelola_alat/status_alat');
		} else{
			$sql = $this->kelola_alat->deleteStatus($id,$tgl);
			if($sql){
				$this->session->set_flashdata('info', 'Berhasil Hapus Data!');
				redirect('f_admin/kelola_alat/status_alat');
			}else{
				$this->session->set_flashdata('info', 'Gagal Hapus Data!');
				redirect('f_admin/kelola_alat/status_alat');
			}
		}
	}

	public function maintenance(){
		$data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->kelola_alat->getDataMaintenance();
		$data['no']				= 1;
		$data['main_content']	= 'admin/kelola_alat_maintenance';
		$this->load->view('template',$data);
	}

	public function tambah_maintenance(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('nm_kendaraan', 'Nama Kendaraan', 'trim|required');
			$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
			$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');
			$this->form_validation->set_rules('bengkel', 'Bengkel', 'trim|required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
			$this->form_validation->set_rules('jns_rusak', 'Jenis Rusak', 'trim|required');
			$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

			if($this->form_validation->run() == TRUE) {
				$tgl1 = strtotime($this->input->post('tgl_awal'));
				$tgl2 = strtotime($this->input->post('tgl_akhir'));
				$tgl_awal = date('Y-m-d',$tgl1);
				$tgl_akhir = date('Y-m-d',$tgl2); 
				$data = array(
					'id_kendaraan'	=> $this->input->post('nm_kendaraan'),
					'tglawalm'	=> $tgl_awal,
					'tglakhirm'	=> $tgl_akhir,
					'bengkel'	=> $this->input->post('bengkel'),
					'alamat'	=> $this->input->post('alamat'),
					'jenisrusak'	=> $this->input->post('jns_rusak'),
					'nilai'			=> $this->input->post('nilai')
					);

				$tgl_awal_2 = date_create($tgl_awal);
				$tgl_akhir_2 = date_create($tgl_akhir);
				$lama = date_diff($tgl_awal_2,$tgl_akhir_2);
				$lama = $lama->format('%d');

				$data_status = array(
					'id_kendaraan'	=> $data['id_kendaraan'],
					'id_status'		=> 2,
					'tgl_update'	=> $tgl_awal,
					'lama'			=> $lama+1,
					);
				$cek = $this->kelola_alat->checkStatusMaintenance($data_status['id_kendaraan'],$data_status['tgl_update']);
				if($cek>0){
					$this->session->set_flashdata('info', 'Gagal Tambah Data. Data Maintenance Pada Tanggal Tersebut Sudah Ada');
						redirect('f_admin/kelola_alat/tambah_maintenance','refresh');
				}else{
					$sql = $this->kelola_alat->addDataMaintenance($data);
					if($sql)
					{
						$this->kelola_alat->addStatus($data_status);
						
						$this->session->set_flashdata('info', 'Tambah Data Berhasil!');
						redirect('f_admin/kelola_alat/tambah_maintenance','refresh');
					} else{
						$this->session->set_flashdata('info', 'Tambah Data Gagal!');
						redirect('f_admin/kelola_alat/tambah_maintenance','refresh');
					}
				}
				
				
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['kendaraan']		= $this->kelola_alat->getData();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_alat_maintenance_add';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['kendaraan']		= $this->kelola_alat->getData();
			$data['no']				= 1;
			$data['main_content']	= 'admin/kelola_alat_maintenance_add';
			$this->load->view('template',$data);
		}
	}

	public function edit_maintenance($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal!');
			redirect('f_admin/kelola_alat/maintenance','refresh');
		} else{
			if($this->input->post('submit')==true){
				$this->form_validation->set_rules('nm_kendaraan', 'Nama Kendaraan', 'trim|required');
				$this->form_validation->set_rules('tgl_awal', 'Tanggal Awal', 'trim|required');
				$this->form_validation->set_rules('tgl_akhir', 'Tanggal Akhir', 'trim|required');
				$this->form_validation->set_rules('bengkel', 'Bengkel', 'trim|required');
				$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
				$this->form_validation->set_rules('jns_rusak', 'Jenis Rusak', 'trim|required');
				$this->form_validation->set_rules('nilai', 'Nilai', 'trim|required');

				if($this->form_validation->run() == TRUE) {
					$tgl1 = strtotime($this->input->post('tgl_awal'));
					$tgl2 = strtotime($this->input->post('tgl_akhir'));
					$tgl_awal = date('Y-m-d',$tgl1);
					$tgl_akhir = date('Y-m-d',$tgl2); 
					$data = array(
						'id_kendaraan'	=> $this->input->post('nm_kendaraan'),
						'tglawalm'	=> $tgl_awal,
						'tglakhirm'	=> $tgl_akhir,
						'bengkel'	=> $this->input->post('bengkel'),
						'alamat'	=> $this->input->post('alamat'),
						'jenisrusak'	=> $this->input->post('jns_rusak'),
						'nilai'			=> $this->input->post('nilai')
						);
					
					$sql = $this->kelola_alat->updateDataMaintenance($id,$data);
						if($sql)
						{
							$this->session->set_flashdata('info', 'Edit Data Berhasil!');
							redirect('f_admin/kelola_alat/maintenance','refresh');
						} else{
							$this->session->set_flashdata('info', 'Edit Data Gagal!');
							redirect('f_admin/kelola_alat/maintenance','refresh');
						}
					
				} else{
					$data['user']			= $this->ion_auth->user()->row();
					$data['data_list']		= $this->kelola_alat->getDataMaintenanceId($id);
					$data['kendaraan']		= $this->kelola_alat->getData();
					$data['no']				= 1;
					$data['main_content']	= 'admin/kelola_alat_maintenance_edit';
					$this->load->view('template',$data);
				}
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['data_list']		= $this->kelola_alat->getDataMaintenanceId($id);
				$data['kendaraan']		= $this->kelola_alat->getData();
				$data['no']				= 1;
				$data['main_content']	= 'admin/kelola_alat_maintenance_edit';
				$this->load->view('template',$data);
			}
		}
	}

	public function hapus_maintenance($id){
		if($id==null){
			$this->session->set_flashdata('info', 'Gagal Hapus Data!');
			redirect('f_admin/kelola_alat/maintenance','refresh');
		} else{
			$sql = $this->kelola_alat->deleteDataMaintenance($id);
			if($sql){
				$this->session->set_flashdata('info', 'Sukses Hapus Data!');
				redirect('f_admin/kelola_alat/maintenance','refresh');
			} else{
				$this->session->set_flashdata('info', 'Gagal Hapus Data!');
				redirect('f_admin/kelola_alat/maintenance','refresh');
			}
		}
	}


	private function upload ()
	{
		
		$config['upload_path'] = 'assets/img/alat_berat/';
		$config['allowed_types'] = 'JPEG|jpg|png';
		$config['file_name'] = round(microtime(true)*1000);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('upload')){
			$error = array('error' => $this->upload->display_errors());
			redirect ('f_admin/kelola_alat');
		}
		
		return $this->upload->data('file_name');

	}



}

/* End of file Kelola_alat.php */
/* Location: ./application/controllers/admin/Kelola_alat.php */