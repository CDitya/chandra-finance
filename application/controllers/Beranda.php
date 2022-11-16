<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Beranda extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('form_validation')->model('Beranda_model', 'BM');
    }
	public function index() {
		sudah_keluar();
		$data = [
			'judul' => 'Chandra Finance',
			'judulNav' => 'Masuk',
			'link' => 'beranda/login'
		];
        $this->load->view('templates/beranda_header', $data)
            ->view('beranda/index', $data)
            ->view('templates/beranda_footer');
	}
	public function login() {
		sudah_keluar();
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => 'Alamat Email tidak boleh kosong',
                'valid_email' => 'Alamat Email tidak valid'
            ])->set_rules('pass', 'Kata Sandi', 'required|trim',[
                'required' => 'Kata Sandi tidak boleh kosong'
            ]);
        if(!$this->form_validation->run()){
			$this->load->view('templates/beranda_header', [
                'judul' => 'Chandra Finance',
                'judulNav' => 'Beranda',
                'link' => ''
            ])->view('beranda/login')
            ->view('templates/beranda_footer');
        }else{
            $this->_masuk();
        }
		
	}
	private function _masuk() {
        $user = $this->BM->get_user(strtolower($this->input->post('email')));
        if(!$user){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger text-center" role="alert">Alamat email tidak terdaftar! Silahkan daftarkan akun anda sekarang</div>');
            redirect('beranda/login');
        } elseif($user['is_active'] != 1){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger text-center" role="alert">Akun Anda telah dinonaktifkan!</div>');
            redirect('beranda/login');
        } elseif(!password_verify($this->input->post('pass'), $user['password'])){
            $this->session->set_flashdata('pesan','<div class="alert alert-danger text-center" role="alert">Kata sandi salah! Silahkan diperiksa kembali</div>');
            redirect('beranda/login');
        } else {
            $this->session->set_userdata([
                'email' => $user['email'],
                'role_id' => $user['role_id']
            ]);
            redirect(($user['role_id'] == 1)? 'admin' : 'auditor');
        }
    }
    public function keluar() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan','<div class="alert alert-success text-center" role="alert">'.(($this->uri->segment(3))? 'Kata sandi berhasil diubah! Silahkan masuk kembali' : 'Anda telah berhasil keluar dari akun anda!').'</div>');
        redirect(base_url());
    }
    public function blokir() {
        $this->load->view('beranda/blokir', ['role_id' => $this->session->userdata('role_id')]);
    }
    public function getStatusDebitur() {
        echo json_encode($this->BM->get_status_debitur());
    }
}