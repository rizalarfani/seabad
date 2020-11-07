<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan_pendapatan extends CI_Model {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin() && !$this->ion_auth->in_group(3)){
			redirect('auth');
		}
	}

	function getDataKendaraan($id=null){
		if(!$id==null){
			$this->db->where('id',$id);
			$sql = $this->db->get('kendaraan')->result();
			return $sql;
		} else{
			$this->db->select('kendaraan.id','id');
			$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
			$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
			$this->db->select('kendaraan.biaya_sewa','biaya_sewa');
			$this->db->select('kendaraan.operator','operator');
			$this->db->from('kendaraan');
			$sql = $this->db->get()->result();
			return $sql;
		}
	}

	function getDataJenisKendaraan($jns=null){
		if(!$jns==null){
			$this->db->select('*');
			$this->db->from('kendaraan');
			$this->db->where('jns_kendaraan',$jns);
			$this->db->group_by('jns_kendaraan');
			$sql = $this->db->get();
			return $sql->result();
		} else{
			$this->db->select('kendaraan.id','id');
			$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
			$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
			$this->db->select('kendaraan.biaya_sewa','biaya_sewa');
			$this->db->select('kendaraan.operator','operator');
			$this->db->from('kendaraan');
			$this->db->group_by('jns_kendaraan');
			$sql = $this->db->get()->result();
			return $sql;
		}
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

	function getDataPendapatanJenisAlat($jns,$bln,$tahun){
		$query = "SELECT SUM(`status_kendaraan`.`lama`) as `lama` FROM `status_kendaraan` 
		JOIN `kendaraan` ON `kendaraan`.`id`=`status_kendaraan`.`id_kendaraan`
		WHERE MONTH(`status_kendaraan`.`tgl_update`) = '".$bln."' AND YEAR(`status_kendaraan`.`tgl_update`) = '".$tahun."' AND `kendaraan`.`jns_kendaraan`='".$jns."' AND `id_status`='5'";
		$sql = $this->db->query($query)->result();
		
		if(count($sql)){
			foreach($sql as $dt){
				$data = $dt->lama;
			}	
		}
		return $data;
	}

	

}

/* End of file M_laporan_pendapatan.php */
/* Location: ./application/models/M_laporan_pendapatan.php */