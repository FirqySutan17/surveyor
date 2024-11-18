<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;
use Dompdf\Options;

class Expence extends CI_Controller {
	var $menu_id 	= "";
    var $menu_id2 	= "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id 		= 'O001';
        $this->menu_id2 		= 'O002';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('expence');
		$this->load->library('upload');
	}

    public function index() {
        $sdate = date('Y-m'); // Default tanggal hari ini
        $surveyor = "*"; // Default semua surveyor
    
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $sdate = $this->input->post('sdate'); // Ambil tanggal dari input form
            $surveyor = $this->input->post('surveyor'); // Ambil surveyor dari input form
        }
    
        $filter = [
            "sdate" => $sdate,
            "surveyor" => $surveyor,
        ];
    
        $data['title'] = 'EXPENCES';
        $data['datatable'] = $this->datatable($filter); // Panggil fungsi datatable dengan filter
        $data['filter'] = $filter; // Kirim filter ke view
        $data['surveyor'] = $this->datatable_surveyor(); // Ambil data surveyor untuk dropdown
    
        $this->template->_v('expence/index', $data); // Render template
    }

	public function entry() {

		$user 					= $this->session_data['user'];
		$data['title'] 			= 'EXPENCE';
		$data['user'] 			= $user;

		$this->template->_v('expence/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$request_no = $this->generateExpenceNo();
			try {
				
				// ORDER REQUEST DATA
				$expence_request = [
					"EX_NO"				    => $request_no,
					"EX_DATE"				=> date('Ymd', strtotime($post['ex_date'])),
					"CATEGORY"				=> dbClean($post['category']),
					"REMARKS"				=> dbClean($post['remarks']),
					"AMOUNT"				=> dbClean($post['amount']),
                    "COORDINATE"		    => dbClean($post['coordinate']),
					"IMAGE"					=> "",
                    "REG_EMP"				=> $this->session_data['user']['EMPLOYEE_ID'],
				];

				if (empty($expence_request["REG_EMP"])) {
						$this->session->set_flashdata('error', "User log-in not found");
						return redirect($this->own_link);
				}

				if (!empty($_FILES['image']['name'])) {
					$berkas = $_FILES['image'];
					$namafile = $this->upload_file($berkas, $request_no); 
					if ($namafile) {
						$expence_request["IMAGE"] 		= $namafile;
					}
				}

				$save = $this->Dbhelper->insertData('EXPENCE', $expence_request);
				
				if ($save) {
					$this->session->set_flashdata('success', "update data success");
					return redirect($this->own_link);
				}
			} catch (Exception $e) {
				dd($e->getMessage());
			}
			$this->session->set_flashdata('error', "update data failed");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function detail() {
		$user	= 	$this->session_data['user'];

		// $data_detail = $this->get_orderdetail($order_no);
		$data['title'] 				= 'REQUEST ORDER';
		$data['user'] 				= $user;
		// $data['detail']				= $data_detail;
		// dd($data['detail']);
		$this->template->_v('expence/pdf', $data);
	}

	public function generate_pdf($slugdata) {
		$data_detail 	= $this->get_expense_detail($slugdata);
	
		$this->load->library('pdf');
		$data['detail'] = $data_detail;
		$html = $this->load->view('admin/expence/pdf', $data, TRUE);
		
		$this->dompdf->loadHtml($html);
		
		// Set paper size and orientation
		$this->dompdf->setPaper('A4', 'portrait');
		
		// Enable loading of remote resources
		$this->dompdf->set_option('isRemoteEnabled', TRUE);
		
		// Render the HTML as PDF
		$this->dompdf->render();
		
		// Output the generated PDF (1 = download and 0 = preview)
		$filename = "request_order_" . date("Y-m-d_H:i:s");
		$this->dompdf->stream($filename . ".pdf", array("Attachment" => 0));
	}
	

	public function edit($order_no) {
		$user 							= $this->session_data['user'];

		$data_detail = $this->get_orderdetail($order_no);
		$data['title'] 			= 'REQUEST ORDER';
		$data['detail']				= $data_detail;
		$data['projects']       = $this->datatable_project();
		$data['area']				= $this->Dbhelper->selectTabel('HEAD_CODE, CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AE', 'CODE !=' => "*"), 'HEAD_CODE', 'ASC');

		// dd($data);
		
		$this->template->_v('order/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			// dd($post);
			$request_no = $post['req_no'];
			try {
				$order_request = [
					"CONTROL_NO"		=> dbClean($post['control_no']),
					"REMARKS"				=> dbClean($post['remarks']),
					"QTY"						=> dbClean($post['qty']),
					"UP"						=> dbClean($post['price']),
					"AMOUNT"				=> dbClean($post['amount']),
					"NOTE"					=> dbClean($post['note']),
					"PLANT"					=> dbClean($post['plant']),
					"PROJECT"				=> dbClean($post['project']),
					"FARM"					=> dbClean($post['farm']),
					"PLAZMA"				=> dbClean($post['plazma']),
					"BW"						=> $post['bw'],
					"STATUS"				=> "Y",
					"CUST_PHONE_NO" => dbClean($post['customer_phone']),
					"REG_EMP"				=> $this->session_data['user']['EMPLOYEE_ID'],
					"MOD_EMP"				=> $this->session_data['user']['EMPLOYEE_ID'],
					"MOD_DATE"			=> date('Ymd')
				];
				// dd($request_no, FALSE);
				// dd($order_request);
				if (!empty($_FILES['image']['name'])) {
					$berkas = $_FILES['image'];
					$namafile = $this->upload_file($berkas, $request_no); 
					$delete_file = $this->delete_file($post['image_file_old']);
					if ($namafile) {
						$order_request["IMAGE"] 		= $namafile;
						$order_request["IMAGE_URL"] = 'http://103.209.6.32:8080/broiler/upload/'.$namafile;
					}
				}

				$save = $this->db->update('TR_SS_ORDER_REQUEST', $order_request, array('REQ_NO' => $request_no));
				// dd($save);
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

	public function do_cancel() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$request_no = $post['req_no'];
			try {
				$order_request = [
					"STATUS"				=> "Y",
					"MOD_EMP"				=> $this->session_data['user']['EMPLOYEE_ID'],
					"MOD_DATE"			=> date('Ymd')
				];

				$save = $this->db->update('TR_SS_ORDER_REQUEST', $order_request, array('REQ_NO' => $request_no));
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

	private function get_expense_detail($slugdata) {
		$exp = explode("-", $slugdata);
		$employee_id 	= $exp[1];
		$month 				= $exp[0];
		$query = "
				SELECT 
					a.*, 
					b.FULL_NAME,
					b.EMAIL,
					FN_CODE_NAME(b.PLANT, 'AB' ) COMPANY_NAME
			FROM EXPENCE a, CD_USER b
			WHERE
					a.REG_EMP = B.EMPLOYEE_ID
					AND EX_DATE LIKE '$month%' AND A.REG_EMP = '$employee_id'
			ORDER BY EX_DATE ASC
		";

		$result = $this->Dbhelper->selectRawQuery($query);
		dd($result, FALSE);
		dd($query);
	}

	private function datatable($filter) {
        // Konversi sdate ke format YYYYMM untuk filter berdasarkan bulan
        $sdate = date('Ym', strtotime($filter['sdate']));
        $surveyor = $filter['surveyor'];
    
        // Kondisi WHERE untuk query
        $where = "A.EX_DATE LIKE '$sdate%'"; // Filter berdasarkan bulan
        if ($surveyor != '*') {
            $where .= " AND B.EMPLOYEE_ID = '$surveyor'"; // Filter berdasarkan surveyor jika dipilih
        }
    
        // Query SQL
        $query = "
            SELECT 
                SUBSTR(A.EX_DATE, 1, 6) AS EX_DATE_MONTH, -- Mengambil 6 karakter pertama (YYYYMM)
                A.REG_EMP,
                B.FULL_NAME,
                SUM(A.AMOUNT) AS TOTAL_AMOUNT
            FROM 
                EXPENCE A
                LEFT JOIN CD_USER B ON A.REG_EMP = B.EMPLOYEE_ID
            WHERE 
                $where
            GROUP BY 
                B.FULL_NAME,
                SUBSTR(A.EX_DATE, 1, 6), -- Kelompokkan berdasarkan YYYYMM
                A.REG_EMP
            ORDER BY 
                B.FULL_NAME,
                SUBSTR(A.EX_DATE, 1, 6) ASC, 
                A.REG_EMP ASC
        ";
    
        // Eksekusi query dan kembalikan hasil sebagai array
        // dd($query);
    
        $data = $this->db->query($query)->result_array();
        return $data;
    }

    private function datatable_surveyor() {
		$query = "
			SELECT * FROM CD_USER
		";
		$data 				= $this->db->query($query)->result_array();
		return $data;
	}

	private function get_orderdetail($order_no) {
		$query = "
			SELECT ROWNUM,
				C.COMPANY,
				C.ORDER_NO,
				C.ORDER_DATE,
				C.CUSTOMER,
				FULL_NAME,
				ADDRESS1 || '' || ADDRESS2 AS ADDRESS,
				TELEPHONE_NO || '/' ||MOBILE_PHONE PHONE,
				FAX_NO,
				SUJA.FN_ITEM_NAME('L',C.ITEM) ITEM_NAME,
				SUM(C.QTY) QTY, 
				C.PLANT,
				FN_CODE_NAME('AA',C.COMPANY)               AS COMPANY_NAME,
				FN_CODE_NAME('TR20',C.PLANT)                 AS PLANT_NAME,
				C.NOTE ,
				C.FARM,
				SUJA.FN_TR_FARM_NAME('01',C.PLAZMA,C.FARM)  AS FARM_NAME, 
				SUJA.FN_TR_FARM_address('01',C.PLAZMA,C.FARM) AS FARM_ADDRESS,
				C.PLAZMA,
				C.REMARKS,
				B.REGION_CODE
			FROM SUJA.CD_CUSTOMER    B,
				TR_SS_ORDER_REQUEST    C
			WHERE C.CUSTOMER    = B.CUST
			AND C.COMPANY     = '01'
			AND C.REQ_NO    = '$order_no'  
			GROUP BY ROWNUM, C.COMPANY, C.ORDER_NO, C.ORDER_DATE, C.CUSTOMER,  C.ITEM, C.PLANT, 
					FULL_NAME, ADDRESS1, ADDRESS2, TELEPHONE_NO, MOBILE_PHONE, FAX_NO,  C.NOTE, C.FARM, C.PLAZMA, C.REMARKS, B.REGION_CODE
		";
		$data['REQUEST_ORDER'] = $this->Dbhelper->selectOneRawQuery("select 
				A.*,
                B.PLAZMA_NAME,
				C.FARM_NAME,
                D.FULL_NAME,
				D.REGION_CODE,
				FN_CODE_NAME('AE',D.REGION_CODE)                 AS AREA_NAME
			FROM
                TR_SS_ORDER_REQUEST A,
                TR_CD_PLAZMA B, 
                TR_CD_FARM C,
                CD_CUSTOMER D
			where 
                A.PLAZMA 	    = B.PLAZMA (+) AND
				A.FARM 		    = C.FARM (+) AND
                A.CUSTOMER 		= TRIM(D.CUST) AND
				A.REQ_NO = '$order_no'
			ORDER BY REQ_NO DESC");
		$data['ORDER'] 		= $this->Dbhelper->selectOneRawQuery($query);
		// dd($data);
		// $data 				= $this->db->query($query)->result_array();
		return $data;
	}

	private function generateExpenceNo() {
			$generated_no = date('Ymd')."EX";
			$no = 1;
			$today = date('Ymd');
			$this->db->select('EX_NO, EX_DATE');
			$this->db->from('EXPENCE');
			$this->db->like('EX_DATE', $today, 'after');
			$this->db->order_by('EX_DATE', 'DESC');
			$this->db->order_by('EX_NO', 'DESC');
			$latest_data = $this->db->get()->row();
			if (!empty($latest_data)) {
					$no = substr($latest_data->EX_NO, -4);
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

	public function upload_file($berkas, $request_no) {
		$result = "";
		if ($berkas["name"] != "") {
			$pathDir 	= "./upload/";
			if (!file_exists($pathDir)) {
					mkdir($pathDir, 0777, true);
			}
			// chmod($pathDir, 777);
			$temp = explode(".", $berkas["name"]);
			$type_file = '.'.end($temp);
			if (trim($berkas['name']) != "") {
				$_FILES["files"] = $berkas;
				$stringRandom = random_char(5);
				$nama = $request_no.$type_file;
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

	private function delete_file($filename) {
		$path_to_file = './upload/excel/'.$filename;
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
		if (!in_array($this->menu_id, $user_access) && !in_array($this->menu_id2, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}