<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __Construct() {
		parent::__construct();
		$this->session_data = $this->session->userdata('user_dashboard');
		$this->load->library('upload');
	}

	public function index() {
		$is_login = empty($this->session_data) ? FALSE : TRUE;
		$data = [
			'is_login'	=> $is_login
		];
		$this->load->view('welcome', $data);
	}

	public function detail_mobile($visiting_no) {

		$data = $this->get_visitingreport($visiting_no);
		$data['title'] 				= 'Visit Detail';
		$this->load->view('admin/visit/detail_mobile', $data);
	}

	public function entry_mobile($employee_id) {
		return $this->entry_mobile_view($employee_id);
	}
	

	private function entry_mobile_view($employee_id) {
		$user = $this->Dbhelper->selectTabelOne('*', 'CD_USER', array('EMPLOYEE_ID' => $employee_id));
		if (empty($user)) {
			return "User not found";
		}
		$user_access = json_decode($user['MENU_ACCESS']);

		$data["user"] = $user;
		$data["user_access"] = !empty($user_access) ? $user_access : [];
		// $data["user_access_detail"] = $user_access_detail;
		if (!empty($this->session->userdata('user_dashboard'))) {
			$this->session->sess_destroy();
		}

		$session['user_dashboard'] = $data;
		$this->session->set_userdata($session);

		$filter = ['HEAD_CODE'	=> 'AB'];
		if ($user['PLANT'] != '*') {
			$filter['CODE'] = $user['PLANT'];
		}
		$data['title'] 			= 'Visit Entry';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter, 'CODE', 'ASC');
		$data['collection_type'] = $this->collection_type();
		$data['user'] = $user;
		$data['employee_id'] = $employee_id;
		$this->load->view('admin/visit/create_mobile', $data);
	}

	public function set_session_mobile($employee_id) {
		$user = $this->Dbhelper->selectTabelOne('*', 'CD_USER', array('EMPLOYEE_ID' => $employee_id));
		if (empty($user)) {
			return "User not found";
		}
		$user_access = json_decode($user['MENU_ACCESS']);

		$data["user"] = $user;
		$data["user_access"] = !empty($user_access) ? $user_access : [];
		// $data["user_access_detail"] = $user_access_detail;
		if (!empty($this->session->userdata('user_dashboard'))) {
			$this->session->sess_destroy();
		}

		$session['user_dashboard'] = $data;
		$this->session->set_userdata($session);
	}

	public function do_create_mobile() {
		$this->set_session_mobile($this->input->post('employee_id_sess'));
		$session_data = $this->session->userdata('user_dashboard');
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$postjson = json_encode($post);
			$textfile = date('YmdHis').'_'.$session_data['user']['EMPLOYEE_ID'];
			$redirect = base_url()."visit/entry_mobile/".$session_data['user']['EMPLOYEE_ID'];
			
			$redirect = $_SERVER['HTTP_REFERER'];
			// dd($redirect); 
			if (!write_file(APPPATH."logs/log_$textfile.txt", $postjson)) {
				$this->session->set_flashdata('alert', "Unable to logs post");
				return redirect($redirect);
			} else {
				$visiting_no = $this->generateVisitingNo();
				try {
					
					// VR DATA
					$visiting_report = [
						"VISITING_NO"		=> $visiting_no,
						"VISITING_DATE"		=> dbClean(str_replace("-", "", $post['visiting_date'])),
						"PLANT"				=> dbClean($post['plant']),
						"CUSTOMER"			=> dbClean($post['customer']),
						"TRANSDATE_OPEN"	=> dbClean(date('Ymd', strtotime($post['transdate_open']))),
						"TRANSDATE_CLOSE"	=> dbClean(date('Ymd', strtotime($post['transdate_close']))),
						"CLOSE_TYPE"		=> dbClean($post['close_type']),
						"AR_STOP"			=> dbClean(cleanformat($post['ar_stop'])),
						"AR_CURRENT"		=> dbClean(cleanformat($post['ar_current'])),
						"COLLATERAL_AMT"	=> dbClean(cleanformat($post['collateral_amt'])),
						"COLLECTION_TYPE"	=> dbClean($post['collection_type']),
						"STOPAGE_REASON"	=> dbClean($post['stopage_reason']),
						"PENDING_FEE_STATUS"	=> dbClean($post['pending_fee_status']),
						"PIC_OPEN_TS"		=> !empty($post['pic_open_ts']) ? dbClean($post['pic_open_ts']) : '',
						"PIC_OPEN_ASM"		=> !empty($post['pic_open_asm']) ? dbClean($post['pic_open_asm']) : '',
						"PIC_OPEN_GSM"		=> !empty($post['pic_open_gsm']) ? dbClean($post['pic_open_gsm']) : '',
						"PIC_OPEN_CCT"		=> !empty($post['pic_open_cct']) ? dbClean($post['pic_open_cct']) : '',
						"PIC_CLOSE_TS"		=> !empty($post['pic_close_ts']) ? dbClean($post['pic_close_ts']) : '',
						"PIC_CLOSE_ASM"		=> !empty($post['pic_close_asm']) ? dbClean($post['pic_close_asm']) : '',
						"PIC_CLOSE_GSM"		=> !empty($post['pic_close_gsm']) ? dbClean($post['pic_close_gsm']) : '',
						"PIC_CLOSE_CCT"		=> !empty($post['pic_close_cct']) ? dbClean($post['pic_close_cct']) : '',
						"STRATEGY_SALES"	=> "",
						"STRATEGY_CCT"		=> "",
						"CREATED_AT"		=> date('Ymd His'),
						"CREATED_BY"		=> $session_data['user']['EMPLOYEE_ID'],
						"CREATED_DATE"		=> date('Ymd'),
					];
					// dd($visiting_report);
					
					$vr_assets = [];
					if (!empty($post['assets_class1'])) {
						foreach ($post['assets_class1'] as $i => $v) {
							$curr_data = [
								"VISITING_NO"	=> $visiting_no,
								"SEQUENCE"		=> $i + 1,
								"CLASS1"		=> $v,
								"CLASS2"		=> $post['assets_class2'][$i],
								"ASSET_TYPE"		=> $post['asset_type'][$i],
								"ASSET_SIZE"		=> $post['asset_size'][$i],
								"ASSET_VALUE"	=> cleanformat($post['asset_value'][$i]),
								"ASSET_ADDRESS"	=> $post['asset_address'][$i],
								"DOCS_CERTIFICATE"	=> $post['docs_certificate'][$i],
								"DOCS_SPPJ"		=> $post['docs_sppj'][$i],
								"DOCS_HT"	=> $post['docs_ht'][$i],
								"DOCS_OTHERS"	=> $post['docs_others'][$i]
							];

							$vr_assets[] = $curr_data;
						}
					}

					$vr_collection_plan = [];
					if (!empty($post['CL_collection_date'])) {
						foreach ($post['CL_collection_date'] as $i => $v) {
							$curr_data = [
								"VISITING_NO"		=> $visiting_no,
								"SEQUENCE"			=> $i + 1,
								"COLLECTION_DATE"	=> date('Ym', strtotime($v)),
								"AMOUNT"			=> cleanformat($post['CL_amount'][$i]),
								"AR_BALANCE"		=> cleanformat($post['CL_ar_balance'][$i]),
								"NOTES"				=> $post['CL_note'][$i]
							];

							$vr_collection_plan[] = $curr_data;
						}
					}

					$vr_other_debts = [];
					if (!empty($post['OT_creditor'])) {
						foreach ($post['OT_creditor'] as $i => $v) {
							$curr_data = [
								"VISITING_NO"		=> $visiting_no,
								"SEQUENCE"			=> $i + 1,
								"CREDITOR"			=> $v,
								"CURRENT_DEBT"		=> cleanformat($post['OT_current_debt'][$i]),
								"NOTES"				=> $post['OT_note'][$i]
							];

							$vr_other_debts[] = $curr_data;
						}
					}

					$vr_details = [];
					if (!empty($post['VD_visit_date'])) {
						foreach ($post['VD_visit_date'] as $i => $v) {
							$curr_data = [
								"VISITING_NO"			=> $visiting_no,
								"SEQUENCE"				=> $i + 1,
								"VISIT_DATE"			=> date('Ymd', strtotime($v)),
								"PARTICIPANT_CJ"		=> $post['VD_participant_cj'][$i],
								"PARTICIPANT_CUST"		=> $post['VD_participant_customer'][$i],
								"LOCATION"				=> $post['VD_location'][$i],
								"DESCRIPTION"			=> dbClean($post['VD_description'][$i]),
								"COLLECTION_BD_OPINION"	=> dbClean($post['VD_collection_bd_opinion'][$i])
							];

							$vr_details[] = $curr_data;
						}
					}

					$vr_strategy = [];
					if (!empty($post['VR_strategy_sales'])) {
						foreach ($post['VR_strategy_sales'] as $i => $v) {
							$curr_data = [
								"VISITING_NO"		=> $visiting_no,
								"SEQUENCE"			=> $i + 1,
								"STRATEGY_SALES"	=> $v,
								"STRATEGY_CCT"		=> dbClean($post['VR_strategy_cct'][$i]),
							];

							$vr_strategy[] = $curr_data;
						}
					}

					$vr_galleries = [];
					if (!empty($_FILES)) {
						foreach ($_FILES['VR_image_file']['name'] as $key => $v) {
							$no = $key + 1;
							$berkas = [];
							$berkas['name']= $v;
									$berkas['type']= $_FILES['VR_image_file']['type'][$key];
									$berkas['tmp_name']= $_FILES['VR_image_file']['tmp_name'][$key];
									$berkas['error']= $_FILES['VR_image_file']['error'][$key];
									$berkas['size']= $_FILES['VR_image_file']['size'][$key];

									$namafile = $this->upload_image($berkas, $visiting_no, $no);
									$vr_galleries[] = [
										'VISITING_NO'	=> $visiting_no,
										'SEQUENCE'		=> $no,
										'IMAGE_NAME'	=> $post['VR_image_name'][$key],
										'IMAGE_FILENAME'	=> $namafile
									];
						}
					}

					$core_logs = [
						"VISITING_NO"		=> $visiting_no,
						"TYPE"					=> "ENTRY",
						"CREATED_AT"		=> date('Ymd His'),
						"CREATED_BY"		=> $session_data['user']['EMPLOYEE_ID'],
					];

					$masterdata_logs = [
						"ON_TABLE"	=> "TR_VR",
						"JSONDATA"	=> json_encode($visiting_report)
					];
					$masterdata_logs = array_merge($masterdata_logs, $core_logs);

					$assets_logs = [
						"ON_TABLE"	=> "TR_VR_ASSETS",
						"JSONDATA"	=> json_encode($vr_assets)
					];
					$assets_logs = array_merge($assets_logs, $core_logs);

					$collection_plan_logs = [
						"ON_TABLE"	=> "TR_VR_COLLECTION_PLAN",
						"JSONDATA"	=> json_encode($vr_collection_plan)
					];
					$collection_plan_logs = array_merge($collection_plan_logs, $core_logs);

					$other_debts_logs = [
						"ON_TABLE"	=> "TR_VR_OTHER_DEBTS",
						"JSONDATA"	=> json_encode($vr_other_debts)
					];
					$other_debts_logs = array_merge($other_debts_logs, $core_logs);

					$details_logs = [
						"ON_TABLE"	=> "TR_VR_DETAILS",
						"JSONDATA"	=> json_encode($vr_other_debts)
					];
					$details_logs = array_merge($details_logs, $core_logs);

					$strategy_logs = [
						"ON_TABLE"	=> "TR_VR_STRATEGY",
						"JSONDATA"	=> json_encode($vr_strategy)
					];
					$strategy_logs = array_merge($strategy_logs, $core_logs);

					$insertbatch_logs = [];
					$insertbatch_logs[] = $masterdata_logs;
					$insertbatch_logs[] = $assets_logs;
					$insertbatch_logs[] = $collection_plan_logs;
					$insertbatch_logs[] = $other_debts_logs;
					$insertbatch_logs[] = $details_logs;
					$insertbatch_logs[] = $strategy_logs;
					$save_logs = $this->db->insert_batch('LOGS_VISIT_REPORT_DATA', $insertbatch_logs);


					$save = $this->Dbhelper->insertData('TR_VR', $visiting_report);
					if (!empty($vr_assets)) {
						$save_assets = $this->db->insert_batch('TR_VR_ASSETS', $vr_assets);
					}
					if (!empty($vr_collection_plan)) {
						$save_collection_plan = $this->db->insert_batch('TR_VR_COLLECTION_PLAN', $vr_collection_plan);
					}
					if (!empty($vr_other_debts)) {
						$save_other_debts = $this->db->insert_batch('TR_VR_OTHER_DEBTS', $vr_other_debts);
					}
					if (!empty($vr_details)) {
						$save_details = $this->db->insert_batch('TR_VR_DETAILS', $vr_details);
					}
					if (!empty($vr_strategy)) {
						$save_strategy = $this->db->insert_batch('TR_VR_STRATEGY', $vr_strategy);
					}
					if (!empty($vr_galleries)) {
						$save_galleries = $this->db->insert_batch('TR_VR_GALLERIES', $vr_galleries);
					}
					if ($save) {
						$this->session->set_flashdata('alert', "Create data success, press back button and move to visit report menu to check data");
						return redirect($redirect);
					}
				} catch (Exception $e) {
					dd($e->getMessage());
				}
			}
			$this->session->set_flashdata('alert', "Create data failed");
			return redirect($redirect);
		} else {
			return redirect($redirect);
		}
	}

	private function collection_type() {
		$data = [
			'CICILAN', 'SEGERA', 'TRANSAKSI_ULANG', 'JALUR_HUKUM', 'TAKE_OVER_ASSET', 'AMBIL_JAMINAN', 'SULIT_COLLECTION', 'SHM'
		];

		return $data;
	}

	private function get_visitingreport($visiting_no) {
		$data['vr'] 			= $this->detail_data($visiting_no);
		$data['vr_assets']		= $this->Dbhelper->selectTabel('*', 'TR_VR_ASSETS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_collection_plan']		= $this->Dbhelper->selectTabel('*', 'TR_VR_COLLECTION_PLAN', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_details']		= $this->Dbhelper->selectTabel('*', 'TR_VR_DETAILS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_other_debts']		= $this->Dbhelper->selectTabel('*', 'TR_VR_OTHER_DEBTS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_strategy']		= $this->Dbhelper->selectTabel('*', 'TR_VR_STRATEGY', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_galleries']		= $this->Dbhelper->selectTabel('*', 'TR_VR_GALLERIES', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		return $data;
	}

	private function detail_data($visiting_no) {
		$query = "
			select
			    a.*,
			    b.SALES_ORG as COMPANY_CODE,
			    b.CUSTOMER_NAME,
				b.TELEPHONE_2,
				b.STREET,
				b.CHIEF,
				b.CHIEF_ID,
			    FN_CODE_NAME('CS02' ,REGION)   REGION_NAME,
			    FN_CODE_NAME('AB' ,SALES_ORG)   COMPANY_NAME,
			    FN_CODE_NAME('AC01' ,NVL(SALES_OFFICE,'3210'))   SALES_OFFICE_NAME,
			    FN_HR_EMPLOYEE('02',PIC_OPEN_TS) PIC_OPEN_TS_NAME,
			    FN_HR_EMPLOYEE('02',PIC_OPEN_ASM) PIC_OPEN_ASM_NAME,
			    FN_HR_EMPLOYEE('02',PIC_OPEN_GSM) PIC_OPEN_GSM_NAME,
			    FN_HR_EMPLOYEE('02',PIC_OPEN_CCT) PIC_OPEN_CCT_NAME,
			    FN_HR_EMPLOYEE('02',PIC_CLOSE_TS) PIC_CLOSE_TS_NAME,
			    FN_HR_EMPLOYEE('02',PIC_CLOSE_ASM) PIC_CLOSE_ASM_NAME,
			    FN_HR_EMPLOYEE('02',PIC_CLOSE_GSM) PIC_CLOSE_GSM_NAME,
			    FN_HR_EMPLOYEE('02',PIC_CLOSE_CCT) PIC_CLOSE_CCT_NAME,
			    FN_USER_NAME(CREATED_BY) CREATED_BY_NAME
			from TR_VR a, CD_CUSTOMER b
			where 
				a.CUSTOMER = b.CUSTOMER 
				and a.PLANT = b.SALES_ORG
				and a.VISITING_NO = '$visiting_no'
		";
        $data = $this->db->query($query)->row_array();
        // dd($this->db->last_query());
        // dd($data);
        return $data;
	}

	private function generateVisitingNo() {
        $generated_no = "VISIT".date('Ymd');
        $no = 1;
        $today = date('Ymd');
        $this->db->select('VISITING_NO, CREATED_AT');
        $this->db->from('TR_VR');
        $this->db->like('CREATED_AT', $today, 'after');
        $this->db->order_by('CREATED_AT', 'DESC');
        $this->db->order_by('VISITING_NO', 'DESC');
        $latest_data = $this->db->get()->row();
        if (!empty($latest_data)) {
            $no = substr($latest_data->VISITING_NO, -4);

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

    public function upload_image($berkas, $visiting_no, $sequence) {
		$result = "";
		if ($berkas["name"] != "") {
			$pathDir 	= "./upload/";
			// chmod($pathDir, 777);
			$temp = explode(".", $berkas["name"]);
			$type_file = '.'.end($temp);
			if (trim($berkas['name']) != "") {
				$_FILES["files"] = $berkas;
				$stringRandom = random_char(10);
				$nama = $visiting_no."_".$sequence.$type_file;
				$config['upload_path']          = $pathDir;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $config['file_name'] = $nama;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('files')) {
                    $result = array('error' => $this->upload->display_errors());
                } else {
                    $result = $nama;
                }
			}
		}

		return $result;
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

	public function profile() {
		$this->cekLogin();
		$data['title'] 	= 'My Profile';
		$data['user']	= $this->session_data['user'];
		$this->template->_v('profile/index', $data);
	}

	public function profile_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$update_data = [];

			$user = $this->session_data['user'];
			if (!password_verify($post['CURRENT_PASSWORD'], $user['PASSWORD'])) {
				$this->session->set_flashdata('error', "Update data failed");
				return redirect(base_url()."/profile");
			}

			if (!empty($post['NEW_PASSWORD'])) {
				$update_data['PASSWORD'] = password_hash(dbClean($post['NEW_PASSWORD']), PASSWORD_DEFAULT);
			}

			if (!empty($update_data)) {
				$save 	= $this->Dbhelper->updateData("CD_USER", array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']), $update_data);		
				if ($save) {
					$this->session->set_flashdata('success', "Update data success");
					return redirect(base_url('dashboard'));
				}
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect(base_url()."/profile");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect(base_url('dashboard'));
	}
	
	public function ajax_load_customer() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }

		$plant = $this->input->get('plant');
		$keyword = strtoupper($this->input->get('q'));
		$this->db->select('
			CD_CUSTOMER.SALES_ORG as COMPANY_CODE,
			COMPANY.CODE_NAME as COMPANY_NAME,  
			CD_CUSTOMER.CUSTOMER,
			CD_CUSTOMER.CUSTOMER_NAME as CUSTOMER_NAME,
			REGION.CODE_NAME as REGION_NAME,
			SALES_OFFICE.CODE_NAME as SALES_OFFICE_NAME,
			CD_CUSTOMER.TELEPHONE_2,
			CD_CUSTOMER.STREET,
			CD_CUSTOMER.CHIEF,
			CD_CUSTOMER.CHIEF_ID
		');
        $this->db->from('CD_CUSTOMER');
        $this->db->join('CD_CODE COMPANY', "CD_CUSTOMER.SALES_ORG = COMPANY.CODE AND COMPANY.HEAD_CODE = 'AB'");
        $this->db->join('CD_CODE SALES_OFFICE', "CD_CUSTOMER.SALES_OFFICE = SALES_OFFICE.CODE AND SALES_OFFICE.HEAD_CODE = 'AC01'", "left");
        $this->db->join('CD_CODE REGION', "CD_CUSTOMER.REGION = REGION.CODE AND REGION.HEAD_CODE = 'CS02'", "left");
        if (!empty($plant) && $plant != '*') {
        	$this->db->where('CD_CUSTOMER.SALES_ORG', $plant);
        }
        $this->db->group_start();
	        $this->db->like('CD_CUSTOMER.CUSTOMER_NAME', $keyword, 'both');
	        $this->db->or_like('CD_CUSTOMER.CUSTOMER', $keyword, 'both');
        $this->db->group_end();
        $this->db->order_by('CD_CUSTOMER.CUSTOMER_NAME', 'ASC');

        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function ajax_load_employee() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }

		$plant 		= $this->input->get('plant');
		$keyword 	= strtoupper($this->input->get('q'));
		$attr 		= $this->input->get('attribute_name');

		$roles 		= [];
		// if (!empty($attr)) {
		// 	if ($attr == 'pic_open_ts') {
		// 		$roles = ['TS'];
		// 	} elseif ($attr == 'pic_open_cct') {
		// 		$roles = ['CCT'];
		// 	} elseif ($attr == 'pic_open_asm') {
		// 		$roles = ['ASM'];
		// 	} elseif ($attr == 'pic_open_gsm') {
		// 		$roles = ['GSM'];
		// 	}
		// }
		$this->db->select('
			HR_EMPLOYEE.EMPNO,
			HR_EMPLOYEE.FULL_NAME
		');
        $this->db->from('HR_EMPLOYEE');
        $this->db->where('HR_EMPLOYEE.PLANT', $plant);
				$this->db->where('HR_EMPLOYEE.CONDITION_IN_OFFICE', '1');
				if (!empty($roles)) {
					$this->db->where_in('HR_EMPLOYEE.TS_ASM_GSM_CCT', $roles);
				}
        $this->db->group_start();
	        $this->db->like('HR_EMPLOYEE.FULL_NAME', $keyword, 'both');
	        $this->db->or_like('HR_EMPLOYEE.EMPNO', $keyword, 'both');
        $this->db->group_end();
        $this->db->order_by('HR_EMPLOYEE.FULL_NAME', 'ASC');

        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function ajax_load_group_customer_reminder() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }
		$all_plant = [
			['GROUP_CUSTOMER' => '*', 'GROUP_CUSTOMER_NM' => 'ALL GROUP CUSTOMER']
		];

		$plant = $this->input->get('plant');
		$keyword = strtoupper($this->input->get('q'));
		$this->db->select('
			GROUP_CUSTOMER, GROUP_CUSTOMER_NM
		');
        $this->db->from('FEED_CUST_REMAINDER_WA');
        if (!empty($plant) && $plant != '*') {
        	$this->db->where('FEED_CUST_REMAINDER_WA.BUSINESS_AREA', $plant);
        }
        $this->db->group_start();
	        $this->db->like('FEED_CUST_REMAINDER_WA.CUSTOMER_NM', $keyword, 'both');
	        $this->db->or_like('FEED_CUST_REMAINDER_WA.CUSTOMER', $keyword, 'both');
        $this->db->group_end();
        $this->db->group_by('GROUP_CUSTOMER, GROUP_CUSTOMER_NM');
        $this->db->order_by('FEED_CUST_REMAINDER_WA.GROUP_CUSTOMER_NM', 'ASC');

        $data = $this->db->get()->result_array();
        $data = array_merge($all_plant, $data);
		echo json_encode($data);
	}

	public function ajax_load_customer_reminder() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }
		$all_plant = [
			['CUSTOMER' => '*', 'CUSTOMER_NM' => 'ALL CUSTOMER']
		];

		$plant = $this->input->get('plant');
		$group_customer = $this->input->get('group_customer');
		$exp_group_customer = explode("|", $group_customer);
		$keyword = strtoupper($this->input->get('q'));
		$this->db->select('
			CUSTOMER, CUSTOMER_NM
		');
        $this->db->from('FEED_CUST_REMAINDER_WA');
        if (!empty($plant) && $plant != '*') {
        	$this->db->where('FEED_CUST_REMAINDER_WA.BUSINESS_AREA', $plant);
        }
        if (!empty($exp_group_customer[0]) && $exp_group_customer[0] != '*') {
			$this->db->where('FEED_CUST_REMAINDER_WA.GROUP_CUSTOMER', $exp_group_customer[0]);
		}
        $this->db->group_start();
	        $this->db->like('FEED_CUST_REMAINDER_WA.CUSTOMER_NM', $keyword, 'both');
	        $this->db->or_like('FEED_CUST_REMAINDER_WA.CUSTOMER', $keyword, 'both');
        $this->db->group_end();
        $this->db->group_by('CUSTOMER, CUSTOMER_NM');
        $this->db->order_by('FEED_CUST_REMAINDER_WA.CUSTOMER_NM', 'ASC');

        $data = $this->db->get()->result_array();
        $data = array_merge($all_plant, $data);
		echo json_encode($data);
	}

	public function ajax_load_kota() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }

		$provinsi 		= $this->input->get('provinsi');
		$keyword 	= strtoupper($this->input->get('q'));
		$this->db->select('
			ID_REGENCIES,
			REGENCIES
		');
        $this->db->from('CD_REGENCIES');
        $this->db->where('PROVINCE_ID', $provinsi);
				$this->db->group_start();
	        $this->db->like('REGENCIES', $keyword, 'both');
        $this->db->group_end();
        $this->db->order_by('REGENCIES', 'ASC');

        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	public function ajax_load_desa() {
		// $check = $this->onlyRequestPost();
		// if (!$check) {
		// 	return json_encode([]);
		// }

		$kota 		= $this->input->get('kota');
		$keyword 	= strtoupper($this->input->get('q'));
		$this->db->select('
			ID_DISTRICTS,
			DISTRICS
		');
        $this->db->from('CD_DISTRICTS');
        $this->db->where('REGENCIES_ID', $kota);
				$this->db->group_start();
	        $this->db->like('DISTRICS', $keyword, 'both');
        $this->db->group_end();
        $this->db->order_by('DISTRICS', 'ASC');

        $data = $this->db->get()->result_array();
		echo json_encode($data);
	}

	private function onlyRequestPost() {
		$session = $this->session_data;
		if (empty($session) || $this->input->server('REQUEST_METHOD') != 'POST') {
			return false;
		}
		return true;
	}

	// DONT CHANGE THIS
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
	private function validation($post_data) {
		$errMessage 	= [];
		$id 			= isset($post_data["id"]) ? $post_data["id"] : null;
		$surat_id		= isset($post_data['surat_id']) ? $post_data['surat_id'] : null;

		if (!empty($id)) {
			$data = $this->Surat_model->find($id);
			if (empty($data)) {
				$this->session->set_flashdata('error', "Data not found");
	        	return redirect('pengajuan-surat');
	        }
	        $user = $this->session_data['user'];
	        if ($data->user_id != $user['id']) {
	        	$this->session->set_flashdata('error', "Data not found");
	        	return redirect('pengajuan-surat');
	        }
		}

		return $errMessage;
	}
}
