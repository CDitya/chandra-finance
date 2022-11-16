<?php
class Menu_model extends CI_Model {
	public function dropdown(){
		return $this->db->select('user_dropdown_sub_menu.*')
			->from('user_akses_dropdown_menu')
			->join('user_role', 'user_akses_dropdown_menu.role_id = user_role.id')
			->join('user_menu', 'user_akses_dropdown_menu.menu_id = user_menu.id')
			->join('user_dropdown_sub_menu', 'user_menu.id = user_dropdown_sub_menu.menu_id')
			->where('user_role.id', $this->session->userdata('role_id'))
			->get()->result_array();
	}
	public function sidebar(){
		return $this->db->select('user_sub_menu.*')
			->from('user_sub_menu')
			->join('user_menu', 'user_sub_menu.menu_id = user_menu.id')
			->join('user_akses_menu', 'user_menu.id = user_akses_menu.menu_id')
			->join('user_role', 'user_akses_menu.role_id = user_role.id')
			->where('user_role.id', $this->session->userdata('role_id'))
			->get()->result_array();
	}
}