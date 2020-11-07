<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelola_pengaduan extends CI_Model {

    public function get_data_pengaduan ()
    {
        $this->db->where('status','pending');
        return $this->db->get('pengaduan');
    }

    public function GetPengaduan ()
    {
        return $this->db->get('pengaduan');
    }

    public function get_detail ($id)
    {   
        $this->db->where('id_pengadu', $id);
        return $this->db->get('pengaduan')->row();
        
    }

    public function get_data_user ($user)
    {
        $this->db->where('username', $user);
        $this->db->select('*');
        return $this->db->get('users');
    }

    public function update_profile ($id,$data)
    {
        $this->db->where('id', $id);
        $this->db->update('users', $data);
    }

    public function getNik ($user)
    {
        $this->db->select('id,nik,first_name,last_name');
        $this->db->where('username', $user);
        return $this->db->get('users');
    }

    public function addLapor ($data)
    {
        $this->db->insert('pengaduan',$data);
    }

    public function detail ($id)
    {
        $this->db->where('id_pengadu',$id);
        return $this->db->get('pengaduan');
    }

    public function hapus_pengaduan($id)
    {
        $this->db->where('id_pengadu', $id);
        $this->db->delete('pengaduan');
    }

    public function upadate_status ($id,$data)
    {
        $this->db->where('id_pengadu',$id);
        $this->db->update('pengaduan', $data);
    }

    public function addDataFedback ($data)
    {
        $this->db->insert('feedback',$data);
    }

    public function getFeedback ()
    {
        return $this->db->get('feedback');
    }

    public function get_feedback ($id)
    {
        $this->db->where('id_feedback',$id);
        return $this->db->get('feedback');
    }

    public function addFeedback ($id,$data)
    {

        $this->db->where('id_feedback', $id);
        $this->db->update('feedback', $data);
        
    }

    public function categori ($kat)
    {
        $this->db->select('*');
        $this->db->where('kategori', $kat);
        return $this->db->get('feedback');
    }
    
    public function detail_pengaduan ($id)
    {
        $this->db->select('*');
        $this->db->where('id_feedback', $id);
        return $this->db->get('feedback');
    }
    
    public function cek_data ($id)
    {
        $this->db->select('id_feedback');
        return $this->db->get('feedback');
    }
    
    public function addKomen ($data)
    {
        $this->db->insert('komentar', $data);
        return true;
    }
    
    public function Get_komentar ($id)
    {
        $this->db->select('*');
        $this->db->where('id_feedback', $id);
        $this->db->from('komentar');
        $this->db->join('users','komentar.id=users.id');
        return $this->db->get();
    }
    
    public function history ($id)
    {
        $this->db->select('nik,nama_pengadu,alamat,kategori');
        $this->db->where('nik', $id);
        $this->db->from('feedback');
        return $this->db->get();
    }
    
    public function laporan_masuk ()
    {
        $this->db->select('id_pengadu');
        return $this->db->get('pengaduan');
    }
    
    public function laporan_setujui ()
    {
        $this->db->select('id_feedback');
        return $this->db->get('feedback');
    }
    
    public function fd_terbaru ()
    {
        $this->db->select('*');
        $this->db->order_by('id_feedback','ASC');
        $this->db->limit('3');
        return $this->db->get('feedback');
    }

}

/* End of file M_kelola_pengaduan.php */
