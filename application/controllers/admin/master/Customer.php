<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M003';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/customer');
	}

	public function index() {
		$plant = "*";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$plant 		= $this->input->post('plant');
		}

		$filter = [
			"plant"	=> $plant,
		];

		$data['title'] 			= 'Data Customer';
		$data['user']			= $this->session_data['user'];
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['datatable']		= $this->datatable($filter);
		$data['filter']			= $filter;
		$this->template->_v('master/customer/index', $data);
	}

	public function edit($parameter_id) {
		$explode = explode('%7C', $parameter_id);

		$companyCode 	= $explode[0];
		$customerCode 	= $explode[1];
		$filter = ['plant' => $companyCode, 'customer' => $customerCode];
		$model = $this->detail_data($filter);
		$data['title'] 			= 'Edit Customer';
		$data['model']			= $model;
		$data['user_cct'] 	= $this->Dbhelper->selectTabel('EMPNO, FULL_NAME', 'HR_EMPLOYEE', array('PLANT' => $companyCode), 'EMPNO', 'ASC');
		// dd($data);
		$this->template->_v('master/customer/edit', $data);
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$post_data[$key] = dbClean($value);
			}

			$update_data = [
				'COLLECTOR_EMPLOYEE_ID'		=> $post_data['COLLECTOR_EMPLOYEE_ID'],
			];

			$save 	= $this->Dbhelper->updateData("CD_CUSTOMER", array('SALES_ORG' => $post_data['company_code'], 'CUSTOMER' => $post_data['customer_code']), $update_data);		
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function detail_data($filter) {
		$query = $this->query_data($filter);
    $data = $this->db->query($query)->row_array();
		return $data;
	}

	public function datatable($filter) {
		$query = $this->query_data($filter);
    $data = $this->db->query($query)->result_array();
		return $data;
	}

	public function query_data($filter) {
		$query = "
			select
				a.SALES_ORG as COMPANY_CODE,
				a.CUSTOMER as CUSTOMER_CODE,
				a.CUSTOMER_NAME,
				a.STREET,
				a.STREET_2,
				a.STREET_3,
				a.STREET_4,
				a.TELEPHONE,
				a.TELEPHONE_2,
				a.FAX,
				a.TAX_NUMBER,
				a.CHIEF,
				a.REGION,
				a.SALES_OFFICE,
				a.SALES_GROUP,
				FN_CODE_NAME('AB' , a.SALES_ORG) COMPANY_NAME,
				FN_CODE_NAME('CS05', a.CUSTOMER_GROUP) CUSTOMER_GROUP_NAME,
				FN_CODE_NAME('CS11', a.CUSTOMER_GROUP_2) CUSTOMER_GROUP_NAME_2,
				FN_CODE_NAME('CS03', a.PAYMENT_TERMS) PAYMENT_TERMS_NAME,
				FN_CODE_NAME('CS02', a.REGION) REGION_NAME,
				FN_CODE_NAME('AC01', a.SALES_OFFICE) SALES_OFFICE_NAME,
				FN_CODE_NAME('AC02', a.SALES_GROUP) SALES_GROUP_NAME,
				FN_CUSTOMER_NAME(a.SALES_ORG, GROUP_CUSTOMER_NO) GROUP_CUSTOMER_NM, a.*,
				FN_SALES_NAME(a.ACTUAL_SALES_EMP) as SALES_EMP_NAME,
				FN_HR_EMPLOYEE('02', A.COLLECTOR_EMPLOYEE_ID) as COLLECTOR_EMPLOYEE_NAME
			from CD_CUSTOMER a
		";
		if ($filter['plant'] != '*') {
			$query .= " where a.SALES_ORG = '".$filter['plant']."'";
		}

		if (!empty($filter['customer'])) {
			$query .= " and a.CUSTOMER = '".$filter['customer']."'";
		}
		$query .= 'order by sales_org, group_customer_no';

		return $query;
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

