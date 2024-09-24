<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M005';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/warehouse');
	}

	public function index() {

		$data['title'] 			= 'Data Gudang';
		$data['user']				= $this->session_data['user'];
		$data['datatable']	= $this->datatable();
		$this->template->_v('master/gudang/index', $data);
	}

	public function datatable() {
		$data = $this->Dbhelper->selectRawQuery("SELECT * FROM CD_GUDANG WHERE IS_DELETED <> 'Y' ORDER BY CODE ASC");

		return $data;
	}

	public function create() {

		$data['title'] 			= 'Create Gudang';
		
		$this->template->_v('master/gudang/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$post_data[strtoupper($key)] = dbClean($value);
			}



			$save = $this->Dbhelper->insertData('CD_GUDANG', $post_data);
			if ($save) {
				$this->session->set_flashdata('success', "Create data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
    return redirect($this->own_link);
	}

	public function edit($code) {

		$data['title'] 			= 'Edit Gudang';
		$data['model']			= $this->Dbhelper->selectTabelOne('*', 'CD_GUDANG', array('CODE' => $code));
		$this->template->_v('master/gudang/edit', $data);
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
			$save 	= $this->Dbhelper->updateData("CD_GUDANG", array('CODE' => $code), $update_data);		
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

