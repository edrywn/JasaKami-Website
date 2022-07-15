<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About extends CI_Controller
{


    function __Construct()
    {
        parent::__Construct();
        $this->load->model('m_admin');
    }

    public function index()
    {

        $data = array(
            'tittle' => "JasaKami - Tentang Kami",
            'about' => $this->m_admin->lihat('about')->result()


        );


        $this->load->view('main/template/header', $data);
        $this->load->view('main/about', $data);
        $this->load->view('main/template/footer');
    }
}
