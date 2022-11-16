<?php
class Beranda_model extends CI_Model
{
	public function get_user($email)
	{
		return $this->db->get_where('user', ['email' => $email])->row_array();
	}
	public function get_status_debitur()
	{
		return $this->db->select('status')
			->join('hasil', 'debitur.id = hasil.debiturId')
			->where('debitur.nik', $this->input->post('keyword'))
			->order_by('hasil.tgl_pengajuan', 'DESC')
			->get('debitur')
			->row_array();
	}
}
