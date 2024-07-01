<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    }

    public function index()
    {
        $data = [
            'page' => 'shop',
            'konten' => $this->load->view('v_sbshop', [], TRUE),
        ];

        $this->load->view('widget/v_template', $data);
    }  

    public function add() {
        $data['list'] = $this->db->query("SELECT * FROM itemdetails ORDER BY id_barang DESC")->result();
    
        $data_view = [
            'page' => 'kategori',
            'konten' => $this->load->view('v_sbshop', $data, TRUE),
        ];
    
        $this->load->view('widget/v_template', $data_view);
    }
}    


/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */
