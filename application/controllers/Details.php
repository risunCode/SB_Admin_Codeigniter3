<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
    } 
    public function index()
    {
        // Jika ingin memuat halaman details.html dari controller
        $data = [
            'page' => 'shop',
            'konten' => $this->load->view('v_itemInfo', [], TRUE),
        ];

        $this->load->view('widget/v_template', $data);
    }

public function details($id_barang){
    // Ambil data barang dari database berdasarkan $id_barang
    $query = $this->db->get_where('barang', array('id_barang' => $id_barang));
    $data['barang'] = $query->row();

    // Load view untuk halaman detail dengan data barang yang sudah diambil
    $data = [
        'page' => 'shop',
        'konten' => $this->load->view('v_details', $data, TRUE),
    ];

    $this->load->view('widget/v_template', $data);
    }
}

/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */
