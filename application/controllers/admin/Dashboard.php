<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			if ($this->session->userdata('status') != 'login' OR $this->session->userdata('level') != 1) {
				redirect(base_url('Login'));
			}
		}
	
		public function index()
		{
			$this->load->view('_partials/head');
			$this->load->view('_partials/sidebar');
			$this->load->view('_partials/navigation');
			$this->load->view('_partials/main');
			$this->load->view('_partials/footer');
			$this->load->view('_partials/plugins');
		}
	
	}
	
	/* End of file Dashboard.php */
	/* Location: ./application/controllers/Dashboard.php */
?>