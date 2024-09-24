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
		$data = $this->Dbhelper->selectTabel('*', 'CD_GUDANG', array('IS_DELETED !=' => 'Y'), 'CODE', 'ASC');

		return $data;
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

