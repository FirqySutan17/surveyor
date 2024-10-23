<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Warehouse extends CI_Controller {
	var $menu_id = "";
	var $menu_id1 = "";
	var $menu_id2 = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'TR002';
		$this->menu_id1 = 'R002';
		$this->menu_id2 = 'TR005';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/warehouse');
	}

	public function index() {
		$warehouse = "*";
		$area = "*";
		$klasifikasi = "*";

		$user = $this->session_data['user'];

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$warehouse 		= $this->input->post('warehouse');
			$area 			= $this->input->post('area');
			$klasifikasi 			= $this->input->post('klasifikasi');
		}

		$filter = [
			"warehouse"			=> $warehouse,
			"area"				=> $area,
			"klasifikasi"		=> $klasifikasi,
		];

		$data['title'] 			= 'WAREHOUSE';
		$data['warehouse'] 		= $this->Dbhelper->selectTabel('CODE, NAMA, AREA', 'CD_GUDANG');
		$data['area'] 			= $this->dataarea();
		$data['klasifikasi'] 	= $this->dataklasifikasi();
		$data['datatable']		= $this->datatable($filter);
		$data['filter']			= $filter;
		// dd($data['area']);
		$this->template->_v('master/gudang/index', $data);
	}

	public function index_update() {
		$warehouse = "*";
		$area = "*";
		$klasifikasi = "*";

		$user = $this->session_data['user'];

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$warehouse 		= $this->input->post('warehouse');
			$area 			= $this->input->post('area');
			$klasifikasi 			= $this->input->post('klasifikasi');
		}

		$filter = [
			"warehouse"			=> $warehouse,
			"area"				=> $area,
			"klasifikasi"		=> $klasifikasi,
		];

		$data['title'] 			= 'WAREHOUSE';
		$data['warehouse'] 		= $this->Dbhelper->selectTabel('CODE, NAMA, AREA', 'CD_GUDANG');
		$data['area'] 			= $this->dataarea();
		$data['klasifikasi'] 	= $this->dataklasifikasi();
		$data['datatable']		= $this->datatable($filter);
		$data['filter']			= $filter;
		// dd($data['area']);
		$this->template->_v('master/gudang/index-update', $data);
	}


	private function datatable($filter) {
		$warehouse = $filter['warehouse'];
		$area = $filter['area'];

		$klasifikasi = $filter['klasifikasi'];
		$query = "
			select *
			from CD_GUDANG
		";
		if ($filter['warehouse'] != '*') {
			$query .= " WHERE CODE = '".$filter['warehouse']."'";
		}
		if ($filter['area'] != '*') {
			if ($filter['warehouse'] != '*') {
				$query .= " and ";
			} else {
				$query .= " WHERE ";
			}
			$query .= " AREA = '".$filter['area']."'";
		}
		if ($filter['klasifikasi'] != '*') {
			
			if ($filter['area'] != '*' || $filter['warehouse'] != '*') {
				$query .= " and ";
			} else {
				$query .= " WHERE ";
			}
			$query .= " CLASSIFICATION = '".$filter['klasifikasi']."'";
		}
		$query .= " order by CODE ASC";
		// dd($query);
        $data = $this->db->query($query)->result_array();
		
		return $data;
	}
	private function dataarea() {
		$query = "
			SELECT area
			FROM (
				SELECT area,
					ROW_NUMBER() OVER (PARTITION BY area ORDER BY area) as rn
				FROM CD_GUDANG
			)
			WHERE rn = 1
		";
		
		// $query .= " order by CODE ASC";
        $data = $this->db->query($query)->result_array();
		return $data;
		// dd($query);
	}

	public function dataklasifikasi() {
		$query = "
			SELECT classification
			FROM (
				SELECT classification,
					ROW_NUMBER() OVER (PARTITION BY classification ORDER BY classification) as rn
				FROM CD_GUDANG
			)
			WHERE rn = 1
		";
		
		// $query .= " order by CODE ASC";
        $data = $this->db->query($query)->result_array();
		return $data;
		// dd($query);
	}

	public function create() {
		$data['title'] 				= 'WAREHOUSE';
		$data['classification'] 	= $this->Dbhelper->selectTabel('CODE, CLASSIFICATION', 'CD_KLASIFIKASI');
		$data['category'] 		= $this->Dbhelper->selectTabel('CODE, CATEGORY', 'CD_KATEGORI');
		// dd($data['classification']);
		$this->template->_v('master/gudang/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				if ($key != 'kategori') {
					$key = strtoupper($key);
					$post_data[$key] = dbClean($value);
				} 
			}
			$gudang_code = $this->generateGudangCode();
			$kategori = implode(',', $post['kategori']);
			$post_data['CODE']		= $gudang_code;
			$post_data['KATEGORI'] = $kategori;

			// dd($post_data);

			$save = $this->Dbhelper->insertData('CD_GUDANG', $post_data);
			// dd($save);
			if ($save) {
				$this->session->set_flashdata('success', "Create data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
    	return redirect($this->own_link);
	}

	public function edit($code) {

		$data['title'] 			= 'WAREHOUSE';
		$data['model']			= $this->Dbhelper->selectTabelOne('*', 'CD_GUDANG', array('CODE' => $code));
		$data['classification'] 	= $this->Dbhelper->selectTabel('CODE, CLASSIFICATION', 'CD_KLASIFIKASI');
		$data['category'] 		= $this->Dbhelper->selectTabel('CODE, CATEGORY', 'CD_KATEGORI');
		$this->template->_v('master/gudang/edit', $data);
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				if ($key != 'kategori') {
					$key = strtoupper($key);
					$post_data[$key] = dbClean($value);
				} 
			}
			$kategori = implode(',', $post['kategori']);
			$post_data['KATEGORI'] = $kategori;

			$code = $post_data['CODE'];
			unset($post_data['CODE']);
			$save 	= $this->Dbhelper->updateData("CD_GUDANG", array('CODE' => $code), $post_data);		
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link."/edit/".$code);
		}
		$this->session->set_flashdata('error', "Access denied");
    return redirect($this->own_link);
	}

	private function generateGudangCode() {
		$generated_no = "WH";
		$no = 1;
		$data = $this->Dbhelper->selectTabelOne('CODE', 'CD_GUDANG', array(), 'CODE', 'DESC');
		
		$no 	= str_replace("WH", "", $data['CODE']) + 1;
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

