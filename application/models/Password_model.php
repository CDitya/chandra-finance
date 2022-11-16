<?php
class Password_model extends CI_Model{
	public function user(){
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function ganti_pw($pw){
		$this->db->set('password', password_hash($pw, PASSWORD_DEFAULT))
			->where('email', $this->session->userdata('email'))
			->update('user');
	}
}