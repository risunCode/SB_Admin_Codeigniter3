<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
           

            'page'=>'users',
            'konten' => $this->load->view('v_users',$konten, TRUE),

        ];
        # code...
        $this->load->view('widget/v_template', $data);
    }

    public function add(){
        $konten=[

            'list'=>$this->db->query("SELECT * FROM USERS ORDER BY id_user DESC")->result(),
        ];

        $data = [
           
 
            'page'=>'users',
            'konten' => $this->load->view('v_addUser',$konten, TRUE),

        ];
        # code...
        $this->load->view('widget/v_template', $data);
        }


    public function tambah (){
        $nama_lengkap= $this->input->post('nama_lengkap');
        $username= $this->input->post('username');
        $email= $this->input->post('email');
        $password= $this->input->post('password');
        $level= $this->input->post('level');

        $data=[
            'nama_lengkap'=>$nama_lengkap,
            'username'=>$username,
            'email'=>$email,
            'password'=>md5($password),
            'level'=>$level,
        ];


        $hasil = $this->db->insert('users', $data);
        if ($hasil) {
            #code
            $this->session->set_flashdata('succes', 'Data Berhasil Disimpan');
            redirect('users');

        }else{
            $this->session->set_flashdata('error', 'Data Gagal Disimpan');
            redirect('users');
        }
    }    


    public function edit($id) {
        $cek = $this->db->query("SELECT * FROM users WHERE id_user =
        $id")->row();
        $konten = [
            'row'=>$cek,
        ];
        $data = [
            'page'=>'users',
            'konten' =>$this->load->view('v_editUser',$konten, True),
        ];
        $this->load->view('widget/v_template', $data);

}
public function update (){
    $id_user= $this->input->post('id_user');
    $nama_lengkap= $this->input->post('nama_lengkap');
    $username= $this->input->post('username');
    $email= $this->input->post('email');
    $password= $this->input->post('password');
    $level= $this->input->post('level ');

    $data=[
        'nama_lengkap'=>$nama_lengkap,
        'username'=>$username,
        'email'=>$email,
        'password'=>md5($password),
        'level'=>$level,
    ];

    $this->db->where('id_user' , $id_user);
    $hasil = $this->db->update('users', $data);
    if ($hasil) {
        #code
        $this->session->set_flashdata('succes', 'Data Berhasil Disimpan');
        redirect('users');

    }else{
        $this->session->set_flashdata('error', 'Data Gagal Disimpan');
        redirect('users');
    }
}  

public function hapus (){
    $id_user= $this->input->post('id_user');

    $this->db->where('id_user' , $id_user);
    $hasil = $this->db->delete('users');
    if ($hasil) {
        #code
        $this->session->set_flashdata('succes', 'Data Berhasil Disimpan');
        redirect('users');

    }else{
        $this->session->set_flashdata('error', 'Data Gagal Disimpan');
        redirect('users');
}


}
}

/* End of file: Users.php */