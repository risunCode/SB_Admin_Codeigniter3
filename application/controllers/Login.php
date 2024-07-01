<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('v_login.php');
    }

    public function validasi (){
       $email = $this->input->post('email');
       $password = $this->input->post('password');
       $pass = md5($password);

       $cek = $this->db->query("SELECT * FROM users WHERE email = '$email' AND PASSWORD = '$pass'")->row();

       if ($cek) {
        $user_data = [
            'email'=>$cek->email,
            'nama_lengkap'=>$cek->nama_lengkap,
            'id_user'=> $cek->id_user
        ];
        $this->session->set_userdata($user_data);
        redirect('garfield');

       }else{
        $this->session->set_flashdata('error', 'User dan Password tidak terdaftar :(');
        redirect('login');
       }
    }
 
}

/* End of file: Login.php */
