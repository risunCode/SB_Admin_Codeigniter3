<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        # code...
        $konten=[

            'list'=>$this->db->query("SELECT * FROM USERS ORDER BY id_user DESC")->result(),
        ];

        $data = [
           

            'page'=>'posting',
            'konten' => $this->load->view('v_posting',$konten, TRUE),

        ];
        # code...
        $this->load->view('widget/v_template', $data);
    }

}