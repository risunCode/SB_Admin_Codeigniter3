<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database(); // Load library database
        $this->load->helper('url'); // Load URL helper for base_url()
    }

    public function index() {
        $data['list'] = $this->db->get('itemdetails')->result(); // Ambil semua data dari tabel itemdetails

        $data['page'] = 'kategori';
        $data['konten'] = $this->load->view('v_kategori', $data, TRUE);

        $this->load->view('widget/v_template', $data);
    }

    public function add() {
        $data['page'] = 'kategori';
        $data['konten'] = $this->load->view('v_kategoriManager', NULL, TRUE);

        $this->load->view('widget/v_template', $data);
    }
 
    private function _upload_gambar($field_name, $id_barang = NULL, $kategori_barang = NULL) {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|gif';
        $config['max_size'] = 2048; // 2MB max size
    
        $this->load->library('upload', $config);
    
        if ($this->upload->do_upload($field_name)) {
            // Hapus file lama jika ada
            $old_filename = $id_barang . '+' . $kategori_barang;
            $old_file = glob($config['upload_path'] . $old_filename . '.*');
            if ($old_file) {
                unlink($old_file[0]); // Hapus file lama
            }
    
            $upload_data = $this->upload->data();
            $original_name = $upload_data['file_name'];
            $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    
            // Generate new filename based on id_barang and kategori_barang
            $new_filename = $id_barang . '+' . $kategori_barang . '.' . $ext;
            $new_filepath = $upload_data['file_path'] . $new_filename;
    
            // Rename and move uploaded file
            rename($upload_data['full_path'], $new_filepath);
    
            // Resize image
            $this->load->library('image_lib');
            $config['image_library'] = 'gd2';
            $config['source_image'] = $new_filepath;
            $config['maintain_ratio'] = TRUE;
    
            $this->image_lib->initialize($config);
            $this->image_lib->resize();
    
            // Return the full path of the uploaded file
            return base_url('assets/uploads/' . $new_filename);
        } else {
            $error = array('error' => $this->upload->display_errors());
            log_message('error', print_r($error, true));
            return ''; // Atau beri nilai default jika upload gagal
        }
    }
    
    public function tambah() {
        // Ambil data dari form
        $kategori_barang = $this->input->post('kategori_barang');
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $merek = $this->input->post('merek');
        $sisa_stok = $this->input->post('sisa_stok');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
    
        // Upload gambar
        $gambar_produk = $this->_upload_gambar('gambar_produk', NULL, $kategori_barang);
    
        // Masukkan data ke dalam array untuk dimasukkan ke database
        $data = array(
            'kategori_barang' => $kategori_barang,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'merek' => $merek,
            'sisa_stok' => $sisa_stok,
            'gambar_produk' => $gambar_produk,
            'deskripsi_produk' => $deskripsi_produk
        );
    
        // Insert data ke dalam tabel itemdetails
        $hasil = $this->db->insert('itemdetails', $data);
    
        if ($hasil) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan');
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan');
        }
    
        redirect('kategori');
    }
    
    public function update() {
        // Ambil data dari form
        $id_barang = $this->input->post('id_barang');
        $kategori_barang = $this->input->post('kategori_barang');
        $nama_barang = $this->input->post('nama_barang');
        $harga = $this->input->post('harga');
        $merek = $this->input->post('merek');
        $sisa_stok = $this->input->post('sisa_stok');
        $deskripsi_produk = $this->input->post('deskripsi_produk');
    
        // Upload gambar
        $gambar_produk = $this->_upload_gambar('gambar_produk', $id_barang, $kategori_barang);
    
        // Masukkan data ke dalam array untuk diupdate
        $data = array(
            'kategori_barang' => $kategori_barang,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'merek' => $merek,
            'sisa_stok' => $sisa_stok,
            'deskripsi_produk' => $deskripsi_produk
        );
    
        // Jika gambar diupload, tambahkan ke data yang akan diupdate
        if (!empty($gambar_produk)) {
            $data['gambar_produk'] = $gambar_produk;
        }
    
        // Update data berdasarkan id_barang
        $this->db->where('id_barang', $id_barang);
        $hasil = $this->db->update('itemdetails', $data);
    
        if ($hasil) {
            $this->session->set_flashdata('success', 'Data berhasil diupdate');
        } else {
            $this->session->set_flashdata('error', 'Data gagal diupdate');
        }
    
        redirect('kategori');
    }

    public function edit($id_barang) {
        // Ambil data itemdetail berdasarkan $id_barang
        $data['row'] = $this->db->get_where('itemdetails', array('id_barang' => $id_barang))->row();

        // Pastikan $data['row'] tidak kosong untuk menampilkan data di form

        $data['page'] = 'kategori';
        $data['konten'] = $this->load->view('v_kategoriManager', $data, TRUE);

        $this->load->view('widget/v_template', $data);
    }

    public function hapus($id_barang) {
        // Hapus data berdasarkan id_barang
        $this->db->where('id_barang', $id_barang);
        $hasil = $this->db->delete('itemdetails');

        if ($hasil) {
            $this->session->set_flashdata('success', 'Data berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Data gagal dihapus');
        }

        redirect('kategori');
    }
} 
?>
