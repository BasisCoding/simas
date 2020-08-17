<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Register extends CI_Controller {
	
		public function index()
		{
			$this->load->view('register');
		}

		public function cek_register()
		{
			$key = $this->input->post('key');
			
			$this->db->select('email, username');
			$this->db->from('users');
			$this->db->where('username', $key);
			$this->db->or_where('email', $key);
			$get = $this->db->get();
			if ($get->num_rows() > 0) {
				$response = array('status'=>'error');
			}else{
				$response = array('status'=>'success');
			}

			echo json_encode($response);
		}
	
	}
	
	/* End of file Register.php */
	/* Location: ./application/controllers/Register.php */
?>