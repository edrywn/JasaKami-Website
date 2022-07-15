<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Portofolio extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$data = array(
			'tb_filter' => $this->m_admin->lihat('tb_filter')->result(),
			'portofolio' => $this->m_admin->lihat('portofolio')->result(),
			'tittle' => "JasaKami - Portofolio"


		);
		$this->load->view('main/template/header', $data);
		$this->load->view('main/portofolio', $data);
		$this->load->view('main/template/footer');
	}
}
