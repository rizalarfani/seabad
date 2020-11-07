<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_user extends CI_Model {

	function getDataPenyewa(){
		$sql = $this->db->get('penyewa')->result();
		return $sql;
	}

	function getDataPenyewaId($id){
		$this->db->where('nik',$id);
		$sql = $this->db->get('penyewa');
		return $sql;
	}

	function deleteDataPenyewa($id){
		$this->db->where('nik',$id);
		$sql = $this->db->delete('penyewa');
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function addDataPenyewa($data){
		$sql = $this->db->insert('penyewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function updateDataPenyewa($id,$data){
		$this->db->where('nik',$id);
		$sql = $this->db->update('penyewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	public function get_nik ($user)
	{
		$this->db->where('username', $user);
		$this->db->select('nik');
		return $this->db->get('users');
	}

}

/* End of file M_kelola_user.php */
/* Location: ./application/models/M_kelola_user.php */