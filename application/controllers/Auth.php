<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


    function __Construct()
    {
        parent::__Construct();
    }

    public function index()
    {
        if ($this->session->login == true) {
            redirect('dashboard');
        } else {
            $this->load->view('admin/login');
        }
    }

    function actlogin()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // $d = $this->db->query('SELECT * FROM admin WHERE username="'.$username.'" AND password="'.$password.'"');
        $d = $this->db->get_where('admin', [
            'username' => $username,
            'password' => md5($password)


        ]);
        if ($d->num_rows() > 0) {
            $admin = $d->row();
            $data = [
                'id' => $admin->id,
                'nama' => $admin->nama,
                'username' => $admin->username,
                'login' => TRUE
            ];
            $this->session->set_userdata($data);
            // $this->db->query('UPDATE admin SET last_login="'.$last.'" WHERE id_admin='.$this->session->id);
            $this->db->where([
                'id' => $this->session->id
            ]);
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> 
            Username/Password Salah
          </div>');
            redirect('auth');
        }
    }
    function logout()
    {


        $this->session->login == false;
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Berhasil logout
      </div>');
        redirect('auth');
    }
}
