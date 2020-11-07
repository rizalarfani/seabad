<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_penyewa extends CI_Model {

    public function get_nik ($nik)
    {
        $this->db->where('nik',$nik);
		$sql = $this->db->get('penyewa');
		return $sql;
    }

    public function addPenyewa ($data)
    {
        $sql = $this->db->insert('penyewa',$data);
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

    public function get_profile ($user)
    {
        $this->db->where('username',$user);
        return $this->db->get('users');
    }

    public function update_profile ($id)
    {
        $user = $this->input->post('username',true);
        $first = $this->input->post('fist', true);
        $last = $this->input->post('last', true);
        $nik = $this->input->post('nik', true);
        $email = $this->input->post('email', true);
        $company = $this->input->post('company', true);
        $no = $this->input->post('phone', true); 

        $data = [
            'username' => $user,
            'nik' => $nik,
            'email' => $email,
            'first_name' => $first,
            'last_name' => $last,
            'company' => $company,
            'phone' => $no
        ];

        $this->db->where('id', $id);
        $this->db->update('users', $data);

    }

    public function get_kendaraan ()
    {
        $sql = $this->db->get('kendaraan');
        return $sql;
		
    }

    public function get_jns_kendaraan ($jns)
    {
        $this->db->where('jns_kendaraan', $jns);
        return $this->db->get('kendaraan');
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
    
    public function get_nm_ken ($id)
    {
        $this->db->where('id',$id);
        return $this->db->get('kendaraan');
    }

    public function getnik ($user)
    {
        $this->db->where('username',$user);
        return $this->db->get('users');
    }

    public function addSewa($data)
    {
        $sql = $this->db->insert('requestsewa',$data);
        if ($sql) {
            return true;
        } else {
            return false;
        }
    }

    public function cek_status ($id,$tgl)
    {
        $this->db->where('id_kendaraan',$id);
		$this->db->where('tgl_update',$tgl);
		$where = "id_status != 1";
		$this->db->where($where);
		$sql = $this->db->get('status_kendaraan')->num_rows();
		return $sql;
    }

    public function getDataRequestSewaId ($id)
    {
        $this->db->select('*');
		$this->db->from('requestsewa');
		$this->db->join('penyewa','penyewa.nik=requestsewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=requestsewa.id_kendaraan','left');
		$this->db->where('requestsewa.id_penyewa',$id);
		$this->db->where('status',0);
		$sql = $this->db->get()->result();
		return $sql;
    }

    public function getDataSewaId ($id)
    {
        $this->db->select('*');
        $this->db->select('sewa.id','id');
		$this->db->from('sewa');
		$this->db->join('penyewa','penyewa.nik=sewa.id_penyewa','left');
		$this->db->join('kendaraan','kendaraan.id=sewa.id_kendaraan','left');
		$this->db->where('sewa.id_penyewa',$id);
		$sql = $this->db->get()->result();
		return $sql;
    }

    public function detail_history ($id)
    {
        $this->db->select('*');
        $this->db->select('sewa.id','id');
        $this->db->from('sewa');
        $this->db->join('penyewa', 'penyewa.nik=sewa.id_penyewa','left');
        $this->db->join('kendaraan', 'kendaraan.id = sewa.id_kendaraan', 'left');
        $this->db->where('sewa.id',$id);
        $sql = $this->db->get();
        return $sql;
    }

    public function Get_ken ($nik)
    {
        $this->db->select('*');
        $this->db->from('kendaraan');
        $this->db->join('sewa', 'kendaraan.id = sewa.id_kendaraan');
        $this->db->where('id_penyewa',$nik);
        return $this->db->get();
    }

    public function upadate_documentasi ($data)
    {
        $kendaraan = $this->input->post('kendaraan', true);

        $this->db->where('id_kendaraan',$kendaraan);

        $this->db->update('sewa',$data);

    }

}

/* End of file ModelName.php */
