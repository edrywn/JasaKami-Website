<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Team extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_admin');
	}

	public function index()
	{
		$data['team'] = $this->m_admin->lihat('team')->result();
		$data['tittle'] = "JasaKami - Team";

		$this->load->view('main/template/header', $data);
		$this->load->view('main/team', $data);
		$this->load->view('main/template/footer');
	}
}
