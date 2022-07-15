<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jasa extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_admin');
	}

	public function website()
	{
		$data = array(
			'tittle' => "JasaKami - Website",
			'js_website' => $this->m_admin->lihat('js_website')->result(),
			'fitur' => $this->m_admin->lihat('fitur')->result(),

		);
		$this->load->view('main/template/header', $data);
		$this->load->view('main/buat_website', $data);
		$this->load->view('main/template/footer');
	}



	public function grafis()
	{
		$data['grafis'] = $this->m_admin->lihat('grafis')->result();
		$data['tittle'] = "JasaKami -  Desain Grafis";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/desain_grafis', $data);
		$this->load->view('main/template/footer');
	}

	public function video()
	{
		$this->load->view('main/template/header');
		$this->load->view('main/video_editing');
		$this->load->view('main/template/footer');
	}
}
