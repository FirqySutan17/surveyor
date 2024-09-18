<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M002';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/employee');
	}

	public function index() {

		$plant = "*";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$plant 		= $this->input->post('plant');
		}

		$filter = [
			"plant"	=> $plant,
		];

		$data['title'] 			= 'Data Employee';
		$data['user']			= $this->session_data['user'];
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['datatable']		= $this->datatable($filter);
		$data['filter']			= $filter;
		$this->template->_v('master/employee/index', $data);
	}

	public function datatable($filter) {
		$query 	= "
			select
				FN_CODE_NAME('AB' , PLANT) COMPANY_NAME,
				EMPNO,
				FULL_NAME,
				EMAIL,
				TS_ASM_GSM_CCT as ROLE
			from HR_EMPLOYEE a
			where EMPNO != 'EMPNO' AND CONDITION_IN_OFFICE = '1'
		";
		if ($filter['plant'] != '*') {
			$query .= " and PLANT = '".$filter['plant']."'";
		}
		$query .= ' ORDER BY EMPNO ASC';
    $data 	= $this->db->query($query)->result_array();
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

