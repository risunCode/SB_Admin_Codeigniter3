<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Garfield extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        # code...
        $konten=[

            'list'=>$this->db->query("SELECT * FROM ITEMDETAILS ORDER BY id_barang DESC")->result(),
        ];

        $data = [
           

            'page'=>'garfield',
            'konten' => $this->load->view('v_garfield',$konten, TRUE),

        ];
        # code...
        $this->load->view('widget/v_template', $data);
    }

}
/* End of file: Test.php */
