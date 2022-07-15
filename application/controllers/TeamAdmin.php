<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TeamAdmin extends CI_Controller
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
            $data['team'] = $this->m_admin->lihat('team')->result();

            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/team', $data);
            $this->load->view('admin/template/footer');
        }
    }
    public function tambah_team()
    {

        $nama = $this->input->post('nama');
        $posisi = $this->input->post('posisi');
        $deskripsi = $this->input->post('deskripsi');
        $instagram = $this->input->post('instagram');

        $gambar = $_FILES['gambar'];

        $config['upload_path'] = './uploads/team/';
        $config['allowed_types'] = 'jpg|png|gif';
        $config['overwrite'] = true;
        $config['max_size']     = '20000';
        $config['remove_spaces'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $data['error'] = $this->upload->display_errors();

            redirect('teamadmin');
        } else {
            $data = [
                'nama' => $nama,
                'posisi' => $posisi,
                'deskripsi' => $deskripsi,
                'instagram' => $instagram,
                'gambar' => $this->upload->data('file_name')
            ];
            $this->m_admin->tambah('team', $data);

            redirect('teamadmin');
        }
    }
    public function edit_team()
    {
        $file_name = $this->input->post('id');
        $id = $this->input->post('id');

        $nama = $this->input->post('nama');
        $posisi = $this->input->post('posisi');
        $deskripsi = $this->input->post('deskripsi');
        $instagram = $this->input->post('instagram');
        $gambar = $_FILES['gambar'];

        if (empty($gambar['name'])) {
            $data = ['nama' => $nama, 'posisi' => $posisi, 'deskripsi' => $deskripsi, 'instagram' => $instagram];
            $this->m_admin->ubah(['id' => $id], 'team', $data);


            redirect($this->agent->referrer());
        } else {
            $config['upload_path'] = './uploads/team';
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
                $f = $this->db->select('gambar')->get_where('team', ['id' => $id])->row();
                unlink('./uploads/team/' . $f->gambar);
                $data = [
                    'nama' => $nama,
                    'posisi' => $posisi,
                    'deskripsi' => $deskripsi,
                    'instagram' => $instagram,
                    'gambar' => $this->upload->data('file_name')
                ];
                $this->m_admin->ubah(['id' => $id], 'team', $data);
                $this->session->set_flashdata('edit', 'Data berhasil diubah');
                redirect($this->agent->referrer());
            }
        }
    }

    public function hapus_team($id)
    {
        $where = array('id' => $id);

        $data = $this->m_admin->ambil_id_gambar('team', $id);
        $path = './uploads/team/';
        @unlink($path . $data->gambar);
        if ($this->m_admin->delete_gambar('team', $id) == true) {
            # code...
            $this->m_admin->hapus($where, 'team');

            $this->session->set_flashdata('pesan', 'besahasil di hapus');
        }
        redirect('teamadmin');
    }
}
