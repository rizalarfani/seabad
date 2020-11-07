<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umum extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('m_umum','umum');
	}

	public function index()
	{
		
	}

	public function cekStatus2(){
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		if ($this->form_validation->run() == TRUE) {
			$tgl = strtotime($this->input->post('tgl'));
			$new_tgl = date('Y-m-d',$tgl);

			$data['data_list']	= $this->umum->getStatus($new_tgl);
			$data['no']			= 1;
			$this->load->view('cek_status',$data);
		} else {
			$this->load->view('home');
		}
	}

	public function registrasi(){
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
			$cek_data = $this->umum->getDataPenyewaId($data['nik'])->num_rows();
			if(!$cek_data>0){
				$sql = $this->umum->addDataPenyewa($data);
				if ($sql)
				{
					$this->session->set_flashdata('info', 'Registrasi Berhasil!');
					redirect('home');
				} else{
					$this->session->set_flashdata('info', 'Registrasi Gagal!');
					redirect('home');
				}
			} else{
				$this->session->set_flashdata('info', 'Registrasi Gagal. NIK telah terdaftar!');
				redirect('home');
			}
			
		} else{
			$data['user']			= $this->ion_auth->user()->row();
			$data['no']				= 1;
			$data['main_content']	= 'home';
			$this->load->view('template',$data);
		}
	}

	public function cekStatus(){
		$this->form_validation->set_rules('tgl', 'Tanggal', 'required');
		if ($this->form_validation->run() == TRUE) {
			$tgl = $this->input->post('tgl');
			$new_tgl = date('Y-m-d',strtotime($tgl));

			$date 	= explode('-', $new_tgl);
			$thn   	= $date[0];
			$bln 	= $date[1];
			$hari  	= $date[2];

			$jmlhari			= $this->getJumlahHari($bln,$thn);
			$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
			$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
			$data['data_list']	= $this->umum->getDataKendaraan();

			if(count($data['data_list'])){
				foreach($data['data_list'] as $index => $dt){
					$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
					$data['data_list'][$index]->h1 = $sql['h1'];
					$data['data_list'][$index]->h2 = $sql['h2'];
					$data['data_list'][$index]->h3 = $sql['h3'];
					$data['data_list'][$index]->h4 = $sql['h4'];
					$data['data_list'][$index]->h5 = $sql['h5'];
				}
			}
			$data['tanggal']	= $new_tgl;
			$data['no']			= 1;
			$this->load->view('cek_status',$data);
		} else {
			$this->load->view('home');
		}
	}

	public function getJumlahHari($bln=null,$thn=null){
		if($bln==null){
			return 0;
		} else{
			if($bln=="01"){
				return 31;
			} else if($bln=="02"){
				$cek = $thn % 4;
				if($cek==0){
					return 29;
				} else{
					return 28;
				}
			} else if($bln=="03"){
				return 31;
			} else if($bln=="04"){
				return 30;
			} else if($bln=="05"){
				return 31;
			} else if($bln=="06"){
				return 30;
			} else if($bln=="07"){
				return 31;
			} else if($bln=="08"){
				return 31;
			} else if($bln=="09"){
				return 30;
			} else if($bln=="10"){
				return 31;
			} else if($bln=="11"){
				return 30;
			} else{
				return 31;
			}
		}
	}

	public function getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari,$hari){
		$hr = (int)$hari;
		$sql = $this->umum->getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari);
		$data = [];
		for($i=1;$i<=5;$i++){
			$no = $hr+$i-1;
			if($no<=$jmlhari){
				$data['h'.$i] = $sql['h'.$no];
			}else{
				$data['h'.$i] = "";
			}
			
		}
		return $data;
	}

}

/* End of file Umum.php */
/* Location: ./application/controllers/umum/Umum.php */