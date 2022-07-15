<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{


	function __Construct()
	{
		parent::__Construct();
		$this->load->model('m_admin');
	}

	public function index()
	{


		$ip    = $this->input->ip_address();
		$date  = date("Y-m-d");
		$waktu = time();
		$timeinsert = date("Y-m-d H:i:s");
		$hits = 1;

		$s = $this->m_admin->ambil_visit('visit', $ip, $date);

		// $s = $this->db->query("SELECT * FROM visit WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
		$ss = isset($s) ? ($s) : 0;


		if ($ss == 0) {
			$data = [

				'ip' => $ip,
				'date' => $date,
				'hits' => $hits,
				'online' => $waktu,
				'time' => $timeinsert

			];

			$this->m_admin->tambah('visit', $data);
			// $this->db->query("INSERT INTO visit(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
		} else {

			$data = [

				'ip' => $ip,
				'date' => $date,
				'hits' => $hits + 1,
				'online' => $waktu,
				'time' => $timeinsert

			];

			$this->m_admin->ubah_visit('visit', $data, $ip, $date);

			// $this->db->query("UPDATE visit SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
		}


		$pengunjunghariini  = $this->db->query("SELECT * FROM visit WHERE date='" . $date . "' GROUP BY ip")->num_rows();
		$dbpengunjung = $this->db->query("SELECT COUNT(hits) as hits FROM visit")->row();
		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hits) : 0; // hitung total pengunjung
		$bataswaktu = time() - 300;
		$pengunjungonline  = $this->db->query("SELECT * FROM visit WHERE online > '" . $bataswaktu . "'")->num_rows(); // hitung pengunjung online

		$data1 = [
			'today' => $pengunjunghariini,
			'total' => $totalpengunjung,
			'online' => $pengunjungonline

		];
		$this->m_admin->ubah(['id' => 3], 'jml_pengunjung', $data1);


		$data = array(
			'tittle' => "JasaKami - Home",
			'js_website' => $this->m_admin->lihat('js_website')->result(),
			'fitur' => $this->m_admin->lihat('fitur')->result(),
			'banner' => $this->m_admin->lihat('banner')->result(),
			'client' => $this->m_admin->lihat('client')->result(),
			'keunggulan' => $this->m_admin->lihat('keunggulan')->result(),

		);

		$this->load->view('main/template/header', $data);

		$this->load->view('main/home', $data);
		$this->load->view('main/template/footer');
	}
}
