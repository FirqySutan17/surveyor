<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Districts extends CI_Controller {
	var $menu_id = "";
	var $menu_id1 = "";
	var $menu_id2 = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M007';
		$this->menu_id1 = 'R006';
		$this->menu_id2 = 'TR006';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/districts');
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
		// $data['districts'] 			= $this->datadistricts();
		$data['datatable']			= $this->datatable($filter);
		$data['filter']				= $filter;
		// dd($data['districts']);
		$this->template->_v('master/districts/index', $data);
	}

	private function datatable($filter) {
		$province 	= $filter['province'];
		$regencies 	= $filter['regencies'];
		$districts 	= $filter['districts'];

		$query = "
			SELECT 
				DISTRICTS.ID_DISTRICTS, 
				DISTRICTS.PLANT_AREA, 
				DISTRICTS.SEGMENT, 
				DISTRICTS.DISTRICS AS DISTRICT_NAME, 
				REGENCIES.REGENCIES AS REGENCIES_NAME, 
				PROVINCE.PROVINCE AS PROVINCE_NAME
			FROM 
				CD_DISTRICTS DISTRICTS
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
		$query .= " order by ID_DISTRICTS ASC";
		// dd($query);
        $data = $this->db->query($query)->result_array();
		
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

	public function edit($code) {

		$data['title'] 			= 'DISTRICTS';
		$data['model']			= $this->Dbhelper->get_districts_with_regencies($code);
		$this->template->_v('master/districts/edit', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
	
			// Debug: Cek apakah plant_area ada di POST
			// echo "<pre>";
			// print_r($post);
			// echo "</pre>";
			// die(); // Stop eksekusi untuk cek output
	
			// Pastikan ID_DISTRICTS ada sebelum lanjut
			foreach ($post as $key => $value) {
				
					$key = strtoupper($key);
					$post_data[$key] = dbClean($value);
			}
			$code = isset($post_data['ID_DISTRICTS']) ? $post_data['ID_DISTRICTS'] : null;
			// dd($post_data);
			if ($code) {
				unset($post_data['ID_DISTRICTS']);
	
				// Simpan data ke database
				$save = $this->Dbhelper->updateData("CD_DISTRICTS", array('ID_DISTRICTS' => $code), $post_data);
	// dd($save);
				if ($save) {
					$this->session->set_flashdata('success', "Update data success");
					return redirect($this->own_link);
				} else {
					$this->session->set_flashdata('error', "Update data failed");
					return redirect($this->own_link."/edit/".$code);
				}
			}
			$this->session->set_flashdata('error', "District ID is missing.");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
		return redirect($this->own_link);
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

