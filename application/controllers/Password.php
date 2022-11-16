<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Password extends CI_Controller {
	public function __construct() {
        parent::__construct();
        sudah_masuk();
        $this->load->library('form_validation')
        	->model('Password_model', 'PM')
        	->model('Menu_model', 'MM');
    }
	public function index(){
		$data = getData($this->PM, 'Password');
		$this->form_validation->set_rules('pw1', 'Kata sandi lama', 'required|trim', [
			'required' => 'Kata sandi lama harus diisi'
		]);
	    $this->form_validation->set_rules('pw2', 'Kata sandi baru', 'required|trim|min_length[3]|matches[pw3]', [
	    	'required' => 'Kata sandi baru harus diisi',
	    	'min_length' => 'Minimal 3 karakter',
	    	'matches' => 'Harus sama dengan konfirmasi kata sandi'
	    ]);
	    $this->form_validation->set_rules('pw3', 'Konfirmasi kata sandi', 'required|trim|matches[pw2]', [
	    	'required' => 'Konfirmasi kata sandi harus diisi',
	    	'matches' => 'Harus sama dengan kata sandi baru'
	    ]);
	    if(!$this->form_validation->run()){
			loadView('password/index', $data);
		}else{
			if(!password_verify($this->input->post('pw1'), $data['user']['password'])){
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kata sandi lama tidak cocok!</div>');
				redirect('password');
			}else{
				if($this->input->post('pw1') == $this->input->post('pw2')){
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Kata sandi baru tidak boleh sama dengan kata sandi lama!</div>');
					redirect('password');
				}else{
					$this->PM->ganti_pw($this->input->post('pw2'));
					redirect('beranda/keluar/1');
				}
			}
		}
	}
}