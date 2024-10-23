<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->cekLogin();
		$this->session_data = $this->session->userdata('user_dashboard');
	}

	public function index() {
		$all_survey_data = $this->Dbhelper->get_all_survey_data();

		$survey_result = [];
		foreach ($all_survey_data as $survey) {
            $umur_tanam = $survey['UMUR_TANAM'];
            $current_phase_date = $survey['CURRENT_PHASE_DATE']; // Ambil tanggal dari field CURRENT_PHASE_DATE

            // Dapatkan data yang mendekati status selanjutnya berdasarkan perhitungan umur_tanam dan current_phase_date
            $near_status_data = $this->Dbhelper->get_near_next_status($umur_tanam, $current_phase_date);

            // Gabungkan data yang memenuhi syarat ke dalam array hasil
            if (!empty($near_status_data)) {
                $survey_result = array_merge($survey_result, $near_status_data);
            }
        }

		$data['titik_post']			= $this->Dbhelper->selectRawQuery('SELECT SURVEY_NO, CURRENT_PHASE, COORDINATE, DESCRIPTION as ADDRESS FROM SURVEY WHERE CURRENT_PHASE IS NOT NULL AND COORDINATE IS NOT NULL AND DESCRIPTION IS NOT NULL');
		$data['title'] 				= 'DASHBOARD';
		$data['user']				= $this->session_data['user'];
		$data['survey'] 			= $survey_result;
		// dd($data['titik_post']);
		$this->template->_v('index', $data);
	}

	public function summary_report() {
		$incl_internal 	= $this->input->get('incl_internal');
		$plant 			= !empty($this->input->get('plant')) ? $this->input->get('plant') : '*';
		$filter 		= [
			'incl_internal'	=> $incl_internal,
			'plant'			=> $plant
		];
		$data['filter']				= $filter;
		$data['daily_remainder'] 		= $this->daily_remainder($filter);
		$data['monthly_remainder'] 	= $this->monthly_remainder($filter);
		$data['title'] 				= 'Dashboard';
		$data['user']				= $this->session_data['user'];
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');

		$this->template->_v('summary_report', $data);
	}

	private function daily_remainder($filter) {
		$ym 	= date('Ym');
		$cls 	= "'FM'";
		if ($filter['incl_internal'] == 'IN') {
			$cls .= ", 'IN'";
		}
		$plant = "";
		if (!empty($filter['plant']) && $filter['plant'] != '*') {
			$plant = " and BUSINESS_AREA = '".$filter['plant']."'";
		}
		$query 	= "
			select 
			    SUBSTR(YMD,-2) DAY,
			    SUM(CHASH_IN) AS COLL, 
			    SUM(OVER_DUE) AS OD, 
			    SUM(STOP) AS BD 
			from TR_DAILY_REMAINDER
			where YMD like '$ym%' and CLS in ($cls) $plant
			group by YMD
			order by YMD asc
		";
        $data 	= $this->db->query($query)->result_array();

				$total_day = date('t');
        $daily_data = [];
        for ($i=1; $i <= $total_day; $i++) {
        	$str_i = $i < 10 ? "0".$i : $i;
					if ($i == 1) {
						$startdate_name = strtoupper(date('D', strtotime($ym.$str_i)));
						$datelist = dateNameList();
						$additional_tile = array_search($startdate_name, $datelist);
						if ($additional_tile > 0) {
							for ($x=0; $x < $additional_tile; $x++) { 
								$daily_data["RAND".$x] = [
									"DAY"	=> "",
									"COLL"	=> "",
									"OD"	=> "",
									"BD"	=> "",
									"ACTIVE"		=> ""
								];
							}
						}
					}
        	$is_currday = date('d') == $i ? 'active' : '';
					$daily_data[$str_i] = [
						"DAY"	=> $i,
						"COLL"	=> 0,
						"OD"	=> 0,
						"BD"	=> 0,
						"ACTIVE"		=> $is_currday
					];
        }

        if (!empty($data)) {
        	foreach ($data as $v) {
        		$daily_data[$v['DAY']]['COLL'] = $v['COLL'];
        		$daily_data[$v['DAY']]['OD'] = $v['OD'];
        		$daily_data[$v['DAY']]['BD'] = $v['BD'];
        	}
        }
        return $daily_data;
	}

	private function monthly_remainder($filter) {
		$year 	= date('Y');
		$cls  	= "'FM'";
		if ($filter['incl_internal'] == 'IN') {
			$cls .= ", 'IN'";
		}
		$plant = "";
		if (!empty($filter['plant']) && $filter['plant'] != '*') {
			$plant = " and BUSINESS_AREA = '".$filter['plant']."'";
		}
		$query 	= "
			select 
			    SUBSTR(YYMM,-2) MONTH,
			    SUM(CHASH_IN) AS COLL, 
			    SUM(OVER_DUE) AS OD, 
			    SUM(STOP) AS BD 
			from TR_MONTHLY_REMAINDER
			where YYMM like '$year%' and CLS in ($cls) $plant
			group by YYMM
			order by YYMM asc
		";
        $data 	= $this->db->query($query)->result_array();

        $monthly_data = [];
        for ($i=1; $i <= 12; $i++) {
        	$month_name = convMonth($i);
        	$str_i = $i < 10 ? "0".$i : $i; 
        	$is_currday = date('m') == $i ? 'active' : '';
        	$monthly_data[$str_i] = [
        		"MN" 	=> $month_name,
        		"COLL"	=> 0,
        		"OD"	=> 0,
        		"BD"	=> 0,
        		"ACTIVE"	=> $is_currday
        	];
        }

        if (!empty($data)) {
        	foreach ($data as $v) {
						if (array_key_exists($v['MONTH'], $monthly_data)) {
							$monthly_data[$v['MONTH']]['COLL'] = $v['COLL'];
							$monthly_data[$v['MONTH']]['OD'] = $v['OD'];
							$monthly_data[$v['MONTH']]['BD'] = $v['BD'];	
						}
        	}
        }
				// dd($data, FALSE);
				// dd($monthly_data);
        return $monthly_data;
	}

	private function monthly_ranking() {
		// $previousMonthDate 	= date('Ymd', strtotime('last day of previous month'));

		$maxDateTarget 	= $this->Dbhelper->selectTabelOne('YYMM', 'TR_MONTHLY_TARGET', [], 'YYMM', 'DESC')['YYMM'];
		$maxDate 	= $this->Dbhelper->selectOneRawQuery("SELECT MMDDYYY FROM FEED_CUST_REMAINDER_WA WHERE MMDDYYY LIKE '$maxDateTarget%' ORDER BY MMDDYYY DESC");
		$previousMonthDate 		= date('Ymd', strtotime($maxDate['MMDDYYY']));
		// dd($previousMonthDate);

		$previousMonth 			= date('Ym', strtotime($previousMonthDate));

		$queries 				= $this->query_ranking($previousMonthDate, $previousMonth);
		// dd($queries);
		$data_running 	= $this->db->query($queries['running'])->result_array();
		$data_stop 			= $this->db->query($queries['stop'])->result_array();

		$limit_rank = 5;
		$top_running = array_slice($data_running, 0, $limit_rank);
		$bot_running = array_slice($data_running, -5);
		krsort($bot_running);
		$running = [
			"TOP"			=> $top_running,
			"BOTTOM"	=> $bot_running
		];

		$top_stop = array_slice($data_stop, 0, $limit_rank);
		$bot_stop = array_slice($data_stop, -5);
		// krsort($bot_stop);
		$stop = [
			"TOP"			=> $top_stop,
			"BOTTOM"	=> $bot_stop
		];

		$result = [
			"PERIODE"	=> date('M Y', strtotime($previousMonthDate)),
			"RUNNING"	=> $running,
			"STOP"		=> $stop
		];
		// dd($result);
		return $result;
	}

	private function query_ranking($previousMonthDate, $previousMonth) {
		$query_stop = "
			SELECT * FROM (
				SELECT
						FN_CODE_NAME('AB' ,SUBSTR(D.BUSINESS_AREA,1,3)||'2') COMPANY_NAME,
						D.BUSINESS_AREA,
						D.EMPNO,
						FN_HR_EMPLOYEE('02', D.EMPNO) AS EMPLOYEE_NAME,
						D.TARGET,
						D.CASH_IN,
						CASE WHEN D.CASH_IN > 0 AND D.TARGET > 0 THEN ((D.CASH_IN / D.TARGET) * 100) ELSE 0 END as PERCENTAGE,
						'S' AS STATUS
				FROM (
						SELECT
								C.BUSINESS_AREA,
								C.EMPNO,
								SUM(C.TARGET) AS TARGET,
								SUM(C.CREDIT) AS CASH_IN
						FROM (
								SELECT 
										B.BUSINESS_AREA,
										B.CUSTOMER,
										B.EMPNO,
										B.STOP_TARGET AS TARGET,
										(SELECT A.CREDIT FROM FEED_CUST_REMAINDER_WA A WHERE A.BUSINESS_AREA = B.BUSINESS_AREA AND A.CUSTOMER = B.CUSTOMER AND A.MMDDYYY = '$previousMonthDate') as CREDIT
								FROM TR_MONTHLY_TARGET B
								WHERE 
										B.YYMM = '$previousMonth'
										AND B.STOP_TARGET > 0
										AND B.EMPNO != '(none)'
						) C
						GROUP BY C.BUSINESS_AREA, C.EMPNO
				) D
			) ORDER BY PERCENTAGE DESC
		";
		$query_running = "
			SELECT * FROM (
				SELECT
						FN_CODE_NAME('AB' ,SUBSTR(D.BUSINESS_AREA,1,3)||'2') COMPANY_NAME,
						D.BUSINESS_AREA,
						D.EMPNO,
						FN_HR_EMPLOYEE('02', D.EMPNO) AS EMPLOYEE_NAME,
						D.TARGET,
						D.CASH_IN,
						CASE WHEN D.CASH_IN > 0 AND D.TARGET > 0 THEN ((D.CASH_IN / D.TARGET) * 100) ELSE 0 END as PERCENTAGE,
						'R' AS STATUS
				FROM (
						SELECT
								C.BUSINESS_AREA,
								C.EMPNO,
								SUM(C.TARGET) AS TARGET,
								SUM(C.CREDIT) AS CASH_IN
						FROM (
								SELECT 
										B.BUSINESS_AREA,
										B.CUSTOMER,
										B.EMPNO,
										B.RUNNING_TARGET AS TARGET,
										(SELECT A.CREDIT FROM FEED_CUST_REMAINDER_WA A WHERE A.BUSINESS_AREA = B.BUSINESS_AREA AND A.CUSTOMER = B.CUSTOMER AND A.MMDDYYY = '$previousMonthDate') as CREDIT
								FROM TR_MONTHLY_TARGET B
								WHERE 
										B.YYMM = '$previousMonth'
										AND B.RUNNING_TARGET > 0
										AND B.EMPNO != '(none)'
						) C
						GROUP BY C.BUSINESS_AREA, C.EMPNO
				) D
			) ORDER BY PERCENTAGE DESC
		";

		$query = [
			"running" => $query_running,
			"stop" 		=> $query_stop
		];
		// dd($query);
		return $query;
	}
	
	private function cekLogin() {
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
}
