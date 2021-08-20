<?php


class UserModel extends CI_Model{
	public function emailCheck($credentials){
		$this->db->where('email',$credentials['email']);
		$query=$this->db->get('users');
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function registerUser($credentials){
		if ($this->db->insert('users',$credentials)) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}

	public function loginUser($credentials){
		$this->db->where('email',$credentials['email']);
		$this->db->where('password', $credentials['password']);
		$query=$this->db->get('users');
		if ($query->num_rows() > 0) {
			return TRUE;
		}
		else{
			return FALSE;
		}
	}
}