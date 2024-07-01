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
            $upload_data = $this->upload->data();
            $original_name = $upload_data['file_name'];
            $ext = pathinfo($original_name, PATHINFO_EXTENSION);
    
            // Generate new filename based on id_barang
            $new_filename = $id_barang . '.' . $ext;
            $new_filepath = $config['upload_path'] . $new_filename;
    
            // Check if file with the same name already exists
            if (file_exists($new_filepath)) {
                // If exists, generate a unique filename
                $new_filename = uniqid($id_barang . '_') . '.' . $ext;
                $new_filepath = $config['upload_path'] . $new_filename;
            }
    
            // Move uploaded file to new filepath
            if (!rename($upload_data['full_path'], $new_filepath)) {
                // If renaming fails, handle the error (optional)
                $error = array('error' => 'Failed to rename file.');
                log_message('error', print_r($error, true));
                return ''; // Atau beri nilai default jika upload gagal
            }
    
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
        $jenis_produk = $this->input->post('jenis_produk');
    
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
            'deskripsi_produk' => $deskripsi_produk,
            'jenis_produk' => $jenis_produk
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
        $jenis_produk = $this->input->post('jenis_produk');
    
        // Upload gambar
        $gambar_produk = $this->_upload_gambar('gambar_produk', $id_barang, $kategori_barang);
    
        // Masukkan data ke dalam array untuk diupdate
        $data = array(
            'kategori_barang' => $kategori_barang,
            'nama_barang' => $nama_barang,
            'harga' => $harga,
            'merek' => $merek,
            'sisa_stok' => $sisa_stok,
            'deskripsi_produk' => $deskripsi_produk,
            'jenis_produk' => $jenis_produk
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
