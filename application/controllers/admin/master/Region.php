<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Region extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M002';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/region');
	}

	public function index() {

		$data['title'] 			= 'Data Region';
		$data['user']				= $this->session_data['user'];
		$data['datatable']	= $this->datatable();
		$this->template->_v('master/region/index', $data);
	}

	public function datatable() {
		$data = $this->Dbhelper->selectTabel('HEAD_CODE, CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'CS02', 'CODE !=' => '*'), 'CODE', 'ASC');

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

