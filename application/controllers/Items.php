<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Items extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    } 
    public function index()
    {
        // Jika ingin memuat halaman details.html dari controller
        $data = [
            'page' => 'shop',
            'konten' => $this->load->view('index', [], TRUE),
        ];

        $this->load->view('widget/v_template', $data);
    }
}

/* End of file: Items.php */