<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_alat extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	function getData(){
		$query = $this->db->get('kendaraan')->result();
		return $query;
	}

	function addData($data=null){
		if($data==null){
			return false;
		} else{
			$sql = $this->db->insert('kendaraan',$data);
			if($sql){
				return true;
			} else{
				return false;
			}
		}
	}

	function deleteData($id){
		$this->db->where('id',$id);
		$sql = $this->db->delete('kendaraan');
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	function getDataId($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('kendaraan')->row();
		return $sql;
	}

	function updateData($id,$data){
		$this->db->where('id',$id);
		$sql = $this->db->update('kendaraan',$data);
		if($sql){
			return true;
		} else{
			return false;
		}
	}

	function getDataStatus($status=null,$kendaraan=null){
		if($status==null){
			$this->db->select('status_kendaraan.id_kendaraan','id_kendaraan');
			$this->db->select('status_kendaraan.id_status','id_status');
			$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
			$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
			$this->db->select('status.status_kendaraan','status_kendaraan');
			$this->db->select('status_kendaraan.tgl_update','tgl_update');
			$this->db->select('status_kendaraan.lama','lama');
			$this->db->from('status_kendaraan');
			$this->db->join('kendaraan','kendaraan.id=status_kendaraan.id_kendaraan');
			$this->db->join('status','status.id=status_kendaraan.id_status','left');
			$this->db->order_by('tgl_update','desc');
			$sql = $this->db->get()->result();
			return $sql;
		}else{
			$this->db->select('status_kendaraan.id_kendaraan','id_kendaraan');
			$this->db->select('status_kendaraan.id_status','id_status');
			$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
			$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
			$this->db->select('status.status_kendaraan','status_kendaraan');
			$this->db->select('status_kendaraan.tgl_update','tgl_update');		
			$this->db->from('status_kendaraan');
			$this->db->join('kendaraan','kendaraan.id=status_kendaraan.id_kendaraan');
			$this->db->where('status_kendaraan.id_kendaraan',$kendaraan);
			$this->db->where('status_kendaraan.id_status',$status);
			$sql = $this->db->get();
			return $sql;
		}
		
	}

	function checkStatus($id,$tgl){
		$this->db->where('id_kendaraan',$id);
		$this->db->where('tgl_update',$tgl);
		$where = "id_status != 1";
		$this->db->where($where);
		$sql = $this->db->get('status_kendaraan')->num_rows();
		return $sql;
	}

	function checkStatusMaintenance($id,$tgl){
		$this->db->where('id_kendaraan',$id);
		$this->db->where('tgl_update',$tgl);
		$this->db->where('id_status',2);
		$sql = $this->db->get('status_kendaraan')->num_rows();
		return $sql;
	}

	function addStatus($data){
		$sql = $this->db->insert('status_kendaraan',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function getListStatus(){
		$sql = $this->db->get('status')->result();
		return $sql;
	}

	function deleteStatus($id,$tgl){
		$this->db->where('id_kendaraan',$id);
		$this->db->where('tgl_update',$tgl);
		$sql = $this->db->delete('status_kendaraan');
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function getDataMaintenance(){
		$this->db->select('maintenance.id','id');
		$this->db->select('maintenance.id_kendaraan','id_kendaraan');
		$this->db->select('maintenance.tglawalm','tglawalm');
		$this->db->select('maintenance.tglakhirm','tglakhirm');
		$this->db->select('maintenance.bengkel','bengkel');
		$this->db->select('maintenance.alamat','alamat');
		$this->db->select('maintenance.jenisrusak','jenisrusak');
		$this->db->select('maintenance.nilai','nilai');
		$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
		$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
		$this->db->from('maintenance');
		$this->db->join('kendaraan','kendaraan.id=maintenance.id_kendaraan','left');
		$sql = $this->db->get()->result();
		return $sql;
	}

	function getDataMaintenanceId($id){
		$this->db->select('maintenance.id','id');
		$this->db->select('maintenance.id_kendaraan','id_kendaraan');
		$this->db->select('maintenance.tglawalm','tglawalm');
		$this->db->select('maintenance.tglakhirm','tglakhirm');
		$this->db->select('maintenance.bengkel','bengkel');
		$this->db->select('maintenance.alamat','alamat');
		$this->db->select('maintenance.jenisrusak','jenisrusak');
		$this->db->select('maintenance.nilai','nilai');
		$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
		$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
		$this->db->from('maintenance');
		$this->db->join('kendaraan','kendaraan.id=maintenance.id_kendaraan','left');
		$this->db->where('maintenance.id',$id);
		$sql = $this->db->get()->row();
		return $sql;
	}

	function deleteDataMaintenance($id){
		$this->db->where('id',$id);
		$sql = $this->db->delete('maintenance');
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function updateDataMaintenance($id,$data){
		$this->db->where('id',$id);
		$sql = $this->db->update('maintenance',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function addDataMaintenance($data){
		$sql = $this->db->insert('maintenance',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_kelola_alat.php */
/* Location: ./application/models/M_kelola_alat.php */