<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('v_register');
    }

    public function add() { 
        $nama_lengkap = $this->input->post('nama_lengkap');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password'); 
        $cek = $this->db->get_where('users', array('email' => $email))->row();
        if ($cek) {
            $this->session->set_flashdata('error', 'Maaf, email sudah terdaftar.');
            redirect('register');
        }
    
        // Hash the password securely
        //$hashed_password
        //$hashed_password = password_hash($password, PASSWORD_BCRYPT); 
     
        $data = [
            'nama_lengkap' => $nama_lengkap,
            'username' => $username,
            'email' => $email,
            'password' => @md5($password),
            'created_at' => date('Y-m-d H:i:s'),
            'level' => '1'
        ];
    
        // Insert data into the database
        $this->db->insert('users', $data);
    
        // Set flash data and redirect
        $this->session->set_flashdata('success', 'Data berhasil disimpan!');
        redirect('register');
    }
}    