<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {
	
	public function __construct(){
		parent::__construct();
		
	}

	function getDataStatus(){
		$this->db->select('status_kendaraan.id_kendaraan','id_kendaraan');
		$this->db->select('status_kendaraan.id_status','id_status');
		$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
		$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
		$this->db->select('status.status_kendaraan','status_kendaraan');
		$this->db->select('status_kendaraan.tgl_update','tgl_update');		
		$this->db->from('status_kendaraan');
		$this->db->join('kendaraan','kendaraan.id=status_kendaraan.id_kendaraan');
		$this->db->join('status','status.id=status_kendaraan.id_status','left');
		$sql = $this->db->get()->result();
		return $sql;
	}

	public function getDataKendaraan($operator=null){
		if(!$operator==null){
			$this->db->where('operator',$operator);
			$sql = $this->db->get('kendaraan')->result();
			return $sql;
		} else{
			$this->db->select('kendaraan.id','id');
			$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
			$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
			$this->db->select('kendaraan.biaya_sewa','biaya_sewa');
			$this->db->select('kendaraan.operator','operator');
			$this->db->select('kendaraan.biaya_sewa','biaya');
			$this->db->select('kendaraan.gambar','gambar');

			$this->db->from('kendaraan');
			$sql = $this->db->get()->result();
			return $sql;
		}
	}


	function getDataBulan($id,$tgl_awal,$tgl_akhir,$jml_hari){
		$query = "SELECT * FROM `status_kendaraan` WHERE `tgl_update` BETWEEN '".$tgl_awal."' AND '".$tgl_akhir."' AND `id_kendaraan`='".$id."'";
		$sql = $this->db->query($query)->result();

		$data = [];
		for($j=1;$j<=$jml_hari;$j++){
			$data['h'.$j] = 1;
		}
		
		if(count($sql)){
			foreach($sql as $dt){
				$date = explode('-',$dt->tgl_update);
				$tgl  = (int)$date[2];
				$lama = $dt->lama;
				for($i=0;$i<$lama;$i++){
					$no = $tgl+$i;
					$data['h'.$no] = 5;
				}
				
			}
		}
		return $data;
	}

	function getDataKinerjaOperator($id,$bln,$tahun){
		$query = "SELECT SUM(`status_kendaraan`.`lama`) as `lama` FROM `status_kendaraan` WHERE MONTH(`status_kendaraan`.`tgl_update`) = '".$bln."' AND YEAR(`status_kendaraan`.`tgl_update`) = '".$tahun."' AND `id_kendaraan`='".$id."' AND `id_status`='5'";
		$sql = $this->db->query($query)->result();
		
		if(count($sql)){
			foreach($sql as $dt){
				if($dt->lama==""){
					$data = 0;
				}else{
					$data = $dt->lama;
				}
			}	
		}
		return $data;
	}

	function getDataPendapatan($id,$bln,$tahun){
		$query = "SELECT SUM(`status_kendaraan`.`lama`) as `lama` FROM `status_kendaraan` WHERE MONTH(`status_kendaraan`.`tgl_update`) = '".$bln."' AND YEAR(`status_kendaraan`.`tgl_update`) = '".$tahun."' AND `id_kendaraan`='".$id."' AND `id_status`='5'";
		$sql = $this->db->query($query)->result();
		
		if(count($sql)){
			foreach($sql as $dt){
				$data = $dt->lama;
			}	
		}
		return $data;
	}

	function getDataMaintenance($id,$bln,$tahun){
		$query = "SELECT SUM(`maintenance`.`nilai`) as `nilai` FROM `maintenance` WHERE MONTH(`maintenance`.`tglawalm`) = '".$bln."' AND YEAR(`maintenance`.`tglakhirm`) = '".$tahun."' AND `id_kendaraan`='".$id."'";
		$sql = $this->db->query($query)->result();
		
		if(count($sql)){
			foreach($sql as $dt){
				if($dt->nilai==""){
					$data = 0;
				}else{
					$data = $dt->nilai;
				}
			}	
		}
		return $data;
	}

	

}

/* End of file M_laporan.php */
/* Location: ./application/models/M_laporan.php */