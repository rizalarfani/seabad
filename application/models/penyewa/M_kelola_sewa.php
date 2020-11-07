<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_sewa extends CI_Model {

	public function __construct(){
		parent::__construct();
		if(!$this->ion_auth->logged_in() || !$this->ion_auth->in_group(2)){
			redirect('auth');
		}
	}

	function getDataStatusAlat($status,$id){
		$this->db->where('id_status',$status);
		$this->db->where('id_kendaraan',$id);
		$sql = $this->db->get('status_kendaraan');
		return $sql;
	}

	function addData($data){
		$sql = $this->db->insert('requestsewa',$data);
		if($sql){
			return true;
		}else{	
			return false;
		}
	}

	function getDataAlat(){
		$query = $this->db->get('kendaraan')->result();
		return $query;
	}

	function getDataRequestSewaId($id){
		$this->db->select('*');
		$this->db->from('requestsewa');
		$this->db->join('penyewa','penyewa.nik=requestsewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=requestsewa.id_kendaraan','left');
		$this->db->where('requestsewa.id_penyewa',$id);
		$this->db->where('status',0);
		$sql = $this->db->get()->result();
		return $sql;
	}

	function getDataRequestSewaById($id){
		$this->db->select('*');
		$this->db->from('requestsewa');
		$this->db->join('penyewa','penyewa.nik=requestsewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=requestsewa.id_kendaraan','left');
		$this->db->where('requestsewa.id',$id);
		$sql = $this->db->get()->row();
		return $sql;
	}

	function getDataSewaId($id){
		$this->db->select('*');
		$this->db->from('sewa');
		$this->db->join('penyewa','penyewa.nik=sewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=sewa.id_kendaraan','left');
		$this->db->where('sewa.id_penyewa',$id);
		$sql = $this->db->get()->result();
		return $sql;
	}

	function deleteRequest($id){
		$this->db->where('id',$id);
		$sql = $this->db->delete('requestsewa');
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function updateRequest($id,$data){
		$this->db->where('id',$id);
		$sql = $this->db->update('requestsewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_kelola_sewa.php */
/* Location: ./application/models/penyewa/M_kelola_sewa.php */