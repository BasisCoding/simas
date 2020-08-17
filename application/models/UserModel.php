<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function insert($data)
		{
			$this->db->insert('users', $data);
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>