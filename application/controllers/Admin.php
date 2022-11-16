<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function __construct() {
        parent::__construct();
        sudah_masuk();
        $this->load->library('form_validation')
        	->model('Admin_model', 'AM')
        	->model('Menu_model', 'MM');
    }
	public function index() {
		$data = getData($this->AM, 'Daftar Debitur');
		$data['debitur'] = $this->AM->get_debitur();
		loadView('admin/daftar_debitur', $data);
	}
	public function daftar_auditor() {
		$data = getData($this->AM, 'Daftar Auditor');
		$data['auditor'] = $this->AM->get_auditor();
		loadView('admin/daftar_auditor', $data);
	}
	public function tambah_auditor() {
		$data = getData($this->AM, 'Tambah Data Auditor');
		$this->form_validation->set_rules([
            ['field' => 'nik', 'label' => 'nik', 'rules' => 'required|trim|numeric|min_length[16]'],
            ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|trim'],
            ['field' => 'email', 'label' => 'email', 'rules' => 'required|trim|valid_email'],
            ['field' => 'pass1', 'label' => 'pass1', 'rules' => 'required|trim|min_length[8]|matches[pass2]'],
            ['field' => 'pass2', 'label' => 'pass2', 'rules' => 'required|trim|min_length[8]|matches[pass1]']
        ]);
        if(!$this->form_validation->run()){
			loadView('admin/tambah_auditor', $data);
        } else {
        	if($this->AM->cek_nik()) {
        		$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center" role="alert">Maaf, NIK telah terdaftar!</div>');
	        	redirect('admin/tambah_auditor');
	        } elseif($this->AM->cek_email()) {
	        	$this->session->set_flashdata('pesan','<div class="alert alert-danger text-center" role="alert">Maaf, Alamat Email telah terdaftar!</div>');
	        	redirect('admin/tambah_auditor');
	        } else {
				$this->load->library('upload', [
					'allowed_types' => 'gif|jpg|png',
					'max_size' => '2048',
					'upload_path' => './assets/img/profil'
				]);
                if ($this->upload->do_upload('gambar')) {
                	$this->AM->input_auditor($_FILES['gambar']['name']);
                } else {
                    $this->AM->input_auditor();
                }
				$this->session->set_flashdata('pesan','<div class="alert alert-success text-center" role="alert">Berhasil menambahkan Auditor!</div>');
				redirect('admin/daftar_auditor');
			}
        }
	}
	public function edit_auditor() {
		$data = getData($this->AM, 'Ubah Data Auditor');
		$data['auditor'] = $this->AM->getEditAuditor($this->input->get('id'));
        $this->form_validation->set_rules([
            ['field' => 'nik', 'label' => 'nik', 'rules' => 'required|trim|numeric|min_length[16]'],
            ['field' => 'nama', 'label' => 'nama', 'rules' => 'required|trim'],
            ['field' => 'email', 'label' => 'email', 'rules' => 'required|trim|valid_email']
        ]);
        if(!$this->form_validation->run()){
			loadView('admin/edit_auditor', $data);
        } else {
        	if($_FILES['gambar']){
                $this->load->library('upload', [
					'allowed_types' => 'gif|jpg|png',
					'max_size' => '2048',
					'upload_path' => './assets/img/profil'
				]);
                if ($this->upload->do_upload('gambar')) {
                    if ($data['user']['image'] != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profil/'.$data['user']['image']);
                    }
                    $this->AM->update_gambar_auditor();
                } else {
                    echo $this->upload->display_errors();
                }
			}
			$this->AM->update_auditor();
			$this->session->set_flashdata('pesan','<div class="alert alert-success text-center" role="alert">Berhasil mengubah data Auditor!</div>');
			redirect('admin/daftar_auditor');
        }
	}
}