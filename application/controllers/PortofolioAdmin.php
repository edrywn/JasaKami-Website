<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PortofolioAdmin extends CI_Controller
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
                'tb_filter' => $this->m_admin->lihat('tb_filter')->result(),
                'portofolio' => $this->m_admin->lihat('portofolio')->result(),


            );
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/portofolio', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function tambah_kategori()
    {
        $filter = $this->input->post('filter');

        $data = [
            'filter' => $filter

        ];
        $this->m_admin->tambah('tb_filter', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> 
            Kategori berhasil ditambah
          </div>');
        redirect('portofolioadmin');
    }
    public function hapus_kategori($id)
    {
        $where = array('id' => $id);
        $this->m_admin->hapus($where, 'tb_filter');

        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"><small> 
        Kategori berhasil Dihapus</small>
      </div>');

        redirect('portofolioadmin');
    }

    public function tambah_portofolio()
    {

        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama');
        $deskripsi = $this->input->post('deskripsi');
        $link = $this->input->post('link');

        $gambar = $_FILES['gambar'];

        $config['upload_path'] = './uploads/portofolio/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['overwrite'] = true;
        $config['max_size']     = '20000';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data['error'] = $this->upload->display_errors();

            redirect('portofolioadmin');
        } else {
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'deskripsi' => $deskripsi,
                'link' => $link,
                'kategori' => $kategori,
                'gambar' => $this->upload->data('file_name')
            ];
            $this->m_admin->tambah('portofolio', $data);

            redirect('portofolioadmin');
        }
    }
    public function edit_portofolio()
    {
        $file_name = $this->input->post('id');
        $id = $this->input->post('id');
        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama');
        $link = $this->input->post('link');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $_FILES['gambar'];

        if (empty($gambar['name'])) { 
            $data = [
                'nama' => $nama,
                'kategori' => $kategori,
                'deskripsi' => $deskripsi,
                'link' => $link
            ];
            $this->m_admin->ubah(['id' => $id], 'portofolio', $data);


            redirect($this->agent->referrer());
        } else {
            $config['upload_path'] = './uploads/portofolio';
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
                $f = $this->db->select('gambar')->get_where('portofolio', ['id' => $id])->row();
                unlink('./uploads/portofolio/' . $f->gambar);
                $data = [
                    'nama' => $nama,
                    'kategori' => $kategori,
                    'deskripsi' => $deskripsi,
                    'link' => $link,
                    'gambar' => $this->upload->data('file_name')
                ];
                $this->m_admin->ubah(['id' => $id], 'portofolio', $data);
                $this->session->set_flashdata('edit', 'Data berhasil diubah');
                redirect($this->agent->referrer());
            }
        }
    }

    public function hapus_portofolio($id)
    {
        $where = array('id' => $id);

        $data = $this->m_admin->ambil_id_gambar('portofolio', $id);
        $path = './uploads/portofolio/';
        @unlink($path . $data->gambar);
        if ($this->m_admin->delete_gambar('portofolio', $id) == true) {
            # code...
            $this->m_admin->hapus($where, 'portofolio');

            $this->session->set_flashdata('pesan', 'besahasil di hapus');
        }
        redirect('portofolioadmin');
    }
}
