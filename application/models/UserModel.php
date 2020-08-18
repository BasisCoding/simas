<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class UserModel extends CI_Model {
	
		function insert($data)
		{
			$this->db->insert('users', $data);
		}

		function login($username, $password)
		{
			$this->db->select('*');
			$this->db->from('users');
			$this->db->join('users_group', 'users_group.level = users.id_level', 'left');
			$this->db->where('users.username', $username);
			$this->db->where('users.password', $password);
			$this->db->where('users.status', 1);
			$this->db->limit(1);
			return $this->db->get();
		}
	
	}
	
	/* End of file UserModel.php */
	/* Location: ./application/models/UserModel.php */
?>