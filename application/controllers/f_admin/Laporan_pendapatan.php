<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pendapatan extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		// if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() && !$this->ion_auth->in_group(3)){
		// 	redirect('auth');
		// }
		$this->load->library('form_validation');
		$this->load->model('m_laporan_pendapatan','laporan');
	}

	public function index()
	{
		$this->pendapatan_per_alat();
	}

	public function pendapatan_per_alat(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('alat', 'Nama Alat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$alat = $this->input->post('alat');
			} else {
				$alat = "";
			}
			
		}else{
			$alat = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['kendaraan']		= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($alat);
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
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_pendapatan_per_alat';
		$this->load->view('template',$data);
	}

	public function getDataPendapatan($id=null,$bln=null,$tahun=null){
		$sql = $this->laporan->getDataPendapatan($id,$bln,$tahun);
		return $sql;
	}

	public function cetak_pendapatan_per_alat(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('alat', 'Nama Alat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$alat = $this->input->post('alat');
			} else {
				$alat = "";
			}
			
		}else{
			$alat = $this->input->post('alat');
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['kendaraan']		= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($alat);

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bln1 = $this->getDataPendapatan($dt->id,1,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln2 = $this->getDataPendapatan($dt->id,2,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln3 = $this->getDataPendapatan($dt->id,3,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln4 = $this->getDataPendapatan($dt->id,4,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln5 = $this->getDataPendapatan($dt->id,5,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln6 = $this->getDataPendapatan($dt->id,6,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln7 = $this->getDataPendapatan($dt->id,7,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln8 = $this->getDataPendapatan($dt->id,8,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln9 = $this->getDataPendapatan($dt->id,9,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln10 = $this->getDataPendapatan($dt->id,10,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln11 = $this->getDataPendapatan($dt->id,11,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln12 = $this->getDataPendapatan($dt->id,12,$tahun) * $dt->biaya_sewa;
			}
		}
		$data['tahun']			= $tahun;
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan/cetak_laporan_pendapatan_per_alat';

		$this->load->library('pdf');
		$filename = "Laporan_Pendapatan_Per_Alat";
		$html = $this->load->view($data['main_content'],$data,TRUE);
		$this->pdf->create($html, $filename);
	}



	public function getDataPendapatanJenisAlat($jns=null,$bln,$tahun=null){
		$sql = $this->laporan->getDataPendapatanJenisAlat($jns,$bln,$tahun);
		return $sql;
	}

	public function pendapatan_per_jenis_alat(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('jenisalat', 'Nama Alat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$jenis_alat = $this->input->post('jenisalat');
			} else {
				$jenis_alat = "";
			}
			
		}else{
			$jenis_alat = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['jenis']		= $this->laporan->getDataJenisKendaraan();
		$data['data_list']	= $this->laporan->getDataJenisKendaraan($jenis_alat);
		$bulan 		= array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bulan = $bulan;
				for($i=0; $i<count($bulan); $i++){
					$data['data_list'][$index]->bulan[$i] = new StdClass;
					$data['data_list'][$index]->bulan[$i]->nama_bulan = $bulan[$i];
					$data['data_list'][$index]->bulan[$i]->total_perbulan = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,($i+1),$tahun) * $dt->biaya_sewa;
				}
			}
		}

		
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_pendapatan_per_jenis_alat';
		$this->load->view('template',$data);
	}

	public function cetak_pendapatan_per_jenis_alat(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('jenisalat', 'Nama Alat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$jenis_alat = $this->input->post('jenisalat');
			} else {
				$jenis_alat = "";
			}
			
		}else{
			$jenis_alat = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['jenis']		= $this->laporan->getDataJenisKendaraan();
		$data['data_list']	= $this->laporan->getDataJenisKendaraan($jenis_alat);

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bln1 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,1,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln2 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,2,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln3 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,3,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln4 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,4,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln5 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,5,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln6 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,6,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln7 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,7,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln8 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,8,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln9 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,9,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln10 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,10,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln11 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,11,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln12 = $this->getDataPendapatanJenisAlat($dt->jns_kendaraan,12,$tahun) * $dt->biaya_sewa;
			}
		}
		$data['tahun']			= $tahun;
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan/cetak_laporan_pendapatan_per_jenis_alat';

		$this->load->library('pdf');
		$filename = "Laporan_Pendapatan_Per_Jenis_Alat";
		$html = $this->load->view($data['main_content'],$data,TRUE);
		$this->pdf->create($html, $filename);

	}

	public function pendapatan_semua_alat(){
		$alat="";	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['kendaraan']		= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($alat);
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
		
		$data['user']			= $this->ion_auth->user()->row();
		$data['group']			= $this->ion_auth->get_users_groups()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan_pendapatan_semua_alat';
		$this->load->view('template',$data);
	}

	public function cetak_pendapatan_semua_alat(){
		if($this->input->post('submit')==true){
			$this->form_validation->set_rules('alat', 'Nama Alat', 'required');
			if ($this->form_validation->run() == TRUE) {
				$alat = $this->input->post('alat');
			} else {
				$alat = "";
			}
			
		}else{
			$alat = "";
		}	

		date_default_timezone_set("Asia/Jakarta");
		$tahun   	= date('Y');
		$data['kendaraan']		= $this->laporan->getDataKendaraan();
		$data['data_list']	= $this->laporan->getDataKendaraan($alat);

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$data['data_list'][$index]->bln1 = $this->getDataPendapatan($dt->id,1,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln2 = $this->getDataPendapatan($dt->id,2,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln3 = $this->getDataPendapatan($dt->id,3,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln4 = $this->getDataPendapatan($dt->id,4,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln5 = $this->getDataPendapatan($dt->id,5,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln6 = $this->getDataPendapatan($dt->id,6,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln7 = $this->getDataPendapatan($dt->id,7,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln8 = $this->getDataPendapatan($dt->id,8,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln9 = $this->getDataPendapatan($dt->id,9,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln10 = $this->getDataPendapatan($dt->id,10,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln11 = $this->getDataPendapatan($dt->id,11,$tahun) * $dt->biaya_sewa;
				$data['data_list'][$index]->bln12 = $this->getDataPendapatan($dt->id,12,$tahun) * $dt->biaya_sewa;
			}
		}
		$data['tahun']			= $tahun;
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'admin/laporan/cetak_laporan_pendapatan_semua_alat';

		$this->load->library('pdf');
		$filename = "Laporan_Pendapatan_Semua_Jenis_Alat";
		$html = $this->load->view($data['main_content'],$data,TRUE);
		$this->pdf->create($html, $filename);
	}


}

/* End of file Laporan_pendapatan.php */
/* Location: ./application/controllers/admin/Laporan_pendapatan.php */