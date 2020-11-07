<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_umum extends CI_Model {

	function getDataPenyewaId($id){
		$this->db->where('nik',$id);
		$sql = $this->db->get('penyewa');
		return $sql;
	}

	function addDataPenyewa($data){
		$sql = $this->db->insert('penyewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function getDataKendaraan(){
		$this->db->select('kendaraan.id','id');
		$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
		$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
		$this->db->from('kendaraan');
		$sql = $this->db->get()->result();
		return $sql;
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

	

}

/* End of file M_umum.php */
/* Location: ./application/models/M_umum.php */