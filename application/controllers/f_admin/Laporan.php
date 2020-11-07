<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() && !$this->ion_auth->in_group(3)){
		// 	redirect('auth');
		// }
		$this->load->library('form_validation');
		$this->load->model('m_laporan','laporan');
		$this->load->model('m_laporan_pendapatan','laporan_pendapatan');
	}

	public function index()
	{
		$data['user']			= $this->ion_auth->user()->row();
	}

	public function status_alat_berat(){
		if($this->input->post('submit')==true){
			$tanggal = date('Y-m-d',strtotime($this->input->post('tgl')));
			$data['tanggal']		= $tanggal;
		}else{
			date_default_timezone_set("Asia/Jakarta");
			$tanggal			= date('Y-m-d');
			$data['tanggal']	= $tanggal;
		}

		$date 	= explode('-', $tanggal);
		$thn   	= $date[0];
		$bln 	= $date[1];
		$hari  	= $date[2];

		$jmlhari			= $this->getJumlahHari($bln,$thn);
		$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
		$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
		$data['data_list']	= $this->laporan->getDataKendaraan();

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
				$data['data_list'][$index]->status = $sql['h'];
			}
		}
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_status_alat';
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

	public function getDataBulan($id=null,$tgl_awal=null,$tgl_akhir=null,$jmlhari=null,$hari=null){
		$hr = (int)$hari;
		$sql = $this->laporan->getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari);
		$data['h'] = $sql['h'.$hr];
		return $data;
	}

	public function kinerja_operator(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('operator', 'Operator', 'required');
			if ($this->form_validation->run() == TRUE) {
				$operator = $this->input->post('operator');
			} else {
				$operator = "";
			}
			
		}else{
			$operator = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['operator']	= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($operator);
		$bulan 		= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bulan = $bulan;
				for($i=0; $i<count($bulan); $i++){
					$data['data_list'][$index]->bulan[$i] = new StdClass;
					$data['data_list'][$index]->bulan[$i]->nama_bulan = $bulan[$i];
					$data['data_list'][$index]->bulan[$i]->total_perbulan = $this->getDataKinerjaOperator($dt->id,($i+1),$tahun);
				}
			}
		}
		echo json_encode($data['data_list']);die;
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_kinerja_operator';
		$this->load->view('template',$data);
	}

	public function getDataKinerjaOperator($id=null,$bln=null,$tahun=null){
		$sql = $this->laporan->getDataKinerjaOperator($id,$bln,$tahun);
		return $sql;
	}

	public function cetak_kinerja_operator(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('operator', 'Operator', 'required');
			if ($this->form_validation->run() == TRUE) {
				$operator = $this->input->post('operator');
			} else {
				$operator = "";
			}
			
		}else{
			$operator = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['operator']	= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($operator);

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bln1 = $this->getDataKinerjaOperator($dt->id,1,$tahun);
				$data['data_list'][$index]->bln2 = $this->getDataKinerjaOperator($dt->id,2,$tahun);
				$data['data_list'][$index]->bln3 = $this->getDataKinerjaOperator($dt->id,3,$tahun);
				$data['data_list'][$index]->bln4 = $this->getDataKinerjaOperator($dt->id,4,$tahun);
				$data['data_list'][$index]->bln5 = $this->getDataKinerjaOperator($dt->id,5,$tahun);
				$data['data_list'][$index]->bln6 = $this->getDataKinerjaOperator($dt->id,6,$tahun);
				$data['data_list'][$index]->bln7 = $this->getDataKinerjaOperator($dt->id,7,$tahun);
				$data['data_list'][$index]->bln8 = $this->getDataKinerjaOperator($dt->id,8,$tahun);
				$data['data_list'][$index]->bln9 = $this->getDataKinerjaOperator($dt->id,9,$tahun);
				$data['data_list'][$index]->bln10 = $this->getDataKinerjaOperator($dt->id,10,$tahun);
				$data['data_list'][$index]->bln11 = $this->getDataKinerjaOperator($dt->id,11,$tahun);
				$data['data_list'][$index]->bln12 = $this->getDataKinerjaOperator($dt->id,12,$tahun);
			}
		}
		$data['tahun']			= $tahun;
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan/cetak_laporan_kinerja_operator';

		$this->load->library('pdf');
		$filename = "Laporan_Kinerja_Operator";
		$html = $this->load->view($data['main_content'],$data,TRUE);
		$this->pdf->create($html, $filename);
	}

	public function spj_vs_pendapatan(){
		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');

		$data['data_list']	= $this->laporan->getDataKendaraan();
		$bulan 		= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bulan = $bulan;
				for($i=0; $i<count($bulan); $i++){
					$data['data_list'][$index]->bulan[$i] = new StdClass;
					$data['data_list'][$index]->bulan[$i]->nama_bulan = $bulan[$i];
					$data['data_list'][$index]->bulan[$i]->total_perbulan = $this->getDataPendapatan($dt->id,($i+1),$tahun) * $dt->biaya_sewa;
				}
			}
		}

		$data['data_list2'] = $this->laporan->getDataKendaraan();
		if(count($data['data_list2'])){
			foreach($data['data_list2'] as $index => $dt){
				$data['data_list2'][$index]->bulan = $bulan;
				for($i=0; $i<count($bulan); $i++){
					$data['data_list2'][$index]->bulan[$i] = new StdClass;
					$data['data_list2'][$index]->bulan[$i]->nama_bulan = $bulan[$i];
					$data['data_list2'][$index]->bulan[$i]->total_perbulan = $this->getDataMaintenance($dt->id,($i+1),$tahun);
				}
			}
		}
		
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_spj_vs_pendapatan';
		$this->load->view('template',$data);
	}

	public function getDataMaintenance($id=null,$bln=null,$tahun=null){
		$sql = $this->laporan->getDataMaintenance($id,$bln,$tahun);
		return $sql;
	}

	public function getDataPendapatan($id=null,$bln,$tahun=null){
		$sql = $this->laporan->getDataPendapatan($id,$bln,$tahun);
		return $sql;
	}

	public function cetak_spj(){
		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');

		$data['data_list']	= $this->laporan->getDataKendaraan();
		$bulan 		= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");


		$data['data_list'] = $this->laporan->getDataKendaraan();
		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bln1 = $this->getDataMaintenance($dt->id,1,$tahun);	
				$data['data_list'][$index]->bln2 = $this->getDataMaintenance($dt->id,2,$tahun);	
				$data['data_list'][$index]->bln3 = $this->getDataMaintenance($dt->id,3,$tahun);	
				$data['data_list'][$index]->bln4 = $this->getDataMaintenance($dt->id,4,$tahun);	
				$data['data_list'][$index]->bln5 = $this->getDataMaintenance($dt->id,5,$tahun);	
				$data['data_list'][$index]->bln6 = $this->getDataMaintenance($dt->id,6,$tahun);
				$data['data_list'][$index]->bln7 = $this->getDataMaintenance($dt->id,7,$tahun);	
				$data['data_list'][$index]->bln8 = $this->getDataMaintenance($dt->id,8,$tahun);	
				$data['data_list'][$index]->bln9 = $this->getDataMaintenance($dt->id,9,$tahun);	
				$data['data_list'][$index]->bln10 = $this->getDataMaintenance($dt->id,10,$tahun);	
				$data['data_list'][$index]->bln11 = $this->getDataMaintenance($dt->id,11,$tahun);	
				$data['data_list'][$index]->bln12 = $this->getDataMaintenance($dt->id,12,$tahun);		
				
			}
		}
		
		$data['tahun']			= $tahun;
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan/cetak_laporan_spj';
		$this->load->view($data['main_content'],$data);

		$this->load->library('pdf');
		$filename = "Laporan_SPJ";
		$html = $this->load->view($data['main_content'],$data,TRUE);
		$this->pdf->create($html, $filename);
	}

}

/* End of file Laporan.php */
/* Location: ./application/controllers/admin/Laporan.php */