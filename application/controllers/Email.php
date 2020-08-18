<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Email extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->model('UserModel');
		}
	
		public function index()
		{
			$this->load->view('email');
		}

		public function kode($length)
		{
			$str = '';
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

			$size = strlen( $chars );
			for( $i = 0; $i < $length; $i++ ) {
				$str .= $chars[ rand( 0, $size - 1 ) ];
			}

			return $str;
		}
		
		public function send()
		{
			$this->load->library('Mailer');
		    $email_penerima = $this->input->post('email');
		    $username		= $this->input->post('username');
		    $nama_lengkap	= $this->input->post('nama_lengkap');
		    $password		= $this->input->post('password');
		    $subjek = 'Pendaftaran';
		    $pesan = 'Terima Kasih Sudah Mendaftar di Website Kami';
		    $kode = $this->kode(10);
		    $data = array(
		    	'pesan' => $pesan,
		    	'kode'	=> $kode,
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'password'	=> $password
		    );

		    $data_insert = array(
		    	'kode_aktivasi'	=> $kode,
		    	'email'	=> $email_penerima,
		    	'username'	=> $username,
		    	'nama_lengkap' => $nama_lengkap,
		    	'password'	=> hash('sha512', $this->input->post('password').config_item('encryption_key'))
		    );

		    $content = $this->load->view('message', $data, true); // Ambil isi file content.php dan masukan ke variabel $content
		    $sendmail = array(
		      'email_penerima'=>$email_penerima,
		      'subjek'=>$subjek,
		      'content'=>$content,
		    );
		    $insert = $this->UserModel->insert($data_insert);
		    $send = $this->mailer->send($sendmail); // Panggil fungsi send yang ada di librari Mailer
		    // if(empty($attachment['name'])){ // Jika tanpa attachment
		    // }else{ // Jika dengan attachment
		    //   $send = $this->mailer->send_with_attachment($sendmail); // Panggil fungsi send_with_attachment yang ada di librari Mailer
		    // }
		    if ($send) {
		    	$response = [
		    	    'status' => 'success',
		    	    'messsage' => 'Terima Kasih Sudah Mendaftar',
		    	];
		    }

		    echo json_encode($response);
		}

		public function aktivasi()
		{
			$kode = end($this->uri->segments);
			$validasi = $this->db->get_where('users', array('kode_aktivasi' => $kode));
			if ($validasi->num_rows() > 0) {
				$response = array('status' => 'Berhasil Validasi, Anda akan dialihkan ke halaman Login');
				$update_status = $this->db->update('users', array('status'=>1) ,array('kode_aktivasi' => $kode));
				$this->load->view('validasi', $response);
			}else{
				$response = array('status' => 'Gagal Validasi, Silahkan Coba Daftar kembali');
				$this->load->view('validasi', $response);
			}
			return false;
		}
	}
	
	/* End of file Email.php */
	/* Location: ./application/controllers/Email.php */
?>