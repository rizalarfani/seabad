<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		
		$this->load->model('m_kelola_alat','m_kelola_alat');
		$this->load->model('m_laporan','laporan');
		$this->load->model('M_kelola_pengaduan');
		
	}

	public function index()
	{

		if (!$this->ion_auth->logged_in()) {
			redirect('auth');
		}

		date_default_timezone_set("Asia/Jakarta");
			$tanggal			= date('Y-m-d');
			$data['tanggal']	= $tanggal;

		$date 	= explode('-', $tanggal);
		$thn   	= $date[0];
		$bln 	= $date[1];
		$hari  	= $date[2];

		$jmlhari			= $this->getJumlahHari($bln,$thn);
		$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
		$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
		$data['data_list']	= $this->laporan->getDataKendaraan();
		$data['pengaduan'] = $this->M_kelola_pengaduan->get_data_pengaduan()->result();

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
				$data['data_list'][$index]->status = $sql['h'];
			}
		}
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['no_pengaduan']				= 1;
		$data['main_content']	= 'admin/home';
		//$this->load->view('home',$data);
		//$this->load->view('home');
		$this->load->view('template',$data);
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
		$sql = $this->laporan->getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari);
		$data['h'] = $sql['h'.$hr];
		return $data;
	}

}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */