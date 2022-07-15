<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HomeAdmin extends CI_Controller
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
			$data = array(
				'banner' => $this->m_admin->lihat('banner')->result(),
				'client' => $this->m_admin->lihat('client')->result(),
				'keunggulan' => $this->m_admin->lihat('keunggulan')->result(),

			);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/home', $data);
			$this->load->view('admin/template/footer');
		}
	}
	function edit_banner()
	{


		$id = $this->input->post('id');
		$judul = $this->input->post('judul');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['gambar'];

		if (empty($gambar['name'])) {
			$data = ['judul' => $judul, 'deskripsi' => $deskripsi];
			$this->m_admin->ubah(['id' => $id], 'banner', $data);


			redirect($this->agent->referrer());
		} else {
			$config['upload_path'] = './uploads';
			$config['allowed_types'] = 'png';
			$config['file_name'] = $id;
			$config['overwrite'] = true;
			$config['max_size']     = '20000';
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);


			if (!$this->upload->do_upload('gambar')) {
				$data['error'] = $this->upload->display_errors();
				$this->session->set_flashdata('message', '<div class="alert alert-danger col-4" role="alert">
 Priksa File Foto
</div>');

				redirect($this->agent->referrer());
			} else {
				// $f = $this->db->query('SELECT foto FROM kandidat WHERE id_kandidat='.$id)->row();
				$f = $this->db->select('gambar')->get_where('banner', ['id' => $id])->row();
				unlink('./uploads' . $f->gambar);
				$data = [
					'judul' => $judul,
					'deskripsi' => $deskripsi,
					'gambar' => $this->upload->data('file_name')
				];
				$this->m_admin->ubah(['id' => $id], 'banner', $data);
				$this->session->set_flashdata('message', '<div class="alert alert-success col-4" role="alert">
 Dara Berhasil Di Ubah
</div>');
				redirect($this->agent->referrer());
			}
		}
	}
	public function tambah_unggul()
	{

		$unggul = $this->input->post('unggul');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['gambar'];

		$config['upload_path'] = './uploads/unggul/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['overwrite'] = true;
		$config['max_size']     = '20000';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data['error'] = $this->upload->display_errors();

			redirect('homeadmin');
		} else {
			$data = [
				'unggul' => $unggul,
				'deskripsi' => $deskripsi,
				'gambar' => $this->upload->data('file_name')
			];
			$this->m_admin->tambah('keunggulan', $data);

			redirect('homeadmin');
		}
	}
	public function edit_unggul()
	{
		$file_name = $this->input->post('id');
		$id = $this->input->post('id');
		$unggul = $this->input->post('unggul');
		$deskripsi = $this->input->post('deskripsi');
		$gambar = $_FILES['gambar'];

		if (empty($gambar['name'])) {
			$data = ['unggul' => $unggul, 'deskripsi' => $deskripsi];
			$this->m_admin->ubah(['id' => $id], 'keunggulan', $data);


			redirect($this->agent->referrer());
		} else {
			$config['upload_path'] = './uploads/unggul';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['file_name'] = $file_name;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar')) {
				$data['error'] = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Periksa file foto!');

				redirect($this->agent->referrer());
			} else {
				// $f = $this->db->query('SELECT foto FROM kandidat WHERE id_kandidat='.$id)->row();
				$f = $this->db->select('gambar')->get_where('keunggulan', ['id' => $id])->row();
				unlink('./uploads/unggul/' . $f->gambar);
				$data = [
					'unggul' => $unggul,
					'deskripsi' => $deskripsi,
					'gambar' => $this->upload->data('file_name')
				];
				$this->m_admin->ubah(['id' => $id], 'keunggulan', $data);
				$this->session->set_flashdata('edit', 'Data berhasil diubah');
				redirect($this->agent->referrer());
			}
		}
	}

	public function hapus_unggul($id)
	{
		$where = array('id' => $id);

		$data = $this->m_admin->ambil_id_gambar('keunggulan', $id);
		$path = './uploads/unggul/';
		@unlink($path . $data->gambar);
		if ($this->m_admin->delete_gambar('keunggulan', $id) == true) {
			# code...
			$this->m_admin->hapus($where, 'keunggulan');

			$this->session->set_flashdata('pesan', 'besahasil di hapus');
		}
		redirect('homeadmin');
	}




	public function tambah_client()
	{

		$nama = $this->input->post('nama');

		$logo = $_FILES['logo'];

		$config['upload_path'] = './uploads/client/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['overwrite'] = true;
		$config['max_size']     = '20000';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('logo')) {
			$data['error'] = $this->upload->display_errors();

			redirect('homeadmin');
		} else {
			$data = [
				'nama' => $nama,

				'logo' => $this->upload->data('file_name')
			];
			$this->m_admin->tambah('client', $data);

			redirect('homeadmin');
		}
	}
	public function edit_client()
	{
		$file_name = $this->input->post('id');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		$logo = $_FILES['logo'];

		if (empty($logo['name'])) {
			$data = ['nama' => $nama];
			$this->m_admin->ubah(['id' => $id], 'client', $data);


			redirect($this->agent->referrer());
		} else {
			$config['upload_path'] = './uploads/client';
			$config['allowed_types'] = 'jpg|png|gif';
			$config['file_name'] = $file_name;
			$config['remove_spaces'] = TRUE;
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('logo')) {
				$data['error'] = $this->upload->display_errors();
				$this->session->set_flashdata('error', 'Periksa file foto!');

				redirect($this->agent->referrer());
			} else {
				// $f = $this->db->query('SELECT foto FROM kandidat WHERE id_kandidat='.$id)->row();
				$f = $this->db->select('logo')->get_where('client', ['id' => $id])->row();
				unlink('./uploads/client/' . $f->logo);
				$data = [
					'nama' => $nama,

					'logo' => $this->upload->data('file_name')
				];
				$this->m_admin->ubah(['id' => $id], 'client', $data);
				$this->session->set_flashdata('edit', 'Data berhasil diubah');
				redirect($this->agent->referrer());
			}
		}
	}

	public function hapus_client($id)
	{
		$where = array('id' => $id);

		$data = $this->m_admin->ambil_id_gambar('client', $id);
		$path = './uploads/client/';
		@unlink($path . $data->logo);
		if ($this->m_admin->delete_gambar('client', $id) == true) {
			# code...
			$this->m_admin->hapus($where, 'client');

			$this->session->set_flashdata('pesan', 'besahasil di hapus');
		}
		redirect('homeadmin');
	}

	public function visitor()
	{

	}
}
