<?php
function sudah_masuk(){
	$ci = get_instance();
	if(!$ci->session->userdata('email')) {
		redirect(base_url());
	}else{
		if($ci->uri->segment(1) != 'password') {
			if($ci->db->get_where('user_akses_menu', [
				'role_id' => $ci->session->userdata('role_id'), 
				'menu_id' => $ci->db->get_where('user_menu', [
					'menu' => $ci->uri->segment(1)])->row_array()['id']
				])->num_rows() < 1) {
				redirect('beranda/blokir');
			}
		}
	}
}
function sudah_keluar() {
	$ci = get_instance();
	if($ci->session->userdata('role_id')) {
		redirect(base_url(($ci->session->userdata('role_id') == 1)? 'admin' : 'auditor'));
	}
}
function loadView($dir, $data) {
	get_instance()->load->view('templates/user_header',$data)
		->view('templates/user_sidebar',$data)
		->view('templates/user_topbar',$data)
		->view($dir, $data)
		->view('templates/user_footer');
}
function getData($model, $judul) {
	$ci = get_instance();
	return [
		'judul' => $judul,
		'user' => $model->user(),
		'dropdown_menu' => $ci->MM->dropdown(),
		'sidebar_menu' => $ci->MM->sidebar()
	];
}
function configPagination($baseUrl, $totRows) {
	return [
		'base_url' => $baseUrl,
		'total_rows' => $totRows,
		'per_page' => 5
	];
}
function seleksi_debitur($bioDebitur) {
	if($bioDebitur['karakter'] == 'Sangat Baik') {
		$hasil = 'Layak';
	} elseif($bioDebitur['karakter'] == 'Baik') {
		if($bioDebitur['tanggungan'] == '0 orang') {
			$hasil = 'Layak';
		} elseif($bioDebitur['tanggungan'] == '1-2 orang') {
			$hasil = 'Layak';
		} elseif($bioDebitur['tanggungan'] == '3-4 orang') {
			$hasil = 'Layak';
		} elseif($bioDebitur['tanggungan'] == '5 orang') {
			$hasil = 'Layak';
		} else {
			if($bioDebitur['pekerjaan'] == 'Karyawan') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pekerjaan'] == 'PNS/BUMN') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pekerjaan'] == 'Profesi') {
				$hasil = 'Layak';
			} elseif($bioDebitur['pekerjaan'] == 'Wiraswasta') {
				$hasil = 'Layak';
			} else {
				$hasil = 'Tidak Layak';
			}
		}
	} elseif($bioDebitur['karakter'] == 'Cukup') {
		if($bioDebitur['rumah'] == 'Kost/Kontrak') {
			if($bioDebitur['pekerjaan'] == 'Karyawan') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pekerjaan'] == 'PNS/BUMN') {
				$hasil = 'Layak';
			} elseif($bioDebitur['pekerjaan'] == 'Profesi') {
				$hasil = 'Layak';
			} elseif($bioDebitur['pekerjaan'] == 'Wiraswasta') {
				$hasil = 'Layak';
			} else {
				if($bioDebitur['tanggungan'] == '0 orang') {
					$hasil = 'Layak';
				} elseif($bioDebitur['tanggungan'] == '1-2 orang') {
					$hasil = 'Tidak Layak';
				} elseif($bioDebitur['tanggungan'] == '3-4 orang') {
					$hasil = 'Layak';
				} elseif($bioDebitur['tanggungan'] == '5 orang') {
					$hasil = 'Tidak Layak';
				} else {
					$hasil = 'Tidak Layak';
				}
			}
		} elseif($bioDebitur['rumah'] == 'KPR') {
			if($bioDebitur['pekerjaan'] == 'Karyawan') {
				$hasil = 'Layak';
			} elseif($bioDebitur['pekerjaan'] == 'PNS/BUMN') {
				if($bioDebitur['pendidikan'] == 'SD/MI') {
					$hasil = 'Tidak Layak';
				} elseif($bioDebitur['pendidikan'] == 'SLTP/SMP') {
					$hasil = 'Tidak Layak';
				} elseif($bioDebitur['pendidikan'] == 'SLTA/SMA') {
					$hasil = 'Tidak Layak';
				} elseif($bioDebitur['pendidikan'] == 'Diploma 3') {
					$hasil = 'Layak';
				} else {
					$hasil = 'Layak';
				}
			} elseif($bioDebitur['pekerjaan'] == 'Profesi') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pekerjaan'] == 'Wiraswasta') {
				$hasil = 'Tidak Layak';
			} else {
				$hasil = 'Layak';
			}
		} elseif($bioDebitur['rumah'] == 'Milik Instansi') {
			if($bioDebitur['pendidikan'] == 'SD/MI') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pendidikan'] == 'SLTP/SMP') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pendidikan'] == 'SLTA/SMA') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['pendidikan'] == 'Diploma 3') {
				$hasil = 'Layak';
			} else {
				$hasil = 'Tidak Layak';
			}
		} elseif($bioDebitur['rumah'] == 'Milik Keluarga') {
			$hasil = 'Layak';
		} else {
			$hasil = 'Layak';
		}
	} elseif($bioDebitur['karakter'] == 'Kurang') {
		if($bioDebitur['tanggungan'] == '0 orang') {
			$hasil = 'Tidak Layak';
		} elseif($bioDebitur['tanggungan'] == '1-2 orang') {
			if($bioDebitur['rumah'] == 'Kost/Kontrak') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['rumah'] == 'KPR') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['rumah'] == 'Milik Instansi') {
				$hasil = 'Tidak Layak';
			} elseif($bioDebitur['rumah'] == 'Milik Keluarga') {
				$hasil = 'Layak';
			} else {
				$hasil = 'Layak';
			}
		} elseif($bioDebitur['tanggungan'] == '3-4 orang') {
			$hasil = 'Tidak Layak';
		} elseif($bioDebitur['tanggungan'] == '5 orang') {
			$hasil = 'Tidak Layak';
		} else {
			$hasil = 'Tidak Layak';
		}
	} else {
		$hasil = 'Tidak Layak';
	}
	return $hasil;
}