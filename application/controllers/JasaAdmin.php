<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JasaAdmin extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_admin');
	}

	public function website()
	{
		if ($this->session->login == false) {
			redirect('auth');
		} else {
			$data = array(
				'js_website' => $this->m_admin->lihat('js_website')->result(),
				'fitur' => $this->m_admin->lihat('fitur')->result(),

			);
			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/buat_website', $data);
			$this->load->view('admin/template/footer');
		}
	}


	public function tambah_fitur()
	{
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');

		$data = [
			'nama' => $nama,
			'deskripsi' => $deskripsi

		];
		$this->m_admin->tambah('fitur', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Fitur berhasil ditambah
          </div>');
		redirect('jasaadmin/website');
	}


	public function edit_fitur()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$deskripsi = $this->input->post('deskripsi');


		$data = [
			'nama' => $nama,
			'deskripsi' => $deskripsi,
		];
		$this->m_admin->ubah(['id' => $id], 'fitur', $data);


		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
		Fitur berhasil Diubah
	  </div>');
		redirect('jasaadmin');
	}

	public function hapus_fitur($id)
	{
		$where = array('id' => $id);
		$this->m_admin->hapus($where, 'fitur');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><small> 
        Kategori berhasil Dihapus</small>
      </div>');

		redirect('jasaadmin/website');
	}



	public function tambah_paket()
	{

		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$promo = $this->input->post('promo');
		$fitur = implode(",", $this->input->post('fitur'));
		$tag = $this->input->post('tag');
		$gambar = $_FILES['gambar'];

		// $fitur = "";
		// foreach ($tmp as $tmp) {
		// 	$fitur = $tmp . ", ";
		// }

		$config['upload_path'] = './uploads/website/';
		$config['allowed_types'] = 'jpg|png|gif';
		$config['overwrite'] = true;
		$config['max_size']     = '20000';
		$config['remove_spaces'] = TRUE;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data['error'] = $this->upload->display_errors();

			redirect('jasaadmin/website');
		} else {

			if (!$tag) {

				$data = [
					'nama' => $nama,
					'harga' => $harga,
					'promo' => $promo,
					'fitur' => $fitur,


					'gambar' => $this->upload->data('file_name')
				];
				$this->m_admin->tambah('js_website', $data);

				redirect('jasaadmin/website');
			}

			$data = [
				'nama' => $nama,
				'harga' => $harga,
				'promo' => $promo,
				'fitur' => $fitur,

				'tag' => $tag,
				'gambar' => $this->upload->data('file_name')
			];
			$this->m_admin->tambah('js_website', $data);

			redirect('jasaadmin/website');
		}
	}
	public function edit_paket()
	{
		$file_name = $this->input->post('id');
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$promo = $this->input->post('promo');
		$fitur = implode(",", $this->input->post('fitur'));
		$tag = $this->input->post('tag');
		$gambar = $_FILES['gambar'];

		if (empty($gambar['name'])) {
			$data = [
				'nama' => $nama,
				'harga' => $harga,
				'promo' => $promo,
				'fitur' => $fitur,
				'tag' => $tag
			];
			$this->m_admin->ubah(['id' => $id], 'js_website', $data);


			redirect($this->agent->referrer());
		} else {
			$config['upload_path'] = './uploads/website';
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
				$f = $this->db->select('gambar')->get_where('js_website', ['id' => $id])->row();
				unlink('./uploads/website/' . $f->gambar);
				$data = [
					'nama' => $nama,
					'harga' => $harga,
					'promo' => $promo,
					'fitur' => $fitur,
					'tag' => $tag,
					'gambar' => $this->upload->data('file_name')
				];
				$this->m_admin->ubah(['id' => $id], 'js_website', $data);
				$this->session->set_flashdata('edit', 'Data berhasil diubah');
				redirect($this->agent->referrer());
			}
		}
	}

	public function hapus_paket($id)
	{
		$where = array('id' => $id);

		$data = $this->m_admin->ambil_id_gambar('js_website', $id);
		$path = './uploads/website/';
		@unlink($path . $data->gambar);
		if ($this->m_admin->delete_gambar('js_website', $id) == true) {
			# code...
			$this->m_admin->hapus($where, 'js_website');

			$this->session->set_flashdata('pesan', 'besahasil di hapus');
		}
		redirect('jasaadmin/website');
	}



	public function grafis()
	{
		if ($this->session->login == false) {
			redirect('auth');
		} else {

			$data['grafis'] = $this->m_admin->lihat('grafis')->result();

			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/desain_grafis', $data);
			$this->load->view('admin/template/footer');
		}
	}

	public function tambah_grafis()
	{
		$nama = $this->input->post('nama');


		$data = [
			'nama' => $nama,


		];
		$this->m_admin->tambah('grafis', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Fitur berhasil ditambah
          </div>');
		redirect('jasaadmin/grafis');
	}


	public function hapus_grafis($id)
	{
		$where = array('id' => $id);
		$this->m_admin->hapus($where, 'grafis');

		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><small> 
        Kategori berhasil Dihapus</small>
      </div>');

		redirect('jasaadmin/grafis');
	}


	public function video()
	{
		if ($this->session->login == false) {
			redirect('auth');
		} else {



			$this->load->view('admin/template/header');
			$this->load->view('admin/template/sidebar');
			$this->load->view('admin/video_editing');
			$this->load->view('admin/template/footer');
		}
	}
}
