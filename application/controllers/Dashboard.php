<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){

            $this->session->set_flashdata('error', 'Anda Harus Login Terblebih dahulu..!!!');
            redirect('login');
        }
    }

    public function index()
    {
        $data = [
            'page'=>'dashboard',
            'konten' => $this->load->view('v_dashboard',[], TRUE),

        ];
        # code...
        $this->load->view('widget/v_template', $data);
    }

}

/* End of file: Dashboard.php */
