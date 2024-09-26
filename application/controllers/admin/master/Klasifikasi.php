<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M005';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/klasifikasi');
	}

	public function index() {

		$data['title'] 			= 'CLASSIFICATION';
		$data['user']				= $this->session_data['user'];
		$data['datatable']	= $this->datatable();
		// dd($data['datatable']);
		$this->template->_v('master/klasifikasi/index', $data);
	}

	public function datatable() {
		$data = $this->Dbhelper->selectRawQuery("SELECT * FROM CD_KLASIFIKASI WHERE IS_DELETED IS NULL ORDER BY CODE ASC");

		return $data;
	}

	public function create() {

		$data['title'] 			= 'CLASSIFICATION';
		
		$this->template->_v('master/klasifikasi/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			// dd($post);
			$klasifikasi_no = $this->generateKlasifikasiNo();
			try {
				$klasifikasi_data = [
					"CODE"		        => $klasifikasi_no,
					"CLASSIFICATION"	=> dbClean($post['classification']),
					"REMARKS"	        => dbClean($post['remarks']),
					"IS_DELETED"		=> NULL,
				];

				$save = $this->Dbhelper->insertData('CD_KLASIFIKASI', $klasifikasi_data);
				
				if ($save) {
					$this->session->set_flashdata('success', "Create data success");
					return redirect($this->own_link);
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function edit($code) {

		$data['title'] 			= 'CLASSIFICATION';
		$data['model']			= $this->Dbhelper->selectTabelOne('*', 'CD_KLASIFIKASI', array('CODE' => $code));
		$this->template->_v('master/klasifikasi/edit', $data);
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$key = strtoupper($key);
				$post_data[$key] = dbClean($value);
			}

			$code = $post_data['CODE'];
			unset($post_data['CODE']);
			$save 	= $this->Dbhelper->updateData("CD_KLASIFIKASI", array('CODE' => $code), $post_data);		
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link."/edit/".$code);
		}
		$this->session->set_flashdata('error', "Access denied");
    return redirect($this->own_link);
	}

    private function generateKlasifikasiNo() {
        $generated_no = "CLS";
        $no = 1;
        $data = $this->Dbhelper->selectTabel('CODE', 'CD_KLASIFIKASI', array(), 'CODE', 'DESC');
		$no 	= count($data) + 1;
        if ($no < 10) {
            $no = "000".$no;
        } elseif ($no >= 10 && $no < 100) {
            $no = "00".$no;
        } elseif ($no >= 100 && $no < 1000) {
            $no = "0".$no;
        }

        $generated_no = $generated_no.$no;
        return $generated_no;
    }

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}