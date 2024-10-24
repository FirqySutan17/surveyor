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
		$this->menu_id2 	= 'TR009';
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

		$data['title'] 				= 'WAREHOUSE';
		$data['province'] 			= $this->dataprovince();
		$data['regencies'] 			= $this->dataregencies();
		$data['districts'] 			= $this->datadistricts();
		$data['datatable']			= $this->datatable($filter);
		$data['filter']				= $filter;
		// dd($data['datatable']);
		
		$this->template->_v('warehouse/index', $data);
	}

	public function index_update() {
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

		$data['title'] 				= 'WAREHOUSE';
		$data['province'] 			= $this->dataprovince();
		$data['regencies'] 			= $this->dataregencies();
		$data['districts'] 			= $this->datadistricts();
		$data['datatable']			= $this->datatable($filter);
		$data['filter']				= $filter;
		// dd($data['datatable']);
		
		$this->template->_v('warehouse/index-update', $data);
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

				dd($warehouse_report, FALSE);
				$wh_galleries = [];
				if (!empty($_FILES['image_file']['name'])) {
					foreach ($_FILES['image_file']['name'] as $key => $v) {
						$no = $key + 1;

						$berkas = [];
						$berkas['name']= $v;
				        $berkas['type']= $_FILES['image_file']['type'][$key];
				        $berkas['tmp_name']= $_FILES['image_file']['tmp_name'][$key];
				        $berkas['error']= $_FILES['image_file']['error'][$key];
				        $berkas['size']= $_FILES['image_file']['size'][$key];
				        $namafile = $this->upload_image($berkas, $wh_no, $no);
						// Panggil fungsi upload_image dan kirim file sesuai dengan indexnya
						// $namafile = $this->upload_image($wh_no, $no, $key);  
						if ($namafile) {
							$wh_galleries[] = [
								'WH_NO'       => $wh_no,
								'SEQUENCE'    => $no,
								'IMAGE_TITLE' => $post['image_title'][$key],
								'IMAGE_FILE'  => $namafile
							];
						}
					}
				}
				$save = $this->Dbhelper->insertData('WAREHOUSE', $warehouse_report);
				if (!empty($warehouse_corn)) {
					$save_corn = $this->db->insert_batch('WAREHOUSE_CORN', $warehouse_corn);
				}
				if (!empty($wh_galleries)) {
					$save_galleries = $this->db->insert_batch('WAREHOUSE_IMAGES', $wh_galleries);
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

	public function detail($wh_no) {
		$user	= 	$this->session_data['user'];

		$data_detail = $this->get_whdetail($wh_no);
		$data['title'] 				= 'WAREHOUSE';
		$data['user'] 				= $user;
		$data['detail']				= $data_detail;
		// dd($data['detail']);
		$this->template->_v('warehouse/detail', $data);
	}

	public function edit($wh_no) {
		$user 							= $this->session_data['user'];

		$data_detail = $this->get_whdetail($wh_no);
		$data['title'] 				= 'WAREHOUSE';
		$data['user'] 				= $user;
		$data['detail']				= $data_detail;
		
		// dd($data['detail']);
		$this->template->_v('warehouse/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$postjson = json_encode($post);
			$textfile = date('YmdHis') . '_' . $this->session_data['user']['EMPLOYEE_ID'];
	
			if (!write_file(APPPATH . "logs/log_$textfile.txt", $postjson)) {
				$this->session->set_flashdata('success', "Unable to log post");
				return redirect($this->own_link . '/report');
			}

			$wh_no = $post['wh_no'];
	
			try {
				// SURVEY DATA
				$warehouse_report = [
					"STOCK_SILO"       => cleanformat($post['stock_silo']),
					"STOCK_FLAT"       => cleanformat($post['stock_flat']),
					"STOCK_LJ"         => cleanformat($post['stock_lj']),
					"STOCK_DRYER"      => cleanformat($post['stock_dryer']),
					"DAILY_17"         => cleanformat($post['daily_17']),
					"DAILY_15"         => cleanformat($post['daily_15']),
					"BUYING_17"        => cleanformat($post['buying_17']),
					"BUYING_15"        => cleanformat($post['buying_15']),
					"SALES_TRADERS"    => cleanformat($post['sales_traders']),
					"SALES_FEEDMILL"   => cleanformat($post['sales_feedmill']),
					"SALES_PRICE"      => cleanformat($post['sales_price']),
					"DESCRIPT"         => dbClean($post['descript']),
					"UPDATED_AT"       => date('Ymd His'),
					"UPDATED_BY"       => $this->session_data['user']['EMPLOYEE_ID'],
				];
	
				// Cek jika user log-in tidak ditemukan
				if (empty($warehouse_report["UPDATED_BY"])) {
					$this->session->set_flashdata('error', "User log-in not found");
					return redirect($this->own_link . '/report');
				}

				// dd($warehouse_report);
	
				// Update WAREHOUSE table berdasarkan WH_NO
				$update = $this->db->update('WAREHOUSE', $warehouse_report, ['WH_NO' => $wh_no]);
				// dd($update);
				// Update WAREHOUSE_CORN
				$warehouse_corn = [];
				if (!empty($post['region'])) {
					foreach ($post['region'] as $i => $v) {
						$curr_data = [
							"WH_NO"        => $wh_no,
							"SEQUENCE"     => $i + 1,
							"REGION"       => $v,
							"AMOUNT_TON"   => cleanformat($post['amount_ton'][$i])
						];
	
						$warehouse_corn[] = $curr_data;
					}
				}
	
				// Hapus data corn lama dan insert ulang
				$this->db->delete('WAREHOUSE_CORN', ['WH_NO' => $wh_no]);
				if (!empty($warehouse_corn)) {
					$save_corn = $this->db->insert_batch('WAREHOUSE_CORN', $warehouse_corn);
				}
	
				// Proses update images
				$wh_galleries = [];
				if (!empty($_FILES['image_file']['name'])) {
					foreach ($_FILES['image_file']['name'] as $key => $v) {
						$no = $key + 1;
	
						$berkas = [];
						$berkas['name'] = $v;
						$berkas['type'] = $_FILES['image_file']['type'][$key];
						$berkas['tmp_name'] = $_FILES['image_file']['tmp_name'][$key];
						$berkas['error'] = $_FILES['image_file']['error'][$key];
						$berkas['size'] = $_FILES['image_file']['size'][$key];
						$namafile = $this->upload_image($berkas, $wh_no, $no);
	
						if ($namafile) {
							$wh_galleries[] = [
								'WH_NO'       => $wh_no,
								'SEQUENCE'    => $no,
								'IMAGE_TITLE' => $post['image_title'][$key],
								'IMAGE_FILE'  => $namafile
							];
						}
					}
				} elseif (empty($post['image_title']) && !empty($post['image_file'])) {
					foreach ($post['image_file'] as $i => $v) {
						$delete_image = $this->delete_image($v);
					}
				}
	
				
				if (!empty($wh_galleries)) {
					$save_galleries = $this->db->insert_batch('WAREHOUSE_IMAGES', $wh_galleries);
				}
	
				if ($update) {
					// dd($update);
					$this->session->set_flashdata('success', "Update data success");
					return redirect($this->own_link);
				}
	
			} catch (Exception $e) {
				dd($e->getMessage());
			}
	
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link . "/report");
		}
	
		$this->session->set_flashdata('error', "Access denied");
		return redirect($this->own_link);
	}
	
	private function get_whdetail($wh_no) {
		$data['WAREHOUSE'] 		= $this->Dbhelper->selectOneRawQuery("
			SELECT 
					a.*, 
					FN_USER_NAME(CREATED_BY) CREATED_BY_NAME,
					p.PROVINCE as PROVINCE_NAME,
					r.REGENCIES as REGENCY_NAME,
					d.DISTRICS as DISTRICT_NAME,
					e.NAMA as WAREHOUSE_NAME
			FROM WAREHOUSE a, CD_PROVINCE p, CD_REGENCIES r, CD_DISTRICTS d, CD_GUDANG e
			WHERE 
					p.ID_PROVINCE = a.PROVINCE
					AND r.ID_REGENCIES = a.REGENCIES
					AND d.ID_DISTRICTS = A.DISTRICT
					AND a.WH_NO = '$wh_no'
		");
		$data['WAREHOUSE_CORN']			= $this->Dbhelper->selectTabel('*', 'WAREHOUSE_CORN', array('WH_NO' => $wh_no), 'SEQUENCE', 'ASC');
		$data['WAREHOUSE_IMAGES']		= $this->Dbhelper->selectTabel('*', 'WAREHOUSE_IMAGES', array('WH_NO' => $wh_no), 'SEQUENCE', 'ASC');
		return $data;
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
				GUDANG.NAMA AS GUDANG_NAME,
				DISTRICTS.DISTRICS AS DISTRICT_NAME, 
				REGENCIES.REGENCIES AS REGENCIES_NAME, 
				PROVINCE.PROVINCE AS PROVINCE_NAME
			FROM
				WAREHOUSE WH
			JOIN 
				CD_GUDANG GUDANG ON WH.WH_NAME = GUDANG.CODE
			LEFT JOIN 
				CD_DISTRICTS DISTRICTS ON WH.DISTRICT = DISTRICTS.ID_DISTRICTS
			LEFT JOIN 
				CD_REGENCIES REGENCIES ON DISTRICTS.REGENCIES_ID = REGENCIES.ID_REGENCIES
			LEFT JOIN 
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
		$generated_no = "WAREHOUSE".date('Ymd');
        $no = 1;
        $today = date('Ymd');
        $this->db->select('WH_NO, CREATED_AT');
        $this->db->from('WAREHOUSE');
        $this->db->like('CREATED_AT', $today, 'after');
        $this->db->order_by('CREATED_AT', 'DESC');
        $this->db->order_by('WH_NO', 'DESC');
        $latest_data = $this->db->get()->row();
        if (!empty($latest_data)) {
            $no = substr($latest_data->WH_NO, -4);

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

    public function upload_image_bak($wh_no, $sequence, $index) {
		$result = "";
	
		// Cek apakah file pada index yang bersangkutan ada
		if (!empty($_FILES['image_file']['name'][$index])) {
			$pathDir    = "./upload/";
			$temp       = explode(".", $_FILES['image_file']['name'][$index]);
			$type_file  = '.' . end($temp);  // Mendapatkan extension file
	
			// Generate nama file berdasarkan $wh_no dan $sequence
			$stringRandom = random_char(10);  // Fungsi random_char harus sudah didefinisikan
			$nama = $wh_no . "_" . $sequence . $type_file;
	
			// Konfigurasi upload
			$config['upload_path']   = $pathDir;
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['file_name']     = $nama;
	
			// Initialize dan lakukan upload
			$this->upload->initialize($config);
			
			// Proses upload berdasarkan index file yang dikirimkan
			if (!$this->upload->do_upload('image_file', $index)) {
				// Jika gagal upload, tampilkan error (opsional bisa simpan ke log) dan return
				$result = "";  // Bisa diganti dengan log error jika perlu
			} else {
				// Jika berhasil upload, return nama file
				$result = $nama;
			}
		}
	
		return $result;
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
				$nama = $wh_no."_".$sequence.$type_file;
				$config['upload_path']          = $pathDir;
                $config['allowed_types']        = 'gif|jpg|png|jpeg';

                $config['file_name'] = $nama;
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('files')) {
                    $result = array('error' => $this->upload->display_errors());
					dd($result);
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

