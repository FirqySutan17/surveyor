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
			try {
				$user 											= $this->check_attendanceUserWFH();
				if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
							$ip = $_SERVER["HTTP_CLIENT_IP"];
				} elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
						$ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
				} else {
						$ip = $_SERVER["REMOTE_ADDR"];
				}
				
				// SURVEY DATA
				$attendance_data = [
					"COMPANY"			=> $user['userWFH']['COMPANY'],
					"PLANT"				=> $user['userWFH']['PLANT'],
					"EMPNO"				=> $user['userWFH']['EMPNO'],
					"ATTEND_DATE"	=> dbClean($post['attend_date']),
					"TIME_IN"			=> dbClean($post['attend_time']),
					"REG_IN_OS"		=> dbClean($post['coordinate']),
					"REG_IN_IP"		=> $ip,
					"GMT"					=> 0
				];
				
				dd($attendance_data);

				$PLANT = $attendance_data['PLANT'];
				$EMPNO = $attendance_data['EMPNO'];
				$ATTEND_DATE = $attendance_data['ATTEND_DATE'];
				if (!file_exists('./uploads/'.$PLANT)) {
						mkdir('./uploads/'.$PLANT, 0777, true);
				}

				$config['upload_path']          = "./uploads/$PLANT";
				$config['file_name']            = $PLANT."_".$EMPNO."_".$ATTEND_DATE."_IN.jpg";
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['overwrite']            = true;
				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('selfie_in'))
				{
					$this->session->set_flashdata('error', "Create data failed");
					return redirect($this->own_link);
				}

				$uploadData = $this->upload->data();

				unset($config);

				$config = $this->createImgConfig($uploadData['full_path']);
				$this->load->library('image_lib', $config);

				if($this->image_lib->resize()) {
						if(array_key_exists('rotation_angle', $config)) $this->image_lib->rotate();
				}
				$save = $this->Dbhelper->insertData('HR_ATTENDANCE_WFH', $attendance_data);
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

