<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Utama extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Halaman utama';

        $this->load->view('hal_utama', $data);  
    }

}

/* End of file Utama.php */
