<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AboutAdmin extends CI_Controller
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

            $data['about'] = $this->m_admin->lihat('about')->result();

            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/about', $data);
            $this->load->view('admin/template/footer');
        }
    }

    public function edit_about()
    {

        $file_name = $this->input->post('id');
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $deskripsi = $this->input->post('deskripsi');
        $gambar = $_FILES['gambar'];

        if (empty($gambar['name'])) {
            $data = ['judul' => $judul, 'deskripsi' => $deskripsi];
            $this->m_admin->ubah(['id' => $id], 'about', $data);


            redirect($this->agent->referrer());
        } else {
            $config['upload_path'] = FCPATH . '/uploads/about';
            $config['allowed_types'] = 'jpg|png|gif';
            $config['file_name'] = $file_name;
            $config['overwrite'] = true;

            $config['remove_spaces'] = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('gambar')) {
                $data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error', 'Periksa file foto!');

                redirect($this->agent->referrer());
            } else {
                // $f = $this->db->query('SELECT foto FROM kandidat WHERE id_kandidat='.$id)->row();
                $f = $this->db->select('gambar')->get_where('about', ['id' => $id])->row();
                unlink('./uploads/about' . $f->gambar);
                $data = [
                    'judul' => $judul,
                    'deskripsi' => $deskripsi,
                    'gambar' => $this->upload->data('file_name')
                ];
                $this->m_admin->ubah(['id' => $id], 'about', $data);
                $this->session->set_flashdata('edit', 'Data berhasil diubah');
                redirect($this->agent->referrer());
            }
        }
    }

    public function wa()
    {

        // if (isset($_POST['submit'])) {
        //     $nama = $_POST['nama'];
        //     $deskripsi = $_POST['deskripsi'];
        //     $pesan = $_POST['pesan'];
        //     $no = $_POST['no'];

        //     header("location:https://api.whatsapp.com/send?phone=$no&text=Nama%20:%20$nama%20tentang%20:%20$subjek%20pesan%20saya%20:%20$pesan");
        // } else {
        //     echo "            <script>
        //     window.location=history.go(-1)
        //     </script>            
        //     ";
        // }




        // file_get_contents("https://api.whatsapp.com/send?phone=$no&text=Nama%20:%20$nama%20tentang%20:%20$subjek%20pesan%20saya%20:%20$pesan");




        # code...
    }
}
