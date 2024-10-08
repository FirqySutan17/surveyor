<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Attendance extends CI_Controller {
	var $menu_id 	= "R003";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 	= 'R003';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('attendance');
		$this->load->library('upload');
	}

	public function index() {
		$user 			= $this->check_attendanceUserWFH();
		$data['title'] 	= 'ATTENDANCE';
		$data['user'] 	= $user;
		$datemonth 			= date('Y-m-d');

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$datemonth 		= $this->input->post('datemonth');
		} 
		$filter = [
			"datemonth"	=> $datemonth,
		];

		$data['filter']			= $filter;
		$data['datatable']	= $this->datatable($user, $filter);

		$this->template->_v('attendance/index', $data);
	}

	public function datatable($user, $filter) {
		$where = "";
		if ($user['userSurveyor']['EMPLOYEE_ID'] != '999999') {
			$company 	= $user['userWFH']['COMPANY'];
			$plant 		= $user['userWFH']['PLANT'];
			$empno 		= $user['userWFH']['EMPNO'];
			$where = "AND a.COMPANY = '$company' AND a.PLANT = '$plant' AND a.EMPNO = '$empno'";
		}
		
		if (!empty($filter['datemonth'])) {
			$datemonth = date('Ymd', strtotime($filter['datemonth']));
			$where .= "AND a.ATTEND_DATE = '$datemonth'";
		}
		$query = "
			SELECT a.*, b.FULL_NAME
			FROM HR_ATTENDANCE_WFH a, HR_EMPLOYEE_ATTD b
			WHERE
					a.COMPANY = b.COMPANY
					AND a.PLANT = b.PLANT
					AND a.EMPNO = b.EMPNO
					$where
			ORDER BY a.ATTEND_DATE DESC
		";
		$data = $this->Dbhelper->selectRawQuery($query);
		return $data;
	}

	public function create() {
		$user 											= $this->check_attendanceUserWFH();
		$data['title'] 							= 'ATTANDANCE';
		$data['user'] 							= $user;
		// dd($data['user']);
		$latest_attendance 	= !empty($user['userWFH']) ? $this->Dbhelper->selectTabelOne('*', 'HR_ATTENDANCE_WFH', ['COMPANY' => $user['userWFH']['COMPANY'], 'PLANT' => $user['userWFH']['PLANT'], 'EMPNO' => $user['userWFH']['EMPNO']], 'ATTEND_DATE', 'DESC') : [];

		$attendance_type 	= "CHECK-IN";
		if ($latest_attendance) {
			if (empty($latest_attendance['TIME_OUT'])) {
				$attendance_type = "CHECK-OUT";
			} elseif (
					!empty($latest_attendance['ATTEND_DATE']) && 
					!empty($latest_attendance['TIME_OUT']) && 
					$latest_attendance['ATTEND_DATE'] == date('Ymd')
			) {
				$attendance_type = "STABLE";
			}
		}
		$data['attendance_type'] 	= $attendance_type;
		$data['attend_date']			= (!empty($latest_attendance) && empty($latest_attendance['TIME_OUT'])) ? $latest_attendance['ATTEND_DATE'] : date('Ymd');
		$data['latest_attendance'] = $latest_attendance;

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
					"ATTEND_DATE"	=> date('Ymd', strtotime($post['attend_date'])),
					"TIME_IN"			=> date('His'),
					"REG_IN_OS"		=> dbClean($post['coordinate']),
					"REG_IN_IP"		=> $ip,
					"GMT"					=> 0
				];
				
				$type = "OUT";
				if ($post['attend_type'] == 'check_in') {
					$type = "IN";
				}

				$PLANT = $attendance_data['PLANT'];
				$EMPNO = $attendance_data['EMPNO'];
				$ATTEND_DATE = $attendance_data['ATTEND_DATE'];
				if (!file_exists('./uploads/'.$PLANT)) {
						mkdir('./uploads/'.$PLANT, 0777, true);
				}

				$config['upload_path']          = "./uploads/".$PLANT;
				$config['file_name']            = $PLANT."_".$EMPNO."_".$ATTEND_DATE."_".$type.".jpg";
				$config['allowed_types']        = 'gif|jpg|jpeg|png';
				$config['overwrite']            = true;
				$this->load->library('upload');

				$this->upload->initialize($config);
				if ( ! $this->upload->do_upload('selfie_in'))
				{
					$this->session->set_flashdata('error', "Create data failed");
					return redirect($this->own_link);
				}

				$uploadData = $this->upload->data();

				unset($config);

				// $config = $this->createImgConfig($uploadData['full_path']);
				// $this->load->library('image_lib', $config);

				// if($this->image_lib->resize()) {
				// 		if(array_key_exists('rotation_angle', $config)) $this->image_lib->rotate();
				// }

				if ($type == 'IN') { 
					$save = $this->Dbhelper->insertData('HR_ATTENDANCE_WFH', $attendance_data);
				} elseif ($type == 'OUT') {
					$update_data = [
						"TIME_OUT"		=> date('His'),
						"REG_OUT_OS"	=> dbClean($post['coordinate']),
						"REG_OUT_IP"	=> $ip
					];

					$save = $this->Dbhelper->updateData("HR_ATTENDANCE_WFH", array('COMPANY' => $attendance_data['COMPANY'], 'PLANT' => $attendance_data['PLANT'], 'EMPNO' => $attendance_data['EMPNO'], 'ATTEND_DATE' => $attendance_data['ATTEND_DATE']), $update_data);		
				}

				if ($save) {
					$this->session->set_flashdata('success', "Attendance data success");
					return redirect($this->own_link);
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "Attendance data failed");
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

	private function createImgConfig($path)
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $path;
        $config['maintain_ratio'] = TRUE;
        $config['new_image']     = $path;

        $exif = exif_read_data($path);

        if ($exif && (!empty($exif['Orientation']))) {
            switch ($exif['Orientation']) {
                case 1: // nothing
                    $config['width'] = 500;
                    break;
                case 2: // horizontal flip
                    $config['rotation_angle'] = 'hor';
                    $config['width'] = 500;
                    break;
                case 3: // 180 rotate left
                    $config['rotation_angle'] = 180;
                    $config['width'] = 500;
                    break;
                case 4: // vertical flip
                    $config['rotation_angle'] = 'ver';
                    $config['width'] = 500;
                    break;
                case 5: // vertical flip + 90 rotate right
                    $config['rotation_angle'] = 270;
                    $config['height'] = 500;
                    break;
                case 6: // 90 rotate right
                    $config['rotation_angle'] = 270;
                    $config['height'] = 500;
                    break;
                case 7: // horizontal flip + 90 rotate right
                    $config['rotation_angle'] = 90;
                    $config['height'] = 500;
                    break;
                case 8:    // 90 rotate left
                    $config['rotation_angle'] = 90;
                    $config['height'] = 500;
                    break;
                default:
                    $config['width'] = 500;
            }
        } else {
            $config['width'] = 500;
        }

        return $config;
    }

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		// $user_access = $session['user_access'];
		// if (!in_array($this->menu_id, $user_access) && !in_array('*', $user_access)) {
		// 	redirect('dashboard');
		// }
	}
}

