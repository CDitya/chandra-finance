<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Auditor extends CI_Controller {
	public function __construct() {
        parent::__construct();
        sudah_masuk();
        $this->load->library('form_validation')
        	->model('Auditor_model', 'AM')
        	->model('Menu_model', 'MM');
    }
	public function index() {
		$data = getData($this->AM, 'Daftar Debitur');
		$data['debitur'] = $this->AM->get_debitur($data['user']['id']);
		loadView('auditor/daftar_debitur', $data);
	}
	public function tambah_debitur() {
		$data = getData($this->AM, 'Tambah Data Debitur');
		$data['karakter'] = $this->AM->getKriteria('karakter');
		$data['pendidikan'] = $this->AM->getKriteria('pendidikan');
		$data['pekerjaan'] = $this->AM->getKriteria('pekerjaan');
		$data['tanggungan'] = $this->AM->getKriteria('tanggungan');
		$data['rumah'] = $this->AM->getKriteria('rumah');
		$data['pendapatan'] = $this->AM->getKriteria('pendapatan');
		$this->form_validation->set_rules([
            ['field' => 'nik', 'label' => 'nik', 'rules' => 'required|trim|numeric|min_length[16]'],
            ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|trim'],
            ['field' => 'karakter', 'label' => 'karakter', 'rules' => 'required|trim'],
            ['field' => 'pendidikan', 'label' => 'pendidikan', 'rules' => 'required|trim'],
            ['field' => 'pekerjaan', 'label' => 'pekerjaan', 'rules' => 'required|trim'],
            ['field' => 'tanggungan', 'label' => 'tanggungan', 'rules' => 'required|trim'],
            ['field' => 'rumah', 'label' => 'rumah', 'rules' => 'required|trim']
        ]);
		if(!$this->form_validation->run()) {
			loadView('auditor/tambah_debitur', $data);
		} else {
			$bioDebitur = [
				'auditorId' => $this->AM->user()['id'],
				'nama' => htmlspecialchars($this->input->post('nama')),
				'nik' => htmlspecialchars($this->input->post('nik')),
				'karakter' => $this->input->post('karakter'),
				'pendidikan' => $this->input->post('pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'tanggungan' => $this->input->post('tanggungan'),
				'rumah' => $this->input->post('rumah'),
				'pendapatan' => $this->input->post('pendapatan'),
			];
			$status = seleksi_debitur($bioDebitur);
			$this->AM->input_debitur($bioDebitur, $status);
			$this->session->set_flashdata('pesan','<div class="alert alert-success text-center" role="alert">Debitur berhasil ditambahkan!</div>');
	        redirect('auditor');
		}
	}
	public function profil() {
		$data = getData($this->AM, 'Profil');
		loadView('auditor/profil', $data);
	}
}