<?php
class Admin_model extends CI_Model
{
	public function user()
	{
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function get_debitur()
	{
		return $this->db->select('debitur.id, debitur.nama, debitur.nik, hasil.status, hasil.tgl_pengajuan, karakter.karakter, pekerjaan.pekerjaan, pendapatan.pendapatan, pendidikan.pendidikan, rumah.rumah, tanggungan.tanggungan')
			->join('hasil', 'debitur.id = hasil.debiturId')
			->join('karakter', 'debitur.karakterId = karakter.id')
			->join('pekerjaan', 'debitur.pekerjaanId = pekerjaan.id')
			->join('pendapatan', 'debitur.pendapatanId = pendapatan.id')
			->join('pendidikan', 'debitur.pendidikanId = pendidikan.id')
			->join('rumah', 'debitur.rumahId = rumah.id')
			->join('tanggungan', 'debitur.tanggunganId = tanggungan.id')
			->join('user', 'user.id = hasil.auditorId')
			->order_by('tgl_pengajuan', 'DESC')
			->get('debitur')
			->result_array();
	}
	public function get_auditor()
	{
		return $this->db->get_where('user', ['role_id' => 2])->result_array();
	}
	public function getEditAuditor($id)
	{
		return $this->db->get_where('user', ['id' => $id])->row_array();
	}
	public function input_auditor($gambar = 'default.jpg')
	{
		$this->db->insert('user', [
			'nik' => htmlspecialchars($this->input->post('nik')),
			'nama' => htmlspecialchars($this->input->post('nama')),
			'email' => htmlspecialchars($this->input->post('email')),
			'gambar' => $gambar,
			'password' => password_hash($this->input->post('pass1'), PASSWORD_DEFAULT),
			'role_id' => 2,
			'is_active' => 1,
			'tgl_dibuat' => time()
		]);
	}
	public function cek_nik()
	{
		return $this->db->get_where('user', ['nik' => $this->input->post('nik')])->row_array();
	}
	public function cek_email()
	{
		return $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
	}
	public function update_gambar_auditor()
	{
		$this->db->set('gambar', $this->upload->data('file_name'));
	}
	public function update_auditor()
	{
		$this->db->set([
			'nama' => htmlspecialchars($this->input->post('nama')),
			'nik' => htmlspecialchars($this->input->post('nik')),
			'is_active' => ($this->input->post('aktivasi')) ? 1 : 0
		])->where('email', $this->input->post('email'))
			->update('user');
	}
}
