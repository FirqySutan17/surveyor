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
		$this->menu_id 	= 'TR001';
		$this->menu_id2 = 'R001';
		$this->menu_id3 = 'R003';
		$this->menu_id4 = 'R004';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('survey');
		$this->load->library('upload');
	}

	public function index() {
		redirect($this->own_link.'/report');
	}

	public function entry() {

		$user 							= $this->session_data['user'];
		$filter = ['HEAD_CODE'	=> 'AB'];
		if ($user['PLANT'] != '*') {
			$filter['CODE'] = $user['PLANT'];
		}
		// if ($company == 'SUJA') {
		// 	setcookie('connection', 'suja');
		// } else {
		// 	setcookie('connection', 'default');
		// }
		$data['title'] 			= 'SURVEY ENTRY';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter, 'CODE', 'ASC');
		$data['collection_type'] = $this->collection_type();
		$data['user'] = $user;
		// dd($data['user']);
		$this->template->_v('visit/create', $data);
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

			// dd($post);
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
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
					"CREATED_DATE"		=> date('Ymd'),
				];

				if (empty($visiting_report["CREATED_BY"])) {
					$this->session->set_flashdata('error', "User log-in not found");
						return redirect($this->own_link.'/report');
				}
				
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
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
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

	public function report() {

		$sdate = date('Y-m').'-01';
		$edate 	= date('Y-m-d');
		$plant = "*";
		$customer = "*";
		$drafter = "*";

		$user 							= $this->session_data['user'];
		$filter_plant 			= ['HEAD_CODE'	=> 'AB'];
		$filter_user 				= ['EMPLOYEE_ID !=' => '999999'];
		$filter_usersuja 				= ['PLANT =' => '3272'];
		if ($user['PLANT'] != '*') {
			$plant = $user['PLANT'];
			$filter_plant['CODE'] = $plant;
			$filter_user['PLANT'] = $plant;
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$sdate 		= $this->input->post('sdate');
			$edate 		= $this->input->post('edate');
			$plant 		= $this->input->post('plant');
			$customer 	= $this->input->post('customer');
			$drafter 	= $this->input->post('drafter');
		}

		$filter = [
			"sdate"	=> $sdate,
			"edate"	=> $edate,
			"plant"	=> $plant,
			"customer"	=> $customer,
			"drafter"	=> $drafter
		];

		$data['title'] 			= 'Visit Report';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter_plant, 'CODE', 'ASC');
		$data['users'] 			= $this->Dbhelper->selectTabel('EMPLOYEE_ID, FULL_NAME', 'CD_USER', $filter_user, 'EMPLOYEE_ID', 'ASC');
		$data['userssuja'] 			= $this->Dbhelper->selectTabel('EMPLOYEE_ID, FULL_NAME', 'CD_USER', $filter_usersuja, 'EMPLOYEE_ID', 'ASC');
		$data['collection_type'] = $this->collection_type();
		$data['datatable']	= $this->datatable($filter);
		$data['filter']		= $filter;

		// dd($data['userssuja']);

		$this->template->_v('visit/index', $data);
	}

	public function report_customer() {
		$plant = "*";
		$customer = "*";

		$user 							= $this->session_data['user'];
		$filter_plant 			= ['HEAD_CODE'	=> 'AB'];
		$filter_user 				= ['EMPLOYEE_ID !=' => '999999'];
		$filter_usersuja 				= ['PLANT =' => '3272'];
		if ($user['PLANT'] != '*') {
			$plant = $user['PLANT'];
			$filter_plant['CODE'] = $plant;
			$filter_user['PLANT'] = $plant;
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$plant 		= $this->input->post('plant');
			$customer 	= $this->input->post('customer');
		}

		$filter = [
			"plant"	=> $plant,
			"customer"	=> $customer,
		];

		$data['title'] 			= 'Visit Report';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter_plant, 'CODE', 'ASC');
		$data['users'] 			= $this->Dbhelper->selectTabel('EMPLOYEE_ID, FULL_NAME', 'CD_USER', $filter_user, 'EMPLOYEE_ID', 'ASC');
		$data['userssuja'] 			= $this->Dbhelper->selectTabel('EMPLOYEE_ID, FULL_NAME', 'CD_USER', $filter_usersuja, 'EMPLOYEE_ID', 'ASC');
		$data['collection_type'] = $this->collection_type();
		$data['datatable']	= $this->datatable_customer($filter);
		$data['filter']		= $filter;

		// dd($data['userssuja']);

		$this->template->_v('visit/report_customer', $data);
	}

	public function report_overdue() {

		$date 			= date('Y-m-d');
		$plant 			= "*";
		$group_customer = "*";
		$customer 		= "*";
		$type 			= "*";

		$user 							= $this->session_data['user'];
		$filter_plant 			= ['HEAD_CODE'	=> 'CS07'];
		if ($user['PLANT'] != '*') {
			$plant = substr_replace($user['PLANT'],0,-1);
			$filter_plant['CODE'] = $plant;
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$date 			= $this->input->post('date');
			$plant 			= $this->input->post('plant');
			$group_customer = $this->input->post('group_customer');
			$customer 		= $this->input->post('customer');
			$type 			= $this->input->post('type');
		} else {
			$maxDate 	= $this->Dbhelper->selectOneRawQuery("SELECT MMDDYYY FROM FEED_CUST_REMAINDER_WA ORDER BY MMDDYYY DESC");
			$date 		= date('Y-m-d', strtotime($maxDate['MMDDYYY']));
		}

		$filter = [
			"date"				=> $date,
			"plant"				=> $plant,
			"customer"			=> $customer,
			"group_customer"	=> $group_customer,
			"type"				=> $type
		];

		$data['title'] 			= 'Visit Report';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter_plant, 'CODE', 'ASC');
		$data['datatable']	= $this->datatable_overdue($filter);
		$data['filter']		= $filter;

		$this->template->_v('visit/report_overdue', $data);
	}

	public function report_overdue_excel() {

		$date 			= date('Y-m-d');
		$plant 			= "*";
		$group_customer = "*";
		$customer 		= "*";
		$type 			= "*";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$date 			= $this->input->post('date');
			$plant 			= $this->input->post('plant');
			$group_customer = $this->input->post('group_customer');
			$customer 		= $this->input->post('customer');
			$type 			= $this->input->post('type');
		}

		$filter = [
			"date"				=> $date,
			"plant"				=> $plant,
			"customer"			=> $customer,
			"group_customer"	=> $group_customer,
			"type"				=> $type
		];

		$datatable	= $this->datatable_overdue($filter);
		// $data['datatable'] = $datatable;
		// dd($data);
		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

		$styleBorder = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		];

		$styleTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		    ],
		];

		$styleAMT = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		$styleFTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		// dd($datatable);


		// HEADER REPORT
			$sheet->setCellValue('A1', 'BUSINESS AREA');
			$sheet->setCellValue('B1', 'BUSINESS AREA DESC');
			$sheet->setCellValue('C1', 'DATE');
			$sheet->setCellValue('D1', 'GROUP CUSTOMER');
			$sheet->setCellValue('E1', 'GC NAME');
			$sheet->setCellValue('F1', 'CUSTOMER');
			$sheet->setCellValue('G1', 'CUSTOMER NAME');
			$sheet->setCellValue('H1', 'BEGINNING');
			$sheet->setCellValue('I1', 'DEBIT');
			$sheet->setCellValue('J1', 'CREDIT');
			$sheet->setCellValue('K1', 'ENDING');
			$sheet->setCellValue('L1', 'C/D NOTE');
			$sheet->setCellValue('M1', 'CREDIT AMT');
			$sheet->setCellValue('N1', 'NORMAL');
			$sheet->setCellValue('O1', 'OVERDUE');
			$sheet->setCellValue('P1', 'STOP');
			$sheet->setCellValue('Q1', 'SALESMAN');
			$sheet->setCellValue('R1', 'SALESMAN HP');
	        $sheet->getStyle('A1:R1')->applyFromArray($styleTH)->getAlignment()->setWrapText(true);
	        $sheet->getRowDimension('1')->setRowHeight(35, 'px');

	    $rowNumber = 2;

	    $tBeginning = 0; $tDebit = 0; $tCredit = 0; $tEnding = 0; $tCreditDebitNote = 0; $tCreditAmt = 0; $tNormal = 0; $tOverdue = 0; $tStop = 0;
	    // LIST DATA
	    	if (!empty($datatable)) {
	    		foreach ($datatable as $v) {
	    			$tBeginning += $v['BEGINNING']; $tDebit += $v['DEBIT']; $tCredit += $v['CREDIT']; $tEnding += $v['ENDING']; $tCreditDebitNote += $v['CREDIT_DEBIT_NOTE']; $tCreditAmt += $v['CREDIT_AMT']; $tNormal += $v['NORMAL']; $tOverdue += $v['OVERDUE']; $tStop += $v['STOP'];

	    			$sheet->setCellValue('A'.$rowNumber, $v['BUSINESS_AREA']);
					$sheet->setCellValue('B'.$rowNumber, $v['BUSINESS_AREA_DESC']);
					$sheet->setCellValue('C'.$rowNumber, date('Y-m-d', strtotime($v['MMDDYYY'])));
					$sheet->setCellValue('D'.$rowNumber, $v['GROUP_CUSTOMER']);
					$sheet->setCellValue('E'.$rowNumber, $v['GROUP_CUSTOMER_NM']);
					$sheet->setCellValue('F'.$rowNumber, $v['CUSTOMER']);
					$sheet->setCellValue('G'.$rowNumber, $v['CUSTOMER_NM']);
					$sheet->setCellValue('H'.$rowNumber, formatRupiah($v['BEGINNING']));
					$sheet->setCellValue('I'.$rowNumber, formatRupiah($v['DEBIT']));
					$sheet->setCellValue('J'.$rowNumber, formatRupiah($v['CREDIT']));
					$sheet->setCellValue('K'.$rowNumber, formatRupiah($v['ENDING']));
					$sheet->setCellValue('L'.$rowNumber, formatRupiah($v['CREDIT_DEBIT_NOTE']));
					$sheet->setCellValue('M'.$rowNumber, formatRupiah($v['CREDIT_AMT']));
					$sheet->setCellValue('N'.$rowNumber, formatRupiah($v['NORMAL']));
					$sheet->setCellValue('O'.$rowNumber, formatRupiah($v['OVERDUE']));
					$sheet->setCellValue('P'.$rowNumber, formatRupiah($v['STOP']));
					$sheet->setCellValue('Q'.$rowNumber, $v['SALESMAN']);
					$sheet->setCellValue('R'.$rowNumber, $v['MOBILE_NO']);
			        $sheet->getStyle('A'.$rowNumber.':G'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);
			        $sheet->getStyle('H'.$rowNumber.':P'.$rowNumber)->applyFromArray($styleAMT);
			        $sheet->getStyle('Q'.$rowNumber.':R'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);

			        $rowNumber++;
	    		}
	    	}
        // FOOTER REPORT
	        $sheet->setCellValue('A'.$rowNumber, 'GRAND TOTAL');
	        $sheet->mergeCells('A'.$rowNumber.':G'.$rowNumber);
	        $sheet->getStyle('A'.$rowNumber.':R'.$rowNumber)->applyFromArray($styleFTH);
			$sheet->setCellValue('H'.$rowNumber, formatRupiah($tBeginning));
			$sheet->setCellValue('I'.$rowNumber, formatRupiah($tDebit));
			$sheet->setCellValue('J'.$rowNumber, formatRupiah($tCredit));
			$sheet->setCellValue('K'.$rowNumber, formatRupiah($tEnding));
			$sheet->setCellValue('L'.$rowNumber, formatRupiah($tCreditDebitNote));
			$sheet->setCellValue('M'.$rowNumber, formatRupiah($tCreditAmt));
			$sheet->setCellValue('N'.$rowNumber, formatRupiah($tNormal));
			$sheet->setCellValue('O'.$rowNumber, formatRupiah($tOverdue));
			$sheet->setCellValue('P'.$rowNumber, formatRupiah($tStop));
			$sheet->setCellValue('Q'.$rowNumber, ' ');
			$sheet->mergeCells('Q'.$rowNumber.':R'.$rowNumber);
	        $sheet->getStyle('H'.$rowNumber.':P'.$rowNumber)->applyFromArray($styleAMT);
	        $sheet->getRowDimension($rowNumber)->setRowHeight(20, 'px');


		$sheet->getColumnDimension('A')->setWidth(12, 'px');
		$sheet->getColumnDimension('B')->setWidth(20, 'px');
		$sheet->getColumnDimension('C')->setWidth(15, 'px');
		$sheet->getColumnDimension('D')->setWidth(30, 'px');
		$sheet->getColumnDimension('E')->setWidth(35, 'px');
		$sheet->getColumnDimension('F')->setWidth(20, 'px');
		$sheet->getColumnDimension('G')->setWidth(35, 'px');
		$sheet->getColumnDimension('Q')->setWidth(30, 'px');
		$sheet->getColumnDimension('R')->setWidth(25, 'px');
	    // $sheet->getColumnDimension('A')->setAutoSize(true);
	    // $sheet->getColumnDimension('B')->setAutoSize(true);
	    // $sheet->getColumnDimension('C')->setAutoSize(true);
	    // $sheet->getColumnDimension('D')->setAutoSize(true);
	    // $sheet->getColumnDimension('E')->setAutoSize(true);
	    // $sheet->getColumnDimension('F')->setAutoSize(true);
	    // $sheet->getColumnDimension('G')->setAutoSize(true);
	    $sheet->getColumnDimension('H')->setAutoSize(true);
	    $sheet->getColumnDimension('I')->setAutoSize(true);
	    $sheet->getColumnDimension('J')->setAutoSize(true);
	    $sheet->getColumnDimension('K')->setAutoSize(true);
	    $sheet->getColumnDimension('L')->setAutoSize(true);
	    $sheet->getColumnDimension('M')->setAutoSize(true);
	    $sheet->getColumnDimension('N')->setAutoSize(true);
	    $sheet->getColumnDimension('O')->setAutoSize(true);
	    $sheet->getColumnDimension('P')->setAutoSize(true);
	    // $sheet->getColumnDimension('Q')->setAutoSize(true);
	    // $sheet->getColumnDimension('R')->setAutoSize(true);
		$writer = new Xlsx($spreadsheet);
 		$filename = "reportoverdue-".strtotime(date('YmdHis'));
		// $writer->save('write2.xlsx'); 
		ob_end_clean();

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
	}

	public function report_collector() {
		$date 			= date('Y-m-d', strtotime('-1 days'));
		$plant = "*";
		$customer = "*";
		$drafter = "*";

		$user 							= $this->session_data['user'];
		$filter_plant 			= ['HEAD_CODE'	=> 'AB'];
		$filter_user 				= ['EMPLOYEE_ID !=' => '999999'];
		if ($user['PLANT'] != '*') {
			$plant = $user['PLANT'];
			$filter_plant['CODE'] = $plant;
			$filter_user['PLANT'] = $plant;
		}

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$date 		= $this->input->post('date');
			$plant 		= $this->input->post('plant');
			$customer = $this->input->post('customer');
			$drafter 	= $this->input->post('drafter');
		} else {
			$maxDateTarget 	= $this->Dbhelper->selectTabelOne('YYMM', 'TR_MONTHLY_TARGET', [], 'YYMM', 'DESC')['YYMM'];
			$maxDate 	= $this->Dbhelper->selectOneRawQuery("SELECT MMDDYYY FROM FEED_CUST_REMAINDER_WA WHERE MMDDYYY LIKE '$maxDateTarget%' ORDER BY MMDDYYY DESC");
			$date 		= date('Y-m-d', strtotime($maxDate['MMDDYYY']));
		}

		$filter = [
			"date"	=> $date,
			"plant"	=> $plant,
			"customer"	=> $customer,
			"drafter"	=> $drafter
		];

		$data['title'] 			= 'Visit Report';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter_plant, 'CODE', 'ASC');
		$data['users'] 			= $this->Dbhelper->selectTabel('EMPLOYEE_ID, FULL_NAME', 'CD_USER', $filter_user, 'EMPLOYEE_ID', 'ASC');
		$data['datatable']	= $this->datatable_collector($filter);
		$data['filter']		= $filter;

		$this->template->_v('visit/report_collector', $data);
	}

	public function report_collector_excel() {
		$date 			= date('Y-m-d', strtotime('-1 days'));
		$plant = "*";
		$customer = "*";
		$drafter = "*";

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$date 		= $this->input->post('date');
			$plant 		= $this->input->post('plant');
			$customer = $this->input->post('customer');
			$drafter 	= $this->input->post('drafter');
		}

		$filter = [
			"date"	=> $date,
			"plant"	=> $plant,
			"customer"	=> $customer,
			"drafter"	=> $drafter
		];
		$datatable	= $this->datatable_collector($filter);

		$spreadsheet = new Spreadsheet();
    	$sheet = $spreadsheet->getActiveSheet();

		$styleBorder = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		];

		$styleTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		    ],
		];

		$styleAMT = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		$styleFTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		// dd($datatable);


		// HEADER REPORT
		$sheet->setCellValue('A1', 'COMPANY');
		$sheet->mergeCells('A1:A2');
		$sheet->setCellValue('B1', 'COMPANY NAME');
		$sheet->mergeCells('B1:B2');
		$sheet->setCellValue('C1', 'EMPLOYEE ID');
		$sheet->mergeCells('C1:C2');
		$sheet->setCellValue('D1', 'EMPLOYEE NAME');
		$sheet->mergeCells('D1:D2');

		$sheet->setCellValue('E1', 'RUNNING');
		$sheet->mergeCells('E1:G1');
		$sheet->setCellValue('H1', 'STOP');
		$sheet->mergeCells('H1:J1');
		$sheet->setCellValue('K1', 'TOTAL');
		$sheet->mergeCells('K1:M1');

		$sheet->setCellValue('E2', 'TARGET');
		$sheet->setCellValue('F2', 'CASH IN');
		$sheet->setCellValue('G2', '%');
		$sheet->setCellValue('H2', 'TARGET');
		$sheet->setCellValue('I2', 'CASH IN');
		$sheet->setCellValue('J2', '%');
		$sheet->setCellValue('K2', 'TARGET');
		$sheet->setCellValue('L2', 'CASH IN');
		$sheet->setCellValue('M2', '%');
		$sheet->getStyle('A1:M2')->applyFromArray($styleTH)->getAlignment()->setWrapText(true);
		
		$rowNumber = 3;

		$tRunningTarget = 0; $tRunningCashIn = 0; $tStopTarget = 0; $tStopCashIn = 0; $tTotalTarget = 0; $tTotalCashIn = 0;
		// LIST DATA
		if (!empty($datatable)) {
			foreach ($datatable as $v) {
				$defaultRoundedRunning  = 2;
				$defaultRoundedStop     = 2;
				$defaultRoundedTotal    = 2;
				$runningIndex   = ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) ? round(($v['RUNNING_CASH_IN'] / $v['RUNNING_TARGET']) * 100, $defaultRoundedRunning) : 0;
				if ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) {
						while ($runningIndex <= 0 && $defaultRoundedRunning <= 5) {
								$defaultRoundedRunning += 1;
								$runningIndex   = ($v['RUNNING_CASH_IN'] > 0 && $v['RUNNING_TARGET'] > 0) ? round(($v['RUNNING_CASH_IN'] / $v['RUNNING_TARGET']) * 100, $defaultRoundedRunning) : 0;
						}
				}
				$stopIndex      = ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) ? round(($v['STOP_CASH_IN'] / $v['STOP_TARGET']) * 100, $defaultRoundedStop) : 0;
				if ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) {
						while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
								$defaultRoundedStop += 1;
								$stopIndex      = ($v['STOP_CASH_IN'] > 0 && $v['STOP_TARGET'] > 0) ? round(($v['STOP_CASH_IN'] / $v['STOP_TARGET']) * 100, $defaultRoundedStop) : 0;
						}
				}
				
				$cTarget    = $v['RUNNING_TARGET'] + $v['STOP_TARGET'];
				$cCashIn    = $v['RUNNING_CASH_IN'] + $v['STOP_CASH_IN'];
				$totalIndex = ($cCashIn > 0 && $cTarget > 0) ? round(($cCashIn / $cTarget) * 100, $defaultRoundedTotal) : 0;
				if ($cCashIn > 0 && $cTarget > 0) {
						while ($totalIndex <= 0 && $defaultRoundedTotal <= 5) {
								$defaultRoundedTotal += 1;
								$totalIndex      = ($cCashIn > 0 && $cTarget > 0) ? round(($cCashIn / $cTarget) * 100, $defaultRoundedTotal) : 0;
						}
				}

				$tRunningTarget += $v['RUNNING_TARGET'];
				$tRunningCashIn += $v['RUNNING_CASH_IN'];
				$tStopTarget 		+= $v['STOP_TARGET'];
				$tStopCashIn 		+= $v['STOP_CASH_IN'];
				$tTotalTarget 	+= $cTarget;
				$tTotalCashIn 	+= $cCashIn;

				$sheet->setCellValue('A'.$rowNumber, $v['COMPANY_ID']);
				$sheet->setCellValue('B'.$rowNumber, $v['COMPANY_NAME']);
				$sheet->setCellValue('C'.$rowNumber, $v['EMPLOYEE_ID']);
				$sheet->setCellValue('D'.$rowNumber, $v['EMPLOYEE_NAME']);
				$sheet->setCellValue('E'.$rowNumber, $v['RUNNING_TARGET']);
				$sheet->setCellValue('F'.$rowNumber, $v['RUNNING_CASH_IN']);
				$sheet->setCellValue('G'.$rowNumber, $runningIndex);
				$sheet->setCellValue('H'.$rowNumber, $v['STOP_TARGET']);
				$sheet->setCellValue('I'.$rowNumber, $v['STOP_CASH_IN']);
				$sheet->setCellValue('J'.$rowNumber, $stopIndex);
				$sheet->setCellValue('K'.$rowNumber, $cTarget);
				$sheet->setCellValue('L'.$rowNumber, $cCashIn);
				$sheet->setCellValue('M'.$rowNumber, $totalIndex);
				$sheet->getStyle('A'.$rowNumber.':D'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);
				$sheet->getStyle('E'.$rowNumber.':M'.$rowNumber)->applyFromArray($styleAMT);

				$rowNumber++;
			}
		}
		// FOOTER REPORT

		$defaultRoundedRunning  = 2;
		$defaultRoundedStop     = 2;
		$defaultRoundedTotal    = 2;
		$runningIndex   = ($tRunningCashIn > 0 && $tRunningTarget > 0) ? round(($tRunningCashIn / $tRunningTarget) * 100, $defaultRoundedRunning) : 0;
		if ($tRunningCashIn > 0 && $tRunningTarget > 0) {
				while ($runningIndex <= 0 && $defaultRoundedRunning <= 5) {
						$defaultRoundedRunning += 1;
						$runningIndex   = ($tRunningCashIn > 0 && $tRunningTarget > 0) ? round(($tRunningCashIn / $tRunningTarget) * 100, $defaultRoundedRunning) : 0;
				}
		}
		$stopIndex      = ($tStopCashIn > 0 && $tStopTarget > 0) ? round(($tStopCashIn / $tStopTarget) * 100, $defaultRoundedStop) : 0;
		if ($tStopCashIn > 0 && $tStopTarget > 0) {
				while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
						$defaultRoundedStop += 1;
						$stopIndex      = ($tStopCashIn > 0 && $tStopTarget > 0) ? round(($tStopCashIn / $tStopTarget) * 100, $defaultRoundedStop) : 0;
				}
		}

		$totalIndex      = ($tTotalCashIn > 0 && $tTotalTarget > 0) ? round(($tTotalCashIn / $tTotalTarget) * 100, $defaultRoundedStop) : 0;
		if ($tTotalCashIn > 0 && $tTotalTarget > 0) {
				while ($stopIndex <= 0 && $defaultRoundedStop <= 5) {
						$defaultRoundedStop += 1;
						$stopIndex      = ($tTotalCashIn > 0 && $tTotalTarget > 0) ? round(($tTotalCashIn / $tTotalTarget) * 100, $defaultRoundedStop) : 0;
				}
		}
		$sheet->setCellValue('A'.$rowNumber, 'GRAND TOTAL');
		$sheet->mergeCells('A'.$rowNumber.':D'.$rowNumber);
		$sheet->getStyle('A'.$rowNumber.':D'.$rowNumber)->applyFromArray($styleFTH);
		$sheet->setCellValue('E'.$rowNumber, $tRunningTarget);
		$sheet->setCellValue('F'.$rowNumber, $tRunningCashIn);
		$sheet->setCellValue('G'.$rowNumber, $runningIndex.'%');
		$sheet->setCellValue('H'.$rowNumber, $tStopTarget);
		$sheet->setCellValue('I'.$rowNumber, $tStopCashIn);
		$sheet->setCellValue('J'.$rowNumber, $stopIndex.'%');
		$sheet->setCellValue('K'.$rowNumber, $tStopTarget);
		$sheet->setCellValue('L'.$rowNumber, $tStopCashIn);
		$sheet->setCellValue('M'.$rowNumber, $totalIndex.'%');
		$sheet->getStyle('E'.$rowNumber.':M'.$rowNumber)->applyFromArray($styleAMT);
		$sheet->getRowDimension($rowNumber)->setRowHeight(20, 'px');


		$sheet->getColumnDimension('A')->setWidth(12, 'px');
		$sheet->getColumnDimension('B')->setWidth(20, 'px');
		$sheet->getColumnDimension('C')->setWidth(15, 'px');
		$sheet->getColumnDimension('D')->setWidth(30, 'px');
		$sheet->getColumnDimension('E')->setAutoSize(true);
		$sheet->getColumnDimension('F')->setAutoSize(true);
		$sheet->getColumnDimension('G')->setAutoSize(true);
		$sheet->getColumnDimension('H')->setAutoSize(true);
		$sheet->getColumnDimension('I')->setAutoSize(true);
		$sheet->getColumnDimension('J')->setAutoSize(true);
		$sheet->getColumnDimension('K')->setAutoSize(true);
		$sheet->getColumnDimension('L')->setAutoSize(true);
		$sheet->getColumnDimension('M')->setAutoSize(true);
		$writer = new Xlsx($spreadsheet);
 		$filename = "reportcollection-".strtotime(date('YmdHis'));
		ob_end_clean();

		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');
		exit();
	}

	public function detail($visiting_no) {

		$data = $this->get_visitingreport($visiting_no);
		$data['title'] 				= 'Visit Detail';
		$this->template->_v('visit/detail', $data);
	}

	public function detail_customer($slug) {
		$data = $this->get_visitingreportcustomer($slug);
		dd($data);
		$data['title'] 				= 'Visit Detail';
		$this->template->_v('visit/detail', $data);
	}

	public function edit($visiting_no) {
		$user 							= $this->session_data['user'];
		$filter = ['HEAD_CODE'	=> 'AB'];
		if ($user['PLANT'] != '*') {
			$filter['CODE'] = $user['PLANT'];
		}

		$data 	= $this->get_visitingreport($visiting_no);
		$data['title'] 				= 'Visit Update';
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', $filter, 'CODE', 'ASC');
		$data['collection_type']	= $this->collection_type();
		$data['user'] = $user;
		
		$this->template->_v('visit/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$visiting_no = $post['visiting_no'];
			try {
				// dd($post);
				// VR DATA
				$visiting_report = [
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
					"UPDATED_AT"		=> date('Ymd His'),
					"UPDATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID']
				];
				
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
							"DESCRIPTION"			=> str_replace('"', '', $post['VD_description'][$i]),
							"COLLECTION_BD_OPINION"	=> $post['VD_collection_bd_opinion'][$i]
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
				if (!empty($post['VR_image_name'])) {
					foreach ($post['VR_image_name'] as $i => $v) {
						$no = $i + 1;
						$namafile = !empty($post['VR_image_filename'][$i]) ? $post['VR_image_filename'][$i] : '';
						if (!empty($_FILES['VR_image_file']['name'][$i])) {
							if (!empty($namafile)) {
								$delete_image = $this->delete_image($namafile);
							}
							$berkas = [];
							$berkas['name']= $_FILES['VR_image_file']['name'][$i];
					        $berkas['type']= $_FILES['VR_image_file']['type'][$i];
					        $berkas['tmp_name']= $_FILES['VR_image_file']['tmp_name'][$i];
					        $berkas['error']= $_FILES['VR_image_file']['error'][$i];
					        $berkas['size']= $_FILES['VR_image_file']['size'][$i];

					        $namafile = $this->upload_image($berkas, $visiting_no, $no);
						}
						$vr_galleries[] = [
				        	'VISITING_NO'	=> $visiting_no,
				        	'SEQUENCE'		=> $no,
				        	'IMAGE_NAME'	=> $v,
				        	'IMAGE_FILENAME'	=> $namafile
				        ];
					}
				} elseif (empty($post['VR_image_name']) && !empty($post['VR_image_filename'])) {
					foreach ($post['VR_image_filename'] as $i => $v) {
						$delete_image = $this->delete_image($v);
					}
				}
				

				$core_logs = [
					"VISITING_NO"		=> $visiting_no,
					"TYPE"					=> "EDIT",
					"CREATED_AT"		=> date('Ymd His'),
					"CREATED_BY"		=> $this->session_data['user']['EMPLOYEE_ID'],
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
				// dd($save_logs, FALSE);

				// dd($vr_assets, FALSE);
				// dd($vr_collection_plan, FALSE);
				// dd($vr_other_debts, FALSE);
				// dd($vr_details, FALSE);
				// dd($vr_galleries);

				$save = $this->db->update('TR_VR', $visiting_report, array('VISITING_NO' => $visiting_no));
				if (!empty($vr_assets)) {
					$delete = $this->db->delete('TR_VR_ASSETS', array('VISITING_NO' => $visiting_no));
					$save_assets = $this->db->insert_batch('TR_VR_ASSETS', $vr_assets);
				}
				if (!empty($vr_collection_plan)) {
					$delete = $this->db->delete('TR_VR_COLLECTION_PLAN', array('VISITING_NO' => $visiting_no));
					$save_collection_plan = $this->db->insert_batch('TR_VR_COLLECTION_PLAN', $vr_collection_plan);
				}
				if (!empty($vr_other_debts)) {
					$delete = $this->db->delete('TR_VR_OTHER_DEBTS', array('VISITING_NO' => $visiting_no));
					$save_other_debts = $this->db->insert_batch('TR_VR_OTHER_DEBTS', $vr_other_debts);
				}
				if (!empty($vr_details)) {
					$delete = $this->db->delete('TR_VR_DETAILS', array('VISITING_NO' => $visiting_no));
					$save_details = $this->db->insert_batch('TR_VR_DETAILS', $vr_details);
				}
				if (!empty($vr_strategy)) {
					$delete = $this->db->delete('TR_VR_STRATEGY', array('VISITING_NO' => $visiting_no));
					$save_strategy = $this->db->insert_batch('TR_VR_STRATEGY', $vr_strategy);
				}
				if (!empty($vr_galleries)) {
					$delete = $this->db->delete('TR_VR_GALLERIES', array('VISITING_NO' => $visiting_no));
					$save_galleries = $this->db->insert_batch('TR_VR_GALLERIES', $vr_galleries);
				}
				if ($save) {
					$this->session->set_flashdata('success', "Update data success");
					return redirect($this->own_link."/report");
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link."/report");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link."/report");
	}

	public function export($visiting_no) {
		$data = $this->get_visitingreport($visiting_no);
		$vr 				= $data['vr'];
		$vr_assets			= $data['vr_assets'];
		$vr_collection_plan	= $data['vr_collection_plan'];
		$vr_details			= $data['vr_details'];
		$vr_other_debts		= $data['vr_other_debts'];
		$vr_galleries		= $data['vr_galleries'];

		$spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $styleHeaderFile = [
		    'font' => [
		        'bold' => true,
		        'size' => 14,
		        'name'	=> 'CJ ONLYONE NEW 제목 Bold'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		    ],
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_DOUBLE,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		];

		$styleTitleTable = [
			'font' => [
		        'bold' => true,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		];

		$styleHeaderTable = [
		    'font' => [
		        'bold' => true,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		];

		$styleBorder = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		];

		$styleTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		    ],
		];

		// dd($vr);
		$sheet->getColumnDimension('A')->setWidth(5, 'px');
		// ALL START KOLOM B

		// JUDUL LAPORAN
			$sheet->setCellValue('B2', 'Laporan Kunjungan Untuk Stop Customer');
	        $sheet->getStyle('B2:K2')->applyFromArray($styleHeaderFile);
	        $sheet->mergeCells('B2:K2');
	        $sheet->getRowDimension('2')->setRowHeight(30, 'px');

        // TANGGAL LAPORAN
	        $visiting_date = date('Y.m.d', strtotime($vr['VISITING_DATE']));
	        $sheet->setCellValue('I3', 'Tanggal Laporan');
	        $sheet->setCellValue('K3', '('.$visiting_date.')');
	        $sheet->mergeCells('I2:K2');

	    $rowNumber = 5;
        // INFORMASI CUSTOMER
        	// Title
	        	$sheet->setCellValue('B'.$rowNumber, '1. Informasi Customer')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(15, 'px');
	        	$rowNumber += 1;

	        // Header 1
	        	$sheet->setCellValue('B'.$rowNumber, 'Visiting No');
	        	$sheet->mergeCells('B'.$rowNumber.':C'.$rowNumber);
	        	$sheet->setCellValue('D'.$rowNumber, 'Visiting Date');
	        	$sheet->mergeCells('D'.$rowNumber.':E'.$rowNumber);
	        	$sheet->setCellValue('F'.$rowNumber, 'Plant');
	        	$sheet->mergeCells('F'.$rowNumber.':G'.$rowNumber);
	        	$sheet->setCellValue('H'.$rowNumber, 'Customer');
	        	$sheet->mergeCells('H'.$rowNumber.':J'.$rowNumber);
	        	$sheet->setCellValue('K'.$rowNumber, 'Region');
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
	        	$rowNumber += 1;
	        // List Data 1
	        	$sheet->setCellValue('B'.$rowNumber, $vr['VISITING_NO']);
	        	$sheet->mergeCells('B'.$rowNumber.':C'.$rowNumber);
	        	$sheet->setCellValue('D'.$rowNumber, date('Y-m-d', strtotime($vr['VISITING_DATE'])));
	        	$sheet->mergeCells('D'.$rowNumber.':E'.$rowNumber);
	        	$sheet->setCellValue('F'.$rowNumber, $vr['COMPANY_NAME']);
	        	$sheet->mergeCells('F'.$rowNumber.':G'.$rowNumber);
	        	$sheet->setCellValue('H'.$rowNumber, $vr['CUSTOMER_NAME']);
	        	$sheet->mergeCells('H'.$rowNumber.':J'.$rowNumber);
	        	$sheet->setCellValue('K'.$rowNumber, $vr['REGION_NAME']);
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        	$rowNumber += 2;

	        // Header 2
	        	$sheet->setCellValue('B'.$rowNumber, 'Site');
	        	$sheet->setCellValue('C'.$rowNumber, 'Kode Grup');
	        	$sheet->setCellValue('D'.$rowNumber, 'Nama Customer');
	        	$sheet->mergeCells('D'.$rowNumber.':E'.$rowNumber);
	        	$sheet->setCellValue('F'.$rowNumber, 'Jenis');
	        	$sheet->setCellValue('G'.$rowNumber, 'Nama Owner');
	        	$sheet->setCellValue('H'.$rowNumber, 'Nomor Kontak');
	        	$sheet->setCellValue('I'.$rowNumber, 'Alamat');
	        	$sheet->mergeCells('I'.$rowNumber.':K'.$rowNumber);
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
	        	$rowNumber += 1;
	        // List Data 2
	        	$sheet->setCellValue('B'.$rowNumber, $vr['COMPANY_CODE']);
	        	$sheet->setCellValue('C'.$rowNumber, $vr['CUSTOMER']);
	        	$sheet->setCellValue('D'.$rowNumber, $vr['CUSTOMER_NAME']);
	        	$sheet->mergeCells('D'.$rowNumber.':E'.$rowNumber);
	        	$sheet->setCellValue('F'.$rowNumber, $vr['SALES_OFFICE_NAME']);
	        	$sheet->setCellValue('G'.$rowNumber, $vr['CHIEF']);
	        	$sheet->setCellValue('H'.$rowNumber, $vr['TELEPHONE_2']);
	        	$sheet->setCellValue('I'.$rowNumber, $vr['STREET']);
	        	$sheet->mergeCells('I'.$rowNumber.':K'.$rowNumber);
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        	$rowNumber += 2;

	    // INFORMASI TRANSAKSI
        	// Title
	        	$sheet->setCellValue('B'.$rowNumber, '2. Informasi Transaksi')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(15, 'px');
	        	$rowNumber += 1;
	        // Header
	        	$sheet->setCellValue('B'.$rowNumber, 'Tanggal Open (Registrasi)');
	        	$sheet->setCellValue('C'.$rowNumber, 'Tanggal Stop');
	        	$sheet->setCellValue('D'.$rowNumber, 'Tipe Stop');
	        	$sheet->setCellValue('E'.$rowNumber, 'Stop AR');
	        	$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
	        	$sheet->setCellValue('G'.$rowNumber, 'AR Saat Ini');
	        	$sheet->mergeCells('G'.$rowNumber.':H'.$rowNumber);
	        	$sheet->setCellValue('I'.$rowNumber, 'Collateral Amount');
	        	$sheet->setCellValue('J'.$rowNumber, 'Tipe Collection');
	        	$sheet->mergeCells('J'.$rowNumber.':K'.$rowNumber);
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
	        	$rowNumber += 1;
	        // List Data
	        	$sheet->setCellValue('B'.$rowNumber, date('Y-m-d', strtotime($vr['TRANSDATE_OPEN'])));
	        	$sheet->setCellValue('C'.$rowNumber, date('Y-m-d', strtotime($vr['TRANSDATE_CLOSE'])));
	        	$sheet->setCellValue('D'.$rowNumber, $vr['CLOSE_TYPE']);
	        	$sheet->setCellValue('E'.$rowNumber, formatRupiah($vr['AR_STOP']));
	        	$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
	        	$sheet->setCellValue('G'.$rowNumber, formatRupiah($vr['AR_CURRENT']));
	        	$sheet->mergeCells('G'.$rowNumber.':H'.$rowNumber);
	        	$sheet->setCellValue('I'.$rowNumber, formatRupiah($vr['COLLATERAL_AMT']));
	        	$sheet->setCellValue('J'.$rowNumber, str_replace("_", " ", $vr['COLLECTION_TYPE']));
	        	$sheet->mergeCells('J'.$rowNumber.':K'.$rowNumber);
	        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        	$rowNumber = $rowNumber + 2;

	        // Penanggung Jawab
	        	// Title
		        	$sheet->setCellValue('B'.$rowNumber, 'Penanggung Jawab ketika Open (Registrasi) ');
		        	$sheet->getStyle('B'.$rowNumber.':F'.$rowNumber)->applyFromArray($styleTH);
		        	$sheet->mergeCells('B'.$rowNumber.':F'.$rowNumber);
		        	$sheet->setCellValue('G'.$rowNumber, 'Penanggung Jawab ketika Stop ');
		        	$sheet->getStyle('G'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
		        	$sheet->mergeCells('G'.$rowNumber.':K'.$rowNumber);
		        	$rowNumber += 1;
	        	// Header
		        	$sheet->setCellValue('B'.$rowNumber, 'TS');
		        	$sheet->setCellValue('C'.$rowNumber, 'ASM');
		        	$sheet->setCellValue('D'.$rowNumber, 'GSM');
		        	$sheet->setCellValue('E'.$rowNumber, 'CCT');
		        	$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
		        	$sheet->setCellValue('G'.$rowNumber, 'TS');
		        	$sheet->setCellValue('H'.$rowNumber, 'ASM');
		        	$sheet->setCellValue('I'.$rowNumber, 'GSM');
		        	$sheet->setCellValue('J'.$rowNumber, 'CCT');
		        	$sheet->mergeCells('J'.$rowNumber.':K'.$rowNumber);
		        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
		        	$rowNumber += 1;
		        // List Data
		        	$sheet->setCellValue('B'.$rowNumber, $vr['PIC_OPEN_TS_NAME']);
		        	$sheet->setCellValue('C'.$rowNumber, $vr['PIC_OPEN_ASM_NAME']);
		        	$sheet->setCellValue('D'.$rowNumber, $vr['PIC_OPEN_GSM_NAME']);
		        	$sheet->setCellValue('E'.$rowNumber, $vr['PIC_OPEN_CCT_NAME']);
		        	$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
		        	$sheet->setCellValue('G'.$rowNumber, $vr['PIC_CLOSE_TS_NAME']);
		        	$sheet->setCellValue('H'.$rowNumber, $vr['PIC_CLOSE_ASM_NAME']);
		        	$sheet->setCellValue('I'.$rowNumber, $vr['PIC_CLOSE_GSM_NAME']);
		        	$sheet->setCellValue('J'.$rowNumber, $vr['PIC_CLOSE_CCT_NAME']);
		        	$sheet->mergeCells('J'.$rowNumber.':K'.$rowNumber);
		        	$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
		        	$rowNumber += 2;
		       	// Alasan Stop
		        	$sheet->setCellValue('B'.$rowNumber, 'Alasan Stop (Ditulis Oleh TS)')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
		        	$sheet->mergeCells('B'.$rowNumber.':F'.$rowNumber);
		        	$sheet->setCellValue('G'.$rowNumber, 'Status Biaya Belum Diselesaikan')->getStyle('G'.$rowNumber)->applyFromArray($styleHeaderTable);
		        	$sheet->mergeCells('G'.$rowNumber.':K'.$rowNumber);
		        	$rowNumber += 1;

		        	$rowNumber_start 	= $rowNumber;
		        	$rowNumber_end 		= $rowNumber + 5;
		        	$sheet->setCellValue('B'.$rowNumber_start, $vr['STOPAGE_REASON']);
		        	$sheet->mergeCells('B'.$rowNumber_start.':F'.$rowNumber_end);
		        	$sheet->getStyle('B'.$rowNumber_start.':F'.$rowNumber_end)->applyFromArray($styleBorder);
		        	$sheet->setCellValue('G'.$rowNumber_start, $vr['PENDING_FEE_STATUS']);
		        	$sheet->mergeCells('G'.$rowNumber_start.':K'.$rowNumber_end);
		        	$sheet->getStyle('G'.$rowNumber_start.':K'.$rowNumber_end)->applyFromArray($styleBorder);
		        	$rowNumber = $rowNumber_end + 2;

	        // Informasi Aset
	        	// Title
	        		$sheet->setCellValue('B'.$rowNumber, 'Informasi Aset Jaminan yang sudah didapat dan belum didapat')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        		$sheet->mergeCells('B'.$rowNumber.':K'.$rowNumber);
	        		$rowNumber += 1;
	        	// Header 1
	        		$rowNumber_end = $rowNumber + 1;
	        		$sheet->setCellValue('B'.$rowNumber, 'Klasifikasi');
		        	$sheet->mergeCells('B'.$rowNumber.':C'.$rowNumber_end);
		        	$sheet->getStyle('B'.$rowNumber.':C'.$rowNumber_end)->applyFromArray($styleTH)->getAlignment()->setWrapText(true);

	        		$sheet->setCellValue('D'.$rowNumber, 'Tipe & Size Area');
		        	$sheet->mergeCells('D'.$rowNumber.':E'.$rowNumber_end);
		        	$sheet->getStyle('D'.$rowNumber.':E'.$rowNumber_end)->applyFromArray($styleTH);

	        		$sheet->setCellValue('F'.$rowNumber, 'Nilai Jaminan');
		        	$sheet->mergeCells('F'.$rowNumber.':F'.$rowNumber_end);
		        	$sheet->getStyle('F'.$rowNumber.':F'.$rowNumber_end)->applyFromArray($styleTH);

	        		$sheet->setCellValue('G'.$rowNumber, 'Alamat Aset');
		        	$sheet->mergeCells('G'.$rowNumber.':G'.$rowNumber_end);
		        	$sheet->getStyle('G'.$rowNumber.':G'.$rowNumber_end)->applyFromArray($styleTH);

	        		$sheet->setCellValue('H'.$rowNumber, 'Dokumen Penyimpanan');
		        	$sheet->mergeCells('H'.$rowNumber.':K'.$rowNumber);
		        	$sheet->getStyle('H'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);

		        // Header 2
		        	$rowNumber = $rowNumber_end;

		        	$sheet->setCellValue('H'.$rowNumber, 'Sertifikat');
		        	$sheet->setCellValue('I'.$rowNumber, 'SPPJ');
		        	$sheet->setCellValue('J'.$rowNumber, 'HT');
		        	$sheet->setCellValue('K'.$rowNumber, 'Others');
		        	$sheet->getStyle('H'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
		        	$rowNumber += 1;

		        // List Data
		        	$jaminan_perusahaan = [
		        		"ASET BERGERAK" => [],
		        		"ASET TIDAK BERGERAK" => [],
		        		"CEK / GIRO"	=> []
		        	];
		        	$other_asset 	= [];
		        	if (!empty($vr_assets)) {
		        		foreach ($vr_assets as $v) {
		        			if ($v['CLASS1'] == 'CG') {
		        				if (array_key_exists($v['CLASS2'], $jaminan_perusahaan)) {
		        					$jaminan_perusahaan[$v['CLASS2']][] = $v;
		        				}
		        			} elseif ($v['CLASS1'] == 'OTH') {
		        				$other_asset[] = $v;
		        			}
		        		}
		        	}
		        	$rowNumber_start_assets = $rowNumber;
		        	$sheet->setCellValue('B'.$rowNumber, 'Jaminan Perusahaan');
	        		foreach ($jaminan_perusahaan as $jp_name => $jp) {
	        			$rowNumber_start = $rowNumber;
	        			$sheet->setCellValue('C'.$rowNumber_start, $jp_name);
	        			if (!empty($jp)) {
	        				foreach ($jp as $v) {
	        					$sheet->setCellValue('D'.$rowNumber, $v['ASSET_TYPE']);
	        					$sheet->setCellValue('E'.$rowNumber, $v['ASSET_SIZE']);
	        					$sheet->setCellValue('F'.$rowNumber, $v['ASSET_VALUE']);
	        					$sheet->setCellValue('G'.$rowNumber, $v['ASSET_ADDRESS']);
	        					$sheet->setCellValue('H'.$rowNumber, $v['DOCS_CERTIFICATE']);
	        					$sheet->setCellValue('I'.$rowNumber, $v['DOCS_SPPJ']);
	        					$sheet->setCellValue('J'.$rowNumber, $v['DOCS_HT']);
	        					$sheet->setCellValue('K'.$rowNumber, $v['DOCS_OTHERS']);
	        					$sheet->getStyle('D'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        					$rowNumber += 1;
	        				}
	        				$rowNumber -= 1;
	        			} else {
	        				$sheet->setCellValue('D'.$rowNumber, '');
        					$sheet->setCellValue('E'.$rowNumber, '');
        					$sheet->setCellValue('F'.$rowNumber, '');
        					$sheet->setCellValue('G'.$rowNumber, '');
        					$sheet->setCellValue('H'.$rowNumber, '');
        					$sheet->setCellValue('I'.$rowNumber, '');
        					$sheet->setCellValue('J'.$rowNumber, '');
        					$sheet->setCellValue('K'.$rowNumber, '');
        					$sheet->getStyle('D'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        			}
	        			$sheet->mergeCells('C'.$rowNumber_start.':C'.$rowNumber);
	        			$sheet->getStyle('C'.$rowNumber_start.':C'.$rowNumber)->applyFromArray($styleBorder);
	        			$rowNumber += 1;
	        		}
		        	$rowNumber_end_assets = $rowNumber - 1;
		        	$sheet->mergeCells('B'.$rowNumber_start_assets.':B'.$rowNumber_end_assets);
		        	$sheet->getStyle('B'.$rowNumber_start_assets.':B'.$rowNumber_end_assets)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);

		        	$rowNumber_start_assets = $rowNumber;
		        	$sheet->setCellValue('B'.$rowNumber_start_assets, 'Aset Lainnya');
		        	if (!empty($other_asset)) {
		        		foreach ($other_asset as $v) {
		        			$sheet->setCellValue('C'.$rowNumber, $v['CLASS2']);
		        			$sheet->setCellValue('D'.$rowNumber, $v['ASSET_TYPE']);
        					$sheet->setCellValue('E'.$rowNumber, $v['ASSET_SIZE']);
        					$sheet->setCellValue('F'.$rowNumber, $v['ASSET_VALUE']);
        					$sheet->setCellValue('G'.$rowNumber, $v['ASSET_ADDRESS']);
        					$sheet->setCellValue('H'.$rowNumber, $v['DOCS_CERTIFICATE']);
        					$sheet->setCellValue('I'.$rowNumber, $v['DOCS_SPPJ']);
        					$sheet->setCellValue('J'.$rowNumber, $v['DOCS_HT']);
        					$sheet->setCellValue('K'.$rowNumber, $v['DOCS_OTHERS']);
				        	$sheet->getStyle('C'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
        					$rowNumber += 1;
		        		}
		        		$rowNumber -= 1;
		        	}  else {
        				$sheet->setCellValue('C'.$rowNumber, '');
        				$sheet->setCellValue('D'.$rowNumber, '');
    					$sheet->setCellValue('E'.$rowNumber, '');
    					$sheet->setCellValue('F'.$rowNumber, '');
    					$sheet->setCellValue('G'.$rowNumber, '');
    					$sheet->setCellValue('H'.$rowNumber, '');
    					$sheet->setCellValue('I'.$rowNumber, '');
    					$sheet->setCellValue('J'.$rowNumber, '');
    					$sheet->setCellValue('K'.$rowNumber, '');
				        $sheet->getStyle('C'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
        			}
        			$sheet->mergeCells('B'.$rowNumber_start_assets.':B'.$rowNumber);
        			$sheet->getStyle('B'.$rowNumber_start_assets.':B'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);
        			$rowNumber = $rowNumber + 2;

	    // INFORMASI COLLECTION
	        // Title
	        	$sheet->setCellValue('B'.$rowNumber, '3. Rencana Collection bulanan & Hutang Customer yang lain')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(15, 'px');
	        	$rowNumber += 1;
	        // Header 1
	        	$sheet->setCellValue('B'.$rowNumber, 'Rencana collection bulanan per SPPH (Harus lampir SPPH)')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->mergeCells('B'.$rowNumber.':F'.$rowNumber);
	        	$sheet->setCellValue('H'.$rowNumber, 'Hutang Customer yang lain')->getStyle('H'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->mergeCells('H'.$rowNumber.':K'.$rowNumber);
	        	$rowNumber += 1;
	        // Header 2
	        	$sheet->setCellValue('B'.$rowNumber, 'Tahun Bulan');
	        	$sheet->setCellValue('C'.$rowNumber, 'Jumlah Collection');
	        	$sheet->setCellValue('D'.$rowNumber, 'AR Saldo');
	        	$sheet->setCellValue('E'.$rowNumber, 'Note');
	        	$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
			    $sheet->getStyle('B'.$rowNumber.':F'.$rowNumber)->applyFromArray($styleTH);

			    $sheet->setCellValue('H'.$rowNumber, 'Kreditor');
	        	$sheet->setCellValue('I'.$rowNumber, 'Hutang saat ini');
	        	$sheet->setCellValue('J'.$rowNumber, 'Note');
	        	$sheet->mergeCells('J'.$rowNumber.':K'.$rowNumber);
			    $sheet->getStyle('H'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
			    $rowNumber += 1;
			// List Data
			    $rowNumber_start_coll = $rowNumber;
			    if (!empty($vr_collection_plan)) {
			    	$currRow = $rowNumber_start_coll;
			    	foreach ($vr_collection_plan as $v) {
			    		$sheet->setCellValue('B'.$currRow, date('Y-m', strtotime($v['COLLECTION_DATE'])));
			        	$sheet->setCellValue('C'.$currRow, formatRupiah($v['AMOUNT']));
			        	$sheet->setCellValue('D'.$currRow, formatRupiah($v['AR_BALANCE']));
			        	$sheet->setCellValue('E'.$currRow, $v['NOTES']);
	        			$sheet->mergeCells('E'.$rowNumber.':F'.$rowNumber);
					    $sheet->getStyle('B'.$currRow.':F'.$currRow)->applyFromArray($styleBorder);
					    $currRow += 1;
			    	}
			    } else {
			    	$sheet->setCellValue('B'.$rowNumber_start_coll, '');
		        	$sheet->setCellValue('C'.$rowNumber_start_coll, '');
		        	$sheet->setCellValue('D'.$rowNumber_start_coll, '');
		        	$sheet->setCellValue('E'.$rowNumber_start_coll, '');
	        		$sheet->mergeCells('E'.$rowNumber_start_coll.':F'.$rowNumber_start_coll);
				    $sheet->getStyle('B'.$rowNumber_start_coll.':F'.$rowNumber_start_coll)->applyFromArray($styleBorder);
				    $vr_collection_plan[] = [];
			    }

			    if (!empty($vr_other_debts)) {
			    	$currRow = $rowNumber_start_coll;
			    	foreach ($vr_other_debts as $v) {
			        	$sheet->setCellValue('H'.$currRow, $v['CREDITOR']);
			        	$sheet->setCellValue('I'.$currRow, formatRupiah($v['CURRENT_DEBT']));
			        	$sheet->setCellValue('J'.$currRow, $v['NOTES']);
	        			$sheet->mergeCells('J'.$currRow.':K'.$currRow);
					    $sheet->getStyle('H'.$currRow.':K'.$currRow)->applyFromArray($styleBorder);
					    $currRow += 1;
			    	}
			    } else {
			    	$sheet->setCellValue('H'.$rowNumber_start_coll, '');
		        	$sheet->setCellValue('I'.$rowNumber_start_coll, '');
		        	$sheet->setCellValue('J'.$rowNumber_start_coll, '');
	        		$sheet->mergeCells('J'.$rowNumber_start_coll.':K'.$rowNumber_start_coll);
				    $sheet->getStyle('H'.$rowNumber_start_coll.':K'.$rowNumber_start_coll)->applyFromArray($styleBorder);
				    $vr_other_debts[] = [];
			    }

			    $rowNumber = count($vr_collection_plan) >= count($vr_other_debts) ? $rowNumber + count($vr_collection_plan) : $rowNumber + count($vr_other_debts);
			    $rowNumber += 1;

		// INFORMASI KUNJUNGAN
			// Title
	        	$sheet->setCellValue('B'.$rowNumber, '4. Detail Kunjungan')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(15, 'px');
	        	$rowNumber += 1;
	        // Header 1
	        	$rowHeaderMerge = $rowNumber + 1;
	        	$sheet->setCellValue('B'.$rowNumber, 'Tanggal');
	        	$sheet->mergeCells('B'.$rowNumber.':B'.$rowHeaderMerge);
	        	$sheet->setCellValue('C'.$rowNumber, 'Peserta');
	        	$sheet->mergeCells('C'.$rowNumber.':D'.$rowNumber);
	        	$sheet->setCellValue('E'.$rowNumber, 'Lokasi Pertemuan');
	        	$sheet->mergeCells('E'.$rowNumber.':E'.$rowHeaderMerge);
	        	$sheet->setCellValue('F'.$rowNumber, 'Detail isi pertemuan utama');
	        	$sheet->mergeCells('F'.$rowNumber.':H'.$rowHeaderMerge);
	        	$sheet->setCellValue('I'.$rowNumber, 'Rencana masa depan dan opini tentang collection BD');
	        	$sheet->mergeCells('I'.$rowNumber.':K'.$rowHeaderMerge);

			    $sheet->getStyle('B'.$rowNumber.':K'.$rowHeaderMerge)->applyFromArray($styleTH);
			    $sheet->getStyle('I'.$rowNumber.':K'.$rowHeaderMerge)->getAlignment()->setWrapText(true);
	        	$rowNumber += 1;
	        // Header 2
	        	$sheet->setCellValue('C'.$rowNumber, 'CJ');
	        	$sheet->setCellValue('D'.$rowNumber, 'Customer');
			    $sheet->getStyle('C'.$rowNumber.':D'.$rowNumber)->applyFromArray($styleTH);
	        	$rowNumber += 1;
	        // List Data
	        	if (!empty($vr_details)) {
	        		foreach ($vr_details as $v) {
			    		$sheet->setCellValue('B'.$rowNumber, date('Y-m-d', strtotime($v['VISIT_DATE'])));
			    		$sheet->setCellValue('C'.$rowNumber, $v['PARTICIPANT_CJ']);
			    		$sheet->setCellValue('D'.$rowNumber, $v['PARTICIPANT_CUST']);
			    		$sheet->setCellValue('E'.$rowNumber, $v['LOCATION']);
			    		$sheet->setCellValue('F'.$rowNumber, $v['DESCRIPTION'])->getStyle('F'.$rowNumber)->getAlignment()->setWrapText(true);
	        			$sheet->mergeCells('F'.$rowNumber.':H'.$rowNumber);
			    		$sheet->setCellValue('I'.$rowNumber, $v['COLLECTION_BD_OPINION']);
	        			$sheet->mergeCells('I'.$rowNumber.':K'.$rowNumber);
			    		$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleBorder);
	        			$sheet->getRowDimension($rowNumber)->setRowHeight(25, 'px');
	        			$rowNumber += 1;
	        		}
	        	}
			    $rowNumber += 1;

		// INFORMASI STRATEGI
			// Title
	        	$sheet->setCellValue('B'.$rowNumber, '5. Strategi')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(15, 'px');
	        	$rowNumber += 1;
	        // Header 1
	        	$sheet->setCellValue('B'.$rowNumber, 'Klasifikasi');
	        	$sheet->mergeCells('B'.$rowNumber.':C'.$rowNumber);
	        	$sheet->setCellValue('D'.$rowNumber, 'Strategi Collection Stop Saldo & Rencana Kerjasama');
	        	$sheet->mergeCells('D'.$rowNumber.':K'.$rowNumber);
			    $sheet->getStyle('B'.$rowNumber.':K'.$rowNumber)->applyFromArray($styleTH);
	        	$sheet->getRowDimension($rowNumber)->setRowHeight(20, 'px');
	        	$rowNumber += 1;
	        // List Data
	        	$sheet->setCellValue('B'.$rowNumber, 'Divisi Sales');
	        	$rowNumber += 4;
	        	$sheet->mergeCells('B'.($rowNumber - 4).':C'.$rowNumber);
			    $sheet->getStyle('B'.($rowNumber - 4).':C'.$rowNumber)->applyFromArray($styleBorder);
			    $rowNumber -=4;

	        	$sheet->setCellValue('D'.$rowNumber, $vr['STRATEGY_SALES']);
	        	$rowNumber += 4;
	        	$sheet->mergeCells('D'.($rowNumber - 4).':K'.$rowNumber);
			    $sheet->getStyle('D'.($rowNumber - 4).':K'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);
	        	// $rowNumber -=4;

	        	$rowNumber += 1;

	        	$sheet->setCellValue('B'.$rowNumber, 'Divisi CCT');
	        	$rowNumber += 4;
	        	$sheet->mergeCells('B'.($rowNumber - 4).':C'.$rowNumber);
			    $sheet->getStyle('B'.($rowNumber - 4).':C'.$rowNumber)->applyFromArray($styleBorder);
			    $rowNumber -=4;

	        	$sheet->setCellValue('D'.$rowNumber, $vr['STRATEGY_CCT']);
	        	$rowNumber += 4;
	        	$sheet->mergeCells('D'.($rowNumber - 4).':K'.$rowNumber);
			    $sheet->getStyle('D'.($rowNumber - 5).':K'.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);

	        	$rowNumber += 3;


	    // INFORMASI GALERI
	        // Title
	        	$sheet->setCellValue('B'.$rowNumber, '6. Photo Kunjungan')->getStyle('B'.$rowNumber)->applyFromArray($styleHeaderTable);
	        	$rowNumber += 1;
	       	// Data
	        	if (!empty($vr_galleries)) {
	        		$path= './upload/';
	        		$rowNumber_start = $rowNumber;
	        		foreach ($vr_galleries as $v) {
	        			$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
					    $drawing->setName($v['IMAGE_NAME']);
					    $drawing->setDescription($v['IMAGE_NAME']);
					    $drawing->setPath($path.$v['IMAGE_FILENAME']); /* put your path and image here */
					    $drawing->setCoordinates('D'.($rowNumber + 2));
					    $drawing->setHeight(200);
					    $drawing->setWorksheet($sheet);

					    $rowNumber += 10;
	        		}
	        		$rowNumber += 5;
	        		$sheet->mergeCells('B'.$rowNumber_start.':K'.$rowNumber);
	        		$sheet->getStyle('B'.$rowNumber_start.':K'.$rowNumber)->applyFromArray($styleBorder);
	        	} else {
	        		$rowNumber_go = $rowNumber + 5;
	        		$sheet->setCellValue('B'.$rowNumber, '');
	        		$sheet->mergeCells('B'.$rowNumber.':K'.$rowNumber_go);
	        		$sheet->getStyle('B'.$rowNumber.':K'.$rowNumber_go)->applyFromArray($styleBorder);
	        	}


		$sheet->getColumnDimension('B')->setWidth(25, 'px');
		$sheet->getColumnDimension('C')->setWidth(25, 'px');
		$sheet->getColumnDimension('E')->setWidth(25, 'px');
		$sheet->getColumnDimension('E')->setWidth(25, 'px');
		$sheet->getColumnDimension('F')->setWidth(25, 'px');
		$sheet->getColumnDimension('G')->setWidth(35, 'px');
	    // $sheet->getColumnDimension('B')->setAutoSize(true);
	    // $sheet->getColumnDimension('C')->setAutoSize(true);
	    // $sheet->getColumnDimension('D')->setAutoSize(true);
	    // $sheet->getColumnDimension('E')->setAutoSize(true);
	    // $sheet->getColumnDimension('F')->setAutoSize(true);
	    // $sheet->getColumnDimension('G')->setAutoSize(true);
	    // $sheet->getColumnDimension('H')->setAutoSize(true);
	    // $sheet->getColumnDimension('I')->setAutoSize(true);
	    // $sheet->getColumnDimension('J')->setAutoSize(true);
	    // $sheet->getColumnDimension('K')->setAutoSize(true);
		$writer = new Xlsx($spreadsheet);
 		$filename = $vr['VISITING_NO']."-".strtotime(date('YmdHis'));
		// $writer->save('write2.xlsx'); 
		ob_end_clean();

        header('Content-Type: application/vnd.ms-excel'); // generate excel file
        header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
        header('Cache-Control: max-age=0');
        
        $writer->save('php://output');
        exit();
	}

	private function datatable($filter) {
		$sdate = date('Ymd', strtotime($filter['sdate']));
		$edate = date('Ymd', strtotime($filter['edate']));
		// $date = date('Ymd', strtotime($filter['date']));

		$exp_customer = explode("|", $filter['customer']);
		$query = "
			select 
				VISITING_NO,
			    VISITING_DATE,
			    b.CUSTOMER,
			    b.CUSTOMER_NAME,
			    FN_CODE_NAME('CS02' ,REGION)   REGION_NAME,
			    FN_CODE_NAME('AB' ,SALES_ORG)   COMPANY_NAME,
			    FN_CODE_NAME('AC01' ,NVL(SALES_OFFICE,'3210'))   SALES_OFFICE_NAME,
				FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
				FN_USER_NAME(UPDATED_BY) UPDATED_BY_NAME
			from TR_VR a,
			      CD_CUSTOMER b
			where 
				a.CUSTOMER = b.CUSTOMER
				and a.PLANT = b.SALES_ORG
				and VISITING_DATE BETWEEN '$sdate' AND '$edate'
		";
		if ($filter['plant'] != '*') {
			$query .= " and b.SALES_ORG = '".$filter['plant']."'";
		}
		if (!empty($exp_customer[0]) && $exp_customer[0] != '*') {
			$query .= " and b.CUSTOMER = '".$exp_customer[0]."'";
		}
		if ($filter['drafter'] != '*') {
			$query .= " and a.CREATED_BY = '".$filter['drafter']."'";
		}
		$query .= " order by VISITING_DATE DESC";
        $data = $this->db->query($query)->result_array();
		// dd($query);
		return $data;
	}

	private function datatable_customer($filter) {

		$exp_customer = explode("|", $filter['customer']);
		$query = "
			select 
					a.CUSTOMER,
					b.CUSTOMER_NAME,
					b.SALES_ORG
			from TR_VR a,
						CD_CUSTOMER b
			where 
					a.CUSTOMER = b.CUSTOMER
					and a.PLANT = b.SALES_ORG
		";
		if ($filter['plant'] != '*') {
			$query .= " and b.SALES_ORG = '".$filter['plant']."'";
		}
		if (!empty($exp_customer[0]) && $exp_customer[0] != '*') {
			$query .= " and b.CUSTOMER = '".$exp_customer[0]."'";
		}
		$query .= "GROUP BY a.CUSTOMER, b.CUSTOMER_NAME, b.SALES_ORG";

		$main_query = "
			SELECT 
				c.CUSTOMER,
				c.CUSTOMER_NAME,
				c.SALES_ORG,
				FN_CODE_NAME('AB' ,c.SALES_ORG)   COMPANY_NAME
			FROM ($query) c
			ORDER BY c.SALES_ORG ASC, c.CUSTOMER_NAME ASC
		";
        $data = $this->db->query($main_query)->result_array();
		return $data;
	}

	private function datatable_collector($filter) {
		$date = date('Ymd', strtotime($filter['date']));
		$datemonth = date('Ym', strtotime($date));
		// $query = "
		// 	SELECT SUBSTR(BUSINESS_AREA,1,3)||'2' AS COMPANY_ID,
		// 		FN_CODE_NAME('AB' ,SUBSTR(BUSINESS_AREA,1,3)||'2')  AS COMPANY_NAME,
		// 		FN_CUSTOMER('01',SUBSTR(BUSINESS_AREA,1,3)||'2',CUSTOMER) EMPLOYEE_ID, 
		// 		FN_HR_EMPLOYEE('02', FN_CUSTOMER('01',SUBSTR(BUSINESS_AREA,1,3)||'2',CUSTOMER)) EMPLOYEE_NAME,
		// 		SUM(CASE WHEN A.ENDING = A.STOP THEN 0 ELSE A.ENDING END)  AS RUNNING_TARGET,
		// 		SUM(CASE WHEN A.ENDING = A.STOP THEN 0 ELSE A.CREDIT END)  AS RUNNING_CASH_IN,
		// 		SUM(CASE WHEN A.ENDING = A.STOP THEN ENDING ELSE 0 END)      AS STOP_TARGET,
		// 		SUM(CASE WHEN A.ENDING = A.STOP THEN A.CREDIT ELSE 0 END)  AS STOP_CASH_IN 
		// 	FROM FEED_CUST_REMAINDER_WA A
		// 	WHERE MMDDYYY = '$date'
			
		// ";

		$where = "";
		if ($filter['plant'] != '*') {
			$filter['plant'] = substr_replace($filter['plant'], 0, -1);
			$where .= " and B.BUSINESS_AREA = '".$filter['plant']."'";
		}
		$query = "
			SELECT
				FN_CODE_NAME('AB' ,D.BUSINESS_AREA) AS COMPANY_NAME,
				D.BUSINESS_AREA AS COMPANY_ID,
				D.EMPNO AS EMPLOYEE_ID,
				FN_HR_EMPLOYEE('02', D.EMPNO) AS EMPLOYEE_NAME,
				D.RUNNING_TARGET,
				D.RUNNING_CASH_IN,
				CASE WHEN D.RUNNING_CASH_IN > 0 AND D.RUNNING_TARGET > 0 THEN ((D.RUNNING_CASH_IN / D.RUNNING_TARGET) * 100) ELSE 0 END as RUNNING_PERCENTAGE,
				D.STOP_TARGET,
				D.STOP_CASH_IN,
				CASE WHEN D.STOP_CASH_IN > 0 AND D.STOP_TARGET > 0 THEN ((D.STOP_CASH_IN / D.STOP_TARGET) * 100) ELSE 0 END as STOP_PERCENTAGE
			FROM (
					SELECT
							SUBSTR(C.BUSINESS_AREA,1,3)||'2' as BUSINESS_AREA,
							C.EMPNO,
							SUM(C.RUNNING_TARGET) AS RUNNING_TARGET,
							SUM(C.STOP_TARGET) AS STOP_TARGET,
							SUM(CASE WHEN STATUS = 'R' THEN CREDIT ELSE 0 END) AS RUNNING_CASH_IN,
							SUM(CASE WHEN STATUS = 'S' THEN CREDIT ELSE 0 END) AS STOP_CASH_IN
					FROM (
							SELECT 
									B.BUSINESS_AREA,
									B.CUSTOMER,
									B.EMPNO,
									B.RUNNING_TARGET,
									B.STOP_TARGET, 
									(SELECT A.CREDIT FROM FEED_CUST_REMAINDER_WA A WHERE A.BUSINESS_AREA = B.BUSINESS_AREA AND A.CUSTOMER = B.CUSTOMER AND A.MMDDYYY =  '$date') as CREDIT,
									CASE WHEN RUNNING_TARGET > 0 THEN 'R' ELSE 'S' END AS STATUS
							FROM TR_MONTHLY_TARGET B
							WHERE 
									B.YYMM = '$datemonth'
									AND (B.RUNNING_TARGET > 0 OR B.STOP_TARGET > 0)
									AND B.EMPNO != '(none)'
									$where
					) C
					GROUP BY SUBSTR(C.BUSINESS_AREA,1,3)||'2', C.EMPNO
			) D
			ORDER BY D.BUSINESS_AREA ASC, D.EMPNO
		";
		
    	$data = $this->db->query($query)->result_array();
		return $data;
	}

	private function datatable_overdue($filter) {
		$date = date('Ymd', strtotime($filter['date']));
		$exp_customer = explode("|", $filter['customer']);
		$exp_group_customer = explode("|", $filter['group_customer']);
		$query = "
			select * from FEED_CUST_REMAINDER_WA
			where MMDDYYY = '$date'
		";
		
		if ($filter['plant'] != '*') {
			$query .= " and BUSINESS_AREA = '".$filter['plant']."'";
		}
		if (!empty($exp_group_customer[0]) && $exp_group_customer[0] != '*') {
			$query .= " and GROUP_CUSTOMER = '".$exp_group_customer[0]."'";
		}
		if (!empty($exp_customer[0]) && $exp_customer[0] != '*') {
			$query .= " and CUSTOMER = '".$exp_customer[0]."'";
		}

		if ($filter['type'] != '*') {
			$query .= " and GROUP_CUSTOMER LIKE '".$filter['type']."%'";
		}
		// dd($query);
        $data = $this->db->query($query)->result_array();
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

	private function get_visitingreportcustomer($slug) {
		
		$plant 		= substr($slug, 0, 4);
		$customer = str_replace($plant, "", $slug);

		$visiting_list = $this->Dbhelper->selectTabel('*', 'TR_VR', array('PLANT' => $plant, 'CUSTOMER' => $customer), 'VISITING_NO', 'DESC');
		dd($visiting_list);

		$data['vr'] 			= $this->detail_data($visiting_no);
		$data['vr_assets']		= $this->Dbhelper->selectTabel('*', 'TR_VR_ASSETS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_collection_plan']		= $this->Dbhelper->selectTabel('*', 'TR_VR_COLLECTION_PLAN', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_details']		= $this->Dbhelper->selectTabel('*', 'TR_VR_DETAILS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_other_debts']		= $this->Dbhelper->selectTabel('*', 'TR_VR_OTHER_DEBTS', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_strategy']		= $this->Dbhelper->selectTabel('*', 'TR_VR_STRATEGY', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		$data['vr_galleries']		= $this->Dbhelper->selectTabel('*', 'TR_VR_GALLERIES', array('VISITING_NO' => $visiting_no), 'SEQUENCE', 'ASC');
		return $data;
	}

	private function collection_type() {
		$data = [
			'CICILAN', 'SEGERA', 'TRANSAKSI_ULANG', 'JALUR_HUKUM', 'TAKE_OVER_ASSET', 'AMBIL_JAMINAN', 'SULIT_COLLECTION', 'SHM'
		];

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

