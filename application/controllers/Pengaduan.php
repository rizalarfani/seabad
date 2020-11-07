<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pengaduan extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_kelola_user');
        $this->load->model('M_kelola_pengaduan','pengaduan');       
        $this->load->model('M_kelola_alat','kelola_alat');
        $this->load->library('form_validation');
    }
    

    public function index()
    {
        $data['title'] = "Halaman untuk pengaduan";
        $data['laporan_masuk'] = $this->pengaduan->laporan_masuk()->num_rows();
        $data['laporan_setujui'] = $this->pengaduan->laporan_setujui()->num_rows();
        $data['terbaru'] = $this->pengaduan->fd_terbaru()->result();
        
        $this->load->view('pengaduan/home', $data);
    }

    public function lapor_pengaduan ()
    {
        $data['title'] = 'Halaman untuk pengaduan';

        if (!$this->session->userdata('username')){
            $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Anda harus login dahulu!!</div>');
            redirect ('pengaduan/login');
        }

        $this->form_validation->set_radio('nik','NIK','required|trim|numeric|min_length[16]', array(
			'numeric' => 'Harus berisi angka',
			'min_length[16]' => 'Nik harus 16 digit angka'
        ));
        $this->form_validation->set_rules('nama','Nama','required|trim');
        $this->form_validation->set_rules('kategori','Kategori','required|trim');
        $this->form_validation->set_rules('alamat','Alamat','required|trim');
        $this->form_validation->set_rules('desc','Desc','required');

        $user = $this->session->userdata('username');
        $data['nik'] = $this->pengaduan->getNik($user)->row();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengaduan/pengaduan', $data);
        } else {

            $data = [
                'nik' => $this->input->post('nik',true),
                'nama_pengadu' => $this->input->post('nama',true),
                'alamat_jln' => $this->input->post('alamat',true),
                'desc' => $this->input->post('desc',true),
                'kategori' => $this->input->post('kategori',true),
                'foto' => $this->upload_gambar(),
                'status' => 'pending',
                'date_created' => date('Y-m-d H:i:s')   
            ];
            $this->pengaduan->addLapor($data);
            $this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Berhasil Mengadu</div>');
			redirect('pengaduan');
        }

    }

    private function upload_gambar ()
    {
               
        $config['upload_path'] = 'assets/img/pengaduan/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = round(microtime(true)*1000);
        
        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload('foto_infrastuktur')){
            $error = array('error' => $this->upload->display_errors());
        } 
        return $this->upload->data('file_name');
        
    }


    // Update status pengaduan
    public function update_statusP ()
    {
        
        $id = $this->uri->segment(3);
        $detail = $this->pengaduan->detail($id)->row();
        
        $data = [
            'status' => 'acc'
        ];

        $data_pengadu = [
            'nik' => $detail->nik,
            'nama_pengadu' => $detail->nama_pengadu,
            'alamat' => $detail->alamat_jln,
            'desc' => $detail->desc,
            'kategori' => $detail->kategori,
            'foto' => $detail->foto,
            'status' => $detail->status,
            'date_created' => date('Y-m-d H:i:s')
        ];
        
        $this->pengaduan->upadate_status($id,$data);
        $this->pengaduan->addDataFedback($data_pengadu);

        $this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Berhasil di acc</div>');
		redirect('pengaduan/data_feedback'); 

    }


    public function register ()
    {
        $data['title'] = "Halaman Register";

        $this->form_validation->set_rules('username', 'Usename', 'required|trim');
		$this->form_validation->set_radio('nik','NIK','required|trim|numeric|min_length[16]', array(
			'numeric' => 'Harus berisi angka',
			'min_length[16]' => 'Nik harus 16 digit angka'
		));
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[2]|valid_email|valid_emails');
		$this->form_validation->set_rules('firstname','First_name','required|trim');
		$this->form_validation->set_rules('lastname','Last_name','required|trim');
		$this->form_validation->set_rules('password','Password','required|min_length[5]',array(
			'min_length[5]' => 'Minimal passwor 5 karakter'
		));


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengaduan/register', $data);
        } else {
            $user = $this->ion_auth->user();
			$username = $this->input->post('username', true);
			$password = $this->input->post('password', true);
            $email 	= $this->input->post('email',true);
            
            $additional_data = [
                'first_name' => $this->input->post('firstname', true),
                'lastname' => $this->input->post('lastname')
            ];

			$input_nik = explode('-', $this->input->post('nik', true));
			$nik 	   = $input_nik[0];
            $nama 	   = $input_nik[1];
            
            if($nik=='01234567891234567'){
				$additional_data = array(
                'nik' 		 => 0
                );
			}else{
				$additional_data = array(
                'nik' 		 => $nik
                );
            }
            
            $group = array(5);
			if ($this->ion_auth->username_check($username))
			{
				$this->session->set_flashdata('info', 'Tambah User Gagal. Username telah terdaftar!');
				redirect('pengaduan/login');
			} 
			else if($this->ion_auth->email_check($email)){
				$this->session->set_flashdata('info', 'Tambah User Gagal. Email telah terdaftar!');
				redirect('pengaduan/login');
			} else{
				$this->ion_auth->register($username,$password,$email,$additional_data,$group);

				$this->session->set_flashdata('info', '<div class="alert alert-primary" role="alert">Berhasil register</div>');
				redirect('pengaduan/login');
			}

        }


    }

    public function cek_login ()
    {
        if ($this->ion_auth->in_group(5)) {
            redirect ('pengaduan');
        } else {
            $this->session->set_flashdata('info','<div class="alert alert-primary" role="alert">Maaf anda tidak bisa login kesini!!</div>');
            redirect ('pengaduan/login');
        }
    }

    public function login ()
    {
        $data['tilte'] = "Halaman Login";

        $this->form_validation->set_rules('username','Username','required|trim');
        $this->form_validation->set_rules('password','Password','required|trim');

        $user = $this->input->post('username',true);
        $pass = $this->input->post('password', true);

        if ($this->form_validation->run() == FALSE) {
            
            $this->load->view('pengaduan/login', $data);
        } else {

            if ($this->ion_auth->login($user,$pass) == true) {  
                $data = [
                    'username' => $user
                ];
                $this->session->set_userdata($data);
                $this->cek_login();
            } else {
                $this->session->set_flashdata('info', '<div class="alert alert-danger" role="alert">Passwod atau email salah!!</div>');
				redirect('pengaduan/login');
            }

        }


    }

    public function user ()
    {
        $data['title'] = "Halaman data user";

        $user = $this->session->userdata('username');
        $data['user'] = $this->pengaduan->get_data_user($user)->row();

        if ($this->session->userdata('username')){
            $this->load->view('pengaduan/user', $data);
        } else {
            redirect ('pengaduan/login');
        }
        
    }

    public function update_profile ()
    {


        if ($this->session->userdata('username') == false){  
            redirect ('pengaduan/login');
        } 

        $data['title'] = "Halaman Update profile";
        $user = $this->session->userdata('username');
        $data['user'] = $this->pengaduan->get_data_user($user)->row();

        $id = $data['user']->id;

        $this->form_validation->set_rules('username','username','required|trim');
        $this->form_validation->set_rules('firstname','Firstname','required|trim');
        $this->form_validation->set_rules('lastname','lastname','required|trim');
        $this->form_validation->set_rules('nik','NIK','required|trim|min_length[16]|numeric');
        $this->form_validation->set_rules('email','Email','required|trim|valid_email');
        $this->form_validation->set_rules('phone','Phone','required|trim|numeric');        

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('pengaduan/update_profile', $data);
        } else {

            $data = [
                'username' => $this->input->post('username', true),
                'nik' => $this->input->post('nik',true),
                'email' => $this->input->post('email', true),
                'first_name' => $this->input->post('firstname', true),
                'last_name' => $this->input->post('lastname', true),
                'phone' => $this->input->post('phone', true) 
            ];

            $this->pengaduan->update_profile($id,$data);

            $this->session->set_flashdata('info','<div class="alert alert-info" role="alert">Behasil ubah profile anda!!</div>');
			redirect('pengaduan/user');

        }


    }

    public function logout ()
    {
        $this->session->unset_userdata('username');
		redirect ('pengaduan/login');
    }


    // Bagian admin
    public function data_pengaduan ()
    {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect ('auth/login');
        }

        $data['pengaduan'] = $this->pengaduan->GetPengaduan()->result();
        $data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->kelola_alat->getData();
        $data['no']				= 1;
		$data['main_content']	= 'admin/kelola_pengaduan';
		$this->load->view('template',$data);
    }

    public function detail ()
    {
        $id = $this->uri->segment(3);
        
        $data['detail'] = $this->pengaduan->detail($id)->row();
        $data['user']			= $this->ion_auth->user()->row();
		$data['data_list']		= $this->kelola_alat->getData();
        $data['no']				= 1;
		$data['main_content']	= 'admin/kelola_pengaduan_detail';
		$this->load->view('template',$data);
    }

    public function hapus_pengaduan ()
    {
        $id = $this->uri->segment(3);

        $this->pengaduan->hapus_pengaduan($id);
        $this->session->set_flashdata('info','<div class="alert alert-info" role="alert">Behasil Hapus data!!</div>');
        redirect('pengaduan/data_pengaduan');
        
    }

    public function data_feedback ()
    {
        $data['user']			= $this->ion_auth->user()->row();
        $data['data_list']		= $this->kelola_alat->getData();
        $data['feedback'] = $this->pengaduan->getFeedback()->result();
        $data['no']				= 1;
		$data['main_content']	= 'admin/kelola_pengaduan_feedback';
		$this->load->view('template',$data);
    }


    public function add_feedback ()
    {

        if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_admin()) {
            redirect ('auth/login');
        }

        $id = $this->uri->segment(3);
        
        $this->form_validation->set_rules('feedback','Feedback','required|trim');

        if ($this->form_validation->run() == true) {

            $feedback = [
                'feedback' => $this->input->post('feedback', true)
            ];

            $this->pengaduan->addFeedback($id,$feedback);
            $this->session->set_flashdata('info','<div class="alert alert-info" role="alert">Behasil!!</div>');
            redirect('pengaduan/data_feedback');
             

        } else {
            $data['feedback'] = $this->pengaduan->get_feedback($id)->row();
            $data['user']			= $this->ion_auth->user()->row();
            $data['data_list']		= $this->kelola_alat->getData();
            $data['no']				= 1;
            $data['main_content']	= 'admin/kelola_pengaduan_AddFeedback';
            $this->load->view('template',$data);
        }

        
    }

    public function cat_feedback ()
    {
        $data['title'] = "Halaman Categori Feedback";

        $this->load->view('pengaduan/feedback', $data);
    }

    public function feedback ()
    {
        $data['title'] = "Halaman Feedback";
        $kat = $this->input->get('cat');

        $data['kategori'] = $this->pengaduan->categori ($kat)->result();

        $this->load->view('pengaduan/cat_feedback',$data);
    } 

    public function detail_feedback ()
    {
        $data['title'] = "Halaman Detalil feedback";
        $id = $this->uri->segment(3);
        $user = $this->session->userdata('username');
        
        $id_user = $this->pengaduan->getNik($user)->row();
        $cek = $this->pengaduan->cek_data($id)->num_rows();
        
        
        
        if ($this->pengaduan->detail_pengaduan($id)->row() == null) {
            $this->load->view('errors/html/error_404');
        } else {
            $data['komentar'] = $this->pengaduan->Get_komentar($id)->result();

             $data['detail'] = $this->pengaduan->detail_pengaduan($id)->row();

            $this->load->view('pengaduan/detail_feedback', $data);
        }
        
    }
    
    public function addKomentar ()
    {
        
        $data['title'] = "Halaman Detail Feedback";
        $user = $this->session->userdata('username');
        
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('info','<div class="alert alert-warning" role="alert">Maaf anda harus login dahulu!!</div>');
            redirect ('pengaduan/login');
        }
        
        $this->form_validation->set_rules('komentar','Komentar','required|trim');
        $id = $this->uri->segment(3);
        $id_user = $this->pengaduan->getNik($user)->row();
    
        
        if ($this->form_validation->run() == true) {
            
            $data = [
                    'id_feedback' => $id,
                    'id' => $id_user->id,
                    'isi_komentar' => $this->input->post('komentar', true),
                    'date_created' => date('Y-m-d H:i:s')
                ];
            
            $sql = $this->pengaduan->addKomen($data);
            
            if ($sql == true) {
                $this->session->set_flashdata('info','<div class="alert alert-primary" role="alert">Berhasil komentar!!</div>');
                redirect ('pengaduan/detail_feedback/'.$id.''); 
            } else {
                $this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Gagal komentar!!</div>');
                redirect ('pengaduan/detail_feedback/'.$id.'');   
            }
            
        } else {
            redirect ('pengaduan/detail_feedback/'.$id.'');
        }
        
    }
    
    public function history ()
    {
        $data['title'] = "Halaman History Pengaduan";
        $user = $this->session->userdata('username');
        $data['no'] = 1;
        
        $id_user = $this->pengaduan->getNik($user)->row()->nik;
        
        
        $data['histoty'] = $this->pengaduan->history($id_user)->result();
        
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('info','<div class="alert alert-danger" role="alert">Anda harus login dahulu !!</div>');
            redirect ('pengaduan/login');
        }
        
        $this->load->view('pengaduan/history', $data);
        
    }

}

/* End of file Pengaduan.php */
