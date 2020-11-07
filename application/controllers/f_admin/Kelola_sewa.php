<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kelola_sewa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()){
		// 	redirect('auth');
		// }
		$this->load->library('datatables');
		$this->load->library('form_validation');
		$this->load->model('m_kelola_sewa','kelola_sewa');
		$this->load->model('m_kelola_user','kelola_user');
		$this->load->model('m_kelola_alat','kelola_alat');
	}

	public function index()
	{
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['data_list']		= $this->kelola_sewa->getData();
		$data['main_content']	= 'admin/kelola_sewa';
		$this->load->view('template',$data);
	}

	public function json(){
        header('Content-Type: application/json');
        echo $this->kelola_sewa->json();
	}

	public function json2(){
		header('Content-Type: application/json');
        echo $this->kelola_sewa->json2();
	}

	public function tambah_data(){
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
				$tgl_awal_2 = date_create($tgl_awal);
				$tgl_akhir_2 = date_create($tgl_akhir);
				$lama = date_diff($tgl_awal_2,$tgl_akhir_2);
				$lama = $lama->format('%d');

				$data_status = array(
					'id_kendaraan'	=> $data['id_kendaraan'],
					'id_status'		=> 5,
					'tgl_update'	=> $tgl_awal,
					'lama'			=> $lama+1,
					);
				$cek = $this->kelola_alat->checkStatus($data_status['id_kendaraan'],$data_status['tgl_update']);
				if($cek>0){
					$this->session->set_flashdata('info', 'Gagal Tambah Data. Data Sewa Pada Tanggal Tersebut Sudah Ada');
						redirect('f_admin/kelola_sewa/tambah_data','refresh');
				}else{
					$sql = $this->kelola_sewa->addData($data);
					if($sql)
					{
						$this->kelola_alat->addStatus($data_status);

						$this->session->set_flashdata('info', 'Sukses Tambah Data!');
						redirect('f_admin/kelola_sewa/tambah_data','refresh');
					} else{
						$this->session->set_flashdata('info', 'Gagal Tambah Data!');
						redirect('f_admin/kelola_sewa/tambah_data','refresh');
					}
				}
				
				
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['penyewa']		= $this->kelola_user->getDataPenyewa();
				$data['kendaraan']		= $this->kelola_alat->getData();
				$data['main_content']	= 'admin/kelola_sewa_add';
				$this->load->view('template',$data);
			}
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['penyewa']		= $this->kelola_user->getDataPenyewa();
				$data['kendaraan']		= $this->kelola_alat->getData();
			$data['main_content']	= 'admin/kelola_sewa_add';
			$this->load->view('template',$data);
		}
	}

	public function edit_data($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal!');
			redirect('f_admin/kelola_sewa','refresh');
		} else{
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

					$sql = $this->kelola_sewa->updateData($id,$data);
						if($sql)
						{
							$this->session->set_flashdata('info', 'Sukses Edit Data!');
							redirect('f_admin/kelola_sewa','refresh');
						} else{
							$this->session->set_flashdata('info', 'Gagal Edit Data!');
							redirect('f_admin/kelola_sewa','refresh');
						}
					
					
				} else{
					$data['user']			= $this->ion_auth->user()->row();
					$data['sewa']			= $this->kelola_sewa->getDataId($id);
					$data['penyewa']		= $this->kelola_user->getDataPenyewa();
					$data['kendaraan']		= $this->kelola_alat->getData();
					$data['main_content']	= 'admin/kelola_sewa_edit';
					$this->load->view('template',$data);
				}
			} else{
				$data['user']			= $this->ion_auth->user()->row();
				$data['sewa']			= $this->kelola_sewa->getDataId($id);
				$data['penyewa']		= $this->kelola_user->getDataPenyewa();
					$data['kendaraan']		= $this->kelola_alat->getData();
				$data['main_content']	= 'admin/kelola_sewa_edit';
				$this->load->view('template',$data);
			}
		}
		
	}

	public function hapus_data($id=null,$id_kendaraan=null,$tgl=null){
		if($id==null || $id_kendaraan==null || $tgl==null){
			$this->session->set_flashdata('info', 'Edit Data Gagal!');
			redirect('f_admin/kelola_sewa','refresh');
		} else{
			$sql = $this->kelola_sewa->deleteData($id);
			
			if($sql){
				$tgl2 = date('Y-m-d',strtotime($tgl));
				$sql = $this->kelola_alat->deleteStatus($id_kendaraan,$tgl2);
				$this->session->set_flashdata('info', 'Sukses Hapus Data!');
				redirect('f_admin/kelola_sewa','refresh');
			} else{
				$this->session->set_flashdata('info', 'Gagal Hapus Data!');
				redirect('f_admin/kelola_sewa','refresh');
			}
		}
	}

	public function confirm($id=null){
		if($id==null){
			$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Gagal!');
			redirect('f_admin/kelola_sewa','refresh');
		} else{
			$sql = $this->kelola_sewa->getDataRequestById($id);
			$data = array(
					'id_penyewa'	=> $sql->id_penyewa,
					'id_kendaraan'	=> $sql->id_kendaraan,
					'tgl_awal_sewa'	=> $sql->tgl_awal_sewa,
					'tgl_akhir_sewa'=> $sql->tgl_akhir_sewa,
					'renc_pemakaian'=> $sql->renc_pemakaian,
					'jns_pekerjaan'	=> $sql->jns_pekerjaan,
					'pendanaan'		=> $sql->pendanaan,
					);
			$tgl_awal_2 = date_create($sql->tgl_awal_sewa);
			$tgl_akhir_2 = date_create($sql->tgl_akhir_sewa);
			$lama = date_diff($tgl_awal_2,$tgl_akhir_2);
			$lama = $lama->format('%d');

			$data_status = array(
				'id_kendaraan'	=> $data['id_kendaraan'],
				'id_status'		=> 5,
				'tgl_update'	=> $sql->tgl_awal_sewa,
				'lama'			=> $lama+1,
				);

			$cek = $this->kelola_alat->checkStatus($data_status['id_kendaraan'],$data_status['tgl_update']);
			if($cek>0){
					$this->session->set_flashdata('info', 'Gagal Tambah Data. Data Sewa Pada Tanggal Tersebut Sudah Ada');
						redirect('f_admin/kelola_sewa/tambah_data','refresh');
			}else{
				$sql2 = $this->kelola_sewa->addData($data);
				if($sql2){
					$sql3 = $this->kelola_sewa->updateStatusRequest($id);
					$this->kelola_alat->addStatus($data_status);
					
					if($sql3){
						$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Berhasil!');
						redirect('f_admin/kelola_sewa','refresh');
					}else{
						$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Gagal!');
						redirect('f_admin/kelola_sewa','refresh');
					}
				}else{
					$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Gagal!');
					redirect('f_admin/kelola_sewa','refresh');
				}
			}

			/*$sql2 = $this->kelola_sewa->addData($data);
			if($sql2){
				$sql3 = $this->kelola_sewa->updateStatusRequest($id);
				$this->kelola_alat->addStatus($data_status);
				
				if($sql3){
					$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Berhasil!');
					redirect('f_admin/kelola_sewa','refresh');
				}else{
					$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Gagal!');
					redirect('f_admin/kelola_sewa','refresh');
				}
			}else{
				$this->session->set_flashdata('infoRequest', 'Konfirmasi Data Gagal!');
				redirect('f_admin/kelola_sewa','refresh');
			}*/
		}
	}

	public function print_sk($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Print SK Gagal!');
			redirect('f_admin/kelola_sewa','refresh');
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['data_list']		= $this->kelola_sewa->getDataId($id);
			$data['main_content']	= 'admin/laporan/cetak_sk';

			//$this->load->view($data['main_content'],$data);

			$this->load->library('pdf');
			$filename = "Kontrak Sewa Alat Berat";
			$html = $this->load->view($data['main_content'],$data,TRUE);
			$this->pdf->createPortrait($html, $filename);
		}
	}

	public function print_spk($id=null){
		if($id==null){
			$this->session->set_flashdata('info', 'Print SPK Gagal!');
			redirect('f_admin/kelola_sewa','refresh');
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['data_list']		= $this->kelola_sewa->getDataId($id);
			$data['main_content']	= 'admin/laporan/cetak_spk';

			//$this->load->view($data['main_content'],$data);

			$this->load->library('pdf');
			$filename = "Surat Perintah Tugas";
			$html = $this->load->view($data['main_content'],$data,TRUE);
			$this->pdf->createPortrait($html, $filename);
		}
	}

}

/* End of file Kelola_sewa.php */
/* Location: ./application/controllers/admin/Kelola_sewa.php */