<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class survey extends CI_Controller {
	var $menu_id 	= "";
	var $menu_id2 	= "";
	var $menu_id3 	= "";
	var $menu_id4 	= "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'TR001';
		$this->menu_id2 	= 'R001';
		$this->menu_id3 	= 'R003';
		$this->menu_id4 	= 'R004';
		$this->menu_id5 	= 'TR004';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('survey');
		$this->load->library('upload');
	}

	public function entry() {

		$user 							= $this->session_data['user'];
		$data['title'] 			= 'SURVEY';
		$data['user'] 			= $user;
		$data['provinces'] 	= $this->Dbhelper->selectTabel('ID_PROVINCE, PROVINCE', 'CD_PROVINCE', [], 'PROVINCE', 'ASC');
		$data['placeholder'] 	= $this->list_placeholder();
		$data['harvest'] 	= $this->list_harvest();
		
		// dd($data['user']);
		$this->template->_v('survey/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			// $postjson = json_encode($post);
			// $textfile = date('YmdHis').'_'.$this->session_data['user']['EMPLOYEE_ID'];
			// if (!write_file(APPPATH."logs/log_$textfile.txt", $postjson)) {
			// 	$this->session->set_flashdata('success', "Unable to logs post");
			// 	return redirect($this->own_link.'/report');
			// }

			// dd($_FILES, false);
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
					"REGENCY"				=> dbClean($post['regencies']),
					"DISTRICT"			=> dbClean($post['districts']),
					"DESCRIPTION"		=> dbClean($post['address']),
					"LUAS_LAHAN"		=> dbClean($post['luas_lahan']),
					"CREATED_AT"		=> date('Ymd His'),
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
					"PLANT"					=> $this->session_data['user']['PLANT'] == '*' ? '3212' : $this->session_data['user']['PLANT'],
					"CURRENT_PHASE"	=> "",
					"UMUR_TANAM"		=> 0,
					"CURRENT_PHASE_DATE"	=> ""
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
				$current_phase 	= "";
				$current_phase_date = "";
				$umur_tanam 		= 0;
				$phase_array = ['persiapan-lahan', 'vegetatif-awal', 'vegetatif-akhir', 'genetatif-awal', 'genetatif-akhir', 'gagal-panen'];
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
				if (!empty($_FILES['SURVEY_IMAGE']['name'])) {
					foreach ($_FILES['SURVEY_IMAGE']['name'] as $key => $v) {
						$no = $key + 1;

						$berkas = [];
						$berkas['name']= $v;
						$berkas['type']= $_FILES['SURVEY_IMAGE']['type'][$key];
						$berkas['tmp_name']= $_FILES['SURVEY_IMAGE']['tmp_name'][$key];
						$berkas['error']= $_FILES['SURVEY_IMAGE']['error'][$key];
						$berkas['size']= $_FILES['SURVEY_IMAGE']['size'][$key];
						
						$namafile = $this->upload_image($berkas, $survey_no, $no); 
						if ($namafile) {
							$survey_galleries[] = [
								'SURVEY_NO'		=> $survey_no,
								'SEQUENCE'		=> $no,
								'IMAGE_TITLE'	=> !empty($post['SURVEY_IMAGE_TITLE'][$key]) ? $post['SURVEY_IMAGE_TITLE'][$key] : '-',
								'IMAGE_FILENAME'	=> $namafile
							];
						}
					}
				}

				$survey_report['CURRENT_PHASE'] = $current_phase;
				$survey_report['CURRENT_PHASE_DATE'] = $current_phase_date;
				$survey_report['UMUR_TANAM'] 		= $umur_tanam;
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

	public function ajax_location_detail() {
		$api_key = "AIzaSyBLUc8QC0GYh5ozbMbGBcNUm1BBIjvmmg8";
		$latitude = $this->input->get('latitude');
		$longitude = $this->input->get('longitude');
		
		$addressURL = "https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=-6.2336281&lon=106.8214081";
		$geocode	= file_get_contents($addressURL);
		
		$json 		= json_decode($addressURL);

		$address = $json['display_name'];
		
		$data["address"] 	= $address;
		dd($data["address"]);
		echo json_encode(["status" => true, "message" => "success get detail coordinate", "data" => $data]);
	}

	public function ajax_weather_detail() {
		$api_key = "74ebb634f79be8ce902a4280d7cbf8df";
		$latitude = $this->input->get('latitude');
		$longitude = $this->input->get('longitude');
		
		$addressURL = "http://api.openweathermap.org/data/2.5/weather?lat={$latitude}&lon={$longitude}&appid={$api_key}&units=metric";
		$geocode	= file_get_contents($addressURL);
		
		$json 		= json_decode($addressURL);

		$address = $json['display_name'];
		
		$data["address"] 	= $address;
		dd($data["address"]);
		echo json_encode(["status" => true, "message" => "success get detail coordinate", "data" => $data]);
	}

	public function index() {
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
		
		$this->template->_v('survey/index', $data);
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

	public function detail($survey_no) {
		$user	= 	$this->session_data['user'];

		$data_detail = $this->get_surveydetail($survey_no);
		$data['title'] 				= 'SURVEY';
		$data['user'] 				= $user;
		$data['detail']				= $data_detail;
		$data['placeholder'] 	= $this->list_placeholder();
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
				if (!empty($_FILES['SURVEY_IMAGE']['name'])) {
					foreach ($_FILES['SURVEY_IMAGE']['name'] as $key => $v) {
						$no = $key + 1;

						$berkas = [];
						$berkas['name']= $v;
						$berkas['type']= $_FILES['SURVEY_IMAGE']['type'][$key];
						$berkas['tmp_name']= $_FILES['SURVEY_IMAGE']['tmp_name'][$key];
						$berkas['error']= $_FILES['SURVEY_IMAGE']['error'][$key];
						$berkas['size']= $_FILES['SURVEY_IMAGE']['size'][$key];
						
						$namafile = $this->upload_image($berkas, $survey_no, $no); 
						if ($namafile) {
							$survey_galleries[] = [
								'SURVEY_NO'		=> $survey_no,
								'SEQUENCE'		=> $no,
								'IMAGE_TITLE'	=> !empty($post['SURVEY_IMAGE_TITLE'][$key]) ? $post['SURVEY_IMAGE_TITLE'][$key] : '-',
								'IMAGE_FILENAME'	=> $namafile
							];
						}
					}
				}

				$survey_galleries = [];
				if (!empty($post['SURVEY_IMAGE_TITLE'])) {
					foreach ($post['SURVEY_IMAGE_TITLE'] as $i => $v) {
						$no = $i + 1;
						$namafile = !empty($post['IMAGE_FILENAME'][$i]) ? $post['IMAGE_FILENAME'][$i] : '';
						if (!empty($_FILES['SURVEY_IMAGE']['name'][$i])) {
							if (!empty($namafile)) {
								$delete_image = $this->delete_image($namafile);
							}
							$berkas = [];
							$berkas['name']= $_FILES['SURVEY_IMAGE']['name'][$i];
							$berkas['type']= $_FILES['SURVEY_IMAGE']['type'][$i];
							$berkas['tmp_name']= $_FILES['SURVEY_IMAGE']['tmp_name'][$i];
							$berkas['error']= $_FILES['SURVEY_IMAGE']['error'][$i];
							$berkas['size']= $_FILES['SURVEY_IMAGE']['size'][$i];

							$namafile = $this->upload_image($berkas, $survey_no, $no);
						}
						$survey_galleries[] = [
							'SURVEY_NO'		=> $survey_no,
							'SEQUENCE'		=> $no,
							'IMAGE_TITLE'	=> !empty($post['SURVEY_IMAGE_TITLE'][$i]) ? $post['SURVEY_IMAGE_TITLE'][$i] : '-',
							'IMAGE_FILENAME'	=> $namafile
						];
					}
				} elseif (empty($post['SURVEY_IMAGE_TITLE']) && !empty($post['IMAGE_FILENAME'])) {
					foreach ($post['IMAGE_FILENAME'] as $i => $v) {
						$delete_image = $this->delete_image($v);
					}
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

	public function report() {
		$sdate 			= date('Y-m').'-01';
		$edate 			= date('Y-m-d');
		$province 		= "*";
		$regencies 		= "*";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$sdate 				= $this->input->post('sdate');
			$edate 				= $this->input->post('edate');
			$province 			= $this->input->post('province');
			$regencies 			= $this->input->post('regencies');
		}

		$filter = [
			"sdate"			=> $sdate,
			"edate"			=> $edate,
			"province"		=> $province,
			"regencies"		=> $regencies
		];

		$data['title'] 				= 'SURVEY';
		$data['datatable']		= $this->datatable_report($filter);
		$data['filter']				= $filter;
		$data['province'] 			= $this->dataprovince();
		$data['regencies'] 			= $this->dataregencies();
		// dd($data);
		$this->template->_v('survey/report', $data);
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

	public function drawing() {
		$user 							= $this->session_data['user'];
		$filter = ['HEAD_CODE'	=> 'AB'];
		if ($user['PLANT'] != '*') {
			$filter['CODE'] = $user['PLANT'];
		}

		// $data 	= $this->get_visitingreport($visiting_no);
		$data['title'] 				= 'SURVEY';
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter, 'CODE', 'ASC');
		$data['collection_type']	= $this->collection_type();
		$data['user'] = $user;
		
		$this->template->_v('survey/drawing', $data);
	}

	private function datatable($filter) {
		$sdate = date('Ymd', strtotime($filter['sdate']));
		$edate = date('Ymd', strtotime($filter['edate']));
		$plant = $filter['plant'];
		$surveyor = $filter['surveyor'];
		$phase = $filter['phase'];

		$where = "";
		if ($plant != '*') {
			$where .= " and PLANT = '$plant'";
		}

		if ($filter['surveyor'] != "*") {
			$where .= " and CREATED_BY = '$surveyor'";
		}
		
		if ($filter['phase'] != "*") {
			$where .= " and CURRENT_PHASE = '$phase'";
		}

		$query = "
			select 
				SURVEY_NO,
				SURVEY_DATE,
				DESCRIPTION,
				CREATED_BY,
				FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
				FN_CODE_NAME(PLANT, 'AB') PLANT_NAME,
				(
						SELECT WM_CONCAT(FARMER_NAME) as farmer_names FROM SURVEY_FARMERS WHERE SURVEY_NO =SURVEY.SURVEY_NO GROUP BY SURVEY_NO
				) as FARMER_NAMES
			from SURVEY
			where 
				(SURVEY_DATE BETWEEN '$sdate' AND '$edate')
				$where
			ORDER BY SURVEY_NO DESC
		";
		$data 				= $this->db->query($query)->result_array();
		return $data;
	}

	private function datatable_report($filter) {
		$sdate = date('Ymd', strtotime($filter['sdate']));
		$edate = date('Ymd', strtotime($filter['edate']));
		$province 	= $filter['province'];
		$regencies 	= $filter['regencies'];

		// $query = "
		// 	SELECT 
		// 		DISTRICTS.ID_DISTRICTS, 
		// 		DISTRICTS.PLANT_AREA, 
		// 		DISTRICTS.SEGMENT, 
		// 		DISTRICTS.DISTRICS AS DISTRICT_NAME, 
		// 		REGENCIES.REGENCIES AS REGENCIES_NAME, 
		// 		PROVINCE.PROVINCE AS PROVINCE_NAME
		// 	FROM 
		// 		CD_DISTRICTS DISTRICTS
		// 	JOIN 
		// 		CD_REGENCIES REGENCIES ON DISTRICTS.REGENCIES_ID = REGENCIES.ID_REGENCIES
		// 	JOIN 
		// 		CD_PROVINCE PROVINCE ON REGENCIES.PROVINCE_ID = PROVINCE.ID_PROVINCE
		// 	JOIN 
		// 		SURVEY SURVEY ON DISTRICTS._ID_DISTRICT = SURVEY.DISTRICT
		// ";
		// if ($filter['province'] != '*') {
		// 	$query .= " WHERE ID_PROVINCE = '".$filter['province']."'";
		// }
		// if ($filter['regencies'] != '*') {
		// 	if ($filter['province'] != '*') {
		// 		$query .= " and ";
		// 	} else {
		// 		$query .= " WHERE ";
		// 	}
		// 	$query .= " ID_REGENCIES = '".$filter['regencies']."'";
		// }
		// if ($filter['districts'] != '*') {
			
		// 	if ($filter['regencies'] != '*' || $filter['province'] != '*') {
		// 		$query .= " and ";
		// 	} else {
		// 		$query .= " WHERE ";
		// 	}
		// 	$query .= " ID_DISTRICTS = '".$filter['districts']."'";
		// }
		// $query .= " order by ID_DISTRICTS ASC";
		// $query .= " order by ID_DISTRICTS ASC";
		// dd($query);
    
		$where_inside = "";
		if ($filter['province'] != '*') {
			$where_inside .= " AND C.PROVINCE_ID = ".$filter['province'];
		}
		if ($filter['regencies'] != '*') {
			$where_inside .= " AND B.ID_REGENCIES = ".$filter['regencies'];
		}

		// override if filter is all *
		$where_outside = "";
		if (empty($where_inside)) {
			$where_outside = "WHERE report.TOTAL_PRODUKSI > 0";
		}

		$query = "
			SELECT 
					report.PROVINCE,
					report.REGENCIES,
					report.DISTRICS as DISTRICTS,
					report.PLANT_AREA,
					report.TOTAL_LAHAN,
					report.TOTAL_PRODUKSI,
					CASE 
											WHEN report.PLANT_AREA > 0 AND report.TOTAL_LAHAN > 0 
											THEN ROUND((report.TOTAL_LAHAN / report.PLANT_AREA) * 100, 2) ELSE 0
					END as PLANT_AREA_ESTIMATE,
					CASE 
											WHEN report.TOTAL > 0 AND report.TOTAL_30HARI > 0 
											THEN ROUND((report.TOTAL_30HARI / report.TOTAL) * 100, 2) ELSE 0
					END as day30,
					CASE 
											WHEN report.TOTAL > 0 AND report.TOTAL_60HARI > 0 
											THEN ROUND((report.TOTAL_60HARI / report.TOTAL) * 100, 2) ELSE 0
					END as day60,
					CASE 
											WHEN report.TOTAL > 0 AND report.TOTAL_90HARI > 0 
											THEN ROUND((report.TOTAL_90HARI / report.TOTAL) * 100, 2) ELSE 0
					END as day90,
					CASE 
											WHEN report.TOTAL > 0 AND report.TOTAL_90UPHARI > 0 
											THEN ROUND((report.TOTAL_90UPHARI / report.TOTAL) * 100, 2) ELSE 0
					END as day90plus
			FROM (
					SELECT 
							C.PROVINCE, B.REGENCIES, A.DISTRICS, A.PLANT_AREA, 
							COALESCE((SELECT SUM(LUAS_LAHAN) FROM SURVEY D WHERE D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT), 0) as TOTAL_LAHAN,
							(COALESCE((SELECT SUM(LUAS_LAHAN) FROM SURVEY D WHERE D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT), 0) * 5.5) as TOTAL_PRODUKSI,
							COALESCE(  
									(SELECT COUNT(UMUR_TANAM) FROM SURVEY D
									WHERE CURRENT_PHASE IS NOT NULL AND (UMUR_TANAM BETWEEN 0 AND 30)  AND D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT)
							, 0) as TOTAL_30hari,
							COALESCE(  
									(SELECT COUNT(UMUR_TANAM) FROM SURVEY D
									WHERE CURRENT_PHASE IS NOT NULL AND (UMUR_TANAM BETWEEN 31 AND 60)  AND D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT)
							, 0) as TOTAL_60hari,
							COALESCE(  
									(SELECT COUNT(UMUR_TANAM) FROM SURVEY D
									WHERE CURRENT_PHASE IS NOT NULL AND (UMUR_TANAM BETWEEN 61 AND 90)  AND D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT)
							, 0) as TOTAL_90hari,
							COALESCE(  
									(SELECT COUNT(UMUR_TANAM) FROM SURVEY D
									WHERE CURRENT_PHASE IS NOT NULL AND UMUR_TANAM >= 61  AND D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT)
							, 0) as TOTAL_90Uphari,
							COALESCE(  
									(SELECT COUNT(UMUR_TANAM) FROM SURVEY D
									WHERE CURRENT_PHASE IS NOT NULL AND UMUR_TANAM >= 0  AND D.DISTRICT = A.ID_DISTRICTS GROUP BY D.DISTRICT)
							, 0) as TOTAL
					FROM 
							CD_DISTRICTS A,
							CD_REGENCIES B,
							CD_PROVINCE C
					WHERE
							A.REGENCIES_ID = B.ID_REGENCIES
							AND B.PROVINCE_ID = C.ID_PROVINCE
							AND A.REGENCIES_ID = 3523
							$where_inside
			)  report
			$where_outside
			ORDER BY report.TOTAL_PRODUKSI DESC
		";
		$data = $this->db->query($query)->result_array();
		
		return $data;
	}

	private function list_surveyor() {
		$query = "
			select
				CREATED_BY,
				FN_USER_NAME(CREATED_BY) CREATED_BY_NAME
			from SURVEY
			WHERE CREATED_BY != '999999'
			GROUP BY CREATED_BY
			ORDER BY CREATED_BY ASC
		";
		$data 				= $this->db->query($query)->result_array();
		return $data;
	}

	private function list_phase() {
		$data = [];

		$data[] 	= ["CODE" => 'persiapan-lahan', "CODE_NAME" => 'PERSIAPAN LAHAN'];
		$data[] 	= ["CODE" => 'vegetatif-awal', 	"CODE_NAME" => 'VEGETATIF AWAL'];
		$data[] 	= ["CODE" => 'vegetatif-akhir', "CODE_NAME" => 'VEGETATIF AKHIR'];
		$data[] 	= ["CODE" => 'genetatif-awal', 	"CODE_NAME" => 'GENETATIF AWAL'];
		$data[] 	= ["CODE" => 'genetatif-akhir', "CODE_NAME" => 'GENETATIF AKHIR'];
		$data[] 	= ["CODE" => 'gagal-panen', 		"CODE_NAME" => 'GAGAL PANEN'];
		return $data;
	}

	private function list_placeholder() {
		$data = [];

		$data['persiapan-lahan'] 	= ["STANDARD / KETERANGAN PERSIAPAN LAHAN"];
		$data['vegetatif-awal'] 	= ["UMUR TANAM (1 - 25)", "TINGGI TANAMAN", "JUMLAH DAUN", "JENIS PUPUK YANG SUDAH DIAPLIKASIKAN", "ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)", "JENIS HERBISIDA / PERSTISIDA YANG DIAPLIKASIKAN", "CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)", "FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)", "INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)"];
		$data['vegetatif-akhir'] 	= ["UMUR TANAM (26 - 50)", "TINGGI TANAMAN", "JUMLAH DAUN", "MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)", "JENIS PUPUK YANG SUDAH DIAPLIKASIKAN", "ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)", "JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN", "CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)", "FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)", "INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)"];
		$data['genetatif-awal'] 	= ["UMUR TANAM (51 - 70)", "MUNCUL BUAH (ADA / TIDAK)", "JIKA BUAH ADA MAKA UKURAN BUAH (PANJANG DAN DIAMETER BUAH MUDA)", "MUNCUL BUNGA JANTAN DAN BETINA (ADA / TIDAK)", "KONDISI BUAH MUDAH (HUJAN SEGAR, PUCAT ATAU BUSUK)", "ESTIMASI JUMLAH PUPUK DIAPLIKASIKAN (KG)", "JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN", "CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)", "FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)", "INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)"];
		$data['genetatif-akhir']	= ["UMUR TANAM (71 - 110)", "MASUK KE FORMAT HASIL PANEN PADA SHEET HASIL PANEN", "JENIS HERBISIDA / PESTISIDA YANG DIAPLIKASIKAN", "CUACA SAAT SURVEY (KERING, BERAWAN, GERIMIS, HUJAN ATAU BANJIR)", "FREKUENSI HUJAN DALAM SEMINGGU DI LOKASI SURVEY (BERAPA KALI DALAM SEMINGGU)", "INTESITAS HUJAN DALAM SEMINGGU (KECIL, SEDANG, BESAR)"];
		$data['gagal-panen']			= ["UMUR SAAT PUSO", "KONDISI SAAT PUSO (KEKERINGAN / BANJIR)", "ESTIMASI LAHAN YANG TERKENA PUSO", "ESTIMASI PRODUKSI YANG HILANG KARENA PUSO"];

		return $data;
	}

	private function list_harvest() {
		$result = [];
		
		$result[0] = [
			"BARIS"	=> '0 - 5',
			"BIJI"	=> '0',
			"BOBOT"			=> '0'
		];

		$result[1] = [
			"BARIS"	=> '6',
			"BIJI"	=> '1-50',
			"BOBOT"			=> '1-9'
		];

		$result[2] = [
			"BARIS"	=> '7',
			"BIJI"	=> '51-100',
			"BOBOT"			=> '10-40'
		];

		$result[3] = [
			"BARIS"	=> '8-9',
			"BIJI"	=> '101-150',
			"BOBOT"			=> '41-80'
		];

		$result[4] = [
			"BARIS"	=> '10',
			"BIJI"	=> '151-200',
			"BOBOT"			=> '81-120'
		];

		$result[5] = [
			"BARIS"	=> '11',
			"BIJI"	=> '201-250',
			"BOBOT"			=> '121-160'
		];

		$result[6] = [
			"BARIS"	=> '12',
			"BIJI"	=> '251-300',
			"BOBOT"			=> '161-200'
		];

		$result[7] = [
			"BARIS"	=> '13',
			"BIJI"	=> '301-350',
			"BOBOT"			=> '201-240'
		];

		$result[8] = [
			"BARIS"	=> '14',
			"BIJI"	=> '351-400',
			"BOBOT"			=> '241-280'
		];

		$result[9] = [
			"BARIS"	=> '15',
			"BIJI"	=> '401-450',
			"BOBOT"			=> '281-320'
		];

		$result[10] = [
			"BARIS"	=> '16',
			"BIJI"	=> '451-500',
			"BOBOT"			=> '321-350'
		];

		return $result;
	}

	private function get_surveydetail($survey_no) {
		$planting_phase = $this->Dbhelper->selectTabel('*', 'SURVEY_PLANTING_PHASE', array('SURVEY_NO' => $survey_no), 'SEQUENCE', 'ASC');
		
		$data_planting_phase = [];
		if (!empty($planting_phase)) {
			foreach ($planting_phase as $ph_data) {
				$phase 	= strtolower(str_replace(" ", "-", $ph_data['PHASE']));
				$siklus = $ph_data['SIKLUS'];
				if (!array_key_exists($siklus, $data_planting_phase)) {
					$data_planting_phase[$siklus] = [
						'persiapan-lahan'	=> [
							'tanggal'	=> '',
							'fase'		=> '',
							'data'		=> []
						],
						'vegetatif-awal'	=> [
							'tanggal'	=> '',
							'fase'		=> '',
							'data'		=> []
						],
						'genetatif-awal'	=> [
							'tanggal'	=> '',
							'fase'		=> '',
							'data'		=> []
						], 
						'genetatif-akhir' => [
							'tanggal'	=> '',
							'fase'		=> '',
							'data'		=> []
						], 
						'gagal-panen'			=> [
							'tanggal'	=> '',
							'fase'		=> '',
							'data'		=> []
						]
					];
				}

				$data_planting_phase[$siklus][$phase]['tanggal'] 	= $ph_data['SURVEY_DATE'];
				$data_planting_phase[$siklus][$phase]['fase'] 		= $ph_data['PHASE'];
				$data_planting_phase[$siklus][$phase]['data'][] 	= $ph_data['DESCRIPTION'];
			}
		}
		
		$data['SURVEY'] 		= $this->Dbhelper->selectOneRawQuery("
			SELECT 
					a.*, 
					FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
					p.PROVINCE as PROVINCE_NAME,
					r.REGENCIES as REGENCY_NAME,
					d.DISTRICS as DISTRICT_NAME
			FROM SURVEY a, CD_PROVINCE p, CD_REGENCIES r, CD_DISTRICTS d
			WHERE 
					p.ID_PROVINCE = a.PROVINCE
					AND r.ID_REGENCIES = a.REGENCY
					AND d.ID_DISTRICTS = A.DISTRICT
					AND a.SURVEY_NO = '$survey_no'
		");
		$data['SURVEY_FARMERS']		= $this->Dbhelper->selectTabel('*', 'SURVEY_FARMERS', array('SURVEY_NO' => $survey_no), 'SEQUENCE', 'ASC');
		$data['SURVEY_MARKET_PRICES']		=  $this->Dbhelper->selectTabel('*', 'SURVEY_MARKET_PRICES', array('SURVEY_NO' => $survey_no), 'SURVEY_DATE', 'ASC');
		$data['SURVEY_HARVEST_PHASE']		=  $this->Dbhelper->selectTabel('*', 'SURVEY_HARVEST_PHASE', array('SURVEY_NO' => $survey_no), 'SEQUENCE', 'ASC');
		$data['SURVEY_PLANTING_PHASE']		=  $data_planting_phase;
		$data['SURVEY_IMAGES']		= $this->Dbhelper->selectTabel('*', 'SURVEY_IMAGES', array('SURVEY_NO' => $survey_no), 'SEQUENCE', 'ASC');
		return $data;
	}

	private function generateSurveyNo() {
			$generated_no = "SURVEY".date('Ymd');
			$no = 1;
			$today = date('Ymd');
			$this->db->select('SURVEY_NO, CREATED_AT');
			$this->db->from('SURVEY');
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

	public function upload_image($berkas, $survey_no, $sequence) {
		$result = "";
		if ($berkas["name"] != "") {
			$pathDir 	= "./upload/";
			// chmod($pathDir, 777);
			$temp = explode(".", $berkas["name"]);
			$type_file = '.'.end($temp);
			if (trim($berkas['name']) != "") {
				$_FILES["files"] = $berkas;
				$stringRandom = random_char(10);
				$nama = $survey_no."_".$sequence.$type_file;
				$config['upload_path']          = $pathDir;
				$config['allowed_types']        = 'gif|jpg|png|jpeg';

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

