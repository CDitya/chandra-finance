<?php
class Auditor_model extends CI_Model
{
	public function user()
	{
		return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
	}
	public function get_debitur($auditorId)
	{
		return $this->db->select('debitur.*, hasil.status, hasil.tgl_pengajuan, hasil.debiturId, hasil.auditorId, karakter.karakter, pekerjaan.pekerjaan, pendapatan.pendapatan, pendidikan.pendidikan, rumah.rumah, tanggungan.tanggungan')
			->join('hasil', 'debitur.id = hasil.debiturId')
			->join('karakter', 'debitur.karakterId = karakter.id')
			->join('pekerjaan', 'debitur.pekerjaanId = pekerjaan.id')
			->join('pendapatan', 'debitur.pendapatanId = pendapatan.id')
			->join('pendidikan', 'debitur.pendidikanId = pendidikan.id')
			->join('rumah', 'debitur.rumahId = rumah.id')
			->join('tanggungan', 'debitur.tanggunganId = tanggungan.id')
			->where('auditorId', $auditorId)
			->order_by('tgl_pengajuan', 'DESC')
			->get('debitur')
			->result_array();
	}
	private function _getKriteriaId($kriteria, $elemen)
	{
		return $this->db->get_where($kriteria, [$kriteria => $elemen])->row_array()['id'];
	}
	public function input_debitur($bioDebitur, $status)
	{
		$debitur = [
			'nama' => $bioDebitur['nama'],
			'nik' => $bioDebitur['nik'],
			'karakterId' => $this->_getKriteriaId('karakter', $bioDebitur['karakter']),
			'pendidikanId' => $this->_getKriteriaId('pendidikan', $bioDebitur['pendidikan']),
			'pekerjaanId' => $this->_getKriteriaId('pekerjaan', $bioDebitur['pekerjaan']),
			'tanggunganId' => $this->_getKriteriaId('tanggungan', $bioDebitur['tanggungan']),
			'rumahId' => $this->_getKriteriaId('rumah', $bioDebitur['rumah']),
			'pendapatanId' => $this->_getKriteriaId('pendapatan', $bioDebitur['pendapatan'])
		];
		if (!$this->db->get_where('debitur', $debitur)->row_array()) {
			$this->db->insert('debitur', $debitur);
		}
		$this->_inputHasil($debitur, $bioDebitur, $status);
	}
	private function _inputHasil($debitur, $bioDebitur, $status)
	{
		$this->db->insert('hasil', [
			'debiturId' => $this->db->get_where('debitur', $debitur)->row_array()['id'],
			'auditorId' => $bioDebitur['auditorId'],
			'status' => $status,
			'tgl_pengajuan' => time()
		]);
	}
	public function getKriteria($kriteria)
	{
		$hasil = [];
		foreach ($this->db->get($kriteria)->result_array() as $elemen) {
			array_push($hasil, $elemen[$kriteria]);
		}
		return $hasil;
	}
}
