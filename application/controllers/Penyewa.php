<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penyewa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('M_kelola_penyewa','penyewa');
		$this->load->helper('security');
		$this->load->model('M_kelola_sewa','sewa');
		$this->load->model('M_laporan','laporan');
	}

	public function index()
	{
		date_default_timezone_set("Asia/Jakarta");
			$tanggal			= date('Y-m-d');
			$data['tanggal']	= $tanggal;

		$date 	= explode('-', $tanggal);
		$thn   	= $date[0];
		$bln 	= $date[1];
		$hari  	= $date[2];

		$jmlhari			= $this->getJumlahHari($bln,$thn);
		$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
		$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
		$data['data_list']	= $this->laporan->getDataKendaraan();

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
				$data['data_list'][$index]->status = $sql['h'];
			}
		}
		$data['user']			= $this->ion_auth->user()->row();
		$data['no']				= 1;
		$data['main_content']	= 'penyewa/home';
		$this->load->view('template',$data);
	}


	public function cek_ketersedian ()
	{
		$this->form_validation->set_rules('cek', 'Tanggal', 'required');
		if ($this->form_validation->run() == TRUE) {
			$tgl = $this->input->post('cek',true);
			$new_tgl = date('Y-m-d',strtotime($tgl));

			$date 	= explode('-', $new_tgl);
			$thn   	= $date[0];
			$bln 	= $date[1];
			$hari  	= $date[2];

			$jmlhari			= $this->getJumlahHari($bln,$thn);
			$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
			$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
			$data['data_list']	= $this->penyewa->getDataKendaraan();

			if(count($data['data_list'])){
				foreach($data['data_list'] as $index => $dt){
					$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
					$data['data_list'][$index]->h1 = $sql['h1'];
					$data['data_list'][$index]->h2 = $sql['h2'];
					$data['data_list'][$index]->h3 = $sql['h3'];
					$data['data_list'][$index]->h4 = $sql['h4'];
					$data['data_list'][$index]->h5 = $sql['h5'];
				}
			}
			$data['tanggal']	= $new_tgl;
			$data['no']			= 1;
			$this->load->view('PenyewaanB/cek_status',$data);
		} else {
			$this->load->view('home');
		}
	}


	public function getJumlahHari($bln=null,$thn=null){
		if($bln==null){
			return 0;
		} else{
			if($bln=="01"){
				return 31;
			} else if($bln=="02"){
				$cek = $thn % 4;
				if($cek==0){
					return 29;
				} else{
					return 28;
				}
			} else if($bln=="03"){
				return 31;
			} else if($bln=="04"){
				return 30;
			} else if($bln=="05"){
				return 31;
			} else if($bln=="06"){
				return 30;
			} else if($bln=="07"){
				return 31;
			} else if($bln=="08"){
				return 31;
			} else if($bln=="09"){
				return 30;
			} else if($bln=="10"){
				return 31;
			} else if($bln=="11"){
				return 30;
			} else{
				return 31;
			}
		}
	}

	public function getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari,$hari){
		$this->load->model('m_laporan','laporan');
		$hr = (int)$hari;
		$sql = $this->laporan->getDataBulan($id,$tgl_awal,$tgl_akhir,$jmlhari);
		$data['h'] = $sql['h'.$hr];
		return $data;
	}

	public function home ()
	{
		$data ['title'] = 'Halaman Home';
		$data['kendaraan'] = $this->sewa->get_data_alat()->num_rows();
		$data['sewa'] = $this->sewa->get_sewa()->num_rows();
		$this->load->view('PenyewaanB/home_fix', $data);
	}

	public function data_alat ()
	{
		$data ['title'] = 'Halaman Data alat berat';
		
		date_default_timezone_set("Asia/Jakarta");
			$tanggal			= date('Y-m-d');
			$data['tanggal']	= $tanggal;

		$date 	= explode('-', $tanggal);
		$thn   	= $date[0];
		$bln 	= $date[1];
		$hari  	= $date[2];

		$jmlhari			= $this->getJumlahHari($bln,$thn);
		$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
		$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
		$data['data_list']	= $this->penyewa->getDataKendaraan(); 

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
				$data['data_list'][$index]->status = $sql['h'];
			}
		}

		$this->load->view('PenyewaanB/data_alat', $data, FALSE);

	}

	public function request_sewa ()
	{

		if ($this->session->userdata('user')) {
			$data ['title'] = 'Halaman Rewuest Sewa alat berat';
			$data['id_ken'] = $this->uri->segment(3);

			$user = $this->session->userdata('user');
			$id = $this->uri->segment(3);
			
			$data['GetKen'] = $this->penyewa->get_nm_ken($id)->row();
			$data['GetNik'] = $this->ion_auth->user()->row();

			
			$this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]');
			$this->form_validation->set_rules('kendaraan', 'Nama Lengkap', 'trim|required');
			$this->form_validation->set_rules('awal', 'Tanggal Awal Sewa', 'trim|required');
			$this->form_validation->set_rules('akhir', 'Tanggal Akhir Sewa', 'trim|required');
			$this->form_validation->set_rules('pemakaian', 'Rencana Pemakaian', 'trim|required');
			$this->form_validation->set_rules('lokasi', 'Jenis Pekerjaan', 'trim|required');
			$this->form_validation->set_rules('pendanaan', 'Pendanaan', 'trim|required');

			if ($this->form_validation->run() == TRUE) {

				$tgl1 = strtotime($this->input->post('awal',true));
				$tgl2 = strtotime($this->input->post('alhir',true));

				$tgl_awal = date('Y-m-d', $tgl1);
				$tgl_akhir = date('Y-m-d',$tgl2);

				$data = [
					'id_penyewa' => $this->input->post('nik',true),
					'id_kendaraan' => $id,
					'tgl_awal_sewa' => $tgl_awal,
					'tgl_akhir_sewa' => $tgl_akhir,
					'renc_pemakaian' => $this->input->post('pemakaian',true),
					'jns_pekerjaan' => $this->input->post('lokasi',true),
					'pendanaan' => $this->input->post('pendanaan'),
					
				];

				$cekStatus = $this->penyewa->cek_status($id,$tgl_awal);

				if ($cekStatus > 0) {
					$this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">
					Gagal sewa,Kendaraan yang anda pili sudah di sewa
					</div>');
					redirect ('penyewa/data_alat');

				} else {
					$this->penyewa->addSewa($data);
					$this->session->set_flashdata('msg','<div class="alert alert-primary" role="alert">
					Berhasil sewa
					</div>');
					redirect ('penyewa/data_alat');
					
					
				}

			}

			$this->load->view('PenyewaanB/request_sewa', $data, FALSE);

		} else {
			redirect ('penyewa/login');
		}

	}

	public function registrasi ()
	{
		$data ['title'] = 'Halaman Registrasi';
		$this->load->view('PenyewaanB/registrasi', $data, FALSE);

		$this->form_validation->set_rules('nik','NIK','required|trim|min_length[16]');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
		$this->form_validation->set_rules('perusahaan','Perusahaan','required');$this->form_validation->set_rules('almat_perusahaan','Almat_perusahaan','required');	
		$this->form_validation->set_rules('jabatan','Jabatan','required');
		$this->form_validation->set_rules('no','No','required');
		
		if ($this->form_validation->run() == true) {
			$data = [
				'nik' => $this->input->post('nik',true),
				'nm_penyewa'=> $this->input->post('nama',true),
				'alamat_ktp' => $this->input->post('alamat'),
				'nm_perusahaan' => $this->input->post('perusahaan',true),
				'alamat_perusahaan' => $this->input->post('almat_perusahaan', true),
				'nm_jabatan' => $this->input->post('jabatan',true),
				'no_hp' => $this->input->post('no',true)
			];

			$cek_nik = $this->penyewa->get_nik($data['nik'])->num_rows();

			if (!$cek_nik > 0) {
				$sql = $this->penyewa->addPenyewa($data);

				if ($sql) {
					$this->session->set_flashdata('msg', '<div class="alert alert-primary">Berhasil Register</div>');
					redirect ('penyewa/registrasi');
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger">gagal Register</div>');
					redirect ('penyewa/registrasi');
				}

			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger">Nik sudah ada</div>');
					redirect ('penyewa/registrasi');
			}
		}
	}



	public function login ()
	{
		$data ['title'] = 'Halaman Login';
		$this->load->view('PenyewaanB/login', $data, FALSE);
		
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('pass','trim|required|min-widht[8]');

		if ($this->form_validation->run() == true) {
			$user = $this->input->post('username',true);
			$pass = $this->input->post('pass',true);

			if ($this->ion_auth->login($user, $pass, false)) {
				$data = [
					'user' => $user
				];
				$this->session->set_userdata($data);
				
				$this->cek_login();	
			} else {

				$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Passwod atau email salah!!</div>');
				redirect('penyewa/login');

			}

		}

	}

	private function cek_login()
	{
		if($this->ion_auth->in_group(2)){
			
			redirect('penyewa/home');
					
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Maaf anda tidak boleh masuk</div>');
			redirect('penyewa/login');
		}
	}

	public function logout(){
		if($this->ion_auth->logged_in()){
			$this->ion_auth->logout();
			redirect('penyewa/login');
		}
	}

	public function data_users ()
	{

		if ($this->session->userdata('username')) {
			$data['title'] = 'Halaman data users';
			$user = $this->session->userdata('user');
			$data['profile'] = $this->penyewa->get_profile($user)->row();
			$this->load->view('PenyewaanB/users',$data);
		} else {
			redirect ('penyewa/login');
		}
		

		$this->form_validation->set_rules('username','Username','required|trim');
		$this->form_validation->set_rules('fist','First_name','required|trim');
		$this->form_validation->set_rules('last','Last_name','required|trim');
		$this->form_validation->set_rules('nik','NIK','required|trim|numeric|min_length[16]');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('company','Company','trim');
		$this->form_validation->set_rules('phone','Phone','trim|numeric');
		
		
		if ($this->form_validation->run() == true) {

			$id = $data['profile']->id;

			$this->penyewa->update_profile($id);

			$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Berhasil!!</div>');
			redirect('penyewa/data_users');

		}

	}

	public function jns_kendaraan ()
	{
		$data['title'] = "Halaman Jensi kendaraan";
		$jns = $this->uri->segment(3);
		$data['jns_kendaraan'] = $this->penyewa->get_jns_kendaraan($jns)->result_array();
		$data['cek'] = $this->penyewa->get_jns_kendaraan ($jns)->num_rows();
		$this->load->view('PenyewaanB/jenis_kendaraan', $data, FALSE);
		
	}


	public function profile ()
	{
		$data['title'] = "Halaman Profile";
		$user = $this->session->userdata('user');
		$data['profile'] = $this->penyewa->get_profile($user)->row();

		$this->load->view('PenyewaanB/profile', $data);

	}


	public function history ()
	{
		if ($this->session->userdata('user')) {
			$data['title'] = "Halaman History";
			
			$data['user']			= $this->ion_auth->user()->row();
			$data['request']		= $this->penyewa->getDataRequestSewaId($data['user']->nik);
			$data['history']			= $this->penyewa->getDataSewaId($data['user']->nik);
			$data['no'] = 1;


			$this->load->view('PenyewaanB/history', $data);
		} else {
			redirect ('penyewa/login');
		}
	}
	
	public function detail_his ()
	{
	    $data['title'] = "Halaman Detail History Sewa";
		$id = $this->uri->segment(3);
		
		$data['detail'] = $this->penyewa->detail_history($id)->row();
		
		$this->load->view("PenyewaanB/Detail_histori",$data);
	}


	public function data_alatSewa()
	{
		$data['title'] = "Halaman data alat yang sudah di sewa";

		date_default_timezone_set("Asia/Jakarta");
			$tanggal			= date('Y-m-d');
			$data['tanggal']	= $tanggal;

		$date 	= explode('-', $tanggal);
		$thn   	= $date[0];
		$bln 	= $date[1];
		$hari  	= $date[2];

		$jmlhari			= $this->getJumlahHari($bln,$thn);
		$tgl_awal			= date('Y-m-d',strtotime($thn.'-'.$bln.'-01'));
		$tgl_akhir			= date('Y-m-d',strtotime($thn.'-'.$bln.'-'.$jmlhari));
		$data['data_list']	= $this->penyewa->getDataKendaraan(); 

		if(count($data['data_list'])){
			foreach($data['data_list'] as $index => $dt){
				$sql = $this->getDataBulan($dt->id,$tgl_awal,$tgl_akhir,$jmlhari,$hari);
				$data['data_list'][$index]->status = $sql['h'];
			}
		}

		$this->load->view('penyewaanB/data_alatSewa', $data);
	}	


	

	public function upload_documentasi ()
	{
		
		$data['title'] = "Halaman Upload Documentasi";
		if ( !$this->session->userdata('user'))
		{	
			redirect('penyewa/login');
		}
		
		$user = $this->session->userdata('user');
		$nik = $this->penyewa->getnik($user)->row();
		$data['kendaraan'] = $this->penyewa->Get_ken($nik->nik)->result();
		

		$Data = [
			'documentasi' => $this->upload_documen()
		];

		if (isset($_POST['submit'])) {
			$this->penyewa->upadate_documentasi($Data);
			$this->session->set_flashdata('msg', '<div class="alert alert-primary" role="alert">Berhasil!!</div>');
		}
		
		$this->load->view('PenyewaanB/documentasi', $data);

	}
	
	public function upload_documen ()
	{
		
		$config['upload_path'] = 'assets/img/documentasi';
		$config['allowed_types'] = 'JPEG|jpg|png';
		$config['file_name'] = round(microtime(true)*1000);
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('upload_kendaraan')){
			$error = array('error' => $this->upload->display_errors());
		}

		return $this->upload->data('file_name');
		
	}



}

/* End of file Penyewa.php */
/* Location: ./application/controllers/Penyewa.php */