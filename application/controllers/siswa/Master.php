<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Master extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status') != 'login' OR $this->session->userdata('level') != 2) {
				redirect(base_url('Login'));
			}
		}
	
		public function datapribadi()
		{
			$set['title'] = 'Data Pribadi Siswa';
			$set['metaDescription'] = 'Data Pribadi Siswa';
			$set['metaKeywoard'] = 'Siswa, Data Siswa, Sistem Informasi Seleksi Siswa';

			$this->load->view('_partials/head', $set);
			$this->load->view('_partials/sidebar');
			$this->load->view('_partials/navigation');
			$this->load->view('siswa/datapribadi');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugins');
		}

		public function dataorangtua()
		{
			$set['title'] = 'Data Orang Tua Siswa';
			$set['metaDescription'] = 'Data Orang Tua Siswa';
			$set['metaKeywoard'] = 'Siswa, Data Siswa, Sistem Informasi Seleksi Siswa';

			$this->load->view('_partials/head', $set);
			$this->load->view('_partials/sidebar');
			$this->load->view('_partials/navigation');
			$this->load->view('siswa/dataorangtua');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugins');
		}

		public function datapenilaian()
		{
			$set['title'] = 'Data Penilaian Siswa';
			$set['metaDescription'] = 'Data Penilaian';
			$set['metaKeywoard'] = 'Siswa, Data Siswa, Sistem Informasi Seleksi Siswa, Penilaian Siswa';

			$this->load->view('_partials/head', $set);
			$this->load->view('_partials/sidebar');
			$this->load->view('_partials/navigation');
			$this->load->view('siswa/datapenilaian');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugins');
		}
	
	}
	
	/* End of file Master.php */
	/* Location: ./application/controllers/siswa/Master.php */
?>