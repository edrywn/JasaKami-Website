<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{


    function __Construct()
    {
        parent::__Construct();
        $this->load->model('m_admin');
    }

    public function index()
    {
        if ($this->session->login == false) {
            redirect('auth');
        } else {

            $data = [

                'jml_pengunjung' =>
                $this->m_admin->lihat('jml_pengunjung')->result()
            ];

            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/index', $data);
            $this->load->view('admin/template/footer');
        }
    }
}
