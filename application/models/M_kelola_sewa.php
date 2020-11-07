<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_sewa extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	function json() {
        $this->datatables->select('sewa.id as id, penyewa.nik as nik, penyewa.nm_penyewa as nm_penyewa, kendaraan.id as id_kendaraan, kendaraan.nm_kendaraan as nm_kendaraan, kendaraan.jns_kendaraan as jns_kendaraan,sewa.tgl_awal_sewa as tgl_awal,sewa.tgl_akhir_sewa as tgl_akhir,sewa.renc_pemakaian as renc_pemakaian, sewa.jns_pekerjaan as jns_pekerjaan, sewa.pendanaan as pendanaan');
        $this->datatables->from('sewa');
        $this->datatables->join('penyewa', 'penyewa.nik=sewa.id_penyewa','left');
        $this->datatables->join('kendaraan', 'kendaraan.id=sewa.id_kendaraan','left');
        $this->datatables->add_column('action', '<a href="kelola_sewa/print_sk/$1" class="btn btn-success btn-xs"><i class="fa fa-print"></i> SK</a> <a href="kelola_sewa/print_spk/$1" class="btn btn-success btn-xs"><i class="fa fa-print"></i> SPK</a> <a href="#" onclick="functionDelete(\'kelola_sewa/hapus_data/$1/$2/$3\')" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>', 'id,id_kendaraan,tgl_awal');
        return $this->datatables->generate();
    }

    function json2() {
        $this->datatables->select('requestsewa.id as id, penyewa.nm_penyewa as nm_penyewa, kendaraan.nm_kendaraan as nm_kendaraan, kendaraan.jns_kendaraan as jns_kendaraan,requestsewa.tgl_awal_sewa as tgl_awal,requestsewa.tgl_akhir_sewa as tgl_akhir,requestsewa.renc_pemakaian as renc_pemakaian, requestsewa.jns_pekerjaan as jns_pekerjaan, requestsewa.pendanaan as pendanaan');
        $this->datatables->from('requestsewa');
        $this->datatables->join('penyewa', 'penyewa.nik=requestsewa.id_penyewa','left');
        $this->datatables->join('kendaraan', 'kendaraan.id=requestsewa.id_kendaraan','left');
        $this->datatables->where('requestsewa.status',0);
        $this->datatables->add_column('action', '<a href="#" onclick="functionOk(\'kelola_sewa/confirm/$1\')" class="btn btn-success btn-xs"><i class="fa fa-check-square-o"></i> </a>', 'id');
        return $this->datatables->generate();
    }

	function getData(){
		$sql = $this->db->get('sewa')->result();
		return $sql;
	}

	function getDataId($id){
		$this->db->select('sewa.*');
		$this->db->select('penyewa.nm_penyewa','nm_penyewa');
		$this->db->select('penyewa.alamat_ktp','alamat_ktp');
		$this->db->select('kendaraan.nm_kendaraan','nm_kendaraan');
		$this->db->select('kendaraan.jns_kendaraan','jns_kendaraan');
		$this->db->select('kendaraan.operator','operator');
		$this->db->select('kendaraan.biaya_sewa','biaya_sewa');
		$this->db->select('status_kendaraan.lama','lama');
		$this->db->from('sewa');
		$this->db->join('penyewa','penyewa.nik=sewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=sewa.id_kendaraan','left');
		$this->db->join('status_kendaraan','status_kendaraan.id_kendaraan=sewa.id_kendaraan and status_kendaraan.tgl_update=sewa.tgl_awal_sewa');
		$this->db->where('sewa.id',$id);
		$sql = $this->db->get()->row();
		return $sql;
	}

	function getDataRequestById($id){
		$this->db->where('id',$id);
		$sql = $this->db->get('requestsewa')->row();
		return $sql;
	}

	function deleteData($id){
		$this->db->where('id',$id);
		$sql = $this->db->delete('sewa');
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function updateData($id,$data){
		$this->db->where('id',$id);
		$sql = $this->db->update('sewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function addData($data){
		$sql = $this->db->insert('sewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	function updateStatusRequest($id){
		$data = array(
			'status' => 1,
			);
		$this->db->where('id',$id);
		$sql = $this->db->update('requestsewa',$data);
		if($sql){
			return true;
		}else{
			return false;
		}
	}

	public function get_data_alat ()
	{
		return $this->db->get('kendaraan');
	}

	public function get_sewa ()
	{
		return $this->db->get('sewa');
	}

}

/* End of file M_kelola_sewa.php */
/* Location: ./application/models/M_kelola_sewa.php */