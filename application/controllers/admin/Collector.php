<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Collector extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'TR003';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('collector');
	}

	public function index() {
		$datemonth 			= date('Y-m');
		$plant 			= "*";

		$user 							= $this->session_data['user'];
		$filter_plant 			= ['HEAD_CODE'	=> 'AB'];
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$datemonth 		= $this->input->post('datemonth');
			$plant 		= $this->input->post('plant');
		} else {
			$maxDate 	= $this->Dbhelper->selectTabelOne('YYMM', 'TR_MONTHLY_TARGET', [], 'YYMM', 'DESC');
			$datemonth 		= date('Y-m', strtotime($maxDate['YYMM'].'01'));
		}
		$filter = [
			"datemonth"	=> $datemonth,
			"plant"	=> $plant,
		];

		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter_plant, 'CODE', 'ASC');
		$data['title'] 			= 'Data Collector';
		$data['user']				= $this->session_data['user'];
		$data['datatable']	= $this->datatable($filter);
		$data['filter']			= $filter;
		$this->template->_v('collector/index', $data);
	}

	public function upload() {
		$datajson = 

		$data['title'] 			= 'Upload Target Collection';
		$this->template->_v('collector/upload', $data);

	}

	public function do_upload() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post 	= $this->input->post();
			$monthdata = date('Ym', strtotime($post['yymm']));
			$berkas = $_FILES['berkas'];
			if (!empty($berkas)) {
				$filedata =	explode("\n", file_get_contents($berkas['tmp_name']));
				// $filedata = json_decode(file_get_contents($berkas['tmp_name']));
				// dd($filedata);
				$insert_batch = [];
				$total_target = 0;
				$total_run = 0;
				$total_stop = 0;
				$datas = [];
				foreach ($filedata as $i =>  $v) {
					$v = dbClean($v);
					// $v = (array) $v;
					// $v = array_values( $v);
					if (!empty($v) && $i > 0) {
						$v = explode("	", $v);
						if (!empty(trim($v[0]))) {
							if (trim($v[3]) != "(none)") {
								$flag = $v[0].'-'.$v[1].'-'.$v[3];
								$status = trim($v[6]);
								$target = trim($v[5]);
								if ($target == '-') {
									$target = 0;
								} else {
									$target = str_replace(".", "", $target);
									$target = str_replace(",", ".", $target);									
								}
								// dd($target);
								$total_target += $target;
								$running_target = $status == 'Running' ? $target : 0;
								$stop_target 		= $status == 'Stop' ? $target : 0;

								$total_run += $running_target;
								$total_stop += $stop_target;
								$curr_data = [
									"BUSINESS_AREA" 	=> $v[0],
									"YYMM"						=> $monthdata,
									"CUSTOMER"				=> $v[1],
									"EMPNO"						=> $v[3],
									"RUNNING_TARGET"	=> $running_target,
									"STOP_TARGET"			=> $stop_target
								];
								

								if (!array_key_exists($flag, $insert_batch)) {
									$insert_batch[$flag] = $curr_data;
								} else {
									$insert_batch[$flag]['RUNNING_TARGET'] += $curr_data['RUNNING_TARGET'];
									$insert_batch[$flag]['STOP_TARGET'] += $curr_data['STOP_TARGET'];
								}
							}
						}
					}
				}
				// dd($total_target, FALSE);
				// dd($total_run, FALSE);
				// dd($total_stop, FALSE);
				// $jsondata = json_encode($insert_batch);
				// dd($insert_batch);
				if (!empty($insert_batch)) {
					$save = $this->db->insert_batch('TR_MONTHLY_TARGET', $insert_batch);
					if ($save) {
						$this->session->set_flashdata('success', "Upload data berhasil");
								return redirect(base_url('dashboard'));
					}
				}
				// $result = $this->customer_data($filedata);
			}

			// $save = $this->Dbhelper->insertData('CD_USER', $post_data);
			// if ($save) {
			// 	$this->session->set_flashdata('success', "Create data success");
			// 	return redirect($this->own_link);
			// }
			// $this->session->set_flashdata('error', "Create data failed");
			// return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function edit($parsedata) {
		$exp_parsedata = explode("-", $parsedata);

		$yymm = $exp_parsedata[0];
		$business_area = $exp_parsedata[1];
		$empno = $exp_parsedata[2];
		$filter = [
			"YYMM" 						=> $yymm,
			"BUSINESS_AREA"		=> $business_area,
			"EMPNO"						=> $empno
		];

		$customer_plant = substr_replace($filter['BUSINESS_AREA'], 2, -1);
		$customer_list 			= $this->Dbhelper->selectTabel('SALES_ORG, CUSTOMER, CUSTOMER_NAME', 'CD_CUSTOMER', array('SALES_ORG' => $customer_plant), 'CUSTOMER', 'ASC');
		
		$data['title'] 			= 'Edit Collector';
		$data['slug']				= $parsedata;
		$data['customer_list']		= $this->customer_option($customer_list);

		$query = "
			SELECT
				D.YYMM,
				D.BUSINESS_AREA,
				D.EMPNO,
				FN_HR_EMPLOYEE('02', D.EMPNO) AS EMPLOYEE_NAME,
				SUM(D.RUNNING_TARGET) as RUNNING_TARGET,
				SUM(D.STOP_TARGET) as STOP_TARGET
			FROM TR_MONTHLY_TARGET D
			WHERE
				D.YYMM = '$yymm'
				and D.BUSINESS_AREA = '$business_area'
				and D.EMPNO = '$empno'
			GROUP BY D.YYMM, D.BUSINESS_AREA, D.EMPNO
		";
		$data['model']			= $this->Dbhelper->selectOneRawQuery($query);
		$data['list']				= $this->Dbhelper->selectTabel('BUSINESS_AREA, YYMM, CUSTOMER, EMPNO, RUNNING_TARGET, STOP_TARGET', 'TR_MONTHLY_TARGET', $filter, 'CUSTOMER', 'ASC');
		$this->template->_v('collector/edit', $data);
	}

	private function customer_option($customer_list) {
		$html = "<option value='' disabled> - PILIH CUSTOMER - </option>";
		foreach ($customer_list as $cl) {
			$code = $cl['CUSTOMER'];
			$name = $cl['CUSTOMER_NAME'];
			$html .= "<option value='$code'> $code - $name </option>";
		}

		return $html;
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$slug 					= explode("-", $post['slug']);
			$customer 			= $post['CUSTOMER'];
			$running_target = $post['RUNNING_TARGET'];
			$stop_target 		= $post['STOP_TARGET'];

			$base_data = [
				"BUSINESS_AREA" => $slug[1],
				"YYMM"					=> $slug[0],
				"EMPNO"					=> $slug[2]
			];

			$insert_batch = [];
			foreach ($customer as $i => $v) {
				$curr_data = [
					"CUSTOMER"				=> $v,
					"RUNNING_TARGET"	=> $running_target[$i],
					"STOP_TARGET"			=> $stop_target[$i]
				];
				$curr_data = array_merge($base_data, $curr_data);
				$insert_batch[] = $curr_data;
			}
			// dd($insert_batch);
			$this->db->delete('TR_MONTHLY_TARGET', $base_data);
			$save = $this->db->insert_batch('TR_MONTHLY_TARGET', $insert_batch);	
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

	private function datatable($filter) {
		$where = "";
		if ($filter['plant'] != "*") {
			$filter['plant'] = substr_replace($filter['plant'], 0, -1);
			$where .= " and D.BUSINESS_AREA = '".$filter['plant']."'";
		}
		$datemonth = date('Ym', strtotime($filter['datemonth']));
		$query = "
			SELECT
				D.YYMM,
				D.BUSINESS_AREA,
				D.EMPNO,
				FN_HR_EMPLOYEE('02', D.EMPNO) AS EMPLOYEE_NAME,
				SUM(D.RUNNING_TARGET) as RUNNING_TARGET,
				SUM(D.STOP_TARGET) as STOP_TARGET
			FROM TR_MONTHLY_TARGET D
			WHERE
				D.YYMM = '$datemonth'
				$where
			GROUP BY D.YYMM, D.BUSINESS_AREA, D.EMPNO
		";
		$data = $this->db->query($query)->result_array();
		return $data;
	}

	private function validation($post_data) {
		$errMessage 	= [];
		$full_name		= $post_data["FULL_NAME"];
		$employee_id	= $post_data["EMPLOYEE_ID"];
		$plant	= $post_data["PLANT"];
		$region	= $post_data["REGION"];

		if (empty($full_name)) {
			$errMessage[] = "Full Name is required";
		}
		if (empty($employee_id)) {
			$errMessage[] = "Employee ID is required";
		}
		if (empty($plant) || empty($region)) {
			$errMessage[] = "Plant or Region are required";
		}

		return $errMessage;
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

