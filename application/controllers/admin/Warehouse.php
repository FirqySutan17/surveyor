<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Warehouse extends CI_Controller {
	var $menu_id 	= "";
	var $menu_id2 	= "";
	var $menu_id3 	= "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'TR008';
		$this->menu_id2 	= 'TR008';
		$this->menu_id3 	= 'R002';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('warehouse');
		$this->load->library('upload');
	}

	public function index() {
		$province 		= "*";
		$regencies 		= "*";
		$districts 		= "*";

		$user = $this->session_data['user'];

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$province 			= $this->input->post('province');
			$regencies 			= $this->input->post('regencies');
			$districts 			= $this->input->post('districts');
		}

		$filter = [
			"province"				=> $province,
			"regencies"				=> $regencies,
			"districts"				=> $districts,
		];

		$data['title'] 				= 'DISTRICTS';
		$data['province'] 			= $this->dataprovince();
		$data['regencies'] 			= $this->dataregencies();
		$data['districts'] 			= $this->datadistricts();
		$data['datatable']			= $this->datatable($filter);
		$data['filter']				= $filter;
		// dd($data['districts']);
		
		$this->template->_v('warehouse/index', $data);
	}

	public function index_update() {

		$sdate 		= date('Y-m').'-01';
		$edate 		= date('Y-m-d');
		$plant 		= "*";
		$surveyor = "*";
		$phase 		= "*";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$sdate 			= $this->input->post('sdate');
			$edate 			= $this->input->post('edate');
			$plant 			= $this->input->post('plant');
			$surveyor 	= $this->input->post('surveyor');
			$phase 	= $this->input->post('phase');
		}

		$filter = [
			"plant"	=> $plant,
			"sdate"	=> $sdate,
			"edate"	=> $edate,
			"surveyor"	=> $surveyor,
			"phase"	=> $phase
		];

		$data['phase']				=	$this->list_phase();
		$data['title'] 				= 'SURVEY';
		$data['datatable']		= $this->datatable($filter);
		$data['filter']				= $filter;
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['surveyor'] 		= $this->list_surveyor();
		
		$this->template->_v('survey/index-update', $data);
	}

	public function entry() {

		$user 							= $this->session_data['user'];
		$data['title'] 					= 'WAREHOUSE';
		$data['user'] 					= $user;
		$data['warehouses'] 			= $this->Dbhelper->selectTabel('CODE, NAMA', 'CD_GUDANG', [], 'NAMA', 'ASC');
		$data['provinces'] 				= $this->Dbhelper->selectTabel('ID_PROVINCE, PROVINCE', 'CD_PROVINCE', [], 'PROVINCE', 'ASC');
		
		$this->template->_v('warehouse/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$postjson = json_encode($post);
			$textfile = date('YmdHis').'_'.$this->session_data['user']['EMPLOYEE_ID'];
			if (!write_file(APPPATH."logs/log_$textfile.txt", $postjson)) {
				$this->session->set_flashdata('success', "Unable to logs post");
				return redirect($this->own_link.'/report');
			}

			$wh_no = $this->generateWarehouseNo();
			try {
				
				// SURVEY DATA
				$warehouse_report = [
					"WH_NO"				=> $wh_no,
					"WH_DATE"			=> date('Ymd', strtotime($post['wh_date'])),
					"PROVINCE"			=> dbClean($post['province']),
					"REGENCIES"			=> dbClean($post['regencies']),
					"DISTRICT"			=> dbClean($post['districts']),
					"WH_NAME"			=> dbClean($post['wh_name']),
					"STOCK_SILO"		=> dbClean($post['stock_silo']),
					"STOCK_FLAT"		=> dbClean($post['stock_flat']),
					"STOCK_LJ"			=> dbClean($post['stock_lj']),
					"STOCK_DRYER"		=> dbClean($post['stock_dryer']),
					"DAILY_17"			=> dbClean($post['daily_17']),
					"DAILY_15"			=> dbClean($post['daily_15']),
					"BUYING_17"			=> dbClean($post['buying_17']),
					"BUYING_15"			=> dbClean($post['buying_15']),
					"SALES_TRADERS"		=> dbClean($post['sales_traders']),
					"SALES_FEEDMILL"	=> dbClean($post['sales_feedmill']),
					"SALES_PRICE"		=> dbClean($post['sales_price']),
					"DESCRIPT"			=> dbClean($post['descript']),
					"CREATED_AT"		=> date('Ymd His'),
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
				];

				if (empty($warehouse_report["CREATED_BY"])) {
					$this->session->set_flashdata('error', "User log-in not found");
						return redirect($this->own_link.'/report');
				}
				
				$warehouse_corn = [];
				if (!empty($post['region'])) {
					foreach ($post['region'] as $i => $v) {
						$curr_data = [
							"WH_NO"			=> $wh_no,
							"SEQUENCE"		=> $i + 1,
							"REGION"		=> $v,
							"AMOUNT_TON"	=> $post['amount_ton'][$i]
						];

						$warehouse_corn[] = $curr_data;
					}
				}

				$wh_galleries = [];
				if (!empty($_FILES)) {
					foreach ($_FILES['image_title']['name'] as $key => $v) {
						$no = $key + 1;

				        $namafile = $this->upload_image($berkas, $wh_no, $no);
				        $wh_galleries[] = [
				        	'WH_NO'	=> $wh_no,
				        	'SEQUENCE'		=> $no,
				        	'IMAGE_TITLE'	=> $post['image_title'][$key],
				        	'IMAGE_FILE'	=> $namafile
				        ];
					}
				}
	
				$save = $this->Dbhelper->insertData('WAREHOUSE', $warehouse_report);
				if (!empty($warehouse_corn)) {
					$save_corn = $this->db->insert_batch('WAREHOUSE_CORN', $warehouse_corn);
				}
				if (!empty($warehouse_galleries)) {
					$save_galleries = $this->db->insert_batch('WAREHOUSE_IMAGES', $warehouse_galleries);
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

	public function detail($survey_no) {
		$user	= 	$this->session_data['user'];

		$data_detail = $this->get_surveydetail($survey_no);
		$data['title'] 				= 'SURVEY';
		$data['user'] 				= $user;
		$data['detail']				= $data_detail;
		$this->template->_v('survey/detail', $data);
	}

	public function edit($survey_no) {
		$user 							= $this->session_data['user'];

		$data_detail = $this->get_surveydetail($survey_no);
		$data['title'] 			= 'SURVEY';
		$data['user'] 			= $user;
		$data['detail']				= $data_detail;
		$data['placeholder'] 	= $this->list_placeholder();
		$data['harvest'] 	= $this->list_harvest();
		
		$this->template->_v('survey/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$survey_no = $post['survey_no'];
			try {
				// dd($post);
				// VR DATA
				$survey = [
					"CURRENT_PHASE"				=> "",
					"CURRENT_PHASE_DATE"	=> "",
					"UMUR_TANAM"		=> 0,
					"UPDATED_AT"		=> date('Ymd His'),
					"UPDATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID']
				];
				
				$survey_farmers = [];
				if (!empty($post['farmer_name'])) {
					foreach ($post['farmer_name'] as $i => $v) {
						$curr_data = [
							"SURVEY_NO"		=> $survey_no,
							"SEQUENCE"		=> $i + 1,
							"SURVEY_DATE"	=> date('Ymd', strtotime($survey_report['SURVEY_DATE'])),
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
							"SURVEY_DATE"	=> date('Ymd', strtotime($post['market_date'][$i])),
							"PRICE"	=> $v
						];

						$survey_market_price[] = $curr_data;
					}
				}

				$survey_harvest_phase = [];
				$survey_planting_phase = [];
				$phase_array = ['persiapan-lahan', 'vegetatif-awal', 'vegetatif-akhir', 'genetatif-awal', 'genetatif-akhir', 'gagal-panen'];
				$current_phase 			= "";
				$current_phase_date = "";
				$umur_tanam = 0;
				if (!empty($post['PLANTING_siklus'])) {
					$sequence = 1;
					foreach ($post['PLANTING_siklus'] as $siklus_index => $siklus) {
						foreach ($phase_array as $phase_key) {
							$phase 	= $post['PLANTING_phase'][$phase_key][$siklus_index];
							$curr_phase_date 	= !empty($post['PLANTING_date'][$phase_key][$siklus_index]) ?  date('Ymd', strtotime($post['PLANTING_date'][$phase_key][$siklus_index])) : '';
							if (!empty($curr_phase_date)) {
								$current_phase = $phase_key;
								$current_phase_date = $curr_phase_date;
							}
							foreach ($post['PLANTING_description'][$phase_key][$siklus_index] as $i => $v) {
								if ($i == 0 && $current_phase == $phase_key) {
									$umur_tanam = (int) $v;
								}
								$curr_data = [
									"SURVEY_NO"			=> $survey_no,
									"SEQUENCE"			=> $sequence,
									"SURVEY_DATE"		=> $curr_phase_date,
									"PHASE"				=> $phase,
									"DESCRIPTION"		=> dbClean($v),
									"SIKLUS"			=> $siklus
								];
		
								$sequence += 1;
								$survey_planting_phase[] = $curr_data;
							}
						}

						if (!empty($post['HARVEST_score'])) {
							foreach ($post['HARVEST_score'][$siklus_index] as $i => $v) {
								if (!empty($post['baris'][$siklus_index][$i])) {
									$curr_data = [
										"SURVEY_NO"			=> $survey_no,
										"SEQUENCE"			=> $i + 1,
										"SURVEY_DATE"		=> date('Ymd', strtotime($survey_report['SURVEY_DATE'])),
										"SCORE"				=> $v,
										"BARIS"				=> dbClean($post['baris'][$siklus_index][$i]),
										"BARIS_ACTUAL"		=> dbClean($post['baris_actual'][$siklus_index][$i]),
										"BARIS"				=> dbClean($post['baris'][$siklus_index][$i]),
										"BARIS_ACTUAL"		=> dbClean($post['baris_actual'][$siklus_index][$i]),
										"BIJI"				=> dbClean($post['biji'][$siklus_index][$i]),
										"BIJI_ACTUAL"		=> dbClean($post['biji_actual'][$siklus_index][$i]),
										"BOBOT"				=> dbClean($post['bobot'][$siklus_index][$i]),
										"BOBOT_ACTUAL"		=> dbClean($post['bobot_actual'][$siklus_index][$i]),
										'SIKLUS'			=> $siklus
									];
		
									$survey_harvest_phase[] = $curr_data;
								}
							}
						}
					}
				}


				$survey_galleries = [];
				if (!empty($_FILES)) {
					// foreach ($_FILES['SURVEY_IMAGE']['name'] as $key => $v) {
					// 	$no = $key + 1;
					// 	$berkas = [];
					// 	$berkas['name']= $v;
				  //       $berkas['type']= $_FILES['SURVEY_IMAGE']['type'][$key];
				  //       $berkas['tmp_name']= $_FILES['SURVEY_IMAGE']['tmp_name'][$key];
				  //       $berkas['error']= $_FILES['SURVEY_IMAGE']['error'][$key];
				  //       $berkas['size']= $_FILES['SURVEY_IMAGE']['size'][$key];

				  //       $namafile = $this->upload_image($berkas, $survey_no, $no);
				  //       $survey_galleries[] = [
				  //       	'SURVEY_NO'		=> $survey_no,
				  //       	'SEQUENCE'		=> $no,
				  //       	'IMAGE_TITLE'	=> !empty($post['SURVEY_IMAGE_TITLE'][$key]) ? $post['SURVEY_IMAGE_TITLE'][$key] : '-',
				  //       	'IMAGE_FILENAME'	=> $namafile
				  //       ];
					// }
				}

				$survey["CURRENT_PHASE"] 	= $current_phase;
				$survey["CURRENT_PHASE_DATE"] 	= $current_phase_date;
				$survey["UMUR_TANAM"] 		= $umur_tanam;
				$save = $this->db->update('SURVEY', $survey, array('SURVEY_NO' => $survey_no));
				if (!empty($survey_farmers)) {
					$delete = $this->db->delete('SURVEY_FARMERS', array('SURVEY_NO' => $survey_no));
					$save_farmers = $this->db->insert_batch('SURVEY_FARMERS', $survey_farmers);
				}
				if (!empty($survey_market_price)) {
					$delete = $this->db->delete('SURVEY_MARKET_PRICES', array('SURVEY_NO' => $survey_no));
					$save_market_prices = $this->db->insert_batch('SURVEY_MARKET_PRICES', $survey_market_price);
				}
				if (!empty($survey_harvest_phase)) {
					$delete = $this->db->delete('SURVEY_HARVEST_PHASE', array('SURVEY_NO' => $survey_no));
					$save_harvest_phase = $this->db->insert_batch('SURVEY_HARVEST_PHASE', $survey_harvest_phase);
				}
				if (!empty($survey_planting_phase)) {
					$delete = $this->db->delete('SURVEY_PLANTING_PHASE', array('SURVEY_NO' => $survey_no));
					$save_planting_phase = $this->db->insert_batch('SURVEY_PLANTING_PHASE', $survey_planting_phase);
				}
				if (!empty($survey_galleries)) {
					$delete = $this->db->delete('SURVEY_IMAGES', array('SURVEY_NO' => $survey_no));
					$save_galleries = $this->db->insert_batch('SURVEY_IMAGES', $survey_galleries);
				}

				// $vr_galleries = [];
				// if (!empty($post['VR_image_name'])) {
				// 	foreach ($post['VR_image_name'] as $i => $v) {
				// 		$no = $i + 1;
				// 		$namafile = !empty($post['VR_image_filename'][$i]) ? $post['VR_image_filename'][$i] : '';
				// 		if (!empty($_FILES['VR_image_file']['name'][$i])) {
				// 			if (!empty($namafile)) {
				// 				$delete_image = $this->delete_image($namafile);
				// 			}
				// 			$berkas = [];
				// 			$berkas['name']= $_FILES['VR_image_file']['name'][$i];
				// 	        $berkas['type']= $_FILES['VR_image_file']['type'][$i];
				// 	        $berkas['tmp_name']= $_FILES['VR_image_file']['tmp_name'][$i];
				// 	        $berkas['error']= $_FILES['VR_image_file']['error'][$i];
				// 	        $berkas['size']= $_FILES['VR_image_file']['size'][$i];

				// 	        $namafile = $this->upload_image($berkas, $visiting_no, $no);
				// 		}
				// 		$vr_galleries[] = [
				//         	'VISITING_NO'	=> $visiting_no,
				//         	'SEQUENCE'		=> $no,
				//         	'IMAGE_NAME'	=> $v,
				//         	'IMAGE_FILENAME'	=> $namafile
				//         ];
				// 	}
				// } elseif (empty($post['VR_image_name']) && !empty($post['VR_image_filename'])) {
				// 	foreach ($post['VR_image_filename'] as $i => $v) {
				// 		$delete_image = $this->delete_image($v);
				// 	}
				// }
				

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

	private function dataprovince() {
		$query = "
			SELECT ID_PROVINCE, PROVINCE
			FROM CD_PROVINCE
		";
		
		// $query .= " order by CODE ASC";
        $data = $this->db->query($query)->result_array();
		return $data;
		// dd($query);
	}

	private function dataregencies() {
		$query = "
			SELECT ID_REGENCIES, REGENCIES
			FROM CD_REGENCIES
		";
		
		// $query .= " order by CODE ASC";
        $data = $this->db->query($query)->result_array();
		return $data;
		// dd($query);
	}

	private function datadistricts() {
		$query = "
			SELECT ID_DISTRICTS, DISTRICS
			FROM CD_DISTRICTS
		";
		
		// $query .= " order by CODE ASC";
        $data = $this->db->query($query)->result_array();
		return $data;
		// dd($query);
	}

	private function datatable($filter) {
		$province 	= $filter['province'];
		$regencies 	= $filter['regencies'];
		$districts 	= $filter['districts'];

		$query = "
			SELECT 
				WH.*,
				DISTRICTS.DISTRICS AS DISTRICT_NAME, 
				REGENCIES.REGENCIES AS REGENCIES_NAME, 
				PROVINCE.PROVINCE AS PROVINCE_NAME
			FROM
				WAREHOUSE WH
			JOIN 
				CD_DISTRICTS DISTRICTS ON WH.DISTRICT = DISTRICTS.ID_DISTRICTS
			JOIN 
				CD_REGENCIES REGENCIES ON DISTRICTS.REGENCIES_ID = REGENCIES.ID_REGENCIES
			JOIN 
				CD_PROVINCE PROVINCE ON REGENCIES.PROVINCE_ID = PROVINCE.ID_PROVINCE
		";
		if ($filter['province'] != '*') {
			$query .= " WHERE ID_PROVINCE = '".$filter['province']."'";
		}
		if ($filter['regencies'] != '*') {
			if ($filter['province'] != '*') {
				$query .= " and ";
			} else {
				$query .= " WHERE ";
			}
			$query .= " ID_REGENCIES = '".$filter['regencies']."'";
		}
		if ($filter['districts'] != '*') {
			
			if ($filter['regencies'] != '*' || $filter['province'] != '*') {
				$query .= " and ";
			} else {
				$query .= " WHERE ";
			}
			$query .= " ID_DISTRICTS = '".$filter['districts']."'";
		}
		$query .= " order by WH_NO ASC";
		// dd($query);
        $data = $this->db->query($query)->result_array();
		
		return $data;
	}

	private function generateWarehouseNo() {
        $generated_no = "WHS";
        $no = 1;
        $data = $this->Dbhelper->selectTabel('WH_NO', 'WAREHOUSE', array(), 'WH_NO', 'DESC');
		$no 	= count($data) + 1;
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

    public function upload_image($berkas, $wh_no, $sequence) {
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
		if (!in_array($this->menu_id, $user_access) && !in_array($this->menu_id2, $user_access) && !in_array($this->menu_id3, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}

