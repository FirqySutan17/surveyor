<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Remainder extends CI_Controller {
	var $menu_id = "";
	var $menu_id2 = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'TR002';
		$this->menu_id2 = 'TR003';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('remainder');
	}

	public function index() {
		redirect(admin_url('remainder/entry'));
		// $plant = "*";
		// if ($this->input->server('REQUEST_METHOD') === 'POST') {
		// 	$plant 		= $this->input->post('plant');
		// }

		// $filter = [
		// 	"plant"	=> $plant,
		// ];

		// $data['title'] 			= 'Data Remainder';
		// $data['user']			= $this->session_data['user'];
		// $data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		// $data['datatable']		= $this->datatable($filter);
		// $data['filter']			= $filter;
		// $this->template->_v('remainder/admin/index', $data);
	}

	public function entry() {
		$data['title'] 			= 'Remainder Entry';
		$this->template->_v('remainder/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post 	= $this->input->post();
			$berkas = $_FILES['berkas'];
			if (!empty($berkas)) {
				$filedata =	explode("\n", file_get_contents($berkas['tmp_name']));
				// $result = $this->remainder_upload($filedata, $post);
				// $result = $this->employee_upload($filedata, '3232');
				// $result = $this->collector_data($filedata);
				$result = $this->customer_data($filedata);
			}
			$this->session->set_flashdata('error', "Import data gagal");
        	return redirect($this->own_link);
		}
		echo "CANNOT ACCESS THIS URL";
		exit();
	}

	public function collector_data($filedata) {
		$updated_data = [];
		foreach ($filedata as $i => $v) {
			$v = dbClean(trim($v));
			if (!empty($v) && $i > 0) {
				$v = explode("	", $v);
				$salesOrg 		= trim($v[3]);
				$customerCode = trim($v[5]);
				$collectorEmployeeId = trim($v[10]);

				if (!empty($collectorEmployeeId) && $collectorEmployeeId != 0) {
					// dd($v);
					$updated_data[] = $v;
					$save = $this->Dbhelper->updateData("CD_CUSTOMER", array('SALES_ORG' => $salesOrg, 'CUSTOMER' => $customerCode), ['COLLECTOR_EMPLOYEE_ID' => $collectorEmployeeId]);
				}
			}
		}
		dd($updated_data);
		return 0;
	}

	public function customer_data($filedata) {
		$updated_data = [];
		$existed_data = [];
		$insert_batch = [];
		foreach ($filedata as $i => $v) {
			if (!empty($v) && $i > 0) {
				$v = explode("	", $v);
				// dd($v);

				$insertData = [
					'SALES_ORG' => trim($v[0]),
					'CUSTOMER' => trim($v[1]),
					'CUSTOMER_NAME' => trim($v[2]),
					'ACCOUNT_GROUP' => trim($v[3]),
					'SEARCH_TERM_1' => trim($v[4]),
					'SEARCH_TERM_2' => trim($v[5]),
					'REGION' => trim($v[6]),
					'STREET' => trim($v[7]),
					'STREET_2' => trim($v[8]),
					'STREET_3' => trim($v[9]),
					'STREET_4' => trim($v[10]),
					'POSTAL_CODE' => trim($v[11]),
					'CITY' => trim($v[12]),
					'COUNTRY_KEY' => trim($v[13]),
					'TELEPHONE' => trim($v[14]),
					'TELEPHONE_2' => trim($v[15]),
					'FAX' => trim($v[16]),
					'ID_NUMBER' => trim($v[17]),
					'TAX_NUMBER' => trim($v[18]),
					'RECONCILIATION_ACCT' => trim($v[19]),
					'PAYMENT_TERMS' => trim($v[20]),
					'SALES_DISTRICT' => trim($v[21]),
					'CUSTOMER_GROUP' => trim($v[22]),
					'SALES_OFFICE' => trim($v[23]),
					'SALES_GROUP' => trim($v[24]),
					'CURRENCY' => trim($v[25]),
					'CUST_PRIC' => trim($v[26]),
					'DELIVERING_PLANT' => trim($v[27]),
					'RELEVANT_FOR_POD' => trim($v[28]),
					'INCOTERMS' => trim($v[29]),
					'INCOTERMS_2' => trim($v[30]),
					'PAYMENT_TERMS_2' => trim($v[31]),
					'OWN_EXPLANATION' => trim($v[32]),
					'ACCT_ASSMT_GRP_CUST' => trim($v[33]),
					'TAX_CLASSIFICATION' => trim($v[34]),
					'OUTPUT_TAX' => trim($v[35]),
					'CUSTOMER_GROUP_1' => trim($v[36]),
					'CUSTOMER_GROUP_2' => trim($v[37]),
					'CUSTOMER_GROUP_3' => trim($v[38]),
					'CUSTOMER_GROUP_4' => trim($v[39]),
					'CUSTOMER_GROUP_5' => trim($v[40]),
					'SALES_UNIT' => trim($v[41]),
					'BIZ_NO' => trim($v[42]),
					'INDIVIDUAL_LICENSE_NO' => trim($v[43]),
					'CHIEF' => trim($v[44]),
					'CHIEF_ID' => trim($v[45]),
					'TRANS_START_DATE' => trim($v[46]),
					'TRANS_END_DATE' => trim($v[47]),
					'AR_SALES_RATE' => trim($v[48]),
					'ORDER_BLOCK_FOR_SALES_AREA' => trim($v[49]),
					'MAIN_CUSTOMER_NO' => trim($v[50]),
					'GROUP_CUSTOMER_NO' => trim($v[51]),
					'EMPLOYEE_RESPONS' => trim($v[52]),
					'REGION_MANAGER' => trim($v[53]),
					'ACTUAL_SALES_EMP' => trim($v[54]),
					'TAX_NUMBER_ID' => trim($v[55])
				];
				$insert_batch[] = $insertData;

				// if (!empty($salesOrg) && !empty($customerCode)) {
				// 	$check_data = $this->Dbhelper->selectTabelOne('*', 'CD_CUSTOMER', array('SALES_ORG' => $salesOrg, 'CUSTOMER' => $customerCode), 'CUSTOMER', 'ASC');
				// 	if ($check_data) {
				// 		$existed_data[] = $check_data;
				// 	} else {
				// 		$updated_data[] = $customerCode;
				// 	}
				// }
			}
		}

		if (!empty($insert_batch)) {
			// dd($insert_batch);
			$save = $this->db->insert_batch('CD_CUSTOMER', $insert_batch);
			if ($save) {
				$this->session->set_flashdata('success', "Upload data berhasil");
						return redirect(base_url('dashboard'));
			}
		}
		dd($insert_batch);
		return 0;
	}

	public function employee_upload($filedata, $plant) {
		$insert_batch = [];
		foreach ($filedata as $i => $v) {
			$v = dbClean(trim($v));
			if (!empty($v) && $i > 0) {
				$v = explode("	", $v);
				$post_data = [
					'COMPANY' => $v[0],
					'PLANT'		=> $plant,
					'EMPNO'		=> $v[2],
					'FULL_NAME'	=> $v[3],
					'ENTER_GROUP_DATE' => $v[4],
					'ENTER_COMPANY_DATE' => $v[5],
					'BIRTHDAY' => $v[6],
					'SEX' => $v[7],
					'DEPT' => $v[8],
					'CONDITION_IN_OFFICE' => 1,
					'GRADE' => $v[10],
					'EMAIL'	=> $v[11],
					'TS_ASM_GSM_CCT'	=> $v[12]
				];

				$insert_batch[] = $post_data;
			}
		}
		if (!empty($insert_batch)) {
			$save = $this->db->insert_batch('HR_EMPLOYEE', $insert_batch);
			if ($save) {
				$this->session->set_flashdata('success', "Upload data berhasil");
						return redirect(base_url('dashboard'));
			}
		}
		return 0;
	}

	public function remainder_upload($filedata, $post) {
		$table_name 	= "TR_DAILY_REMAINDER";
		if ($post['remainder_type'] == 'MONTHLY') {
			$table_name 	= "TR_MONTHLY_REMAINDER";
		}
		foreach ($filedata as $i => $v) {
			$v = dbClean(trim($v));
			if (!empty($v) && $i > 0) {
				$value = explode("	", $v);
				$business_area 	= $value[0];
				$date 			= $value[1];
				$cls 			= $value[2];
				$coll			= $value[3];
				$od 			= $value[4];
				$bd 			= $value[5];
				// dd($post, FALSE);
				// dd($value);

				$head_data 		= [
					"BUSINESS_AREA" => $business_area,
					"YMD"			=> date('Ymd', strtotime($date))
				];
				if ($post['remainder_type'] == 'MONTHLY') {
					$head_data 		= [
						"BUSINESS_AREA" => $business_area,
						"YYMM"			=> date('Ym', strtotime($date))
					];
				}
				$check_data = $this->Dbhelper->selectTabelOne('*', $table_name, $head_data);
				if (!empty($check_data)) {
					// DELETE EXISTING DATA
					// dd($table_name, FALSE);
					// dd($head_data);
					$delete_data = $this->db->delete($table_name, $head_data);
				}
				$common_data 	= [
					"CLS"		=> $cls,
					"CHASH_IN"	=> str_replace(",", ".", $coll),
					"OVER_DUE"	=> str_replace(",", ".", $od),
					"STOP"		=> str_replace(",", ".", $bd)
				];

				$post_data = array_merge($head_data, $common_data);
				$insert_batch[] = $post_data;
			}
		}
		$save = $this->db->insert_batch($table_name, $insert_batch);
		if ($save) {
			$this->session->set_flashdata('success', "Upload data berhasil");
					return redirect(base_url('dashboard'));
		}
		return 0;
	}

	public function datatable($filter) {
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
				FN_SALES_NAME(a.ACTUAL_SALES_EMP) as SALES_EMP_NAME
			from CD_CUSTOMER a
		";
		if ($filter['plant'] != '*') {
			$query .= " where a.SALES_ORG = '".$filter['plant']."'";
		}
		$query .= 'order by sales_org, group_customer_no';
		// dd($query);
        $data = $this->db->query($query)->result_array();
		return $data;
	}

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access) && !in_array($this->menu_id2, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}

