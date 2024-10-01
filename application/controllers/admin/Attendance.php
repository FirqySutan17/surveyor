<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Attendance extends CI_Controller {
	var $menu_id 	= "";
	var $menu_id2 	= "";
	var $menu_id3 	= "";
	var $menu_id4 	= "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 	= 'TR003';
		$this->menu_id2 = 'R001';
		$this->menu_id3 = 'R003';
		$this->menu_id4 = 'R004';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('attendance');
		$this->load->library('upload');
	}

	public function index() {
		$user 											= $this->check_attendanceUserWFH();
		$data['title'] 							= 'SURVEY';
		$data['user'] 							= $user;
		$data['latest_attendance'] 	= $this->Dbhelper->selectTabelOne('*', 'HR_ATTENDANCE_WFH', ['COMPANY' => $user['userWFH']['COMPANY'], 'PLANT' => $user['userWFH']['PLANT'], 'EMPNO' => $user['userWFH']['EMPNO']], 'ATTEND_DATE', 'DESC');
		$this->template->_v('attendance/create', $data);
	}

	public function do_attend() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			dd($post);
			$postjson = json_encode($post);
			$textfile = date('YmdHis').'_'.$this->session_data['user']['EMPLOYEE_ID'];
			if (!write_file(APPPATH."logs/log_$textfile.txt", $postjson)) {
				$this->session->set_flashdata('success', "Unable to logs post");
				return redirect($this->own_link.'/report');
			}

			// dd($post);
			$survey_no = $this->generateSurveyNo();
			try {
				
				// SURVEY DATA
				$survey_report = [
					"SURVEY_NO"			=> $survey_no,
					"SURVEY_DATE"		=> date('Ymd', strtotime($post['survey_date'])),
					"COORDINATE"		=> dbClean($post['coordinate']),
					"LAND_TYPE"			=> dbClean($post['land_type']),
					"PROVINCE"			=> dbClean($post['province']),
					"REGENCY"			=> dbClean($post['regencies']),
					"DISTRICT"			=> dbClean($post['districts']),
					"CURRENT_PHASE"		=> dbClean($post['current_phase']),
					"DESCRIPTION"		=> dbClean($post['address']),
					"CREATED_AT"		=> date('Ymd His'),
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
				];

				if (empty($survey_report["CREATED_BY"])) {
					$this->session->set_flashdata('error', "User log-in not found");
						return redirect($this->own_link.'/report');
				}
				
				$survey_farmers = [];
				if (!empty($post['farmer_name'])) {
					foreach ($post['farmer_name'] as $i => $v) {
						$curr_data = [
							"SURVEY_NO"		=> $survey_no,
							"SEQUENCE"		=> $i + 1,
							"SURVEY_DATE"	=> $survey_report['SURVEY_DATE'],
							"FARMER_NAME"	=> $v,
							"FARMER_PHONE"	=> $post['farmer_phone'][$i]
						];

						$survey_farmers[] = $curr_data;
					}
				}

				$survey_market_price = [];
				if (!empty($post['market_price'])) {
					foreach ($post['market_price'] as $i => $v) {
						$curr_data = [
							"SURVEY_NO"		=> $survey_no,
							"SURVEY_DATE"	=> $survey_report['SURVEY_DATE'],
							"PRICE"	=> $v
						];

						$survey_market_price[] = $curr_data;
					}
				}

				$survey_harvest_phase = [];
				if (!empty($post['HARVEST_score'])) {
					foreach ($post['HARVEST_score'] as $i => $v) {
						$curr_data = [
							"SURVEY_NO"			=> $survey_no,
							"SEQUENCE"			=> $i + 1,
							"SURVEY_DATE"		=> $survey_report['SURVEY_DATE'],
							"SCORE"				=> $v,
							"BARIS"				=> dbClean($post['baris'][$i]),
							"BARIS_ACTUAL"		=> dbClean($post['baris_actual'][$i]),
							"BARIS"				=> dbClean($post['baris'][$i]),
							"BARIS_ACTUAL"		=> dbClean($post['baris_actual'][$i]),
							"BIJI"				=> dbClean($post['biji'][$i]),
							"BIJI_ACTUAL"		=> dbClean($post['biji_actual'][$i]),
							"BOBOT"				=> dbClean($post['bobot'][$i]),
							"BOBOT_ACTUAL"		=> dbClean($post['bobot_actual'][$i]),
						];

						$survey_harvest_phase[] = $curr_data;
					}
				}

				$survey_planting_phase = [];
				if (!empty($post['PLANTING_description'])) {
					foreach ($post['PLANTING_description'] as $i => $v) {
						$curr_data = [
							"SURVEY_NO"			=> $survey_no,
							"SEQUENCE"			=> $i + 1,
							"SURVEY_DATE"		=> $survey_report['SURVEY_DATE'],
							"PHASE"				=> dbClean($post['current_phase']),
							"DESCRIPTION"		=> dbClean($v),
						];

						$survey_planting_phase[] = $curr_data;
					}
				}


				$survey_galleries = [];
				if (!empty($_FILES)) {
					foreach ($_FILES['SURVEY_IMAGE']['name'] as $key => $v) {
						$no = $key + 1;
						$berkas = [];
						$berkas['name']= $v;
				        $berkas['type']= $_FILES['SURVEY_IMAGE']['type'][$key];
				        $berkas['tmp_name']= $_FILES['SURVEY_IMAGE']['tmp_name'][$key];
				        $berkas['error']= $_FILES['SURVEY_IMAGE']['error'][$key];
				        $berkas['size']= $_FILES['SURVEY_IMAGE']['size'][$key];

				        $namafile = $this->upload_image($berkas, $survey_no, $no);
				        $survey_galleries[] = [
				        	'SURVEY_NO'		=> $survey_no,
				        	'SEQUENCE'		=> $no,
				        	'IMAGE_TITLE'	=> !empty($post['SURVEY_IMAGE_TITLE'][$key]) ? $post['SURVEY_IMAGE_TITLE'][$key] : '-',
				        	'IMAGE_FILENAME'	=> $namafile
				        ];
					}
				}


				$save = $this->Dbhelper->insertData('SURVEY', $survey_report);
				if (!empty($survey_farmers)) {
					$save_farmers = $this->db->insert_batch('SURVEY_FARMERS', $survey_farmers);
				}
				if (!empty($survey_market_price)) {
					$save_market_prices = $this->db->insert_batch('SURVEY_MARKET_PRICES', $survey_market_price);
				}
				if (!empty($survey_harvest_phase)) {
					$save_harvest_phase = $this->db->insert_batch('SURVEY_HARVEST_PHASE', $survey_harvest_phase);
				}
				if (!empty($survey_planting_phase)) {
					$save_planting_phase = $this->db->insert_batch('SURVEY_PLANTING_PHASE', $survey_planting_phase);
				}
				if (!empty($survey_galleries)) {
					$save_galleries = $this->db->insert_batch('SURVEY_IMAGES', $survey_galleries);
				}
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


	private function delete_image($filename) {
		$path_to_file = './upload/'.$filename;
		if(unlink($path_to_file)) {
		     return true;
		}
		else {
		     return false;
		}
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

	private function check_attendanceUserWFH(){
		$userSession 	= $this->session_data['user'];
		$userWFH 			= $this->Dbhelper->selectTabelOne('COMPANY, PLANT, EMPNO, FULL_NAME', 'HR_EMPLOYEE_ATTD', ['USID' => $userSession['EMPLOYEE_ID']], 'EMPNO', 'ASC');

		return [
			'userSurveyor' 	=> $userSession,
			'userWFH'				=> $userWFH
		];
	}

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access) && !in_array($this->menu_id2, $user_access) && !in_array($this->menu_id3, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}

