<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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
			$data['admin'] = $this->m_admin->lihat('admin')->result();

			$this->load->view('admin/template/header', $data);
			$this->load->view('admin/template/sidebar', $data);
			$this->load->view('admin/setting', $data);
			$this->load->view('admin/template/footer');
		}
	}

	public function tambah_admin()
	{
		$this->form_validation->set_rules('nama', 'nama', 'trim|required|min_length[1]|max_length[255]');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[1]|max_length[255]|is_uniqe');
		$this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');

		if ($this->form_validation->run() == true) {
			$nama = $this->input->post('nama');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));

			$data = [
				'nama' => $nama,
				'username' => $username,
				'password' => $password,

			];
			$this->m_admin->tambah('admin', $data);
			redirect('setting');
		} else {
			$this->session->set_flashdata('error', validation_errors());
			redirect('setting');
		}
	}

	function edit_admin()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');


		$where = ['id' => $id];
		$data = ['nama' => $nama, 'username' => $username];
		$this->m_admin->ubah($where, 'admin', $data);
		redirect('setting');
	}

	function hapus_admin($id)
	{
		$where = array('id' => $id);
		$this->m_admin->hapus($where, 'admin');
		redirect('setting');
	}
}
