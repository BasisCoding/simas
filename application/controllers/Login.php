<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function proses_login()
	{
		$username 	= $this->input->post('username');
			$password 	= hash('sha512', $this->input->post('password').config_item('encryption_key'));

			$result = $this->UserModel->login($username, $password);
			if ($result->num_rows() > 0) {
				foreach ($result->result() as $rs) {
					$data_session = array(
						'nama_lengkap'	=> $rs->nama_user,
						'id'			=> $rs->id,
						'level'			=> $rs->level,
						'foto'			=> $rs->foto,
						'email'			=> $rs->email,
						'nama_akses'	=> $rs->nama_group,
						'link'			=> $rs->link,
						'status' 		=> "login"
					);

					$this->session->set_userdata($data_session);
				};
				$response = array(
					'status' => 'success',
					'message' => 'Anda Berhasil Login',
					'redirect' => base_url($this->session->userdata('link')),
					);
			}else{
				$response = array(
					'status' => 'warning',
					'message' => 'Username Atau Password yang anda masukan salah!',
					'redirect' => base_url('login')
					);
			};
			
			echo json_encode($response);
	}

	public function logout()
	{
        $this->session->sess_destroy();
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
		redirect(base_url('Login'));
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
?>