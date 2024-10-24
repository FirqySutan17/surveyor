<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SurveyExcel extends CI_Controller {
	var $menu_id 	= "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'TR001';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('survey-excel');
		$this->load->library('upload');
	}

	public function entry() {

		$user 							= $this->session_data['user'];
		$data['title'] 			= 'SURVEY EXCEL';
		$data['user'] 			= $user;
		$data['provinces'] 	= $this->Dbhelper->selectTabel('ID_PROVINCE, PROVINCE', 'CD_PROVINCE', [], 'PROVINCE', 'ASC');
		$this->template->_v('survey-excel/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$survey_no = $this->generateSurveyExcelNo();
			try {
				
				// SURVEY DATA
				$survey_report = [
					"SURVEY_NO"			=> $survey_no,
					"SURVEY_DATE"		=> date('Ymd', strtotime($post['survey_date'])),
					"PROVINCE"			=> dbClean($post['province']),
					"REGENCY"				=> dbClean($post['regencies']),
					"TITLE"					=> dbClean($post['title']),
					"DESCRIPTION"		=> dbClean($post['DESCRIPTION']),
					"SURVEY_FILE"		=> "",
					"CREATED_AT"		=> date('Ymd His'),
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
					"PLANT"					=> $this->session_data['user']['PLANT'] == '*' ? '3212' : $this->session_data['user']['PLANT']
				];

				if (empty($survey_report["CREATED_BY"])) {
					$this->session->set_flashdata('error', "User log-in not found");
						return redirect($this->own_link.'/report');
				}

				if (!empty($_FILES['SURVEY_FILE']['name'])) {
					$berkas = $_FILES['SURVEY_FILE'];
					$namafile = $this->upload_file($berkas, $survey_no); 
					if ($namafile) {
						$survey_report["SURVEY_FILE"] = $namafile;
					}
				}

				$save = $this->Dbhelper->insertData('SURVEY_EXCEL', $survey_report);
				if ($save) {
					$this->session->set_flashdata('success', "Create data success");
					return redirect($this->own_link);
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link."/report");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function index() {
		$filter = $this->filter_data();
		$data['title'] 				= 'SURVEY EXCEL';
		$data['datatable']		= $this->datatable($filter);
		$data['filter']				= $filter;
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['surveyor'] 		= $this->list_surveyor();
		
		$this->template->_v('survey-excel/index', $data);
	}

	public function index_update() {
		$filter = $this->filter_data();
		$data['title'] 				= 'SURVEY EXCEL';
		$data['datatable']		= $this->datatable($filter);
		$data['filter']				= $filter;
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['surveyor'] 		= $this->list_surveyor();
		
		$this->template->_v('survey-excel/index-update', $data);
	}

	private function filter_data() {
		$sdate 			= date('Y-m').'-01';
		$edate 			= date('Y-m-d');
		$plant 			= "*";
		$surveyor 	= "*";
		// $province 	= "*";
		// $regencies 	= "*";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$sdate 			= $this->input->post('sdate');
			$edate 			= $this->input->post('edate');
			$plant 			= $this->input->post('plant');
			$surveyor 	= $this->input->post('surveyor');
			// $province 	= $this->input->post('province');
			// $regencies 	= $this->input->post('regencies');
		}

		$filter = [
			"plant"	=> $plant,
			"sdate"	=> $sdate,
			"edate"	=> $edate,
			"surveyor"	=> $surveyor,
			// "province"	=> $province,
			// "regencies"	=> $regencies
		];
		return $filter;
	}

	public function detail($survey_no) {
		$user	= 	$this->session_data['user'];

		$data_detail = $this->get_surveydetail($survey_no);
		$data['title'] 				= 'SURVEY EXCEL';
		$data['user'] 				= $user;
		$data['detail']				= $data_detail;
		$this->template->_v('survey-excel/detail', $data);
	}

	public function edit($survey_no) {
		$user 							= $this->session_data['user'];

		$data_detail = $this->get_surveydetail($survey_no);
		$data['title'] 			= 'SURVEY EXCEL';
		$data['user'] 			= $user;
		$data['detail']				= $data_detail;
		$this->template->_v('survey-excel/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$survey_no = $post['survey_no'];
			try {
				$survey = [
					"SURVEY_DATE"		=> date('Ymd', strtotime($post['survey_date'])),
					"TITLE"					=> dbClean($post['title']),
					"DESCRIPTION"		=> dbClean($post['DESCRIPTION']),
					"UPDATED_AT"		=> date('Ymd His'),
					"UPDATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID']
				];

				if (!empty($_FILES['SURVEY_FILE']['name'])) {
					$berkas = $_FILES['SURVEY_FILE'];
					$delete_file = $this->delete_file($post['SURVEY_FILE_OLD']);
					$namafile = $this->upload_file($berkas, $survey_no); 
					if ($namafile) {
						$survey_report["SURVEY_FILE"] = $namafile;
					}
				}
				$save = $this->db->update('SURVEY_EXCEL', $survey_report, array('SURVEY_NO' => $survey_no));
				

				if ($save) {
					$this->session->set_flashdata('success', "Update data success");
					return redirect($this->own_link);
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	private function datatable($filter) {
		$sdate = date('Ymd', strtotime($filter['sdate']));
		$edate = date('Ymd', strtotime($filter['edate']));
		$plant = $filter['plant'];
		$surveyor = $filter['surveyor'];

		$where = "";
		if ($plant != '*') {
			$where .= " and PLANT = '$plant'";
		}

		if ($filter['surveyor'] != "*") {
			$where .= " and CREATED_BY = '$surveyor'";
		}
		

		$query = "
			select 
				SURVEY_NO,
				SURVEY_DATE,
				TITLE,
				CREATED_BY,
				FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
				FN_CODE_NAME(PLANT, 'AB') PLANT_NAME
			from SURVEY_EXCEL
			where 
				(SURVEY_DATE BETWEEN '$sdate' AND '$edate')
				$where
			ORDER BY SURVEY_NO DESC
		";
		$data 				= $this->db->query($query)->result_array();
		return $data;
	}

	private function get_surveydetail($survey_no) {
		$result =  $this->Dbhelper->selectOneRawQuery("
			SELECT 
					a.*, 
					FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
					p.PROVINCE as PROVINCE_NAME,
					r.REGENCIES as REGENCY_NAME
			FROM SURVEY_EXCEL a, CD_PROVINCE p, CD_REGENCIES r
			WHERE 
					p.ID_PROVINCE = a.PROVINCE
					AND r.ID_REGENCIES = a.REGENCY
					AND a.SURVEY_NO = '$survey_no'
		");

		$result = (array) $result;
		return $result;
	}

	private function generateSurveyExcelNo() {
			$generated_no = "SURVEYEXCEL".date('Ymd');
			$no = 1;
			$today = date('Ymd');
			$this->db->select('SURVEY_NO, CREATED_AT');
			$this->db->from('SURVEY_EXCEL');
			$this->db->like('CREATED_AT', $today, 'after');
			$this->db->order_by('CREATED_AT', 'DESC');
			$this->db->order_by('SURVEY_NO', 'DESC');
			$latest_data = $this->db->get()->row();
			if (!empty($latest_data)) {
					$no = substr($latest_data->SURVEY_NO, -4);

					$date = date('Y-m-d', strtotime($latest_data->CREATED_AT));
					$hour = date('H', strtotime($latest_data->CREATED_AT));
					$no += 1;
			}
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

	public function upload_file($berkas, $survey_no) {
		$result = "";
		if ($berkas["name"] != "") {
			$pathDir 	= "./upload/excel/";
			if (!file_exists($pathDir)) {
					mkdir($pathDir, 0777, true);
			}
			// chmod($pathDir, 777);
			$temp = explode(".", $berkas["name"]);
			$type_file = '.'.end($temp);
			if (trim($berkas['name']) != "") {
				$_FILES["files"] = $berkas;
				$stringRandom = random_char(5);
				$nama = $survey_no."_".$stringRandom.$type_file;
				$config['upload_path']          = $pathDir;
				$config['allowed_types']        = 'xlsx|csv|xls';

				$config['file_name'] = $nama;
				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('files')) {
						// $result = array('error' => $this->upload->display_errors()); 
				} else {
						$result = $nama;
				}
			}
		}

		return $result;
	}

	private function delete_file($filename) {
		$path_to_file = './upload/excel/'.$filename;
		if(unlink($path_to_file)) {
		     return true;
		}
		else {
		     return false;
		}
	}

	private function list_surveyor() {
		$query = "
			select
				CREATED_BY,
				FN_USER_NAME(CREATED_BY) CREATED_BY_NAME
			from SURVEY_EXCEL
			WHERE CREATED_BY != '999999'
			GROUP BY CREATED_BY
			ORDER BY CREATED_BY ASC
		";
		$data 				= $this->db->query($query)->result_array();
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

