<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	var $user_access_detail = "";
	var $table = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 19;
		$this->session_data = $this->session->userdata('user_dashboard');
		$this->user_access_detail = $this->session_data['user_access_detail'][$this->menu_id];

		$this->cekLogin();
		$this->own_link = admin_url('portfolio');
		$this->load->model('Article_model');
		$this->load->library('upload');
		$this->table = "m_portfolio";
	}

	public function index() {
		$this->privilege('portfolio_index');

		$user_access_detail = $this->user_access_detail;
		$is_create 			= in_array('portfolio_add', $user_access_detail) ? 1 : 0;

		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$portfolio = $this->db->get('m_portfolio')->result();

		$data['headline'] 	= 'Portfolio';
		$data['judul'] 		= 'SMI';
		$data['judul_parent'] 	= 'Portfolio';
		$data['subjudul'] 	= 'Portfolio';
		$data['own_link'] 	= $this->own_link;
		$data['is_create'] 	= $is_create;
		$data['portfolio'] 	= $portfolio;
		$this->template->_v('portfolio/index', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$this->privilege('portfolio_add');
			$berkas	= $_FILES['image'];
			if ($berkas["name"] != "") {
				$pathDir 	= "./upload/portfolio/";
				$config['upload_path'] = $pathDir; //path folder
		        $config['allowed_types'] = 'png|jpg|jpeg'; //type yang dapat diakses bisa anda sesuaikan
		        $config['encrypt_name'] = TRUE; //Enkripsi nama yang terupload
		 
		        $this->upload->initialize($config);
				if ($this->upload->do_upload('image')){
		            $gbr = $this->upload->data();
		            $temp = explode(".", $berkas["name"]);
					$type_file = '.'.end($temp);
					$nama = "portfolio_".strtotime("now").$type_file;
		            //Compress Image
			        list($width, $height) = getimagesize($pathDir.$gbr['file_name']);   
					$new_width = 220;
					$new_height = 130;

					if ($type_file == ".jpg" | $type_file == ".jpeg") {
						$image = imagecreatefromjpeg($pathDir.$gbr['file_name']);
					} elseif ($type_file == ".png") {
						$image = imagecreatefrompng($pathDir.$gbr['file_name']);
					}
					$image_p = imagecreatetruecolor($new_width, $new_height);
					if ($type_file == ".png") {
						$background = imagecolorallocate($image_p , 255, 255, 255);
				        imagefill($image_p, 0, 0, $background);
					}
					
					imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
					imagejpeg( $image_p, $pathDir.$nama, 100 );
					imagedestroy($image_p);

		            $path = $pathDir.$gbr['file_name'];
					chmod($path, 0777);
					unlink($path);

		            $post_data['image'] = $nama;
		        }
			}
			if ($post_data['image']) {
				$save = $this->Dbhelper->insertData($this->table, $post_data);
				if ($save) {
					$this->session->set_flashdata('success', "Create data success");
					return redirect($this->own_link);
				}
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function delete($id) {
		$this->privilege('portfolio_delete');
		$id = (int) $id;
		$data = $this->Dbhelper->selectTabel("id, image", $this->table, array('id'=>$id));
		// dd($data);
		if (!empty($data)) {
			$data = $data[0];
			$pathDir 	= "./upload/portfolio/";
			$path = $pathDir.$data['image'];
			$delete = $this->db->delete($this->table, array("id" => $data['id']));
			if ($delete) {
				chmod($path, 0777);
				unlink($path);
				$this->session->set_flashdata('success', "Delete data success");
			} else {
				$this->session->set_flashdata('error', "Delete data failed");
			}
		}
		return redirect($this->own_link);
	}

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access)) {
			redirect('dashboard');
		}
	}

	private function validation($post_data) {
		$errMessage 	= [];
		$name			= $post_data["title"];
		$category_id	= $post_data["category_id"];

		if (empty($name)) {
			$errMessage[] = "Name is required";
		}
		if (empty($category_id)) {
			$errMessage[] = "Category is required";
		}

		return $errMessage;
	}

	private function privilege($field, $id = null) {
		$user_access_detail = $this->user_access_detail;
		if (!in_array($field, $user_access_detail)) {
			$this->session->set_flashdata('error', "Access denied");
			if ($field == 'portfolio_index') {
				return redirect('dashboard');
			}
        	return redirect($this->own_link);
        }

        if (!empty($id)) {
        	if ($id < 2) {
	        	$this->session->set_flashdata('error', "Access denied");
	        	return redirect($this->own_link);
	        }
        }
	}
}
