<?php

if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class News extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->helper('url');
		$CI = &get_instance();
		$CI->load->library('session');
		$this->load->model('admin/Modelproject', 'project');
	}

	public function index() {
		// checks whether the user is logged in or not
		$this->validateUserSession();
		$data['news'] = $this->project->getAllNews($this->session->userdata('id'));

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/news', $data);
		$this->load->view('admin/footer');
	}

	public function addNews() {

		// checks whether the user is logged in or not
		$this->validateUserSession();
		/*	$data['id_make'] = $this->Productmodel->getMake();
		$data['id_style'] = $this->Productmodel->getStyle();
		$data['id_engine_size'] = $this->Productmodel->getEngine_size();*/

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/project_add');
		$this->load->view('admin/footer');
	}

	public function deleteTeamById() {
		$upload_dir = getcwd() . '' . '/uploads/product/';
		$targetPath = $upload_dir;
		$name = $_GET['fid'];
		unlink($targetPath . $_GET['fid']);

		$addImages = $this->Productmodel->deleteTeamById($name);
	}

	public function addNewsFormSubmission() {
		$params['name_project'] = $this->input->post('name_project');
		$params['address'] = $this->input->post('address');
		$params['price'] = $this->input->post('price');
		$params['category'] = $this->input->post('category');
		$params['county'] = $this->input->post('county');
		$params['slider'] = $this->input->post('slider');
		$params['desc_slider'] = $this->input->post('desc_slider');
		$params['description'] = $this->input->post('txt_content');
		$params['lat'] = $this->input->post('lat');
		$params['lng'] = $this->input->post('lng');
		$params['img_slider'] = "";
		$targetFolder = '/uploads/img_slider';

		if (!empty($_FILES)) {
			$picId = rand(10000, 500000);
			$tempFile = $_FILES['file_upload']['tmp_name'];
			$targetPath = getcwd() . '' . $targetFolder;
			$image_name = $picId . "_" . str_replace(' ', '', $_FILES['file_upload']['name']);

			$targetFile = rtrim($targetPath, '/') . '/' . $image_name;
			// Validate the file type
			$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
			$fileParts = pathinfo($image_name);
//echo $tempFile.''.$targetFile;exit();
			if (in_array($fileParts['extension'], $fileTypes)) {
				move_uploaded_file($tempFile, $targetFile);
				$_FILES['Filedata']['name'] = $image_name;
				$params['img_slider'] = 'img_slider/' . $image_name;

			} else {
				echo 'Invalid file type.';
			}
		}

		$addprojecr = $this->project->addProject($params);
		if ($addprojecr) {
			$this->session->set_flashdata('success_msg', 'Your project has been added successfully');
			redirect('project');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a project');
			redirect('project/addProject');
		}
		/*  } else {
	$this->session->set_flashdata('error_msg', 'Please upload images in product');
	redirect('product/addProduct');
	}*/
	}

	public function editNews($_id_project) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_project)) {
			redirect('project');
		}

		$data = $this->project->getProjectById($_id_project);
		$data_category = $this->project->getAllCategory();
		$data_county = $this->project->getAllCountyAdmin();

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/project_edit', array('project' => $data));
		$this->load->view('admin/footer');
	}

	public function editNewsFormSubmission($_id_project) {

		$params['name_project'] = $this->input->post('name_project');
		$params['address'] = $this->input->post('address');
		$params['price'] = $this->input->post('price');
		$params['category'] = $this->input->post('category');
		$params['county'] = $this->input->post('county');
		$params['slider'] = $this->input->post('slider');
		$params['desc_slider'] = $this->input->post('desc_slider');
		$params['description'] = $this->input->post('txt_content');
		$params['lat'] = $this->input->post('lat');
		$params['lng'] = $this->input->post('lng');
		$params['img_slider'] = "";
		$targetFolder = '/uploads/img_slider';

		if (!empty($_FILES)) {
			$picId = rand(10000, 500000);
			$tempFile = $_FILES['file_upload']['tmp_name'];
			$targetPath = getcwd() . '' . $targetFolder;
			$image_name = $picId . "_" . str_replace(' ', '', $_FILES['file_upload']['name']);

			$targetFile = rtrim($targetPath, '/') . '/' . $image_name;
			// Validate the file type
			$fileTypes = array('jpg', 'jpeg', 'gif', 'png', 'JPG', 'JPEG', 'GIF', 'PNG'); // File extensions
			$fileParts = pathinfo($image_name);

			if (in_array($fileParts['extension'], $fileTypes)) {
				move_uploaded_file($tempFile, $targetFile);
				$_FILES['Filedata']['name'] = $image_name;
				$params['img_slider'] = 'img_slider/' . $image_name;

			} else {
//                echo 'Invalid file type.';
				$this->session->set_flashdata('error_msg', 'Please try again, Invalid file type');
				redirect('project/editProject/' . $_id_project);
			}
		} else {
			// $params['img_slider'] = $this->input->post('image_name');

		}

		$updatep = $this->project->updateProject($params, $_id_project);
		if ($updatep) {
			$this->session->set_flashdata('success_msg', 'Your project has been added successfully');
			redirect('project');
		} else {
//            $delete = $this->vehicleModel->deleteTemp();
			$this->session->set_flashdata('error_msg', 'Please try again adding a project');
			redirect('project/editProject');
		}
	}

	public function viewNews($_id_project) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		if (empty($_id_project)) {
			redirect('project');
		}

		$data = $this->project->getProjectById($_id_project);
		$data_category = $this->project->getAllCategory();
		$data_county = $this->project->getAllCountyAdmin();

		$this->load->view('admin/header');
		$this->load->view('admin/navigation');
		$this->load->view('admin/project_view', array('project' => $data));
		$this->load->view('admin/footer');
	}

	public function deleteNews($_id_project) {

		// checks whether the user is logged in or not
		$this->validateUserSession();

		$this->session->set_flashdata('success_msg', 'Your project is deleted successfully');
		$this->project->deleteProject($_id_project);
		redirect('project');
	}

	public function validateUserSession() {
		$logged_in_status = $this->session->userdata('logged_in_status');

		if (empty($logged_in_status)) {
			redirect("admin/login");
		}
	}
	public function detail_project($_id_project) {
		$head = $this->load->view('main/head', array('titlePage' => 'novaland'), TRUE);
		$header = $this->load->view('main/header', array(
			'logo' => 'img/header/logo_novaland.png',
			'showTitle' => true,
			'logoWidth' => '126px',
			'logoHeight' => '95px',

		), TRUE);
		$data = $this->project->getAllCounty();
		$data_news = $this->project->getAllNews();
		$data_project = $this->project->getAllProject();
		$data_slider = $this->project->getSliderProject();

		$header = $this->load->view('main/header', array(), TRUE);
		$content = $this->load->view('main/project_detail', array('county' => $data, 'arr_news' => $data_news, 'data_project' => $data_project, 'data_slider' => $data_slider), TRUE);
		$footer = $this->load->view('main/footer', array(), TRUE);
		$this->load->view('main/layout', array('head' => $head, 'header' => $header,
			'content' => $content,
			'footer' => $footer));
	}

}

/* End of file events.php */
/* Location: ./application/controllers/events.php */